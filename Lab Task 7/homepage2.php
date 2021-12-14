

<?php 

session_start();


if(isset($_SESSION['username'])){



}
else{

    header('location: login.php');
}

?>






<!DOCTYPE html>


<html lang="en">
<head>
    <title>Book E-Commerce</title>
</head>


 <?php include('header2.php')?>
<body>


    <fieldset>
        <legend><h1>Welcome</h1></legend>

        <p><br></p><p><br></p>
        <h3 align="center" >Hello, <?php echo $_SESSION['username'] ?> </span></h3>
        <h3 align="center" >A Warm Welcome</h3> 
        <h3 align="center" >To</h3>
        <h3 align="center" >XShop.com</h3>


    
    <p><br></p><p><br></p>
    </fieldset>
</body>

<?php include('footer.php')?>

</html>