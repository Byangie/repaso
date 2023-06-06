<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <title>Document</title> 
</head>
<body>
    <?php 
    // En php todas las variables inician con símbolo de $
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=intro2023a', 'root', '', $pdo_options);

    if(isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){
        $insert = $conexion->prepare("INSERT INTO alumno (carnet,nombre,dpi,direccion) 
        VALUES(:carnet,:nombre,:dpi,:direccion)");
        $insert->bindValue('carnet', $_POST['carnet']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('dpi', $_POST['dpi']);
        $insert->bindValue('direccion', $_POST['direccion']);
        $insert->execute();
    }

    $select = $conexion->query("SELECT carnet, nombre, dpi, direccion FROM alumno");
    ?>

<a href="crear.php">Crear Nuevo</a>
<table border="1">
    <thead>
        <tr>
            <th>Carnet</th>
            <th>Nombre</th>
            <th>DPI</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($select->fetchAll() as $alumno) { ?>
            <tr>
                <td> <?php echo $alumno["carnet"] ?> </td>
                <td> <?php echo $alumno["nombre"] ?> </td>
                <td> <?php echo $alumno["dpi"] ?> </td>
                <td> <?php echo $alumno["direccion"] ?> </td>
                <td> 
                    <form action="editar.php" method="POST">
                        <button type="submit">Editar</button>
                        <input type="hidden" name="carnet"
                            value="<?php echo $alumno["carnet"] ?>">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>