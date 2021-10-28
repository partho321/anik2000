

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
.error {color: #FF0000;}
</style>


<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php


    // define variables and set to empty values
    $titleErr = $authornameErr = $genreErr = $publishDateErr= $editionErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr = "";

    $title = $edition = $authorname = $genre = $publishDate = $degree2 = $degree3 = $degree4= $bloodgroup =$newpass = $renewpass = $username = "";
    $msg="";

    $check=0;

    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //title validation//title validation//title validation
      if (empty($_POST["title"])) {
        $titleErr = "Title is required";
      } 
      else {
        $name = test_input($_POST["title"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $titleErr = "Contain a-z, A-Z  and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }



      //title validation//title validation//title validation
      if (empty($_POST["edition"])) {
        $editionErr = "Edition is required";
      } 
      else {
        $name = test_input($_POST["edition"]);
        //validating alphabet
        if (!preg_match("/^[0-9]+/",$name)) {
          $editionErr = "Only positice can allow";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }



       //authorname validation//author validation//author validation
      if (empty($_POST["authorname"])) {
        $authornameErr = "Author Name is required";
      } 
      else {
        $name = test_input($_POST["authorname"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $authornameErr = "Contain a-z, A-Z  and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }






      //gender validation//gender validation//gender validation

      if (empty($_POST["genre"])) {
        $genreErr = "Genre is required";
      } 
      else {
        $gender = test_input($_POST["genre"]);
        $check++;
      }
      

      //date validation //date validation//date validation//date validation
      if(empty($_POST["publishDate"])){
        $publishDateErr = " select up year, month, date ";
      }
      else{
        $check++;
      }






      //form changing 
      if ($check == 5) {

        $current_data = file_get_contents('bookList.json');  
        $array_data = json_decode($current_data, true); 

        $extra = array(  
            'Title'                 =>     $_REQUEST['title'],  
            'Author Name'             =>     $_REQUEST['authorname'],
            'Edition'      =>     $_REQUEST['edition'],  
            'Genre'     =>     $_REQUEST['genre'],
            'Adding Date'        =>     date("Y/m/d"),  
            'Publish Date'  =>     $_REQUEST['publishDate'],
        );  


        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('bookList.json', $final_data))  
        {  
             $message = " <label class='text-success'>File Appended  Success fully</p>"; 
             $msg="Book has added.";
        }    
        else  
        {  
            $error = 'JSON File not exits';  
            $msg="Book has not added";
        } 

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

        <fieldset>
            <legend> <h1 align='center'>Add Book <br><span class="error"><?php echo $msg; ?></span></h1></legend>
    
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    <legend><h1>Title :</h1></legend>
                            
                            <input type='text' name='title'><br><br>

                            <span class="error">* <?php echo $titleErr;?></span><br><br>
                </fieldset>

                <fieldset>
                    <legend><h1>Author Name</h1></legend>

                        <input type='text' name='authorname'><br><br>

                        <span class="error">* <?php echo $authornameErr;?></span><br><br>
                </fieldset>


                <fieldset>
                    <legend><h1>Edition</h1></legend>
                        <input type='text' name='edition'><br><br>

                        <span class="error">* <?php echo $editionErr;?></span><br><br>
                </fieldset>



                <fieldset>
                    <legend><h1>Publish Date</h1></legend>

                            <input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="publishDate"><br><br>


                            <span class="error">* <?php echo $publishDateErr;?></span><br><br>
                </fieldset>

                <fieldset>
                    <legend><h1>Genre</h1></legend>

                    <select name="genre" id="genre">
                                  <option value="">Select One</option>
                                  <option value="Comedy">Comedy</option>
                                  <option value="Horror">Horror</option>
                                  <option value="Romantic">Romantic</option>
                                  <option value="Historical">Historical</option>
                            </select><br><br>

                            <span class="error">* <?php echo $genreErr;?></span><br><br>
                </fieldset>


                <h1><input  type='submit' value='Add'></h1>
            </form>
        </fieldset>





</body>


  <?php include('footer.php')?>

  </html>