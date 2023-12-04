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
                <h1 class="title">Modificar '.$_POST['crud'].' </h1>
        
        ';
        echo $inicio;
        if ($_POST['accion']=='formulario') {
            switch ($_POST['crud']) {
                case 'eventos':
                    $resultado = "";
                    //consulta para fecha y hora
                    $sql = "SELECT * FROM eventos WHERE eventos.id_evento=".$_POST['id'].";";
                    if ($result=$mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado.= '
                                <label for="fecha">Fecha del evento: </label> 
                                <input type="date" name="fecha" value="'.$row['fecha'].'" required> 
                                <label for="hora">Hora del evento: </label> 
                                <input type="time" name="hora" value="'.$row['hora'].'" required> 
                                <label for="sala">Sala del evento: </label> 
                                ';
                            } //while
                            $result->free();
                        }
                        else {
                        } //if
                    } else {
                    } //if

                    //consulta para los select
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
                case 'obras':
                    $resultado = "";
                    //consulta para fecha y hora
                    $sql = "SELECT * FROM obras WHERE obras.id_obra=".$_POST['id'].";";
                    if ($result=$mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado.= '
                                <label for="Titulo">Titulo de la obra: </label> 
                                <input type="text" name="titulo" value="'.$row['titulo'].'" required> 
                                <label for="Autor">Autor de la obra: </label> 
                                <input type="text" name="autor" value="'.$row['autor'].'" required> 
                                <label for="Descripcion">Descripcion de la obra: </label> 
                                <input type="text" name="descripcion" value="'.$row['descripcion'].'" required> 
                                <label for="Imagen">Imagen: </label> 
                                <input type="text" name="imagen" value="'.$row['imagen'].'" required> 
                                
                                ';
                            } //while
                            $result->free();
                        }
                        else {
                        } //if
                    } else {
                    } //if
                    $mysqli->close();
                    break;
                case 'salas':
                    $resultado = "";
                    //consulta para fecha y hora
                    $sql = "SELECT * FROM salas WHERE salas.id_sala=".$_POST['id'].";";
                    if ($result=$mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado.= '
                                <label for="columnas">Columnas de la sala: </label> 
                                <input type="number" name="columnas" value="'.$row['numerocolumnas'].'" required> 
                                <label for="filas">Filas de la sala: </label> 
                                <input type="number" name="filas"  value="'.$row['numerofilas'].'" required>
                                
                                ';
                            }
                            $result->free();
                        }
                        else {
                        } //if
                    } else {
                    } //if
                    $mysqli->close();
                    break;
                case 'clientes':
                    $resultado = "";
                    //consulta para fecha y hora
                    $sql = "SELECT * FROM clientes WHERE clientes.id_cliente=".$_POST['id'].";";
                    if ($result=$mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado.= '
                                <label for="cliente">Correo del cliente: </label> 
                                <input type="email" name="email" value="'.$row['email'].'" required> 
                                <label for="contra">Contraseña del cliente: </label> 
                                <input type="text" name="contra"  value="'.$row['contra'].'" required>
                                <label for="nomrbe">Nombre del cliente: </label> 
                                <input type="text" name="nombre"  value="'.$row['nombre'].'" required>
                                
                                ';
                            }
                            $result->free();
                        }
                        else {
                        } //if
                    } else {
                    } //if
                    $mysqli->close();
                    break;
                case 'cursos':
                    $resultado = "";
                    //consulta para fecha y hora
                    $sql = "SELECT * FROM cursos WHERE cursos.id_curso=".$_POST['id'].";";
                    if ($result=$mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()) {
                                $resultado.= '
                                <label for="titulo">Titulo del curso: </label> 
                                <input type="text" name="titulo" value="'.$row['titulo'].'" required> 
                                <label for="mensualidad">Mensualidad del curso: </label> 
                                <input type="number" name="mensualidad"  step=any value="'.$row['mensualidad'].'" required> 
                                <label for="descripcion">Descripcion del curso: </label> 
                                <input type="text" name="descripcion" value="'.$row['descripcion'].'" required> 
                                
                                ';
                            }
                            $result->free();
                        }
                        else {
                        } //if
                    } else {
                    } //if
                    $mysqli->close();
                    break;
            }
            $cruds = '
                <form action="modificaradmin.php" class="formcrud" method="post">
                    '.$resultado.'
                    <input type="hidden" name="inicio" value="simon">
                    <input type="hidden" name="id" value="'.$_POST['id'].'">
                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                    <input type="hidden" name="accion" value="procesar">
                    <input type="submit" class="buttontable" value="Modificar" style="width: 80px;">
                </form>
                ';
            
            echo $cruds;
            echo $final;
        }if($_POST['accion']=='procesar'){
            echo $final;
            switch ($_POST['crud']) {
                case 'eventos':
                    $sql = "UPDATE eventos SET hora=?, fecha=?, id_sala_2=?, id_obra_2=? WHERE id_evento=?";
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("ssiii", $hora, $fecha ,$sala ,$obra, $id);
                        
                        // Set parameters
                        $id = $_POST['id'];
                        $hora = $_POST['hora'];
                        $fecha = $_POST['fecha'];
                        $sala = $_POST['sala'];
                        $obra = $_POST['obra'];
                        
                        if($stmt->execute()){
                            echo '
                                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                                    <input type="hidden" name="inicio" value="simon">
                                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                                </form>
                                <script>document.getElementById("regresar").submit()</script>
                                ';
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    break;
                case 'obras':
                    $sql = "UPDATE obras SET titulo=?, autor=?, descripcion=?, imagen=? WHERE id_obra=?";
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("ssssi", $titulo, $autor ,$descripcion ,$imagen, $id);
                        
                        // Set parameters
                        $id = $_POST['id'];
                        $titulo = $_POST['titulo'];
                        $autor = $_POST['autor'];
                        $descripcion = $_POST['descripcion'];
                        $imagen = $_POST['imagen'];
                        
                        if($stmt->execute()){
                            echo '
                                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                                    <input type="hidden" name="inicio" value="simon">
                                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                                </form>
                                <script>document.getElementById("regresar").submit()</script>
                                ';
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    break;
                case 'salas':
                    $sql = "UPDATE salas SET numerocolumnas=?, numerofilas=? WHERE id_sala=?";
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("iii", $columnas, $filas, $id);
                        
                        // Set parameters
                        $id = $_POST['id'];
                        $columnas = $_POST['columnas'];
                        $filas = $_POST['filas'];
                        
                        
                        if($stmt->execute()){
                            echo '
                                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                                    <input type="hidden" name="inicio" value="simon">
                                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                                </form>
                                <script>document.getElementById("regresar").submit()</script>
                                ';
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    break;
                case 'clientes':
                    $sql = "UPDATE clientes SET email=?, contra=?, nombre=? WHERE id_cliente=?";
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("sssi", $email, $contra, $nombre, $id);
                        
                        // Set parameters
                        $id = $_POST['id'];
                        $email = $_POST['email'];
                        $contra = $_POST['contra'];
                        $nombre = $_POST['nombre'];
                        
                        
                        if($stmt->execute()){
                            echo '
                                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                                    <input type="hidden" name="inicio" value="simon">
                                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                                </form>
                                <script>document.getElementById("regresar").submit()</script>
                                ';
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    break;
                case 'cursos':
                    $sql = "UPDATE cursos SET titulo=?, mensualidad=?, descripcion=? WHERE id_curso=?";
                    if($stmt = $mysqli->prepare($sql)){
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("sdsi", $titulo, $mensualidad, $descripcion, $id);
                        
                        // Set parameters
                        $id = $_POST['id'];
                        $titulo = $_POST['titulo'];
                        $mensualidad = $_POST['mensualidad'];
                        $descripcion = $_POST['descripcion'];
                        
                        
                        
                        if($stmt->execute()){
                            echo '
                                <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                                    <input type="hidden" name="inicio" value="simon">
                                    <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                                </form>
                                <script>document.getElementById("regresar").submit()</script>
                                ';
                            exit();
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    break;
                    
                
                default:
                    # code...
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