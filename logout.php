<?php  
session_start();
unset($_SESSION["userName"]);
unset($_SESSION["userID"]);
unset($_SESSION["status"]);
unset($_SESSION["orderNumber"]);
session_destroy();

header("Location:index.php");
?>