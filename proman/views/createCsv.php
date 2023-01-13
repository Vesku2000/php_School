<?php
$title = 'createCsv';

ob_start();
require "nav.php";

if (isset($error_message)) {
    echo "<p class='message_error'>$error_message</p>";
}

if (isset($confirm_message)) {
    echo "<p class='message_ok'>$confirm_message</p>";
}
?> 

<div class="container">

    <h1><?php echo $title . " (" . $taskCount . ")"  ?></h1>
    <!-- If there's not yet data -->
    <?php if ($taskCount == 0) { ?>
    <div>
        <p>You have not yet added any tasks</p>
        <p><a href='../controllers/task.php'>Add task</a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($tasks as $task) : ?>
        <li>
            <a href="../controllers/task.php?id=<?php echo $task['id']; ?>">
            <?php
            echo "Title: " . $task["title"] . " (Date: " . $task["ttime"] . ", Project: " . $task["project"] .")";
            ?> 
            </a>
            <form method="post">
            <input type="hidden" value="<?php echo $task["id"]; ?>" name="delete">
            <input type="submit" value="Delete">
            </form>
                        
        </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>