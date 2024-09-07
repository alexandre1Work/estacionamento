<?php

use Dompdf\Dompdf;
use Dompdf\Options;

function gerar_pdf($conteudo, $nomeArquivo = 'documento.pdf') {
    require 'C:\xampp\htdocs\estacionamento\application\controllers\vendor\autoload.php';
    
    $options = new Options();
    $options->setChroot(__DIR__);

    $dompdf = new Dompdf($options);
    
    $dompdf->loadHtml($conteudo);


    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream($nomeArquivo, ['Attachment' => 0]);
}
