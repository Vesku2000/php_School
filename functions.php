<?php
function sendEmail($to, $subject, $txt, $headers){
    if(mail($to, $subject, $txt, $headers)){
        return true;
    }else{
        return false;
    }
}
