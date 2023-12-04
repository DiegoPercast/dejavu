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
                      $contenidocrud.= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver asientos" class="iconstable">';
                      $contenidocrud.= '<form action="modificaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="eventos">
                                          <input type="hidden" name="id" value="'.$row['id'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="eliminaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="preguntar">
                                          <input type="hidden" name="crud" value="eventos">
                                          <input type="hidden" name="id" value="'.$row['id'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable" style="margin-top:5px;"/>
                                        </form></td>';
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
          $sql = "SELECT * FROM obras";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_array()) {
                      $contenidocrud .= "<tr>";
                      $contenidocrud .= "<td>".$row['id_obra']."</td>";
                      $contenidocrud .= "<td>".$row['titulo']."</td>";
                      $contenidocrud .= "<td>".$row['autor']."</td>";
                      $contenidocrud.= '<td class="iconostd">';
                      $contenidocrud.= '<form action="veradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="obras">
                                          <input type="hidden" name="id" value="'.$row['id_obra'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/ver.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="modificaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="obras">
                                          <input type="hidden" name="id" value="'.$row['id_obra'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="eliminaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="preguntar">
                                          <input type="hidden" name="crud" value="obras">
                                          <input type="hidden" name="id" value="'.$row['id_obra'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable" style="margin-top:5px;"/>
                                        </form></td>';
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
        case 'salas':
          $contenidocrud = "";
          $sql = "SELECT * FROM salas";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_array()) {
                      $contenidocrud .= "<tr>";
                      $contenidocrud .= "<td>".$row['id_sala']."</td>";
                      $contenidocrud .= "<td>".$row['numerocolumnas']."</td>";
                      $contenidocrud .= "<td>".$row['numerofilas']."</td>";
                      $contenidocrud.= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver asientos" class="iconstable">';
                      $contenidocrud.= '<form action="modificaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="salas">
                                          <input type="hidden" name="id" value="'.$row['id_sala'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="eliminaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="preguntar">
                                          <input type="hidden" name="crud" value="salas">
                                          <input type="hidden" name="id" value="'.$row['id_sala'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable" style="margin-top:5px;"/>
                                        </form></td>';
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
        case 'clientes':
          $contenidocrud = "";
          $sql = "SELECT * FROM clientes";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_array()) {
                      $contenidocrud .= "<tr>";
                      $contenidocrud .= "<td>".$row['id_cliente']."</td>";
                      $contenidocrud .= "<td>".$row['email']."</td>";
                      $contenidocrud .= "<td>".$row['contra']."</td>";
                      $contenidocrud .= "<td>".$row['nombre']."</td>";
                      $contenidocrud .= "<td>".$row['inscrito']."</td>";
                      $contenidocrud.= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver" class="iconstable">';
                      $contenidocrud.= '<form action="modificaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="clientes">
                                          <input type="hidden" name="id" value="'.$row['id_cliente'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="eliminaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="preguntar">
                                          <input type="hidden" name="crud" value="clientes">
                                          <input type="hidden" name="id" value="'.$row['id_cliente'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable" style="margin-top:5px;"/>
                                        </form></td>';
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
        case 'cursos':
          $contenidocrud = "";
          $sql = "SELECT * FROM cursos";
          if ($result = $mysqli->query($sql)) {
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_array()) {
                      $contenidocrud .= "<tr>";
                      $contenidocrud .= "<td>".$row['id_curso']."</td>";
                      $contenidocrud .= "<td>".$row['titulo']."</td>";
                      $contenidocrud .= "<td>".$row['mensualidad']."</td>";
                      $contenidocrud .= "<td>".$row['descripcion']."</td>";
                      $contenidocrud.= '<td class="iconostd"><img src="assets/img/icons/ver.png" alt="Ver mas" title="Ver" class="iconstable">';
                      $contenidocrud.= '<form action="modificaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="formulario">
                                          <input type="hidden" name="crud" value="cursos">
                                          <input type="hidden" name="id" value="'.$row['id_curso'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/editar.png" alt="Ver mas" title="Editar" class="iconstable" style="margin-top:5px;"/>
                                        </form>';
                      $contenidocrud.= '<form action="eliminaradmin.php" method="post">
                                          <input type="hidden" name="inicio" value="simon">
                                          <input type="hidden" name="accion" value="preguntar">
                                          <input type="hidden" name="crud" value="cursos">
                                          <input type="hidden" name="id" value="'.$row['id_curso'].'" id="nolose">
                                          <input type="image" id="image" alt="Login" src="assets/img/icons/eliminar.png" alt="Ver mas" title="Eliminar" class="iconstable" style="margin-top:5px;"/>
                                        </form></td>';
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
        
    }
    $cruds = [
        "eventos" => '
        <h1 class="title">Administrar Eventos</h1>
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="eventos">
        </form>
          <span class="cabecera">
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
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="obras">
        </form>
          <span class="cabecera">
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar obra</button>
            <button class="buttontable" onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Obra</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Acciones</th>
              </tr>
              '.$contenidocrud.'
              
            </table>
    
          </div>
        ',
        "salas" => '
        <h1 class="title">Administrar Salas</h1>
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="salas">
        </form>
          <span class="cabecera">
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar sala</button>
            <button class="buttontable" onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo" >
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Sala</th>
                <th>Numero de columnas</th>
                <th>Numero de filas</th>
                <th>Acciones</th>
              </tr>
                '.$contenidocrud.'
              
            </table>
    
          </div>
        ',
        "clientes" => '
        <h1 class="title">Administrar Clientes</h1>
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="clientes">
        </form>
          <span class="cabecera">
            <button class="buttontable"onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Cliente</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Inscrito</th>
                <th>Acciones</th>
              </tr>
              '.$contenidocrud.'
              
            </table>
    
          </div>
        ',
        "cursos" => '
        <h1 class="title">Administrar Cursos</h1>
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="cursos">
        </form>
          <span class="cabecera">
            <button class="buttontable" onclick="cambio('."'formagregar'".')"><img src="assets/img/icons/mas.png" alt="agregar" style="height: 20px; width: 20px; margin-right: 5px;">Agregar curso</button>
            <button class="buttontable"onclick="cambio('."'formregresar'".')"><img src="assets/img/icons/regresar.png" alt="regresar" style="height: 20px; width: 20px; margin-right: 5px;">Regresar</button>
          </span>
          <div class="tablacuerpo">
            <table class="tablaadmin">
              <tr class="titulostabla">
                <th>ID Curso</th>
                <th>Titulo</th>
                <th>Mensualidad</th>
                <th>Descripcion</th>
                <th>Acciones</th>
              </tr>
              '.$contenidocrud.'
              
            </table>
    
          </div>
        ',
        "compras" => '
        <h1 class="title">Administrar Compras</h1>
        <form action="administrador.php" method="post" id="formregresar">
          <input type="hidden" name="inicio" value="simon">
        </form>
        <form action="agregaradmin.php" method="post" id="formagregar">
              <input type="hidden" name="inicio" value="simon">
              <input type="hidden" name="accion" value="formulario">
              <input type="hidden" name="crud" value="compras">
        </form>
          <span class="cabecera">
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
        <link rel="stylesheet" href="./css/crudresponsive.css" />
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