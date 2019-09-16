<?php
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
    <?php
    
    session_destroy();


    header("refresh:5;login.html");
    echo '<img src="dd.png" alt="Logo" width="200">';
    echo("<div>");
    echo("Logout Sucessful."); //message to display if we did not match a user
    echo("<br>");
    echo("Thank you");
    echo("</div>");

    ?>
</body>
</html>