<?php
 session_start();// important function to allow session variables  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        
        //database connection variables for a typical local development
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "davids_doughnuts"; //database name that you have already created that you want to connect to
        
        //dummy form data to insert into the database - imagine this was sent from a HTML form submission using POST method
        $name = $_SESSION["user_name"];
        $email = $_SESSION["user_email"];
        $sprinkles = $_POST['sprinkles'];
        $chocolate = $_POST['chocolate'];
        $caramel = $_POST['caramel'];
        $raspberry = $_POST['raspberry'];
        $strawberry = $_POST['strawberry'];
        $blueberry = $_POST['blueberry'];
        $delivery_date = $_POST['delivery_date'];
        
        
        $_SESSION['sprinkles'] = $sprinkles;
        $_SESSION['chocolate'] = $chocolate;
        $_SESSION['caramel'] = $caramel;
        $_SESSION['raspberry'] = $raspberry;
        $_SESSION['strawberry'] = $strawberry;
        $_SESSION['blueberry'] = $blueberry;
        $_SESSION['delivery_date'] = $delivery_date;


        $sprinkleprice = $sprinkles * 1;
        $chocolateprice = $chocolate * 1.2;
        $caramelprice = $caramel * 1;
        $raspberryprice = $raspberry * 0.8;
        $strawberryprice = $strawberry * 0.8;
        $blueberryprice = $blueberry * 0.8;
        $total_price = $sprinkleprice + $chocolateprice + $caramelprice + $raspberryprice + $strawberryprice + $blueberryprice;

        $_SESSION['total_price'] = $total_price;  
        
        header("Location: payment.html");
        ?>


</body>
</html>