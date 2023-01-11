<?php
function sendEmail($to, $subject, $txt, $headers){
    if(mail($to, $subject, $txt, $headers)){
        return true;
    }else{
        return false;
    }
}

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