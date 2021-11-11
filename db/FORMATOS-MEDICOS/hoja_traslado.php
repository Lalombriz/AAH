<?php
require_once('../../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
$id = $_GET['id'];
// querys para el llenado de el expediente electronico
// query de la cabecera del doc

$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();

//query de la nota de ptraslado
$query2 = "SELECT * from nota_traslado where no_exp = '$id'";
$data2 = $mysqli->query($query2);
$nota_traslado = $data2->fetch_assoc();
//los usuarios de las notas se jalan de las tablas por mientras, pero se usara una variable de sesion para obtener los nombres completos de los usuarios


// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle('HOJA DE TRASLADO');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, '45');
// set header fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set default font subsetting mode
$pdf->setFontSubsetting(true);
$pdf->SetFont('freesansi', '', 12, '',true);
// -----------------------Contenidos------------------------
//NOTA PRE-OPERATORIA
$pdf->AddPage();
$pdf->Image('../../img/Logos/logo3.jpg', 20, 16, 40, 13, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$pdf->Image('../../img/Logos/logo1.jpg', 20, 16, 50, 13, 'jpg', '', '', false, 150, 'L', false, false, 0, false, false, false);
$html='
        
        <br><h1 align="center">UNIDAD DE ESPECIALIDADES MEDICAS DE BAJA CALIFORNIA</h1>
        <h6 align="center">Av. Gastelum Esq. Calle 14 No. #1340 <br> Zona Centro, Ensenada, B.C.<br>LICENCIA SANITARIA:0200110039 <br> Tel. (646) 155-61-26</h6>
         

        <b><h6 align="center">NOTA DE REFERENCIA / TRASLADO A OTRO ESTABLECIMIENTO PARA LA ATENCION MEDICA</h6></b>

        
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="20%">FECHA NACIMIENTO: '.$paciente['fecha_nacimiento'].'</td>
                <td width="20%">FECHA: '.$nota_traslado['fecha'].'</td>  
                <td width="20%">HORA: '.$nota_traslado['hora'].'</td> 
                <td width="40%">PROCEDIMIENTO PROGRAMADO: '.$paciente['procedimiento'].'</td> 
                
            </tr>
            <tr>  
                
            <td width="70%">NOMBRE DE PACIENTE: '.$paciente['nombre_p'].'</td>  
            <td width="15%">SEXO: '.$paciente['sexo'].'</td> 
            <td width="15%">EDAD: '.$paciente['edad'].'</td>  
            

            </tr>
        </table>
        

        
        <table class="table" border="1" style="width:100%;font-size:13px;">
        <tr>  
            <td width="100%">Establecimiento que Envia: '.$nota_traslado['unidad_envia'].'</td>   
        </tr>
        <tr>  
        <td width="100%">Establecimiento Receptor: '.$nota_traslado['unidad_receptora'].'</td>  
        </tr>

    </table>
    

     
        <br><h5 align="left" >RESUMEN CLINICO.</h5>

        <pre style= "text-align: justify; font-size:12px;"> '.$nota_traslado['resumen_clinico'].'</pre>

    <!--
        <table class="table" border="2"  style="font-size:10px;">
            <tr>
                <td align="center" rowspan="3" style="font-size:16px; "width="100%"><u>NOMBRE: Dr. Juan Ramon Rodriguez Bravo</u><br>CEDULA PROFESIONAL:[8523653]<br>MEDICO TRATANTE</td>
                
            </tr>

        </table> -->
    ';
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// // PAGINA 2
// $pdf->AddPage();
// $pdf->Image('../../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
// $html='
//         <h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3><
//         <b><h5 align="center">RECUPERACION INMEDIATA</h5></b><br>
//         
//     ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// nombre de descarga del documento
$pdf->Output('salida.pdf', 'I');
?>