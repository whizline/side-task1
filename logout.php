<?php

session_start(); //to make sure its same session

// to delete the session 
session_unset();
echo "<h4>you have logged out, click here to go <a href='site.php'>Home</a></h4> ";
//header("Location: site.php")
?>