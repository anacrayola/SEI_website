<?php

	class cursos{
		
		function recuperarInfo(){
			$host = "localhost";
			$user = "root";
			$pw = "";
			$db = "sei_bd";

			$con = mysqli_connect($host, $user, $pw, $db) or die ('Error en la conexion al servidor');

			$query = "SELECT * from cursos";
			$resultado = mysqli_query($con, $query);

			$fila = mysqli_fetch_array($resultado);
				
			echo "$fila[info_curso]";
			
			mysqli_close($con);

		}
		
		function recuperarTitulo(){
			$host = "localhost";
			$user = "root";
			$pw = "";
			$db = "sei_bd";

			$con = mysqli_connect($host, $user, $pw, $db) or die ('Error en la conexion al servidor');

			$query = "SELECT * from cursos";
			$resultado = mysqli_query($con, $query);

			$fila = mysqli_fetch_array($resultado);
				
			echo "$fila[titulo_curso]";
			
			mysqli_close($con);

		}

		function recuperarEnlace(){
			$host = "localhost";
			$user = "root";
			$pw = "";
			$db = "sei_bd";

			$con = mysqli_connect($host, $user, $pw, $db) or die ('Error en la conexion al servidor');

			$query = "SELECT * from cursos";
			$resultado = mysqli_query($con, $query);

			$fila = mysqli_fetch_array($resultado);
				
			echo "$fila[video_curso]";
			
			mysqli_close($con);

		}
	}

?>