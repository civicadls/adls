<?php
include "db.php";
function Login()
{
		$username=$_POST['Email'];
	    $password=$_POST['Password'];

	    $sql=mysql_query("select * from Utente where Mail='$username' and Password='$password'");
	    $numero=mysql_num_rows($sql);
        if($numero!=0){
              while($data=mysql_fetch_array($sql)){
		            $dbidUtente=$data['id'];

 	                $dbpassword=$data['Password'];

 	                $nome=$data['Nome'];
                    $mail=$data['Mail'];

 	                $cognome=$data['Cognome'];

                    session_start();
                    $_SESSION['Nome']=$nome;
		            $_SESSION['Cognome']=$cognome;
                    $_SESSION['id']=$dbidUtente;
		            header("Location:homeCittadino.php");
                                                  }
                      }
	     else
        {

					$sql=mysql_query("select * from Ente where Mail='$username' and Password='$password'");
					//$data=mysql_fetch_array($sql);
				    $numero=mysql_num_rows($sql);
                     if($numero!=0){
                        while($data=mysql_fetch_array($sql)){
		                      $dbidUtente=$data['Id_Ente'];

 	                          $dbpassword=$data['Password'];

 	                          $nome=$data['Nome'];
                              $mail=$data['Mail'];

                              $cognome=$data['Cognome'];

                              session_start();
                              $_SESSION['Nome']=$nome;
		                      $_SESSION['Cognome']=$cognome;
                              $_SESSION['Id_Ente']=$dbidUtente;
		                      header("Location:homeEnte.php");


                                                            }
                                    }else{
                               header("Location:index.php");
                                          }
                             }
 }


 function Registrazione()
 {
 $nome=$_POST['Nome'];
	$cognome=$_POST['Cognome'];
	$email=$_POST['Email'];
    $password=$_POST['Password'];

if(isset($_POST['Registrati']))
{
	$sql=mysql_query("INSERT INTO Utente(Nome,Cognome, Mail, Password) VALUES ('$nome', '$cognome', '$email', '$password')");
	$id=mysql_insert_id();
    session_start();
        $_SESSION['Nome']=$nome;
		$_SESSION['Cognome']=$cognome;
         $_SESSION['id']=$id;

		header("Location:Home.php");
	
}

}
 ?>
