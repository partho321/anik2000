

<?php

    session_start();
     
    require_once '../model/model.php';


     $data['password']                 =     $_SESSION['newpassword'];
     $data['email']                    =     $_SESSION['tempEmail'];


    if (updatePassword($data)) {
        //echo 'Successfully updated!!';
        header('location:../passwordOk.php');

    } else {
        echo 'You are not allowed to access this page.';    
    }
            
?>