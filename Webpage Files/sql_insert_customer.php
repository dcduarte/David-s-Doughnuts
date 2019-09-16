<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
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
        $customer_name = $_POST['name'];
        $passwordcus = $_POST['password'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        
        
    
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO users (name, email, password, user_id, user_type, address) VALUES ('$customer_name', '$email', '$passwordcus', 0, 'customer', '$address')"; // building a string with the SQL INSERT you want to run
            
            // use exec() because no results are returned
            $conn->exec($sql);
            
            header("refresh:5;login.html");
            echo "<div>";
            echo "Account created successfully"; // If successful we will see this
            echo "</div>";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
            }
        ?>


</body>
</html>