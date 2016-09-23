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


?>