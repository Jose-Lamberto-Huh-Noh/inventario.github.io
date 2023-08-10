<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="" method="POST">
        <?php

            if(isset($errorLogin)){
                echo $errorLogin;
            }

        ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
        <p class="center"><a class="center" href="FormularioRegistro/index2.php" target="_blank">Registrar nuevo usuario</a></p>
        
    </form>
</body>
</html>