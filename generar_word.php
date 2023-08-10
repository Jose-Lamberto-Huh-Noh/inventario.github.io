<?php
require_once 'vendor/autoload.php';

\PhpOffice\PhpWord\Autoloader::register();

// Crear un nuevo objeto de documento
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Agregar una sección al documento
$section = $phpWord->addSection();

// Crear una tabla
$table = $section->addTable();

// Agregar encabezados de columna
$table->addRow();
$table->addCell()->addText('Cantidad');
$table->addCell()->addText('Inversión');
$table->addCell()->addText('Utilidad');

// Calcular los valores y agregar filas a la tabla
$totalProducts = mysqli_num_rows($query);
$totalInvestment = 0;
$totalProfit = 0;

while ($row = mysqli_fetch_array($query)) {
    // Obtener los valores de cantidad y precio
    $cantidad = $row['cantidad'];
    $precio = $row['precio'];

    // Calcular inversión y utilidad
    $inversion = $cantidad * ($precio * 1.2);
    $utilidad = $cantidad * ($precio * 0.2);

    // Actualizar los totales
    $totalInvestment += $inversion;
    $totalProfit += $utilidad;

    // Agregar una fila a la tabla con los valores calculados
    $table->addRow();
    $table->addCell()->addText($cantidad);
    $table->addCell()->addText($inversion);
    $table->addCell()->addText($utilidad);
}

// Agregar una fila para mostrar los totales
$table->addRow();
$table->addCell()->addText('Total');
$table->addCell()->addText($totalInvestment);
$table->addCell()->addText($totalProfit);

// Guardar el documento como un archivo Word
$filename = 'lista_productos.docx';
$phpWord->save($filename);

// Descargar el archivo generado
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename);
readfile($filename);
exit();
?>
