<?php
include("conexion2.php");
$con = conectar();

$sql = "SELECT *  FROM usuarios";
$query = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro</title>
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
    <div>
        <center>
            <ul style="height:0px">
                <li>
                    <a class="boton" href="includes/logout.php"> Cerrar sesión</a>
                </li>
            </ul>
        </center>
    </div>
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese datos</h1>
                <form action="insertar2.php" method="POST">
                    <input type="text" class="form-control mb-3" name="id_usuario" placeholder="id_usuario">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre">
                    <input type="text" class="form-control mb-3" name="username" placeholder="username">
                    <input type="text" class="form-control mb-3" name="password" placeholder="password">
                    <input type="text" class="form-control mb-3" name="desencriptada" placeholder="desencriptada">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table mt-3" id="mitabla">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>id usuario</th>
                            <th>nombre</th>
                            <th>username</th>
                            <th>password</th>
                            <th>desencriptada</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['id_usuario'] ?></th>
                                <th><?php echo $row['nombre'] ?></th>
                                <th><?php echo $row['username'] ?></th>
                                <th><?php echo $row['password'] ?></th>
                                <th><?php echo $row['desencriptada'] ?></th>

                                <th><a href="actualizar2.php?id=<?php echo $row['id_usuario'] ?>" class="btn btn-info">Editar</a></th>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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