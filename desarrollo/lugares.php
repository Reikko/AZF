<?php
require_once("../conexion.php");

switch ($_POST['opcion'])
{
    case "cambia_tipo":
        genera_desc_probl($_POST['tipo']);
        break;
}

function genera_lugares()
{
    $conn = conexion();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT * FROM lugar";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <option value=".$row["id_lugar"].">".$row["nombre"]."</option>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function genera_tipo_defecto()
{
    $conn = conexion();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT * FROM tipodedefecto";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <option value=".$row["id_tipo"].">".$row["nombre"]."</option>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

function genera_desc_probl($tipo)
{
    $conn = conexion();
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT * FROM defectos WHERE id_tipo = '".$tipo."'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <option value=".$row["num_defecto"].">".$row["descripcion"]."</option>
            ";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}

?>