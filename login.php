<?php

// establish connection with db 
require_once 'constants.php';
include 'utils.php';
$conn = mysqli_connect($host_name, $username, $password, $db);
if (!$conn) {
  die("connection failed " . mysqli_connect_error());
}

// // sanitize username and password
$uname = mysql_entities_fix_string($conn, $_POST['username']);
$upassword = mysql_entities_fix_string($conn, $_POST['password']);

// // use the username to query db 
$query = "SELECT * FROM Users WHERE username = '$uname'";
$result = $conn->query($query);

if (!$result) die($conn->error);

// No entry with the given username found
if ($result->num_rows === 0) {
  echo "Username incorrect";
  exit;
}

// salt the password
$salted_password = hash('ripemd128', $salt . $upassword);

// compare the hashes
$row = $result->fetch_row();
$is_authenticated = $salted_password === $row[1];

// if password checks out, create a session
if (!$is_authenticated) {
  echo "Nope! Password is incorrect";
  exit;
}
echo "Login successful!";

mysqli_close($conn);
