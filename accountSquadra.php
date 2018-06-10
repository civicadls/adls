<?php 
include "db.php";
session_start();

$nome_update=$_POST['Nome'];
$cognome_update=$_POST['Cognome'];
$mail_update=$_POST['Mail'];
$password_update=$_POST['Password'];
if(isset($_POST['Modifica'])){


mysql_query("update Squadra set Nome='$nome_update',Mail='$mail_update',Password='$password_update' where id_squadra=".$_SESSION['id_squadra']);
session_start();
       $nome=$_SESSION['Nome'];
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['id'];
//header("Location:accountCittadino.php");


}
?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">
	
    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">
   	<link href="css/new-age.css" rel="stylesheet">
    

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">CIVIC SENSE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="homeSquadra.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="VisualizzaSegnalazioneSquadre.php">Segnalazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="RiepilogoSegnalazioni.php">Riepilogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="Statistiche.php">Statistiche</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="Logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   						     <?php 
	
session_start();
$nome=$_SESSION['Nome'];
	
    $idUtente=$_SESSION['id_squadra'];
    
   /* 
    $query=mysql_query("select Nome_Comune,Logo from Ente inner join Comuni where Comune=id_comune and Id_Ente=".$idUtente);

                      



while($result=mysql_fetch_array($query))
{
$Nome_Comune=$result['Nome_Comune'];
$Logo=$result['Logo'];
}*/
?>

    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h1>
              <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a>
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    

    <section class="features" id="features">
    
<?php
include "db.php";
    $query=mysql_query("select * from Squadra where id_squadra=$idUtente");

         
while($result=mysql_fetch_array($query))
{
$Nome=$result['Nome'];
//$Cognome=$result['Cognome'];
$email=$result['Mail'];
$password=$result['Password'];
}?>
    
      <div class="container">
        <div class="section-heading text-center">
          <h2>Account</h2>
          <p class="text-muted">In questa sezione è possibile modificare il tuo profilo</p>
          <hr>
        </div>
        <form method="POST" action="accountSquadra.php">
       <div align="center" class="form-group row">
       	<label for="example-text-input" class="col-6 col-form-label">Nome</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<?php echo $Nome?>" name="Nome">
            </div>
        </div>
        
        <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Email</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<?php echo $email?>" name="Mail">
            </div>
            </div>
        <div align="center" class="form-group row">    
        <label for="example-text-input" class="col-6 col-form-label">Password</label>
        <div class="col-4">
        	<input class="form-control" type="text" value="<? echo $password?>" name="Password">
            </div>
            </div>
        <div class="form-group row" >   
       <div class="col-7"></div>
       
       <div class="col-3" align="right">
       <input type="submit" class="btn btn-ente"  name="Modifica" value="Salva">
       <input type="submit" class="btn btn-ente"  name="Annulla" value="Annulla">
       </div>
       <div class="col-2"></div>
       </div>
       </form>
       
       
       </div>
     </section>
    
 <section class="contact bg-primary" id="contact">
      <div class="container">
        <h2>Contatti</h2>
        <ul class="lista"><center>
        <li><i class="fa fa-home fa"></i>Campus Università degli Studi di Bari "Aldo Moro", BARI</li>
        <li><i class="fa fa-envelope fa"></i>sciancaleporeluca@gmail.com</li>
        <li><i class="fa fa-envelope fa"></i>andr.91@hotmail.it</li></center>
        </ul>
       
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2018 Copyright: D'Amico Andrea Sciancalepore Luca</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
    <script src="assets2/js/carousel.js"></script>
    <!--js nuovo-->
    

  </body>

</html>
