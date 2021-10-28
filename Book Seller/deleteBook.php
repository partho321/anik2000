

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

 <?php include('header2.php')?>

<style>
.error {color: #394393;}


</style>

<p><br></p><p><br></p>
		
<p><br></p><p><br></p>
<p><br></p><p><br></p>

<p><br></p><p><br></p>


<body>





</body>


  <?php include('footer.php')?>

  </html>