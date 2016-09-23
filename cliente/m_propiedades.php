<?php
/**
 * Created by PhpStorm.
 * User: Cristobal
 * Date: 13/09/2016
 * Time: 16:16
 */
require_once("../conexion.php");
switch ($_POST['opcion'])
{
    case "muestra_cliente":
        m_dt_propiedades($_POST['id']);
        break;
}

function m_dt_propiedades($usuario)
{
    $enlace = conexion();

    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {
        $query = "SELECT * FROM desarrollo DES INNER JOIN propiedad PROP ON DES.id_fraccionamiento = PROP.id_fraccionamiento 
                        INNER JOIN estado EST ON DES.id_estado = EST.id_estado WHERE id_usuario= '".$usuario."'";
                    
        $result = mysqli_query($enlace, $query);

        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo"
                <tr>
                    <td>".$row["calle"]." #$row[num_ext] ,". $row["fraccionamiento"].", $row[estado] ,".$row["colonia"]."</td>
                    
                    <td>
                    <button type=\"button\" href=\"#\" class=\"btn btn-primary btn-block btn-md\" id='$row[id_propiedad]' data-toggle=\"modal\" data-target=\"#alta_reporte\" data-backdrop=\"static\" onclick=\"g_d_reporte(this.id)\">Reportar fallo</button></td>
                    
                </tr>
            ";
        }
        mysqli_free_result($result);

        mysqli_close($enlace);
    }

}
?>