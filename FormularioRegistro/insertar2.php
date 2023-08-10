<?php
include("conexion2.php");
$con=conectar();

$id_usuario=$_POST['id_usuario'];
$nombre=$_POST['nombre'];
$username=$_POST['username'];
$password=$_POST['password'];
$desencriptada=$_POST['desencriptada'];

$sql="INSERT INTO usuarios VALUES('$id_usuario','$nombre','$username','$password','$desencriptada')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: producto2.php");
    
}else {
}
?>