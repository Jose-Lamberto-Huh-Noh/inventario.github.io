<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT *  FROM producto";
$query = mysqli_query($con, $sql);











?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Inventario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <div id="menu">
        <center>
            <ul style="height:0px">
                <li>
                    <a class="boton" href="includes/logout.php"> Cerrar sesión</a>
                </li>
            </ul>
        </center>
        <form action="generar_lista.php" method="POST">
            <input type="submit" class="btn btn-primary" name="generar_lista" value="Generar Lista">
        </form>
        
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Ingrese datos</h1>

                <form action="insertar.php" method="POST">

                    <input type="text" class="form-control mb-3" name="id_producto" placeholder="Id producto">
                    <input type="text" class="form-control mb-3" name="marca" placeholder="Marca">
                    <input type="text" class="form-control mb-3" name="presentacion" placeholder="Presentacion">
                    <input type="text" class="form-control mb-3" name="proveedor" placeholder="Proveedor">
                    <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo">
                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion">
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio">
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad">
                    <input type="text" class="form-control mb-3" name="peso" placeholder="Peso">

                    <input type="submit" class="btn btn-primary">
                </form>

            </div>

            <div class="col-md-8">
                <table class="table mt-3" id="mitabla">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Id producto</th>
                            <th>Marca</th>
                            <th>Presentacion</th>
                            <th>Proveedor</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Peso</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['id_producto'] ?></th>
                                <th><?php echo $row['marca'] ?></th>
                                <th><?php echo $row['presentacion'] ?></th>
                                <th><?php echo $row['proveedor'] ?></th>
                                <th><?php echo $row['codigo'] ?></th>
                                <th><?php echo $row['descripcion'] ?></th>
                                <th><?php echo $row['precio'] ?></th>
                                <th><?php echo $row['cantidad'] ?></th>
                                <th><?php echo $row['peso'] ?></th>

                                <th><a href="actualizar.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-danger">Eliminar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mitabla').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json'
                }
            });
        });
    </script>

</body>

</html>