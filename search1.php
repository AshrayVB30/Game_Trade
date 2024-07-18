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

#if the search button is pressed perform the search function
if (isset($_POST['submit-search'])){
  #store the posted search string into a variable 
	$search = $_POST['search'];
  #perform a search query using the string and look for all instances of the use of the string from any part of the product name.
	$sql = "SELECT * FROM items WHERE productname LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_num_rows($result);
	?>
	<title>
	<?php
	echo $search
	?> 
</title>
<h1 style="text-align: center;">
	Search Results for
	<?php
	echo $search;
	?>
</h1>
<br>

<div class="album py-5 bg-light">
<div class="container">
<div class="row">

<?php
#if we obtain a result use a while loop and display all the results
	if($result2 > 0 ){
		while ($row = $result->fetch_assoc()) {
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
                echo $row['username'];



              	?>
              </small>
              </h3>
             
              <h3 style= "text-align: right; font-size: 18px;">
              	<?php
              	echo $row['genre'];
              	?>
              </h3>
          	
              <div>
                <center>
                <div>
                 <?php

                  echo '<a href="view1.php?id=' . $row['id'] . '"> view</a>';
                ?>
                </div>
            </center>
                
              </div>
            </div>
          </div>
        </div>
<?php
}

?>
</div>
</div>
</div>

		<?php
	}
  #if no results report it to the user
	else{
		?>
		<h1>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
		No Results found
	</h1>
	<?php
	}


}







?>

</table>
</html>
