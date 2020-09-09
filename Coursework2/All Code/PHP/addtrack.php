<?php 
require_once 'constants.php';
$dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$newrecord = "";
if(isset($_POST['submitted'])) {
    $cdID = $_POST['cdID'];
    $trackTitle = $_POST['trackTitle'];
    $trackDuration = $_POST['trackDuration'];
    $sqlinsert = "INSERT INTO track (cdID,trackTitle,trackDuration) VALUES ('$cdID','$trackTitle','$trackDuration')";
    
    if(!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
    }
        $newrecord = "1 record added to the database";
}

?>
<html>
    <head>
         <header>
            Coursework 2
        </header>
        <title>Add Track</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php include "header.php"; ?>
        <section>
          <h1>Add New Track</h1>
        <form method="post" action="addtrack.php">
        <input type="hidden" name="submitted" value="true"/>
            <fieldset>
            <legend>New Track</legend>
            <label>cdID <input type="text" name="cdID"/></label>
                <br>
            <label>trackTitle: <input type="text" name="trackTitle"/></label>
                <br>
            <label>trackDuration: <input type="text" name="trackDuration"onkeypress='return event.charCode >= 48 && event.charCode <= 57'/></label>
            </fieldset>
            <br>
            <input type="submit" value="Add Track"/>
        </form>
        <form>
            <input type="button" value="Return to Tracks Page" onclick="window.location.href='../trackspage.php'" />
        </form>
        </section>
        <?php
        echo $newrecord;
        ?>
        
    </body>
    
</html>