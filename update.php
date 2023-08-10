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


$sql="UPDATE producto SET  marca='$marca',presentacion='$presentacion',proveedor='$proveedor',codigo='$codigo',descripcion='$descripcion',precio='$precio',cantidad='$cantidad',peso='$peso' WHERE id_producto='$id_producto'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: producto.php");
    }
?>