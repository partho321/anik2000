<?php 

require_once ('model/model.php');

function fetchAllUsers(){
	//echo 'success';
	return showAllUsers();

}
function fetchUsers($username){
	return showUsers($username);

}


function fetchUsersByEmail($email){
	return showUsersByEmail($email);

}

function fetchAllBooks(){
	//echo 'success';
	return getAllBooks();

}

function fetchBook($bookName){
	return getBook($bookName);

}

function fetchSearch($productName){
	return search($productName);

}



?>