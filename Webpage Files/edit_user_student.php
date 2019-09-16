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
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form and edited their information
            {
                //UPDATE SECTION

                //1. Put a conditional statement here to check if password matches confirm password. If it does not then display an error

                $user_password = $_POST['user_password'];
                $confirm_user_password = $_POST['user_confirm_password'];

                if ($user_password == $confirm_user_password){
               
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //2. Save the value of the ID of the user we are logged in with by reading the session
                $user_id = $_SESSION["user_id"];           
                //3. Save the POST values of the form to local variables to use in the UPDATE statement
                $user_name = $_POST["user_name"];
                $user_address = $_POST["user_address"];
                $user_email = $_POST["user_email"];
                //4. Complete the UPDATE statement to include all of the fields
                $sql = $conn->prepare("UPDATE users SET email = ?, name = ?, password = ?, address = ? WHERE user_id =?");
                 //5. Bind the rest of the values needed
                $sql -> bindValue(1, "$user_email"); //we bind this variable to the first ? in the sql statement
                $sql -> bindValue(2, "$user_name");
                $sql -> bindValue(3, "$user_password");
                $sql -> bindValue(4, "$user_address");
                $sql -> bindValue(5, "$user_id");
               
                $sql -> execute(); //execute the statement     
                //6. Display a message to the user to say UPDATE has been successful


                $session_type = $_SESSION['login'];
                
            if ($session_type == 'admin'){
                header("refresh:5;login_2_admin.html");
            }
            elseif ($session_type == 'customer'){
                header("refresh:5;login_2_customer.php");

            }
                echo "<img src='dd.png' alt='Logo' width='200'>";
                echo "<div>";
                echo "Details changed sucessfully";
                echo "<br>";
                echo "The page will refresh automatically";
                echo "</div>";
            }
            else{
                header("refresh:5;edit_user_student.php");
                echo "<img src='dd.png' alt='Logo' width='200'>";
                echo "<div>";
                echo "Passwords don't match";
                echo "<br>";
                echo "The page will refresh automatically";
                echo "</div>";
            }
            }
            else{
                //SELECT part

                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //1. Save the value of the ID of the user we are logged in with by reading the session
                $user_id = $_SESSION["user_id"];  
                //2. Create an SQL statement that SELECTS all from a user table where the user id = the id of the person logged in
                $sql = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
                $sql -> bindValue(1, "$user_id");
                $sql -> execute(); //execute the statement

                $row = $sql->fetch();

                
                //3. Store the values of the $row array so you can populate the HTML form
                $user_name = $row['name'];
                $user_email = $row['email'];
                $user_address = $row['address'];


                include "edit_user_form_student.php";
            }

                
                
            
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>


</body>
</html>