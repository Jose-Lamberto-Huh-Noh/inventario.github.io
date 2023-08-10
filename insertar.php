<?php
include("conexion.php");
$con=conectar();

$id_producto=$_POST['id_producto'];
$marca=$_POST['marca'];
$presentacion=$_POST['presentacion'];
$proveedor=$_POST['proveedor'];
$codigo=$_POST['codigo'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$peso=$_POST['peso'];


$sql="INSERT INTO producto VALUES('$id_producto','$marca','$presentacion','$proveedor','$codigo','$descripcion','$precio','$cantidad','$peso')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: producto.php");
    
}else {
}
?>