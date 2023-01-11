<link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="../public/css/style.css">
<?php
$title = 'Add task';

ob_start();
require "nav.php";
?>

<div class="container">
    <h1><?php echo $title ?></h1>

    <?php
    if(isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
    }

    if(isset($confirm_message)) {
        echo "<p class='message_ok'>$confirm_message</p>";
    }
    ?>

    <form method="post">
        <label for="title">
            <span>Title:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <input type="text" placeholder="New task" name="title" required>
        <label for="category">
            <span>Category:</span>
            <strong><abbr title="required">*</abbr></strong>
        </label>
        <select name="category" id="category" required>
            <option value="">Select a category</option>
            <option value="Professional">Professional</option>
            <option value="Personal">Personal</option>
            <option value="School">School</option>
        </select>       
        <input type="submit" name="submit" value="Add">
    </form>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>