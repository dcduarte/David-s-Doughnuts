<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit my account</title>
        <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
    <!--4. Complete this form and populate the remaining input values. Firstname has been done for you-->
    <img src="david's_doughnuts.png" alt="Logo" width="200">
    <div>
    <p>Edit your account details</p>
    <form action="edit_user_student.php" method ="POST">
        <label for="user_name">Name</label>
        <input type="text" name="user_name" id="user_name" required value="<?php echo $user_name;?>">
        <br>
        <label for="user_email">Email</label>
        <input type="text" name="user_email" id="user_email" required value="<?php echo $user_email;?>">
        <br>
        <label for="user_address">Address</label>
        <input type="text" name="user_address" id="user_address" required value="<?php echo $user_address;?>">
        <br>
        <label for="user_password">Password</label>
        <input type="password"  name="user_password" required id="user_password">
        <br>
        <label for="user_confirm_password">Confirm password</label>
        <input type="password" name="user_confirm_password" required id="user_confirm_password">
        <br>
        <input type="submit" value="Edit my account">
    </form>
    <?php
        $session_type = $_SESSION['login'];
       if ($session_type == 'admin'){
           echo "<form action='login_2_admin.html'>
           <input type='submit' value='Go Back'>
           </form>
           ";
       }

       elseif ($session_type == 'customer'){
        echo "<form action='login_2_customer.html'>
        <input type='submit' value='Go Back'>
        </form>
        ";
    }

    ?>
    </div>

    
</body>
</html>