<?php
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow'])  ) {

  header("Location: ..\signIn\signIn.html");
  exit;}
  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "CEEG";
  $port = 3306;
    
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $userSelected =  $_POST['userselected'];
  $dateAffectation = $_POST['dateAffectation'];
  $myArray = unserialize(file_get_contents('data.txt'));
  $length = count($myArray);
  for ($i=0; $i < $length; $i++) { 
    $sql = "Insert into estAffecté VALUES(:id , :username , :date)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$myArray[$i],"username"=>$userSelected,"date"=>$dateAffectation]);
    header("Location: projet.php");
  }









  ?>