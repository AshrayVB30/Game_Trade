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
<title>
	Selling History
</title>
<br>
<h1 style="text-align: center;">
	Items Sold
</h1>

<div class="album py-5 bg-light">
<div class="container">
<div class="row">
<?php
include('session.php');
$user = $_SESSION['login_user'];


$conn = mysqli_connect("localhost", "root", "", "gamertrade");
#select all items in the sold database where the username matches the current logged in user
$sql = "SELECT * FROM sold WHERE username = '$user'";
$results = $conn-> query($sql);
#if we have at least 1 or more result use a while loop to display all the contents of the rows
if($results-> num_rows > 0){
	while ($row = $results->fetch_assoc()) {
	?>
	

      
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          	<?php
            $pic = $row['images'];
			echo '<img src="data:image/jpeg;base64, '.base64_encode( $pic ).'" height="150" width="250" style = "display: block; margin-left: auto; margin-right: auto; width: 50%;">';
            ?>
            <div class="card-body">
            	<h2 style="text-align: center;">
            		<?php
            		echo $row["productname"];


            		?>
            	</h2>
              
              <p>
              	<?php
              	echo $row['description'];


              	?>
              </p>
              <h4 style="text-align: right;">
              	<small>
              	<?php
              	echo $row["productprice"];


              	?>
              </small>
              </h4>
              <h3 style="text-align: right">
              	<small>
              	<?php
                echo "Sold to:". $row['username2'];



              	?>
              </small>
              </h3>
               <h3 style= "text-align: right; font-size: 18px;">
              	<?php
              	echo $row['genre'];
              	?>
              </h3>
              <h3 style="text-align: right; font-size: 18px;">
                <?php
                echo $row['shipping'];
                ?>
              </h3>
             
            </div>
          </div>
        </div>
<?php
}
}
else{
  ?>
  <h2>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    You have not sold any games
  </h2>
  <?php
  
}
?>
</div>
</div>
</div>
</html>