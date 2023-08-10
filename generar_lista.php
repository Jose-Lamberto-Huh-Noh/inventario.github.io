<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT marca, presentacion, descripcion, peso, cantidad FROM producto WHERE cantidad <= 8";
$query = mysqli_query($con, $sql);

// Crear archivo Word
$filename = "lista_productos.doc";
$file = fopen($filename, 'w');

// Escribir encabezado en el archivo Word
$encabezado = "<html>
                <head>
                  <style>
                    body {
                      font-family: 'Times New Roman', Times, serif;
                      font-size: 12pt;
                    }
                    table {
                      border-collapse: collapse;
                      width: 100%;
                    }
                    th, td {
                      border: 1px solid black;
                      padding: 8px;
                    }
                    th {
                      background-color: #f2f2f2;
                    }
                  </style>
                </head>
                <body>
                  <table>
                    <tr>
                      <th>Marca</th>
                      <th>Presentación</th>
                      <th>Descripción</th>
                      <th>Peso</th>
                      <th>Cantidad</th>
                    </tr>";
fwrite($file, $encabezado);

// Escribir datos de los productos en el archivo Word
while ($row = mysqli_fetch_array($query)) {
    $marca = $row['marca'];
    $presentacion = $row['presentacion'];
    $descripcion = $row['descripcion'];
    $peso = $row['peso'];
    $cantidad = $row['cantidad'];

    $linea = "<tr>
                <td>$marca</td>
                <td>$presentacion</td>
                <td>$descripcion</td>
                <td>$peso</td>
                <td>$cantidad</td>
              </tr>";
    fwrite($file, $linea);
}

// Cerrar la tabla y el cuerpo en el archivo Word
fwrite($file, "</table></body></html>");

// Cerrar el archivo Word
fclose($file);

// Descargar el archivo Word generado
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/msword");
header("Content-Length: " . filesize($filename));
readfile($filename);

// Eliminar el archivo Word del servidor
unlink($filename);
?>



