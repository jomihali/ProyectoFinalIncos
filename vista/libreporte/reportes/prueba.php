<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 150]]);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();