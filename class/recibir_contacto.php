<?php
	require'../class/sessions.php';
	$objses = new Sessions();
	$objses->init();

	$user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;
	$iduser = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : null ;
	
	if($user == ''){
	  header('Location: 403/');
	}
	else{

		//mysqli_connect() ocupa SERVIDOR, USUARIO, CONTRASEÑA y BASE DE DATOS
		$con= mysqli_connect('localhost','root','','sei_bd') or die('Error en la conexion al servidor');
		$sql_1="UPDATE contacto SET id_contacto=100, telefono='".$_POST["contacto_telefono"]."', celular ='".$_POST["contacto_celular"]."', email_contacto='".$_POST["contacto_email"]."', direccion_contacto ='".$_POST["contacto_direccion"]."', enlace_facebook='".$_POST["contacto_facebook"]."', enlace_twitter='".$_POST["contacto_twitter"]."', enlace_instagram='".$_POST["contacto_instagram"]."', FK_id_usuario='$iduser' WHERE id_contacto=100";

		//Variable de Query de SQL, requiere parametros de mysqli_connect($con) y instruccion de SQL($sql)
		$resultado_1=mysqli_query($con, $sql_1) or die ('Error en el query database 1');

		//cierra la conexion
		mysqli_close($con);
		$objses->set('msg', '4');
		header("location: ../admin");
	} 


 ?>