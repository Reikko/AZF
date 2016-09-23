<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 15/09/2016
 * Time: 9:50
 */

require_once("../conexion.php");


switch ($_POST['opcion'])
{
    case "cambia_estado":
            gen_fracc($_POST['estado']);
        break;

}

function gen_Estados()
{
    $conn = conexion();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT * FROM estado";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <option value=".$row["id_estado"].">".$row["estado"]."</option>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function gen_fracc($idestado)
{
    $conn = conexion();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT * FROM desarrollo WHERE id_estado=".$idestado;
        $result = mysqli_query($conn, $sql);

        //$i=0;
        //$rawdata = array();

        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            //$rawdata[$i] = $row;
            //$i++;
            echo"
                <option value=".$row["id_fraccionamiento"].">".$row["fraccionamiento"]."</option>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}


?>