
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
  <a class="navbar-brand" href="home.php" style="color: white">GamerTrade</a>
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
<body>
<div class="container">
	<!-- take the form and insert the registration information into the insert.php file.-->
	<form action= 'insert.php' method="POST">
		<center>

		<h1> Registration </h1>
		<br>
		<br>
		<table>
			<tr>
				<td>
					<label style="font-size: 25px; ">First Name:</label>
				</td>
				<td>
					<input type='text' name ='fname' required>
				</td>
			</tr>
			
			<tr>
				<td>
				<label style="font-size: 25px; "> Last Name:<label>
			</td>
			<td>
				<input type='text' name='lname' required>
			</td>
			</tr>

			<tr>
				<td>
					<label style="font-size: 25px; "> User Name: </label>
				</td>
				<td>
					<input type='text' name='username' required>
				</td>
			</tr>

			<tr>
			<td>
			<label style="font-size: 25px; "> Password: </label>
			</td>
			<td>
			<input type="Password" name="password" required>
		    </td>
		 	</tr>

		 	<tr>
		 		<td>
		 			<label style="font-size: 25px; "> Confirm Password:</label>
		 		</td>
		 		<td>
		 		<input type="Password" name="password2" required>
				</td>
		 	</tr>

		 	<tr>
		 		<td>
		 			<label style="font-size: 25px; "> Gender: </label>
		 		</td>
		 		<td>
		 			<input type="radio" name="gender" value="male" required> Male
		 			<input type="radio" name="gender" value="female"> Female
		 		</td>
		 	</tr>

		 	<tr>
		 		<td>
		 			<label style="font-size: 25px; "> Email: </label>
		 		</td>
		 		<td>
		 			<input type="mail" name="email" required>
		 		</td>
		 	</tr>

		 	<tr>
		 		<td>
		 			<label style="font-size: 25px; ">Age: </label>

		 		</td>

		 		<td>
		 			<input type="number" name="age" min="18" max='120' required>
		 		</td>
		 	</tr>

		 	<tr>
		 		<td>
		 			<label style="font-size: 25px; "> Phone Number: </label>
		 		</td>
		 		<td>
		 			<input type="text" placeholder= 'ex:(5556667777)' name="phone" required>
		 		</td>

		 	</tr>
		 	<td>
		 		<pre>
		 			<br>
		 		
		 		</pre>
		 	</td>
		 </table>
		 </center>
		 <center>
		 <input class="btn btn-sm btn-primary btn-block"type='submit' value="Submit" name="reguser"style="width: 20em; height: 3em;">
		</center>
		</form>










</div>
</body>
</html>