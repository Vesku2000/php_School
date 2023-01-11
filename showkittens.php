<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kittens</title>
    <style>
        img{
            width:200px;
            height: 150px;
            
            border-radius: 50%;
        }

        #card:hover{
            -webkit-transform: scale(1.3);
	        transform: scale(1.2);
            cursor: pointer;
        }

        #card{
            background-color: black;
            display: flex;
            float: left;
            align-items: center;
            border: 3px solid white;
            border-radius: 15px;
            margin: 50px;

            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }
        #text{
            color: white;
            padding-left: 10px;
        }
        #button {
            width: 200px;
            height: 100px;
            transition-duration: 0.4s;
            background-color: red;
            color: black;
            font-size: 30px;
            font-weight: 900;
        }
        label{
            font-size: 30px;
        }
        form{
            display:flex;
            justify-content: center;
            flex-direction: column;
        }
        #button:hover {
            background-color: #4CAF50; /* Green */
            color: white;
            cursor: pointer;
        }
        input{
            height: 40px;
            font-size: 100%;
            margin: 15px 15px 15px 0px;
        }
    </style>
</head>

<body>
    <?php 

    //$numberOfKittens = 7;
        // poimitaan muuttuja url:sta
    $numberOfKittens = $_GET['number'];

    for($i = 1; $i <= $numberOfKittens; $i++){
        ?>
        <div id="card">
        <div id="img">
                <img src="cat.png" alt="cat <?php $i; ?>" >
            </div>
            <div id="text">
                Cat <?php echo $i ?>:
            </div>
            
        </div>
        <?php
    }

    ?>
    <div id="">
    <form>
        <div>
            <label for="number">
                Number of kittens to show:
            </label>
            <input name="number" id="number" value="<?php 
            if(isset($_GET['number']))
             { echo htmlspecialchars($_GET['number'], ENT_QUOTES); 
             } ?>">
        </div>
        <div>
            <button type="submit" id="button">Submit</button>
        </div>
    </form>
    </div>
    
</body>

</html>