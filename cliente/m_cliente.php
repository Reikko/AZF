<?php
include ("../conexion.php");
/**
 * Created by Cristobal Zavala Cano.
 * User: Cristobal
 * Date: 09/09/2016
 * Time: 10:38
 */

switch ($_POST['opcion'])
{
    case "muestra_cliente":
        m_datos_cliente($_POST['id']);
        break;

    case "cab_reporte":

        cab_reporte($_POST['id']);
        break;
}

function m_datos_cliente($usuario)
{
    $enlace = conexion();

    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {
        //$alias = $_SESSION['usuario'];
        $query = "SELECT * FROM usuario WHERE id_usuario =  '".$usuario."'";
        $result = mysqli_query($enlace, $query);

        if($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo "
                <table class=\"table\">
                    <thead>
                    <tr>
                        <th>ID: ".$usuario." _______Usuario: ".$row["alias"]." </th>
                    </tr>
                    
                    <tr>
                        <th>Nombre: ".$row["nombre"]. " $row[ap_pat] ". $row["ap_mat"]."</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Telefono: ".$row["telefono"]."</td>
                    </tr>
                    </tbody>
                </table>
            ";
            mysqli_free_result($result);
        }
        else
        {
            exit();
        }
        mysqli_close($enlace);
    }

}

function cab_reporte($usuario)
{
    $enlace = conexion();
    setlocale(LC_ALL,"es_MX");
    $fecha = strftime("%A %d de %B del %Y");
    $nu= $_POST['pro'];
    $fracc = 0;

    if ($enlace->connect_error)
    {
        die("Connection failed: " . $enlace->connect_error);
    }
    else
    {

        $query1 = "SELECT nombre,ap_pat,ap_mat,telefono FROM usuario WHERE id_usuario = '".$usuario."'";
        $result1 = mysqli_query($enlace, $query1);

        $query2 = "SELECT * FROM desarrollo DES INNER JOIN propiedad PROP ON DES.id_fraccionamiento = PROP.id_fraccionamiento 
                        INNER JOIN estado EST ON DES.id_estado = EST.id_estado WHERE id_propiedad= '".$nu."'";
        $result2 = mysqli_query($enlace, $query2);




        echo " <table class=\"table\">";
        echo "
            <tr>
                <td>N° Reporte:</td>
            </tr>
            ";
        echo "
            <tr>
                <td>Fecha: ".$fecha."</td>
            </tr>
        ";
        if($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
        {
            echo "
                <tr>
                    <td>Propietario:  ".$row["nombre"]. " $row[ap_pat] ". $row["ap_mat"].".Telefono: ".$row["telefono"]."</td>
                </tr>
            ";
            mysqli_free_result($result1);
        }

        if($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
        {
            echo "
                    <tr>
                        <td>Direccion:".$row2["calle"]." #$row2[num_ext] ,". $row2["fraccionamiento"].", $row2[estado] ,".$row2["colonia"]."</td>
                    </tr>
            ";
            $fracc = $row2['id_fraccionamiento'];
            mysqli_free_result($result2);
        }

        $query3 = "SELECT * FROM asignacion A INNER JOIN usuario U ON U.id_usuario = A.id_empleado WHERE id_fraccionamiento = '".$fracc."'";
        $result3 = mysqli_query($enlace, $query3);




        if($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
        {
            echo "
                <tr>
                    <td>Supervisor:  ".$row3["nombre"]. " $row3[ap_pat] ". $row3["ap_mat"].".Telefono: ".$row3["telefono"]."</td>
                </tr>
            ";
            mysqli_free_result($result3);
        }

        echo "</table>";
        mysqli_close($enlace);
    }

}

?>

