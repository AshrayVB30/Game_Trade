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

<div>
  <center>
  <h2>
    Add Game:
  </h2>
</center>
<br>
<center>
<form method='post' action="itemadd.php" enctype="multipart/form-data">
  <table>
    <tr>
      <td>
        Name of product:
      </td>
      <td>
        <input type="text" name="productname" required>
      </td>
    </tr>

    <tr>
      <td>
        Product's Price:
      </td>
      <td>
        <input type="number" name="productprice" step="any" required>
      </td>
    </tr>
    
    <tr>
      <td>
        Description of Product:
      </td>
      <td>
        <input type="text" name="description" required>
      </td>
    </tr>


    <tr>
      <td>
        Genre:
      </td>
      <td>
        <input type="radio" name="genre" value="Shooter" required> Shooter
        <input type="radio" name="genre" value="Action"> Action
        <input type="radio" name="genre" value="RPG"> RPG
        <input type="radio" name="genre" value="Adventure"> Adventure
        <input type="radio" name="genre" value="Puzzle"> Puzzle
        <input type="radio" name="genre" value="Strategy"> Strategy
      </td>
    </tr>

    <tr>
      <td>
        Upload Picture of Item:
      </td>

      <td>
      <input type="file" name="image" required>
      </td>
    </tr>

  </table>
</center>
  <center>
  <button name="additem" type="submit" value="Item"> Add Item</button>
</center>
</form>

</div>