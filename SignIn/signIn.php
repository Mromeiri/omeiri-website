<?php 
session_start();

// Vérifie si l'utilisateur est déjà connecté, si oui, redirige vers une autre page
if (isset($_SESSION['mywebsiteanduwontknow'])) {
  header("Location: ../index.php");
  exit;
}




$username = $_POST['username'];
$passsword = $_POST['password'];

$host = "localhost";
  $user = "root";
  $password="";
  $dbname = "ceeg";
  $port = 3306;
  
  //Data Source name (DSN)
  $dsn = "mysql:host=".$host.";dbname=".$dbname.";port=".$port;
  //Creation du pdo
  $pdo = new PDO($dsn,$user,$password);

  $sql = "select * from login where username=:username and password=:password";
          

    $stmt =$pdo->prepare($sql);
    $stmt->execute(["username"=>$username,"password"=>$passsword]);

    if ($stmt->rowCount() == 0) {
      header('location:signIn.html?alert=Password or Username unvalid') ;
    }else{
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Verify the login credentials (replace with your own authentication logic)
        
            // Authentication successful, create a session
            $_SESSION["mywebsiteanduwontknow"] = $username;
            $_SESSION["username"] = $username;
            $_SESSION["passsword"] =  $passsword;
            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
              $_SESSION["etat"] =  $row['etat'];
              
              $_SESSION["firstname"] =  $row['firstname'];
              $_SESSION["lastname"] =  $row['lastname'];
              
            }
            header("Location:..\index.php");
            exit;
        } 
    }
    
    
   

    






?>