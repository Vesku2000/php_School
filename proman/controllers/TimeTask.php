<?php
require_once("../model/model.php");
//require("common.php");

$task_date = get_all_tasks_dates();




foreach($tasks as $task) {
    array_push($taskArr, $task['id'] . $task['title'] . $task['date_task'] );
}


$taskJson = json_encode($taskArr);


$taskJson = json_encode($taskArr, JSON_PRETTY_PRINT);

require "../views/Arrays.php";


echo $taskJson;

?>