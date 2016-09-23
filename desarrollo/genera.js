/**
 * Created by Ali on 21/09/2016.
 */

function g_d_cliente()
{
    var id = $("#id_Cliente").val();

    $.ajax({
        type: 'post',
        data: {
            opcion: "muestra_cliente",
            id: id,
        },
        url: "../cliente/m_cliente.php"
    }).done(function (data) {
        $("#datos_cliente").html(data);
    });

    $.ajax({
        type: 'post',
        data: {
            opcion: "muestra_cliente",
            id: id,
        },
        url: "../cliente/m_propiedades.php"
    }).done(function (data) {
        $("#propiedades").html(data);
    });
}

function g_d_reporte(pr)
{
    var id = $("#id_Cliente").val();
    var prob = pr;
    $.ajax({
        type: 'post',
        data: {
            opcion: "cab_reporte",
            id: id,
            pro:prob
        },
        url: "../cliente/m_cliente.php"
    }).done(function (data) {

        $("#cab_rep").html(data);
    });

}