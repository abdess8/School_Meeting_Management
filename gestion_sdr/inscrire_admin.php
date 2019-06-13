<?php
session_start();
$_SESSION['message']="";
include("cxn.php");
global $db;

function secureInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if (isset($_POST['submit'])) {
    
    if (empty($_POST['email_admin']) || empty($_POST['pwd_admin'])) {
    $_SESSION['message']= "email or password or both are empty !!";
              header("location: inscrire_admin.php");  }
    $nom_admin = $db->real_escape_string($_POST['nom_admin']);
    $prenom_admin = $db->real_escape_string($_POST['prenom_admin']);
    $email_admin = $db->real_escape_string($_POST['email_admin']);
    $cin_admin = $db->real_escape_string($_POST['cin_admin']);
    $phone_admin = $db->real_escape_string($_POST['phone_admin']);
    $pwd_admin = md5($_POST['pwd_admin']);
    $conf_pwd_admin = md5($_POST['conf_pwd_admin']);

    
    if ($_POST['pwd_admin'] === $_POST['conf_pwd_admin']) {
        
    $sql = "insert into inscrire_admin(nom_admin,prenom_admin,email_admin,cin_admin,phone_admin,pwd_admin,conf_pwd_admin) values ('$nom_admin','$prenom_admin','$email_admin','$cin_admin','$phone_admin','$pwd_admin','$conf_pwd_admin')";
    
    if ($db->query($sql) === true) {
      $_SESSION['message']= "Registration Successful.";
      header("location: login_admin.php");
    }else {
      $_SESSION['message']= "user could not be added to database";
    }

  }else {
    $_SESSION['message']='Password and Confirm Password are not same.';
  }

}

?>

<!DOCTYPE html>
<html lang="fr">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription Administrateur</title>

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
                        			<h3>Vous êtes un Nouveau Administrateur!</h3>
                            		<p>Inscrivez vous maintenant</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">

			                    <form role="form" action="inscrire_admin.php" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="nom">Nom</label>
			                        	<input type="text" name="nom_admin" placeholder="Votre Nom" class="form-first-name form-control" id="form-first-name"  required >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="prenom">Prénom</label>
			                        	<input type="text" name="prenom_admin" placeholder="Votre Prenom" class="form-last-name form-control" id="form-last-name" required >
			                        </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">@Email</label>
                                      <input name="email_admin" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez Votre email">
                                  </div>

                              <div class="form-group">
                                <label class="sr-only" for="cin">CIN</label>
                                <input type="text" name="cin_admin" placeholder="CIN" class="form-user-id form-control" id="form-user-id"  required>
                              </div>   
                                <div class="form-group">
                                <label class="sr-only" for="phone">Téléphone</label>
                                <input type="text" name="phone_admin" placeholder="Téléphone" class="form-user-id form-control" id="form-user-id"  required>
                              </div>                    			                                                             

                              <div class="form-group">
                                <input type="password" name="pwd_admin" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Password" required >
                                
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                  &#35; Votre mot de passe doit être de 8 à 20 characters de longueur, contient des letteres et numéro, et ne doit pas contenir des espaces, des characters specials, ou emoji.
                                </small>


                              </div>

                              <div class="form-group">
                                <input type="password" name="conf_pwd_admin" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Confirmez Password" required >
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>
        
</html>
