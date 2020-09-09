<?php
require_once 'PHP/constants.php';

//$sqlString = "SELECT COUNT(DISTINCT cd.cdID),COUNT(DISTINCT track.trackID),COUNT(DISTINCT artist.artID) FROM cd,track,artist;";

if ($stmt = $dbcon->prepare("SELECT COUNT(DISTINCT cd.cdID),COUNT(DISTINCT track.trackID),COUNT(DISTINCT artist.artID) FROM cd,track,artist;")) //used to count variables
{
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($cdNum,$trackNum,$artNum);

    /* fetch values */
    while ($stmt->fetch()) {
        //printf("%s %s %s \n", $cdNum,$trackNum,$artNum); //print out to test if it works
    }

    /* close statement */
    $stmt->close();
}

//$stmt = $sqlString;

//$stmt->execute();

//$stmt->bind_result($cdNum,$trackNum,$artNum);
//$stmt->fetch();
?>

<!DOCTYPE html>
<html>
    <head>
         <header>
            Coursework 2
        </header>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
           <?php include "PHP/header.php"; ?>
        
        <section> 
            <div id="content">
            <h2>Database Metrics</h2>
              <p>Number of Artists: <?php echo htmlentities($artNum);?></p>
                <p>Number of CDs: <?php echo htmlentities($cdNum);?></p>
                <p>Number of Tracks: <?php echo htmlentities($trackNum);?></p>
            </div>
        </section>     
    </body>
</html>
