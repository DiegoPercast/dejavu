<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['inicio']=='simon'){
        if ($_POST['accion']=='preguntar') {
            echo '
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
                    <h1 class="title">Eliminar '.$_POST['crud'].'</h1>
                    <h2>Estas seguro que quieres eliminar el registro con id: '.$_POST['id'].'?</h2>
                    <div>
                        <br><br><br>
                    <form action="eliminaradmin.php" method="post">
                        <input type="hidden" name="inicio" value="simon">
                        <input type="hidden" name="accion" value="procesar">
                        <input type="hidden" name="crud" value="'.$_POST['crud'].'">
                        <input type="hidden" name="id" value="'.$_POST['id'].'" id="nolose">
                        <input type="submit" class="buttontable" value="Eliminar" style="width: 80px; scale: 1.5;">
                    </form>
                    <form action="crudadmin.php" method="post" class="formcrud">
                        <input type="hidden" name="inicio" value="simon">
                        <input type="hidden" name="crud" value="eventos">
                        <input type="submit" class="buttontable" value="Cancelar" style="width: 80px; scale: 1.5; margin-top: 50px;">
                    </form>
                    </div>
                    
                </div>
                    
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
            </body>
            </html>
            ';
        }
        if ($_POST['accion']=='procesar') {
            require_once "conectar.php";
            
            // Se prepara la instruccion
            $sql = "DELETE FROM ".$_POST['crud']." WHERE id_".substr($_POST['crud'], 0, -1)." = ?";
            
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("i", $param_id);
                
                $param_id = trim($_POST["id"]);
                
                if($stmt->execute()){
                    echo '
                    <form action="crudadmin.php" method="post" class="formcrud" id="regresar">
                        <input type="hidden" name="inicio" value="simon">
                        <input type="hidden" name="crud" value="eventos">
                    </form>
                    <script>document.getElementById("regresar").submit()</script>
                    ';
                    exit();
                } else{
                    echo '<script>document.getElementById("regresar").submit()</script>';
                }
            }
            
            // Close statement
            $stmt->close();
            
            // Close connection
            $mysqli->close();
        }
        
    }
}

?>