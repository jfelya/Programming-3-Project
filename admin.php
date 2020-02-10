<?php
session_start();
include("funciones/sesionInactiva.php");
include("funciones/adminFunciones.php");
mostrarErrorExito();
sesionInactiva();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página del Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="css/guayucostyles.css">
	<script src="javascript/validacion_registro_usuario.js"></script>
	<script src="javascript/validacion_modificacion_usuario.js"></script>
	<script src="javascript/validacion_registro_producto.js"></script>
	<script src="javascript/validacion_modificacion_producto.js"></script>
	<script src="javascript/letras_minusculas.js"></script>
	<script src="javascript/SmoothScroll.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
		<?php
		if (!isset($_REQUEST["registrar_producto"]) and !isset($_REQUEST["registrar_usuario"]) and !isset($_REQUEST["modificar_usuario"]) and !isset($_REQUEST["modificar_producto"]))
		{
			?>

			<div class="adminbox">
				<p class="title">Bienvenido al nivel<br> de Administrador</p>
				<p style="color: silver;">Administrador: 
					<span class="usertext">
						<?php 
						echo $_SESSION["usuario"];
						?>
					</span>
				</p><br>
				<a class="btn btn-outline-primary btn-block" role="button" .disabled href="admin.php?registrar_usuario">Registrar Usuario</a>
				<a class="btn btn-outline-primary btn-block" role="button" .disabled href="admin.php?registrar_producto">Registrar Producto</a><br>
				<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
			</div>

			<?php
		}

	//SI SE ELIGE LA FUNCIÓN DE INGRESAR PRODUCTOS
		if (isset($_REQUEST["registrar_producto"]))
		{
			?>
			<div class="userbox">
				<p class="title">Registro de Productos</p>
				<p style="color: silver;">Administrador: 
					<span class="usertext">
						<?php 
						echo $_SESSION["usuario"];
						?>
					</span>
				</p><br>
				<form name="registro_producto" action="procesos/producto_proceso.php" method="POST" onsubmit="return validacion_registro_producto()">
					<!-- NOMBRE -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="nombre">
							Nombre
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="nombre" type="text" name="nombre" autofocus="yes" >
						</div>
						<p class="mini">Máximo 120 caracteres / Mínimo 4 caracteres</p>
					</div>
					<!-- NOMBRE -->
					<!-- STOCK -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="stock">
							Stock
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="stock" type="number" name="stock" min="7" max="82">
						</div>
						<p class="mini">Máximo 82 / Mínimo 7</p>
					</div>
					<!-- STOCK -->
					<!-- PRECIO -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="precio">
							Precio
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="precio" type="number" name="precio" step="500" min="10000" max="7000000">
						</div>
						<p class="mini">Máximo 7,000,000 / Mínimo 10,000</p>
					</div>
					<!-- PRECIO -->
					<input class="btn btn-outline-primary btn-block" type="submit" name="boton_registrar" value="Registrar" .disabled>
					<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_productos.php">Lista de Productos</a><br>
					<a class="btn btn-outline-info" role="button" .disabled href="admin.php">Regresar</a>
					<a class="btn btn-outline-danger" role="button" .disabled href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
				</form>
			</div>
			<?php
		}
	//SI SE ELIGE LA FUNCIÓN DE INGRESAR PRODUCTOS

	//SI SE ELIGE LA FUNCIÓN DE MODIFICAR PRODUCTOS
		if (isset($_REQUEST["modificar_producto"]) and $_REQUEST["id_producto"] !== "")
		{
			$id_producto = $_REQUEST['id_producto'];
			include("conexion.php");
			$query = "SELECT * FROM producto WHERE id_producto = '$id_producto'";
			$resultado = $conexion->query($query);
			$row = $resultado->fetch_assoc();
			?>
			<div class="userbox">
				<p class="title">Modificación de Productos</p>
				<p style="color: silver;">Administrador: 
					<span class="usertext">
						<?php 
						echo $_SESSION["usuario"];
						?>
					</span>
				</p><br>
				<form name="modificar_producto" action="procesos/producto_proceso.php?id_producto=<?php echo $row['id_producto']; ?>" method="POST" onsubmit="return validacion_modificacion_producto()">
					<!-- NOMBRE -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="nombre">
							Nombre
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="nombre" type="text" name="nombre" required autofocus="yes" value="<?php echo $row['nombre']; ?>">
						</div>
						<p class="mini">Máximo 120 caracteres / Mínimo 4 caracteres</p>
					</div>
					<!-- NOMBRE -->
					<!-- STOCK -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="stock">
							Stock
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="stock" type="number" name="stock"  min="7" max="82" required value="<?php echo $row['stock']; ?>">
						</div>
						<p class="mini">Máximo 82 / Mínimo 7</p>
					</div>
					<!-- STOCK -->
					<!-- PRECIO -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="precio">
							Precio
						</label>
						<div class="col-sm-6">
							<input class="form-control" id="precio" type="number" name="precio"  step="500" min="10000" max="7000000" required value="<?php echo $row['precio']; ?>">
						</div>
						<p class="mini">Máximo 7,000,000 / Mínimo 10,000</p>
					</div>
					<!-- PRECIO -->
					<p class="mini">Todos los campos son obligatorios<br>
					Máximo 120 caracteres / Mínimo 2 caracteres</p><br>
					<input class="btn btn-outline-primary btn-block" type="submit" name="boton_modificar" value="Modificar" .disabled>
					<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_productos.php">Lista de Productos</a><br>
					<a class="btn btn-outline-info" role="button" .disabled href="admin.php?registrar_producto">Regresar al Registro</a>
					<a class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
				</form>
			</div>
			<?php
		}
	//SI SE ELIGE LA FUNCIÓN DE MODIFICAR PRODUCTOS
	//SI SE ELIGE LA FUNCIÓN DE REGISTRAR USUARIOS
		if (isset($_REQUEST["registrar_usuario"]))
		{
			?>
			<div class="userbox">
				<p class="title">Registro de Usuarios</p>
				<p style="color: silver;">Administrador: 
					<span class="usertext">
						<?php 
						echo $_SESSION["usuario"];
						?>
					</span>
				</p>
				<form name="registro_usuario" action="procesos/admin_proceso.php" method="POST" onsubmit="return validacion_registro_usuario()">
					<!-- NOMBRE -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="nombre">
							Nombre
						</label>
						<div class="col-sm-7">
							<input class="form-control" id="nombre" type="text" name="nombre" required>
						</div>
						<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
					</div>
					<!-- NOMBRE -->
					<!-- APELLIDO -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="apellido">
							Apellido
						</label>
						<div class="col-sm-7">
							<input class="form-control" id="apellido" type="text" name="apellido" required>
						</div>
						<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
					</div>
					<!-- APELLIDO -->
					<!-- USUARIO -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="usuario">
							Usuario
						</label>
						<div class="col-sm-7">
							<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" required>
						</div>
						<p class="mini">Máximo 20 caracteres / Mínimo 4 caracteres</p>
					</div>
					<!-- USUARIO -->
					<!-- CORREO -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="correo">
							Correo
						</label>
						<div class="col-sm-7">
							<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" required>
						</div>
						<p class="mini">Máximo 30 caracteres</p>
					</div>
					<!-- CORREO -->
					<!-- CONTRASEÑA -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="contrasena">
							Contraseña
						</label>
						<div class="col-sm-7">
							<input class="form-control" id="contrasena" type="password" name="contrasena" required>
						</div>
						<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
					</div>
					<!-- CONTRASEÑA -->
					<!-- CONFIRMAR CONTRASEÑA -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="contrasena2">
							Confirmar contraseña
						</label>
						<div class="col-sm-7">
							<input class="form-control" id="contrasena2" type="password" name="contrasena2" required>
						</div>
						<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
					</div>
					<!-- CONFIRMAR CONTRASEÑA -->
					<!-- NIVEL  -->
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="nivel">
							Nivel de Usuario
						</label>
						<div class="col-sm-7">
							<select class="form-control" name="nivel" id="nivel">
								<option></option>
								<option>Cliente</option>
								<option>Admin</option></select>
							</div>
						</div>
						<!-- NIVEL  -->
						<!-- PREGUNTA SECRETA -->
						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="pregunta_secreta">
								Pregunta secreta
							</label>
							<div class="col-sm-7">
								<select class="form-control" name="pregunta_secreta" id="pregunta_secreta">
									<option></option>
									<option>Color Favorito</option>
									<option>Comida Favorita</option>
									<option>Banda Favorita</option>
									<option>Animal Favorito</option>
								</select>
							</div>
						</div>
						<!-- PREGUNTA SECRETA -->
						<!-- RESPUESTA SECRETA -->
						<div class="form-group row">
							<label class="col-sm-4 col-form-label" for="respuesta_secreta">
								Respuesta secreta
							</label>
							<div onkeyup="letraMinuscula3()" class="col-sm-7">
								<input class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" required>
							</div>
							<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
						</div>
						<!-- RESPUESTA SECRETA -->
						<input class="btn btn-outline-primary btn-block" type="submit" name="boton_registrar" value="Registrar" .disabled>
						<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_usuarios.php">Lista de Usuarios</a><br>
						<a class="btn btn-outline-info" role="button" .disabled href="admin.php">Regresar</a>
						<a class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
					</form>
				</div>
				<?php
			}
		//SI SE ELIGE LA FUNCIÓN DE REGISTRAR USUARIOS
		//SI SE ELIGE LA FUNCIÓN DE MODIFICAR USUARIOS
			if (isset($_REQUEST["modificar_usuario"]) and isset($_REQUEST["id_cliente"]))
			{
				$id_cliente = $_REQUEST['id_cliente'];
				include("conexion.php");
				$query = "SELECT * FROM usuarios WHERE id_cliente = '$id_cliente'";
				$resultado = $conexion->query($query);
				$row = $resultado->fetch_assoc();
				?>
				<body>
					<div class="userbox">
						<p class="title">Modificación de Usuarios</p>
						<p style="color: silver;">Administrador: 
							<span class="usertext">
								<?php 
								echo $_SESSION["usuario"];
								?>
							</span>
						</p>
						<form name="modificacion_usuario" action="procesos/admin_proceso.php?modificar=1&id_cliente=<?php echo $id_cliente; ?>" method="POST" onsubmit="return validacion_modificacion_usuario()">
							<!-- NOMBRE -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="nombre">
									Nombre
								</label>
								<div class="col-sm-7">
									<input class="form-control" id="nombre" type="text" name="nombre" value="<?php echo $row['nombre']; ?>"  required>
								</div>
								<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
							</div>
							<!-- NOMBRE -->
							<!-- APELLIDO -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="apellido">
									Apellido
								</label>
								<div class="col-sm-7">
									<input class="form-control" id="apellido" type="text" name="apellido" value="<?php echo $row['apellido']; ?>" required>
								</div>
								<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
							</div>
							<!-- APELLIDO -->
							<!-- USUARIO -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="usuario">
									Usuario
								</label>
								<div class="col-sm-7">
									<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required>
								</div>
								<p class="mini">Máximo 20 caracteres / Mínimo 4 caracteres</p>
							</div>
							<!-- USUARIO -->
							<!-- CORREO -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="correo">
									Correo
								</label>
								<div class="col-sm-7">
									<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
								</div>
								<p class="mini">Máximo 30 caracteres</p>
							</div>
							<!-- CORREO -->
							<!-- CONTRASEÑA -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contrasena">
									Contraseña
								</label>
								<div class="col-sm-7">
									<input class="form-control" id="contrasena" type="password" name="contrasena" value="<?php echo $row['contrasena']; ?>" required>
								</div>
								<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
							</div>
							<!-- CONTRASEÑA -->
							<!-- CONFIRMAR CONTRASEÑA -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="contrasena2">
									Confirmar contraseña
								</label>
								<div class="col-sm-7">
									<input class="form-control" id="contrasena2" type="password" name="contrasena2" placeholder="Confirme su contraseña" value="<?php echo $row['contrasena']; ?>" required>
								</div>
								<p class="mini">Máximo 30 caracteres / Mínimo 4 caracteres</p>
							</div>
							<!-- CONFIRMAR CONTRASEÑA -->
							<!-- NIVEL  -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="nivel">
									Nivel de Usuario
								</label>
								<div class="col-sm-7">
									<select class="form-control" name="nivel" id="nivel">
										<?php
										if ($row["nivel"] == "cliente")
										{
											?>
											<option>Cliente</option>
											<option>Admin</option></select>
											<?php
										}
										if ($row["nivel"] == "admin")
										{
											?>
											<option>Admin</option>
											<option>Cliente</option></select>
											<?php
										}
										?>
									</div>
								</div>
								<!-- NIVEL  -->
								<!-- PREGUNTA SECRETA -->
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" for="pregunta_secreta">
										Pregunta secreta
									</label>
									<div class="col-sm-7">
										<select class="form-control" name="pregunta_secreta" id="pregunta_secreta">
											<?php
											if ($row["pregunta_secreta"] == "Color Favorito")
											{
												?>
												<option>Color Favorito</option>
												<option>Comida Favorita</option>
												<option>Banda Favorita</option>
												<option>Animal Favorito</option>
												<?php
											}
											if ($row["pregunta_secreta"] == "Comida Favorita")
											{
												?>
												<option>Comida Favorita</option>
												<option>Color Favorito</option>
												<option>Banda Favorita</option>
												<option>Animal Favorito</option>
												<?php
											}
											?>
											<?php
											if ($row["pregunta_secreta"] == "Banda Favorita")
											{
												?>
												<option>Banda Favorita</option>
												<option>Comida Favorita</option>
												<option>Color Favorito</option>
												<option>Animal Favorito</option>
												<?php
											}
											if ($row["pregunta_secreta"] == "Animal Favorito")
											{
												?>
												<option>Animal Favorito</option>
												<option>Color Favorito</option>
												<option>Comida Favorita</option>
												<option>Banda Favorita</option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<!-- PREGUNTA SECRETA -->
								<!-- RESPUESTA SECRETA -->
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" for="respuesta_secreta">
										Respuesta secreta
									</label>
									<div onkeyup="letraMinuscula3()" class="col-sm-7">
										<input class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" value="<?php echo $row['respuesta_secreta']; ?>" required>
									</div>
									<p class="mini">Máximo 30 caracteres / Mínimo 2 caracteres</p>
								</div>
								<!-- RESPUESTA SECRETA -->
								<input class="btn btn-outline-primary btn-block" type="submit" name="boton_modificar" value="Modificar" .disabled>
								<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_usuarios.php">Lista de Usuarios</a><br>
								<a class="btn btn-outline-info" role="button" .disabled href="admin.php?registrar_usuario">Regresar al Registro</a>
								<a class="btn btn-outline-danger" href="procesos/cerrar_sesion.php">Cerrar Sesión</a>
							</form>
						</div>
						<?php
					}
				//SI SE ELIGE LA FUNCIÓN DE MODIFICAR USUARIOS
					?>
				</center>
			</body>
			</html>