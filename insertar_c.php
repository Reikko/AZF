<?php
include ("conexion.php");
/**
 * Created by Cristobal Zavala.
 * User: Cris
 * Date: 06/09/2016
 * Time: 11:17
 */

    if(isset($_POST['nombre']) && !empty($_POST['nombre']))
    {
        $conn = conexion();

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        else
        {
            $sql = "INSERT INTO usuario (nombre, alias , ap_pat,ap_mat,telefono,contrasenia) 
                    VALUES ('$_POST[nombre]','$_POST[ali]','$_POST[a_pa]','$_POST[a_ma]','$_POST[tel]','$_POST[pw2]')";
            $result = mysqli_query($conn, $sql);

            //if ($conn->query($sql) === TRUE)
            if($result === TRUE)
            {
                header("Location: index.php");
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //mysqli_free_result($result);
            $conn->close();
        }

    }
    else
    {
        echo "problemas al insertar datos";
    }

?>