<?php
#store the information of the product into variables
include('session.php');
$user = $_SESSION['login_user'];
$productname = $_POST['productname'];
$productprice =$_POST['productprice'];
$description = $_POST['description'];
$genre = $_POST['genre'];







	#add slashes to the file and store it as a file type and connect to the database
	$images = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$conn = mysqli_connect("localhost", "root", "", "gamertrade");
	if(mysqli_connect_error()){
		die('connect error('. mysqli_connect_error().')'. mysqli_connect_error());


	}
	else{
		#insert into the database the values specified by the user
		$items = "INSERT INTO items (productname, productprice, description, genre, images, username) VALUES ('$productname','$productprice','$description','$genre','$images','$user')";
		
		
	}

	#connect to database and perform query, if true redirect back to the userprofile
	if ($conn->query($items) === TRUE) 
	{

		header("Location: userprofile.php");
    
	} 
	else 
	{
    echo "Error";
 	}
 	
	




?>