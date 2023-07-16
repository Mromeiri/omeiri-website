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
  $Designation = $_POST['Designation'];
  $Montant = $_POST['Montant'];
  $dateSignature = $_POST['signature'];
  $Delai = $_POST['Delai'];
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $stmt = $pdo ->query("select max(id) from projet;");
  
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght= $row['max(id)'];
  }
$myArray = unserialize(file_get_contents('data.txt'));
$myAray = unserialize(file_get_contents('dataa.txt'));

if (isset($_POST['ajouter'])) {
  $stmt = $pdo ->query("SELECT max(contrat) FROM contrat");
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $maxid= $row['max(contrat)'];
  }
  $maxid++;
  $sql = "INSERT INTO contrat (id,contrat,Designation,Montant,dateSignature,Delai) VALUES (:id,:contrat,:Designation,:Montant,:dateSignature,:Delai)";
  $stmt =$pdo->prepare($sql);
  $stmt->execute(["id"=>$myArray[0], "contrat"=>$maxid,"Designation"=>$Designation,"Montant"=>$Montant,"dateSignature"=>$dateSignature,"Delai"=>$Delai]);
  header('location:projet.php') ;
}else{
  $length = count($myAray);
    
    if ($myArray != NULL) {
      for ($i=0; $i < $length; $i++) { 
      $sql = "UPDATE contrat SET";

// Check if each input field is empty
if (!empty($Montant)) {
    $sql .= " Montant = :Montant,";
}
if (!empty($Designation)) {
    $sql .= " Designation = :Designation,";
}
if (!empty($dateSignature)) {
    $sql .= " dateSignature = :dateSignature,";
}
if (!empty($Delai)) {
    $sql .= " Delai = :Delai,";
}


// Remove the trailing comma and complete the query with the WHERE clause
$sql = rtrim($sql, ",") . " WHERE contrat = :contrat";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the parameters
if (!empty($Montant)) {
    $stmt->bindParam(':Montant', $Montant);
}
if (!empty($Designation)) {
    $stmt->bindParam(':Designation', $Designation);
}
if (!empty($dateSignature)) {
    $stmt->bindParam(':dateSignature', $dateSignature);
}
if (!empty($Delai)) {
    $stmt->bindParam(':Delai', $Delai);
}

$stmt->bindParam(':contrat', $myAray[$i]);

// Execute the query
$stmt->execute();
header('location:projet.php') ;
      }}
  
}

?>