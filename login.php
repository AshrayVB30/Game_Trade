
<?php
#start the sesssion
session_start();

#if the submit button is hit from userlogin.php attempt to login
if(isset($_POST['submit'])){
  
	
	
    $conn = mysqli_connect("localhost", "root", "", "gamertrade");
    #store username and password into their respective variables
		$username = $_POST['username'];
		$password = $_POST['password'];
    #take the password and encrypt it into md5
    $password = md5($password);
    

		
    #perform query with the username and password that is now encrypted 
		$query = "SELECT username, password FROM login WHERE username='$username' AND password='$password' LIMIT 1";
		$result = mysqli_query($conn, $query);
    #if we got more than 1 result we have a matching username and password and we can make the current session user the user logging in and redirect them back to their homepage.
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['login_user'] = $username;
      header("location: userprofile.php");
    }
		
		else{
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
<br>
  <!-- if we got an invalid combonation, we can't log in and report that to the user-->
			<h2 style="text-align: center;">
			Invalid Username/Password
			</h2>	
			<?php
      
    
		}
		

	
}
?>