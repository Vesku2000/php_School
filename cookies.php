<?php 
if(isset($_POST['name'])) {
    setcookie('name', $_POST['name']);
    header('location: cookies.php');

}
if(isset($_POST['language'])) {
    setcookie('language', $_POST['language']);
    header('location: cookies.php');

}
if(isset($_POST['city'])) {
    setcookie('city', $_POST['city']);
    header('location: info.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="name">
                Your name:
            </label>
            <input type="text" name="name" id="name">
        </p>
        
        
            <label for="language">
                Your language:
            </label>
            <select name="language" id="language">
                <option value="suomi">Suomi</option>
                <option value="ruotsi">Ruotsi</option>
                <option value="englanti">englanti</option>
                
            </select>

            <label for="city">
                Your city:
            </label>
            <select name="city" id="city">
                <option value="Turku">Turku</option>
                <option value="Vaasa">Vaasa</option>
                <option value="Helsinki">Helsinki</option>
                
            </select>
            <p>
            <button type="submit">Submit</button>
            </p>
    </form>
    <h2>Wasap <?php echo htmlspecialchars($_COOKIE['name'], ENT_QUOTES); ?> !</h2>
    
</body>
</html>