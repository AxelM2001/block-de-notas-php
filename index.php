<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="archivo.php" method="POST">

        Asunto: <input type="text" name="asunto" id=""><br><br>
        Descripcion: <br><textarea name="descripcion" id="" cols="100" rows="20"></textarea><br><br>
    
        <input type="submit" name="boton" value="crear archivo">

    </form>

<?php

    $msg = null;
    if (isset ($_POST["directorio"])){

    $carpeta = htmlspecialchars ($_POST["carpeta"]);
    $ruta = htmlspecialchars ($_POST["ruta"]);
    $directorio = $ruta.$carpeta;

    if (!is_dir ($directorio)){
        $crear = mkdir($directorio, 0777, true);

        if ($crear){
            $msg = "Directorio " . $directorio . " creado correctamente";
        } else {
            $smg = "Ha ocurrido un error al crear el directorio";
        }

    } else
        $msg = "El directorio que intentas crear ya existe";
    }
?>

<strong><?php echo $msg ?></strong>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <tr>
            <br><td>Directorio: </td><br>
            <td><input type="text" name="carpeta"></td><br><br>
        </tr>

        <input type="hidden" name="directorio" id="">
        <input type="submit" value="crear">

        <br><br><br>
        <h1>Muestra de que crea el archivo dentro de el administrador de archivos</h1>
        

    </form>
    <br><br><br>
    <img src="prueba2.jpg" width="1000px" >
</body>
</html>