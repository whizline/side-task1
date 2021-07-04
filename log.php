<?php
session_start();
if (isset($_POST['submit'])){
$_SESSION['user'] = $_POST['user'];
$_SESSION['pass'] = $_POST['pass'];
}
//change 'valid_username' and 'valid_password' to your desired "correct" username and password
if (! empty($_POST) && $_POST['user'] === 'valid_username' && $_POST['pass'] === 'valid_password')
{
    $_SESSION['logged_in'] = true;
    header('Location: in.php');
}
else
{
    ?>

    <form method="POST">
    Username: <input name="user" type="text"><br>
    Password: <input name="pass" type="password"><br><br>
    <input type="submit" value="submit">
    </form>

    <?php
}