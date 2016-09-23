/**
 * Created by Cris on 15/09/2016.
 */

function cambioEstado()
{
    var estado = $("#selEstados").val();
    $.ajax({
        type : 'post',
        data:{ opcion: "cambia_estado" ,"estado":estado},
        url:"../desarrollo/des.php"
    }).done(function(data){
        $("#selfraccion").html(data);
    });

}

function cambioTipoDefecto()
{
    var tipo = $("#selTipo").val();
    $.ajax({
        type : 'post',
        data:{ opcion: "cambia_tipo" ,tipo:tipo},
        url:"../desarrollo/lugares.php"
    }).done(function(data){

        $("#selProblema").html(data);
    });

}