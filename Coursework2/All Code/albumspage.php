<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `cd` WHERE CONCAT(`cdID`, `cdTitle`, `cdPrice`, `cdGenre`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `cd`";
    $search_result = filterTable($query);
}

if(isset($_POST['delete'])){
    $delete = $_POST['delete'];
    $deletequery = "DELETE FROM cd WHERE cdID =".$delete."";
    $del = filterTable($deletequery);
    header("location: albumspage.php");
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
        <title>Albums</title>
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
            <h3 style="font-size: 50px;">Albums Database</h3>
             <form name="SearchForm" onsubmit="SearchValidation()" action="albumspage.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search Value"><br><br>
            <input type="submit" name="search" value="Search"><form>
            <input type="button" value="Reset Search" onclick="window.location.href='albumspage.php'" />
                 <div id='errorArea'>
				
				</div>
        </form><br><br> 
                <h2>Albums in Database:</h2>
            <table>
                <tr>
                    <th>cdID</th>
                    <th>cdTitle</th>
                    <th>cdPrice</th>
                    <th>cdGenre</th>
                    <th>Alter Contents</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['cdID'];?></td>
                    <td><?php echo $row['cdTitle'];?></td>
                    <td><?php echo $row['cdPrice'];?></td>
                    <td><?php echo $row['cdGenre'];?></td>
                    <td>
                    <form method='POST'>
                        <button value = "<?php echo $row['cdID'] ?>" name ='delete'> Delete </button>
                        </form> 
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
            <br>
         <form>
            <input type="button" value="Add CD" onclick="window.location.href='PHP/addalbum.php'" />
        </form>
        </section>
       
        
    </body>
</html>
