<?php

// establish connection with db 
require_once 'constants.php';
include 'utils.php';
$conn = mysqli_connect($host_name, $username, $password, $db);
if (!$conn) {
  die("connection failed " . mysqli_connect_error());
}

// sanitize username and password
$username = mysql_entities_fix_string($conn, $_POST['username']);
$password = mysql_entities_fix_string($conn, $_POST['password']);

// create user
function add_user($connection, $username, $salted_password)
{
  $query = "INSERT INTO Users VALUES('$username', '$salted_password')";
  $result = $connection->query($query);
  if (!$result) die($connection->error);
}


// TODO: do some form validation eg ( duplicate username and empty fields );

// salting password
$salted_password = hash('ripemd128', $salt . $password);

add_user($conn, $username, $salted_password);

// close db connection
mysqli_close($conn);

// tell user it went successfully 

echo "Singup Successful!";
echo <<<_END
<br />
<a href="/final_project">Go back to home to signin</a>
_END;
