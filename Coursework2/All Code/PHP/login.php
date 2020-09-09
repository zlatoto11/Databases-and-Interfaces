<?php
session_start();
require_once 'Membership.php';
$membership = new Membership();

if(isset($_GET['status']) && $_GET ['status'] == 'loggedout') {
    $membership->log_User_Out();
}
    
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
   $response = $membership->validate_User($_POST['username'], $_POST['pwd']);
}
?>

<html>
    <head>
        <title>Login to access database</title>
        <link rel="stylesheet" type="text/css" href="../CSS/login.css">
      <script type = "text/javascript" src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../JS/main.js"></script>
        
        <script>
            
        function submitFunction(){
            var x=document.forms["myForm"]["username"].value;
            var y=document.forms["myForm"]["pwd"].value;
            if(x==null||x==""||y==null||y==""){
                alert("Fields can not be left empty");
    }
        </script>
        
    </head>
    <body>
        <div id="login">
            
        <form name="myForm" onsubmit="submitFunction()" method="post" action="">
                <h2>Login<small> Enter your account details</small></h2>
                <p>
                    <label for="name">Username:</label>
                    <input type="text" name="username"/>
                </p>
                <p>
                    <label for="pwd">Password:</label>
                    <input type="password" name="pwd"/>
                </p>
                <p>
                    <input type="submit" id="submit" value="Login" name="submit"/>
                </p>
        </form>
        <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
        </div>
    </body>
</html>