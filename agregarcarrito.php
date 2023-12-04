<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "conectar.php";
    if(isset($_POST['inicio'])){
        if($_POST['inicio']=='usuarioiniciado'){
            $sql = "INSERT INTO compracursos (id_curso_2, id_cliente_2) VALUES (?, ?)";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("ii", $curso, $cliente);
                $curso = $_POST['cursoselected'];
                $cliente = $_POST['idcuenta'];
                
                
                if($stmt->execute()){
                    echo '
                    <form action="academia.php" method="post" id="añadircursocarrito">
                      <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
                      <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
                      <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
                    </form>
                    <script>document.getElementById("añadircursocarrito").submit()</script>
                    ';
                    exit();
                    $mysqli->close();
                } else{
                    echo '
                    <form action="academia.php" method="post" id="añadircursocarrito">
                      <input type="hidden" name="correocuenta" value="'.$_POST['correocuenta'].'">
                      <input type="hidden" name="idcuenta" value="'.$_POST['idcuenta'].'">
                      <input type="hidden" name="inicio" value="'.$_POST['inicio'].'">
                    </form>
                    <script>document.getElementById("añadircursocarrito").submit()</script>
                    ';
                    $mysqli->close();

                }
            }
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