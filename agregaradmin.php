<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "conectar.php";
    if($_POST['inicio']=='simon'){
        $final='
                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="submit" class="buttontable" value="Cancelar" style="width: 80px;">
                </form>
            </div>
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
                    function cambio(form){
                        document.getElementById(form).submit();
                        
                    }
                </script>
              </body>
            </html>
            ';
        $inicio='
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
                      <a class="nav-link" href="account.php?tipo=logout"
                        >Cerrar sesión</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!--Main-->
            <div class="containeradmin">
                <h1 class="title">Agregar evento </h1>
        
        ';
        echo $inicio;
        if ($_POST['accion']=='formulario') {
          $resultado = "";
            switch ($_POST['crud']) {
                case 'eventos':
                    $sql = "SELECT * FROM salas;";
                    if ($result=$mysqli->query($sql)) {
                        $resultado .= '<select name="sala" id="sala" required> ';
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado .= '<option value="' . $row["id_sala"] . '">';
                                $resultado .= $row["id_sala"] . ' - ' . $row['numerocolumnas'] .'x'. $row['numerofilas'] . '</option>';
                            } //while
                            $result->free();
                        }
                        else {
                            $resultado .= "<option value=''>No hay salas</option>";
                        } //if
                        $resultado .= ' </select>';
                    } else {
                        $resultado .= "Algo salió mal. Intente mas tarde por favor";
                    } //if
                    $resultado .= '<label for="obra">Obra: </label> ';
                    $sql = "SELECT * FROM obras;";
                    if ($result=$mysqli->query($sql)) {
                        $resultado .= '<select name="obra" id="obra" required> ';
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado .= '<option value="' . $row["id_obra"] . '">';
                                $resultado .= $row["titulo"]  . '</option>';
                            } //while
                            $result->free();
                        }
                        else {
                            $resultado .= "<option value=''>No hay salas</option>";
                        } //if
                        $resultado .= ' </select>';
                    } else {
                        $resultado .= "Algo salió mal. Intente mas tarde por favor";
                    } //if
                    $mysqli->close();
                    break;
            }
            $cruds = [
                "eventos" => '
                <form action="agregaradmin.php" class="formcrud" method="post">
                    <label for="fecha">Fecha del evento: </label> 
                    <input type="date" name="fecha" required> 
                    <label for="hora">Hora del evento: </label> 
                    <input type="time" name="hora" required> 
                    <label for="sala">Sala del evento: </label> 
                    '.$resultado.'
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="accion" value="procesar">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="submit" class="buttontable" value="Agregar" style="width: 80px;">
                </form>
                ',
                "obras" => '
                <form action="agregaradmin.php" class="formcrud" method="post">
                    <label for="titulo">Titulo de la obra: </label> 
                    <input type="text" name="titulo" required> 
                    <label for="autor">Autor de la obra: </label> 
                    <input type="text" name="autor" required> 
                    <label for="desc">Descripcion de la obra: </label> 
                    <input type="text" name="descripcion" required> 
                    <label for="imagen">Imagen de la obra: </label> 
                    <input type="text" name="imagen" required> 
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="accion" value="procesar">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="submit" class="buttontable" value="Agregar" style="width: 80px;">
                </form>',
                "salas" => '
                <form action="agregaradmin.php" class="formcrud" method="post">
                    <label for="columnas">Columnas de la sala: </label> 
                    <input type="number" name="columnas" required> 
                    <label for="filas">Filas de la sala: </label> 
                    <input type="number" name="filas" required> 
                    
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="accion" value="procesar">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="submit" class="buttontable" value="Agregar" style="width: 80px;">
                </form>
                ',
                "cursos" => '
                <form action="agregaradmin.php" class="formcrud" method="post">
                    <label for="titulo">Titulo del curso: </label> 
                    <input type="text" name="titulo" required> 
                    <label for="mensualidad">Mensualidad del curso: </label> 
                    <input type="number" name="mensualidad"  step=any required> 
                    <label for="descripcion">Descripcion del curso: </label> 
                    <input type="text" name="descripcion" required> 
                    <label for="imagen">Imagen del curso: </label> 
                    <input type="text" name="imagen" required> 
                    
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="accion" value="procesar">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="submit" class="buttontable" value="Agregar" style="width: 80px;">
                </form>
                ',
            ];
            echo $cruds[$_POST['crud']];
            echo $final;
        }if($_POST['accion']=='procesar'){
            echo $final;
            switch ($_POST['crud']) {
              case 'eventos':
                $sql = "INSERT INTO eventos (fecha, hora, id_sala_2, id_obra_2) VALUES (?, ?, ?, ?)";
                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param("ssii", $fecha,$hora,$sala, $obra);
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];
                    $sala = $_POST['sala'];
                    $obra = $_POST['obra'];
                    if($stmt->execute()){
                        echo "<script>cambio('regresar')</script>";
                        exit();
                    } else{
                        echo "Algo salió mal. Intente mas tarde.";
                    }
                }
                break;
                case 'obras':
                  $sql = "INSERT INTO obras (titulo, autor, descripcion, imagen) VALUES (?, ?, ?, ?)";
                  if($stmt = $mysqli->prepare($sql)){
                      $stmt->bind_param("ssss", $titulo, $autor, $descripcion, $imagen);
                      $titulo = $_POST['titulo'];
                      $autor = $_POST['autor'];
                      $descripcion = $_POST['descripcion'];
                      $imagen = $_POST['imagen'];
                      if($stmt->execute()){
                          echo "<script>cambio('regresar')</script>";
                          exit();
                        } else{
                          echo "<script>cambio('regresar')</script>";
                          exit();
                      }
                  }
                  break;
                case 'salas':
                  $sql = "INSERT INTO salas (numerocolumnas, numerofilas) VALUES (?, ?)";
                  if($stmt = $mysqli->prepare($sql)){
                      $stmt->bind_param("ii", $columnas, $filas);
                      $columnas = $_POST['columnas'];
                      $filas = $_POST['filas'];
                      
                      if($stmt->execute()){
                          echo "<script>cambio('regresar')</script>";
                          exit();
                      } else{
                          echo "Algo salió mal. Intente mas tarde.";
                      }
                  }
                  break;
                case 'cursos':
                  $sql = "INSERT INTO cursos (titulo, mensualidad, descripcion, imagen) VALUES (?, ?, ?, ?)";
                  if($stmt = $mysqli->prepare($sql)){
                      $stmt->bind_param("sdss", $titulo, $mensualidad, $descripcion, $imagen);
                      $titulo = $_POST['titulo'];
                      $mensualidad = $_POST['mensualidad'];
                      $descripcion = $_POST['descripcion'];
                      $imagen = $_POST['imagen'];
                      
                      if($stmt->execute()){
                          echo "<script>cambio('regresar')</script>";
                          exit();
                      } else{
                          echo "Algo salió mal. Intente mas tarde.";
                      }
                  }
                  break;
              
              
            }
            $stmt->close();
            $mysqli->close();
        }
    }else{
        header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
    }
}else{
    header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
}
?>