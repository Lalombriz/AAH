<?php
require_once('../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
$id = $_GET['id'];
// querys para funcion del doc
// query para seleccionar el paciente
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();

// querys para poder seleccionar la informacion del paciente correspondiente
$query1 = "SELECT * from fase_1 where num_paciente = '$id'";
$data1 = $mysqli->query($query1);
$fase1 = $data1->fetch_assoc();

$query2 = "SELECT * from fase_2 where num_paciente = '$id'";
$data2 = $mysqli->query($query2);
$fase2 = $data2->fetch_assoc();

$query3 = "SELECT * from fase_3 where num_paciente = '$id'";
$data3 = $mysqli->query($query3);
$fase3 = $data3->fetch_assoc();

$query4 = "SELECT * from nota_quirofano where no_exp = '$id'";
$data4 = $mysqli->query($query4);
$nota_quirofano = $data4->fetch_assoc();
// create pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle('Verificacion de la cirugia');
// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, '45');
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
$pdf->SetFont('freesansi', '', 10, '',true);
// -----------------------Contenidos------------------------
// LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA
$pdf->AddPage('L');
$pdf->Image('../img/Logos/logo3.jpg', 20, 16, 40, 13, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$pdf->Image('../img/Logos/logo1.jpg', 20, 16, 47, 12, 'jpg', '', '', false, 150, 'L', false, false, 0, false, false, false);
$html='
        <h2 align="center">LISTA DE VERIFICACION DE LA SEGURIDAD DE LA CIRUGIA</h2>
        <h align="left">Nombre del paciente: <u>'.$paciente['nombre_p'].' </u>&nbsp;&nbsp;&nbsp;Procedimiento: <u>'.$paciente['procedimiento'].'</h3>
        <table>
            <tr>
                <td>
                    <table border="1" style="font-size:12.3px;">
                        <tr>
                            <td align="center">FASE 1: ENTRADA<br>Antes de la introduccion de la anestesia</td>
                        </tr>
                        <tr>
                            <td> El Cirujano, el Anestesiólogo y el personal de enfermería en presencia del Paciente han confirmado:<br>
                                ['.$fase1['1_identidad'].'] Su identidad<br>
                                ['.$fase1['1_sitio_quirurgico'].'] El sitio quirúrgico<br>
                                ['.$fase1['1_procedimiento_quirurgico'].'] El procedimiento quirúrgico<br>
                                ['.$fase1['1_consentimiento'].'] Su consetimiento
                            </td>
                        </tr>
                        <tr>
                            <td> ¿El Anestesiólogo ha confirmado con el Cirujano que esté marcado el sitio quirúrgico:<br>
                            ['.$fase1['2_si'].'] Si<br>
                            ['.$fase1['2_no_procede'].'] No procede
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano ha confirmado la asepsiae en el sitio quirúrgico:<br>
                            ['.$fase1['3_si'].'] Si<br>
                            ['.$fase1['3_no_procede'].'] No procede
                            </td>
                        </tr>
                        <tr>
                            <td> El Anestesiólogo ha completado el control de la anestesia al revisar: medicamentos, equipo (funcionalidad y condiciones óptimas) y riesgo anestésico del paciente:<br>
                            ['.$fase1['4_si'].'] Si ,
                            ['.$fase1['4_no'].'] No
                            </td>
                        </tr>
                        <tr>
                            <td> El Anestesiólogo colocado y comprobado que funcione el oxímetro de pulso correctamente:<br>
                            ['.$fase1['5_si'].'] Si ,
                            ['.$fase1['5_no'].'] No
                            </td>
                        </tr>
                        <tr>
                            <td> El anestesiólogo ha confirmado si el paciente tiene:<br>
                            ¿Alergias conocidas?<br>
                            ['.$fase1['6_si'].'] Si ,
                            ['.$fase1['6_no'].'] No<br>
                            ¿Via aérea dificil y/o riesgo de aspiración?<br>
                            ['.$fase1['7_no'].'] No ,
                            <label align="center">['.$fase1['7_si'].'] Si, y se cuenta con material, equipo y ayuda disponible.</label><br>
                            ¿Riesgo de hemorragia en adultos&#62;500mL ? (niños&#62;7mL/kg)?<br>
                            ['.$fase1['8_no'].'] No ,
                            <label align="center">['.$fase1['8_si'].'] Si, y se ha previsto la disponibilidad de liquidos y dos vías centrales.</label><br>
                            ¿Posible necesidad de hemoderivados y soluciones disponibles?<br>
                            ['.$fase1['9_no'].'] No ,
                            <label align="center">['.$fase1['9_si'].'] Si, y se ha realizado el cruce de sangre previamente.</label>
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
                                ['.$fase2['1_cirujano'].'] Cirujano&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ['.$fase2['1_anestesiologo'].'] Anestesiólogo<br>
                                ['.$fase2['1_ayudante'].'] Ayudante de Cirujano
                                ['.$fase2['1_circulante'].'] Circulante<br>
                                ['.$fase2['1_otros'].'] Otros.
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano, ha confirmado de manera verbal con el Anestesiólogo y el personal de Enfermería (Instrumentista y Circulante):<br>
                            ['.$fase2['2_paciente_correcto'].'] Paciente correcto.<br>
                            ['.$fase2['2_procedimiento_correcto'].'] Procedimiento correcto.<br>
                            ['.$fase2['2_sitio_quirurgico_correcto'].'] Sitio quirúrgico correcto.<br>
                            ['.$fase2['2_organo_bilateral'].'] En caso de órgano bilateral ha marcado derecho o izquierdo según corresponda.<br>
                            ['.$fase2['2_estrctura_multiple'].'] En caso de estructura múltiple, ha especificado el nivel a operar.<br>
                            ['.$fase2['2_posicion_correcta'].'] Posición correcta del paciente.
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano ha verificado que cuenta con los estudios de imagen que requiere?<br>
                            ['.$fase2['3_si'].'] Si ,
                            ['.$fase2['3_no'].'] No ,
                            ['.$fase2['3_no_procede'].'] No Procede
                            </td>
                        </tr>
                        <tr>
                            <td><h3 align="center">PREVENCIÓN DE EVENTOS CRÍTICOS</h3><br>
                            El Cirujano ha informado:<br>
                            ['.$fase2['4_pasos_criticos'].'] Los pasos críticos o no sistematizados.<br>
                            ['.$fase2['4_duracion_operacion'].'] La duración de la operación.<br>
                            ['.$fase2['4_perdida_sangre'].'] La pérdida de sangre prevista.<br>
                            El Anestesiólogo ha conformado:<br>
                            ['.$fase2['4_riesgo_enfermedad'].'] La existencia de algún riesgo de enfermedad en el paciente que pueda complicar la cirugía.<br>
                            El Personal de Enfermería ha confirmado:<br>
                            ['.$fase2['4_fecha_metodo'].'] La fehca y método de la esterilización del equipo y el instrumental.<br>
                            ['.$fase2['4_problema_instrumental'].'] La existencia de algún problema con el instrumental, los equipos y el conteo del mismo.<br><br><br>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table border="1" style="font-size:11.7px;">
                        <tr>
                            <td align="center">FASE 3: SALIDA<br>Antes de que el paciente salga de quirófano</td>
                        </tr>
                        <tr>
                            <td> El Cirujano responsable de la atención del paciente en presencia del Anestesiólogo y el personal de Enfermería, ha aplicado la Lista de Verificacíon de la Seguridad de la Cirugía y ha conformado verbalmente:<br>
                                ['.$fase3['1_nombre_proc'].']El nombre del procedimiento realizado.<br>
                                ['.$fase3['1_recuento_instrumento'].']El recuento COMPLETO del instrumental, gasas y agujas.<br>
                                <label align="center">['.$fase3['1_etiquetado_muestras'].']El etiquetado de las muestras (nombre completo del paciente, fecha de nacimiento, fecha de a CIRUGÍA y descripción general).</label><br>
                                <label align="center">['.$fase3['1_problemas_instrumental'].'] Los problemas con el instrumental y los equipos que deben ser notificados y resueltos.</label><br>
                            </td>
                        </tr>
                        <tr>
                            <td> El Cirujano, El Anestesiólogo y el personal de Enfermería han comentado al Circulante:<br>
                                ['.$fase3['2_aspectos_recuperacion'].']Los principales aspectos de la recuperación postoperatoria.<br>
                                ['.$fase3['2_plan_tratamiento'].']El plan de tratamiento.<br>
                                ['.$fase3['2_riesgos_paciente'].']Los riesgos del paciente.
                            </td>
                        </tr>
                        <tr>
                            <td> ¿Ocurrieron eventos adveros?<br>
                            ['.$fase3['3_no'].'] No ,
                            ['.$fase3['3_si'].'] Si<br>
                            ¿Se registro el eventos adverso?<br>
                            ['.$fase3['4_si'].'] Si
                            ['.$fase3['4_no'].'] No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¿Dónde? _________________________
                            </td>
                        </tr>
                        <tr>
                            <td><p align="center" >LISTADO DEL PERSONAL RESPONSABLE QUE PARTICIPO EN LA APLICACION Y LLENADO DE ESTA LISTA DE VERIFICACION</p>
                                <p align="center">CIRUJANO(S):<br>Nombre(s): <u>'.$nota_quirofano['cirujano'].' </u><br>Firma: _________________________</p>
                                <p align="center">ANESTESIÓLOGOS(S):<br>Nombre(s): <u>'.$nota_quirofano['anestesiologo'].' </u><br>Firma: ____________________</p>
                                <p align="center">PERSONAL DE ENFERMERIA(S):<br>Nombre(s): <u>'.$nota_quirofano['enfermera_qca'].' </u><br>Firma: ____________________</p>
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