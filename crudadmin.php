<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "conectar.php";
    switch ($_POST['crud']) {
        case 'eventos':
            $contenidocrud = "";
            $sql = "SELECT 
                        eventos.id_evento as 'id',
                        eventos.hora as 'hora',
                        eventos.fecha as 'fecha',
                        eventos.id_sala_2 as 'sala',
                        obras.titulo as 'titulo'
                    FROM eventos
                    LEFT JOIN obras
                    ON eventos.id_obra_2 = obras.id_obra";
            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        $contenidocrud .= "<tr>";
                        $contenidocrud .= "<td>".$row['id']."</td>";
                        $contenidocrud .= "<td>".$row['hora']."</td>";
                        $contenidocrud .= "<td>".$row['fecha']."</td>";
                        $contenidocrud .= "<td>".$row['sala']."</td>";
                        $contenidocrud .= "<td>".$row['titulo']."</td>";
                        $contenidocrud .= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver asientos" class="iconstable"><img src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable"><img src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable"></td>';
                        $contenidocrud .= "</tr>";
                    }
                } else {
                    $contenidocrud = "<tr><td colspan='6'>No se han encontrado registros</td></tr>";
                }
                $result->free();
                $mysqli->close();
            } else {
                echo "<script>alert('nojalaconsulta')</script>";
            }
            break;
        case 'obras':
            $contenidocrud = "";
            $sql = "SELECT 
                        eventos.id_evento as 'id',
                        eventos.hora as 'hora',
                        eventos.fecha as 'fecha',
                        eventos.id_sala_2 as 'sala',
                        obras.titulo as 'titulo'
                    FROM eventos
                    LEFT JOIN obras
                    ON eventos.id_obra_2 = obras.id_obra
                    ";
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                        while($row = $result->fetch_array()){
                            $contenidocrud.= "<td>".$row['id']."</td>";
                            $contenidocrud.= "<td>".$row['hora']."</td>";
                            $contenidocrud.= "<td>".$row['fecha']."</td>";
                            $contenidocrud.= "<td>".$row['sala']."</td>";
                            $contenidocrud.= "<td>".$row['titulo']."</td>";
                            $contenidocrud.= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver asientos" class="iconstable"><img src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable"><img src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable"></td>';
                        }
                }else {
                    $contenidocrud = "No se han encontrado registros";
                    
                }  
                $result->free();
                $mysqli->close();
            }else{
                echo "<script>alert('nojalaconsulta')</script>";
            }
            break;
        case 'salas':
            $contenidocrud = "";
            $sql = "SELECT 
                        eventos.id_evento as 'id',
                        eventos.hora as 'hora',
                        eventos.fecha as 'fecha',
                        eventos.id_sala_2 as 'sala',
                        obras.titulo as 'titulo'
                    FROM eventos
                    LEFT JOIN obras
                    ON eventos.id_obra_2 = obras.id_obra
                    ";
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                    while($row = $result->fetch_array()){
                            $contenidocrud.= "<tr>";
                            $contenidocrud.= "</tr>";
                        }
                }else {
                    $contenidocrud = "No se han encontrado registros";
                    
                }  
                $result->free();
                $mysqli->close();
            }else{
                echo "<script>alert('nojalaconsulta')</script>";
            }
            break;
        
    }
    $cruds = [
        "eventos" => '
        <h1 class="title">Administrar Eventos</h1>
          <span class="cabecera">
          <form action="administrador.php" method="post" id="formregresar">
            <input type="hidden" name="inicio" value="simon">
          </form>
          <form action="agregaradmin.php" method="post" id="formagregar">
                <input type="hidden" name="inicio" value="simon">
                <input type="hidden" name="accion" value="formulario">
                <input type="hidden" name="crud" value="eventos">
          </form>
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar evento</button>
            <button class="buttontable"onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Evento</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Sala</th>
                <th>Obra</th>
                <th>Acciones</th>
              </tr>
              '.$contenidocrud.'
              
            </table>
    
          </div>
        ',
        "obras" => '
        <h1 class="title">Administrar Obras</h1>
          <span class="cabecera">
          <form action="administrador.php" method="post" id="formregresar">
            <input type="hidden" name="inicio" value="simon">
          </form>
          <form action="agregaradmin.php" method="post" id="formagregar">
                <input type="hidden" name="inicio" value="simon">
                <input type="hidden" name="crud" value="obras">
          </form>
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar evento</button>
            <button class="buttontable"onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Obra</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th style="height=auto;">Descripcion</th>
              </tr>
              <tr>
                '.$contenidocrud.'
              </tr>
              
            </table>
    
          </div>
        ',
        "salas" => '
        <h1 class="title">Administrar Salas</h1>
          <span class="cabecera">
            <form action="administrador.php" method="post" id="formregresar">
                <input type="hidden" name="inicio" value="simon">
            </form>
            <form action="agregaradmin.php" method="post" id="formagregar">
                <input type="hidden" name="inicio" value="simon">
                <input type="hidden" name="crud" value="salas">
            </form>
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar evento</button>
            <button class="buttontable" onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Sala</th>
                <th>Numero de columnas</th>
                <th>Numero de filas</th>
                <th>Acciones</th>
              </tr>
              <tr>
                '.$contenidocrud.'
              </tr>
              
            </table>
    
          </div>
        ',
    ];
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
    ';
    
    $final='
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
    
    if($_POST['inicio']=='simon'){
        echo $inicio;
        echo $cruds[$_POST['crud']];
        echo $final;
    }else{
        header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
    }
}else{
    header("location: account.php?err=Es%20necesario%20iniciar%20sesion%20para%20acceder%20comoa%20dministrador");
}
?>