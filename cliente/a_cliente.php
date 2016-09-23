<?php
require_once("../conexion.php");
/**
 * Created by Cristobal.
 * User: Cris
 * Date: 19/09/2016
 * Time: 15:42
 */

switch ($_POST['opcion'])
{
    case "alta_cliente":
            alta_cliente();
        break;

}

function alta_cliente()
{
    $enlace = conexion();
    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {
        $id = ID("usuario");
        if($id != null)
        {
            $alias = "".$_POST["nombre"]."".$id;

            $query1 = "INSERT INTO usuario (alias,nombre, ap_pat,ap_mat,telefono,contrasenia,privilegio)
                    VALUES ('$alias','$_POST[nombre]','$_POST[ap]','$_POST[am]','$_POST[tel]','12345','0')";
            mysqli_query($enlace, $query1);

            $query2 = "INSERT INTO propiedad (id_usuario,calle,num_ext,num_int,id_fraccionamiento)
                    VALUES ('$id','$_POST[calle]','$_POST[nex]','$_POST[nin]','$_POST[fra]')";
            mysqli_query($enlace, $query2);
        }
        mysqli_close($enlace);
    }

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