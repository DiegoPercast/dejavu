<?php
//Variables para imprimir las distintas opciones
$login = '
<div id="login">
<img src="assets/img/logos/rojo.png" alt="logo" class="logoform">
<div class="Titulo">Iniciar sesión</div>
<form action="account.php" class="form" method="POST">
    <input type="email" name="nombrecorreo" id="nombrecorreo" placeholder="Correo electronico" required>
    <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
    <input type="submit" name="submit" class="enviar" value="Iniciar sesión">
    <input type="hidden" name="typeuser" value="normal">
</form>
<p id="sincuenta">¿No tienes una cuenta? Registrate <a href="account.php?tipo=signup">click aqui</a></p>
<p id="sincuenta"> Si eres administrador <a href="account.php?tipo=admin">click aqui</a></p>
<a href="index.php" class="regresar">Regresar</a>
</div>';

$admin = '
<div id="login">
<img src="assets/img/logos/rojo.png" alt="logo" class="logoform">
<div class="Titulo">Iniciar sesion (Admin)</div>
<form action="account.php" class="form" method="POST">
  <input type="email" name="correo" id="nombrecorreo" placeholder="Correo electronico" required>
    <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
    <input type="submit" name="submit" class="enviar" value="Iniciar sesión">
    <input type="hidden" name="typeuser" value="admin">
</form>
<p id="sincuenta">¿No eres administrador? Inicia sesion <a href="account.php?tipo=login">click aqui</a></p>
<a href="index.php" class="regresar">Regresar</a>
</div>';

$signup = '
<div id="signup">
    <img src="assets/img/logos/rojo.png" alt="logo" class="logoform">
    <div class="Titulo">Crea una cuenta</div>
    <form action="account.php" class="form" method="POST">
        <input type="email" name="correo" id="nombrecorreo" placeholder="Correo electronico" required>
        <input type="text" name="nombre" id="nombrecorreo" placeholder="Nombre completo" required>
        <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
        <input type="hidden" name="typeuser" value="nuevo">
        <input type="submit" name="submit" class="enviar" value="Crear cuenta">
    </form>
    <p id="sincuenta">¿Tienes una cuenta? Inicia sesión <a href="account.php?tipo=login">click aqui</a></p>
    <a href="index.php" class="regresar">Regresar</a>
</div>
';

echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesaccount.css">
    <title>Iniciar sesión</title>
</head>
<body>
  <div class="formaccount">
';
//Se imprime depende de que tipo de pagina sea
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  if (isset($_GET['tipo'])) {
    if ($_GET['tipo'] == 'login') {
      echo $login;
    } elseif($_GET['tipo']=='signup'){
      echo $signup;
    }elseif ($_GET['tipo']=='admin') {
      echo $admin;
    }elseif ($_GET['tipo']=='logout'){
      header("location: index.php");
    }

  } else {
    echo $login;
  }
}
echo '
</div>
</body>
</html>
';

//Funciones de inicio de sesion
//Inicio para los administradores
if($_SERVER['REQUEST_METHOD']=='POST'){
  require 'conectar.php';
  if($_POST['typeuser']=='admin'){

    $err_correo = "";
    $err_contra = "";
    
  
    $input_correo = trim($_POST["correo"]);
      if(empty($input_correo)){
          $err_correo = "Introduce un correo valido.";
      } elseif(!filter_var($input_correo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9ñÑ@.\s]+$/")))){
          $err_correo = "Introduce un correo valido.";
      } else{
          $correo = $input_correo;
      }
      //validacion del numero
      $inputcontra = trim($_POST["contra"]);
      if(empty($inputcontra)){
          $err_contra = "Introduce una contraseña valida.";
      } elseif(!filter_var($inputcontra, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZñÑ0-9\s]+$/")))){
          $err_contra = "Introduce un contraseña valida.";
      } else{
          $contra = $inputcontra;
      }
  
    if(empty($err_contra) && empty($err_correo)){
    
      $sql = "SELECT * FROM administradores WHERE correo ='".$correo."'";
      if($result = $mysqli->query($sql)){
          // se comprueba si existen registros con el nombre
          if($result->num_rows > 0){
              while($row = $result->fetch_array()){
                  $contratabla = $row['contra'];
              
              }
              if($contratabla == $contra){
                  echo '
                  <form action="administrador.php" id="sesioniniciada" method="POST">
                      <input type="hidden" name="inicio" value="simon">                   
                  </form>
                  <script>document.getElementById("sesioniniciada").submit();</script>
                  ';
              }else{
                  $err = "Contraseña incorrecta";
                  header("location: account.php?err=".$err);
              }
              // Se limpia el registro del resultado
              $result->free();
          } else{
              // 
              $err = "No se ha encontrado este usuario, vuelve a intentarlo";
              header("location: account.php?err=".$err);
          }
      } else{
          $err = "Algo en la conexion está mal";
      }

      // Cerrar la conexcion
      $mysqli->close();
    }else{
      $err = "El usuario o contraseña esta mal";
      header("location: account.php?err=".$err);
    
    }
  }elseif($_POST['typeuser']=='nuevo'){
    $sql = "INSERT INTO clientes (email, contra, nombre) VALUES (?, ?, ?)";
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("sss", $email, $contra, $nombre);
        $email = $_POST['correo'];
        $contra = $_POST['contra'];
        $nombre = $_POST['nombre'];
        if($stmt->execute()){
            header("Location: account.php");
            exit();
        } else{
            $err = "No se ha podido crear la cuenta";
            header("Location: account.php?err=".$err);
        }
    }
  }
}
?>
