<?php

//STARTING THE SESSIONS
session_start();
error_reporting(0);

//USING SESSIONS TO GET THE VARIABLES
$name = $_SESSION['name'];
$uname = $_SESSION['uname'];
$psw = $_SESSION['psw'];

//USING COOKIES TO GET THE VARIABLES 
//GET THE COOKIES
//$gender= $_COOKIE['gender'] ;
//$name = $_COOKIE['fname'];
//$uname = $_COOKIE['uname'];
//$psw = $_COOKIE['psw'] ;

if ($uname = $_SESSION['uname'] && $psw = $_SESSION['psw']){
    echo "<br>";
    echo "<h4> Welcome ". htmlspecialchars($name) ."</h4>";
    echo "<h4>Logged in Successful, click here to <a href='logout.php'>LOGOUT</a></h4>" ;
    }else{
        echo "<br>";
        echo "<h1>NO USERNAME FOUND</h1>";
        echo "<h4>click here to <a href='logout.php'>LOGOUT</a></h4>";
    }
    
?>
