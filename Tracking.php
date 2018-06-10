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
    <style>
 
    .yellow {
    height: 50px;
    width: 50px;
    background-color:  yellow;
    border-radius: 50%;
    display: inline-block;
    }
    
    .red {
    height: 50px;
    width: 50px;
    background-color:  red;
    border-radius: 50%;
    display: inline-block;
}

.green {
    height: 50px;
    width: 50px;
    background-color:  green;
    border-radius: 50%;
    display: inline-block;
}


}
    
  
  </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">CIVIC SENSE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="homeCittadino.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="VisualizzaSegnalazioneCittadino.php">Segnalazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="visualizzaStatistiche.php">Statistiche</a>
              </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="accountCittadino.php">Account</a>
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
    
    
    //$query=mysql_query("select id_comune,Nome_Comune,Logo from Ente inner join Comuni where Comune=id_comune and Id_Ente=".$idUtente);

                      


/*
while($result=mysql_fetch_array($query))
{
$Nome_Comune=$result['Nome_Comune'];
$Logo=$result['Logo'];
$id_comune=$result['id_comune'];
}
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
                    <!--<img src="assets2/img/comuni/" class="img-fluid" alt="">-->
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
<h3>Cerca una segnalazione </h3>
<form name="FormInserisci" class="form-inline" method="post" action="Tracking.php">
   Tracking:
  <input type="text" class="form-control" placeholder="Codice di Tracking" name='Codice_inserito'>
  
  <input type="submit" class="btn btn-ente" name='Cerca' value="Cerca">
</form>


</div>
<br>




<!-- da qua succede il casino-->
<div class="container">
  <?php 
include"db.php";


if(!isset ($_POST['Cerca'])){

$query=mysql_query("select * from Segnalazioni inner join Stato_segnalazione where Segnalazioni.Tracking= Stato_segnalazione.Tracking and id_cittadino=$idUtente");
}else if(isset ($_POST['Cerca'])){
                      $codice_Tracking=$_POST['Codice_inserito'];
                     
                     $query=mysql_query("select * from Segnalazioni inner join Stato_segnalazione where Segnalazioni.Tracking= Stato_segnalazione.Tracking and Segnalazioni.Tracking='$codice_Tracking'");
                      
                      }
                      



while($result=mysql_fetch_array($query))
{
$Descrizione=$result['Descrizione'];
$Tracking=$result['Tracking'];
$Foto=$result['Foto'];
$Posizione=$result['Posizione'];
/*$Latitudine=$result['Latitudine'];
$Longitudine=$result['Longitudine'];
$Comune=$result['Comune'];*/
$Ente=$result['Ente'];
$Importanza=$result['Importanza'];
$Stato=$result['Stato'];

if($Importanza=='Alta'){
$colore="red";
}else if($Importanza=='Media'){
$colore="yellow";
}else if ($Importanza=='Bassa'){
$colore="green";
}



?>

     <h1 class="my-4">Codice Tracking
        <small> <?php echo $Tracking ?></small>
      </h1>

      <!-- Project One -->
      <div class="row">
        <div class="col-md-8">
          
           <!-- <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">-->
          <img class="img-fluid rounded mb-3 mb-md-0" src="img/<?php echo $Foto ?>" alt="" width=700 height=300>
        
         </div>
         <div class="col-md-4">
          <h3>Descrizione</h3>
          <p><?php echo $Descrizione ?></p>
          
          
         <!-- <input class="btn btn-link" type="submit" value="Visualizza informazioni" name="Visualizza"> -->
        <a href="VisualizzaInformazioniEnte.php?Tracking=<?php echo $Tracking ?>" class="btn btn-link" >Visualizza informazioni</a>
        <!--<div class="col-md-4">-->
        <h3>Importanza</h3>
        <span class="<?php echo $colore?>"></span>
        <!--</div>
        <div class="col-md-4">-->
        <h3>Stato</h3>
        <p ><?php echo $result['Stato'] ?></p>
        <!--</div>-->
        </div>
        
        
        
        
     
      
      <!-- /.row -->




<?php
}?>


</div>
</div>
    
    
<!-- qua finisce -->        
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
