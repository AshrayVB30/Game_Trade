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
<!-- send user to the purchase information page where they can input their purchasing information-->  
<form method='post' action="purchase.php" enctype="multipart/form-data">
  <center>
    <h1>
        Purchase Information
      </h1>
      <br>
  <table style=" text-align: center;">
    <tr>
      <td>
        Shipping Address:
      </td>
      <td>
        <input type="text" required name="shipaddress">
      </td>
    </tr>
    <tr>
      <td>
        Credit Card Number:

      </td>
      <td>
        <input type="text" name="cardnum" required placeholder="ex(0000-0000-0000-0000)">
      </td>
    </tr>
     <tr>
      <td>
        Exp. Date:

      </td>
      <td>
        
        <input type="text" name="expdate" required placeholder="(mm/yy)">
      </td>
    </tr>
   


  </table>
  <?php
  #take the id that was obtained when the user clicked purchased for this item and store them into the current session for the final purchasing page.
  $_SESSION['id'] = $_GET['id'];
  ?>
  <br>

  <button name="submit" type="submit" value="purchase"> Purchase!</button>
</center>
</form>

</div>