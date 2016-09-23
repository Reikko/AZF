<?php
/**
 * Created by Cristobal.
 * User: cris
 * Date: 06/09/2016
 * Time: 11:43
 */

function conexion()
{
    $host = "127.0.0.1";
    $user = "cris";
    $pw = "zavala_09";
    $db = "azf";

    $enlace = mysqli_connect($host, $user, $pw, $db);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    return $enlace;
}

function ID($tabla)
{
    $enlace = conexion();
    $id = null;
    $query1 = "SELECT AUTO_INCREMENT FROM information_schema.TABLES
                    WHERE TABLE_SCHEMA = 'azf'
                    AND TABLE_NAME = '$tabla'"; //Devuelve Id que va generar
    $result = mysqli_query($enlace, $query1);

    if($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['AUTO_INCREMENT'];
    }
    return $id;
}


?>