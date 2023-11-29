<?php
//Variables para imprimir las distintas opciones
$login = '
<div id="login">
<img src="assets/img/logos/rojo.png" alt="logo" class="logoform">
<div class="Titulo">Iniciar sesión</div>
<form action="#" class="form">
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
<form action="#" class="form">
    <input type="email" name="nombrecorreo" id="nombrecorreo" placeholder="Correo electronico" required>
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
    <form action="#" class="form">
        <input type="email" name="correo" id="nombrecorreo" placeholder="Correo electronico" required>
        <input type="text" name="nombre" id="nombrecorreo" placeholder="Nombre completo" required>
        <input type="password" name="contra" id="contra" placeholder="Contraseña" required>
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

?>
