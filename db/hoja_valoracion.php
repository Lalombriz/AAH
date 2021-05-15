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
// VALORACION DE ALTA DE RECUPERACION
$pdf->AddPage('L');
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html=' <style>
            .v_border table {
                border-collapse: collapse;
            }
            .v_border tr {
                border: none;
            }
            .v_border td {
                border-right: 1px; 
                border-left: 1px;
            }
        </style>
        <h3 align="center">VALORACION DE ALTA DE RECUPERACION</h3>
        <h4 align="left">Nombre del paciente: <u>'.$paciente['nombre_p'].'</u></h3>
        <h4 align="left">Hora en que llega a recuperación: ___________________________</h3>
        <table>
            <tr>
                <td>
                    <table border="0" style="width:100%;font-size:14px;">
                        <tr> 
                            <td style="font-size:18px;">SIGNOS VITALES</td>    
                        </tr>
                        <tr> 
                            <td>Presión Arterial y pulso dentro de limites de 20% de cifra basal preoperatoria</td>    
                        </tr>
                        <tr> 
                            <td>Presión Arterial y pulso, en limites de 20-40% de cifra basal preoperatoria</td>    
                        </tr>
                        <tr> 
                            <td>Presión Arterial y pulso, mayores de 40% de cifra basal preoperatoria</td>    
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr> 
                            <td style="font-size:18px;">NIVEL DE ACTIVIDAD</td>    
                        </tr>
                        <tr> 
                            <td>Marcha segura, sin mareos, similar a la del preoperatorio</td>    
                        </tr>
                        <tr> 
                            <td>Necesita ayuda para levantarse</td>    
                        </tr>
                        <tr> 
                            <td>Incapaz de caminar</td>    
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr> 
                            <td style="font-size:18px;">DOLOR</td>    
                        </tr>
                        <tr> 
                            <td>Dolor minimo o aceptable</td>    
                        </tr>
                        <tr> 
                            <td>Dolor inaceptable, intenso</td>    
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr> 
                            <td style="font-size:18px;">NAUSEAS Y VOMITOS</td>    
                        </tr>
                        <tr> 
                            <td>Minimo: desaparecen satisfactoriamente o con medicamentos</td>    
                        </tr>
                        <tr> 
                            <td>Moderados: desaparecen con medicamentos</td>    
                        </tr>
                        <tr> 
                            <td>Intensos: persisten aún y después de repetir tratamiento</td>    
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr> 
                            <td style="font-size:18px;">HEMORRAGIA POR LA INCISION</td>    
                        </tr>
                        <tr> 
                            <td>Minimo: no necesita cambios de apósitos</td>    
                        </tr>
                        <tr> 
                            <td>Moderados: incluso necesita dos cambios de apósitos</td>    
                        </tr>
                        <tr> 
                            <td>Intensos: se necesitan mas de tres cambios de apósitos</td>    
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td style="font-size:14px;" width="80%" align="left">El paciente debe contar con un minimo de 9puntos para su alta</td>  
                            <td style="font-size:16px;" align="right">TOTAL</td>    
                        </tr><br><br>
                    </table>
                </td>
                <td>
                    <table table class="v_border" border="1" style="width:100%;font-size:14px;">
                        <tr style="font-size:18px;">
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;0 HRS&nbsp;&nbsp;&nbsp;</u></td>  
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;1 HRS&nbsp;&nbsp;&nbsp;</u></td>  
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;2 HRS&nbsp;&nbsp;&nbsp;</u></td>  
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;3 HRS&nbsp;&nbsp;&nbsp;</u></td>  
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;6 HRS&nbsp;&nbsp;&nbsp;</u></td>  
                            <td align="center"><u>&nbsp;&nbsp;&nbsp;8 HRS&nbsp;&nbsp;&nbsp;</u></td>
                        </tr>
                        <tr>
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>
                        </tr>
                        <tr>
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr style="font-size:18px;">
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>
                        </tr>
                        <tr>
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr style="font-size:18px;">
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr style="font-size:18px;">
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>
                        </tr>
                        <tr>
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        <tr style="font-size:18px;">
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>  
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>  
                            <td align="center">2</td>
                        </tr>
                        <tr>
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>  
                            <td align="center">1</td>
                        </tr>
                        <tr>
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>  
                            <td align="center">0</td>
                        </tr>
                        <tr>
                            <td align="center">__________</td>
                            <td align="center">__________</td>  
                            <td align="center">__________</td>    
                            <td align="center">__________</td>  
                            <td align="center">__________</td>  
                            <td align="center">__________</td>  
                        </tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><br>
                    </table>
                </td>
            </tr>
        </table><br><br><br>
        <table border="0" style="width:100%;font-size:14px;">
            <tr align="center">
                <td width="50%">______________________________________</td>
                <td width="50%">______________________________________</td>
            </tr>
            <tr align="center">
                <td>Nombre y firma de Enfermera</td>
                <td>Nombre y firma de Médico</td>
            </tr>
        </table>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>