<?php 


$cv= $_GET['cv'];

    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($cv) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($cv));
    ob_clean();
    flush();
    readfile("localhost/itrax/portfolio/frontassets/assets/cv/Karim Taha Ismail.pdf".$cv); //showing the path to the server where the file is to be download
    exit;