<?php

    $archivo = fopen("archivo.txt","a") or die ("Error al crear archivo");

    $asunto = $_REQUEST['asunto'];
    $descripcion = $_REQUEST['descripcion'];

    fwrite($archivo,$asunto);
    fwrite($archivo,"\n");
    fwrite($archivo,$descripcion);
    fwrite($archivo,"\n");

    echo "Se creó correctamente el archivo";

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