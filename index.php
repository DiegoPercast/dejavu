<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dejavu</title>
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
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">
    <!-- Comprobacion del inicio de sesion -->

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['inicio'])){
        if($_POST['inicio']=='usuarioiniciado'){
          echo '
          <form action="#" method="post" id="infoinicio">
            <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
            <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
            <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
          </form>
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="#page-top"
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
                    <a class="nav-link" href="#about">Conócenos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Cartelera</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#academia">Academia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php?tipo=logout"
                      >Cerrar sesión</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          ';

        }else{
          echo '
          <form action="#" method="post" id="infoinicio">
            <input type="hidden" name="inicio" value="usuarionoiniciado">
          </form>
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="#page-top"
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
                    <a class="nav-link" href="#about">Conócenos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Cartelera</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#academia">Academia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php?tipo=login"
                      >Iniciar Sesión</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php?tipo=signup"
                      >Crear Cuenta</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          ';
        }

      }else{
        header("Location: account.php?tipo=logout");
      }
    }else{
      echo '
          <form action="#" method="post" id="infoinicio">
            <input type="hidden" name="inicio" value="usuarionoiniciado">
          </form>
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="#page-top"
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
                    <a class="nav-link" href="#about">Conócenos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Cartelera</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#academia">Academia</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php?tipo=login"
                      >Iniciar Sesión</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php?tipo=signup"
                      >Crear Cuenta</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          ';
    }
    ?>

    <!-- Navigation-->
    
    <!-- Masthead-->
    <header class="masthead">
      <div class="container">
        <div class="masthead-subheading">Déjà vu</div>
        <div class="masthead-heading text-uppercase">
          Ven y haz tus sueños realidad
        </div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#about"
          >Dime más</a
        >
      </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="about">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Conocenos</h2>
          <h3 class="section-subheading text-muted">
            El teatro mejor valorado a nivel mundial!
          </h3>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Tus asientos al mejor precio</h4>
            <p class="text-muted">
              Contamos con un sistema de compra de boletos de primer nivel.
            </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-masks-theater fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Increibles actuaciones</h4>
            <p class="text-muted">
              Contamos con actores de primera, actores que sin lugar a dudas te
              sacaran una sonrisa, o te provocaran emociones que nunca antes
              hayas sentido
            </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-face-grin-tears fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="my-3">Tus Obras favoritas</h4>
            <p class="text-muted">
              Contamos con obras de todos generos y sabores, para todo tipo de
              publico y muy entretenidas.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Cartelera</h2>
          <h3 class="section-subheading text-muted">
            Elige las mejores funciones que tenemos para ti:
          </h3>
        </div>
        <div class="row">
          <?php
          require "conectar.php";
          $sql = "SELECT * FROM obras";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                $i=1;
                  while ($row = $result->fetch_array()) {
                      echo '
                      
                      <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item '.$i.'-->
                        <div class="portfolio-item">
                          <a
                            class="portfolio-link"
                            data-bs-toggle="modal"
                            href="#portfolioModal'.$i.'"
                          >
                            <div class="portfolio-hover">
                              <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                              </div>
                            </div>
                            <img
                              class="img-fluid"
                              src="'.$row['imagen'].'"
                              alt="..."
                            />
                          </a>
                          <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">'.$row['titulo'].'</div>
                            <div class="portfolio-caption-subheading text-muted">
                            '.$row['autor'].'
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                      $i++;
                  }
              } else {
                  $contenidocrud = "No se han encontrado registros";
              }
              $result->free();
          } else {
              echo "<script>alert('nojalaconsulta')</script>";
          }
          ?>        
        </div>
      </div>
    </section>
    <!--Academia seccion-->
    <section class="academia" id="academia">
      <div class="container">
        <div class="academia-subheading">Déjà vu</div>
        <div class="academia-heading text-uppercase">
          Unete a nuestra academia y cumple tus sueños!
        </div>
        <a class="btn btn-primary btn-xl text-uppercase" href="academia.php"
          >Inscribirme ahora</a
        >
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
            <a
              class="btn btn-dark btn-social mx-2"
              href="#!"
              aria-label="Twitter"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-dark btn-social mx-2"
              href="#!"
              aria-label="Facebook"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-dark btn-social mx-2"
              href="#!"
              aria-label="LinkedIn"
              ><i class="fab fa-linkedin-in"></i
            ></a>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a class="link-dark text-decoration-none me-3" href="#!"
              >Política de privacidad</a
            >
            <a class="link-dark text-decoration-none" href="#!"
              >Terminos de uso</a
            >
          </div>
        </div>
      </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- inicio -->
    <?php
          $sql = "SELECT * FROM obras";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                $i=1;
                  while ($row = $result->fetch_array()) {
                      echo '
                      <!-- Portfolio item '.$i.' modal popup-->
                      <div
                        class="portfolio-modal modal fade"
                        id="portfolioModal'.$i.'"
                        tabindex="-1"
                        role="dialog"
                        aria-hidden="true"
                      >
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
                                    <h2 class="text-uppercase">Hamlet</h2>
                                    <p class="item-intro text-muted">
                                      Escrita por '.$row['autor'].'
                                    </p>
                                    <img
                                      class="img-fluid d-block mx-auto"
                                      src="'.$row['imagen'].'"
                                      alt="..."
                                    />
                                    <p>
                                    '.$row['descripcion'].'
                                    </p>
                                    <ul class="list-inline">
                                      <li>
                                        <strong>Nombre:</strong>
                                        '.$row['titulo'].'
                                      </li>
                                      <li>
                                        <strong>Autor:</strong>
                                        '.$row['autor'].'
                                      </li>
                                    </ul>
                                    <button
                                      class="btn btn-primary btn-xl text-uppercase"
                                      data-bs-dismiss="modal"
                                      type="button"
                                    >
                                      <i class="fas fa-xmark me-1"></i>
                                      Volver
                                    </button>
                                    <button
                                      class="btn btn-primary btn-xl text-uppercase"
                                      data-bs-dismiss="modal"
                                      type="button"
                                    >
                                      Comprar boletos
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
                  $contenidocrud = "No se han encontrado registros";
              }
              $result->free();
              $mysqli->close();
          } else {
              echo "<script>alert('nojalaconsulta')</script>";
          }
          ?>  
    <!-- final -->

    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
