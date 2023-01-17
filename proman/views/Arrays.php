<?php
require "common.php";
$title = 'array list';

ob_start();
require 'nav.php';
?>

<div class="container">
    <p><a href="../">Go Home</a></p>


    
</div>


<?php
$content = ob_get_clean();
include 'layout.php'
?>

