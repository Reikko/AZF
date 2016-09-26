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
    case "gen_tab_reporte":
        m_reporte($_POST['rep']);
        break;
}



function m_reporte()
{
    $enlace = conexion();
    $imprime = "";

    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {
        $query = "SELECT * FROM tablareporte T INNER JOIN lugar L ON L.id_lugar = T.id_lugar 
			INNER JOIN defectos D ON D.num_defecto = T.num_defecto 
			INNER JOIN tipodedefecto TI ON TI.id_tipo = D.id_tipo where num_reporte = 9";

        $result = mysqli_query($enlace, $query);
        $imprime .= "
               <table class=\"table table-hover\">
                        <thead>
                        <tr>
                            <th>Lugar</th>
                            <th>Tipo</th>
                            <th>Descripcion del problema</th>
                            <th>Fecha</th>
                            <th>Observacion</th>
                        </tr>
                        </thead>
        ";

        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $imprime.="
                <tr>
                    <td>".$row["lugar"]."</td>
                    <td>".$row["nombre_tipo"]."</td>
                    <td>".$row["descripcion"]."</td>
                    <td>".$row["fecha_realizacion"]."</td>
                    <td>".$row["obs_clie"]."</td>
                    
                </tr>
            ";
        }

        $imprime.= "
                    </table> 
        ";
        mysqli_free_result($result);

        mysqli_close($enlace);
        echo utf8_encode($imprime);
    }

}
?>