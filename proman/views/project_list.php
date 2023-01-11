<?php
require "common.php";
$title = 'Projects list';

ob_start();
require 'nav.php';
?>

<div class="container">
    <p><a href="../">Go Home</a></p>

    <h1><?php echo $title . " (" . $projectCount . ")"  ?></h1>
    <!-- If there's not yet data -->
    <?php if ($projectCount == 0) { ?>
    <div>
        <p>You have not yet added any project </p>
        <p><a href='../controllers/project.php'>Add project</a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($projects as $project) : ?>
        <li>
            <!-- echo $project["title"]; -->
            <a href="../controllers/project.php?id=<?php echo $project['id']; ?>">
               <?php echo escape($project["title"]) ?>
            </a>                  
        </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php
$content = ob_get_clean();
include 'layout.php'
?>

