<?php
	ECHO "Iniciando proceso de transferencia de arhivo</BR>";
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "examen_2";

	$conexion = mysqli_connect($servername, $username, $password, $database); 
	if ($conexion = true){
		echo "Conexion exitosa</BR>"; 
	}


	IF(ISSET ($_POST["submit"])){
		
		
		$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
		$archivoDestino = "imagenes/".$_FILES["fileToUpload"]["name"];
	
	}


	$imageFileType = pathinfo($archivoDestino,PATHINFO_EXTENSION);

	$check = getimagesize($archivoOrigen);


	if($check!==false){ 
	 
	echo "El archivo, es una lmagen </BR>"; 
	
	move_uploaded_file($archivoOrigen,$archivoDestino); 
	
	$query = "INSERT INTO viajeros (id_viajero, nombre_viajero, fecha_viajero , url_boleto_avion) VALUES (NULL, 'kevin', '22-/06/2018', boleto_01.gif)";
	
	$query_a_ejecutar = mysqli_query(mysqli_connect($servername, $username, $password, $database), "INSERT INTO usuarios (id_viajero, nombre_viajero, fecha_viajero , url_boleto_avion) VALUES (NULL, 'kevin', '22-/06/2018', '".$archivoDestino."')");
	
	if($query_a_ejecutar){ 
		ECHO "Query ejecutado correctamente</br>"; 
		HEADER("Refresh: 5; url=consulta.php"); 
		} else { 
			ECHO "Query no ejecutado</br>"; 
		} 
	}else{ 
		echo "El archivo NO es un gif</BR>"; 
	}
?>