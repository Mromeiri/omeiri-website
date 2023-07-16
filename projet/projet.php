<?php  
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: ..\signIn\signIn.html");
    exit;
}


  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "CEEG";
  $port = 3306;
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
	$username = $_SESSION["username"];
	$etat = $_SESSION["etat"];
  //Construre la requete ?>
<!Doctype HTML>
	<html>
	<head>
		<title></title>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
		<link rel="stylesheet" href="../css/mine.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
	</head>
	<body>  
    <div id="mySidenav" class="sidenav">
    <a href="../index.php" style ="padding : 0px">
			<img src="../images/CEEG.png" class="pro"  />
			<img src="../images/CEEG_NAME.png" class="ceegname" />
		</a>
    <form id="form" action="ajouterProjet.php" method="POST" >
					<a class="btn-add" id="Aajouter" ><i class="fa fa-plus" ></i>   Ajouter</a>
					<a class="btn-add" id="Amodifier"><i class="fa fa-pencil"></i>   Modifier</a>
					<a class="btn-add" id="Asupprimer" ><i class="fa fa-trash"></i>   Supprimer</a>
	  			<a class="btn-add" "><i class="fa fa-search"></i>   Rechercher</a>
					<a class="btn-add" id="Aaffecter" ><i class="fa fa-user icons	"></i>   Affecter Un employé</a>
					<a class="btn-add" id="equipe"><i class="fa fa-group"></i>   Equipe de Projet</a>
					<a class="btn-add" id="contrat"><i class="fa fa-handshake-o"></i>   Contracts</a>
					<a class="btn-add" id="more"><i class="fa fa-plus"></i>   More Information</a>
		</div>

    <div id="main">
        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Projets</span>
	            <span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Projets</span>
            </div>
            <div class="col-div-6">
		        <div class="profile">
                    <img src="../images/user.webp" class="pro-img" />
									
			<p><?php echo $username ?><span><?php echo $etat ?></span></p>
		        </div>
	        </div>
            <div class="clearfix"></div>
            <br/>

		<!--	 <form action="SOSprojet.php" method="POST">
    
        <label class="form_label" for="id">nom : </label>
        <input type="text" name="nom" id="formNom" class="from_field" ><br>
     
  
      <label class="form_label" for="id">chef projet : </label>
      <input type="text" name="chefP" id="formPrenom" class="from_field" ><br>
     
      <div class="form_group">
      <label class="form_label" for="id">Lebele : </label>
      <input type="text" name="Lebele" id="Lebele" class="from_field" ><br>
      </div>
	  <div class="form_group">
      <label class="form_label" for="id">dated : </label>
      <input type="Date" name="dated" id="Lebele" class="from_field" ><br>
      </div>
	  <div class="form_group">
      <label class="form_label" for="id">Lebele : </label>
      <input type="Date" name="dated" id="Lebele" class="from_field" ><br>
      </div>
      <button class="btn-add"type="submit" name="ajouter" value="ajouter">Ajouter</button>
-->
            <div class="table-container">
                <table>
                <thead>
	            <tr>  
              <th>Select</th> 
                    <th>id</th>
	                <th>Nom projet</th>
	                <th>Designation</th>
	                <th>Chef Projet</th>
                    <th>Wilaya</th>
										<th>M ouvrage</th>
                    <th>Etat</th>
                    <th>Objectif</th>
										<th>Date Objectif</th>
                    <th>Performance</th>
										<th>Puissance</th>
                    <th>Ouverture</th>
                    
	            </tr>
                </thead>
            <?php
								if ($etat =='Membre') {
									$sql ="SELECT * FROM projet where chefP =:username";
									$stmt =$pdo->prepare($sql);
    							$stmt->execute(["username"=>$username]);
								} else $stmt = $pdo ->query("SELECT * FROM projet order by id");
                
		          while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
			?>
			    <tr>  
              <td class="col_chkbox"><input id="myCheckbox" type="checkbox" name=<?php echo "chkbo".$row['id']?>></td>
              <td><?php echo $row['id'] ?></td>
	    		    <td><?php echo $row['nom'] ?></td>
              <td><?php echo $row['Lebele'] ?></td>
	    		    <td><?php echo $row['chefP'] ?></td>
	   		 	    <td><?php echo $row['wilaya'] ?></td>
                    <td><?php echo $row['mouvrage'] ?></td>
										<td><?php echo $row['etat'] ?></td>
                    <td><?php echo $row['objectif'] ?></td>
                    <td><?php echo $row['dateobjectif'] ?></td>
                    <td><?php echo $row['performance'] ?></td>
                    <td><?php echo $row['datemes'] ?></td>
                    <td><?php echo $row['anneemesprevue'] ?></td>
                    <td><?php echo $row['puissance'] ?></td>
                    <td><?php echo $row['ouverture'] ?></td>
										
	 		    </tr>

			<?php } ?>
			</table>
			</form>
							
			
	
                  </div>










            <script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
		$(".ceegname").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
		$(".ceegname").css('visibility', 'visible');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>
	<script>
					document.getElementById("Amodifier").addEventListener("click", function(event) {
						

  event.preventDefault();
	document.getElementById("form").method = 'POST';
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=modifier';
  document.getElementById("form").submit();
});
document.getElementById("Aajouter").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=ajouter';
  document.getElementById("form").submit();
});
document.getElementById("Asupprimer").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=supprimer';
  document.getElementById("form").submit();
});
document.getElementById("Aaffecter").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=affecter';
  document.getElementById("form").submit();
});
document.getElementById("equipe").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=equipe';
  document.getElementById("form").submit();
});
document.getElementById("more").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=more';
  document.getElementById("form").submit();
});
document.getElementById("contrat").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/projet/ajouterprojet.php?modifier=contrat';
  document.getElementById("form").submit();
});



const urlParams = new URLSearchParams(window.location.search);
        const alertParam = urlParams.get('alert');
        
        // Display alert if query parameter is present
        if (alertParam === '1') {
            alert('No checkbox checked !');
        }
        if (alertParam === 'choose one') {
            alert('choose one !');
        }
				</script>
			
    </body>