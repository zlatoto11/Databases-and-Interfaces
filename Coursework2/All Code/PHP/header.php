<?php

require_once 'Membership.php';
$membership = new Membership();
$membership->confirm_Member();

?>

<html>
    <head>
         <title> DBI Coursework 2</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
        <style>
</style>
        
    </head>
    <body>
             <div class="banner"></div>
        <center> <ul>
            <li><a style="width: 19.6%;" href="http://localhost/ActualCoursework/home.php">Home</a></li>
            <li><a style="width: 19.6%;" href="http://localhost/ActualCoursework/artistpage.php">Artist</a></li>
            <li><a style="width: 19.6%;" href="http://localhost/ActualCoursework/albumspage.php">Albums</a></li>
            <li><a style="width: 19.6%;" href="http://localhost/ActualCoursework/trackspage.php">Tracks</a></li>
            <li><a style="width: 19.6%;" href="http://localhost/ActualCoursework/PHP/login.php?status=loggedout">Log Out</a></li>
        </ul> </center>      
        
    </body>
</html>
