<?php
session_start();

include "ControlloDatabase.php";
if(isset($_POST['login']))
login();
if(isset($_POST['Registrati']))
Registrazione();
/*
if(!isset($_SESSION['idUtente']))
{
 header("Location:index.html");
 }*/
 if(isset($_POST['Segnalazioni']))
{session_start();
$nome=$_SESSION['Nome'];
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['id'];
    
    
 //header("Location:VisualizzazioneSegnalazioniCivic.php");
 header("Location:VisualizzaSegnalazioneCittadino.php");
 }
 
  if(isset($_POST['Tracking']))
{session_start();
$nome=$_SESSION['Nome'];
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['id'];
 header("Location:Tracking.php");
 }
 
 if(isset($_POST['Statistiche'])){
 session_start();
 $nome=$_SESSION['Nome'];
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['Id_Ente'];
 header("Location:Statistiche.php");
 }
  if(isset($_POST['Profilo'])){
 session_start();
 $nome=$_SESSION['Nome'];
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['id'];
 header("Location:accountCittadino.php");
 }
 
 

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Civic Sense</title>

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
              <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Servizi</a>
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
	$cognome=$_SESSION['Cognome'];
    $idUtente=$_SESSION['id'];
    
    
   // $query=mysql_query("select Nome_Comune,Logo from Ente inner join Comuni where Comune=id_comune and Id_Ente=".$idUtente);

                      


/*
while($result=mysql_fetch_array($query))
{
$Nome_Comune=$result['Nome_Comune'];
$Logo=$result['Logo'];
}
?>
*/
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
                   <!-- <img src="assets2/img/comuni/" class="img-fluid" alt="">-->
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
      <div class="container">
        <div class="section-heading text-center">
          <h2>I tuoi Servizi</h2>
          <p class="text-muted"></p>
          <hr>
        </div>
        <div class="row">
          
          <div class="col-lg-12 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                  <form method="POST" action="homeCittadino.php">
                    <i class="icon-list  text-primary"></i>
                    <h3>Visualizza Segnalazioni</h3>
                    <p class="text-muted">Accedi a questa sezione per visualizzare le segnalazioni presenti nel tuo comune!</p>
                  <input type="submit" name="Segnalazioni" value="Segnalazioni" class="btn btn-ente">
                  </form>   
                 </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <form method="POST" action="homeCittadino.php">
                    <i class="icon-folder-alt text-primary"></i>
                    <h3>Tracking</h3>
                    <p class="text-muted">Accedi a questa sezione per controllare lo stato delle tue segnalazioni!</p>
                  <br>
                  <input type="submit" name="Tracking" value="Tracking" class="btn btn-ente">
                  </form>  
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <form method="POST" action="homeCittadino.php">
                    <i class="icon-graph text-primary"></i>
                    <h3>Visualizza Statistiche</h3>
                    <p class="text-muted">Accedi a questa sezione per visualizzare le statistiche!</p>
                  <input type="submit" name="Statistiche" value="Statistiche" class="btn btn-ente">
                  </form>  
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <form method="POST" action="homeCittadino.php">
                    <i class="icon-wrench  text-primary"></i>
                    <h3>Impostazioni Profilo</h3>
                    <p class="text-muted">Accedi a questa sezione per modificare il tuo profilo!</p>
                  <input type="submit" name="Profilo" value="Account" class="btn btn-ente">
                  </form>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
