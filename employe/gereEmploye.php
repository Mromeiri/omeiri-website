<?php

session_start();
if (!isset($_SESSION['mywebsiteanduwontknow']) || $_SESSION['etat'] =='Membre' ) {
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
  $stmt = $pdo ->query("select max(id) from employe;");
  
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght= $row['max(id)'];
  }
  if ($_GET['modifier']=='modifier' || $_GET['modifier']=='supprimer') {
    echo $lenght;
    $myArray = array();
    for ($i=1; $i <$lenght+1 ; $i++) { 

    
      if (isset($_POST[ "chkbo$i"])){
        $check = $_POST[ "chkbo$i"];
        array_push($myArray , $i);
        
        
        
   } 
     } 
     $count1= count($myArray);
     if ($count1==0) {
        header('location:employe.php?alert=1') ;
      # code...
     }
     file_put_contents('data.txt', serialize($myArray));
     }
    
   //file_put_contents('data.txt', serialize($myArray));
  //      // header('location:projet.php') ;
  //  }  print_r($myArray);
  

  //}




  ?>
<!Doctype HTML>
	<html>
	<head>
		<title></title>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
		<link rel="stylesheet" href="../css/mine.css" type="text/css"/>
		<link rel="stylesheet" href="../css/mine2.css" type="text/css"/>
		<link rel="stylesheet" href="../css/projet.css" type="text/css"/>
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
        </style>
	</head>
    <body>  
    <div id="mySidenav" class="sidenav">
    <a href="../index.php" style ="padding : 0px">
		<img src="../images/CEEG.png" class="pro" />
		<img src="../images/CEEG_NAME.png" class="ceegname" />
</a>
            </div>
<h1>Veuillez remplire les information de l'employe</h1>

<form action="SOSemploye.php" method="POST">
<label class="form_label" for="id">username : </label> 
              
              <input type="text" name="username" id="formNom" class="from_field" ><br>
              </br>
              </br>
    
    <label class="form_label" for="id">NOM : </label> 
              
    <input type="text" name="nom" id="formNom" class="from_field" ><br>
    </br>
    </br>

  <label class="form_label" for="id">Prenom : </label>
  
  <input type="text" name="prenom" id="formPrenom" class="from_field" ><br>
  </br></br>
  
  <label class="form_label" for="id">Poste : </label>
 
  <input type="text" name="poste" id="Lebele" class="from_field" ><br>
  
  </br></br>
  

  <label class="form_label" for="id">Bureau : </label>
  
  <input type="text" name="Bureau" id="Lebele" class="from_field" ><br>
  </br></br>
  <label class="form_label" for="id">DATE de naissance : </label>
 
  <input type="Date" name="dateN" id="Lebele" class="from_field" ><br>
  
  </br></br>
  <label class="form_label" for="id">Telephone : </label>
  
  <input type="text" name="tel" id="Lebele" class="from_field" ><br>
  
  </br>
               <?php  if ($_GET['modifier']=='modifier') { ?>
                 <button class="btn-add"type="submit" name="modifier" value="modifier">Submit</button>
                 <?php } ?>
                 <?php  if ($_GET['modifier']=='ajouter') { ?>
                 <button class="btn-add"type="submit" name="ajouter" value="ajouter">Submit</button>
                 <?php } ?>
                 <?php  if ($_GET['modifier']=='supprimer') { 
$j=0;
$myArray = array();
for ($i=1; $i <$lenght+1 ; $i++) { 
  
  if (isset($_POST[ "chkbo$i"])){
    array_push($myArray, $i);
  }}
$myArray = unserialize(file_get_contents('data.txt'));
    if ($myArray != NULL) {
      $length = count($myArray);
    }
    for ($i=0; $i < $length; $i++) {

      $sql = "Select username from employe where id=:id";
      $stmt =$pdo->prepare($sql);
      $stmt->execute(["id"=>$myArray[$i]]);
      while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
        $sqll = "DELETE FROM estAffecté WHERE username =:username;"; 
    $st =$pdo->prepare($sqll);
    $st->execute(["username"=>$row['username']]);
      }



      $sql = "DELETE FROM employe WHERE id =:id;"; 
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$myArray[$i]]);
    }
     header('location:employe.php') ;
      } ?>

            </body>
            </html>
            