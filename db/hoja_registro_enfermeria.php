<?php
require_once('../tcpdf.php');
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

//query de la nota de preparacion
$query2 = "SELECT * from nota_preparacion where no_exp = '$id'";
$data2 = $mysqli->query($query2);
$nota_preparacion = $data2->fetch_assoc();

//query de la hora de quirofano
$query3 = "SELECT * from nota_quirofano where no_exp = '$id'";
$data3 = $mysqli->query($query3);
$nota_quirofano = $data3->fetch_assoc();

//query nota de recuperacion inmediata
$query4 = "SELECT * from nota_recuperacion_inmediata where no_exp = '$id'";
$data4 = $mysqli->query($query4);
$nota_recuperacion_inmediata = $data4->fetch_assoc();

//query nota de recuperacion
$query5 = "SELECT * from nota_recuperacion where no_exp = '$id'";
$data5 = $mysqli->query($query5);
$nota_recuperacion = $data5->fetch_assoc();
//los usuarios de las notas se jalan de las tablas por mientras, pero se usara una variable de sesion para obtener los nombres completos de los usuarios


// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle(''.$paciente['nombre_p'].'');
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, '45');
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
//HOJA DE REGISTRO DE ENFERMERIA
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 16, 40, 13, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$pdf->Image('../img/Logos/logo1.jpg', 20, 16, 50, 13, 'jpg', '', '', false, 150, 'L', false, false, 0, false, false, false);
$html='
        <b><h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3></b>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="60%">Paciente: '.$paciente["nombre_p"].'</td>  
                <td width="20%">Hora Ingreso:XXXX</td>  
                <td width="20%">Fecha de nacimiento: XXXX</td>
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
                <td style ="font-size:12px;" width="16.66%">TEMP. '.$nota_preparacion["temp"].'</td>
                <td style ="font-size:12px;" width="16.66%">FC. '.$nota_preparacion["fc"].'</td> 
                <td style ="font-size:12px;" width="16.66%">FR. '.$nota_preparacion["fr"].'</td> 
                <td style ="font-size:12px;" width="16.66%">T/A. '.$nota_preparacion["t/a"].'</td> 
                <td style ="font-size:12px;" width="16.66%">DXTX. '.$nota_preparacion["dxtx"].'</td> 
                <td style ="font-size:12px;" width="16.66%"> SAT O2. '.$nota_preparacion["dxtx"].'</td>
            </tr>
            <tr>  
                <td style ="font-size:12px;" width="100%">Medicamentos: '.$nota_preparacion["medicamento"].'</td>
            </tr>
            <tr>  
                <td style ="font-size:12px;" width="100%">Solucion: '.$nota_preparacion["solucion"].'</td>
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td style ="font-size:12px;">AYUNO: '.$nota_preparacion["ayuno"].'</td>
                <td style ="font-size:12px;">CX: '.$nota_preparacion["cx"].'</td>
                <td align="center" rowspan="4" style="font-size:12px;"><u>'.$nota_preparacion["usuario"].'</u><br>CEDULA:[1597536]<br>ENFERMERA</td>
            </tr>
            <tr>
                <td style ="font-size:12px;">ALERGIAS: '.$nota_preparacion["alergias"].'</td>
                <td style ="font-size:12px;">TRANSF:'.$nota_preparacion["transf"].'</td>
            </tr>
            <tr>
                <td style ="font-size:12px;">TOXICO: '.$nota_preparacion["toxico"].'</td>
                <td style ="font-size:12px;">PROTESIS:'.$nota_preparacion["protesis"].' </td>
            </tr>
            <tr>
                <td style ="font-size:12px;">ENF-CRONICA: '.$nota_preparacion["enfermedad_cronica"].'</td>
                <td style ="font-size:12px;">MEDICAMENTO: '.$nota_preparacion["medicamento_2"].'</td>
            </tr>
        </table>
        <br><h5 align="center">QUIROFANO</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>  
                <td width="50%" style ="font-size:12px;">CIRUJANO: '.$nota_quirofano["cirujano"].'</td>
                <td width="50%" style ="font-size:12px;">AYUDANTE: '.$nota_quirofano["ayudante"].'</td> 
            </tr>
            <tr>  
                <td width="50%" style ="font-size:12px;">ANESTESIOLOGO: '.$nota_quirofano["anestesiologo"].'</td>
                <td width="50%" style ="font-size:12px;">TIPO ANESTESIA: '.$nota_quirofano["tipo_anestesia"].'</td> 
            </tr>
            <tr> 
                <td width="50%" style ="font-size:12px;">DIAGNOSTICO: '.$nota_quirofano["diagnostico"].'</td> 
                <td width="50%" style ="font-size:12px;">Cx. Realizada: '.$nota_quirofano["cx_realizada"].'</td> 
            </tr>
            <tr>  
            <td width="50%" style ="font-size:12px;">ENFERMERA Qca: '.$nota_quirofano["enfermera_qca"].'</td>
                <td width="50%" style ="font-size:12px;">CIRCULANTE: '.$nota_quirofano["circulante"].'</td> 
            </tr>
            <tr>  
                <td width="25%" style ="font-size:12px;">HORA DE INGRESO: '.$nota_quirofano["hora_ingreso"].'</td>
                <td width="25%" style ="font-size:12px;">INICIO: '.$nota_quirofano["inicio"].'</td>
                <td width="25%">TERMINA: '.$nota_quirofano["termina"].'</td>
            <td width="25%">EGRESA: '.$nota_quirofano["egresa"].'</td>
            </tr>

        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA TRANSOPERATORIO:</h5>
        <p align="justify" style ="font-size:12px;">'.$nota_quirofano["reporte_enfermeria"].'</p>
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
                <td width="25%">&nbsp;'.$nota_quirofano["med1"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["solucion1"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["diuresis1"].'</td> 
                <td width="25%">&nbsp;'.$nota_quirofano["sangrado1"].'</td> 
            </tr>
            <tr>  
                <td width="25%">&nbsp;'.$nota_quirofano["med2"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["solucion2"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["diuresis2"].'</td> 
                <td width="25%">&nbsp;'.$nota_quirofano["sangrado2"].'</td> 
            </tr>
            <tr>  
                <td width="25%">&nbsp;'.$nota_quirofano["med3"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["solucion3"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["diuresis3"].'</td> 
                <td width="25%">&nbsp;'.$nota_quirofano["sangrado3"].'</td>  
            </tr>
            <tr>  
                <td width="25%">&nbsp;'.$nota_quirofano["med4"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["solucion4"].'</td>
                <td width="25%">&nbsp;'.$nota_quirofano["diuresis4"].'</td> 
                <td width="25%">&nbsp;'.$nota_quirofano["sangrado4"].'</td>  
            </tr>
        </table>
        <br><h5 align="left">CUENTA COMPLETA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</h5>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td>GASAS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["gasa_si"].'</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["gasa_no"].'</td>
                <td align="center" rowspan="3" style="font-size:12px;" width="35%"><u>'.$nota_quirofano["usuario"].'</u> <br>CEDULA:[222222222]<br>ENFERMERA</td>
            </tr>
            <tr>
                <td>COMPRESAS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["compresas_si"].'</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["compresas_no"].'</td>
            </tr>
            <tr>
                <td>OTROS</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["otros_si"].'</td>
                <td width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$nota_quirofano["otros_no"].'</td>
            </tr>
        </table>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// PAGINA 2
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 16, 40, 13, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$pdf->Image('../img/Logos/logo1.jpg', 20, 16, 50, 13, 'jpg', '', '', false, 150, 'L', false, false, 0, false, false, false);
$html='
        <br><h3 align="center">HOJA DE REGISTRO DE ENFERMERIA</h3><
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
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t1"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat1"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med1"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t2"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat2"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med2"].'</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t3"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat3"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med3"].'</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t4"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat4"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med4"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t5"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat5"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med5"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["hr6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["ta6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fr6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["fc6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["t6"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion_inmediata["sat6"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion_inmediata["med6"].'</td>  
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
        <p style = "text-aling:justify; font-size:9px;">'.$nota_recuperacion_inmediata["reporte_enfermeria_1"].'</p>
        <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td width="15%">SANGRADO</td>
                <td width="15%">'.$nota_recuperacion_inmediata["sangrado1"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["sangrado2"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["sangrado3"].'</td>
                <td align="center" rowspan="3" style="font-size:12px;" width="40%"><u>'.$nota_recuperacion_inmediata["usuario"].'</u><br>CEDULA:[8523653]<br>ENFERMERA</td>
            </tr>
            <tr>
                <td width="15%">DIURESIS</td>
                <td width="15%">'.$nota_recuperacion_inmediata["diuresis1"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["diuresis2"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["diuresis3"].'</td>
            </tr>
            <tr>
                <td width="15%">EMESIS</td>
                <td width="15%">'.$nota_recuperacion_inmediata["emesis1"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["emesis2"].'</td>
                <td width="15%">'.$nota_recuperacion_inmediata["emesis3"].'</td>
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
                <td width="10%">&nbsp;'.$nota_recuperacion["hr1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc1"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t1"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat1"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med1"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion["hr2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc2"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t2"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat2"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med2"].'</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion["hr3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc3"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t3"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat3"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med3"].'</td>  
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion["hr4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc4"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t4"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat4"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med4"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion["hr5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc5"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t5"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat5"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med5"].'</td>
            </tr>
            <tr>  
                <td width="10%">&nbsp;'.$nota_recuperacion["hr6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["ta6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fr6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["fc6"]. '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["t6"].  '</td>
                <td width="10%">&nbsp;'.$nota_recuperacion["sat6"].'</td>
                <td width="40%">&nbsp;'.$nota_recuperacion["med6"].'</td>  
            </tr>
        </table>
        <br><h5 align="left">REPORTE DE ENFERMERIA:</h5>
        <p style = "text-aling:justify; font-size:9px;">'.$nota_recuperacion["reporte_recuperacion"].'</p>
        <h5 align="left">EGRESOS:</h5><br><br><br><br><br>
        <table class="table" border="1" style="width:100%;font-size:13px;">
            <tr>
                <td width="15%">SANGRADO</td>
                <td width="15%">'.$nota_recuperacion["sangrado1"].'</td>
                <td width="15%">'.$nota_recuperacion["sangrado2"].'</td>
                <td width="15%">'.$nota_recuperacion["sangrado3"].'</td>
                <td align="center" rowspan="3" style="font-size:12px;" width="40%"><u>'.$nota_recuperacion["usuario"].'</u><br>CEDULA:[1227565]<br>ENFERMERA</td>
            </tr>
            <tr>
                <td width="15%">DIURESIS</td>
                <td width="15%">'.$nota_recuperacion["diuresis1"].'</td>
                <td width="15%">'.$nota_recuperacion["diuresis2"].'</td>
                <td width="15%">'.$nota_recuperacion["diuresis3"].'</td>
            </tr>
            <tr>
                <td width="15%">EMESIS</td>
                <td width="15%">'.$nota_recuperacion["emesis1"].'</td>
                <td width="15%">'.$nota_recuperacion["emesis2"].'</td>
                <td width="15%">'.$nota_recuperacion["emesis3"].'</td>
            </tr>
        </table>
        <h5 align="left">HORA DE EGRESO: ['.date("H:m:s").']</h5>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>