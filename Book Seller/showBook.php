

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>


<!DOCTYPE html>
<html>
<style>

</style>
<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php

    $current_data = file_get_contents('bookList.json');  
    $array_data = json_decode($current_data, true);  

    echo "<p><br></p><p><br></p><h1 align='center'>Book Details</h1><table align='center' border='7px' style='padding:5px;'>
        <tr>
             <th>Tile</th>
             <th>Author Name</th>
             <th>Edition</th>
             <th>Added Date</th>
             <th>Publish Date</th>
             <th>Genre</th>
         </tr>";

    foreach($array_data  as $row)  
        {  
        
             echo "

             <tr>
                 <td>
                    <h3  align = \"center\">".$row["Title"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["Author Name"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["Edition"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["Adding Date"]."</h3>
                 </td>


                 <td>
                    <h3  align = \"center\">".$row["Publish Date"]."</h3>
                 </td>


                 <td>
                    <h3  align = \"center\">".$row["Genre"]."</h3>
                 </td>

            </tr>
            
             ";

            
        }

        echo '</table><p><br></p><p><br></p><p><br></p>';

 
?>


<body>















</body>


  <?php include('footer.php')?>

  </html>