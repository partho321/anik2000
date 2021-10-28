

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

    $current_data = file_get_contents('info.json');  
    $array_data = json_decode($current_data, true);  
    /*$extra = array(  
         'Name'           =>     $_SESSION['name'],  
         'Email'         =>     $_SESSION['email'],
         'User Name'      =>     $_SESSION['username'],  
         'Password'     =>     $_SESSION['pass'],
         'dob'        =>     $_SESSION['dob'],  
         'gender'  =>     $_SESSION['gender'],
    );  
  */

    

    foreach($array_data as $row)  
        {  
            if($_SESSION['username']==$row["User Name"] && $_SESSION['password']==$row["Password"]){

             echo "<fieldset><legend>Profile Name </legend> <h3>".$row["Name"]."</h3></fieldset>";

             echo "<fieldset><legend>Email Address </legend> <h3>".$row["Email"]."</h3></fieldset>";

             echo "<fieldset><legend>User Name </legend><h3> ".$row["User Name"]."</h3></fieldset>";

             echo "<fieldset><legend>Date of Birth </legend><h3> ".$row["dob"]."</h3></fieldset>";

             echo "<fieldset><legend>Gender </legend><h3> ".$row["gender"]."</h3></fieldset>";

            }
        }



 
?>


<body>





</body>


  <?php include('footer.php')?>

  </html>