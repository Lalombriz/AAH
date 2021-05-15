//Código para Datables



$(document).ready(function() {    
    $('#paciente').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});

$(document).ready(function(){
    $(document).on('click','.detalle_pac',function(){
        var num_paciente = $(this).attr("id");
        if(num_paciente !='')
        {
            $.ajax({
                url:"../AAH/db/detalle_paciente.php",
                method:"POST",
                data:{num_paciente:num_paciente},
                success:function(data){
                    $('#detalle_p').html(data);
                    $('#details').modal('show');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); 
                    alert("Error: " + errorThrown); 
                }
            })
        }
    });
});//END document.ready

$(document).ready(function(){
    $(document).on('click','.cancelar_cita',function(){
        $('#cancel').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#cancel_id').val(data[0]);
        $('#motivo').val(data[11])
    });
});//END document.ready

$(document).ready(function(){
    $(document).on('click','.imprimir',function(){
        $('#archivos').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#imprimir_id').val(data[0]);
    });
});//END document.ready

$(document).ready(function(){
    $(document).on('click','.cambio_estatus',function(){
        $('#modal_estatus').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#estatus_id').val(data[0]);
    });
});//END document.ready

$(document).ready(function(){
    $(document).on('click','.estatus_btn',function(){
        var checkboxlist = document.getElementById('select_estatus');
        var checkOptions =   checkboxlist.getElementsByTagName('input');
        var listSelected = checkboxlist.getElementsByTagName('li');
        var last_val = '';
        for(i = 0; i < checkOptions.length; i++)
               {
                   if(checkOptions[i].checked)
                   {
                       last_val = listSelected[i].textContent || listSelected[i].innerText; // so it works in IE8 and lower
                   }
               }
        $('#selected_e').val(last_val);
    });
});//END document.ready

$('input[type="checkbox"]').on('change', function() {
    $('input[type="checkbox"]').not(this).prop('checked', false);
 });
