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
//query de la cabecera del doc
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();

//query de la nota pre-operatoria
$query2 = "SELECT * from nota_preoperatoria where no_exp = '$id'";
$data2 = $mysqli->query($query2);
$nota_preoperatoria = $data2->fetch_assoc();
//los usuarios de las notas se jalan de las tablas por mientras, pero se usara una variable de sesion para obtener los nombres completos de los usuarios


// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle('NOTA PRE-OPERATORIA');
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
        <b><h3 align="center">NOTA PRE-OPERATORIA</h3></b>
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="100%">NOMBRE PACIENTE:'.$paciente["nombre_p"].'</td>  
                
            </tr>
            <tr>  
                
                <td width="33.3%">HORA: '.$nota_preoperatoria["hora"].'</td>  
                <td colspan="3" width="33.3%">FECHA: '.$nota_preoperatoria["fecha"].'</td>  
                <td colspan="3" width="33.3%">FECHA NACIMIENTO: '.$paciente["fecha_nacimiento"].'</td>  
            </tr>
        </table>
        <br><h5 align="left" >DIAGNOSTICO:</h5>
        <P style= "text-align: justify; font-size:12px;"> '.$nota_preoperatoria["diagnostico"].' </P>

        <br><h5 align="left">CIRUGIA PROGRAMADA:</h5>
        <P style= "text-align: justify; font-size:12px;">'.$nota_preoperatoria["cirugia_programada"].'</P>
        <br><h5 align="LEFT">PLAN TERAPEUTICO:</h5>
        <P style= "text-align: justify; font-size:12px;">'.$nota_preoperatoria["plan_terapeutico"].'</P><br>

        <br><h5 align="left">PRONOSTICO:</h5>
        <P style= "text-align: justify; font-size:12px;">'.$nota_preoperatoria["pronostico"].'</P><br>
    
    
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
//         <h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3><
//         <b><h5 align="center">RECUPERACION INMEDIATA</h5></b><br>
//         <table class="table" border="1" style="width:100%;font-size:13px;">
//             <tr>  
//                 <td width="10%" align="center">HORA</td>
//                 <td width="10%" align="center">T/A</td>  
//                 <td width="10%" align="center">FR.</td>   
//                 <td width="10%" align="center">FC.</td>   
//                 <td width="10%" align="center">T<sup><u>o</u></sup>.</td>   
//                 <td width="10%" align="center">SAT.02</td>
//                 <td width="40%" align="center">MEDICAMENTOS</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//         </table>
//         <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
//         <p style = "text-aling:justify; font-size:9px;"></p>
//         <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
//         <table class="table" border="1" style="width:100%;font-size:13px;">
//             <tr>
//                 <td width="15%">SANGRADO</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td align="center" rowspan="3" style="font-size:12px;" width="40%"><u></u><br>CEDULA:[8523653]<br>ENFERMERA</td>
//             </tr>
//             <tr>
//                 <td width="15%">DIURESIS</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//             </tr>
//             <tr>
//                 <td width="15%">EMESIS</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//             </tr>
//         </table>
//         <h5 align="center">RECUPERACION</h5>
//         <h5 align="left">SsVs</h5>
//         <table class="table" border="1" style="width:100%;font-size:13px;">
//             <tr>  
//                 <td width="10%" align="center">HORA</td>
//                 <td width="10%" align="center">T/A</td>  
//                 <td width="10%" align="center">FR.</td>   
//                 <td width="10%" align="center">FC.</td>   
//                 <td width="10%" align="center">T<sup><u>o</u></sup>.</td>   
//                 <td width="10%" align="center">SAT.02</td>
//                 <td width="40%" align="center">MEDICAMENTOS</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>
//             </tr>
//             <tr>  
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="10%">&nbsp;</td>
//                 <td width="40%">&nbsp;</td>  
//             </tr>
//         </table>
//         <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
//         <p style = "text-aling:justify; font-size:9px;"></p>
//         <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
//         <table class="table" border="1" style="width:100%;font-size:13px;">
//             <tr>
//                 <td width="15%">SANGRADO</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td align="center" rowspan="3" style="font-size:12px;" width="40%"><u></u><br>CEDULA:[1227565]<br>ENFERMERA</td>
//             </tr>
//             <tr>
//                 <td width="15%">DIURESIS</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//             </tr>
//             <tr>
//                 <td width="15%">EMESIS</td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//                 <td width="15%"></td>
//             </tr>
//         </table>
//         <h5 align="left">HORA DE EGRESO: ['.date("H:m:s").']</h5>
//     ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// nombre de descarga del documento
$pdf->Output('salida.pdf', 'I');
?>