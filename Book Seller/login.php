
<?php
    session_start();

    if(isset($_POST["submit"])){

        $_SESSION['username'] = $_REQUEST['username'];
        $_SESSION['password'] = $_REQUEST['password'];
        
    }


?>


<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<head>
    <title>Login</title>
</head>

 <?php include('header.php'); ?>

<?php
    $username = $password = "";
    $usernameErr = $passwordErr = "";
    $check = $flag= 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //username validation
        if (empty($_POST["username"])) {
            $usernameErr = "Name is required";
          } 
        else
        {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "Must contain at least two characters and alpha numeric characters, (@),(-),(_)";
          }
          else
            $check++; 
        }


        //password validation
        if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
              } 
        else
        {
              $password = test_input($_POST["password"]);
              //validating alphabet
              if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$password)) {
                $passwordErr = "Minimum (8) characters need  one special characters (@, #, $, %)";
              }
              else
                $check++; 
        }

        if($check==2){   

            $_SESSION['username'] = $_REQUEST['username'];
            $_SESSION['password'] = $_REQUEST['password'];

            $data = file_get_contents("info.json");  

                $data = json_decode($data, true);  

                foreach($data as $row)  
                {  
                     if($_SESSION['username']==$row["User Name"] && $_SESSION['password']==$row["Password"])
                     {  
                            $flag=1;
                            if(!empty($_POST["remember"])) {
                                setcookie ("username",$_POST["username"],time()+ 120);
                                setcookie ("password",$_POST["password"],time()+ 120);
                                //echo "<h1>Cookies Set Successfuly</h1>";
                            } 
                            else {
                                setcookie("username","");
                                setcookie("password","");
                                //echo "<h1>Cookies Not Set</h1>";
                            }
                            header('location:homepage2.php');
                     }else
                            $flag=0;

                }

                if($flag==0)    
                            echo '<h2 style="color: red;" >Erro Password and login fail </h2>';

                }



        }
                

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend><h1>Login</h1></legend>
    
    <fieldset>
        <legend><h2>User Name</h2></legend> 
            <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br><br>
            <span class="error">* <?php echo $usernameErr;?></span><br><br>
    </fieldset>

    <fieldset>
        <legend><h2>Password</h2></legend>  
            <input type="text" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br><br>
            <span class="error">* <?php echo $passwordErr;?></span><br><br>
    </fieldset>
            <input type="checkbox" id="remember" name="remember" value="remember">
            <label for="remember"> Remember me</label><br><br><br>
            
            <input type="submit" value="submit">&nbsp;&nbsp;
            <a href="forgot.php"> Forgot Password<a><br><br>
    
  </fieldset>
</form>




<body>



</body>

<?php include('footer.php')?>
</html>