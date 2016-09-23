<?php
/**
 * Created by PhpStorm.
 * User: Cristobal
 * Date: 23/09/2016
 * Time: 04:53 PM
 */

require_once("../conexion.php");
switch ($_POST['opcion'])
{
    case "muestra_cliente":
        m_dt_propiedades($_POST['id']);
        break;
}

function m_reporte()
{
    $enlace = conexion();

    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {
        $query = "SELECT * FROM tablareporte where id_lugar = 1";

        $result = mysqli_query($enlace, $query);

        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <tr>
                    <td>".$row["id_lugar"]."</td>
                    <td>".$row["num_defecto"]."</td>
                    <td>".$row["fecha_realizacion"]."</td>
                    <td>".$row["obs_clie"]."</td>
                    
                </tr>
            ";
        }
        mysqli_free_result($result);

        mysqli_close($enlace);
    }

}
?>