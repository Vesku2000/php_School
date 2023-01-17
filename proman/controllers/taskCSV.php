<?php
require_once("../model/model.php");
require("common.php");

$data = "";

$filename = '../data/csv/project_csv/projects_'. date("Y-m-d h:i:s") . '.csv';

$tasks = get_all_tasks();
$columns = get_task_columns();


foreach($columns as $column) {
    $data .= $column['Col'] . ";";

}
$data .= "\r";


foreach($tasks as $task) {
     $data .= $task['id'] . ";" . $task['title'] . ";" . $task['date_task'] . ";" . $task['time_task'] . $task['project_id'] ."\r";

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