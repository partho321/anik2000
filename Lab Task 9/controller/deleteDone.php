



<?php

    $q=$_GET["q"];
    


    $con = mysqli_connect('localhost','root','','book_shop');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="DELETE  FROM book_info WHERE Title ='$q'";
    echo '<h1>'.$q.'</h1>';
    $result = mysqli_query($con,$sql);

    
    if($result){
        echo '<h1>deleted</h1>';
    }
    
    
    

    mysqli_close($con);

  ?>