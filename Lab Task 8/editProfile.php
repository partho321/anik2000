

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
.error {color: #394393;}
.error2 {color: #FF0000;}


</style>
<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $usernameErr = "";

    $name = $email = $username = "";

    $check=0;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //name validation//name validation//name validation
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } 
          else {
            $name = test_input($_POST["name"]);
            //validating alphabet
            if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
              $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
            }
            else
              $check++;
              //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
          }




        //email validation//email validation//email validation
        
          if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } 
          else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Must be a valid email_address : anything@example.Com";
            }
            else
              $check++;
          }
          




          //username username   
          if (empty($_POST["username"])) {
            $usernameErr = "username is required";
          } 
          else 
          {
              $username = test_input($_POST["username"]);
              //validating alphabet
              if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
                $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
              }
              else
                $check++;
          }


    }


    if($check==3){

        $data = file_get_contents("info.json");  

        $data = json_decode($data, true); 


        foreach($data as $row => $value)  
        {  

            if($value['User Name']==$_SESSION['username'])
            {  
                $data[$row]['Name'] = $_POST["name"];
                $data[$row]['Email'] = $_POST["email"];
                $data[$row]['User Name'] = $_POST["username"];
                //echo 'success';
                $msg="Profile has updated";
                file_put_contents('info.json', json_encode($data));
                $_SESSION['username']=$_POST["username"];
                break;
                
            }else
                //echo 'failed';
                $msg="sorry the Profile has not updated yet";
                

        }


    }

    //data fetch  //data fetch  //data fetch  //data fetch 

    $current_data = file_get_contents('info.json');  
    $array_data = json_decode($current_data, true); 

    foreach($array_data as $row)  
    {  
        if($_SESSION['username']==$row["User Name"] && $_SESSION['password']==$row["Password"]){


        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



 
?>


<body>


    <fieldset align="center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <br><br><h1 align = 'center' style='color: #5D006F;' >Edit Profile Information<br><br></h1>
            <h2 class="error" align = "center">Profile Name : <input type='text' name='name' value="<?php echo $row["Name"] ?>"></h2>
            <span class="error2">* <?php echo $nameErr;?></span>
            <h2 class="error" align = "center">Email Address :<input type='text' name='email'value="<?php echo $row["Email"] ?>" ></h2>
            <span class="error2">* <?php echo $emailErr;?></span>
            <h2 class="error" align = "center">User Name : <input type='text' name='username' value="<?php echo $row["User Name"] ?>"></h2>
            <span class="error2">* <?php echo $usernameErr;?></span>
            <h2 class="error" align = "center">Date of Birth : <?php echo $row["dob"];?></h2>
            <h2 class="error" align = "center">Gender : <?php echo $row["gender"];?></h2>
            <h2 class="error" align ="center"><input type='submit' value='Update'></h2>
        </form>
    </fieldset>
</body>


  <?php include('footer.php')?>

  </html>