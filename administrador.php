<?php
$paginaadmin = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Modo Admin</title>
    <!-- Estilos propios de la pagina-->
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./assets/img/logos/rojo.png" />
    <!-- Font Awesome icons (free version)-->
    <script
      src="https://use.fontawesome.com/releases/v6.4.2/js/all.js"
      crossorigin="anonymous"
    ></script>
    <!-- Google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <!--Main Styles-->
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/boletos.css" />
  </head>
  <body id="page-top">
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img src="assets/img/logos/rojo.png" alt="..." class="icon"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="account.php?tipo=logout">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Main-->
    <div class="containeradmin">
      <form action="crudadmin.php" method="post" id="formulariocrud">
          <input type="hidden" name="inicio" value="simon">
          <input type="hidden" name="crud" value="" id="nombrecrud">
      </form>
      <h1 class="title">Administrar teatro</h1>
      <div id="adminsections">
        <div id="sec1" class="adminsection">
          <div class="titlesec">Venta de boletos</div>
            <div class="listadmin">
              <div class="listelement" style="margin-top: 12px;" onclick="cambio('."'eventos'".')">
                <img src="assets/img/icons/calendario.png" alt="calendario" class="iconadmin">
                <h5>Administrar eventos</h3>
              </div>
              <div class="listelement" onclick="cambio('."'obras'".')">
                <img src="assets/img/icons/teatro.png" alt="mascaras" class="iconadmin">
                <h5>Administrar obras</h3>
              </div>
              <div class="listelement" onclick="cambio('."'salas'".')">
                <img src="assets/img/icons/butacas-de-cine.png" alt="butacas" class="iconadmin">
                <h5>Administrar salas</h5>
              </div>
            </div>
        </div>
        <div id="sec2" class="adminsection">
          <div class="titlesec">Academia</div>
          <div class="listadmin">
            <div class="listelement" style="margin-top: 12px;">
              <img src="assets/img/icons/graduado.png" alt="butacas" class="iconadmin">
              <h5>Administrar alumnos</h5>
              
            </div>
            <div class="listelement">
              <img src="assets/img/icons/graduacion.png" alt="butacas" class="iconadmin">
              <h5>Administrar cursos</h5>
              
            </div>
            <div class="listelement">
              <img src="assets/img/icons/cine.png" alt="butacas" class="iconadmin">
              <h5>Administrar salas</h5>

            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./js/boletos.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
      function cambio(pagina){
        document.getElementById("nombrecrud").value=pagina;
        document.getElementById("formulariocrud").submit();
        
      }
    </script>
  </body>
</html>
';
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if($_POST['inicio']=='simon'){
        echo $paginaadmin;
    }else{
        header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
    }
}else{
    header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
}
?>