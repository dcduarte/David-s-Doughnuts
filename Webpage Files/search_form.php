<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Forms</title>
    <link  rel="stylesheet" href="stylesheet.css" >  

</head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getorders.php?q="+str,true);
  xmlhttp.send();
}
</script>
<body>
<img src="david's_doughnuts.png" alt="Logo" width="200">
    <!--TEXTFIELD SEARCH-->     
  <div>
    <form action="sql_select_search_textbox.php" method="POST">
        <p>Enter the Customer name below to search for orders</p>
        <label for='name_search'>Customer Name: </label>
        <input type="text" id="name_search" name="name_search" required>
        <br>       
        <input type="submit" value="Search">
        <p>----------------------------------------------------------------------</p>
    </form>
    <br>












  <!--DATE SEARCH-->  
    <form action="sql_select_search_datepicker.php" method="POST">
        <p>Enter the Customer name below to search for orders</p>
        <label for='date_search'>Delivery Date: </label>
        <input type="date" id="date_search" name="date_search" required>
        <br>       
        <input type="submit" value="Search">
        <p>----------------------------------------------------------------------</p>
    </form>









<!--DROPDOWN SEARCH, SUBMIT METHOD-->
    <form action="sql_select_search_dropdown.php" method="POST">
        <p>Select the customer name</p>
        <select id="name_dropdown" name="name_dropdown">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "davids_doughnuts";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("SELECT name, order_id FROM orders");

    $sql -> execute();
    
    if($sql->rowCount()) {

        while ($row = $sql->fetch()) //loop through the results to display them on screen
        {
            echo '<option value="' .  $row['order_id']  . '">' . $row['name'] . '</option><br>';

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
</select>
<input type="submit" value="Search">
<p>----------------------------------------------------------------------</p>

</form>













<!--DROPDOWN SEARCH, AJAX METHOD-->
<form>
        <p>Select the customer name(AJAX Dropdown)</p>
        <select id="name_dropdown" name="name_dropdown" onchange="showUser(this.value)">
        <option value="">Select a customer</option>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "davids_doughnuts";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("SELECT name, order_id FROM orders");

    $sql -> execute();
    
    if($sql->rowCount()) {

        while ($row = $sql->fetch()) //loop through the results to display them on screen
        {
            echo '<option value="' .  $row['order_id']  . '">' . $row['name'] . '</option><br>';

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
</select>
<div id="txtHint"><b>Customer information will be listed here.</b></div>
    </form>
</div>
<div>
<form action="login_2_admin.html">
        <input type="submit" value="Go back">
    </form>
    </div>
          </div>
</body>
</html>