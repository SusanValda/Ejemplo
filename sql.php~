<?php
	function Conectarse()
	{//inttroducimos los datos de  host que son "Server", "usuario" y "contraseña" 
		if (!($link=mysql_connect("localhost","root","")))//aca hay que introducir los datos que especifique arriba!!!
		{
			return 0;
		}
		if (!mysql_select_db("academia_clases",$link))
		{
			return 0;
		}
		return $link;
	}

	//--------------------------

	function alta ($name,$apellidos,$ci,$dir)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO alumnos (nombre, apellidos, ci,direccion) VALUES ('$name', '$apellidos','$ci','$dir')";

		


		echo $consulta;

		$resultado=mysql_query($consulta,$conexion);

			//cerramos la conexión con el motor de BD
			mysql_close($conexion);
	}

	//--------------------------

	function baja ($id)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM alumnos WHERE codalumno = $id";

		echo $consulta . "<BR>";

		$resultado=mysql_query($consulta,$conexion);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysql_close($conexion);

	}

	//--------------------------

	function modificacion ($id, $name,$apellidos,$ci,$dir)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.

		/*
		UPDATE `agenda` SET `nombre` = 'pepe3',
						`tel` = '467641_1',
						`direccion` = 'ch 149_1',
						`mail` = 'pepe@host2.com.ar' WHERE `agenda`.`id` =2
		*/

		$consulta = "UPDATE alumnos SET nombre='$name',apellidos='$apellidos',ci='$ci',direccion='$dir'";
                $consulta = $consulta . "WHERE codalumno='$id'";


		echo $consulta;

		$resultado=mysql_query($consulta,$conexion);

			//cerramos la conexión con el motor de BD
			mysql_close($conexion);
	}

?>