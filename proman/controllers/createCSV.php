<?php
require_once "../model/model.php";
require "common.php";

//createCsv();

$fp = fopen('file.csv', 'w');
$list = array (
    array('aaa', 'bbb', 'ccc', 'dddd'),
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);
foreach ($list as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);


    ?>