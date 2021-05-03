//Código para Datables

//$('#example').DataTable(); //Para inicializar datatables de la manera más simple

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
    $('#cancelacion').click(function(){
        $('#cancel').modal('show');
    });
});//END document.ready