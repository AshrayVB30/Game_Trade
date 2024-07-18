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
<?php


$conn = mysqli_connect("localhost", "root", "", "gamertrade");


#grab the id from the link clicked on using GET
if (isset($_GET['id'])) {
	#store the id into a variable
	$id = $_GET['id'];
	#perform a query where the id matches the one from the item being clicked on by the user and then display that to the webpage
	$sql = "SELECT id, productname, productprice, description, genre, username, images FROM items WHERE id = '$id'";

	$result = $conn-> query($sql);
	$row = $result->fetch_assoc();
	$pic = $row['images'];
	?>
	<h1 style="text-align: center;">
		<?php echo $row['productname']; ?> 
	</h1>
	<div style = 'padding-top: 10px; padding-right: 50px; padding-bottom: 50px;padding-left: 40px;'>
  	<?php
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $pic ).'" height="350" width="350" style = "display: block; margin-left: auto; margin-right: auto;">';
	?>
	<br>
	<div style ='border: 1px solid black;
  background-color: lightgrey;
  padding-top: 60px;
  padding-right: 30px;
  padding-bottom: 50px;
  padding-left: 80px;'>
		
	
	<h2 style=" font-size: 20pt ">
		<?php echo 'Username: '. $row['username']; ?>
	</h2>
	<h2 style=" font-size: 20pt ">
		<?php echo 'Genre: '. $row['genre']; ?>
	</h2>
	<h2 style = 'font-size: 20pt'>
		<?php echo "Price: ". $row['productprice']; ?>
	</h2>
	<p style="text-align: center; font-size: 18pt;">
		<?php echo "Product description: ". $row['description']; ?>
	</p>
	<div style="text-align: center; ">

		<?php
		#check if the user is logged in. If the user is not logged in tell them to log in to purchase an item. otherwise display the purchase button
		if (!(isset($_SESSION['login_user']) AND $_SESSION['login_user'] != '')) {
			echo "Please Login to purchase this item";
		}
		
		else{
			echo '<a  style="background-color: black; color: white; padding: 15px 23px; text-align: center; text-decoration: none; display: inline-block; font-size: 18px; margin: 4px 2px;"href="purchase1.php?id=' . $row['id'] . '"> Purchase Now!</a>';
		}
		
		?>
	
</div>
	</div>
	
	
	
	<?php



$conn->close();


}

?>



</div>
</html>