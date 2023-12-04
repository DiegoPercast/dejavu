<?php
session_start();
require_once 'conectar.php';

if(isset($_POST['guardar_asientos']) && isset($_POST['asiento'])) {
  $asientos = $_POST['asiento'];
  foreach($asientos as $asiento) {
    echo $asiento . "<br>";
  }
} else {
  echo "tilin";
}
?>