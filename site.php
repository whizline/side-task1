<?php 

if (isset($_POST['register'])){

    session_start();

    $_SESSION['name'] = $_POST['fname'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['psw'] = $_POST['psw'];

    //Setting the cookie

    //setcookie('fname', $_POST['fname'],time() + 86400);
    //setcookie('uname', $_POST['uname'], time() + 86400);
    //setcookie('psw', $_POST['psw'], time() + 86400);
    //setcookie('gender', $_POST['gender'],time() + 86400);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 10px solid #f1f1f1;
        max-width: 500px;
        margin: 20px auto;
        border-radius: 12px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password],
    input[type=tel],
    input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: auto;
        border-radius: 12px;
    }

    button:hover {
        opacity: 0.8;
    }

    .error {color: #FF0000;}

    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;

    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
        border-radius: 12px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }


    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;


    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
<?php
$nameErr = $emailErr = "";
$fname = $mail = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["fname"])) {
        $nameErr = "Name is required";
      } else {
        $fname = tinput($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

    if (empty($_POST["mail"])) {
        $emailErr = "Email is required";
      } else {
        $mail = tinput($_POST["mail"]);
        // check if e-mail address is well-formed
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }


}
function tinput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

    <h2>Registeration Form</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
<?php
  if(isset($_POST['register'])){
    echo "<h4>Registration Successful</h4>";
  }else{
    echo "<h4>Kindly Registration Here</h4>";
  }
?>

        <div class="container">
            <span class="error">* <?php echo $nameErr;?></span>
            <label for="fname"><b>Your Name</b></label>
            <input type="text" placeholder="Enter Name" name="fname" value="<?php echo $fname;?>" required>

            <span class="error">* <?php echo $emailErr;?></span>
            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Enter Email" name="mail" value="<?php echo $mail;?>" required>

            <span class="error">*</span>
            <label for="phone"><b>Phone Number</b></label>
            <input type="tel" placeholder="Enter Phone Number" name="phone" required>

            <span class="error">*</span>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <span class="error">*</span>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="register">Register</button>

        </div>
        
    </form>

    <div class="container" style="background-color:#f1f1f1" ;>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Own an
            account?</button>

    </div>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="task2.php" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
            </div>
            <h2>Login Form</h2>
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" name="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>
        <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

</body>

</html>