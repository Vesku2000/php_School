<?php
require_once("../model/model.php");
//require("common.php");

$task_date = get_all_tasks_dates();
$tasks = get_all_tasks();
$taskArr = array();
$taskArrId = array();
$task_due = array();
$today = new DateTime();



foreach($tasks as $task) {
    if($today > $task['date_task']){
    array_push($taskArr, $task['date_task']  );

    

    }
}
foreach($tasks as $task) {
    
    array_push($taskArrId, $task['title']  );

    

    
}

function sendEmail($to, $subject, $txt, $headers){
    if(mail($to, $subject, $txt, $headers)){
        return true;
    }else{
        return false;
    }
}





$taskJson = json_encode($taskArr);
$taskJson = json_encode($taskArr, JSON_PRETTY_PRINT);

$taskJsonId = json_encode($taskArrId);
$taskJsonId = json_encode($taskArrId, JSON_PRETTY_PRINT);

$table = "<table>
<tr>
  <td> $taskJson</td>
  <td>$taskJsonId</td>
  <td>Linus</td>
</tr>
</table>";

$to = "valtterisyrjanen@gmail.com";
$subject = "virus";
$txt = $table;

$headers = "From: virus@suomi.fi";

if(sendEmail($to, $subject, $txt, $headers)){
    echo "Mail sent";
}else{
    echo "Error: Mail was not sent!";
}

require "../views/Arrays.php";


echo $taskJson;

?>