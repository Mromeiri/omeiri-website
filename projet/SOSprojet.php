<?php
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow'])  ) {

    header("Location: ..\signIn\signIn.html");
    exit;}
    if ($_SESSION['etat'] =='Membre') {
      header("Location: projet.php");
      exit;
    }
    $myArray = unserialize(file_get_contents('data.txt'));

  $nom = $_POST['nom'];
    $chefP = $_POST['chefP'];
    $Lebele = $_POST['Lebele'];
    $mouvrage = $_POST['mouvrage'];
    $programme = $_POST['programme'];
    $wilaya = $_POST['wilaya'];
    $etat = $_POST['etat'];
    $objectif = $_POST['objectif'];
    $dateobjectif = $_POST['dobjectif'];
    $performance = $_POST['performance'];
    $datemes = $_POST['datemes'];
    $anneemesprevue = $_POST['anneemesprevue'];
    $puissance = $_POST['puissance'];
    $nbtranches = $_POST['nbtranches'];
    $ouverture = $_POST['ouverture'];
    
  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "ceeg";
  $port = 3306;
  
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $stmt = $pdo ->query("select count(*) from projet");
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght= $row['count(*)'];
  }

  if (isset($_POST['ajouter'])) {
    $stmt = $pdo ->query("SELECT max(id) FROM projet");
    while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
      $maxid= $row['max(id)'];
    }
    $maxid++;
    $sql = "INSERT INTO projet (id,nom,chefP,Lebele,mouvrage,programme,wilaya,etat,objectif,dateobjectif,performance,datemes,anneemesprevue,puissance,nbtranches,ouverture) VALUES (:id,:nom,:chefP,:Lebele,:mouvrage,:programme,:wilaya,:etat,:objectif,:dateobjectif,:performance,:datemes,:anneemesprevue,:puissance,:nbtranches,:ouverture)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$maxid, "nom"=>$nom,"chefP"=>$chefP,"Lebele"=>$Lebele,"mouvrage"=>$mouvrage,"programme"=>$programme,"wilaya"=>$wilaya,"etat"=>$etat,"objectif"=>$objectif,"dateobjectif"=>$dateobjectif,"performance"=>$performance,"datemes"=>$datemes,"anneemesprevue"=>$anneemesprevue,"puissance"=>$puissance,"nbtranches"=>$nbtranches,"ouverture"=>$ouverture]);
    header('location:projet.php') ;
  }
  if (isset($_POST['modifier'])) {
    $myArray = unserialize(file_get_contents('data.txt'));
    $length = count($myArray);
    
    if ($myArray != NULL) {
      for ($i=0; $i < $length; $i++) { 
      $sql = "UPDATE projet SET";

// Check if each input field is empty
if (!empty($nom)) {
    $sql .= " nom = :nom,";
}
if (!empty($chefP)) {
    $sql .= " chefP = :chefP,";
}
if (!empty($Lebele)) {
    $sql .= " Lebele = :Lebele,";
}
if (!empty($mouvrage)) {
    $sql .= " mouvrage = :mouvrage,";
}
if (!empty($programme)) {
    $sql .= " programme = :programme,";
}
if (!empty($wilaya)) {
    $sql .= " wilaya = :wilaya,";
}
if (!empty($etat)) {
  $sql .= " etat = :etat,";
}
if (!empty($objectif)) {
  $sql .= " objectif = :objectif,";
}
if (!empty($dateobjectif)) {
  $sql .= " dateobjectif = :dateobjectif,";
}
if (!empty($performance)) {
  $sql .= " performance = :performance,";
}
if (!empty($datemes)) {
  $sql .= " datemes = :datemes,";
}
if (!empty($anneemesprevue)) {
  $sql .= " anneemesprevue = :anneemesprevue,";
}
if (!empty($puissance)) {
  $sql .= " puissance = :puissance,";
}
if (!empty($nbtranches)) {
  $sql .= " nbtranches = :nbtranches,";
}
if (!empty($ouverture)) {
  $sql .= " ouverture = :ouverture,";
}
// Remove the trailing comma and complete the query with the WHERE clause
$sql = rtrim($sql, ",") . " WHERE id = :id";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Bind the parameters
if (!empty($nom)) {
    $stmt->bindParam(':nom', $nom);
}
if (!empty($chefP)) {
    $stmt->bindParam(':chefP', $chefP);
}
if (!empty($Lebele)) {
    $stmt->bindParam(':Lebele', $Lebele);
}
if (!empty($mouvrage)) {
    $stmt->bindParam(':mouvrage', $mouvrage);
}
if (!empty($programme)) {
    $stmt->bindParam(':programme', $programme);
}
if (!empty($wilaya)) {
    $stmt->bindParam(':wilaya', $wilaya);
}
if (!empty($etat)) {
  $stmt->bindParam(':etat', $etat);
}
if (!empty($objectif)) {
  $stmt->bindParam(':objectif', $objectif);
}
if (!empty($dateobjectif)) {
  $stmt->bindParam(':dateobjectif', $dateobjectif);
}
if (!empty($performance)) {
  $stmt->bindParam(':performance', $performance);
}
if (!empty($datemes)) {
  $stmt->bindParam(':datemes', $datemes);
}
if (!empty($anneemesprevue)) {
  $stmt->bindParam(':anneemesprevue', $anneemesprevue);
}
if (!empty($puissance)) {
  $stmt->bindParam(':puissance', $puissance);
}
if (!empty($nbtranches)) {
  $stmt->bindParam(':nbtranches', $nbtranches);
}
if (!empty($ouverture)) {
  $stmt->bindParam(':ouverture', $ouverture);
}
$stmt->bindParam(':id', $myArray[$i]);

// Execute the query
$stmt->execute();
header('location:projet.php') ;


    }
   
    // for ($i=0; $i < $length; $i++) { 
    //   echo $myArray[$i];
      
    //   $sql = "update projet set nom=:nom ,chefP=:chefP,Lebele=:Lebele,dated=:dated,datef=:datef,lieu=:lieu where projet. id=:id";
    //   $stmt =$pdo->prepare($sql);
    //   $stmt->execute(["id"=>$myArray[$i],"nom"=>$nom,"chefP"=>$chefP,"Lebele"=>$Lebele,"dated"=>$dated,"datef"=>$datef,"lieu"=>$lieu]);
    //   header('location:projet.php') ;
    //   # code...
    // }
  }
       // header('location:projet.php') ;
   } 
   if (isset($_POST['supprimer'])) {
    
  }