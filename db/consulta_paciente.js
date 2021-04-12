$(buscar_pacientes());

function buscar_pacientes(consulta)
{
    $.ajax({
        url: 'db/consulta_paciente.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(buscar_paciente){
        $("#items").php(buscar_paciente);
    })
    .fail(function(){
        console.log("Error");
    })
}
$(document).on('keyup','#s_items',function(){
    var num = $(this).val();
    if(num !="")
    {
        buscar_pacientes(num);
    }
    else{
        buscar_pacientes();
    }
});
