<?
if($_SERVER['REQUEST_METHOD']=='POST'){
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