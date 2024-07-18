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
      	Reccomendation
      </h1>
<?php
error_reporting(0);
include('session.php');
$user = $_SESSION['login_user'];
#intialize arrays to be used in recommendation
$array1 = [];
$array2 = [];

$count = 0;


$conn = mysqli_connect("localhost", "root", "", "gamertrade");
#query to select only the genre from the history table based on the user that is logged into the session. We will use this query to get the mode of the genre for the user logged in. 
$sql = "SELECT genre FROM history WHERE username = '$user'";
$results = $conn-> query($sql);
if($results-> num_rows > 0){
	while ($row = $results->fetch_assoc()) {
		#store all of the genres the user has purchased from into an array. 
		array_push($array1, $row['genre']);

		
		}

	
#perform a for loop and depending on the genre we find from the array, push into the second array an int ranging from 1 to 6. Each integer represents a genre. 
foreach ($array1 as $value){
	if($value == 'Shooter'){
		array_push($array2,1);
	}
	elseif ($value == 'Action') {
		array_push($array2,2);
	}
	elseif ($value == 'RPG') {
		array_push($array2, 3);
	}
	elseif ($value == 'Adventure') {
		array_push($array2, 4);
	}
	elseif($value == 'Puzzle'){
		array_push($array2, 5);
	}
	elseif ($value == 'Strategy') {
		array_push($array2, 6);
	}
	
}
#sort the array with php's built in function
sort($array2);




#create a new array that uses php's count values function that will count all the unique values in the array. For example an array with [111,2222,4,66] will be counted and inserted into array3 now showing, [3,4,1,2] because the list was sorted numerically we know that 3 will be 1 which is shooter, and 4 is 2 which will be action. Meaning action is the most commonly purchased genre. 


$array3 = array_count_values($array2);
#take each of the values in the array and store the amount into the variable for the genre. 
if(!empty($array3)){
	$shooter = $array3[1];
	$action = $array3[2];
	$rpg = $array3[3];
	$adventure = $array3[4];
	$puzzle = $array3[5];
	$strategy = $array3[6];
	

}





#perform a for loop to obtain the maximum number of the genre and store it into the count variable. the count variable is the highest number of genre as an int. 
foreach ($array3 as $key) {
	
	if ($key > $count) {
		
		$count = $key;
		
	}
	
}

#check if the array is empty, if it check which genre had the highest count and record it into the genre variable as a string. This will be used for the query.
if (!empty($array3)) {
	if ($shooter >= $count) {
	
	$genre = "Shooter";

}
	elseif ($action >= $count) {
	
	$genre = "Action";
}
	elseif ($rpg >= $count) {
	
	$genre = "RPG";
}
	elseif ($adventure >= $count) {
	
	$genre = "Adventure";
}
	elseif ($puzzle >= $count) {
	
	$genre = "Puzzle";
}
	elseif ($strategy >= $count) {
	
	$genre = "Strategy";
}
	
}


?> 


	<?php
	#perform a query where we get the average price of the purchase history from the user and also take the average price from that purchased the genre 
	$sql3 = "SELECT AVG(productprice) FROM history WHERE genre = '$genre' AND username = '$user'";

	$resultss = $conn->query($sql3);
	$row = $resultss->fetch_assoc();
	$avgprice = $row['AVG(productprice)'];
	#round the average price and take a high and low that will be set between 10 less of the avg price and 10 above the avg price
	$avgprice = round($avgprice);
	$low = $avgprice - 10;
	$high = $avgprice + 10;
	
	?>
	
	
	<?php
	#perform final query where we take only Distinct values from the items database where they match the genre but are also not from the logged in user so they do not get games they have put up between the low and high and limit it to only 3 at most. 
	$sql2 = "SELECT DISTINCT id, productname, productprice, description, genre, username, images FROM items WHERE genre = '$genre' AND username != '$user' AND productprice BETWEEN '$low' AND '$high' LIMIT 3";
	
	$result = $conn-> query($sql2);
	?>
	<h2 style="text-align: center;"> 	The average price you purchase products at is: <?php echo $avgprice; ?> 		<br> 		Most Frequently Purchased Genre is: <?php echo $genre; ?> 
		<br>
				
	</h2>
	<?php
	#if the result we receive is 0, inform the user why and show them where they can buy games to help improve their recommendation profile. 
	if($result-> num_rows == 0){
		?>
		<h2 style="text-align: center;">
			There are no games in our database that fit your purchasing price. 

			<br>
			Click on these links to find games for a genre
			<br>
			

		</h2>
		<h3 style="text-align: center;">
		
		<a href="actionsearch.php"> Action Games </a>
		&nbsp;
		<a href="adventuresearch.php"> Adventure Games </a>
		&nbsp;
		<a href="Shootersearch.php"> Shooter Games </a>
		&nbsp;
		<a href="RPGsearch.php"> RPG Games </a>
		&nbsp;
		<a href="puzzlesearch.php"> Puzzle Games </a>
		&nbsp;
		<a href="stratsearch.php"> Stratgy Games </a>

		</h3>
		<?php

	}
	



	
	#display the results from our query on their avg price
	if ($result-> num_rows > 0) {
		?>
		<h2 style="text-align: center;"> 
		Here are some game reccomendations.		
	</h2>
	<?php
}
?>
	<div class="album py-5 bg-light">
	<div class="container">
	<div class="row">
		<?php

	
	
	
	if($result-> num_rows > 0){
		?>
		
<?php
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




	}
$conn-close();
}
#if the user has no purchases made, show them where they can start buying items. 
else{
	?>
	<h2 style="text-align: center;">
		You have not purchased any items
		<br>
		<br>
		Click on the links to buy some items to get a reccomendation
		
	</h2>
	<br>
	<h3 style="text-align: center;">
		
		<a href="actionsearch.php"> Action Games </a>
		&nbsp;
		<a href="adventuresearch.php"> Adventure Games </a>
		&nbsp;
		<a href="Shootersearch.php"> Shooter Games </a>
		&nbsp;
		<a href="RPGsearch.php"> RPG Games </a>
		&nbsp;
		<a href="puzzlesearch.php"> Puzzle Games </a>
		&nbsp;
		<a href="stratsearch.php"> Strategy Games </a>

		</h3>
<?php
}
?>
	
	

</div>
</div>
</div>


</html>