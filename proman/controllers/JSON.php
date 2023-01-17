<?php
require_once("../model/model.php");
//require("common.php");

$projects = get_all_projects();
$tasks = get_all_tasks();

$taskArr = array();
$projectArr = array();


foreach($projects as $project) {
    array_push($projectArr, $project['id'] . $project['title'] . $project['category'] );
}

foreach($tasks as $task) {
    array_push($taskArr, $task['id'] . $task['title'] . $task['date_task'] );
}

$projectJson = json_encode($projectArr);
$taskJson = json_encode($taskArr);




require "../views/Arrays.php";

echo $projectJson;
echo $taskJson;

?>