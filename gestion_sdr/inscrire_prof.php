<?php
session_start();
$_SESSION['message']="";
include("cxn.php");
global $db;

if (isset($_POST['submit'])) {
    
    if (empty($_POST['email']) || empty($_POST['pwd'])) {
    $_SESSION['message']= "email or password or both are empty !!";
              header("location: index.php");


}
    $nom = $db->real_escape_string($_POST['nom']);
    $prenom = $db->real_escape_string($_POST['prenom']);
    $email = $db->real_escape_string($_POST['email']);
    $departement = $_POST['departement'];
    $phone = $db->real_escape_string($_POST['phone']);
    $pwd = $db->real_escape_string($_POST['pwd']);
    $conf_pwd = $db->real_escape_string($_POST['conf_pwd']);
    $date_ajout = date("d/m/Y h:i:s");
    
if(empty($nom) || empty($prenom)|| empty($email) || empty($departement)|| empty($phone)|| empty($pwd)|| empty($conf_pwd)) {
				
		if(empty($nom)) {
			echo "<font color='red'>Nom vide.</font><br/>";
		}
        if(empty($prenom)) {
			echo "<font color='red'>Prenom vide.</font><br/>";
		}
        if(empty($email)) {
			echo "<font color='red'>Email vide.</font><br/>";
		}
		
		if(empty($departement)) {
			echo "<font color='red'>Département vide.</font><br/>";
		}
		
		if(empty($phone)) {
			echo "<font color='red'>Phone vide.</font><br/>";
		}
        if(empty($pwd)) {
			echo "<font color='red'>Password vide.</font><br/>";
		}
        if(empty($conf_pwd)) {
			echo "<font color='red'>Confirmation Password vide.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else {

    $sql = mysqli_query($db, "insert into inscrire_prof(nom,prenom,email,departement,phone,pwd,conf_pwd,date_ajout,date_m) values ('$nom','$prenom','$email','$departement','$phone','$pwd','$conf_pwd','$date_ajout','$date_ajout');");
    
    if (!$sql) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
    }
    header("location: login_prof.php");

}
  
}
?>


<!DOCTYPE html>
<html lang="fr">

    <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription Professeur</title>


        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

<body>

    <div class="container py-5">

        <div class="top-content">
            <div class="inner-bg">
            <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text" >
                            <h1><strong>Pour plus d'information</strong> </h1>
                            <div class="description">
                              <p>
                                Numéro : 0539259548 <br>
                                E-mail : ensate_support@uae.ma <br>
                            	</p>

                            </div>
                        </div>
                        <div class="col-sm-6 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Vous êtes un Nouveau Professeur!</h3>
                            		<p>Inscrivez vous maintenant</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

			                    <form role="form" action="inscrire_prof.php" method="post" class="registration-form">
			                    	
                                    <div class="form-group">
			                    		<label class="sr-only" for="nom">Nom</label>
			                        	<input type="text" name="nom" placeholder="Votre Nom" class="form-first-name form-control" id="form-first-name"  required >
			                        </div>
                                    
			                        <div class="form-group">
			                        	<label class="sr-only" for="prenom">Prénom</label>
			                        	<input type="text" name="prenom" placeholder="Votre Prenom" class="form-last-name form-control" id="form-last-name" required >
			                        </div><div class="form-group">
			                        	<label class="sr-only" for="prenom">Département</label>
			                        	<input type="text" name="departement" placeholder="Votre departement" class="form-last-name form-control" id="form-last-name" required >
			                        </div>
                                    
                                        
                        
                                    <div class="form-group">
                                <label class="sr-only" for="cin">Téléphone</label>
                                <input type="text" name="phone" placeholder="Téléphone" class="form-user-id form-control" id="form-user-id"  required>
                              </div>  
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Email</label>
                                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez Votre email">
                                  </div>

                              <div class="form-group">
                                <input type="password" name="pwd" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" required >
                                
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                  &#35; Votre mot de passe doit être de 8 à 20 characters de longueur, contient des letteres et numéro, et ne doit pas contenir des espaces, des characters specials, ou emoji.
                                </small>


                              </div>

                              <div class="form-group">
                                <input type="password" name="conf_pwd" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Confirmez Password" required >
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                </small>


                              </div>

			                      <input type="submit" name="submit" value="Inscription" class="btn btn-block btn-primary">

                            <div class="alert alert-error">
                             

                            </div>
			                    </form>

		                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    

    </body>
</html>
