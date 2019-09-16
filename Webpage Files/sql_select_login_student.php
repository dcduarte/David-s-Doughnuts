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
        
        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form
            {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
                $email = $_POST['email'];// email the user submitted from $_POST
                $password = $_POST['password'];// password the user submitted from $_POST
                
                //preparing an sql statement to search email and password for whatever the user has typed and be equal to an admin user
                $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                $sql -> bindValue(1, "$email"); //we bind this variable to the first ? in the sql statement
                $sql -> bindValue(2, "$password"); //we bind this value to the second ? in the sql statement
                $sql -> execute(); //execute the statement
   
                
                if($sql->rowCount()) 
                    { //check if we have results by counting rows
                        
                        $row = $sql -> fetch();

                        if ($row['user_type'] == 'admin'){
                            
                            $_SESSION["login"] = "admin";//set session login variable here

                            $_SESSION["user_name"] = $row['name'];
                            $_SESSION["user_email"] = $row['email'];
                            $_SESSION["user_id"] = $row['user_id'];

                            header('Location: login_2_admin.html'); //redirect the user to a page we want them to go to. 
                        }
                        else if ($row['user_type'] == 'customer'){
                            
                            $_SESSION["login"] = "customer";//set session login variable here
                           
                            $_SESSION["user_name"] = $row['name'];
                            $_SESSION["user_email"] = $row['email'];
                            $_SESSION["user_id"] = $row['user_id'];

                            header('Location: login_2_customer.html'); //redirect the user to a page we want them to go to. 
                        }
                    
                    
                    
                    
                    }
                else
                    {
                        header("refresh:5;login.html");
                        echo("Email/password combination does not exist. Try again"); //message to display if we did not match a user
                        echo("<br>");
                        echo("The page will refresh automaticaly");
                    }
                
            }
            else 
            {
               header("refresh:5;login.html");
               echo("Please login before accessing the page"); //message incase someone lands on this page without first accessing the login form
            }
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>


</body>
</html>