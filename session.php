<?php
#connect to database
$conn=mysqli_connect("localhost", "root", "", "gamertrade");
#if session is called start the session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
#if session['login_user'] is called check the name from the login database and make the current logged in user the one for the session.
if (isset($_SESSION['login_user'])) {
	$username_check=$_SESSION['login_user'];
	$query = "SELECT username from login where username = '$username_check'";
	$session_sql = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($session_sql);
	$login_session = $row['username'];
}

?>