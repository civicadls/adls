<?php
include"db.php";
session_start();
$id=$_SESSION['id_comune'];



if(isset($_POST['Riesamina'])){
   $id=$_POST['Riesamina'];
mysql_query("update Stato_segnalazione set Stato='Approvata' where id_stato=$id");
header("Location:RiepilogoSegnalazioni.php");
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

          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="homeSquadra.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="VisualizzaSegnalazioneSquadra.php">Segnalazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="visualizzaStatistiche.php">Statistiche</a>
              </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="accountSquadra.php">Account</a>
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
    $idUtente=$_SESSION['id_squadra'];


    $query=mysql_query("select id_comune,Nome_Comune,Logo from Ente inner join Comuni where Comune=id_comune and id_squadra=".$idUtente);





while($result=mysql_fetch_array($query))
{
$Nome_Comune=$result['Nome_Comune'];
$Logo=$result['Logo'];
$id_comune=$result['id_comune'];
$_SESSION['id_comune']=$id_comune;
}
?>

    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">BENVENUTO <?php echo "$nome $cognome"; ?></h1>
              
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/comuni/<?php echo $Logo ?>" class="img-fluid" alt="">
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
<h3>Riepilogo segnalazioni </h3>



</div>
<br>


      <div class="container">
      	<form name="FormTabella" method="post" action="RiepilogoSegnalazioni.php">
      <table class="table table-condensed">
    <thead>
      <tr>
        <th>Tracking Segnalazione</th>
        <th>Modifica</th>
       

      </tr>
    </thead>
      <?php
include"db.php";
$query=mysql_query("select Stato_segnalazione.Tracking as tracking,id_stato from Segnalazioni inner join Stato_segnalazione inner join Intervento where Segnalazioni.Tracking= Stato_segnalazione.Tracking and Intervento.Tracking=Segnalazioni.Tracking and Stato_segnalazione.Stato='Conclusa' and id_gruppo=$idUtente");
while($result=mysql_fetch_array($query))
{

?>
    <tbody>
      <tr>
        <td><?php echo $result['tracking']?></td>
       <!--<td><?php // echo $result['Mail']?></td>-->
        <td><input value="<?php echo $result['id_stato']?>" name="Riesamina" type="image" src="img/riesamina.png" width=30 height=30>
      </tr>


    </tbody>
    <?php }?>
  </table>
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
