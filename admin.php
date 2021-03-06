<?php
  
  //Llamando clases para iniciar sesion
  require'class/sessions.php';
  $objses = new Sessions();
  $objses->init();

  //Variables de sesion para manejar errores y mensajes
  $mensaje = isset($_SESSION['msg']) ? $_SESSION['msg'] : null ;
  $err = isset($_SESSION['error']) ? $_SESSION['error'] : null ;

  //Variables de sesion para manejar datos del usuario de las sesion actual
  $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;
  $profile = isset($_SESSION['profile']) ? $_SESSION['profile'] : null ;

  //Condicion que bloquea usuarios que no hayan iniciado sesion
  if($user == ''){
  $objses->set('error', '2');
    header('Location: login');
  }

  //Condicion para redirigir a su backend a usuarios estandar
  if($profile == 'estandar'){
    header('Location: estandar');
  }

  //Condiciones para errores
  switch ($err) {
    case 1:
        echo "<script type='text/javascript'>alert('Error: Debe ingresar la contraseña de la sesion actual para guardar cambios');</script>";
        $objses->set('error', '0');
        break;
    case 2:
        echo "<script type='text/javascript'>alert('Error: El nickname de usuario elegido ya existe');</script>";
        $objses->set('error', '0');
        break;
      case 3:
        echo "<script type='text/javascript'>alert('Error: No se puede eliminar el usuario por que es el único administrador');</script>";
        $objses->set('error', '0');
        break;
      case 4:
        echo "<script type='text/javascript'>alert('Error: La contraseña debe ser minimo de 8 dígitos');</script>";
        $objses->set('error', '0');
        break;
      case 5:
        echo "<script type='text/javascript'>alert('Error: No hay usuarios que puedan ser eliminados');</script>";
        $objses->set('error', '0');
        break;
      case 6:
        echo "<script type='text/javascript'>alert('Error: Debe seleccionar la casilla donde acepta estar de acuerdo en eliminar este usuario');</script>";
        $objses->set('error', '0');
        break;
      case 7:
        echo "<script type='text/javascript'>alert('Error: Elija una pregunta para eliminar');</script>";
        $objses->set('error', '0');
        break;
      case 8:
        echo "<script type='text/javascript'>alert('Error: Esta pregunta ya existe');</script>";
        $objses->set('error', '0');
        break;
      case 9:
        echo "<script type='text/javascript'>alert('Error: El tamaño de la imagen es mayor de 5Mb');</script>";
        $objses->set('error', '0');
        break;
      case 10:
        echo "<script type='text/javascript'>alert('Error: Solo se pueden subir archivos de tipo imagen');</script>";
        $objses->set('error', '0');
        break;
      case 11:
        echo "<script type='text/javascript'>alert('Error: Solo se aceptan maximo 10 imágenes a la vez');</script>";
        $objses->set('error', '0');
        break;
      case 12:
        echo "<script type='text/javascript'>alert('Error: Seleccione una pregunta para modificar');</script>";
        $objses->set('error', '0');
        break;
      case 13:
            echo "<script type='text/javascript'>alert('Error: Debe seleccionar una categoría e imagen.');</script>";
            $objses->set('error', '0');
            break;
        case 14:
            echo "<script type='text/javascript'>alert('Error: No ha introducido una descripcion nueva.');</script>";
            $objses->set('error', '0');
            break;
}     
  
  //Condiciones para mensajes
  switch ($mensaje) {
    case 1:
        echo "<script type='text/javascript'>alert('Usuario creado con Exito');</script>";
        $objses->set('msg', '0');
        break;
    case 2:
        echo "<script type='text/javascript'>alert('Usuario modificado con exito');</script>";
        $objses->set('msg', '0');
        break;
    case 3:
        echo "<script type='text/javascript'>alert('Usuario eliminado con exito');</script>";
        $objses->set('msg', '0');
        break;
    case 4:
      echo "<script type='text/javascript'>alert('Los cambios se guardaron correctamente');</script>";
      $objses->set('msg', '0');
      break;
    case 5:
      echo "<script type='text/javascript'>alert('La pregunta se elimino correctamente');</script>";
      $objses->set('msg', '0');
      break;
    case 6:
      echo "<script type='text/javascript'>alert('La pregunta se guardo correctamente');</script>";
      $objses->set('msg', '0');
      break;
}     
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Hojas de estilo personalizadas y bootstrap -->
    <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css"> 
    <link rel="icon" href="img/smart.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php include("class/consulta.php");?>

    <!-- Editor de texto -->  
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/estilos1.css">
    <link rel="stylesheet" type="text/css" href="dist\summernote-bs4.css">

    <title>Configuración | Smart English Institute</title>
  </head>

    <body>
        <header>
            <div class="container-fluid">
                <div class="row text-right">
                    <div class="col edit">
                        <div class="row justify-content-between">

                            <div class="col-md-2">
                                <a href="http://www.smartenglishinstitute.com" target="_blank"><img class="img-fluid" src="img/logo.png"></a>
                            </div>

                            <div class="col-md-5">
                               
                            </div>

                            <!-- recuperando el nombre del usuario de la sesion actual -->
                            <div class="col-md-3 align-self-center text-right">
                                  <div class="text-admin text-subtitulo">¡ hola <?php
                                      $objses = new Sessions();
                                      $objses->init();
                                      $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;
                                      echo "$user";?>! </div>   
                            </div>
                            
                            <!-- Menu desplegable -->
                            <div class="dropdown col-md-1 align-self-center text-left">

                                <button class="btn btn-outline-success no-border" id="dropdownmenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="" src="img/sesion.png" alt="Logo SEI"  width="50"></button>

                                <div class="dropdown-menu" aria-labelledby="dropdownmenu1">
                                  <a class="dropdown-item" href="#configuracion" data-toggle="modal">Configuración de la cuenta</a>
                                  <a class="dropdown-item" href="#eliminar_cuenta_admin" data-toggle="modal">Eliminar esta cuenta</a>

                                  <li class="dropdown-divider"></li>

                                  <a class="dropdown-item" href="#crear_usuario" data-toggle="modal">Crear Usuario</a>
                                  <a class="dropdown-item" href="#eliminar_usuario" data-toggle="modal">Eliminar Usuario</a>

                                  <li class="dropdown-divider"></li>
                                  
                                  <a href="user/log_out" class="dropdown-item" href="login">Cerrar Sesion</a>
                                </div>  
                            </div>

                            <!-- MODAL PARA ELIMINAR LA CUENTA DE ADMIN ACTUAL-->

                            <div class="text">
                                <div class="modal fade" id="eliminar_cuenta_admin">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                    <h4 class="modal-title">Eliminar Cuenta</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>

                                                <form action="class/eliminar_admin" method="POST">
                                                  <div class="modal-body text-left">
                                                          <div class="form-group">
                                                            Introduza la contraseña para eliminar la cuenta actual:<br><br>
                                                        
                                                            <input type="password" class="form-control is-valid" value="" aria-describedby="passwordHelp" name="actual_pass_usuario" placeholder="Contraseña" required>
                                                            <small id="passwordHelp" class="form-text text-muted">*Campo obligatorio para eliminar esta cuenta.</small><br>

                                                            <div class="form-check">
                                                              <input class="form-check-input" type="checkbox" value="" id="checkEliminar_admin" name="checkEliminar_admin" required>
                                                              <label class="form-check-label" for="checkEliminar_admin">
                                                                Estoy seguro de que deseo eliminar mi cuenta.
                                                              </label>
                                                            </div>

                                                          </div>
                                                                                     
                                                  </div>

                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#">Eliminar mi cuenta</button>
                                                    <button type="button" class="btn btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <!-- MODAL PARA CREAR USUARIO -->

                             <div class="text">
                                <div class="modal fade" id="crear_usuario">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                    <h4 class="modal-title">Crear Usuario</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    
                                                </div>

                                                <form action="class/recibir_usuario_nuevo" method="POST">
                                                  <div class="modal-body text-left">
                                                          <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input required type="text" class="form-control" name="nombre_usuario_nuevo" minlength="3" maxlength="100"><br>

                                                            <label>Nombre de usuario (Nickname):</label>
                                                            <input required type="text" class="form-control" name="nickname_usuario_nuevo" minlength="3" maxlength="50"><br>

                                                            <label>Contraseña</label>
                                                            <input required type="password" class="form-control" name="pass_usuario_nuevo" aria-describedby="passwordHelp" minlength="8" maxlength="100">
                                                            <small id="passwordHelp" class="form-text text-muted">Debe contener minimo 8 dígitos.</small><br>

                                                            <label>Tipo de usuario: </label><br>
                                                            <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="tipo_usuario_nuevo" id="radios1" value="estandar" checked>
                                                              <label class="form-check-label" for="radios1">
                                                                Estándar
                                                              </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                              <input class="form-check-input" type="radio" name="tipo_usuario_nuevo" id="radios2" value="admin">
                                                              <label class="form-check-label" for="exampleRadios2">
                                                                Administrador
                                                              </label>
                                                            </div><br><br>

                                                            <label>Contraseña del Administrador*</label>
                                                            <input type="password" class="form-control is-valid" value="" aria-describedby="admin_passwordHelp" name="actual_pass_usuario_nuevo" required>
                                                            <small id="admin_passwordHelp" class="form-text text-muted">*Campo obligatorio para crear usuario nuevo.</small>

                                                          </div>
                                                                                     
                                                  </div>

                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#">Guardar</button>
                                                    <button type="button" class="btn btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <!-- MODAL PARA ELIMINAR USUARIO -->
                            <div class="text">
                                <div class="modal fade" id="eliminar_usuario">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                    <h4 class="modal-title">Eliminar Usuario</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    
                                                </div>

                                                <form action="class/eliminar_usuario" method="POST">
                                                  <div class="modal-body text-left">
                                                          <div class="form-group">

                                                            <label>Seleccione un usuario a eliminar: </label><br>
                                                            <select class="form-control" name="usuario_eliminar">
                                                            <?php

                                                            $obj = new consultas();
                                                            $obj->recuperarUsuariosStndr();?>
                                                            </select><br>

                                                            <label>Contraseña del Administrador*</label>
                                                            <input type="password" class="form-control is-valid" value="" aria-describedby="passwordHelp" name="actual_pass_usuario" required>
                                                            <small id="passwordHelp" class="form-text text-muted">*Campo obligatorio para eliminar usuario.</small><br>

                                                            <div class="form-check">
                                                              <input class="form-check-input" type="checkbox" value="" id="checkEliminar" name="checkEliminar" required>
                                                              <label class="form-check-label" for="checkEliminar">
                                                                Estoy seguro de que deseo eliminar este usuario.
                                                              </label>
                                                            </div>

                                                          </div>
                                                                                     
                                                  </div>

                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success text-right text-guardar">Eliminar</button>
                                                    <button type="button" class="btn btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <!-- MODAL PARA CONFIGURAR CUENTA -->
                            <div class="text">
                                <div class="modal fade" id="configuracion">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                    <h4 class="modal-title">Configuración de la cuenta</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    
                                                </div>

                                                <form action="class/recibir_config" method="POST">
                                                  <div class="modal-body text-left">
                                                          <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input required type="text" class="form-control" name="nombre_usuario" minlength="3" maxlength="100" value="<?php
                                                            $objses = new Sessions();
                                                            $objses->init();

                                                            $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

                                                            $con = new consultas();
                                                            $con->recuperarUsuario('nombre', $user);?>"><br>

                                                            <label>Nombre de usuario (Nickname)</label>
                                                            <input required type="text" class="form-control" name="nickname_usuario" minlength="3" maxlength="50" value="<?php
                                                            $objses = new Sessions();
                                                            $objses->init();

                                                            $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

                                                            $con = new consultas();
                                                            $con->recuperarUsuario('nickname', $user);?>" ><br>

                                                            <label>Contraseña</label>
                                                            <input required type="password" class="form-control" name="pass_usuario" minlength="8" maxlength="100" value="<?php
                                                            $objses = new Sessions();
                                                            $objses->init();

                                                            $user = isset($_SESSION['user']) ? $_SESSION['user'] : null ;

                                                            $con = new consultas();
                                                            $con->recuperarUsuario('contrasena', $user);?>" ><br>

                                                            <label>Contraseña Actual*</label>
                                                            <input type="password" class="form-control is-valid" value="" aria-describedby="passwordHelp" name="actual_pass_usuario" required>
                                                            <small id="passwordHelp" class="form-text text-muted">*Campo obligatorio para guardar cambios.</small>

                                                          </div>
                                                                                     
                                                  </div>

                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#">Guardar</button>
                                                    <button type="button" class="btn btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <!-- Div solo para que la imagen de perfil no este totalmente pegada a la derecha -->
                              <div class="col-md-1">
                             </div>

                        </div>            
                    </div>
                </div>
            </div>
        </header>

    <!--  *****************************INFORMACION GENERAL******************************************** --> 
        <div class="container-fluid">
            <section class="row justify-content-lg-center">
                <article class="col-lg-10">
                    <div id="accordion">
                        <!-- Informacion general -->
                        <div class="card" >
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_IG" aria-expanded="false" aria-controls="collapseOne" >
                                        <i class="material-icons ">&#xE145;</i> Información General 
                                    </button>
                                </h5>
                            </div>
        
                            
                            <div id="collapse_IG" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <form action="class/recibir_ig" method="POST">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#q_somos" role="tab" aria-controls="nav-home" aria-selected="true"><h5> ¿Quiénes Somos? </h5></a>
                                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#mision" role="tab" aria-controls="nav-profile" aria-selected="false"><h5> Misión </h5></a>
                                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="nav-contact" aria-selected="false"><h5> Visión </h5></a>
                                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#historia" role="tab" aria-controls="nav-contact" aria-selected="false"><h5>  Historia </h5></a>
                                        </div>
                                    </nav>
                                  
                                  <!-- Recuperando informacion de la base de datos para modificar -->
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="q_somos" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="form-group">

                                            <br>
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="q_somos_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('quienes somos','titulo_ig');

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                               <label>Información</label>
                                                 <textarea class="form-control summernote" name="q_somos_info"><?php
                                                          
                                                          $con = new consultas();
                                                          $con->recuperarIG('quienes somos','info_ig');

                                                  ?></textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="text" class="form-control" name="mision_img" value="<?php
                                                        //  $con = new consultas();
                                                        //  $con->recuperarIG('quienes somos','img_ig');  

                                                  ?>">
                                        </div> -->

                                    </div>

                                    <div class="tab-pane fade" id="mision" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="mision_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('mision','titulo_ig');  

                                                  ?>"> 
                                        </div> 

                                        <div class="form-group">
                                            <label>Información</label>
                                            <textarea class="form-control summernote" name="mision_info"><?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('mision','info_ig');  

                                                  ?></textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="text" class="form-control" name="mision_img" value="<?php
                                                        //  $con = new consultas();
                                                        //  $con->recuperarIG('mision','img_ig');  

                                                  ?>">
                                        </div> -->
                                    </div>

                                    <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="vision_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('vision','titulo_ig');  

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                            <label>Información</label>
                                            <textarea class="form-control summernote" name="vision_info"><?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('vision','info_ig');  

                                                  ?></textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="text" class="form-control" name="vision_img" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('vision','img_ig');  

                                                  ?>">
                                        </div> -->
                                    </div>


                                    <div class="tab-pane fade" id="historia" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="historia_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('historia','titulo_ig');  

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                            <label>Información</label>
                                            <textarea class="form-control summernote" rows="15" name="historia_info"><?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('historia','info_ig');  

                                                  ?></textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Imagen</label>
                                            <input type="text" class="form-control" name="historia_img" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarIG('historia','img_ig');  

                                                  ?>">
                                        </div> -->

                                    </div>

                                  </div>
                                  
                                  <!-- Boton de guardar -->
                                  <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_ig">
                                    Guardar
                                  </button>

                                  <!-- Modal activado por el boton "Guardar"-->
                                  <div class="modal fade" id="guardar_ig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          ¿Estás seguro de que deseas guardar cambios?
                                        </div>
                                        <div class="modal-footer">

                                          <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                          <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Boton de cancelar -->
                                  <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>
                                  <label>Última modificación: <?php
                                                $con = new consultas();
                                                $con->recuperarMod('informacion_general','fecha_mod_ig','','');

                                            ?></label>
                                </form>

                              </div>
                            </div>
                        </div>
                        <!-- FAQS -->
                        <div class="card" >
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_FAQS" aria-expanded="false" aria-controls="collapseTwo">
                                  <i class="material-icons">&#xE145;</i> Preguntas Frecuentes 
                                </button>
                              </h5>
                            </div>
                            <div id="collapse_FAQS" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                
                                <!-- Menu para agregar, modificar y eliminar FAQ -->
                                <div class="row">
                                  <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                      <a class="list-group-item list-group-item-action active" data-toggle="list" href="#agregar_faq" role="tab" aria-controls="home">Agregar Pregunta</a>
                                      <a class="list-group-item list-group-item-action" data-toggle="list" href="#modificar_faq" role="tab" aria-controls="profile">Modificar Pregunta</a>
                                      <a class="list-group-item list-group-item-action" data-toggle="list" href="#eliminar_faq" role="tab" aria-controls="messages">Eliminar Pregunta</a>
                                    </div>
                                  </div>
                                  <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                      <div class="tab-pane fade show active" id="agregar_faq" role="tabpanel" aria-labelledby="list-home-list">
                                        
                                        <!-- Formulario de agregado de FAQ -->
                                        <form action="class/recibir_faq" method="POST">
                                          <div class="form-group">
                                            <h5>Agregar Pregunta</h5><br>
                                            
                                            <input class="form-control" type="text" id="input_faq" name="faq" placeholder="Pregunta" aria-describedby="faq_help" minlength="10" maxlength="200" oninvalid="cerrarModal(this.id, 'guardar_faq')" required pattern="(?=.*[¿])(?=.*[?]).+">
                                            <small id="faq_help" class="form-text text-muted">Debe ingresar los signos "¿" y "?" y contener al menos 10 caracteres.</small><br>

                                            <textarea class="form-control" row="3" placeholder="Respuesta" id="input_resp" name="faq_respuesta" minlength="2" maxlength="2000" oninvalid="cerrarModal(this.id, 'guardar_faq')" required></textarea>
                                             <small id="faq_help" class="form-text text-muted">Debe contener al menos 2 caracteres.</small>

                                          </div>

                                          <button type="button" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_faq">Guardar</button>
                                          
                                          <!-- Modal de confirmacion -->
                                          <div class="modal fade" id="guardar_faq" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                  <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  ¿Estás seguro de que deseas guardar esta pregunta?
                                                </div>
                                                <div class="modal-footer">

                                                  <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                  <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <!-- Boton de cancelar -->
                                          <input type="button" value="Cancelar" class="btn btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/>

                                        </form>
                                    </div>
                                      <div class="tab-pane fade" id="modificar_faq" role="tabpanel" aria-labelledby="list-profile-list">
                                        
                                        <!-- Formulario para modificar FAQ -->
                                        <form action="class/recibir_config_faq" method="POST">
                                          <div class="form-group">
                                            <h5>Modificar Pregunta</h5><br>
                                            
                                            <!-- Llamando al metodo de AJAX -->
                                            <select class="form-control" type="text" name="faq_titulo" onchange="showFAQ(this.value)">
                                            <option>Elija una pregunta</option>
                                            <?php

                                              $obj = new consultas();
                                              $obj->recuperarFAQS('titulo_ig');?></select><br>

                                            <input class="form-control" type="text" id="txtHint" id="input_mod_faq" name="faq_mod_titulo" placeholder="Pregunta" aria-describedby="faq_mod_help" minlength="10" maxlength="200" oninvalid="cerrarModal(this.id, 'modificar_faq_especifica')" pattern="(?=.*[¿])(?=.*[?]).+">
                                            <small id="faq_mod_help" class="form-text text-muted">Debe ingresar los signos "¿" y "?" y contener al menos 10 caracteres.</small><br>

                                            <textarea class="form-control" id="txtHint_2" rows="5" id="input_mod_resp" name="faq_mod_info" placeholder="Respuesta" minlength="2" maxlength="2000" oninvalid="cerrarModal(this.id ,'modificar_faq_especifica')"></textarea>
                                            <small id="faq_help" class="form-text text-muted">Debe contener al menos 2 caracteres.</small><br>

                                            <button type="button" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#modificar_faq_especifica">Guardar</button>

                                          </div>
                                          
                                          <!-- Modal de confirmacion -->
                                          <div class="modal fade" id="modificar_faq_especifica" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                  <h5 class="modal-title" id="exampleModalLabel">Modificar Pregunta</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  ¿Estás seguro de que deseas guardar esta pregunta?
                                                </div>
                                                <div class="modal-footer">

                                                  <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                  <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                        </form>

                                      </div>
                                      
                                      <!-- Formulario para eliminar FAQ -->
                                      <div class="tab-pane fade" id="eliminar_faq" role="tabpanel" aria-labelledby="list-messages-list">
                                        <form action="class/eliminar_faq" method="POST">
                                          <div class="form-group">
                                            <h5>Eliminar Pregunta</h5><br>
                                            
                                            <label>Pregunta</label>
                                            <select class="form-control" type="text" name="faq_eliminar">
                                            <option>Elija una pregunta</option>
                                            <?php

                                              $obj = new consultas();
                                              $obj->recuperarFAQS('titulo_ig');?></select><br>

                                            <label>Contraseña Actual*</label>
                                            <input type="password" class="form-control is-valid" value="" aria-describedby="passwordHelp" name="actual_pass_usuario" required>
                                            <small id="passwordHelp" class="form-text text-muted">*Campo obligatorio para guardar cambios.</small><br>


                                            <button type="button" class="btn btn-success text-right text-guardar" data-toggle="modal" data-target="#eliminar_faq_especifica">Eliminar</button>

                                          </div>

                                        
                                          <!-- Modal de confirmacion -->
                                          <div class="modal fade" id="eliminar_faq_especifica" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header modal-header-custom">
                                                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Pregunta</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  ¿Estás seguro de que deseas eliminar esta pregunta?
                                                </div>
                                                <div class="modal-footer">

                                                  <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                  <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                

                              </div>
                            </div>
                        </div>
                        <!--  CURSOS --> 
                        <div class="card" >
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_Cursos" aria-expanded="false" aria-controls="collapseTwo">
                                  <i class="material-icons">&#xE145;</i> Cursos 
                                </button>
                              </h5>
                            </div>

                            <!-- Formulario de configuracion de cursos -->
                            <div id="collapse_Cursos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                  <form action="class/recibir" method="POST">

                                    <nav>
                                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#curso_regular" role="tab" aria-controls="nav-home" aria-selected="true"><h5> Regular </h5></a>
                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#curso_semestral" role="tab" aria-controls="nav-profile" aria-selected="false"><h5> Semestral </h5></a>
                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#curso_sabatino" role="tab" aria-controls="nav-contact" aria-selected="false"><h5> Sabatino </h5></a>
                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#curso_verano" role="tab" aria-controls="nav-contact" aria-selected="false"><h5>  Verano </h5></a>
                                    </div>
                                  </nav>
                                  
                                  <!-- Recuperando informacion de la base de datos para modificar -->
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="curso_regular" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="form-group">
                                            <br>
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="regular_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('regular','titulo_curso');  

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                               <label>Información del curso</label>
                                                 <textarea class="form-control summernote" rows="15" name="regular_info"><?php
                                                          
                                                          $con = new consultas();
                                                          $con->recuperarCurso('regular','info_curso');

                                                  ?></textarea>
                                        </div>

                                        <div class="form-group">
                                          <label>Enlace del video: </label>
                                          <input type="text" class="form-control" name="regular_enlace" maxlength="300" value="<?php
                                                          
                                                          $con = new consultas();
                                                          $con->recuperarCurso('regular','video_curso');

                                                  ?>">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="curso_semestral" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="semestral_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('semestral','titulo_curso');  

                                                  ?>"> 
                                        </div> 

                                        <div class="form-group">
                                            <label>Información del curso</label>
                                            <textarea class="form-control summernote" rows="15" name="semestral_info"><?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('semestral','info_curso');  

                                                  ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Enlace del video: </label>
                                            <input type="text" class="form-control" name="semestral_enlace" maxlength="300" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('semestral','video_curso');  

                                                  ?>">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="curso_sabatino" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="sabatino_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('sabatino','titulo_curso');  

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                            <label>Información del curso</label>
                                            <textarea class="form-control summernote" rows="15" name="sabatino_info" ><?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('sabatino','info_curso');  

                                                  ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Enlace del video: </label>
                                            <input type="text" class="form-control" name="sabatino_enlace" maxlength="300" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('sabatino','video_curso');  

                                                  ?>">
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="curso_verano" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" class="form-control" name="verano_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('verano','titulo_curso');  

                                                  ?>">
                                        </div> 

                                        <div class="form-group">
                                            <label>Información del curso</label>
                                            <textarea class="form-control summernote" rows="15" name="verano_info"><?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('verano','info_curso');  

                                                  ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Enlace del video: </label>
                                            <input type="text" class="form-control" name="verano_enlace" maxlength="300" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('verano','video_curso');  

                                                  ?>">
                                        </div>

                                    </div>
                                  </div>
                                  
                                  <!-- Boton de guardar -->
                                  <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_curso">
                                    Guardar
                                  </button>

                                  <!-- Modal activado por el boton "Guardar"-->
                                  <div class="modal fade" id="guardar_curso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          ¿Estás seguro de que deseas guardar cambios?
                                        </div>
                                        <div class="modal-footer">

                                          <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                          <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <!-- Boton de cancelar -->
                                  <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>

                                  <label>Última modificación: <?php
                                                $con = new consultas();
                                                $con->recuperarMod('cursos','fecha_mod_curso','tipo_curso','regular');

                                            ?></label>
                                      </form>

                              </div>
                            </div>
                        </div>
                        <!--  CLUB DE CONVERSACION -->            
                        <div class="card" >
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_Club" aria-expanded="false" aria-controls="collapseThree">
                                  <i class="material-icons">&#xE145;</i> Club de Conversación 
                                </button>
                              </h5>
                            </div>

                            <!-- Formulario de configuracion del club de conversacion -->
                            <div id="collapse_Club" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                  <form action="class/recibir_club" method="POST">
                                    <div class="form-group">
                                      <label>Titulo</label>
                                      <input type="text" class="form-control" name="club_titulo" maxlength="100" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('club','titulo_curso');

                                                  ?>">
                                    </div> 

                                    <div class="form-group">
                                       <label>Información del curso</label>
                                       <textarea class="form-control summernote" rows="15" name="club_info"><?php
                                            $con = new consultas();
                                            $con->recuperarCurso('club','info_curso');  

                                          ?></textarea>
                                    </div>

                                    <div class="form-group">
                                      <label>Enlace del video: </label>
                                      <input type="text" class="form-control" name="club_enlace" maxlength="300" value="<?php
                                                          $con = new consultas();
                                                          $con->recuperarCurso('club','video_curso');  

                                                  ?>">
                                    </div>
                                  <!-- Boton de guardar -->
                                  <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_club">
                                    Guardar
                                  </button>

                                  <!-- Modal activado por el boton "Guardar"-->
                                  <div class="modal fade" id="guardar_club" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          ¿Estás seguro de que deseas guardar cambios?
                                        </div>
                                        <div class="modal-footer">

                                          <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                          <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Boton de cancelar -->
                                  <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>

                                  <label>Ultima modificación: <?php
                                                $con = new consultas();
                                                $con->recuperarMod('cursos','fecha_mod_curso','tipo_curso','club');

                                            ?></label>
                                      </form>
                                        
                              </div>
                            </div>
                        </div>
                        <!--  GALERIA -->                           
                        <div class="card" >
                            <div class="card-header" id="headingFour">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_galeria" aria-expanded="false" aria-controls="collapseFour">
                                  <i class="material-icons">&#xE145;</i> Galeria 
                                </button>
                              </h5>
                            </div>
            
                            <div id="collapse_galeria" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                              <div class="card-body">

                                <div class="row">
                                    <div class="col-4">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#subir_fotos" role="tab" aria-controls="home">Subir Fotos</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#editar_fotos" role="tab" aria-controls="profile">Editar Fotos</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#eliminar_fotos" role="tab" aria-controls="messages">Eliminar Fotos</a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- Subir Fotos -->
                                            <div class="tab-pane fade show active" id="subir_fotos" role="tabpanel" aria-labelledby="list-home-list">
                                                <form action="class/recibir_galeria" method="POST" enctype="multipart/form-data" class="needs-validation">
                                                    <div class="container-fluid">
                                                        <h5>Subir fotos</h5><br>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-3">
                                                                <div class="input-group-prepend">
                                                                    <label>Categoría</label>
                                                                </div>

                                                                <div class="input-group form-group">
                                                                    <select class="custom-select" id="inputGroupSelect01" name="categoria" required>
                                                                        <option selected disabled value="0">Escoja...</option>
                                                                        <option value="Graduados">Graduados</option>
                                                                        <option value="Cuadro_de_Honor">Cuadro de Honor</option>
                                                                        <option value="Eventos_Especiales">Eventos Especiales</option>
                                                                        <option value="Otros">Otras fotos</option>
                                                                    </select>
                                                                    <div class="invalid"></div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <div>
                                                                    <label>Seleccione Imagen</label>
                                                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" accept=".png, .jpg, .jpeg, .PNG, .JPEG, .JPG" multiple="true" name="valor_imagen[]" required>
                                                                    <small class="form-text text-muted">
                                                                          Máximo 10 imágenes por carga, formatos: .jpg, .jpeg o .png.
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-md-7">
                                                                <label>Descripción</label>
                                                                    <div class="input-text">
                                                                        <textarea class="form-control" name="descripcion" placeholder="Escriba aquí una descripcion para sus imágenes..."></textarea>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- Boton de guardar -->
                                                    <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_galeria">
                                                      Guardar
                                                    </button>

                                                    <!-- Modal activado por el boton "Guardar"-->
                                                      <div class="modal fade" id="guardar_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                              ¿Estás seguro de que deseas guardar cambios?
                                                            </div>
                                                            <div class="modal-footer">

                                                              <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                              <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    
                                                    <!-- Boton de cancelar -->
                                                    <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>
                                                </form>

                                            </div>

                                            <!-- Modificar Fotos -->
                                            <div class="tab-pane fade" id="editar_fotos" role="tabpanel" aria-labelledby="list-profile-list">
                                                <form action="class/modificar_foto.php" method="POST" class="needs-validation">
                                                    <div class="container-fluid">
                                                        <h5>Modificar la descripcion de las fotos</h5><br>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <div class="input-group-prepend">
                                                                    Categoría
                                                                </div>
                                                                <div class="input-group-prepend">
                                                                    <select class="custom-select" id="categoria_1" name="categoria_1" required>
                                                                        <option selected disabled value="0">Escoja...</option>
                                                                        <option value="Graduados">Graduados</option>
                                                                        <option value="Cuadro_de_Honor">Cuadro de Honor</option>
                                                                        <option value="Eventos_Especiales">Eventos Especiales</option>
                                                                        <option value="Otros">Otras fotos</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group-prepend" >
                                                                    Escoja una foto:
                                                                </div>
                                                                <div class="input-group-prepend">
                                                                    <select class="custom-select" id="fotos_1" name="fotos_1" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                 <div class="input-group-prepend" >
                                                                    Escogió esta foto:
                                                                </div>
                                                                <div class="container-fluid" id="img_1">
                                                                    <img src="./img/img.png" class="img-thumbnail img-fluid" alt="Foto a modificar" style="margin: 10px; margin-bottom: 25px;">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group-prepend">
                                                                    Descripción:
                                                                </div>
                                                                <div class="input-text">
                                                                    <textarea class="form-control" id ="descripcion_1"name="descripcion_1" required placeholder="Escriba aquí una descripcion para sus imágenes..."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- Boton de guardar -->
                                                    <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#modificar_galeria">
                                                        Guardar
                                                    </button>

                                                    <!-- Modal activado por el boton "Guardar"-->
                                                    <div class="modal fade" id="modificar_galeria" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                              ¿Estás seguro de que deseas guardar cambios?
                                                            </div>
                                                            <div class="modal-footer">

                                                              <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                              <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <!-- Boton de cancelar -->
                                                    <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>
                                                </form>
                                                
                                            </div>

                                            <!-- Eliminar Fotos -->
                                            <div class="tab-pane fade" id="eliminar_fotos" role="tabpanel" aria-labelledby="list-messages-list">
                                                <form action="class/eliminar_foto.php" method="POST" class="needs-validation">
                                                    <div class="container-fluid">
                                                        <h5>Eliminar fotos</h5><br>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-3">
                                                                <div class="input-group-prepend" >
                                                                    Categoría
                                                                </div>
                                                                <div class="input-group-prepend">
                                                                    <select class="custom-select" id="categoria_2" name="categoria_2" required>
                                                                        <option selected disabled>Escoja...</option>
                                                                        <option value="Graduados">Graduados</option>
                                                                        <option value="Cuadro_de_Honor">Cuadro de Honor</option>
                                                                        <option value="Eventos_Especiales">Eventos Especiales</option>
                                                                        <option value="Otros">Otras fotos</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="input-group-prepend" >
                                                                    Escoja una foto:
                                                                </div>
                                                                <div class="input-group-prepend">
                                                                    <select class="custom-select" id="fotos_2" name="fotos_2" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                    
                                                    <div class="row ">
                                                        <div class="col-md-4">
                                                            <div class="input-group-prepend" >
                                                                Escogió esta foto:
                                                            </div>
                                                            <div class="container-fluid" id="img_2">
                                                                <img src="./img/img.png" class="img-thumbnail img-fluid" alt="Foto a Eliminar"style="margin: 10px; margin-bottom: 25px;">
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                    <!-- Boton de Eliminar -->
                                                    <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#eliminar_galeria">
                                                        Eliminar
                                                    </button>

                                                    <!-- Modal activado por el boton "Eliminar"-->
                                                        <div class="modal fade" id="eliminar_galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                              ¿Estás seguro de que deseas eliminar la foto?
                                                            </div>
                                                            <div class="modal-footer">

                                                              <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                                              <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                                              
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                        <!-- Boton de cancelar -->
                                                        <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                              </div>
                            </div>
                        </div>
                        <!--  CONTACTO -->                           
                        <div class="card" >
                            <div class="card-header" id="headingFive">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed accordion-style text-admin text-subtitulo" data-toggle="collapse" data-target="#collapse_Contacto" aria-expanded="false" aria-controls="collapseFive">
                                 <i class="material-icons">&#xE145;</i> Contacto 
                                </button>
                              </h5>
                            </div>

                            <!-- Formulario para configurar informacion de contacto -->
                            <div id="collapse_Contacto" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                              <div class="card-body">
                                <form action="class/recibir_contacto" method="POST">
                                  <div class="form-group">

                                    <h5> Datos de Contacto </h5>

                                    <div class="form-group">
                                      <label>Teléfono</label>
                                      <input type="text" class="form-control" oninvalid="cerrarModal(this.id, 'guardar_contacto', 'boton_guardar_contacto')" id="input_tel" name="contacto_telefono" minlength="7" maxlength="20" pattern="[0-9+-]+" required value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('telefono');

                                            ?>">
                                      <small class="form-text text-muted">Introduzca solo números (Al menos 7 dígitos). Los símbolos "-" y "+" también son admitidos.</small>

                                    </div> 

                                    <div class="form-group">
                                       <label>Celular</label>
                                       <input type="text" class="form-control" oninvalid="cerrarModal(this.id, 'guardar_contacto')" id="input_cel" name="contacto_celular" minlength="10" maxlength="20" pattern="[0-9+-]+" required value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('celular');

                                            ?>">
                                        <small class="form-text text-muted">Introduzca solo números (Al menos 10 dígitos). Los símbolos "-" y "+" también son admitidos.</small>

                                    </div>

                                    <div class="form-group">
                                      <label>Correo Electrónico </label>
                                      <input type="email" class="form-control" oninvalid="cerrarModal(this.id, 'guardar_contacto')" id="input_email" name="contacto_email" maxlength="50" value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('email_contacto');

                                            ?>">
                                    </div>

                                    <div class="form-group">
                                       <label>Dirección</label>
                                       <textarea class="form-control summernote" rows="2" id="input_direccion" name="contacto_direccion"><?php
                                                $con = new consultas();
                                                $con->recuperarContacto('direccion_contacto');

                                            ?></textarea>
                                    </div>

                                    <h5> Redes Sociales </h5>

                                    <div class="form-group">
                                      <label>Enlace a Facebook</label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="facebook">https://www.facebook.com/</span>
                                        </div>
                                        <input type="text" class="form-control" maxlength="100" aria-describedby="facebook" name="contacto_facebook" value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('enlace_facebook');

                                            ?>">
                                      </div>
                                    </div> 

                                    <div class="form-group">
                                       <label>Enlace a Twitter</label>
                                       <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="twitter">https://www.twitter.com/</span>
                                        </div>
                                        <input type="text" class="form-control" maxlength="100" aria-describedby="twitter" name="contacto_twitter" value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('enlace_twitter');

                                            ?>">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Enlace a Instagram </label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="instagram">https://www.instagram.com/</span>
                                        </div>
                                        <input type="text" class="form-control" maxlength="100" aria-describedby="instagram" name="contacto_instagram" value="<?php
                                                $con = new consultas();
                                                $con->recuperarContacto('enlace_instagram');

                                            ?>">
                                      </div>              
                                    </div>
                                    
                                  </div>
                                  <!-- Boton de guardar -->
                                  <button type="button" class="btn btn-lg btn-success text-right text-guardar" data-toggle="modal" data-target="#guardar_contacto" id="boton_guardar_contacto">
                                    Guardar
                                  </button>

                                  <!-- Modal activado por el boton "Guardar"-->
                                  <div class="modal fade" id="guardar_contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Guardar Cambios</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          ¿Estás seguro de que deseas guardar los cambios?
                                        </div>
                                        <div class="modal-footer">

                                          <button type="submit" class="btn btn-lg btn-success text-right text-guardar">Guardar</button>
                                          <button type="button" class="btn btn-lg btn-outline-secondary text-center text-cancel" data-dismiss="modal">Cerrar</button>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Boton de cancelar -->
                                  <input type="button" value="Cancelar" class="btn btn-lg btn-outline-secondary text-center text-cancel" onclick="javascript:window.location.reload();"/><br><br>

                                  <label>Ultima modificación: <?php
                                                $con = new consultas();
                                                $con->recuperarMod('contacto','fecha_mod_contacto','','');

                                            ?></label> 
                                    </form>
                                        
                              </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </body>

    <footer>
        <!-- Boton para cerrar sesion -->
        <a href="user/log_out" class="btn btn-lg btn-outline-success text-center text-volver">
            SALIR
        </a>

        <!-- Marca de SEI -->
        <div style="backgrond-color: #00204A" class="container-fluid align-self-center text-center">
          <p style="text-align: centr;" class="footer-custom ">
            <br> Smart English Institute &copy;
          </p>    
        </div>

    </footer>
     
     <!-- Scripts: Bootstrap, Jquery y editor de texto -->
    <script src="js\jquery.js"></script>
    <script src="js\popper.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="dist\summernote-bs4.js"></script>
    <script src="dist\lang\summernote-es-ES.js"></script>
    <script src="js/galeria.js"></script>

    <!-- Script para personalizar el editor de texto -->
    <script>

      $('.summernote').summernote({
        placeholder: 'Introduzca su informacion aqui',
        tabsize: 2,
        height: 200,
        disableDragAndDrop: true,
        lang: "es-ES",
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36'],

        toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['undo-redo', ['undo', 'redo']]
      ]

      });
      

    </script>

    <!-- Script de AJAX para desplegar los datos de las FAQS en el area de modificación -->
    <script>
        function showFAQ(str) {

            if (str == "Elija una pregunta") {
                document.getElementById("txtHint").value = "";
                document.getElementById("txtHint_2").value = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").value = this.responseText;
                    }
                };
                xmlhttp.open("GET","../class/get_titulo_faq.php?q="+str,true);
                xmlhttp.send();
            }

            if (str == "Elija una pregunta") {
                document.getElementById("txtHint_2").value = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint_2").value = this.responseText;
                    }
                };
                xmlhttp.open("GET","../class/get_info_faq.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>


    <!-- Script para cerrar modal de confirmacion en caso de campo invalido -->
    <script>

      function cerrarModal(input, modal) {

        $('#'+modal).modal('hide');
        $('#'+modal).on('hidden.bs.modal', function (e) {
          document.getElementById(input).focus();

        })
         
      }

    </script>
      
</html>
