<?php
require_once('../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
$id = $_GET['id'];
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();
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
//HOJA DE REGISTRO DE ENFERMERIA
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <b><h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3></b>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="70%">Paciente: '.$paciente["nombre_p"].'</td>  
                <td width="30%">Hora Ingreso: <input align="center" type="text" name="hora" size="9"></td>  
            </tr>
            <tr>  
                <td width="20%">Edad: '.$paciente["edad"].'</td>  
                <td width="30%">Sexo: '.$paciente["sexo"].'</td>
                <td width="20%">Talla:</td>  
                <td width="30%">Fecha: '.date("d-m-Y").'</td>   
            </tr>
        </table>
        <br><h5 align="center">PREPARACION</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="20%">TEM. <input align="center" type="text" name="tem" size="13"></td>
                <td width="20%">FC. <input align="center" type="text" name="fc" size="15"></td> 
                <td width="20%">FR. <input align="center" type="text" name="fr" size="15"></td> 
                <td width="20%">T/A <input align="center" type="text" name="ta" size="14"></td> 
                <td width="20%">DXTX. <input align="center" type="text" name="dxtx" size="12"></td> 
            </tr>
            <tr>  
                <td width="100%">Medicamentos: <input align="center" type="text" name="medicamentos" size="83"></td>
            </tr>
            <tr>  
                <td width="100%">Solucion: <input align="center" type="text" name="solucion" size="88"></td>
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td>AYUNO: <input align="center" type="text" name="ayuno" size="23"></td>
                <td>CX: <input align="center" type="text" name="cx" size="27"></td>
                <td align="center" rowspan="4" style="font-size:10px;"><br><br><br><br>_________________________________<br>ENFERMERA</td>
            </tr>
            <tr>
                <td>ALERGIAS: <input align="center" type="text" name="alergias" size="20"></td>
                <td>TRANSF:<input align="center" type="text" name="transf" size="23"></td>
            </tr>
            <tr>
                <td>TOXICO: <input align="center" type="text" name="toxico" size="22"></td>
                <td>PROTESIS:<input align="center" type="text" name="protesis" size="21"></td>
            </tr>
            <tr>
                <td>ENF-CRONICA: <input align="center" type="text" name="enf" size="17"></td>
                <td>MEDICAMENTO: <input align="center" type="text" name="medicamento" size="15"></td>
            </tr>
        </table>
        <br><h5 align="center">QUIROFANO</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="50%">CIRUJANO: <input align="center" type="text" name="cirujano" size="36"></td>
                <td width="50%">AYUDANTE: <input align="center" type="text" name="ayudante" size="35"></td> 
            </tr>
            <tr>  
                <td width="50%">ANESTESIOLOGO: <input align="center" type="text" name="anestesiologo" size="30"></td>
                <td width="50%">TIPO ANESTESIA: <input align="center" type="text" name="tipo_anest" size="30"></td> 
            </tr>
            <tr>  
                <td width="50%">ENFERMERIA Qca: <input align="center" type="text" name="enfermeria_qca" size="30"></td>
                <td width="50%">Cx. Realizada: <input align="center" type="text" name="cx_r" size="35"></td> 
            </tr>
            <tr>  
                <td width="50%">DIAGNOSTICO: <input align="center" type="text" name="diagnostico" size="32"></td>
                <td width="50%">CIRCULANTE: <input align="center" type="text" name="circulante" size="34" style="border-width:0px;
                border:none;"></td> 
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA TRANSOPERATORIO:</h5><br><br><br><br><br>
        <textarea class="notes" name="reporte" cols="97" rows="8" style="width:100%;font-size:13px;"></textarea><br><br><br><br><br><br>
        <h5 align="center">INGRESOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;EGRESOS</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="25%" align="center">MEDICAMENTOS</td>
                <td width="25%" align="center">SOLUCIONES</td>
                <td width="25%" align="center">DIURESIS</td> 
                <td width="25%" align="center">SANGRADO</td>  
            </tr>
            <tr>  
                <td width="25%">&nbsp;<input align="center" type="text" name="m1" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="s1" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="d1" size="22"></td> 
                <td width="25%">&nbsp;<input align="center" type="text" name="g1" size="22"></td> 
            </tr>
            <tr>  
                <td width="25%">&nbsp;<input align="center" type="text" name="m2" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="s2" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="d2" size="22"></td> 
                <td width="25%">&nbsp;<input align="center" type="text" name="g2" size="22"></td> 
            </tr>
            <tr>  
                <td width="25%">&nbsp;<input align="center" type="text" name="m3" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="s3" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="d3" size="22"></td> 
                <td width="25%">&nbsp;<input align="center" type="text" name="g3" size="22"></td>  
            </tr>
            <tr>  
                <td width="25%">&nbsp;<input align="center" type="text" name="m4" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="s4" size="22"></td>
                <td width="25%">&nbsp;<input align="center" type="text" name="d4" size="22"></td> 
                <td width="25%">&nbsp;<input align="center" type="text" name="g4" size="22"></td>  
            </tr>
        </table>
        <br><h5 align="left">CUENTA COMPLETA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td>GASAS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="gasas1" value="a"></td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="gasas2" value="a"></td>
                <td align="center" rowspan="3" style="font-size:10px;" width="35%"><br><br><br>_________________________________<br>ENFERMERA</td>
            </tr>
            <tr>
                <td>COMPRESAS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="compresas1" value="a"></td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="compresas2" value="a"></td>
            </tr>
            <tr>
                <td>OTROS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="otros1" value="a"></td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="otros2" value="a"></td>
            </tr>
        </table>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// PAGINA 2
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3><
        <b><h5 align="center">RECUPERACION INMEDIATA</h5></b><br>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="10%" align="center">HORA</td>
                <td width="10%" align="center">T/A</td>  
                <td width="10%" align="center">FR.</td>   
                <td width="10%" align="center">FC.</td>   
                <td width="10%" align="center">T<sup><u>o</u></sup>.</td>   
                <td width="10%" align="center">SAT.02</td>
                <td width="40%" align="center">MEDICAMENTOS</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat1" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med1" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat2" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med2" size="36"></td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat3" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med3" size="36"></td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat4" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med4" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat5" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med5" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat6" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med6" size="36"></td>  
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5><br><br><br><br><br>
        <textarea class="notes" name="reporte_ri" cols="97" rows="5" style="width:100%;font-size:13px;" border="1"></textarea><br><br><br><br>
        <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td width="15%">SANGRADO</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td align="center" rowspan="3" style="font-size:10px;" width="40%"><br><br><br>_________________________________<br>ENFERMERA</td>
            </tr>
            <tr>
                <td width="15%">DIURESIS</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="15%">EMESIS</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
        </table>
        <h5 align="center">RECUPERACION</h5>
        <h5 align="left">SsVs</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="10%" align="center">HORA</td>
                <td width="10%" align="center">T/A</td>  
                <td width="10%" align="center">FR.</td>   
                <td width="10%" align="center">FC.</td>   
                <td width="10%" align="center">T<sup><u>o</u></sup>.</td>   
                <td width="10%" align="center">SAT.02</td>
                <td width="40%" align="center">MEDICAMENTOS</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to1" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat1" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med1" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to2" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat2" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med2" size="36"></td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to3" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat3" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med3" size="36"></td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to4" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat4" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med4" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to5" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat5" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med5" size="36"></td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;<input align="center" type="text" name="hora6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="ta6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fr6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="fc6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="to6" size="8"></td>
                <td width="10%">&nbsp;<input align="center" type="text" name="sat6" size="8"></td>
                <td width="40%">&nbsp;<input align="center" type="text" name="med6" size="36"></td>  
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5><br><br><br><br><br>
        <textarea class="notes" name="reporte_ri" cols="97" rows="5" style="width:100%;font-size:13px;"></textarea><br><br><br><br>
        <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td width="15%">SANGRADO</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td align="center" rowspan="3" style="font-size:10px;" width="40%"><br><br><br>_________________________________<br>ENFERMERA</td>
            </tr>
            <tr>
                <td width="15%">DIURESIS</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="15%">EMESIS</td>
                <td width="15%"></td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
        </table>
        <h5 align="left">HORA DE EGRESO: <input align="center" type="text" name="hora_egreso" size="8"></h5>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>