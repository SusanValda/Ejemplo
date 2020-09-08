<html>
<head>
   <title>Base de datos</title>
</head>
<body  bgcolor="#ffb6c1">
<H1><center><font face="Georgia" color="blue">REGISTRO DE ESTUDIANTES</font></center> </H1>
<H1><center><font face="Georgia" color="blue">ACTUALIZADO</font></center> </H1>
<center><img src="estu.jpg" ></center>
<br>
<?php
   include("sql.php");
   $link=Conectarse();
		if ($link==0)
		{
			echo "<H1>Error en apertura de bases de datos.</H1>";
			exit();
		}
	
	$result=mysql_query("select * from alumnos",$link);
?>
   
  
   <center>
   <TABLE BORDER=5 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
    <TR>
		<TD><b><font color="blue">&nbsp;codalumno&nbsp;</font></b></TD>
		<TD><b><font color="blue">&nbsp;nombre&nbsp;</font></b></TD>
		<TD><b><font color="blue">&nbsp;apellidos&nbsp;</font></b></TD>
		<TD><b><font color="blue">&nbsp;ci&nbsp;</font></b></TD>
		<TD><b><font color="blue">&nbsp;direccion&nbsp;</font></b></TD>
        </TR>

<?php
   //$row["ID"] NO ES LO MISMO QUE $row["id"] o que $row["Id"]
   while($row = mysql_fetch_array($result)) {
	  echo "<TR>";
	  echo "<TD>&nbsp;" . $row["codalumno"] . "</TD>";
	  echo "<TD>&nbsp;" . $row["nombre"] . "</TD>";
	  echo "<TD>&nbsp;" . $row["apellidos"] . "</TD>";
	  echo "<TD>&nbsp;" . $row["ci"] . "</TD>";
	   echo "<TD>&nbsp;" . $row["direccion"] . "</TD>";
	  echo "</TR>";
   }
   
   //liberamos memoria que ocupa la consulta...
   mysql_free_result($result);
   
   //cerramos la conexión con el motor de BD
   mysql_close($link);
?>

</table>
<center>

	<br>
	<br>
	<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=1 bordercolor=darkblue>
    <TR>
		<TD><a href="abm.php?accion=alta">Agregar</a></TD>
		<TD><a href="abm.php?accion=modificacion">Modificar</a></TD>
		<TD><a href="abm.php?accion=baja">Borrar</a></TD>
		
        </TR>
	 <br>
	
	 <br>
	
</body>
</html>