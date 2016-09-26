/**
 * Created by Cristobal on 19/09/2016.
 */


function alta_cliente()
{
    var checa = document.getElementById('formCliente').checkValidity();//Checa si se completo el forulario
    if(checa)
    {
        var nombre = $("#nombre").val();
        var ap = $("#ap").val();
        var am = $("#am").val();
        var tel = $("#tel").val();
        var calle = $("#calle").val();
        var nin = $("#n_int").val();
        var nex = $("#n_ext").val();
        var fra = $("#selfraccion").val();

        $.ajax({
            type: 'post',
            data: {
                opcion: "alta_cliente",
                nombre: nombre,
                ap :ap,
                am :am,
                tel:tel,
                calle:calle,
                nin:nin,
                nex:nex,
                fra:fra
            },
            url: "../cliente/a_cliente.php"
        }).done(function (data) {
            clear_campos_Cliente();
        });
    }
}

function clear_campos_Cliente()
{
    $("#nombre").val("");
    $("#ap").val("");
    $("#am").val("");
    $("#tel").val("");
    $("#calle").val("");
    $("#n_int").val("");
    $("#n_ext").val("");

}

function alta_problema()
{
    var checa = document.getElementById('formCliente').checkValidity();//Checa si se completo el forulario
    //if(checa)
    {
        var n_rep = 9;
        var lugar = $("#selLugar").val();
        var prob = $("#selProblema").val();

        var obs = $("#observacion").val();

        $.ajax({
            type: 'post',
            data: {
                opcion: "alta_problema",
                lugar: lugar,
                prob:prob,
                n_rep:n_rep,
                obs:obs
            },
            url: "../cliente/a_cliente.php"
        }).done(function (data) {
        gen_tab_reporte(n_rep);
        });
    }
}

































