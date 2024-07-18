<!-- Style used for navbar -->
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
        #uses session.php to check if user is logged in, if user is logged in, navbar will display UserProfile instead of sign in, and sign up becomes logout
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
<title>GamerTrade Home Site</title>
<br>
<body style="background: url(images/home.png);">
  <br>
   <h1 class="text-center" style="background: url(images/home.png); font: bold;"> Search By Genre</h1>
    
   <div class="album py-5 bg-light" style="background: url(images/home.png);">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <a href="actionsearch.php">
            <img src="images/action.jpg" height="250" width="350">
          </a>

       
        </div>

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="adventuresearch.php">
            <img src="images/adventure.jpg" height="250" width="350">
          </a>
          </div>
        </div>
        <div class="col-md-4">
          <a href="Shootersearch.php">
            <img src="images/Shooting.png" height="250" width="350">
          </a>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="RPGsearch.php">
            <img src="images/RPG.jpg" height="250" width="350">
          </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="puzzlesearch.php">
            <img src="images/puzzle.jpg" height="250" width="350">
          </a>
          </div>
        </div>
        <div class="col-md-4">
          <a href="stratsearch.php">
            <img src="images/strat.jpg" height="250" width="350">
          </a>
          </div>
        </div>
  <div style="height:400px"></div>


   
  </body>
</html>