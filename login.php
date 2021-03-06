<?php

// Llamando a la clase para iniciar sesion
  require'class/sessions.php';
  $objses = new Sessions();
  $objses->init();

  // Variables para manejar errores y mensajes
  $mensaje = isset($_SESSION['msg']) ? $_SESSION['msg'] : null ;
  $err = isset($_SESSION['error']) ? $_SESSION['error'] : null ;
  $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

  //Condiciones para mensajes y errores
  if($mensaje==1){
    echo "<script type='text/javascript'>alert('Usuario eliminado con exito');</script>";
    $objses->destroy();
  }

  if($err==1){
    echo "<script type='text/javascript'>alert('Usuario o Contraseña Erróneos.');</script>";
    $objses->destroy();
  }
  if($err==2){
    echo "<script type='text/javascript'>alert('Debe iniciar sesion para poder acceder el sitio.');</script>";
    $objses->destroy();
  }

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Hojas de estilo personalizadas, Boostrap y fuentes de Google -->
  <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos1.css">
  <link rel="icon" href="img/smart.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="screen" />

    <title>Iniciar Sesión | Smart English Institute</title>
  </head>

  <!-- Formulario de inicio de sesion -->
  <body class="text-center login">
    <form class="form-signin border border-success rounded" action="class/session_init" method="POST">

      <a href="http://www.smartenglishinstitute.com"><img class="mb-4" src="img/logo.png" alt="Smart English Institute" width="80%" height="autofocus"></a><br>
      <img class="mb-4" src="img/sesion.png" alt="" width="70" height="70">
      
      <h3>Iniciar Sesión</h3>
      <hr class="my-4">

      <label for="inputNickname" class="sr-only">Nombre de usuario:</label>
      <input type="text" name="nickname" id="inputNickname" class="form-control" placeholder="Nombre de usuario" required autofocus>

      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
      <br>
      <button class="btn btn-lg btn-success btn-block" type="submit" >Entrar</button>
      <p class="text-center mt-5 mb-3 text-muted">Smart English Institute &copy;</p>
    </form>
  </body>
</html>
