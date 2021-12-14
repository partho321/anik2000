<?php 

require_once 'db_connect.php';


function showAllUsers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showUsers($username){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addUsers($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO user_info( Name ,Email, Dob, Gender, User_Name, Password)
VALUES (:Name,:Email,:Date_Of_Birth,:Gender,:User_Name, :Password)";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Name'                =>    $data['Name'],
            ':Email'              =>   $data['Email'],
            ':Date_Of_Birth'     =>     $data['Dob'], 
            ':Gender'           =>     $data['Gender'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password']
            //':image'       => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function showUsersByEmail($email){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` where Email = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$email]);
        //echo "success";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function updatePassword($data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Password = ?  where Email = ?";

    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            $data['password'],
            $data['email']
            
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}




function addBooks($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO book_info( Title ,Author_Name, Edition,Adding_Date, Publish_Date, Genre)
VALUES (:Title,:Author_Name,:Edition,:Adding_Date,:Publish_Date, :Genre)";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Title'                =>    $data['Title'],
            ':Author_Name'              =>   $data['Author_Name'],
            ':Edition'     =>     $data['Edition'],
            ':Adding_Date'           =>     $data['Adding_Date'],  
            ':Publish_Date'           =>     $data['Publish_Date'],     
            ':Genre'      =>     $data['Genre']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateBook($data){
    $conn = db_conn();
    $selectQuery = "UPDATE book_info set  Author_Name = ?,  Edition = ?,  Publish_Date = ?,  Genre = ? where Title = ?";

    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            
            $data['Author_Name'],
            $data['Edition'],
            $data['Publish_Date'],
            $data['Genre'],
            $data['Title']
            
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function getAllBooks(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `book_info` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function getBook($username){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `book_info` where Title = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

?>




