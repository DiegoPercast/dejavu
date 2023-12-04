<?php
session_start();
require_once 'conectar.php';
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['inicio'])){
      if($_POST['inicio']=='usuarioiniciado'){
        echo '
        <form action="#" method="post" id="infoinicio">
          <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
          <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
          <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
        </form>';
        if (isset($_POST['guardar_asientos']) && isset($_POST['asiento'])) {
          $asientos = $_POST['asiento'];
          foreach($asientos as $asiento) {
            echo $asiento . "<br>";
          }
        }
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