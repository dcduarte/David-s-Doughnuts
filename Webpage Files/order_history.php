<?php
 session_start();// important function to allow session variables  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order History</title>
    <link  rel="stylesheet" href="stylesheet.css" >  

</head>
<body>
<img src="david's_doughnuts.png" alt="Logo" width="200">
<h2>Order History</h2>
<?php
        
        //database connection variables for a typical local development
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "davids_doughnuts"; //database name that you have already created that you want to connect to
        try {      
                $customer_email = $_SESSION["user_email"];

                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $conn->prepare("SELECT * FROM orders WHERE email = ?");
                $sql -> bindValue(1, "$customer_email");
                $sql -> execute();

                echo "<div>
                <table border=1>
                <tr>
                <th>Order ID:</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Sprinkles</th>
                <th>Chocolate</th>
                <th>Caramel</th>
                <th>Raspberry</th>
                <th>Strawberry</th>
                <th>Blueberry</th>
                <th>Total</th>
                <th>Delivery</th>
                </tr>
                </div>";

                if($sql->rowCount()) {

                    while ($row = $sql->fetch()) //loop through the results to display them on screen
                    {
                        echo "<tr>";
                        echo '<td> ' . $row['order_id'] . '</td>';
                        echo '<td> ' . $row['name'] . '</td>';
                        echo '<td> ' . $row['email'] . '</td>';
                        echo '<td> ' . $row['sprinkles'] . '</td>';
                        echo '<td> ' . $row['chocolate'] . '</td>';
                        echo '<td> ' . $row['caramel'] . '</td>';
                        echo '<td> ' . $row['raspberry'] . '</td>';
                        echo '<td> ' . $row['strawberry'] . '</td>';
                        echo '<td> ' . $row['blueberry'] . '</td>';
                        echo '<td> £' . $row['total_price'] . '</td>';
                        echo '<td> '.$row['delivery_date'].'</td>';
                        echo "</tr>";
                    }
        
        echo"</table>";
            
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
    <form action="login_2_customer.html">
        <input type="submit" value="Previous Page">
    </form>
</body>
</html>