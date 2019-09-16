<?php
session_start(); // important function to allow session variables  
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
//database connection variables for a typical local development
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "davids_doughnuts"; //database name that you have already created that you want to connect to
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $order_id = $_GET['order_id'];
            $order_status = $_POST['order_status']; // your search keyword from the search form
            
            //preparing an sql statement to seach field1 and field 2 for whatever the user searches for
            $sql = $conn->prepare("UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id'");
           

            $sql -> execute(); //execure the statement

            header("refresh:3;view_orders.php");
            echo "<div>";
            echo "Change sucessfull";
            echo "</div>";

        }
           
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
            ?>
</body>
</html>