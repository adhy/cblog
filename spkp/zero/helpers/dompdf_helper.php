<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $paper, $orientation, $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");


// disable DOMPDF's internal autoloader if you are using Composer
//define('DOMPDF_ENABLE_AUTOLOAD', false);
//define('DOMPDF_ENABLE_REMOTE', true);
//define('DOMPDF_PDF_BACKEND', CPDF);

// include DOMPDF's default configuration
//require_once 'dompdf/dompdf_config.inc.php';

    $dompdf = new DOMPDF();
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => false));
        exit(0);
    } else {
        return $dompdf->output();
    }
}
?>