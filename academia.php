<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dejavu</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="./assets/img/logos/rojo.png" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.4.2/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/academia.css">
  <link href="css/academia.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Comprobacion de inicio de sesion-->
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['inicio'])){
      if($_POST['inicio']=='usuarioiniciado'){
        echo '
        <form action="#" method="post" id="infoinicio">
          <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
          <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
          <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
        </form>';
      }else{
        header("Location: account.php?tipo=login&direccion=academia");
      }
    }else{
      header("Location: account.php?tipo=login&direccion=academia");
    }
  }else{
    header("Location: account.php?tipo=login&direccion=academia");
  }
  ?>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="assets/img/logos/rojo.png" alt="..." class="icon" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#about">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Cursos</a>
          </li>
          
          <li class="nav-item">
            <button class="nav-link" onclick="carrito()"
              >Carrito de compras</button>
          </li>
          <script>
            function carrito(){
              document.getElementById('infoinicio').action="carrito.php";
              document.getElementById('infoinicio').submit();
            }
          </script>
          <li class="nav-item">
            <a class="nav-link" href="account.php?tipo=logout">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <div class="masthead-subheading">Déjà vu</div>
      <div class="masthead-heading text-uppercase">
        Unete a nuestra academia y cumple tus sueños.
      </div>
      <a class="btn btn-primary btn-xl text-uppercase" href="#about">Dime más</a>
    </div>
  </header>
  <!-- Services-->
  <section class="page-section" id="about">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Conocenos</h2>
        <h3 class="section-subheading text-muted">
          La academia de teatro mejor valorada a nivel mundial!
        </h3>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">Precios de primera</h4>
          <p class="text-muted">
            Contamos con precios accesibles para cualquier aspirante a actor.
          </p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-masks-theater fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">Educación de primer nivel</h4>
          <p class="text-muted">
            Contamos con verdaderas leyendas de la actuación a nivel internacional como profesores.
          </p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-face-grin-tears fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="my-3">Actuaciones de primera</h4>
          <p class="text-muted">
            Contamos con un plan de estudio bastante flexible y de calidad.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Grid-->
  <section class="page-section bg-light" id="portfolio">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Cursos</h2>
        <h3 class="section-subheading text-muted">
          Clickea alguno de los cursos para más información:
        </h3>
      </div>
      <div class="row">
        <?php
          require "conectar.php";
          $sql = "SELECT * FROM cursos";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                $i=1;
                  while ($row = $result->fetch_array()) {
                      echo '
                      <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item '.$i.'-->
                        <div class="portfolio-item">
                          <a class="portfolio-link" data-bs-toggle="modal" href="#cursoModal'.$i.'">
                            <div class="portfolio-hover">
                              <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                              </div>
                            </div>
                            <img class="img-fluid" src="'.$row['imagen'].'" alt="..." />
                          </a>
                          <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">'.$row['titulo'].'</div>
                            <div class="portfolio-caption-subheading text-muted">
                              $'.$row['mensualidad'].'
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                      $i++;
                  }
              } else {
                  echo "No se han encontrado registros";
              }
              $result->free();
          } else {
              echo "<script>alert('nojalaconsulta')</script>";
          }
          ?>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="footer py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start">
          Copyright &copy;Déjà vu S.A de C.V
        </div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Portfolio Modals-->
  <?php
          $sql = "SELECT * FROM cursos";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                $i=1;
                  while ($row = $result->fetch_array()) {
                      echo '
                      
                      <div class="portfolio-modal modal fade" id="cursoModal'.$i.'" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal">
                              <img src="assets/img/close-icon.svg" alt="Close modal" />
                            </div>
                            <div class="container">
                              <div class="row justify-content-center">
                                <div class="col-lg-8">
                                  <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">'.$row['titulo'].'</h2>
                                    <p class="item-intro text-muted">
                                      A solo $199
                                    </p>
                                    <img class="img-fluid d-block mx-auto" src="'.$row['imagen'].'" alt="..." />
                                    <p>
                                    '.$row['descripcion'].'
                                    </p>
                                    <ul class="list-inline">
                                      <li>
                                        <strong>Curso:</strong>
                                        '.$row['titulo'].'
                                      </li>
                                      <li>
                                        <strong>Precio:</strong>
                                        $'.$row['mensualidad'].'
                                      </li>
                                    </ul>
                                    <div class="buttons">
                                      <form action="agregarcarrito.php" method="post" id="añadircursocarrito">
                                        <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
                                        <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
                                        <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
                                        <input type="hidden" name="cursoselected" value="'.$row['id_curso'].'">
                                      </form>
                                      <button class="btn btn-primary btn-xl text-uppercase" onclick="agregarcarrito()">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        Agregar al carrito
                                      </button>
                                      <script>function agregarcarrito(){document.getElementById("añadircursocarrito").submit()}</script>

                                    </div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                      <i class="fas fa-xmark me-1"></i>
                                      Volver
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                      $i++;
                  }
              } else {
                  echo "No se han encontrado registros";
              }
              $result->free();
              $mysqli->close();
          } else {
              echo "<script>alert('nojalaconsulta')</script>";
          }
          ?>
  <!-- Portfolio item 1 modal popup-->
  
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>