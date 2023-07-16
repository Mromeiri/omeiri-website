<?php
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow']) || $_SESSION['etat'] =='Membre' ) {
    header("Location: ..\signIn\signIn.html");
    exit;
}
    $myArray = unserialize(file_get_contents('data.txt'));

  $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $Bureau = $_POST['Bureau'];
    $dateN = $_POST['dateN'];
    $tel = $_POST['tel'];
    $username = $_POST['username'];
  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "ceeg";
  $port = 3306;
  
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $stmt = $pdo ->query("select count(*) from employe");
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght= $row['count(*)'];
  }

  if (isset($_POST['ajouter'])) {
    $stmt = $pdo ->query("SELECT max(id) FROM employe");
    while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
      $maxid= $row['max(id)'];
    }
    $maxid++;
    $sql = "INSERT INTO employe (id,nom,prenom,poste,Bureau,dateN,tel,username) VALUES (:id,:nom,:prenom,:poste,:Bureau,:dateN,:tel,:username)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$maxid, "nom"=>$nom,"prenom"=>$prenom,"poste"=>$poste,"Bureau"=>$Bureau,"dateN"=>$dateN,"tel"=>$tel,"username"=>$username]);
    header('location:employe.php') ;
  }
  if (isset($_POST['modifier'])) {
    $myArray = unserialize(file_get_contents('data.txt'));
    if ($myArray != NULL) {
      $length = count($myArray);
      
    
   
    for ($i=0; $i < $length; $i++) { 
      echo $myArray[$i];
      $sql = "update employe set nom=:nom ,prenom=:prenom,poste=:poste,Bureau=:Bureau,dateN=:dateN,tel=:tel where employe. id=:id";
      $stmt =$pdo->prepare($sql);
      $stmt->execute(["id"=>$myArray[$i],  "nom"=>$nom,"prenom"=>$prenom,"poste"=>$poste,"Bureau"=>$Bureau,"dateN"=>$dateN,"tel"=>$tel]);
      header('location:employe.php') ;
      # code...
    }}
       // header('location:projet.php') ;
   } 
   if (isset($_POST['supprimer'])) {
    
  }