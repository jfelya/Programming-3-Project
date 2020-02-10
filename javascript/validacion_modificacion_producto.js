function validacion_modificacion_producto() 
{
	//LLENADO DE VARIABLES
	var nombre, stock, precio, imagen;
	nombre = document.forms["modificar_producto"]["nombre"].value;
	stock = document.forms["modificar_producto"]["stock"].value;
	precio = document.forms["modificar_producto"]["precio"].value;
	imagen = document.forms["modificar_producto"]["imagen"].value;

	var ok = true;
	var msg = "";

	if (nombre == "" 
		|| stock == "" 
		|| precio == ""
		|| imagen == "")
	{ //SI LOS CAMPOS ESTÁN VACÍOS
		msg += "Todos los campos son obligatorios\n";
		ok = false;
		return ok;
	} //SI LOS CAMPOS ESTÁN VACÍOS
	else
	{ //SI LOS CAMPOS NO ESTÁN VACÍOS
		if (nombre.length < 2)
		{ // SI LOS CAMPOS SON MENORES A DOS CARACTERES
			msg += "El nombre no puede tener menos de dos caracteres\n";
			ok = false;
		} // SI LOS CAMPOS SON MENORES A DOS CARACTERES

		if (nombre.length > 120)
		{ // SI LOS CAMPOS SON MAYORES A CIENTO VEINTE CARACTERES
			msg += "El nombre no puede tener más de ciento veinte caracteres\n";
			ok = false;
		} // SI LOS CAMPOS SON MAYORES A CIENTO VEINTE CARACTERES

		if (isNAN(stock) || isNAN(precio))
		{ // SI EL STOCK O EL PRECIO NO SON NUMÉRICOS
			msg += "El stock y el precio deben ser numéricos\n";
			ok = false;
		} // SI EL STOCK O EL PRECIO NO SON NUMÉRICOS

	//VALIDACIÓN PRINCIPAl
		if (ok == false)
		{ //SI HUBO ALGUN CAMPO NO VÁLIDO
			alert(msg);
			return ok;
		} //SI HUBO ALGUN CAMPO NO VÁLIDO
		else
		{ //SI TODOS LOS CAMPOS SON VÁLIDOS
			return ok;
		} //SI TODOS LOS CAMPOS SON VÁLIDOS
	//VALIDACIÓN PRINCIPAl
	} //SI LOS CAMPOS NO ESTÁN VACÍOS
}