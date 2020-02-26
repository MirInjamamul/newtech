<?php
// initializing variables
$username = "";
$password = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'foodforum');

// REGISTER USER
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Finally, register user if there are no errors in the form

  	$query = "INSERT INTO login (username, password)
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);

  	header('location: index.html');
}
?>
