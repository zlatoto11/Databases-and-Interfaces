<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `track` WHERE CONCAT(`trackID`, `cdID`, `trackTitle`, `trackDuration`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `track`";
    $search_result = filterTable($query);
}

if(isset($_POST['delete'])){
    $delete = $_POST['delete'];
    $deletequery = "DELETE FROM track WHERE trackID =".$delete."";
    $del = filterTable($deletequery);
    header("location: trackspage.php");
}
// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "psyzk");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
         <header>
            Coursework 2
        </header>
        <title>Tracks</title>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
         <script>
            
            
            
            
       function SearchValidation(){
          var x=document.forms["SearchForm"]["valueToSearch"].value;
           if(x==null||x==""){
               alert("Search cannot be empty");
       } 
        }
            
            

        </script>
    </head>
    <body>
        
           <?php include "PHP/header.php"; ?>
        <section> 
            <h3 style="font-size: 50px;">Tracks Database</h3>
            <form name="SearchForm" onsubmit="SearchValidation()" action="trackspage.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search Value"><br><br>
            <input type="submit" name="search" value="Search"><form>
            <input type="button" value="Reset Search" onclick="window.location.href='albumspage.php'" />
        </form><br><br>
                <h2>Tracks in Database:</h2>
            <table>
                <tr>
                    <th>trackID</th>
                    <th>cdID</th>
                    <th>trackTitle</th>
                    <th>trackDuration</th>
                    <th>Alter Contents</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['trackID'];?></td>
                    <td><?php echo $row['cdID'];?></td>
                    <td><?php echo $row['trackTitle'];?></td>
                    <td><?php echo $row['trackDuration'];?></td>
                    <td>
                    <form method='POST'>
                        <button value = "<?php echo $row['trackID'] ?>" name ='delete'> Delete </button>
                        </form> 
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
            <br>
         <form>
            <input type="button" value="Add Track" onclick="window.location.href='PHP/addtrack.php'" />
        </form>
        </section>
       
        
    </body>
</html>
