<!DOCTYPE html>
<?php 
// arvotaan satunnaisluku
$randomInt = random_int(1,10);
?>
<head>
    <meta charset="UTF-8">
    <title>Your lucky number is</title>
    <style>

    </style>
</head>

<body>
    <p>
        <a href="showkittens.php?number=<?php echo $randomInt; ?>">
        Now show me <?php echo $randomInt; ?> kittens!
    </a>
    </p>
    <h1>Your lucky umber is: <?php echo $randomInt; ?></h1>

    <?php
        if ($randomInt == 7 ) {
            echo "Lucky number seven!";
        } elseif ($randomInt > 6 && $randomInt < 10) {
            echo  "<p style='color:red; font-size: 100px;' >Nice";
        } elseif($randomInt == 1) {
            echo "Number one!";
        }
?>
</body>

</html>