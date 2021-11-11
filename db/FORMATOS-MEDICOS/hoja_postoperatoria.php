<?php
require_once('../../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
setlocale(LC_ALL,"es_ES");
$id = $_GET['id'];
// querys para el llenado de el expediente electronico
// query de la cabecera del doc
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();

//query de la hoja medica post operatoria
$query2 = "SELECT * from hoja_medica_postoperatoria where no_exp = '$id'";
$data2 = $mysqli->query($query2);
$postoperatoria = $data2->fetch_assoc();

//query de la hora de quirofano
$query3 = "SELECT * from nota_quirofano where no_exp = '$id'";
$data3 = $mysqli->query($query3);
$nota_quirofano = $data3->fetch_assoc();

//query nota de recuperacion inmediata
// $query4 = "SELECT * from nota_recuperacion_inmediata where no_exp = '$id'";
// $data4 = $mysqli->query($query4);
// $nota_recuperacion_inmediata = $data4->fetch_assoc();

//query nota de recuperacion
// $query5 = "SELECT * from nota_recuperacion where no_exp = '$id'";
// $data5 = $mysqli->query($query5);
// $nota_recuperacion = $data5->fetch_assoc();
//los usuarios de las notas se jalan de las tablas por mientras, pero se usara una variable de sesion para obtener los nombres completos de los usuarios


// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle('HOJA POSTOPERATORIA');
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
        <br>
        <h5 align="center">HOJA MEDICA POSTOPERATORIA</h5>

        
        <table  class="table" border="1" style="width:100%;font-size:12px;">
        <tr>  
        <td align="center" width="33.3%">FECHA</td> 
        <td align="center" width="33.3%">FECHA DE NACIMIENTO</td> 
        <td align="center" width="33.3%">EXPEDIENTE</td> 

            
        </tr>
        <tr>  
           
            <td colspan="3" width="33.3%">'.date("d-m-Y").'</td>
            <td colspan="3" width="33.3%">'.$paciente["fecha_nacimiento"].'</td>  
            <td width="33.3%">'.$paciente["num_paciente"].'</td>  
        </tr>
    </table>
        
        

        
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="100%">PACIENTE:'.$paciente["nombre_p"].'</td>    
            </tr>

            <tr>
            <td width="25%">EDAD: '.$paciente["edad"].' AÑOS</td>
            <td width="25%">SEXO: '.$paciente["sexo"].'</td>
            </tr>

            <tr>
            <td width="100%">QUIROFANO: '.$postoperatoria["quirofano"].'</td>
            </tr>
            
            <tr>
            <td width="100%">DIAGNOSTICO PREOPERATORIO: '.$postoperatoria["diagnostico_preoperatorio"].'</td>
            </tr>

            <tr>
            <td width="100%">DIAGNOSTICO POSTOPERATORIO: '.$postoperatoria["diagnostico_postoperatorio"].'</td>
            </tr>

            <tr>
            <td width="100%">CIRUJANO: '.$postoperatoria["cirujano"].'</td>
            </tr>
        </table>
        

      
        <h5 align="left" >DESCRIPCION DE LA CIRUGIA</h5>
        <P style= "text-align: justify; font-size:11px;"> '.$postoperatoria["descripcion_cirugia"].'
        </P>
        
      
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="80%">SE ENVIO PIEZA QX PARA ESTUDIO HISPATALOGICO</td>   
                <td width="10%">SI: '.$postoperatoria["QX_si"].'</td>  
                <td width="10%">NO: '.$postoperatoria["QX_no"].'</td> 
            </tr>
        </table>
  

       
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="100%">ANESTESIOLOGO: '.$nota_quirofano["anestesiologo"].'</td>   
            </tr>
            <tr>  
                <td width="100%">TIPO DE ANESTESIA: '.$nota_quirofano["tipo_anestesia"].'</td>   
            </tr>
        </table>
        

     
        <h5>EQUIPO QUIRURGICO.</h5>
        <table class="table" border="1" style="width:100%;font-size:12px;">
            <tr>  
                <td width="100%">1ER AYUDANTE: '.$nota_quirofano["ayudante"].'</td>   
            </tr>
            <tr>  
                <td width="100%">INSTRUMENTISTA:</td>   
            </tr>
            <tr>  
                <td width="100%">CIRCULANTE: '.$nota_quirofano["circulante"].'</td>   
            </tr>
            
        </table>

        <h5>COMENTARIOS / HALLAZGOS</h5>
        <P style= "text-align: justify; font-size:11px;"> '.$postoperatoria["comentarios"].' </P>

        

        <table class="table" border="2" style="width:100%;font-size:12px; padding-top:10px;">
            <tr>
                <td align="center" rowspan="3" style="font-size:16px;" width="100%"><u>NOMBRE: Dr. Juan Ramon Rodriguez Bravo</u><br>CEDULA PROFESIONAL:[8523653]<br>MEDICO CIRUJANO</td>
            </tr>
        </table>

       


    ';
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// // PAGINA 2
// $pdf->AddPage();
// $pdf->Image('../../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
// $html='
//         cuerpo de pagina
//     ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// nombre de descarga del documento
$pdf->Output('salida.pdf', 'I');
?>