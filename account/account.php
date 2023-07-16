<?php
   
	 
session_start();

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: signIn\signIn.php");
    exit;
} else{

$username = $_SESSION['username'];
	$etat = $_SESSION["etat"];}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="account.js"></script>
    <link rel="stylesheet" href="signIn/signIn.css">
    <link rel="stylesheet" href="account.css">
    <title>Gerer Account</title>
    <script>
        
    </script>
</head>
<body>

 <div class="wrapper">
 <nav class="nav">
        <div class="nav-logo">
            <a href="../index.php">
                <img src="../images/CEEG.png" class="pro" style="" />
		        <img src="../images/CEEG_NAME.png" class="ceegname" />
            </a>
        </div>
        <div class="profile" style="line-height: normal;">
            <img src="../images/user.webp" class="pro-img" />
            <a href="../deconect.php">Logout</a>
            <p><?php echo $username ?><span><?php echo $etat ?></span></p>
		</div>
        
    </nav>
    
<!----------------------------- Button -----------------------------------> 
  
    <div class="form-box">
      
      
        
        
        <div class="login-container" id="login">
            <div class="nav-button">
              <button class="btn white-btn" id="loginBtn" onclick="login()">Password</button>
              <button class="btn" id="registerBtn" onclick="register()">Username</button>
            </div> 
<!------------------- Change password -------------------------->
            <div class="top">
                <header>Change Password</header>
            </div>
            <div class="input-box">
              <form action="changepassword.php" method="POST" style="display: inline;">
                <input type="text" class="input-field" placeholder="Current password" name="currentpass">
                 <i class="bx bx-lock-alt"></i> 
              </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="New Password" name="newpassword">
                 <i class="bx bx-lock-alt"></i> 
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="change password" name="changepassword" >
            </div>
        </div>
      </form>
        <!------------------- registration form -------------------------->
        
        <div class="register-container" id="register">
        <div class="nav-button">
              <button class="btn white-btn" id="loginBtn" onclick="login()">Password</button>
              <button class="btn" id="registerBtn" onclick="register()">Username</button>
            </div>
            <div class="top">
                <header>Change Username</header>
            </div>
            <div class="two-forms">
                  <form action="changepassword.php" method="POST">
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username" name="username">
                 <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="currentpass">
                 <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Change Username" name="changeusername">
            </div>
            
        </div>
        
       
<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>
<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
      x.style.left = "-510px";
      y.style.right = "5px";
      a.className = "btn";
      b.className += " white-btn";
      x.style.opacity = 0;
      y.style.opacity = 1;
    }
</script>
</body>
</html>