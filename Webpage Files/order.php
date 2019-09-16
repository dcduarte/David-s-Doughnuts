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

        $name = $_SESSION["user_name"];
        $email = $_SESSION["user_email"];
        $sprinkles = $_SESSION['sprinkles'];
        $chocolate = $_SESSION['chocolate'];
        $caramel = $_SESSION['caramel'];
        $raspberry = $_SESSION['raspberry'];
        $strawberry =  $_SESSION['strawberry'];
        $blueberry = $_SESSION['blueberry'];
        $delivery_date = $_SESSION['delivery_date'];
        $total_price = $_SESSION['total_price'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO orders (order_id, name, email, sprinkles, chocolate, caramel, raspberry, strawberry, blueberry, total_price, delivery_date ) VALUES (0, '$name','$email', '$sprinkles', '$chocolate', '$caramel', '$raspberry', '$strawberry', '$blueberry', '$total_price', '$delivery_date')"; // building a string with the SQL INSERT you want to run
            
            // use exec() because no results are returned
            $conn->exec($sql);
            
            echo $name;
            echo "<br>";
            echo "Price: £".$total_price;
            echo "<br>";
            echo "New table record created successfully"; // If successful we will see this
            header("refresh:5;login_2_customer.html");
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
            }
        ?>

</body>
</html>