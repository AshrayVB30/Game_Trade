<?php


$conn = mysqli_connect("localhost", "root", "", "gamertrade");

#once the delete button is clicked, grab the id from the table row and check if it is set. 
if (isset($_GET['id'])) {
#map the id to a variable
$id = $_GET['id'];
#perform an sql query where we delete from the item table where the id is equal to what the user clicked on from their items for sale list. 
$sql = "DELETE FROM items WHERE id = '$id' LIMIT 1";
#perform the query and return back to removeitem page. 
$result = $conn->query($sql);
header("Location: removeitem.php");
}

?>