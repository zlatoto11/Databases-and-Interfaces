<?php 
require_once 'constants.php';
$dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$newrecord = "";
if(isset($_POST['submitted'])) {
    $artID = $_POST['artID'];
    $cdTitle = $_POST['cdTitle'];
    $cdPrice = $_POST['cdPrice'];
    $cdGenre = $_POST['cdGenre'];
    $sqlinsert = "INSERT INTO cd (artID,cdTitle,cdPrice,cdGenre) VALUES ('$artID','$cdTitle','$cdPrice','$cdGenre')";
    
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
        <title>Albums</title>
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
        
        
        
        <script>
        
             function AddArtistValidation(){
          var x=document.forms["AddAlbum"]["artID"].value;
           if(x==null||x==""){
               alert("Search cannot be empty");
       } 
        }
        
        
        </script>
        
        
    </head>
    <body>
        <?php include "header.php"; ?>
        <section>
         <h1>Add New Album</h1>
        <form name = "AddAlbum" onsubmit="AddAlbumValidation()" method="post" action="addalbum.php">
        <input type="hidden" name="submitted" value="true"/>
            <fieldset>
            <legend>New Album</legend>
            <label>artID: <input type="text" name="artID"/></label>
                <br>
            <label>cdTitle: <input type="text" name="cdTitle"/></label>
                <br>
            <label>cdPrice: <input type="text" name="cdPrice" onkeypress='return event.charCode >= 46 && event.charCode <= 57'></label>
                <br>
            <label>cdGenre: <input type="text" name="cdGenre"/></label>
            </fieldset>
            <br>
            <input type="submit" value="Add Album"/>
        </form>
<form>
            <input type="button" value="Return to Albums Page" onclick="window.location.href='../albumspage.php'" />
        </form>
        </section>
   
        <?php
        echo $newrecord;
        ?>
        
    </body>
    
</html>