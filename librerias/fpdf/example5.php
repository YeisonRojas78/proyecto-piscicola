<?php
include 'fpdf.php';
include 'exfpdf.php';
include 'easyTable.php';

$pdf=new exFPDF('P', 'in');
$pdf->AddPage();

//Configuracion de fuente personalizada 
$pdf->SetFont('helvetica', '', 12);
$pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
$pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
$pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
$pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');


//Creacion de tabla 
$table = new easyTable($pdf, '{28, 150, 40}', 'width:500; border-color:#000; font-size:10; paddingY:0; border:1;');

$sena = "SERVICIO NACIONAL DE APRENDIZAJE SENA \nSISTEMA DE GESTIÓN DEL LABORATORIO";
$version = "VERSIÓN: 04";
$table->easyCell("", 'img:../../assets/logo-sena-negro.png, w25; rowspan:3');
$table->easyCell(iconv('UTF-8', 'windows-1252', $sena), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'align:C;');
$table->printRow();

$procesoGestion = "PROCESO GESTIÓN DE SERVICIO AL CLIENTE";
$codigo = "CÓDIGO: GIC-GSC-F-011";
$table->easyCell(iconv('UTF-8', 'windows-1252', $procesoGestion), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $codigo), 'align:C;');
$table->printRow();

$nombre = "COTIZACIÓN";
$fechaVigencia = "FECHA VIGENCIA: 2024-04-18";
$table->easyCell(iconv('UTF-8', 'windows-1252', $nombre), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fechaVigencia), 'align:C;');
$table->printRow();

$table->endTable(0.3);

$table = new easyTable($pdf, '{45, 120}', 'width:100; border-color:#000; font-size:11; paddingY:0; border:1;');

$fechaCreacion = "Fecha: año-mes-día";
$numCotizacion = "No. de cotización de servicios: año-consecutivo";
$table->rowStyle('paddingY:0.1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fechaCreacion),'align:C; font-style:B;' );
$table->easyCell(iconv('UTF-8', 'windows-1252', $numCotizacion), 'align:C; font-style:B;');
$table->printRow();

$table->endTable(0.2);

$table = new easyTable($pdf, '{50, 115,}', 'width:100; border-color:#000; font-size:11; paddingY:1; border:1;');

$tableText = "INFORMACIÓN DEL CLIENTE";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $tableText), 'align:C; font-style:B; colspan:2; font-size:13; bgcolor:  #dbe9f1');
$table->printRow(); 

$nomRazon = "Nombre o razón social:";
$nomCliente = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomRazon), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomCliente), 'font-style:B;');
$table->printRow();

$nit = "NIT:";
$numNit = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nit), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $numNit),'font-style:B;');
$table->printRow();

$personaContac = "Persona de contacto:";
$nomContac = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $personaContac), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomContac), 'font-style:B;');
$table->printRow();

$cedula = "Cédula:";
$numCedula = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $cedula), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $numCedula), 'font-style:B;');
$table->printRow();

$direccion = "Dirección:";
$direccionClien = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $direccion), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $direccionClien), 'font-style:B;');
$table->printRow();

$telefono = "Teléfonos de contacto:";
$numTel = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $telefono), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $numTel), 'font-style:B;');
$table->printRow();

$correo = "Dirección electrónica:";
$correoCliente = "";
$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $correo), 'font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $correoCliente), 'font-style:B;');
$table->printRow();

$table->endTable(0.2);

$table = new easyTable($pdf, '{25, 40, 25, 25, 15, 17, 18}', 'border-color:#000; font-size:11; paddingY:1; border:1;');

$table->rowStyle('paddingY:0;');
$table->easyCell("SERVICIOS", 'align:C; font-style:B; colspan:7; font-size:13; bgcolor:  #dbe9f1');
$table->printRow();

$analisisRea = "ANÁLISIS PARA REALIZAR";
$infoEnsayo = "NFORMACIÓN DEL ENSAYO";
$cantidad = "Cantidad";
$valorUni = "Valor unitario ($)";
$valorTotal = "Valor total ($)";
$table->rowStyle('paddingY:0.1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $analisisRea), 'colspan:2; font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $infoEnsayo), 'colspan:2; font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $cantidad), 'rowspan:2; font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $valorUni), 'rowspan:2; font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $valorTotal), 'rowspan:2; font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$cod = "Código";
$nomPro = "Nombre";
$metodo = "Método \nNorma";
$tecnica = "Técnica \nanalítica";

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $cod), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomPro), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $metodo), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $tecnica), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$nomProducto = "";
$metodoNorma = "";
$tecnicaAnalitica = "";
$table->rowStyle('paddingY:0;');
$table->easyCell("", 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomProducto), 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $metodoNorma), 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $tecnicaAnalitica), 'align:C;');
$table->easyCell("1", 'align:C;');
$table->easyCell("47.794", 'align:C;');
$table->easyCell("47.794", 'align:C;');
$table->printRow();

$nomProducto = "";
$metodoNorma = "";
$tecnicaAnalitica = "";
$table->rowStyle('paddingY:0.5;');
$table->easyCell("", 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomProducto), 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $metodoNorma), 'align:C;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $tecnicaAnalitica), 'align:C;');
$table->easyCell("", 'align:C;');
$table->easyCell("", 'align:C;');
$table->easyCell("", 'align:C;');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell("TOTAL A PAGAR ($)", 'font-style:B; colspan:6; align:R; bgcolor:  #dbe9f1');
$table->easyCell("$", 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->endTable(-0.8);

$table = new easyTable($pdf, '{165}', 'font-size:13; paddingY:1;');

$dataInformacion = "La información que se muestra en la cotización establece, las condiciones propuestas por el Laboratorio de Análisis de Materiales para la Construcción -LABMAC-, hacia los usuarios contratantes de los análisis. Por favor lea detenidamente las condiciones antes de aceptar esta cotización.";
$table->rowStyle('paddingY:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $dataInformacion));
$table->printRow();

$table->endTable(-0.8);

$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:12; paddingY:1; border:1;');

$table->rowStyle('paddingY:0;');
$table->easyCell("CONDICIONES COMERCIALES", 'align:C; font-style:B; colspan:7; bgcolor:  #dbe9f1');
$table->printRow();

$condiciones = "• Los tramites de pago se realiza a través de las condiciones establecidas en la pasarela de pagos SENA Wompi, inscribiendo en número de prefectura. \n• Validez de la oferta por el año en curso.";
$table->rowStyle('paddingY:0.1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $condiciones), 'colspan:2; align:L;');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell("ENTREGA DE INFORME DE RESULTADOS:", 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$inforEntrega = "• Los resultados de los ensayos solicitados serán entregados en máximo 10 días hábiles, a partir del ingreso de la muestra al laboratorio. \n• Los resultados se emiten únicamente en relación con la muestra a analizar. \n   • El resultado del análisis se entregará en forma escrita (correo certificado o en persona) o por medio electrónico, según se requiera.";
$table->rowStyle('paddingY:0.3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $inforEntrega), 'align:L;');
$table->printRow();

$table->rowStyle('paddingY:0.02;');
$table->easyCell("TERMINOS Y CONDICIONES", 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->endTable(-0.1);

$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:12; paddingY:2;');

$table->rowStyle('paddingY:0.2;');
$table->easyCell("GIC-GSC-F-011 V.04", 'align:C; colspan:7;   ');
$table->printRow();

$table->endTable();

$table = new easyTable($pdf, '{40, 150, 40}', 'width:500; border-color:#000; font-size:10;  border:1;');

$sena = "SERVICIO NACIONAL DE APRENDIZAJE SENA \nSISTEMA DE GESTIÓN DEL LABORATORIO";
$version = "VERSIÓN: 4";
$table->easyCell("", 'img:../../asset/logo-sena-negro.png, w25; rowspan:3');
$table->easyCell(iconv('UTF-8', 'windows-1252', $sena), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'align:C;');
$table->printRow();

$procesoGestion = "PROCESO GESTIÓN DE SERVICIO AL CLIENTE";
$codigo = "CÓDIGO: GIC-GSC-F-011";
$table->easyCell(iconv('UTF-8', 'windows-1252', $procesoGestion), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $codigo), 'align:C;');
$table->printRow();

$nombre = "COTIZACIÓN";
$fechaVigencia = "FECHA VIGENCIA: 2024-04-18";
$table->easyCell(iconv('UTF-8', 'windows-1252', $nombre), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fechaVigencia), 'align:C;');
$table->printRow();

$table->endTable(0.2);

$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:13; paddingY:1; border:1;');

$table->rowStyle('paddingY:0.4;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "• La información de la cotización establece la mínima cantidad de materia prima y/o producto terminado, requerido para realizar los análisis solicitados, y sus valores son por cada muestra enviada para analizar.\n• La aceptación de la oferta implica que el cliente esta de acuerdo con todas las condiciones aquí descritas, incluyendo que sus muestras se analicen por los métodos indicados y bajo las condiciones de operación del laboratorio. En caso de tener cualquier inconformidad se debe manifestar a LABMAC para elaborar una nueva cotización, si es necesario.\n• La aceptación de la cotización se debe hacer por medio físico o al correo electrónico.\n• Si desea expresar alguna queja o reclamo con respecto al presente servicio o ensayo, puede hacerlo al correo electrónico, labmac@sena.edu.co.\n• Con el propósito de asegurar la imparcialidad del servicio, el personal del laboratorio no puede recomendar ni sugerir interpretaciones respecto a los resultados. Sin embargo, puede solicitar la asesoría del Laboratorio LABMAC para aclarar sus inquietudes sobre el servicio o reporte de resultados.\n• El cliente se compromete a no ejercer presiones indebidas sobre el personal del laboratorio con la intención de modificar los resultados de su trabajo."), 'colspan:2; align:L;');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "CONDICIONES TÉCNICAS"), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:0.4;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "• En caso de ser necesario repetir un análisis, se hará con la contra-muestra que posee el Laboratorio de Análisis de Materiales para la Construcción -LABMAC.\n• Las contra-muestras serán almacenadas por un periodo de 6 meses, para el caso de ensayos destructivos, el material utilizado se desecha 3 días hábiles después de emitido el informe de resultados.\n• El cliente asegura la toma de muestras in situ; el laboratorio no participa en labores de muestreo.\n• Para el desarrollo del procedimiento de índice de plasticidad de los suelos según la norma INV E - 126 - 13 y/o NTC 4630:1999, es necesario, el desarrollo del procedimiento de determinación del límite líquido de los suelos según la norma INV E - 125 - 13 y/o NTC 4630:1999, para obtener el dato de índice de plasticidad.\n• El laboratorio no realiza declaración de la conformidad.\n• La muestra será recepcionada en las instalaciones del laboratorio, en horarios de lunes a viernes de 8.00 am a 12.00 pm y de 2.00 pm a 5.00 pm.\n• Para el ingreso al laboratorio de las muestras del servicio de ensayo de Determinación en laboratorio del contenido de agua (Humedad) de muestras de suelo, roca y mezclas de suelo-agregado (INVE-122-13), se deberá realizar previamente el pago del servicio."), 'align:L;');
$table->printRow();

$table->endTable(0.2);

$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:12; paddingY:2;');

$table->rowStyle('paddingY:0.02;');
$table->easyCell("GIC-GSC-F-011 V.04", 'align:C; colspan:7;   ');
$table->printRow();

$table->endTable();

$table = new easyTable($pdf, '{40, 150, 40}', 'width:500; border-color:#000; font-size:10;  border:1;');

$sena = "SERVICIO NACIONAL DE APRENDIZAJE SENA \nSISTEMA DE GESTIÓN DEL LABORATORIO";
$version = "VERSIÓN: 4";
$table->easyCell("", 'img:../../asset/logo-sena-negro.png, w25; rowspan:3');
$table->easyCell(iconv('UTF-8', 'windows-1252', $sena), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'align:C;');
$table->printRow();

$procesoGestion = "PROCESO GESTIÓN DE SERVICIO AL CLIENTE";
$codigo = "CÓDIGO: GIC-GSC-F-011";
$table->easyCell(iconv('UTF-8', 'windows-1252', $procesoGestion), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $codigo), 'align:C;');
$table->printRow();

$nombre = "COTIZACIÓN";
$fechaVigencia = "FECHA VIGENCIA: 2024-04-18";
$table->easyCell(iconv('UTF-8', 'windows-1252', $nombre), 'align:C; font-style:B;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fechaVigencia), 'align:C;');
$table->printRow();

$table->endTable(0.2);

 $table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:13; paddingY:1; border:1;');

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "GARANTÍA"), 'align:C; font-style:B; colspan:7; font-size:13; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:0.4;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "• Por efectos de aseguramiento, se garantiza total confidencialidad y reserva sobre los resultados obtenidos, además los derechos de autor son propiedad total del usuario.\n• Somos responsables de gestionar toda información obtenida o creada, se informará al cliente, la información que se pondrá a disposición del público o terceros. Salvo que esté prohibido por ley. En el caso que al laboratorio le sea requerida información por parte de un ente legal que por ley requieran información, para facilitar alguna investigación debido a una queja, entonces el laboratorio es autorizado por las disposiciones contractuales para revelar información confidencial.\n• En casos de que fuentes externas al cliente, provean información de este (por ejemplo, una persona que presenta una queja, los organismos reglamentarios, entre otros) será confidencial entre el cliente y el laboratorio. El proveedor de dicha información se mantendrá como confidencial por parte del laboratorio y no se compartirá con el cliente, a menos que se haya acordado con la fuente."), 'colspan:2; align:L;');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "CONDICIONES DE ENVÍO DE LA MUESTRA (S)"), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:0.4;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "Las condiciones con la cuales debe llegar la muestra son las siguientes:\n
• La cantidad mínima de muestra debe ser 1 kg.
• La muestra debe ser representativa del suelo cuyas características se desean conocer.
• La muestra debe llegar en condiciones mínimas de embalaje, es decir, empacada en bolsa, frasco de plástico o en algún recipiente en la que no quede expuesta al aire y que no permita que se derrame o se bote muestra.
• La muestra debe venir codificada con el nombre o la identificación que permita que le permita al cliente tener trazabilidad de esta, después de emitir el informe de resultado."), 'align:L;');
$table->printRow();

$table->endTable(-0.8);

$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:11; paddingY:1;');

$table->rowStyle('paddingY:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', "LABORATORIO DE ANÁLISIS DE MATERIALES PARA LA CONSTRUCCIÓN\nCentro de la Industria la Empresa y los Servicios - CIES\nCalle 2N Avenida 4 y 5, Barrio Pescadero Cúcuta\nCelular: (+57) 316 2345004 / (+57) 300 2654143\ne-mail principal: labmac@sena.edu.co\nCúcuta - Norte de Santander - Colombia"), 'align:C; font-style:B; colspan:7;');
$table->printRow();
$table->endTable();

$table = new easyTable($pdf, '{20,35,50}', 'border-color:#000; font-size:11; paddingY:1; border:1;');

$version = "Código";
$fecha = "Nombre";
$descripcionmodificacion = "Descripción de la modificación";


$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fecha), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $descripcionmodificacion), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:0;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();

$table->rowStyle('paddingY:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$pdf->Output(); $table->easyCell(iconv('UTF-8', 'windows-1252', $version), 'font-style:B; align:C; bgcolor:  #dbe9f1');
$table->printRow();


$table->endTable(1);

?>


$table = new easyTable($pdf, '{165}', 'border-color:#000; font-size:11; paddingY:1;');

$pdf->SetY(-27);
$table->rowStyle('paddingY:1;');
$table->easyCell("GIC-GSC-F-011 V.04", 'align:C; colspan:7;   ');
$table->printRow();
