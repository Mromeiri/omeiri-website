<?php  
session_start();
if (!isset($_SESSION['mywebsiteanduwontknow']) || $_SESSION['etat'] =='Membre') {
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../script/script.js"></script>
				
	</head>
	<body>  
    <div id="mySidenav" class="sidenav">
    <a href="../index.php" style ="padding : 0px">
			<img src="../images/CEEG.png" class="pro"/>
			<img src="../images/CEEG_NAME.png" class="ceegname" />
		</a>
    <form id="form" action="ajouterProjet.php" method="POST" >
					<a class="btn-add" id="Aajouter" ><i class="fa fa-list icons" ></i> Ajouter</a>
					<a class="btn-add" id="Amodifier"><i class="fa fa-user icons"></i>Modifier</a>
					<a class="btn-add" id="Asupprimer" ><i class="fa fa-tasks icons"></i>   Supprimer</a>
	  			<a class="btn-add" "><i class="fa fa-user icons"></i>   Rechercher</a> 

		</div>

    <div id="main">
        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Employés</span>
	            <span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Employés</span>
            </div>
            <div class="col-div-6">
		        <div class="profile">
                    <img src="../images/user.webp" class="pro-img" />
									
			 <p><?php echo $username ?><span><?php echo $etat ?></span></p> 
		        </div>
	        </div>
            <div class="clearfix"></div>
            <br/>
            <div class="table-container">
                <table>
                <thead>
	            <tr>
                    <th>id</th>
										<th>Username</th>
	                <th>Nom</th>
	                <th>Prenom</th>
	                <th>Date de naissance</th>
                    <th>Poste</th>
										<th>Bureau</th>
                    <th>tel</th>
										
	            </tr>
                </thead>
            <?php 
                $stmt = $pdo ->query("SELECT * FROM employe order by id");
		          while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
			?>
			    <tr>
                    <td><?php echo $row['id'] ?></td>
										<td><?php echo $row['username'] ?></td>
	    		    <td><?php echo $row['nom'] ?></td>
	    		    <td><?php echo $row['prenom'] ?></td>
	   		 	    <td><?php echo $row['dateN'] ?></td>
                    <td><?php echo $row['poste'] ?></td>
										<td><?php echo $row['Bureau'] ?></td>
                    <td><?php echo $row['tel'] ?></td>
										<td class="col_chkbox">
        <input id="myCheckbox" type="checkbox" name=<?php echo "chkbo".$row['id']?>>
      </td>
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
  document.getElementById("form").action = 'http://localhost/new%20folder/employe/gereEmploye.php?modifier=modifier';
  document.getElementById("form").submit();
});
document.getElementById("Aajouter").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/employe/gereEmploye.php?modifier=ajouter';
  document.getElementById("form").submit();
});
document.getElementById("Asupprimer").addEventListener("click", function(event) {
	
  event.preventDefault();
  document.getElementById("form").action = 'http://localhost/new%20folder/employe/gereEmploye.php?modifier=supprimer';
  document.getElementById("form").submit();
});
				</script>
    </body>