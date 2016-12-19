<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//
/*
 fungsi untuk mengenerate pdf
 diambil dari: http://code.google.com/p/dompdf/
 usage: http://code.google.com/p/dompdf/wiki/Usage
 
 $object = ini adalah html, atau object text lain yang akan kita jadikan pdf
 $filename = nama file untuk pdf yang jadi (contoh: hasil.pdf)
 $direct_download = apakah akan didownload langsung?? direct download bila bernilai true maka akan menampilkan download dialog pada browser 
*/
function generate_pdf($object, $filename='', $direct_download=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    //
    $dompdf = new DOMPDF();
    $dompdf->load_html($object);
    $dompdf->render();
    //
    if ($direct_download == TRUE)
        $dompdf->stream($filename);
    else
        return $dompdf->output();
}
?>  