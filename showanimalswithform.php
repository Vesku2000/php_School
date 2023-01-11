<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animals</title>
    <style>
        body{
            background-color: wheat;
        }
        img{
            width:200px;
            height: 150px;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
            border-radius: 50%;
        }

        img:hover{
            -webkit-transform: scale(1.3);
	        transform: scale(1.3);
            cursor: pointer;
        }

        #card{
            background-color: black;
            display: flex;
            float: left;
            align-items: center;
            border: 3px solid white;
            border-radius: 15px;
            margin-left: 20px;
            margin-right: 20px;
        }
        #text{
            color: white;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <?php 

    //$numberOfKittens = 7;
        // poimitaan muuttuja url:sta
        $numberOfKittens = isset($_GET['number']) ? $_GET['number'] : 1;
        
            if($numberOfKittens < 1){
                $numberOfKittens = 1;
            }else if($numberOfKittens > 1000){
                $numberOfKittens = 1;
                
            }
            
            $numberOfDogs = isset($_GET['dognumber']) ? $_GET['dognumber'] : 1;
            if($numberOfDogs < 1){
                $numberOfDogs = 1;
            }else if($numberOfDogs > 1000){
                $numberOfDogs = 1;
                
            }

            $numberOfMouses = isset($_GET['mousenumber']) ? $_GET['mousenumber'] : 1;
            if($numberOfMouses < 1){
                $numberOfMouses = 1;
            }else if($numberOfMouses > 1000){
                $numberOfMouses = 1;
                
            }
    
    
    //$numberOfDogs = round($numberOfKittens / 2, 0, PHP_ROUND_HALF_UP);
    //$numberOfMouses = round($numberOfKittens * 2.5, 0, PHP_ROUND_HALF_DOWN);
    
    
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

    <?php 

    $r = 0;
    while ($r < $numberOfDogs) {
        ?>
        <div id="card">
        <div id="img">
                <img src="dog.png" alt="dog <?php $i; ?>" >
            </div>
            <div id="text">
                Dog <?php echo $i ?>:
            </div>
            
        </div>
        <?php

        $r++;
    }
    ?>

    <?php 
    $s = 1;
    do {
        ?>
        <div id="card">
        <div id="img">
                <img src="mouse.png" alt="mouse <?php $i; ?>" >
            </div>
            <div id="text">
                Mouse <?php echo $i ?>:
            </div>
            
        </div>
        <?php
        $s++;
    } while($s < $numberOfMouses);
    ?>

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

        <div>
            <label for="dognumber">
                Number of Dogs to show:
            </label>
            <input name="dognumber" id="dognumber" value="<?php 
            if(isset($_GET['dognumber']))
             { echo htmlspecialchars($_GET['dognumber'], ENT_QUOTES); 
             } ?>">
        </div>
        <div>
            <button type="submit" id="button">Submit</button>
        </div>

        <div>
            <label for="mousenumber">
                Number of Dogs to show:
            </label>
            <input name="mousenumber" id="mousenumber" value="<?php 
            if(isset($_GET['mousenumber']))
             { echo htmlspecialchars($_GET['mousenumber'], ENT_QUOTES); 
             } ?>">
        </div>
        <div>
            <button type="submit" id="button">Submit</button>
        </div>
    </form>




    
    
    
</body>

</html>