<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Elegir asientos</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="./assets/img/logos/rojo.png" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.4.2/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!--Main Styles-->
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/asientos.css" />
</head>

<body id="page-top">
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['inicio'])){
      if($_POST['inicio']=='usuarioiniciado'){
        echo '
        <form action="asientos.php" method="post" id="infoinicio">
          <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
          <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
          <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
        </form>
        <form action="index.php" method="post" id="regresar">
          <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
          <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
          <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
        </form>';
        
      }else{
        echo "<script>alert('1');</script>";
        header("Location: account.php?tipo=login&direccion=botelos");
      }
    }else{
      echo "<script>alert('2');</script>";

      header("Location: account.php?tipo=login&direccion=boletos");
    }
  }else{
    echo "<script>alert('1');</script>";

    header("Location: account.php?tipo=login&direccion=boletos");
  }
  ?>
  <!--Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="assets/img/logos/rojo.png" alt="..." class="icon" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          
          <li class="nav-item">
          <a class="nav-link" onclick="regresar()" href="#"
              >Regresar</a
          >
          <script>
            function regresar(){
                document.getElementById("regresar").submit();
            }
          
          </script>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" href="account.php?tipo=logout"
              >Cerrar Sesión</a
          >
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Main Content-->
  <main>
    <div class="tickets">
      <h1>Selecciona tus asientos</h1>
      <div class="ticket-selector">
        <div class="head">
          <div class="title"><?php echo $_POST['nombreobra']?></div>
        </div>
        <div class="seats">
          <div class="status">
            <div class="item">Disponibles</div>
            <div class="item">Ocupados</div>
            <div class="item">Seleccionados</div>
          </div>
          <form action="asientos.php" method="POST">
            <div class="all-seats"></div>
        </div>
        <div class="timings">
          <div class="time">Horario: <span>18:00</span></div>
        </div>
        </div>
        <div class="price">
        <div class="total">
          <span><span class="count">0</span> Tickets</span>
          <div class="amount">0</div>
        </div>
        <input type="hidde" name="idobra" value="<?php echo $_POST['idobra']?>">
        <button type="submit" name="guardar_asientos">Reservar</button>
        </form>
      </div>
    </div>
  </main>
  <script type="text/javascript" src="./js/asientos.js"></script>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>