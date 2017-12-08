
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
