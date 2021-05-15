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
// LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA
$pdf->AddPage('L');
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <h3 align="center">LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA</h3>
        <h align="left">Nombre del paciente: <u>'.$paciente['nombre_p'].' </u>&nbsp;&nbsp;&nbsp;Procedimiento:_________________________________</h3>
        <table>
            <tr>
                <td>
                    <table border="1" style="font-size:14px;">
                        <tr>
                            <td align="center">FASE 1: ENTRADA<br>Antes de la introduccion de la anestesia</td>
                        </tr>
                        <tr>
                            <td>El cirujano, el Anestesiólogo y el personal de enfermería en presencia del Paciente han confirmado:<br>
                                <input type="checkbox" name="a" value="a">Su identidad<br>
                                <input type="checkbox" name="b" value="b">El sitio quirúrgico<br>
                                <input type="checkbox" name="c" value="c">El procedimiento quirúrgico<br>
                                <input type="checkbox" name="d" value="d">Su consetimiento
                            </td>
                        </tr>
                        <tr>
                            <td>¿El anestesiólogo ha confirmado con el Cirujano que esté marcado el sitio quirúrgico:<br>
                            <input type="checkbox" name="e" value="e">Si<br>
                            <input type="checkbox" name="f" value="f">No procede
                            </td>
                        </tr>
                        <tr>
                            <td>El cirujano ha confirmado la asepsiae en el sitio quirúrgico:<br>
                            <input type="checkbox" name="g" value="g">Si<br>
                            <input type="checkbox" name="h" value="h">No procede
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" style="font-size:14px;">
                        <tr>
                            <td align="center">FASE 2: PAUSA QUIRÚRGICA<br>Antes de la incisión cutánea</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" style="font-size:14px;">
                        <tr>
                            <td align="center">FASE 3: SALIDA<br>Antes de que el paciente salga de quirófano</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>