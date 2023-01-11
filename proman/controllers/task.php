<?php
require_once "../model/model.php";
require "common.php";



if(isset($_POST['submit'])){
    $title = escape(trim($_POST['title']));
    $category = escape($_POST['category']);
    $id = escape($_POST['id']);

    if(empty($title) || empty($category)) {
        $error_message = "Title or category empty";
    }else{
        if(titleExists("tasks", $title)){
            $error_message = "I'm sorry, but looks like \"" . $title . "\" already exists";
        }else{
            add_task($title, $category, $id);
            header('Refresh:4; url=task_list.php');
            $confirm_message = 'Task added succesfully! Moving to task list..';
        }
    }
}

require "../views/task.php"

?>