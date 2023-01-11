<?php
session_start();

//function login
function login($username, $password){

    //valid usernames and passwords
    $users = [
        'vamk' => '$2y$10$DxkKUr830tmTmI2rVcah.uWMS9Obf/LFBlzvzyXJaaNnnJ30FO/Qm'
    ];

    if(isset($users[$username])) {

        $expectedPasswordHash = $users[$username];

        if(password_verify($password, $expectedPasswordHash)) {

            //remember the username of the user who just logged in
            $_SESSION['authenticated_user'] = $username;

            //redirect to secret.php
            header('location: secret.php');
            exit;
        }else {
            //login failed
            return false;
        }
    }
}

// call login if username and password are not empty
if(isset($_POST['username'], $_POST['password'])){
    if(!login($_POST['username'], $_POST['password'])){
        echo "login failed, please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body{
            display:flex;
            justify-content: center;
            align-items: center;
            padding-top: 100px;
        }
        input{
            width: 150px;
            height: 40px;
            border-radius: 15px;
        }
        body{
            font-size: 25px;
            background-color:gold;
        }
        #container{
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        button{
            width:100%;
            height: 40px;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<form method="post">
    <div>
        <label for="username">
            Username:
        </label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">
            Password:
        </label>
        <input type="password" name="password" id="password">
    </div>
    <div id="container">
        <button type="submit">Submit</button>
    </div>
</form>
    
</body>
</html>