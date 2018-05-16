
var state = 1;
//show initial form panel
$("#basic_data").show();

function next() {
    if(state === 4)
        return false;

    $(".form-panel").hide();
    if(state === 3) {
        state = 4;
        $("#mobility").show();
        moveProgressBar(100);
    }
    if(state === 2) {
        state = 3;
        $("#job_situation").show();
        moveProgressBar(70);
    }
    if(state === 1) {
        state = 2;
        $("#education").show();
        moveProgressBar(50);
    }
    $("#form_section").val(state);
    updtNavigator();
    storeExternalForm();
    return true;
}

function prev() {
    if(state === 1)
        return false; 

    $(".form-panel").hide();
    if(state === 2) {
        state = 1;
        $("#basic_data").show();
        moveProgressBar(30);
    }
    if(state === 3) {
        state = 2;
        $("#education").show();
        moveProgressBar(50);
    }
    if(state === 4) {
        state = 3;
        $("#job_situation").show();
        moveProgressBar(70);
    }
    $("#form_section").val(state);
    updtNavigator();
    storeExternalForm();
    return true;
}

function updtNavigator() {
    if(state === 1)
        $(".btn-info").attr("disabled", "true");
    else
        $(".btn-info").removeAttr("disabled");

    if(state === 4) {
        $(".btn-success").hide();
        $(".btn-primary").show();
    }
    else {
        $(".btn-success").show();
        $(".btn-primary").hide();
    }
}

function moveProgressBar(percentage) {
    $(".progress-bar").html(percentage+"%");
    $(".progress-bar").attr("aria-valuenow", percentage);
    $(".progress-bar").attr("style", "width: "+percentage+"%");
}

function storeExternalForm() {
    var form = $("#extForm");
    var data = form.serialize();
    
    $.ajax({
        method: 'POST',
        url: '../store-form/',
        data: data,
        dataType: 'json'
    }).done(function(json) {
        console.log(json)
        if(json.status == '1') {
            $("#storeOk").show();
        }
    });
}

function end() {
    storeExternalForm();
    setTimeout(function() {
        alert('Datos actualizados exitosamente.');
        location.reload();
    }, 2000);
    return true;
}
