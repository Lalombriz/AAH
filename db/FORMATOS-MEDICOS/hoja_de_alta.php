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

//query de la hoja de alta
$query2 = "SELECT * from hoja_alta where no_exp = '$id'";
$data2 = $mysqli->query($query2);
$hoja_alta = $data2->fetch_assoc();

//los usuarios de las notas se jalan de las tablas por mientras, pero se usara una variable de sesion para obtener los nombres completos de los usuarios


// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle('HOJA DE ALTA');
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
<h6 align="center">Av. Gastelum Esq. Calle 14 No. #1340 <br> Zona Centro, Ensenada, B.C.<br>LICENCIA SANITARIA:0200110039</h6>
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="33.3%">NOMBRE PACIENTE: '.$paciente["nombre_p"].'</td>  
                <td width="33.3%">EDAD: '.$paciente["edad"].' AÑOS</td>
                <td width="33.3%">FECHA DE NACIMIENTO: '.$paciente["fecha_nacimiento"].'</td>
                
            </tr>
            <tr>  
                <td width="50%">FECHA DE INGRESO: '.$paciente["fecha_ingreso"].'</td>  
                <td width="50%">FECHA DE ALTA: '.date("d-m-Y").'</td>
            </tr>
            <tr>  
                <td width="100%">DIAGNOSTICO DE INGRESO: '.$paciente["diagnostico"].'</td>  
            </tr>
            <tr>  
                <td width="100%">CONDICION DE EGRESO: '.$hoja_alta["condicion_egreso"].'</td>  
            </tr>
        </table>

        <br><h5 align="left" >RESUMEN DE HOSPITALIZACION:</h5>
        <P style= "text-align: center; font-size:12px;"> <u>'.$hoja_alta["resumen_hospitalizacion"].'</u></P>

        <h5 align="left" >PROCEDIMIENTO TERAPEUTICO EFECTUADO:</h5>
        <P style= "text-align: center; font-size:12px;"><u>'.$hoja_alta["procedimiento_terapeutico_efectuado"].'</u></P>

        <h5 align="left" >RECOMENDACIONES</h5>
        <table class="table" border="1" style="width:100%;font-size:12px;">
    <tr>  
        <td width="30%">A) DIETETICAS:</td>  
        <td width="70%">'.$hoja_alta["dieteticas"].'</td>
            
    </tr>
    <tr>  
    <td width="30%">B) HIGIENICAS:</td>  
    <td width="70%">'.$hoja_alta["higienicas"].'</td>
      
    </tr>
    <tr>  
    <td width="30%">C) MEDICAMENTOS:</td>  
    <td width="70%">'.$hoja_alta["medicamentos"].'</td>
      
    </tr>
    <tr>  
    <td width="30%">D) ACUDIR EN CASO DE:</td>  
    <td width="70%">'.$hoja_alta["emergencia"].'</td>
      
    </tr>
        
    </table>

        <h5 align="left" >CONSULTAS PROGRAMADAS</h5>
        <table class="table" border="1" style="width:100%;font-size:12px;">
        <tr>  
            <td width="33.3%">CONSULTORIO<br>'.$hoja_alta["consultorio"].'</td>  
            <td width="33.3%">FECHA Y HORA<br>'.$hoja_alta["fecha_hora"].'</td>
            <td width="33.3%">SERVICIO<br>'.$hoja_alta["servicio"].'</td> 
        </tr>
        
    </table>

      <BR>
        <div>
        <table class="table" border="2"  style="width:100%;font-size:13px; padding-top:30px;">
            <tr>
                <td align="center" rowspan="3" style="font-size:16px;" width="100%"><u>NOMBRE: Dr. Juan Ramon Rodriguez Bravo</u><br>CEDULA PROFESIONAL:[8523653]<br>MEDICO TRATANTE</td>
                
            </tr>

            </table>

            </div>
    ';
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// // PAGINA 2
// $pdf->AddPage();
// $pdf->Image('../../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
// $html='
//         
//     ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// nombre de descarga del documento
$pdf->Output('salida.pdf', 'I');
?>