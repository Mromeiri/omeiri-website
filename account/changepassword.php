<?php
session_start();

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: signIn\signIn.php");
    exit;
}
   $host = "localhost";
   $user = "root";
   $password="";
   $dbname = "ceeg";
   $port = 3306;
   
   //Data Source name (DSN)
   $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
   //Creation du pdo
   $pdo = new PDO($dsn,$user,$password);
	 
// Redirect the user to the login page if not logged in
if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: signIn\signIn.php");
    exit;
} else{

$username = $_SESSION['username'];
	$etat = $_SESSION["etat"];
  $pass =  $_SESSION["passsword"];
  $currentpass = $_POST["currentpass"];
  $newusername = $_POST["username"];
//  isset($_POST['changepassword']);
 if (isset($_POST['changepassword'])) {
 echo "hi";

if ($pass == $currentpass) {
  echo "hi";
  $newpassword = $_POST["newpassword"];

  $_SESSION["passsword"] = $newpassword;
  $sql = "UPDATE login set password =:password where username=:username";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["password"=>$newpassword, "username"=>$username]);
    header('location:../index.php');
    

  
}else header('location:account.php?alert=Wrong password');

 }else{
  if ($pass == $currentpass) {
    $sql = "select * from login where username=:username";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["username"=>$newusername]);
    if ($stmt->rowCount() >0 ) {
    header('location:account.php?alert=Username exist#register') ;
    }else{
      $_SESSION["username"] =$newusername;
      $sql = "UPDATE login set username =:newusername where username=:username";
      $stmt =$pdo->prepare($sql);
      $stmt->execute(["newusername"=>$newusername, "username"=>$username]);
      header('location:../index.php');

    }
    
      
  
    
  }else header('location:account.php?alert=Wrong password');

 }
}?>