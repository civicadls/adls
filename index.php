<?php
include "db.php";
$nome=$_POST['Nome'];
	$cognome=$_POST['Cognome'];
	$email=$_POST['Email'];
    $password=$_POST['Password'];
    //$comune=$_POST['Comune'];
    
    
    //if($comune!=""){
    /*
    $query=mysql_query("select * from Comuni where Nome_Comune='$comune'");

while($result=mysql_fetch_array($query))
{
   $id_comune=$result['id_comune'];
    }*/
   // }
	
if(isset($_POST['Registrati_utente']))
{
	$sql=mysql_query("INSERT INTO Utente(Nome,Cognome, Mail, Password) VALUES ('$nome', '$cognome', '$email', '$password')");
	$id=mysql_insert_id();
    session_start();
        $_SESSION['Nome']=$nome;
		$_SESSION['Cognome']=$cognome;
         $_SESSION['id']=$id;
       
		header("Location:homeCittadino.php");
	
}


if(isset($_POST['Registrati_ente']))
{
$comune=$_POST['Comune'];
  $query=mysql_query("select * from Comuni where Nome_Comune='$comune'");

while($result=mysql_fetch_array($query))
{
   $id_comune=$result['id_comune'];
    }
    
	$sql=mysql_query("INSERT INTO Ente(Nome,Cognome,Comune, Mail, Password) VALUES ('$nome', '$cognome','$id_comune', '$email', '$password')");
	$id=mysql_insert_id();
    session_start();
        $_SESSION['Nome']=$nome;
		$_SESSION['Cognome']=$cognome;
         $_SESSION['id']=$id;
       
		header("Location:homeEnte.php");
	
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
              <a class="nav-link js-scroll-trigger" href="#download">Download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#features">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#myModal" data-toggle="modal">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#myModal1" data-toggle="modal">Registrati</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contatti</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <div class="modal fade" id="myModal" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
                                	<div class="modal-dialog">
                                    	<div class="modal-content">
                                        	<div class="modal-header">
                                            	<h4 class="modal-title" id="myModalLabel">ACCEDI</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            </div><!--modal-header-->
                                            
                                            <div class="modal-body">
                                            	<form name="FormLogin" method="post" action="homeEnte.php">
                                                	<div class="form-group">
                                                    	<div class="input-group">
                                                        	<input type="text" class="form-control" id="Email" placeholder="Email" name="Email">
                                                        </div>
                                                    </div><!--form-group-->   
                                                    <div class="form-group">
                                                    	<div class="input-group">
                                                        	<input type="password" class="form-control"  placeholder="Password" name="Password" type="password">
                                                        </div>
                                                        <a class="nav-link" href="#myModalRecPass" data-toggle="modal">Hai dimenticato la password?</a>
                                                    </div><!--form-group--> 
                                                    <div class="modal-footer">
                                                    <input class="form-control btn btn-primary" type="submit" value="Login" name="login">
                                                     </div>
                                                 </form>
                                            </div><!--modal-body-->
                                            
                                            	
                                                
				
                                           
                                         </div><!--modalcontent-->
                                      </div><!--modaldialog-->
                                    </div><!--modalfade--> 
    <!--End login-->
    <!--Rec Pass-->
         <div class="modal fade" id="myModalRecPass" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
                                	<div class="modal-dialog">
                                    	<div class="modal-content">
                                        	<div class="modal-header">
                                            	<h4 class="modal-title" id="myModalLabel">RECUPERA</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            </div><!--modal-header-->
                                            
                                            <div class="modal-body">
                                            	<form name="FormLogin" method="post" action="homeEnte.php">
                                                	<div class="form-group">
                                                    	<div class="input-group">
                                                        	<input type="text" class="form-control" id="Email" placeholder="Email" name="Email">
                                                        </div>
                                                    </div><!--form-group-->   
                                                     
                                                    <div class="modal-footer">
                                                    <input class="form-control btn btn-primary" type="submit" value="Recupera" name="login">
                                                     </div>
                                                 </form>
                                            </div><!--modal-body-->
                                            
                                            	
                                                
				
                                           
                                         </div><!--modalcontent-->
                                      </div><!--modaldialog-->
                                    </div>
    <!--end recPass-->
	<!--scelta ruolo-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">REGISTRATI</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>
    <div class="modal-footer">
    <a href="#myModal2" type="submit" class="form-control btn btn-primary" data-toggle="modal">ENTE</a>
    </div>
    <div class="modal-footer">
    <a href="#myModal3" type="submit" class="form-control btn btn-primary" data-toggle="modal">CITTADINO</a>			
    </div>
    </div>
    </div>
    </div>
    
    <!--endscelta-->
    <!---Reg ente-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                	<div class="modal-dialog">
                                                    	<div class="modal-content">
                                                        	<div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">REGISTRATI</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form role="form" method="POST" action="index.php">
                                                            	<div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Nome" placeholder="nome" name="Nome">
                                                                        </div>
                                                                        </div>
                                                                <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Cognome" placeholder="cognome" name="Cognome">
                                                                        </div>
                                                                        </div>  
                                                                 <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Email" placeholder="email" name="Email">
                                                                        </div>
                                                                        </div>  
                                                                 <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Pasword" placeholder="pass" name="Password">
                                                                        </div>
                                                                        </div> 
                                                                 <div class="form-group">
                                                                	<select class="form-control" name="Comune">
                                                                    <?php 
                                                                     include"db.php";
                                                                     $query=mysql_query("select * from Comuni");
                                                                     while($result=mysql_fetch_array($query))
                                									{?>

																
          															<option><?php echo $result['Nome_Comune'] ?></option>
         															 <?php }?>
                                                                   <!-- 
                                                                    <option>Bari</option>
                                                                    <option>Molfetta</option>
                                                                    <option>Altro</option>-->
                                                                    </select>
                                                                        </div>  
                                                                        <div class="modal-footer">
                                                                        <input type="submit" class="form-control btn btn-primary" name="Registrati_ente" value="Registrati">
                                                                        
				
                                                                        </div>
                                                                        </form>
                                                                        </div>
                                                                        
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        <!--endreg-->
<!--reg citt-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                	<div class="modal-dialog">
                                                    	<div class="modal-content">
                                                        	<div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">REGISTRATI</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form method="POST" action="index.php">
                                                            	<div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Nome" placeholder="nome" name="Nome">
                                                                        </div>
                                                                        </div>
                                                                <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Cognome" placeholder="cognome" name="Cognome">
                                                                        </div>
                                                                        </div>  
                                                                 <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Email" placeholder="email" name="Email">
                                                                        </div>
                                                                        </div>  
                                                                 <div class="form-group">
                                                                	<div class="input-group">
                                                                    	<input type="text" class="form-control" id="Password" placeholder="Password" name="Password" >
                                                                        </div>
                                                                        </div> 
                                                                        <div class="modal-footer">
                                                                        <input type="submit" class="form-control btn btn-primary" id="Registrati_utente" value="Registrati" name="Registrati_utente">
                                                                        
				
                                                                        </div>
                                                                        </form>
                                                                        </div>
                                                                        
                                                                        </div>
                                                                        </div>
                                                                        </div>
                                                                        <!--endreg-->
<!--end reg-->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Civic Sense</h1>
              <p>Oggigiorno la segnalazione di un disservizio o problema avviene attraverso l’uso di numeri telefonici dedicati che i vari enti e soggetti gestori mettono a disposizione.
                      Civic Sense è un sistema con il quale un cittadino può segnalare agevolmente guasti, problemi, malfunzionamenti e, in generale, «eventi rilevanti» per un soggetto che eroga servizi o gestisce infrastrutture di interesse pubblico (Acquedotto, elettricità, strade e viabilità, sicurezza urbana, ecc…)
</p>
              <a href="#features" class="btn btn-outline btn-xl js-scroll-trigger">Per saperne di più!</a>
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
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

    <section class="download bg-primary text-center" id="download">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h2 class="section-heading">Scopri di cosa si tratta!</h2>
            <p>Scarica subito l'app dedicata!</p>
            <div class="badges">
              <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
              <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="features">
      <div class="container">
        <div class="section-heading text-center">
          <h2>Le nostre funzionalità!</h2>
          
          <hr>
        </div>
        <div class="row">
          <div class="col-lg-4 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/demo-screen-1.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 my-auto">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-screen-smartphone text-primary"></i>
                    <h3>Device Mockups</h3>
                    <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-camera text-primary"></i>
                    <h3>Flexible Use</h3>
                    <p class="text-muted">Put an image, video, animation, or anything else in the screen!</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-present text-primary"></i>
                    <h3>Free to Use</h3>
                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feature-item">
                    <i class="icon-lock-open text-primary"></i>
                    <h3>Open Source</h3>
                    <p class="text-muted">Since this theme is MIT licensed, you can use it commercially!</p>
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
        <ul class="lista">
        <li><i class="fa fa-home fa"></i>Campus Università degli Studi di Bari "Aldo Moro", BARI</li>
        <li><i class="fa fa-envelope fa"></i>sciancaleporeluca@gmail.com</li>
        <li><i class="fa fa-envelope fa"></i>andr.91@hotmail.it</li>
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
    
    
    

  </body>

</html>
