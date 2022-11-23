<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Premio concurso</title>
</head>
<body>

<h2>ENHORABUENA</h2>
<p>Para nombre recibe el premio del concurso</p>
<dl>
<dd>Perseverancia</dd>
<dd>Constancia</dd>
<dd>Optimismo</dd>
<dd>Autoestima</dd>
<dd>Trabajo en Equipo</dd>
<dd>Jamón Pata Negra</dd>
</dl>
</body>
</html>';
$mipdf = new Dompdf();
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");
//cargamos imagen
//$mipdf->Image('leon.jpg' , 80 ,22, 35 , 38);

# Cargamos el contenido HTML.
$mipdf ->load_html($html);

# Renderizamos el documento PDF.
$mipdf ->render();

# Creamos un fichero
$pdf = $mipdf->output();
$filename = "PremioConcurso.pdf";
file_put_contents($filename, $pdf);

# Enviamos el fichero PDF al navegador.
$mipdf->stream($filename);
?>