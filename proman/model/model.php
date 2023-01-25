<?php
// model/model.php
require "connection.php";

$connection = db_connect();

// --- PROJECTS ---
function get_project($id)
{
    try {
        global $connection;

        $sql =  'SELECT * FROM projects WHERE id = ?';
        $project = $connection->prepare($sql);
        $project->bindValue(1, $id, PDO::PARAM_INT);
        $project->execute();

        return $project->fetch();
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

function get_all_projects()
{
    try {
        global $connection;

        $sql =  'SELECT * FROM projects ORDER BY title';
        $projects = $connection->query($sql);

        return $projects;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function get_all_projects_count()
{
    try {
        global $connection;

        $sql =  'SELECT COUNT(id) AS nb FROM projects';
        $statement = $connection->query($sql)->fetch();

        $projectCount = $statement['nb'];

        return $projectCount;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

// --- TASKS ---
function get_task($id)
{
    try {
        global $connection;

        $sql =  'SELECT * FROM tasks WHERE id = ?';
        $project = $connection->prepare($sql);
        $project->bindValue(1, $id, PDO::PARAM_INT);
        $project->execute();

        return $project->fetch();
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

function get_all_tasks()
{
    try {
        global $connection;

        $sql =  'SELECT t.*, DATE_FORMAT(t.date_task, "%d.%m.%Y") as ttime, p.title project 
        FROM tasks t
        INNER JOIN projects p 
        ON t.project_id = p.id 
        ORDER BY t.date_task ASC';

        /*
        tai
        SELECT t.*, DATE_FORMAT(t.date_task, "%d.%m.%Y") as ttime, p.title project 
        FROM tasks t, projects p
        WHERE t.project_id = p.id 
        ORDER BY p.title ASC, t.date_task DESC
        */

        $tasks = $connection->query($sql);

        return $tasks;
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

function get_all_tasks_count()
{
    try {
        global $connection;

        $sql =  'SELECT COUNT(id) AS nb FROM tasks';
        $statement = $connection->query($sql)->fetch();

        $taskCount = $statement['nb'];

        return $taskCount;
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

//--- ADD PROJECT ---

function add_project($title, $category, $id)
{
    try {
        global $connection;

        if ($id) {
            $sql = 'UPDATE projects SET title = ?, category = ? WHERE id = ?';
        } else {
            $sql =  'INSERT INTO projects(title, category) VALUES(?, ?)';
        }
        $statement = $connection->prepare($sql);
        $new_project = array($title, $category);

        if ($id) {
            $new_project = array($title, $category, $id);
        }

        $affectedLines = $statement->execute($new_project);

        return $affectedLines;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

// --- ADD TASK ---

function add_task($id, $title, $date, $time, $project_id)
{
    try {
        global $connection;

        //$sql =  'INSERT INTO tasks(title, date_task, time_task, project_id) VALUES(?, ?, ?, ?)';
        if ($id) {
            //echo "update! $project_id, $title, $date, $time, $id";
            $sql = 'UPDATE tasks SET title = ?, date_task = ?, time_task = ?, project_id = ? WHERE id = ?';
            $statement = $connection->prepare($sql);
            $update_task = array($title, $date, $time, $project_id, $id);
            $affectedLines = $statement->execute($update_task);
        } else {
            //echo "insert!";
            $sql =  'INSERT INTO tasks(title, date_task, time_task, project_id) VALUES(?, ?, ?, ?)';
            $statement = $connection->prepare($sql);
            $new_task = array($title, $date, $time, $id);
            $affectedLines = $statement->execute($new_task);
        }

        return $affectedLines;
    } catch (PDOException $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}    

// --- DELETE TASK ---

function delete_task($id)
{
    try {
        global $connection;

        $sql =  'DELETE FROM tasks WHERE id = ?';
        $task = $connection->prepare($sql);
        $task->bindValue(1, $id, PDO::PARAM_INT);
        $task->execute();

        return true;
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}

// --- CHECK IF TITLE EXISTS ---

function titleExists($table, $title)
{
    try {
        global $connection;

        $sql =  'SELECT title FROM ' . $table . ' WHERE title = ?';
        $statement = $connection->prepare($sql);
        $statement->execute(array($title));

        if ($statement->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
    }
}
//create csv projects
function get_project_columns()
{
    try {
        global $connection;
        $sql = "SELECT `COLUMN_NAME` as Col FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='e2101778_proman' AND `TABLE_NAME`='projects';";
        $projects = $connection->query($sql);
        

        return $projects;

    } catch (PDOExpection $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}
//create csv tasks
//not working
function get_task_columns()
{
    try {
        global $connection;
        $sql = "SELECT `COLUMN_NAME` as Col FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='e2101778_proman' AND `TABLE_NAME`='tasks';";
        $tasks = $connection->query($sql);

        return $tasks;

    } catch (PDOExpection $err) {
        echo $sql . "<br>" . $err->getMessage();
        exit;
    }
}

function get_all_tasks_dates()
{


    $today = date("Y-m-d");

  
    echo "Today is " .  $today . "<br>";;

    try {
        global $connection;

        $sql =  'SELECT t.*, DATE_FORMAT(t.date_task, "%d.%m.%Y") as ttime, p.title project 
        FROM tasks t
        INNER JOIN projects p 
        ON t.project_id = p.id 
        ORDER BY t.date_task ASC';

        /*
        tai
        SELECT t.*, DATE_FORMAT(t.date_task, "%d.%m.%Y") as ttime, p.title project 
        FROM tasks t, projects p
        WHERE t.project_id = p.id 
        ORDER BY p.title ASC, t.date_task DESC
        */

        $tasks = $connection->query($sql);
        

        return $tasks;
    } catch (PDOException $exception) {
        echo $sql . "<br>" . $exception->getMessage();
        exit;
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

}

function sendMail(){
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
}
