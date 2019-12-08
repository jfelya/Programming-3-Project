<!DOCTYPE html>
<html>
<head>
	<title>Página del Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrapguayuco.css">
	<link rel="stylesheet" type="text/css" href="guayucostyles.css">
	<script src="validacion_registro_usuario.js"></script>
	<script src="validacion_modificacion_usuario.js"></script>
	<script src="letras_minusculas.js"></script>
</head>
<?php
session_start();
// ERROR
if (isset($_SESSION["admin_error"]) and isset($_REQUEST["admin_error"]))
{
	if ($_SESSION["admin_error"] !== "" and $_REQUEST["admin_error"] == 1)
	{
		echo "<script>alert('".$_SESSION["admin_error"]."')</script>";
		unset($_SESSION["admin_error"]);
	} //SI HAY ERRORES
} //SI LOS ERRORES ESTÁN PUESTOS
// ERROR
// EXITO
if (isset($_SESSION["admin_exito"]) and isset($_REQUEST["admin_exito"]))
{
	if ($_SESSION["admin_exito"] !== "" and $_REQUEST["admin_exito"] == 1)
	{
		echo "<script>alert('".$_SESSION["admin_exito"]."')</script>";
		unset($_SESSION["admin_exito"]);
	} //SI ES EXITOSOS
} //SI EL EXITO ESTÁ PUESTO
// EXITO
if (!isset($_SESSION["usuario"]) or $_SESSION["sesion_activa"] == False or $_SESSION["nivel"] !== "admin")
{
	header("Location:cerrar_sesion.php");
} //SI NO HAY SESION O NO ES ADMIN
else
{
	if (!isset($_REQUEST["modificar_usuario"]) and !isset($_REQUEST["usuario_id"]))
	{
		?>
		<body>
			<div class="userbox">
				<p class="title">Bienvenido al Registro de Usuarios</p>
				<p class="mini">Todos los campos son obligatorios<br>
				Máximo 20 caracteres / Mínimo 2 caracteres</p>
				<p style="color: silver;">Administrador 
					<span class="usertext">
						<?php 
						echo $_SESSION["usuario"];
						?>
					</span>
				</p>
				<form name="registro_usuario" action="admin_proceso.php" method="POST" onsubmit="return validacion_registro_usuario()">
					<!-- USUARIO -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="usuario">
							Usuario
						</label>
						<div class="col-sm-8">
							<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" placeholder="Ingrese su usuario" required>
						</div>
					</div>
					<!-- USUARIO -->
					<!-- CORREO -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="correo">
							Correo
						</label>
						<div class="col-sm-8">
							<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" placeholder="Ingrese su correo" required>
						</div>
					</div>
					<!-- CORREO -->
					<!-- CONTRASEÑA -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="contrasena">
							Contraseña
						</label>
						<div class="col-sm-8">
							<input class="form-control" id="contrasena" type="password" name="contrasena" placeholder="Ingrese su contraseña" required>
						</div>
					</div>
					<!-- CONTRASEÑA -->
					<!-- CONFIRMAR CONTRASEÑA -->
					<div class="form-group">
						<label class="col-sm-2 col-form-label" for="contrasena2">
							Confirmar contraseña
						</label>
						<div class="col-sm-8">
							<input class="form-control" id="contrasena2" type="password" name="contrasena2" placeholder="Confirme su contraseña" required>
						</div>
					</div>
					<!-- CONFIRMAR CONTRASEÑA -->
					<!-- NIVEL  -->
					<div class="form-group">
						<label class="col-sm-5 col-form-label" for="nivel">
							Nivel de Usuario
						</label>
						<div class="col-sm-8">
							<select class="form-control" name="nivel" id="nivel">
								<option>Cliente</option>
								<option>Admin</option></select>
							</div>
						</div>
						<!-- NIVEL  -->
						<!-- PREGUNTA SECRETA -->
						<div class="form-group">
							<label class="col-sm-5 col-form-label" for="pregunta_secreta">
								Pregunta secreta
							</label>
							<div class="col-sm-8">
								<select class="form-control" name="pregunta_secreta" id="pregunta_secreta">
									<option>Color Favorito</option>
									<option>Comida Favorita</option>
									<option>Banda Favorita</option>
									<option>Animal Favorito</option>
								</select>
							</div>
						</div>
						<!-- PREGUNTA SECRETA -->
						<!-- RESPUESTA SECRETA -->
						<div class="form-group">
							<label class="col-sm-5 col-form-label" for="respuesta_secreta">
								Respuesta secreta
							</label>
							<div onkeyup="letraMinuscula3()" class="col-sm-8">
								<input class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" placeholder="Ingrese su respuesta secreta" required>
							</div>
						</div>
						<!-- RESPUESTA SECRETA -->
						<input class="btn btn-outline-primary btn-block" type="submit" name="boton_registrar" value="Registrar" .disabled><br>
						<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_usuarios.php">Lista de Usuarios</a>
					</form><br>	
					<a class="btn btn-outline-danger btn-block" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="cerrar_sesion.php">Cerrar Sesión</a>
				</div>
				<?php
			}
			else
			{
				$usuario_id = $_REQUEST['usuario_id'];
				include("conexion.php");
				$query = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
				$resultado = $conexion->query($query);
				$row = $resultado->fetch_assoc();
				?>
				<body>
					<div class="userbox">
						<p class="title">Bienvenido a la Modificación de Usuarios</p>
						<p class="mini">Todos los campos son obligatorios<br>
						Máximo 20 caracteres / Mínimo 2 caracteres</p>
						<p style="color: silver;">Administrador 
							<span class="usertext">
								<?php 
								echo $_SESSION["usuario"];
								?>
							</span>
						</p>
						<form name="modificacion_usuario" action="admin_proceso.php?modificar=1&usuario_id=<?php echo $usuario_id; ?>" method="POST" onsubmit="return validacion_modificacion_usuario()">
							<!-- USUARIO -->
							<div class="form-group">
								<label class="col-sm-2 col-form-label" for="usuario">
									Usuario
								</label>
								<div class="col-sm-8">
									<input onkeyup="letraMinuscula1()" class="form-control" id="usuario" type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required>
								</div>
							</div>
							<!-- USUARIO -->
							<!-- CORREO -->
							<div class="form-group">
								<label class="col-sm-2 col-form-label" for="correo">
									Correo
								</label>
								<div class="col-sm-8">
									<input onkeyup="letraMinuscula2()" class="form-control" id="correo" type="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
								</div>
							</div>
							<!-- CORREO -->
							<!-- CONTRASEÑA -->
							<div class="form-group">
								<label class="col-sm-2 col-form-label" for="contrasena">
									Contraseña
								</label>
								<div class="col-sm-8">
									<input class="form-control" id="contrasena" type="password" name="contrasena" value="<?php echo $row['contrasena']; ?>" required>
								</div>
							</div>
							<!-- CONTRASEÑA -->
							<!-- CONFIRMAR CONTRASEÑA -->
							<div class="form-group">
								<label class="col-sm-2 col-form-label" for="contrasena2">
									Confirmar contraseña
								</label>
								<div class="col-sm-8">
									<input class="form-control" id="contrasena2" type="password" name="contrasena2" placeholder="Confirme su contraseña" required>
								</div>
							</div>
							<!-- CONFIRMAR CONTRASEÑA -->
							<!-- NIVEL  -->
							<div class="form-group">
								<label class="col-sm-5 col-form-label" for="nivel">
									Nivel de Usuario
								</label>
								<div class="col-sm-8">
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
								<div class="form-group">
									<label class="col-sm-5 col-form-label" for="pregunta_secreta">
										Pregunta secreta
									</label>
									<div class="col-sm-8">
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
								<div class="form-group">
									<label class="col-sm-5 col-form-label" for="respuesta_secreta">
										Respuesta secreta
									</label>
									<div onkeyup="letraMinuscula3()" class="col-sm-8">
										<input class="form-control" id="respuesta_secreta" type="text" name="respuesta_secreta" value="<?php echo $row['respuesta_secreta']; ?>" required>
									</div>
								</div>
								<!-- RESPUESTA SECRETA -->
								<input class="btn btn-outline-primary btn-block" type="submit" name="boton_modificar" value="Modificar" .disabled><br>
								<a class="btn btn-outline-secondary btn-block" role="button" .disabled href="lista_de_usuarios.php">Lista de Usuarios</a>
							</form><br>	
							<a class="btn btn-outline-danger btn-block" data-toggle="tooltip" data-placement="top" title="Cerrar la sesión"  href="cerrar_sesion.php">Cerrar Sesión</a>
						</div>
						<?php
					}
					?>
					<?php
				}
				?>
			</body>
			</html>