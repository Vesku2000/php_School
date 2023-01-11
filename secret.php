
<?php

session_start();

if(!isset($_SESSION['authenticated_user'])) {
    header('location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .mursu{
            width: 50%;
            border-radius: 50%;
            animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
        }
        .mursu:hover {
        animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
        }

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret</title>
</head>
<body>
    <p><a href="logout.php">Log out</a></p>
    <p>Here is something special for users who are logged in:</p>
    <p><img src="mursu.png" alt="mursu" class="mursu"></p>
</body>
</html>