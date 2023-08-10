<?php

include("conexion2.php");
$con=conectar();

$id_usuario=$_POST['id_usuario'];
$nombre=$_POST['nombre'];
$username=$_POST['username'];
$password=$_POST['password'];
$desencriptada=$_POST['desencriptada'];


$sql="UPDATE usuarios SET  nombre='$nombre',username='$username',password='$password',desencriptada='$desencriptada' WHERE id_usuario='$id_usuario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: producto2.php");
    }
?>