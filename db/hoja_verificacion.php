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
        <h align="left">Nombre del paciente: <u>'.$paciente['nombre_p'].' </u>&nbsp;&nbsp;&nbsp;Procedimiento: <u>'.$paciente['procedimiento'].'</h3>
        <table>
            <tr>
                <td>
                    <table border="1" style="font-size:12px;">
                        <tr>
                            <td align="center">FASE 1: ENTRADA<br>Antes de la introduccion de la anestesia</td>
                        </tr>
                        <tr>
                            <td> El Cirujano, el Anestesiólogo y el personal de enfermería en presencia del Paciente han confirmado:<br>
                                <input type="checkbox" name="a" value="a">Su identidad<br>
                                <input type="checkbox" name="b" value="b">El sitio quirúrgico<br>
                                <input type="checkbox" name="c" value="c">El procedimiento quirúrgico<br>
                                <input type="checkbox" name="d" value="d">Su consetimiento
                            </td>
                        </tr>
                        <tr>
                            <td> ¿El Anestesiólogo ha confirmado con el Cirujano que esté marcado el sitio quirúrgico:<br>
                            <input type="checkbox" name="e" value="e">Si<br>
                            <input type="checkbox" name="f" value="f">No procede
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano ha confirmado la asepsiae en el sitio quirúrgico:<br>
                            <input type="checkbox" name="g" value="g">Si<br>
                            <input type="checkbox" name="h" value="h">No procede
                            </td>
                        </tr>
                        <tr>
                            <td> El Anestesiólogo ha completado el control de la anestesia al revisar: medicamentos, equipo (funcionalidad y condiciones óptimas) y riesgo anestésico del paciente:<br>
                            <input type="checkbox" name="i" value="i">Si
                            <input type="checkbox" name="j" value="j">No
                            </td>
                        </tr>
                        <tr>
                            <td> El Anestesiólogo colocado y comprobado que funcione el oxímetro de pulso correctamente:<br>
                            <input type="checkbox" name="k" value="k">Si
                            <input type="checkbox" name="l" value="l">No
                            </td>
                        </tr>
                        <tr>
                            <td> El anestesiólogo ha confirmado si el paciente tiene:<br>
                            ¿Alergias conocidas?<br>
                            <input type="checkbox" name="m" value="m">Si
                            <input type="checkbox" name="n" value="n">No<br>
                            ¿Via aérea dificil y/o riesgo de aspiración?<br>
                            <input type="checkbox" name="o" value="o">No
                            <label align="center"><input type="checkbox" name="p" value="p">Si, y se cuenta con material, equipo y ayuda disponible.</label><br>
                            ¿Riesgo de hemorragia en adultos&#62;500mL ? (niños&#62;7mL/kg)?<br>
                            <input type="checkbox" name="q" value="q">No
                            <label align="center"><input type="checkbox" name="r" value="r">Si, y se ha previsto la disponibilidad de liquidos y dos vías centrales.</label><br>
                            ¿Posible necesidad de hemoderivados y soluciones disponibles?<br>
                            <input type="checkbox" name="s" value="s">No
                            <label align="center"><input type="checkbox" name="t" value="t">Si, y se ha realizado el cruce de sangre previamente.</label><br><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" style="font-size:12px;">
                        <tr>
                            <td align="center">FASE 2: PAUSA QUIRÚRGICA<br>Antes de la incisión cutánea</td>
                        </tr>
                        <tr>
                            <td> La Instrumentista ha identificado cada uno de los miembros del equipo quirúrgico para que se presenten por su nombre y funcion, sin omisiones.:<br>
                                <input type="checkbox" name="f2a" value="f2a">Cirujano&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="f2b" value="f2b">Anestesiólogo<br>
                                <input type="checkbox" name="f2c" value="f2c">Ayudante de Cirujano
                                <input type="checkbox" name="f2d" value="f2d">Circulante<br>
                                <input type="checkbox" name="f2e" value="f2e">Otros.
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano, ha confirmado de manera verbal con el Anestesiólogo y el personal de Enfermería (Instrumentista y Circulante):<br>
                                <input type="checkbox" name="f2f" value="f2f">Paciente correcto.<br>
                                <input type="checkbox" name="f2g" value="f2g">Procedimiento correcto.<br>
                                <input type="checkbox" name="f2h" value="f2h">Sitio quirúrgico correcto.<br>
                                <label align="center"><input type="checkbox" name="f2i" value="f2i">En caso de órgano bilateral ha marcado derecho o izquierdo según corresponda.</label><br>
                                <label align="center"><input type="checkbox" name="f2j" value="f2j">En caso de estructura múltiple, ha especificado el nivel a operar.</label><br>
                                <input type="checkbox" name="f2k" value="f2k">Posición correcta del paciente.
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano ha verificado que cuenta con los estudios de imagen que requiere?<br>
                            <input type="checkbox" name="f2l" value="f2l">Si
                            <input type="checkbox" name="f2m" value="f2m">No
                            <input type="checkbox" name="f2n" value="f2n">No Procede
                            </td>
                        </tr>
                        <tr>
                            <td><h3 align="center">PREVENCIÓN DE EVENTOS CRÍTICOS</h3><br>
                            El Cirujano ha informado:<br>
                            <input type="checkbox" name="f2o" value="f2o">Los pasos críticos o no sistematizados.<br>
                            <input type="checkbox" name="f2p" value="f2p">La duración de la operación.<br>
                            <input type="checkbox" name="f2q" value="f2q">La pérdida de sangre prevista.<br>
                            El Anestesiólogo ha conformado:<br>
                            <label align="center"><input type="checkbox" name="f2r" value="f2r">La existencia de algún riesgo de enfermedad en el paciente que pueda complicar la cirugía.</label><br>
                            El Personal de Enfermería ha confirmado:<br>
                            <label align="center"><input type="checkbox" name="f2s" value="f2s">La fehca y método de la esterilización del equipo y el instrumental.</label><br>
                            <label align="center"><input type="checkbox" name="f2t" value="f2t">La existencia de algún problema con el instrumental, los equipos y el conteo del mismo.</label><br><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" style="font-size:12px;">
                        <tr>
                            <td align="center">FASE 3: SALIDA<br>Antes de que el paciente salga de quirófano</td>
                        </tr>
                        <tr>
                            <td> El Cirujano responsable de la atención del paciente en presencia del Anestesiólogo y el personal de Enfermería, ha aplicado la Lista de Verificacíon de la Seguridad de la Cirugía y ha conformado verbalmente:<br>
                                <input type="checkbox" name="f3a" value="f3a">El nombre del procedimiento realizado.<br>
                                <input type="checkbox" name="f3b" value="f3b">El recuento COMPLETO del instrumental, gasas y agujas.<br>
                                <label align="center"><input type="checkbox" name="f3c" value="f3c">El etiquetado de las muestras (nombre completo del paciente, fecha de nacimiento, fecha de a CIRUGÍA y descripción general).</label><br>
                                <label align="center"><input type="checkbox" name="f3d" value="f3d">Los problemas con el instrumental y los equipos que deben ser notificados y resueltos.</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano, El Anestesiólogo y el personal de Enfermería han comentado al Circulante:<br>
                                <input type="checkbox" name="f3e" value="f3e">Los principales aspectos de la recuperación postoperatoria.<br>
                                <input type="checkbox" name="f3f" value="f3f">El plan de tratamiento.<br>
                                <input type="checkbox" name="f3g" value="f3g">Los riesgos del paciente.<br>
                            </td>
                        </tr>
                        <tr>
                            <td> ¿Ocurrieron eventos adveros?<br>
                            <input type="checkbox" name="f3h" value="f3h">No
                            <input type="checkbox" name="f3i" value="f3i">Si<br>
                            ¿Se registro el eventos adverso?<br>
                            <input type="checkbox" name="f3j" value="f3j">Si
                            <input type="checkbox" name="f3k" value="f3k">No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¿Dónde? _________________________
                            </td>
                        </tr>
                        <tr>
                            <td><p align="center">LISTADO DEL PERSONAL RESPONSABLE QUE PARTICIPO EN LA APLICACION Y LLENADO DE ESTA LISTA DE VERIFICACION</p>
                                <p align="center">CIRUJANO(S):<br>Nombre(s): _______________________________________<br>Firma: ___________________________________________</p>
                                <p align="center">ANESTESIÓLOGOS(S):<br>Nombre(s): _______________________________________<br>Firma: ___________________________________________</p>
                                <p align="center">PERSONAL DE ENFERMERIA(S):<br>Nombre(s): _______________________________________<br>Firma: ___________________________________________</p>
                            </td>
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