<?php
require("header.php");
require("functions.php");
$to = "valtterisyrjanen@gmail.com";
$subject = "virus";
$txt = "Jos saat tämän viestin \r
        olet velkaa minulle";

$headers = "From: virus@suomi.fi";

if(sendEmail($to, $subject, $txt, $headers)){
    echo "Mail sent";
}else{
    echo "Error: Mail was not sent!";
}

require("footer.php");
?>