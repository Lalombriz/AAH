<?php
require_once('../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
$id = $_POST['indicador_id'];
$pd = $_POST['selected_pd'];
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();
$query = "INSERT INTO hoja_indicaciones_seguridad(nombre,procedimiento_quirurgico,cirujano,enfermera_circulante,enfermera_quirurgica,paciente_diabetico,
            infecciones_previas,nombre_antibiotico,antisepsia,inicio_cirugia,fecha,edad,sexo,hora_aplicacion_antibiotico,hora_antisepsia,termina_cirugia,no_exp)
            values('".$paciente["nombre_p"]."','".$_POST["PQ"]."','".$_POST["CJ"]."','".$_POST["EC"]."','".$_POST["EQ"]."','$pd','".$_POST["IP"]."','".$_POST["NA"]."','".$_POST["AS"]."','".$_POST["IC"]."',
            CURDATE(),'".$paciente["edad"]."','".$paciente["sexo"]."','".$_POST["HA"]."','".$_POST["HAS"]."','".$_POST["TC"]."','".$paciente["exp_procedencia"]."')";
$mysqli->query($query);
// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle(''.$paciente['nombre_p'].'');
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
$pdf->SetFont('aefurat', '', 14, '',true);
// -----------------------Contenidos------------------------
// INDICADORES DE SEGURIDAD
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3>
        <b><h5 align="center">INDICACIONES DE SEGURIDAD</h5></b>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="100%" align="center">DATOS</td>  
            </tr>
            <tr>  
                <td width="80%">&nbsp;</td>  
                <td width="20%">FECHA: '.date("d-m-Y").'</td>
            </tr>
            <tr>  
                <td width="70%">NOMBRE: '.$paciente["nombre_p"].'</td>  
                <td width="10%">EDAD: '.$paciente["edad"].'</td>
                <td width="20%">SEXO: '.$paciente["sexo"].'</td>
            </tr>
            <tr>  
                <td width="100%">PROCEDIMIENTO QUIRURGICO: <input align="center" type="text" name="proc_q" size="65"></td>  
            </tr>
            <tr>  
                <td width="100%">CIRUJANO: <input align="center" type="text" name="cirujano_is" size="85"></td>  
            </tr>
            <tr>  
                <td width="100%">ENFERMERA CIRCULANTE: <input align="center" type="text" name="enf_circ" size="70"></td>  
            </tr>
            <tr>  
                <td width="50%">ENFERMERA QUIRURGICA: <input align="center" type="text" name="enf_quir" size="21"></td>  
                <td width="50%">INFECCIONES PREVIAS: <input align="center" type="text" name="inf_prev" size="25"></td>
            </tr>
            <tr>  
                <td width="25%">PACIENTE DIABETICO</td>  
                <td width="5%">NO</td>
                <td width="5%">SI</td>
                <td width="50%">NOMBRE ANTIBIOTICO: <input align="center" type="text" name="nombre_antibiotico" size="25"></td>
                <td width="15%">HORA: <input align="center" type="text" name="hora_antibiotico" size="7"></td>
            </tr>
            <tr>  
                <td width="85%">ANTISEPSIA: <input align="center" type="text" name="antisepsia" size="69"></td>
                <td width="15%">HORA: <input align="center" type="text" name="hora_antisepsia" size="7"></td>
            </tr>
            <tr>  
                <td width="50%">INICIO DE CIRUGIA: <input align="center" type="text" name="inic_cirugia" size="28"></td>  
                <td width="50%">TERMINA CIRUGIA: <input align="center" type="text" name="term_cirugia" size="28"></td>
            </tr>
        </table>
        <h3>&nbsp;</h3>
        <table class="table" cellspacing="20" cellpadding="20" border="0" style="width:100%;font-size:13px;">
            <tr>  
                <td width="50%" align="center" border="1" rowspan="1"></td>
                <td width="50%" align="center" border="1" rowspan="1"></td>   
            </tr>
            <tr>  
                <td width="50%" border="1"></td>
                <td width="50%" border="1"></td>   
            </tr>
            <tr>  
                <td width="50%" border="1"></td>
                <td width="50%" border="1"></td>   
            </tr>
            <tr>  
                <td width="50%" border="1"></td>
                <td width="50%" border="1"></td>   
            </tr>
            <tr>  
                <td width="50%" border="1"></td>
                <td width="50%" border="1"></td>   
            </tr>
            <tr>  
                <td width="50%" border="1"></td>
                <td width="50%" border="1"></td>   
            </tr>
        </table>
        <h1>&nbsp;</h1>
        <h5 class="text-center">____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</h5>
        <h6 class="text-center">NOMBRE Y FIRMA ENFERMERA CIRCULANTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOMBRE Y FIRMA ENFERMERA QUIRURGICA</h6>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>