<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        iframe{
            width: 80%;
            height: 80vh;
            }
    </style>
</head>
<body>
<h2>Nimesi on  <?php echo htmlspecialchars($_COOKIE['name'], ENT_QUOTES); ?> !</h2>
<?php if($_COOKIE['language'] === "ruotsi") {
    ?> <h2>HEISSAN <?php echo htmlspecialchars($_COOKIE['name'], ENT_QUOTES); ?> !</h2>
    <?php
}
?>
<?php if($_COOKIE['language'] === "suomi") {
    ?> <h2>MORO <?php echo htmlspecialchars($_COOKIE['name'], ENT_QUOTES); ?> !</h2>
    <?php
}
?>
<?php if($_COOKIE['language'] === "englanti") {
    ?> <h2>HELLO <?php echo htmlspecialchars($_COOKIE['name'], ENT_QUOTES); ?> !</h2>
    <?php
}
?>

<?php if($_COOKIE['city'] === "Turku") {
    ?><iframe src="https://www.ilmatieteenlaitos.fi/saa/turku" ></iframe> !</h2>
    <?php
}
?>
<?php if($_COOKIE['city'] === "Vaasa") {
    ?><iframe src="https://www.ilmatieteenlaitos.fi/saa/vaasa" ></iframe> !</h2>
    <?php
}
?>
<?php if($_COOKIE['city'] === "Helsinki") {
    ?><iframe src="https://www.ilmatieteenlaitos.fi/saa/helsinki" ></iframe> !</h2>
    <?php
}
?>





</body>
</html>