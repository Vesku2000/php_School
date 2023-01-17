<?php
require_once("../model/model.php");
require("common.php");

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



require "../views/project_list.php";
?>