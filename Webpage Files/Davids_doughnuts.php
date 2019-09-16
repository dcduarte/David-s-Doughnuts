<?php
session_start(); // important function to allow session variables  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>David's Doughnuts</title>
</head>

<body>

<img src="david's_doughnuts.png" alt="Logo" width="200">
  <!--INSERT DATA-->  
    <div>
    <form action="sql_order_variables.php" method="POST">
        
        <label for="sprinkles">Sprinkles - £1</label>
        <input type="number" max="12" id="sprinkles" name="sprinkles" required min="0" max="12" value="0">
        <br />
        <label for="chocolate">Chocolate - £1.20</label>
        <input type="number" max="12" id="chocolate" name="chocolate" required min="0" max="12" value="0">
        <br />
        <label for="caramel">Caramel - £1</label>
        <input type="number" max="12" id="caramel" name="caramel" required min="0" max="12" value="0">
        <br />
        <label for="raspberry">Raspeberry - 80p</label>
        <input type="number" max="12" id="raspberry" name="raspberry" required min="0" max="12" value="0">
        <br />
        <label for="strawberry">Strawberry - 80p</label>
        <input type="number" max="12" id="strawberry" name="strawberry" required min="0" max="12" value="0">
        <br />
        <label for="blueberry">Blueberry - £1</label>
        <input type="number" max="12" id="blueberry" name="blueberry" required min="0" max="12" value="0">
        <br />
        <label for='delivery_date'>Delivery Date: </label>
        <input type="date" id="delivery_date" name="delivery_date" required>
        <br />
        <input type="submit">
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
