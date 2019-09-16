<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Admin Registration</title>
</head>
<body>
<img src="david's_doughnuts.png" alt="Logo" width="200">
  <!--INSERT DATA-->  
    <div>
    <form action="sql_insert_admin.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" required>
        <br />
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" required>
        <br />
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <br />
        <label for="address">Address: </label>
        <input type="text" id="address" name="address" required>
        <br />
        <input type="submit" value="Register">
    </form>
    <form action='login_2_admin.html'>
           <input type='submit' value='Go Back'>
           </form>
           
</div>
</body>
</html>