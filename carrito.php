<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "conectar.php";
    if(isset($_POST['inicio'])){
        if($_POST['inicio']=='usuarioiniciado'){
            //se declaran las variables
            $inicio = '
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
                <link rel="stylesheet" href="css/styles.css" />
                <link rel="stylesheet" href="css/carrito.css" />
                <link href="css/academia.css" rel="stylesheet" />
            </head>

            <body id="page-top">
                <!-- Navigation-->
                <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                    <a class="navbar-brand" href="index.php"
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
                        <a class="nav-link" href="account.php?tipo=login"
                            >Cerrar Sesión</a
                        >
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>
                <main>
                <div class="small-container cart-page">
                    <table>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    <tr>
            ';
            $final = '
                    </div>
                </main>
            </body>
            </html>
            ';
            $carrito='
            ';
            //se imprimen las variables
            echo $inicio;
            $sql = "SELECT cursos.titulo as 'titulo',
                    cursos.mensualidad as 'mensualidad',
                    cursos.imagen as 'imagen',
                    compracursos.id_cliente_2 as 'idcliente'
                    FROM compracursos
                    LEFT JOIN cursos
                    ON compracursos.id_curso_2 = cursos.id_curso WHERE compracursos.id_cliente_2=".$_POST['idcuenta']."; 
                    ";
            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    $total = 0;
                    while ($row = $result->fetch_array()) {
                        echo '
                        <tr>
                            <td>
                            <div class="cart-info">
                                <img src="'.$row['imagen'].'" alt="" />
                                <div>
                                <p>'.$row['titulo'].'</p>
                                <small>Price: $'.$row['mensualidad'].'</small>
                                <a href="">Remove</a>
                                </div>
                            </div>
                            </td>
                            <td>$'.$row['mensualidad'].'</td>
                        </tr>
                        ';
                        $total+=floatval($row['mensualidad']);
                    }
                    echo '
                        </table>

                        <div class="total-price">
                        <table>
                            <tr>
                            <td>Subtotal</td>
                            <td>$'.$total.'</td>
                            </tr>
                            <tr>
                            <td>Inscripcion</td>
                            <td>$250.00</td>
                            </tr>
                            <tr>';
                            $total+=250;
                    echo '
                            <td>Total</td>
                            <td>$'.$total.'</td>
                            </tr>
                        </table>
                        </div>
                    ';
                } else {
                    echo '<td>No se han encontrado registros</td></tr>';
                }
                $result->free();
                $mysqli->close();
            } else {
                echo "<script>alert('nojalaconsulta')</script>";
            }
            echo $carrito;
            echo $final;
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