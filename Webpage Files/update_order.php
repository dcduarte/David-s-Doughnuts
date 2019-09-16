<?php
session_start(); // important function to allow session variables  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Orders</title>
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
            //preparing an sql statement to seach field1 and field 2 for whatever the user searches for
            $sql = $conn->prepare("SELECT * FROM orders WHERE order_id LIKE ? ");
            $sql -> bindValue(1, "%$order_id%"); //we bind this variable to the first ? in the sql statement
            $sql -> execute(); //execure the statement
            
           

            
            if($sql->rowCount()) { //check if we have results by counting rows
                while ($row = $sql->fetch()) //loop through the results to display them on screen
                    {
                        if($row['order_status'] == 'processing'){
                            $processing_status = 'selected = "selected"';

                        }else{
                            $processing_status = '';
                        }
            
                        if($row['order_status'] == 'boxed'){
                            $boxed_status = 'selected = "selected"';
                        }else{
                            $boxed_status = '';
                        }
            
                        if($row['order_status'] == 'delivered'){
                            $delivered_status = 'selected = "selected"';
                        }else{
                            $delivered_status = '';
                        }

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
                        echo '
                        <form action="update_order_statment.php?order_id='.$row['order_id'].'" method="POST">
                        <input type="hidden" name="order_id" value="'.$order_id.'">
                        <label for="order_status">
                        <select id="order_status" name="order_status">
                            <option value="processing" '.$processing_status.'>Processing</option>
                            <option value="boxed" '.$boxed_status.'>Boxed</option>
                            <option value="delivered" '.$delivered_status.'>Delivered</option>
                        </select>
                        <input type="submit" value="Update">
                        </form>';
                        


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