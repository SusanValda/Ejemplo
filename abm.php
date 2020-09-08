<html>
	<head>
		<!-- de acuerdo al contenido de la variable "accion", escribimos el título -->
		<?php
			if ($_GET["accion"] == "alta")
				echo "<title>" . "Alta de registro" . "</title>";

			if ($_GET["accion"] == "baja")
				echo "<title>" . "Baja en la agenda" . "</title>";

			if ($_GET["accion"] == "modificacion")
				echo "<title>" . "Modificaci&oacute;n en agenda" . "</title>";
		?>
	</head>

	<body bgcolor="#ffb6c1">

		<?php
			// Acá mostramos la pantalla de carga de ALTAS.
			if ($_GET["accion"] == "alta")
			{
            echo "<center>";				
				echo "<h1><font color=\"blue\">Agregar Registro</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm.php\" METHOD=\"GET\">";
					echo "Nombre: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtname\">" . "<BR>";
					echo "<BR>";
					echo "Apellido: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtapellido\">" . "<BR>";
					echo "<BR>";
					echo "C.I.:    " .   "<INPUT TYPE=\"TEXT\" NAME=\"txtci\">" .   "<BR>";
					echo "<BR>";
					echo "Direccion.: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdir\">" . "<BR>";
					echo "<BR>";
					echo "<INPUT TYPE=\"submit\" NAME=\"OK\">";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_alta\">";

				echo "</FORM>";

				echo "</center>";

				exit();
			}
		?>



		<?php
			// Acá, en base a los datos recibidos (nombre, telefono, direccion, etc), hacemos el alta.
			if ($_GET["accion"] == "realizar_alta")
			{
				include("sql.php");

				$name = $_GET["txtname"];
				$apellidos = $_GET["txtapellido"];
				$ci = $_GET["txtci"];
				$dir = $_GET["txtdir"];
				alta ($name,$apellidos,$ci,$dir);

				
			}
		?>

		

		<?php
			//Acá solicitamos el ID para poder modificar el registro.
			if ($_GET["accion"] == "modificacion")
			{
            echo"<center>";				
				echo "<h1><font color=\"blue\">Modificar un registro<font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm.php\" METHOD=\"GET\">";
					echo "codalumno: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"datos_modificacion\">";
				echo "</FORM>";
				echo "</center>";

				

				exit();
			}
		?>
		


		<?php
			// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
			if ($_GET["accion"] == "datos_modificacion")
			{
				include("sql.php");

				
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a BD</h1>";
						
						exit();
					}

				$id = $_GET["txtId"];
				$consulta = "SELECT * FROM alumnos WHERE codalumno = $id";

				echo $consulta . "<br>";

				$resultado = mysql_query($consulta, $conexion);

				$fila = mysql_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
				
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.

                $name = $fila["nombre"];
                $apellidos = $fila["apellidos"];
                $ci = $fila["ci"];
                $dir = $fila["direccion"];

				   //liberamos memoria que ocupa la consulta...
				   mysql_free_result($resultado);

				   //cerramos la conexión con el motor de BD
				   mysql_close($conexion);

				/*
				ahora que teóricamente tengo los datos del registro que quiero modificar, muestro
				el formulario de carga.
				*/
            echo "<center>";				
				echo "<h1><font color=\"blue\">Modificar un registro</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm.php\" METHOD=\"GET\">";
				echo "nombre: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtname\" VALUE=\"$name\">" . "<BR>";
				echo "apellidos: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtapellido\" VALUE=\"$apellidos\">" . "<BR>";
				echo "ci: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtci\" VALUE=\"$ci\">" . "<BR>";
			   echo "direccion: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtdir\" VALUE=\"$dir\">" . "<BR>";

                                echo "<BR>";
				echo "<INPUT TYPE=\"submit\" NAME=\"submit\" value=\"Enviar\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"codalumno\" VALUE=\"$id\">";
				echo "</FORM>";
				echo "</center>";

				
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql.php");

                $id = $_GET["codalumno"];
				$name = $_GET["txtname"];
                $apellidos = $_GET["txtapellido"];
                $ci = $_GET["txtci"];
                $dir= $_GET["txtdir"];
				modificacion($id, $name,$apellidos,$ci,$dir);
			
			}

		?>
		

		<?php
			// Acá mostramos la pantalla de carga de BAJAS.
			if ($_GET["accion"] == "baja")
			{
            echo"<center>";				
				echo "<h1><font color=\"blue\">Eliminar Registro</font></h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm.php\" METHOD=\"GET\">";
					echo "Cod_Alumno: " . "<INPUT TYPE=\"TEXT\" NAME=\"txtId\">" . "<BR>";
					echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_baja\">";
				echo "</FORM>";
				echo"</center>";
				
				
				
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include("sql.php");
				
				$id = $_GET["txtId"];
				
				baja($id);
				
				
			}
		?>

		<form action="index.php" method="POST">
<center><input type=submit value=Volver><center>
</form>

	</body>
</html>