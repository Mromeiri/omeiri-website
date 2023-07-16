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
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $stmt = $pdo ->query("select max(contrat) from contrat;");
  
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght2= $row['max(contrat)'];
  }
  //Data Source name (DSN)
 
  $myArray = unserialize(file_get_contents('data.txt'));
print_r($myArray);
if (!(isset($_POST['Aajouter']))) {
  $myAray = array();
for ($i=1; $i <$lenght2 ; $i++) { 
  
  if (isset($_POST[ "chkb$i"])){
    array_push($myAray, $i);
  }}
}
print_r($myAray);
if ($_GET['modifier']=='Asupprimer') {
  echo "I'm in";
  for ($i=0; $i < 5; $i++) { 
    $sql = "DELETE FROM contrat WHERE contrat =:contrat;"; 
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["contrat"=>$myAray[$i]]);
  }
  header("Location: projet.php");
  

}

file_put_contents('dataa.txt', serialize($myAray));
if ( ($_GET['modifier']=='Aajouter' ||$_GET['modifier']=='Amodifier'  ) ) {?>
  <!Doctype HTML>
	<html>
	<head>
		<title></title>
        <link rel="stylesheet" href="../css/mine2.css" type="text/css"/> 
		<link rel="stylesheet" href="../css/projet.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
		<link rel="stylesheet" href="../css/mine.css" type="text/css"/>
		  
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            .sidenav {
                height: 95px;
                width: 100%;
                position: fixed;
                z-index: 0;
                top: 0;
                left: 0;
                background-color: #272c4a;
                overflow: hidden;
                transition: 0.5s;
                padding-top: 15px;
                }
                select{
                  appearance: none;
                  background-color: #272c4a;
                  border: none;
                  border-radius: 4px;
                  padding: 10px;
                  font-size: 16px;
                  color: #FFFFFF;
                  width: 200px;
                }
                select:focus {
                  outline: none;
                  box-shadow: 0 0 5px #aaa;
                }
                #table{
                  margin-top: 120px;
                }
                h1{
                  margin-top: 120px;
                }
        </style>
        </head>
    <body>  
    <div id="mySidenav" class="sidenav">
    <a href="../index.php" style ="padding : 0px">
		<img src="../images/CEEG.png" class="pro"  />
		<img src="../images/CEEG_NAME.png" class="ceegname" />
</a></div>   
<h1>Veuillez remplire les information du projet</h1>
<a href="ajouterprojet.php?modifier=contrat"></a>
<form action="SOScontrat.php" method="POST">
    
    <label class="form_label" for="id">Designation : </label> 
              
    <input type="text" name="Designation" id="formNom" class="from_field" ><br>
    </br>
    </br>

  <label class="form_label" for="id">Date de signature :</label>
 
  <input type="date" name="signature" id="Lebele" class="from_field" ><br>
  
  </br></br>
  

  <label class="form_label" for="id">Montant : </label>
  
  <input type="text" name="Montant" id="Lebele" class="from_field" ><br>
  </br></br>
  <label class="form_label" for="id">Delai : </label>
 
  <input type="text" name="Delai" id="Lebele" class="from_field" ><br>
  
  </br></br>
  <?php if ( ($_GET['modifier']=='Aajouter') ) {?>
  <button type="submit" class="btn-add" name="ajouter">Ajouter</button>
  <?php } else{ if ($_GET['modifier']=='Amodifier') {?>
  <button type="submit" class="btn-add" name="modifier">Modifier</button>
    <?php }} ?>
</form>
<?php }
?>

