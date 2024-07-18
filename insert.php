
<?php


#if the registration submit button is pressed perform the inserstion.
if(isset($_POST['reguser'])) {
	#store the registration information into variables
	$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$age = $_POST['age'];

#if the passwords are not matching display failed login page
if ($password != $password2) {
	header("location: FailedRegistration.php");
	
}
else{
	#connect to database
	$conn = mysqli_connect("localhost", "root", "", "gamertrade");
	#perform query to check if username and email exist
$sql2 = "SELECT * FROM login WHERE username = '$username'";
$sql3 = "SELECT * FROM login WHERE email = '$email'";
$result1 = mysqli_query($conn, $sql2);
$result2 = mysqli_query($conn, $sql3);
#if username is found in database report this to the user
if (mysqli_num_rows($result1) > 0) {
	header("location: FailedRegistration1.php");
}
#if email is found in database report this to the user 
elseif (mysqli_num_rows($result2) > 0) {
	header("location: FailedRegistration2.php");
}

}


		#if everything is fine and unique encrypt the password with md5 and store it into the login database.

		$password = md5($password);
		$sql = "INSERT INTO login (username, password, gender, age, email, phone, fname, lname) VALUES ('$username', '$password', '$gender', '$age', '$email', '$phone', '$fname', '$lname')";
		
		#connection goes well go to post registration and tell user the registration is sucessful and to log in.
		if ($conn->query($sql) === TRUE) {

		header("Location: PostRegistration.php");
    
		} 
		else{
		echo "Could not register";
		}
	
		

		
			
			

		
		
	

}
	









?>