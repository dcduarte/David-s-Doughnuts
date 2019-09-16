<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <link  rel="stylesheet" href="stylesheet.css" >
</head>
<body>
<img src="david's_doughnuts.png" alt="Logo" width="200">

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
            
            
            
            //preparing an sql statement to seach field1 and field 2 for whatever the user searches for
            $sql = $conn->prepare("SELECT * FROM orders");
            $sql -> execute(); //execure the statement
            
            if($sql->rowCount()) { //check if we have results by counting rows
                while ($row = $sql->fetch()) //loop through the results to display them on screen
                    {
                        echo "<div>";
                        echo '<p class="f1">Order ID: ' . $row['order_id'] . '</p><br>';
                        echo 'Customer Name: ' . $row['name'] . '<br>';
                        echo 'Sprinkles: ' . $row['sprinkles'] . '<br>';
                        echo 'Chocolate: ' . $row['chocolate'] . '<br>';
                        echo 'Caramel: ' . $row['caramel'] . '<br>';
                        echo 'Raspberry: ' . $row['raspberry'] . '<br>';
                        echo 'Strawberry: ' . $row['strawberry'] . '<br>';
                        echo 'Blueberry: ' . $row['blueberry'] . '<br>';
                        echo 'Total Price: £' . $row['total_price'] . '<br>';
                        echo 'Delivery Date: '.$row['delivery_date'].'<br>';
                        echo 'Order Status: '.$row['order_status'].'<br>';
                        echo '<a href="update_order.php?order_id='.$row['order_id'].'"
                                class="button">Update order</a>';
                        echo "</div>";

                        echo '<hr><br>';

                        
                        
                    }
                }
            else
                {
                    echo 'no rows returned'; //message to display if the search returned no results
                }
               
            }
            
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>
</body>
</html>