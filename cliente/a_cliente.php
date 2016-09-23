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
    case "alta_problema":
            alta_problema();
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

function alta_problema()
{
    $enlace = conexion();
    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {

            $query1 = "INSERT INTO tablareporte (num_reporte,id_lugar,num_defecto,obs_clie)
                    VALUES ('$_POST[n_rep]','$_POST[lugar]','$_POST[prob]','$_POST[obs]')";
            $result = mysqli_query($enlace, $query1);
            echo $result;

        mysqli_close($enlace);
    }

}

































?>