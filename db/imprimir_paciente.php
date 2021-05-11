<?php
$host= 'localhost';
$user= 'root';      
$password ='';
$db = 'hospital';           
$mysqli = new mysqli($host,$user,$password,$db);
require_once('../tcpdf.php');
date_default_timezone_set("America/Ensenada");
$id = $_GET['did'];
$query = "SELECT * from paciente where num_paciente = '$id'";
$data = $mysqli->query($query);
$paciente = $data->fetch_assoc();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set title
$pdf->SetTitle(''.$paciente['nombre_p'].'');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, '45');

// set header and footer fonts
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

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);
$pdf->SetFont('aefurat', '', 14, '',true);

// -----------------------Contenidos------------------------
//Datos del paciente
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <p align="right">Fecha: '.date("d-m-Y").'</p>
        <h4>Nombre del paciente: <u>'.$paciente['nombre_p'].'</u></h4><br>
        <h4>Edad : <u>'.$paciente['edad'].' Años</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sexo : <u>'.$paciente['sexo'].'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha de nacimiento : <u>'.$paciente['fecha_nacimiento'].'</u></h4><br>
        <h4>Procedencia : <u>'.$paciente['procedencia'].'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. : <u>'.$paciente['num_paciente'].'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expediente: #<u>'.$paciente['exp_procedencia'].'</u></h4><br>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Cell(180, 0, 'DATOS DEL PACIENTE', 1, 1, 'C', 0, '', 0);
$pdf->Cell(180, 0, 'DOMICILIO: '.$paciente['direccion_p'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'POBLACION: '.$paciente['poblacion'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'ESTADO: '.$paciente['estado'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'TELEFONO: '.$paciente['telefono_p'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'EN CASO NECESARIO AVISAR A: '.$paciente['nombre_a'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'PARENTESCO: '.$paciente['parentesco'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'DOMICILIO: '.$paciente['direccion_a'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'POBLACION: ', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'ESTADO: ', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'TELEFONO: '.$paciente['telefono_a'].'', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'HORA: ', 1, 1, 'L', 0, '', 0);
$pdf->Cell(180, 0, 'DIAGNOSTICO: '.$paciente['diagnostico'].'', 1, 1, 'L', 0, '', 0);
$html='
        <br><p align="left">AUTORIZACION DEL PROCEDIMIENTO</p>
        <h6>NOMBRE DEL MEDICO QUE REALIZO EL PROCEDIMIENTO:</h6>
        <h6>PROCEDIMIENTO REALIZADO AL PACIENTE:</h6>
        <h6>NOMBRE Y FIRMA DEL PACIENTE O FAMILIAR________________________________________________________</h6><br>
        <h5>
            <input type="checkbox" name="a" value="a">MEJORIA
            <input type="checkbox" name="b" value="b">CURACION
            <input type="checkbox" name="c" value="c">VOLUNTARIA
            <input type="checkbox" name="d" value="d">A DOMICILIO
            <input type="checkbox" name="e" value="e">A OTRO HOSPITAL
        </h5><br>
        <h6>NOMBRE MEDICO QUE AUTORIZA ALTA DEL PACIENTE</h6>
        <h6>FIRMA DEL MEDICO:________________________________________________________</h6>
        <h6>HORA:________________________________________________________</h6>
        <h6>NOMBRE DE LA PERSONA QUE RECIBE AL PACIENTE:__________________________________________________</h6>
        <h6>PARENTESCO:</h6>
        <h6>FIRMA:________________________________________________________</h6>
        <h6>OBSERVACIONES:_______________________________________________________________________________________________________________________________________________________________________________________</h6>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//Aviso de privacidad
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <p align="center"><b><h3>AVISO DE PRIVACIDAD DE DATOS PERSONALES</h3></b></p>
        <p align="left"><h5>LOS DATOS PERSONALES QUE NOS PROPORCIONE SERÁN PROTEGIDOS POR LA LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE BAJA CALIFORNIA, 
            DE CONFORMIDAD CON SU ARTICULO 31 Y DEMÁS RELATIVOS, LOS CUALES SERÁN INCORPORADOS Y TRATADOS EN EL SISTEMA DE DATOS PERSONALES CORRESPONDIENTE. 
            LA INFORMACIÓN QUE RECABAMOS, ES DE CARÁCTER OBLIGATORIO Y DE NO PROPORCIONARLOS HARÍA IMPOSIBLE LA PRESTACIÓN DEL PROCEDIMIENTO MÉDICO QUE SE HA SOLICITADO APLICARLE, 
            LOS DATOS DE NOMBRE, EDAD, SEXO, OCUPACIÓN, TELÉFONO, DIRECCIÓN, CORREO ELECTRÓNICO, ETC. SERÁN UTILIZADOS ÚNICAMENTE COMO DATO ESTADÍSTICO. 
            <u>LA UNIDAD DE ESPECIALIDADES MÉDICAS DE BAJA CALIFORNIA</u> NO PODRÁ DIFUNDIR DICHOS DATOS SIN SU CONSENTIMIENTO Y AUTORIZACIÓN EXPRESA EN LOS TÉRMINOS DE LEY, 
            SALVO EN LOS CASOS CITADOS POR EL ARTICULO 32 DE LA LEY DE TRANSPARENCIA Y ACCESO ALA INFORMACIÓN PÚBLICA PARA EL ESTADO DE BAJA CALIFORNIA, ES DECIR, 
            ENTRE SUJETOS OBLIGADOS Y/0 POR ORDEN JUDICIAL. EN LOS TÉRMINOS DEL ARTICULO 36 DE LA LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE BAJA CALIFORNIA, 
            LOS TITULARES DE LOS DATOS PERSONALES, PREVIA IDENTIFICACIÓN COMO TITULAR DE LOS MISMOS, PODRÁN EJERCER SUS DERECHOS DE ACCESO. RECTIFICACIÓN, 
            CANCELACIÓN U OPOSICIÓN AL MANEJO DE SUS DATOS PERSONALES ANTE LA UNIDAD CONCENTRADORA DE TRANSPARENCIA DEL PODER EJECUTIVO A TRAVÉS DEL SISTEMA ELECTRÓNICO 
            <b><u>www.transparencia.gob.mx</u></b> O DIRECTAMENTE EN LAS OFICINAS UBICADAS EN EL CUARTO PISO DEL EDIFICIO DEL PODER EJECUTIVO UBICADO EN CALZADA INDEPENDENCIA #994 
            CENTRO CÍVICO CODIGO POSTAL 21000, MEXICALI, BAJA CALIFORNIA. PARA CUALQUIER DUDA TAMBIÉN ESTARÁ DISPONIBLE LA DIRECCIÓN SIGUIENTE <b><u>uct@baja.gob.mx.</u></b> 
            PARA LOS EFECTOS CONDUCENTES SE INFORMA DE ACUERDO AL CONTENIDO DEL ARTICULO 70 DE LA LEY DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA PARA EL ESTADO DE BAJA CALIFORNIA. 
        </h5></p>
        <p align="left">NOMBRE DEL DERECHOHABIENTE: <u>'.$paciente['nombre_p'].'</u></p><br>
        <p align="left">FECHA: '.date("d-m-Y").'</p><br>
        <p align="left">FIRMA: _____________________________________________________________ </p>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//Consentimiento informado para la aplicacion de anestesia
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <p align="center"><b><h3>CONSETIMIENTO INFORMADO PARA LA APLICACION DE ANESTESIA</h3></b></p>
        <h6>Nombre del Paciente <u>'.$paciente['nombre_p'].'</u> , Representante Legal <u>'.$paciente['nombre_a'].'</u> Testifico que el Dr. <u>'.$paciente['medico_esp'].'</u> 
            me ha proporcionado la siguiente informacion.
        </h6>
        <h6>La anestesia general: Nos permite realizar la cirugía y/o algún procedimiento que requiera anestesia sin dolor suprimiendo la consciencia, 
            mediante la administración de anestésicos por vía intravenosa, inhalatoria o combinados. 
            Siempre que se administra anestesia general el paciente contará con una línea IV permeable (suero); 
            y se administrará oxigeno suplementario por medio de la mascarilla o por un tubo endotraqueal.
        </h6>
        <h6>La anestesia local y/o regional: Tiene como objeto anestesiar por interrupción de la transmisión del dolor de los nervios periféricos implicados en la zona quirúrgica, 
            mediante la inyección de un anestésico en la zona se opera, en el espacio epidural o intrarraquídeo (espalda), a través de una aguja y/o catéter colocado en dicho espacio. 
            Esta técnica permite al paciente estar despierto, evitando algunas complicaciones derivadas de la anestesia general....
        </h6>
        <h6>Todo acto anestésico-quirúrgico lleva implícito la posibilidad de complicaciones mayores o menores que pueden requerir tratamientos complementarios, 
            médicos o quirúrgicos, que aumente su estancia hospitalaria. Dichas complicaciones unas veces son derivadas directamente de la propia técnica anestésica, 
            pero otras dependerán del procedimiento quirúrgico, del estado previo del paciente y de los tratamientos que este recibiendo o de las posibles anomalías 
            anatómicas y/o de la utilización de equipo médico. No esperamos que ocurran y siempre somos muy cuidadosos tratando de evitar que ocurran, pero, aun así, 
            en ocasiones muy excepcionales, si ocurren. De acuerdo a la ley, nosotros debemos informarle acerca de las posibles complicaciones.
        </h6>
        <h6>Entre las complicaciones que pueden sugerir las siguientes complicaciones: Cambios de la presión arterial, náuseas, vómitos, 
            cefaleas de mayor o menos intensidad, retención urinaria, toxicidad a los anestésicos, reacciones alérgicas, dolores de espalda, 
            convulsiones, infección y/o hemorragia local, neuropatías, hematomas, abscesos, reacciones meníngeas, paro cardiorrespiratorio coma irreversible y muerte.
        </h6>
        <h6>Además, debe saber que, una vez realizada esta técnica anestésica, puede ser necesario practicar anestesia general por motivos médicos o 
            porque las molestias del paciente así lo requieran.
        </h6>
        <h6>He comprendido las explicaciones que se me han facilitado en un lenguaje claro y sencillo, y el medico que me ha atendido me ha 
            permitido realizar todas las observaciones y me han aclarado todas las dudas que le he planteado.
        </h6>
        <h6>También comprendo que, en cualquier momento y sin necesidad de dar ninguna explicación, puedo revocar el consentimiento que ahora doy.</h6>
        <h6>Por ello, manifestó que estoy satisfecho con la información recibida y que comprendo el alcance y los riesgos del tratamiento. 
            Y en tales condiciones CONSIENTO que se me administre ANESTESIA.
        </h6>
        <h5>Ensenada B.C., Fecha: '.date("d-m-Y").'</h5><br>
        <h5>Medico Anestesiólogo: <u>'.$paciente['anestesiologo'].'</u></h5><br>
        <h5>Paciente o representante legal: ______________________________________________________ </h5><br><br>
        <h5>_____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</h5>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Testigo
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Testigo
        </h5>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//Carta de consetimiento validamente informado
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html='
        <p align="center"><b><h3>CARTA DE CONSETIMIENTO VALIDAMENTE INFORMADO</h3></b></p>
        <h6>Fecha: '.date("d-m-Y").'</h6>
        <h6>Nombre del paciente: <u>'.$paciente['anestesiologo'].'</u></h6>
        <h6>Identificado con: _____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numero de expediente:<u>'.$paciente['exp_procedencia'].'</u></h6>
        <h6>Seguro popular: _______________________________________</h6>
        <h6>Persona responsable: ____________________________________________________________________________</h6>
        <h6>Por medio de la presente y en pleno uso de mis facultades manifiesto, que he recibido a mi satisfacción información clara y suficiente para mejorar o recuperar mi salud que incluye:</h6>
        <h6>
            <ul>
                <li>Los probable(s) padecimiento(s) que presento.</li>
                <li>Los estudios de laboratorio y gabinete que serán necesarios para llegar a un diagnostico medico y definir un tratamiento adecuado.</li>
                <li>Los procedimientos médicos y/o quirúrgicos, diagnósticos o terapéuticos que serán necesarios durante mi atención.</li>
            </ul>
            Hago constar que he tenido la oportunidad de formular preguntas referentes a lo anterior y que estas me han sido contestadas satisfactoriamente, 
            así como, he tenido los probables beneficios, riesgos y complicaciones que pueden surgir como producto de ello.
        </h6>
        <h6>Por lo anterior, autorizo a los médicos de la unidad de especialidades medicas de baja california y a sus asistentes, para llevar a cabo de los siguientes actos:</h6>
        <h6>
            <ul>
                <li>Mi internamiento para diagnostico y tratamiento medico (ingreso hospitalario), así como para la atención de las contingencias y/o urgencias que pudieran surgir durante el mismo.</li>
                <li>El procedimiento diagnostico/terapéutico de alto riesgo siguiente: ___________________________________________________________________________</li>
                <li>La cirugía (s) mayor siguiente(s): _________________________________________________________________ Que consiste en: ______________________________________________________________________________ Obteniendo como beneficio(s): ___________________________________________________________________ Y cuyos riesgos principales son: __________________________________________________________________</li>
            </ul>
            Entiendo que esta autorización quedara como vigente mientras no concluya (n) el (los) acto (s) aquí autorizado (s), 
            y no excluyen la necesidad de solicitar nuevamente mi autorización escrita para otros procedimientos médicos quirúrgicos que 
            pudieran afectar o variar el pronóstico de mi salud.
        </h6><br>
        <h5>_____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</h5>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Paciente
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;Nombre y Firma del Medico tratante
        </h5><br><br>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;___________________________________________</h5>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma de la persona Legalmente responsable
        </h5><br><br>
        <h5>_____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</h5>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Testigo
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Testigo
        </h5>
    ';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

//Consetimiento informado para cirugia
$pdf->AddPage();
$pdf->Image('../img/Logos/logo3.jpg', 20, 3, 30, 16, 'jpg', '', '', false, 150, 'R', false, false, 0, false, false, false);
$html = '
    <span style="text-align:justify;">
        <p align="center">CONSETIMIENTO INFORMADO PARA CIRUGIA</p>
        <h5>En forma voluntaria consiento en que el medico adscrito al servicio de cirugía que se me designe ME REALICE _______________________________________________________________________________________________________________________________________________________________
            COMO TRATAMIENTO PARA_____________________________________________________________________________________________________________________________________________
            Entiendo que esta cirugía consiste básicamente en:_______________________________________________________________________________________________________________________________
            Esta cirugía no garantiza totalmente los resultados esperados. Se me ha explicado y 
            entiendo que la garantía no es total pues la practica de la medicina y cirugía no son una ciencia exacta, debiendo mi medico colocar todo su conocimiento y 
            su pericia en buscar los mejores resultados con el objetivo de mejorar el problema por el cual consulté.
        </h5>
        <h5>También he entendido que existen otros tipos de tratamiento como __________________________________________________________________________________________ 
            los cuales no acepto y voluntariamente he elegido este método quirúrgico.
        </h5>
        <h5>Entiendo que como en toda intervención quirúrgica y por causas independientes del actual de mi medico se pueden presentar complicaciones comunes y potencialmente 
            serias que podrían requerir tratamientos complementarios, tanto médicos como quirúrgicos, siendo las complicaciones más frecuentes: nauseas, vomito, dolor, inflamación, 
            moretones, seromas (acumulación de líquido en la cicatriz) granulomas (reacción a cuerpo extraño o sutura), queloide (crecimiento excesivo de la cicatriz), 
            hematomas (acumulación de sangre), posible necesidad de transfusión (intra o posoperatoria), infecciones con posible evolución febril (urinarias, de pared abdominal, 
            pélvicas...), reacciones alérgicas, irritación frénica, anemia, heridas involuntarias en vasos sanguíneos, vejiga, intestino u otros órganos, eventración (hernias 
            en la cicatriz). Existen otros riesgos como:______________________________________________________________________________________________________________________________
        </h5>
        <h5>También se me informa la posibilidad de complicaciones severas como pelviperitonitis, choque hemorrágico o trombosis que, aunque son poco frecuentes, 
            representan como en toda intervención quirúrgica un riesgo excepcional de perder la vida derivado del acto quirúrgico o de la situación vital de cada paciente.
        </h5>
        <h5>En mi caso particular, el(la) doctor(a) me ha explicado que presento los siguientes riesgos adicionales:</h5>
        <h5>Entiendo que para esta cirugía se necesita anestesia, la cual se evaluará y realizará por el servicio de anestesia.</h5>
        <h5>He entendido las condiciones y objetivos de la cirugía que se me va a practicar, los cuidados que debo tener antes y después de ella, estoy satisfecha 
            con la información recibida del médico tratante quien lo ha hecho en un lenguaje claro y sencillo, y me ha dado la oportunidad de preguntar y resolver las dudas a 
            satisfacción, además comprendo y acepto el alcance y los riesgos justificados de posible previsión que conlleva el procedimiento quirúrgico que aquí autorizo. 
            En tales condiciones consiento que me realice CIRUGIA.
        </h5>
        <h5>__________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Paciente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Medico
        </h5>
        <h5>__________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma del Testigo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha y Hora
        </h5>
    </span>';
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// Close and output PDF document
$pdf->Output(''.$paciente['nombre_p'].'.pdf', 'I');
?>
