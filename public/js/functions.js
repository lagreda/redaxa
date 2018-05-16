
function deleteElement(form_id) {
    if(confirm("¿Está seguro(a) de eliminar el elemento?"))
    $("#df"+form_id).submit()

    return true
}

function exitForm(url) {
    if(confirm("¿Está seguro(a) de salir?"))
        window.location = url

    return true
}

function updateStatus(url, element) {
    var status = element.checked ? '1' : '0'
    var url_update = url + '/' + status

    $.ajax({
        url: url_update
    })

    return true
}

function generateReport(form_id) {
    var form = $("#fo");
    var report_type = $("#report_type").val()
    if(report_type == "")
    {
        alert("Por favor seleccione un tipo de reporte")
        return false;
    }
    var data = form.serialize();

    var url = '';
    if(report_type == 2)
        url = 'had-promotion-after-espae'
    if(report_type == 3)
        url = 'had-incomes-increase'
    if(report_type == 4)
        url = 'had-responsabilities-increase'
    if(report_type == 5)
        url = 'reality-vs-expectative'
    if(report_type == 6)
        url = 'belong-level-espae'
    if(report_type == 7)
        url = 'work-knowledge-value'
    if(report_type == 8)
        url = 'life-knowledge-value'
    if(report_type == 9)
        url = 'satisfaction-level-espae'

    $.ajax({
        url: url,
        data: data,
        method: 'POST',
        dataType: 'html',
        cache: false
    }).done(function(html) {
        $("#rf").html(html);
    });
}
