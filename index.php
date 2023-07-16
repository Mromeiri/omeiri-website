<?php
   
	 
session_start();

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: signIn\signIn.php");
    exit;
} else{
	echo $_SESSION['username'];

$username = $_SESSION['username'];


  $host = "localhost";
  $user = "root";
  $password="";
  $dbname = "CEEG";
  $port = 3306;
    
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);
  //Construre la requete
  $stmt = $pdo ->query("SELECT count(id) FROM projet;");
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $totalProjet= $row['count(id)'];
  }
  $stmt = $pdo ->query("SELECT count(id) FROM employe;");
  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $totalEmploye= $row['count(id)'];
  }
	$username = $_SESSION["username"];
	$etat = $_SESSION["etat"];}

  ?>
<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	</head>
	

	<body>
		
		<div id="mySidenav" class="sidenav">
			<div id="img_div">
			<a href="index.php" style ="padding : 0px">
		<img src="images/CEEG.png" class="pro"  />
		<img src="images/CEEG_NAME.png" class="ceegname" />
</a>	
			</div>
		

	  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
	  <a href="projet/projet.php"class="icon-a"><i class="fa fa-users icons"></i>   Projects</a>
		<?php if (!($etat == 'Membre')) { ?>
	  <a href="employe/employe.php"class="icon-a"><i class="fa fa-list icons"></i>   Employers</a>
		<?php } ?>
	  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i>   Fournisseur</a>
	  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i>   Inventory</a>
	  <a href="account/account.php"class="icon-a"><i class="fa fa-user icons"></i>   Account</a>
	  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i>   Tasks</a>

	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Dashboard</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Dashboard</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			<img src="images/user.webp" class="pro-img" />
			<form action="deconect.php" method="post">
			<a href="deconect.php">Logout</a>
			</form>
			<p><?php echo $username ?><span><?php echo $etat ?></span></p>
		</div>
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		
		<div class="col-div-3">
			<div class="box">
				<p><?php echo $totalProjet ?> <br/><span>Projects</span></p>
				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p><?php echo $totalEmploye ?><br/><span>Employers</span></p>
				<i class="fa fa-list box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>99<br/><span>Fournisseurs</span></p>
				<i class="fa fa-shopping-bag box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>78<br/><span>Incidents</span></p>
				<i class="fa fa-tasks box-icon"></i>
			</div>
		</div>
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p>La liste des Projets en cours ... </p>
				<br/>
				<table>
				<thead>
	  				<tr>	
	    				<th>Nom projet</th>
	    				<th>Chef Projet</th>
	   					<th>Designation</th>
	  				</tr>
				</thead>

	  <?php 
		
			# code...
		
	  	$stmt = $pdo ->query("SELECT * FROM projet LIMIT 4;");
		  while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
			
			?>
			<tr>
	    		<td><?php echo $row['nom'] ?></td>
	    		<td><?php echo $row['chefP'] ?></td>
	   		 	<td><?php echo $row['Lebele'] ?></td>
	 		</tr>

			<?php 
		  }
		  ?>
	  
	  
	</table>
			</div>
		</div>
		</div>

		<div class="col-div-4">
			<div class="box-4">
			<div class="content-box">
			<p>L'etat d'avancement </p>

				<div class="circle-wrap">
	    <div class="circle">
	      <div class="mask full">
	        <div class="fill"></div>
	      </div>
	      <div class="mask half">
	        <div class="fill"></div>
	      </div>
	      <div class="inside-circle"> 70% </div>
	    </div>
	  </div>
			</div>
		</div>
		</div>
			
		<div class="clearfix"></div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>
	<link rel="stylesheet" href="css/mine.css" type="text/css"/>
	</body>


	</html>