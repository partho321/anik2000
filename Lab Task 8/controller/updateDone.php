



<?php

    $q=$_GET["q"];
    

    function updateBook($data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?,  Email = ? where User_Name = ?";

    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            $data['Name1'],
            $data['email1'],
            $data['username']
            
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

  ?>
