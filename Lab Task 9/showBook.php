

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



<body onload="getAllBooks()">



<b> <h1 align="center" >Book List</h1>


    <div align="center">Search <input type="text" name="search" id="search"  onkeyup ="showResultBook(this.value)"></div><br>

    <div  id="bookList" align="center" ></div>


</body>

<script type="text/javascript" src="javascript/ajax.js"></script>


  <?php include('footer.php')?>

  </html>