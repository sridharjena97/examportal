<?php

$server= "localhost";
$username= "root";
$password="Sridh@do1";
$database= "scl_u";

//creating a connection
$conn= mysqli_connect($server, $username, $password, $database);

//die if connection was not sucessful
if (!$conn) {
    die("sorry we failed to connect".mysqli_connect_error());
    
}
// else {
//     echo "connection successful!";
// }

?>