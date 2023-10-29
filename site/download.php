<?php

$file = "../ebooks/".htmlentities($_GET['file']).".epub";
header('Content-Type: application/octet-stream');
header('Content-Transfert-Encoding: Binary');
header('Content-disposition: attachment; filename='.basename($file).'');
echo readfile($file);
?>