<?php
include('session.php');
$user = $_SESSION['login_user'];

session_destroy();
header("location: home.php");











?>