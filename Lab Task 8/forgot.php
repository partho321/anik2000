<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        require_once 'controller/readData.php';

        $Email = fetchUsersByEmail($_REQUEST['forgotEmail']);

        //echo "success";


    }

?>



<?php 
                $emailErr = "";

                if(isset($_POST['forgotEmail'])){

                       if(isset($Email["Email"]) && $_POST['forgotEmail']==$Email["Email"] && !empty($_POST['forgotEmail']))
                       { 

                        $_SESSION['tempEmail']=$_POST['forgotEmail'];

                        header('location:forgotOk.php');
                       }else
                          $emailErr="Please Enter a Valid  email";
                }
?>

<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>

<style>
.error {color: #FF0000;}
</style>

<center>
<p><br></p><p><br></p>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Enter Your  Email:
        <input type="text"  name="forgotEmail" id="email" onkeyup="emailVal()"><input type="submit" value="Check">
        <span class="error" id="emailErr">* <?php echo $emailErr;?></span><br><br>
        <p><br></p><p><br></p><p><br></p>
    </form>



</center>

  

<body>

</body>

<script type="text/javascript" src="javascript/registration.js"></script>


<?php include('footer.php')?>


</html>