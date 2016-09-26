
<?php
$_POST['opcion'] = 2;
include ("../cliente/m_cliente.php");
include ("../cliente/m_reporte.php");
include ("../cliente/m_propiedades.php");
include ("../desarrollo/des.php");
include ("../desarrollo/lugares.php");

session_start();
if (isset($_POST['nnombre'])){
    $_SESSION['usuario'] = $_POST['nnombre'];
}
if ($_SESSION['usuario'] && $_SESSION['privilegio'] == 1){
}
else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
        .col-sm-4
        {
            padding-right: 3px;
            padding-left: 3px;
        }

        .table-hover>tbody>tr:hover
        {
            background-color: lawngreen;
        }
    </style>

</head>
<body>

<div class="container">
    <h1>YO SOY EL ADMINISTRADOR</h1>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Casas Crece</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Areas de Desarrollo</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#alta_cliente" data-backdrop="static">Dar de Alta</a></li>
                            <li><a href="#">Mostrar Clientes</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../salir.php"><span class="glyphicon glyphicon-user"></span> Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <h2>Clientes</h2>
    <?php
    /*if($_SESSION["privilegio"] == 1)
    {
        echo "
            <div class=\"container-fluid\">
                <form class=\"form-horizontal\">
                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\">Id Cliente</label>
                        <div class=\"col-sm-2\">
                            <input class=\"form-control\" id=\"id_Cliente\" type=\"text\">
                        </div>
                        <button type=\"button\" class=\"btn btn-success col-sm-1\">Buscar</button>
                    </div>
                </form>
            </div>
        ";
    }*/
    ?>

    <div class="container-fluid">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">Id Cliente</label>
                <div class="col-sm-2">
                    <input class="form-control" id="id_Cliente" type="text">
                </div>
                <button type="button" class="btn btn-success col-sm-1" onclick="g_d_cliente()">Buscar</button>
            </div>
        </form>
    </div>

    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#inicio">Perfil</a></li>
        <li><a data-toggle="pill" href="#rep">Reportes</a></li>
    </ul>


    <div class="tab-content">
        <div id="inicio" class="tab-pane fade in active">
            <div class="table-responsive" id="datos_cliente">
                <?php
                    m_datos_cliente($_SESSION['id_usuario']);
                //setlocale(LC_ALL,"es_ES");
                //echo strftime("%A %d de %B del %Y");
                ?>
            </div>

            <h2>Propiedades</h2>
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th>Direccion</th>
                    <th>Reportar</th>
                </tr>
                </thead>
                <tbody id="propiedades">
                <?php
                    m_dt_propiedades($_SESSION['id_usuario']);
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="rep" class="tab-pane fade">
    </div>



    <!-- Modal alta de Cliente -->
    <div class="modal fade" id="alta_cliente" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Alta de Vivienda</h4>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="formCliente" >
                            <label for="text" id ="te">Nombre completo:</label>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ap" placeholder="Ap. Paterno">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="am" placeholder="Ap. Materno">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="text">Telefono:</label>
                                <input type="text" class="form-control" id="tel" placeholder="Teléfono">
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="sel1">Estado:</label>
                                        <select class="form-control" id="selEstados" onchange="cambioEstado();">
                                            <?php
                                                gen_Estados();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="sel1">Fraccionamiento:</label>
                                        <select class="form-control" id="selfraccion">
                                            <?php
                                                gen_fracc(1);
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="text">Calle:</label>
                                        <input type="text" class="form-control" id="calle" placeholder="Calle">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="text">N° Exterior:</label>
                                        <input type="text" class="form-control" id="n_ext" placeholder="N° Exterior">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="text">N° Interior:</label>
                                        <input type="text" class="form-control" id="n_int" placeholder="N° Interior">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <input type="button" class="btn btn-info" value="Aceptar" onclick="alta_cliente();">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Genera reporte-->
    <div class="modal fade" id="alta_reporte" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reporte de fallo</h4>
                </div>

                <div class="modal-body">

                    <div id="cab_rep">
                    </div>

                    <div class="table-responsive" id="tablaReporte">
                        <?php
                            m_reporte();
                        ?>
                    </div>

                    <div style="background-color: lightcyan">
                        <form>
                            <div class="col-sm-4">
                                <label for="sel1">Lugar:</label>
                                <select class="form-control" id="selLugar">
                                    <?php
                                        genera_lugares();
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="sel1">Tipo:</label>
                                <select class="form-control" id="selTipo" onchange="cambioTipoDefecto();">
                                    <?php
                                        genera_tipo_defecto();
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label for="sel1">Descripcion del Problema:</label>
                                <select class="form-control" id="selProblema">
                                    <?php
                                        genera_desc_probl(1);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Observacion:</label>
                                <input type="text" class="form-control input-lg" id="observacion">

                            </div>
                            <!--<button type="submit" class="btn btn-default" onclick="alta_problema();">Agregar</button>-->
                            <input type="button" class="btn btn-info" value="Agregar" onclick="alta_problema();">
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>




    <!-- Modal de horario del cliente-->
    <div class="modal fade" id="m_hora_cliente" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Proporcionanos tu horario</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <form>
                                <p>Dia(s)</p>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Lunes</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Martes</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Miercoles</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Jueves</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Viernes</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Sábado</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../desarrollo/alta.js"></script>
<script src="../desarrollo/cambia.js"></script>
<script src="../desarrollo/genera.js"></script>
</body>
</html>