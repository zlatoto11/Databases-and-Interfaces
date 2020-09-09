<?php 
require_once 'constants.php';
$dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$newrecord = "";
if(isset($_POST['submitted'])) {
    $artName = $_POST['artName'];
    $sqlinsert = "INSERT INTO artist (artName) VALUES ('$artName')";
    
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
        <title>Artists</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
        <script>
        
             function AddArtistValidation(){
          var x=document.forms["AddArtist"]["artName"].value;
           if(x==null||x==""){
               alert("Search cannot be empty");
       } 
        }
        
        
        </script>
    </head>
    <body>
        <?php include "header.php"; ?>
        <section>
         <h1>Add New Artist</h1>
        <form name= "AddArtist" onsubmit="AddArtistValidation()" method="post" action="addartist.php">
        <input type="hidden" name="submitted" value="true"/>
            <fieldset>
            <legend>New Artist</legend>
            <label>Artist Name: <input type="text" name="artName"/></label>
            </fieldset>
            <br>
            <input type="submit" value="Add Artist"/>
        </form>
         <form>
            <input type="button" value="Return to Artist Page" onclick="window.location.href='../artistpage.php'" />
        </form>
            <?php
        echo $newrecord;
        ?>
        </section>
        
    </body>
    
</html>