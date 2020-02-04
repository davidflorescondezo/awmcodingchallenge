<?php

//My personal API key obtained from: https://api.nasa.gov/
$api_key = 'pYdJo40kReBfj0YuXlOIjce20bNCTzgb35EigoyZ';
//URL for the Mars Rover Photos API + my API key
$pics_url = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?sol=100&earth_date=2020-1-8&api_key=' . urlencode($api_key);

//Passing the url variable to the file_get_contents function and capturing the return onto a JSON variable
$pic_json = file_get_contents($pics_url);
//Decoding from JSON format to a php array
$pic_array = json_decode($pic_json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nasa Mars Rover Images</title>
    <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, minmax(200px, 1fr));
      grid-gap: 1.5rem;
      justify-content: start;
      color: #ffffff;
    }

    .grid-container > figure {
      background: #91a7a1;
      padding: 0.2rem;
      border-radius: 0.5rem;
    }

    .grid-container > img {
      height: auto;
      width: 100%;
    }
    </style>
</head>

<body>
    <div class="grid-container">
        <?php
        $pic_num = 0;
        if(!empty($pic_array)){
            //While the data still holds images and hasn't reached a total of 10 images it will continue through the loop
            while($pic_num < 10){
                //Printing the image source link alongside the img src tag to display it on the screen
                echo '<img src="' .$pic_array['photos'][$pic_num]['img_src'].'" alt=""/>';
                $pic_num++;
            }
        }
        $pic_last = 1;
        ?>
    </div>
</body>

</html>
