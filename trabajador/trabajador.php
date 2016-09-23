<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 12/09/2016
 * Time: 16:35
 */
include ("m_cliente.php");
session_start();
if (isset($_POST['nnombre'])){
    $_SESSION['usuario'] = $_POST['nnombre'];
}
if ($_SESSION['usuario'] && $_SESSION['privilegio'] == 2){
}
else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css"></style>

</head>
<body>

<div class="container">

    <h6>YO SOY EL TRABAJADOR</h6>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">AZF</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../salir.php"><span class="glyphicon glyphicon-user"></span>Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>Clientes</h2>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#inicio">Perfil</a></li>
        <li><a data-toggle="pill" href="#propiedad">Propiedad</a></li>
        <li><a data-toggle="pill" href="#reporte">Reporte</a></li>
        <li><a data-toggle="pill" href="#menu3">Ver2</a></li>
    </ul>


    <div class="tab-content">
        <div id="inicio" class="tab-pane fade in active">
            <?php m_dt_clientes(); ?>
        </div>
        <div id="propiedad" class="tab-pane fade">
        </div>

        <div id="reporte" class="tab-pane fade">
        </div>

        <div id="menu3" class="tab-pane fade">
        </div>
    </div>








</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>