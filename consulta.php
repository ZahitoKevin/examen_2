<HTML>
  <HEAD>
    <TITLE>Impresion de consulta</TITLE>
   </HEAD>
   <BODY>
	<?php
   //PASO 1. Conectarnos a BD
   //1.1 Datos de conexion
   $servername = "localhost";
   $database = "examen_2";
   $username = "root";
   $password = "";
   
   //1.2 funcion para conectarnos
   $conexion = mysqli_connect($servername, $username, $password, $database);
   
   //1.3 Bandera que monitorea la conexion
   $banderaconexion = true;
   
   if($conexion){// si hubo conexion
        ECHO "Conexion exitoza <BR>";
   }else{
	   ECHO "Conexion fallida <BR>";
	   $banderaconexion = false;
   }
	  //2 Consulta
	  if ($banderaconexion == true){
		  ECHO "Ejecutando consulta <BR>";
		  //2.1 Estableciendo la consulta a ejecutar
		  $query = "SELECT * FROM empleados_planta";
		  //2.2 Ejecutar la consulta
		  ECHO $query."<BR>";
		  $resultados = mysqli_query($conexion, $query);
		  //2.3 Validar la ejecucion
		  $banderaconexion = true;
		  if($resultados){// si hubo resultados de la consulta
		  ECHO "Consulta ejecutada con exito <BR>";
		  }else{
			  ECHO "Consulta fallida <BR>";
		  $banderaconexion = false;
		  }
		  if ($banderaconexion == true){
			  //2.4 Estableciendo limite del arreglo
			  //Delimitado por el numero de filas
			  $num_filas = mysqli_num_rows($resultados);
			  ECHO "Imprimiendo ".$num_filas." resultados </BR>";
		  }else{
			  ECHO "No se imprimiran resultados </BR>";
		  }
	  }else{
		  ECHO "No se ejeutara la consulta por falla de conexion <BR>";
	  }
	  ECHO "<H1>Lista de registro</H1>";
	  // imprimiendo registros
	  ECHO"<Table Border = 1>";
	  ECHO"<TH> id_empleado </TH>";
	  ECHO"<TH> nombre_Empleado </TH>";
	  ECHO"<TH> apellido_Empleado  </TH>";
	  ECHO"<TH> edad  </TH>";
	  ECHO"<TH> Bono  </TH>";
	  //3.1 Implementando ciclo FOR
	 FOR($i=0; $i<=$row = mysqli_fetch_array($resultados,MYSQLI_ASSOC); $i++){
		  //3.2 Atrapar los indices
	  $id_empleado = $row['id_empleado'];
	  $nombre_Empleado = $row['nombre_Empleado'];
	  $apellido_Empleado = $row['apellido_Empleado'];
	  $edad = $row['edad'];
	  $Bono = $row['Bono'];
	  //3.3 Imprimir resultados
	  ECHO "<TR>";
	  ECHO "<TD>" .$id_empleado."</TD>";
	  ECHO "<TD>" .$nombre_Empleado."</TD>";
	  ECHO "<TD>" .$apellido_Empleado."</TD>";
	  ECHO "<TD>" .$edad."</TD>";
	  ECHO "<TD>" .$Bono."</TD>";
	  ECHO "</TR>";
	  }
	  ECHO"</Table>"
   ?>
   </BODY>
   
  </HTML>