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

            $sql = $conn->prepare("SELECT SUM(total_price) AS total FROM orders");
            $sql -> execute();

            $row = $sql->fetch();
            
           $total_income = $row['total'];

           echo '<img src="dd.png" alt="Logo" width="200">';
           echo '<div>';
           echo 'Total Order Income: ';
           echo '<br>';
           echo '£'. $total_income;
           echo "<form action='login_2_admin.html'>
           <input type='submit' value='Go Back'>
           </form>
           ";
           echo '</div>';

        
        }
        
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }

            ?>
</body>
</html>