
<?php
include ("m_cliente.php");
include ("m_propiedades.php");
session_start();
if (isset($_POST['nnombre'])){
    $_SESSION['usuario'] = $_POST['nnombre'];
}
if ($_SESSION['usuario'] && $_SESSION['privilegio'] == 0){
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
    <style type="text/css">

    </style>

</head>
<body>

<div class="container">
    <h1>YO SOY EL CLIENTE</h1>


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
            <?php m_datos_cliente($_SESSION['id_usuario']);
            //$hoy = date("F j, Y, g:i a");
            //echo"<h3>".$hoy."</h3>";

            setlocale(LC_ALL,"es_ES");
            echo strftime("%A %d de %B del %Y");
            ?>
        </div>
        <div id="propiedad" class="tab-pane fade">
            <h2>Mis Propiedades</h2>
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th>Direccion</th>
                    <th>Editar</th>
                    <th>Reportar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    m_dt_propiedades();
                ?>

                </tbody>
            </table>
        </div>
        </div>

        <div id="reporte" class="tab-pane fade">
        </div>

        <div id="menu3" class="tab-pane fade">
        </div>

    <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Levantamiento de un reporte</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form>
                                <div class="form-group">
                                    <label for="sel1">Lugar:</label>
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>










</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>