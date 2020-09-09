<?php

if(isset($_POST['search'])) //check to see if button pressed
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    $query = "SELECT * FROM `artist` WHERE CONCAT(`artID`, `artName`) LIKE '%".$valueToSearch."%'"; // search for all values to begin with , then whatever input into search bar
    $search_result = filterTable($query);   //Search table
    
}
 else {
    $query = "SELECT * FROM `artist`";  //All values
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "psyzk");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_POST['delete'])){
    $delete = $_POST['delete'];
    $deletequery = "DELETE FROM artist WHERE artID =".$delete."";   // delete button matches the id of the row to the id in the database and deletes it
    $del = filterTable($deletequery);
    header("location: artistpage.php"); //transfers to page
}




?>

<!DOCTYPE html>
<html>
    <head>
         <header>
            Coursework 2
        </header>
        <title>Artists</title>
        <link rel="stylesheet" type="text/css" href="./CSS/main.css">
        
        <script>
            
            
            
            
        function SearchValidation(){
            var x=document.forms["SearchForm"]["valueToSearch"].value;
            if(x==null||x==""){ //JS checks if box is empty
                alert("Search cannot be empty");
            }
            
        }
            
            
            
            
        </script>
    </head>
    <body>
           <?php include "PHP/header.php"; ?>   <!-- Main style include -->
        <section> 
            <h3 style="font-size: 50px;">Artists Database</h3>
             <form name="SearchForm" onsubmit="SearchValidation()" action="artistpage.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search Value"><br><br>
            <input type="submit" name="search" value="Search"><form>
            <input type="button" value="Reset Search" onclick="window.location.href='artistpage.php'" />
        </form><br><br>
            <h1>Artists in Database:</h1>
            <table>
                <tr>
                    <th>artID</th>
                    <th>artName</th>
                    <th>Alter Contents</th>
                </tr>

      <!-- populate table from mysql database + row by row search -->
                <?php while($row = mysqli_fetch_array($search_result)):?>   
                <tr>
                    <td><?php echo $row['artID'];?></td>
                    <td><?php echo $row['artName'];?></td>
                    <td>
                    <form method='POST'>
                        <button value = "<?php echo $row['artID'] ?>" name ='delete'> <!--Row is the id of artID--> Delete </button>
                        </form> 
                    </td>
                <?php endwhile;?>
            </table>
        </form>
            <br>
         <form>
            <input type="button" value="Add Artist" onclick="window.location.href='PHP/addartist.php'" />
        </form>
        </section>
       
        
    </body>
</html>
