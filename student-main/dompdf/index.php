<?php
ob_start();
require 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
?>
<html>
    <h1>Hello</h1>
    </html>
<?php

$html = ob_get_contents();
ob_end_clean();
$dompdf->load_html($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("codexworld", array("Attachment" => 0));
?>