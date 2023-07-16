<?php
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow'])  ) {

  header("Location: ..\signIn\signIn.html");
  exit;}
  if ($_SESSION['etat'] =='Membre') {
    header("Location: projet.php");
    exit;
  }else {
  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "CEEG";
  $port = 3306;
    
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  $stmt = $pdo ->query("select max(id) from projet;");
  
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $lenght= $row['max(id)'];
  }
  /* old method
  if (isset($_POST['modifier'])) {
  echo $lenght;
    for ($i=1; $i <$lenght+1 ; $i++) { 
      
      if (isset($_POST[ "chkbo$i"])){
        $check = $_POST[ "chkbo$i"];
        echo $i;
        
   } 
     } 
     
  }*/
  //Construre la requete
  if (!($_GET['modifier']=='ajouter') ) {
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
      header('location:projet.php?alert=1') ;
     }else {
      if ($count1>1 && ($_GET['modifier']=='affecter' || $_GET['modifier']=='equipe' ||$_GET['modifier']=='more')) {
        header('location:projet.php?alert=choose one') ;
      }
      
     }
     print_r($myArray);
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
        </style>
	</head>
    <body>  
    <div id="mySidenav" class="sidenav">
    <a href="../index.php" style ="padding : 0px">
		<img src="../images/CEEG.png" class="pro"  />
		<img src="../images/CEEG_NAME.png" class="ceegname" />
</a>
<?php if ($_GET['modifier']!='contrat') {?>
    </div>   
    <link rel="stylesheet" href="../css/mine2.css" type="text/css"/> 
		<link rel="stylesheet" href="../css/projet.css" type="text/css"/>  
              <?php }
              
                  if ($_GET['modifier']=='affecter') {
                      ?>
                      </br>
    </br></br>
    </br></br>
    </br>
                      <form action="affecter.php" method="POST">
                        <label class="form_label" for="id">Username de l'employé : </label> 
                        <select name="userselected">
                          <?php 
                            $stmt = $pdo ->query("SELECT username FROM employe order by id");
                             while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
                              ?>
                              <option value="<?php echo $row['username'] ?>"><?php echo $row['username'] ?></option>
                           <?php  }
                          ?>
                        </select>
                        </br></br>
                        <label class="form_label" for="id">Date D'affectation : </label> 
                        <input type="date" name="dateAffectation" id="formNom" class="from_field" ><br>
                        <button class="btn-add"type="submit" name="modifier" value="modifier">Submit</button>
                      </form>
                 <?php }else
                 if ($_GET['modifier']=='contrat') { ?>
        <form action="contrat.php" method="post" id="form">
					<a class="btn-add" id="Aajouter" ><i class="fa fa-plus" ></i>   Ajouter</a>
					<a class="btn-add" id="Amodifier"><i class="fa fa-pencil"></i>   Modifier</a>
					<a class="btn-add" id="Asupprimer" ><i class="fa fa-trash"></i>   Supprimer</a>
	  			<a class="btn-add" "><i class="fa fa-search"></i>   Rechercher</a>
            
            </div>
                 <style>
                  .sidenav {
                    height: 100%;
                    width: 300px;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                    background-color: #272c4a;
                    overflow: hidden;
                    transition: 0.5s;
                    padding-top: 30px;
                    position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}     
input{
  color: #818181;
  background-color: #272c4a;
  border: none;
  width: 200px;
  
}

                 </style>
                 
                 <div id="main">
                 <div class="col-div-6">
                    <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Contrats</span>
	                  <span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Contrats</span>
                  </div>
                  <table id="table">
                  <thead>
	                  <tr>
                      <th>Nº Contrat</th>
                      <th>Designation</th>
	                    <th>Montant</th>
										  <th>Date de Signature</th>
                      <th>Delai</th>
                      <th>Select</th>
	                  </tr>
                  
                  </thead>
                  <?php
									$sql ="SELECT * FROM contrat where id =:id";
									$stmt =$pdo->prepare($sql);
    							$stmt->execute(["id"=>$myArray[0]]);
                  echo $myArray[0];
								
                
		          while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
			?>
			    <tr>
                    <td><?php echo $row['contrat'] ?></td>
	    		    <td><?php echo $row['Designation'] ?></td>
	    		    <td><?php echo $row['Montant'] ?></td>
	   		 	    <td><?php echo $row['dateSignature'] ?></td>
                    <td><?php echo $row['Delai'] ?></td>
										<td class="col_chkbox">
        <input id="myCheckbox" type="checkbox" name=<?php echo "chkb".$row['contrat']?>>

      </td>
	 		    </tr>
                  
			<?php } ?>  
                  </table>
              </form>
                  </div>
                <?php  } else
                 if ($_GET['modifier']=='equipe') { ?>
                <table id="table">
                  <thead>
	                  <tr>
                      <th>Nº</th>
                      <th>Chef Projet</th>
	                    <th>Membre</th>
										  <th>Select</th>
	                  </tr>
                  </thead>
                   <?php
                   $x=0;
                  $lenght = count($myArray);
                  for ($i=0; $i < $lenght; $i++) { 
                    $sql ="select * from projet as p,estAffecté as e where p.id=e.id and p.id=:id;";
									$stmt =$pdo->prepare($sql);
    							$stmt->execute(["id"=>$myArray[$i]]);
                  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { 
                    if ($x==0) {
                      # code...
                    
                    ?>
                  <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['chefP'] ?></td>
	                    <td><?php echo $row['username'] ?></td>
										  <td class="col_chkbox"><input id="myCheckbox" type="checkbox" name=<?php echo "chkbo".$row['id']?>></td>
	                  </tr>
                  <?php 
                 $x++; }else
                 if($x>0){ ?>
                  <tr>
                      <td></td>
                      <td></td>
	                    <td><?php echo $row['username'] ?></td>
										  <td class="col_chkbox"><input id="myCheckbox" type="checkbox" name=<?php echo "chkbo".$row['id']?>></td>
	                  </tr>


              <?php    }

?>
                 <?php }} ?>  
                 
                 <?php }else
                 
                 
                 
                 
                 {
               ?>
<h1>Veuillez remplire les information du projet</h1>

<form action="SOSprojet.php" method="POST" style="overflow-y: auto;
    max-height: 450px;">
    
    <label class="form_label" for="id">NOM : </label> 
              
    <input type="text" name="nom" id="formNom" class="from_field" >
    </br>
    </br>

  <label class="form_label" for="id">CHEF PROJET : </label>
  
  <select name="chefP">
                          <?php 
                            $stmt = $pdo ->query("SELECT username FROM employe order by id");
                             while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
                              ?>
                              <option value="<?php echo $row['username'] ?>"><?php echo $row['username'] ?></option>
                           <?php  }
                          ?>
                        </select><br>
  </br>
  
  <label class="form_label" for="id">DETAIL : </label>
 
  <input type="text" name="Lebele" id="Lebele" class="from_field" ><br>
  
  </br>
  

  <label class="form_label" for="id">Wilaya : </label>
  
  <input type="text" name="wilaya" id="Lebele" class="from_field" ><br>
  </br>
  <label class="form_label" for="id">M ouvrage : </label>
                              <select name="mouvrage" id="">
                                <option value="KDM">KDM</option>
                                <option value="KDA">KDA</option>
                              </select>
                             </br>
  
  
  <label class="form_label" for="id">Programme : </label>
  
  <input type="text" name="programme" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">Etat : </label>
                              <select name="etat" id="">
                                <option value="En cours">En cours</option>
                              </select>
  <br>

  <label class="form_label" for="id">Objectif : </label>
  
  <input type="text" name="objectif" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">Date Objectif : </label>
  
  <input type="Date" name="dobjectif" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">Performance : </label>
  
  <input type="text" name="performance" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">date mes : </label>
  
  <input type="date" name="datemes" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">annee Mes prevue : </label>
  
  <input type="text" name="anneemesprevue" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">puissance : </label>
  
  <input type="text" name="puissance" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">nbtranches : </label>
  
  <input type="text" name="nbtranches" id="Lebele" class="from_field" ><br>
  
  </br>
  <label class="form_label" for="id">ouverture : </label>
  
  <input type="date" name="ouverture" id="Lebele" class="from_field" ><br>
  
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
      $sql = "DELETE FROM projet WHERE id =:id;"; 
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$myArray[$i]]);
    $sql = "DELETE FROM estAffecté WHERE id =:id;"; 
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$myArray[$i]]);
    }
     header('location:projet.php') ;
      } }}?>

            </body>

            <script>
              document.getElementById("Aajouter").addEventListener("click", function(event) {
	            event.preventDefault();
              document.getElementById("form").action = 'http://localhost/new%20folder/projet/contrat.php?modifier=Aajouter';
              document.getElementById("form").submit();
              });
              document.getElementById("Amodifier").addEventListener("click", function(event) {
	            event.preventDefault();
              document.getElementById("form").action = 'http://localhost/new%20folder/projet/contrat.php?modifier=Amodifier';
              document.getElementById("form").submit();
              });
              document.getElementById("Asupprimer").addEventListener("click", function(event) {
	            event.preventDefault();
              document.getElementById("form").action = 'http://localhost/new%20folder/projet/contrat.php?modifier=Asupprimer';
              document.getElementById("form").submit();
              });
            </script>
            </html>
            
            