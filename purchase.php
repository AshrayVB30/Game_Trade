
<?php

$conn = mysqli_connect("localhost", "root", "", "gamertrade");
include('session.php');
#take the username from the session and store it into a variable and the id from the purchase in the session and store it into a variable
$user = $_SESSION['login_user'];
$id = $_SESSION['id'];


#select the id, product name, price, description, genre, username, and image where the id is selected from the session
	$sql = "SELECT id, productname, productprice, description, genre, username, images FROM items WHERE id = '$id'";

	$result = $conn-> query($sql);
	$row = $result->fetch_assoc();
	#store each of the information of the product into its own variable
	$name = $row['productname'];
	$productprice = $row['productprice'];
	$genre = $row['genre'];
	#take the username of the person selling the product and put it into a variable
	$user2 = $row['username'];
	$description = $row['description'];
  $shipping = $_POST['shipaddress'];
#check if the user logged in is the same person trying to make the purchase. If it is stop the transaction and send them an error
	if ($user == $user2) {
		?>
<style>.nav-item{
font-size: 20px;


}
.nav-link{
	color: white;
}


</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!doctype html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-black fixed-top bg-dark">
  <a class="navbar-brand" href="home.php" style="color: white;">GamerTrade</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <?php
      include("session.php");
      if(isset($_SESSION['login_user'])){
        echo "<a class='nav-link' href='userprofile.php'>User Profile</a>";
      }
      else{
        echo "<a class='nav-link' href='registration.php'>Sign up</a>";
      }
      ?>
      </li>
      <li class = "nav-item">
      <?php
      
      if(isset($_SESSION['login_user'])){
        echo "<a class ='nav-link' href='logout.php'> Logout</a>";
      }
      else{
        echo "<a class='nav-link' href='userlogin.php'>Sign in</a>";
      }
      ?>
      
    </li>
    </ul>
    <form action = 'search1.php' class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='submit-search'style='font-size: 20px; color: green; border-color: green;'>Search</button>

    </form>
  </div>
</nav>
<br>
<br>
<br>
<h1 style="text-align: center;">
  You cannot purchase an item you put up
</h1>
<?php
	}
	else{
		#if the user is not the same insert the information of the purchase into the buyer's history by copying the table from the item table so the image is transfered
		$sql2 = "INSERT INTO history(id, productname,productprice,description, genre, images) SELECT id, productname,productprice,description,genre,images FROM items WHERE id = $id";
		#after copying set the username to the user logged in based on id.
		$sql3 ="UPDATE history SET username='$user' WHERE id = $id "; 
		#insert into the sold database the product information by copying the information into sold from items table
		$sql4 = "INSERT INTO sold(id, productname, productprice, description, genre, images) SELECT id, productname, productprice, description, genre, images FROM items WHERE id = $id ";
		#update the sold table to the user who sold the item
		$sql5 = "UPDATE sold SET username = '$user2' WHERE id = $id";
		#Delete the item from the items table so another user will not buy it.
		$sql6 = "DELETE FROM items WHERE id = $id";
		#update the sold table with the shipping infomration and the user who bought it as well as the history table with the user who sold it.
    $sql7 = "UPDATE sold SET shipping = '$shipping' WHERE id = $id";
    $sql8 = "UPDATE history SET username2 ='$user2' WHERE id = $id ";
    $sql9 = "UPDATE sold SET username2 = '$user' WHERE id = $id";
    #perform the query, if succesful redirect the user to their purchase history.
		if ($conn->query($sql2) === TRUE AND $conn->query($sql3) AND $conn->query($sql4) AND $conn->query($sql5) AND $conn->query($sql6) AND $conn->query($sql7) AND $conn->query($sql8) AND $conn->query($sql9)) 
	{
		
		header("Location: history.php");
    
	} 
	else 
	{
		printf($conn->error);
    echo "failed to purchase";
 	}
	}
	

	



?>









