<?php
require_once("../model/model.php");
require("common.php");

$data = "";

$filename = '../data/csv/project_csv/projects_'. date("Y-m-d h:i:s") . '.csv';

$projects = get_all_projects();
$columns = get_project_columns();


foreach($columns as $column) {
    $data .= $column['Col'] . ";";

}
$tasks = get_all_tasks();
$taskColumns = get_task_columns()

foreach($taskColumns as $taskColumn){
     $data -= $taskColumn['Colu'] . ";";
}



$data .= "\r";


foreach($projects as $project) {
     $data .= $project['id'] . ";" . $project['title'] . ";" . $project['category'] . ";" . "\r";

}
foreach($tasks as $task) {
     $data1 .= $tasks['id'] . ";" . $tasks['title'] . ";" . $tasks['category'] . ";" . "\r";

}


if (!$fp = fopen($filename, 'x')) {
     echo "Cant open file ($filename)";
     exit;

}

if (fwrite($fp, $data) === FALSE) {
    echo "Cant write ($filename)";
     exit;

}

header("Location:". $filename);
echo "Great data writted ($data) to file ($filename)";

fclose($fp);

?>