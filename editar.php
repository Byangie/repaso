<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=intro2023a', 'root', '', $pdo_options);
    ?>
<form action="index.php" method="POST">
        <input type="text" name="carnet" placeholder="Ingrese el carnet">
        </br>
        <input type="text" name="nombre" placeholder="Ingrese el nombre">
        </br>
        <input type="text" name="dpi" placeholder="Ingrese el dpi">
        </br>
        <input type="text" name="direccion" placeholder="Ingrese la direccion">
        </br>
        <input type="hidden" namme="accion" value="crear">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
</body>
</html>