<?php
echo "logging you out";
session_start();
session_destroy();
header("location: user_login.php");
?>