<?php 
$username = $_POST['username'];
$passsword = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$etat = "Membre";

$host = "localhost";
  $user = "root";
  $passssword="";
  $dbname = "ceeg";
  $port = 3306;
  
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$passssword);

  $sql = "select * from login where username=:username";

  $stmt =$pdo->prepare($sql);
  $stmt->execute(["username"=>$username]);
  if ($stmt->rowCount() >0 ) {
    header('location:signIn.html?alert=Username exist') ;
  }


    $sql = "INSERT INTO login (username,firstname,lastname,password,etat) VALUES (:username,:firstname,:lastname,:password,:etat)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["username"=>$username,"firstname"=>$firstname,"lastname"=>$lastname,"password"=>$passsword,"etat"=>&$etat]);
    header('location:signIn.html') ;
    ?>