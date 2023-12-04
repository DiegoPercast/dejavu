<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "conectar.php";
    if(isset($_POST['inicio'])){
        if($_POST['inicio']=='usuarioiniciado'){
            $sql = "DELETE FROM compracursos WHERE id_compracurso = ?";
            
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("i", $param_id);
                
                $param_id = trim($_POST["elementoc"]);
                
                if($stmt->execute()){
                    echo '
                    <form action="carrito.php" method="post" id="regresar">
                        <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
                        <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
                        <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
                    </form>
                    
                    <script>document.getElementById("regresar").submit()</script>
                    ';
                    exit();
                } else{
                    echo '<script>alert("'.$_POST['elementoc'].'")</script>';
                }
            }


        }
    }
}