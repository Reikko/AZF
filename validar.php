<?php

include ("conexion.php");
/**
 * Created by Cristobal Zavala Cano.
 * User: Cristobal
 * Date: 08/09/2016
 * Time: 10:28
 */
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){
    header("Location: index.php");
    exit();
}

$enlace = conexion();
$query = "SELECT * FROM usuario WHERE alias =  '".$usuario."'";
$result = mysqli_query($enlace, $query);

if($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

    if($row['contrasenia'] == $pass){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id_usuario'] = $row["id_usuario"];
        $_SESSION['privilegio'] = $row["privilegio"];

        if($_SESSION['privilegio'] == 1)
        {
            header("Location: administrador/admin.php");
        }

        if($_SESSION['privilegio'] == 0)
        {
            header("Location: cliente/clientes.php");
        }

        if($_SESSION['privilegio'] == 2)
        {
            header("Location: trabajador/trabajador.php");
        }
    }
    else
    {
        //printf("%s ",$row["contrasenia"] ); //Mostrar mensaje de Error
        header("Location: index.php");
        exit();
    }
}else {
    header("Location: ../index.php");//Poner Mensaje de usuario no encontrado
    exit();
}

mysqli_free_result($result);
mysqli_close($enlace);

?>