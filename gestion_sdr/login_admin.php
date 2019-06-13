<?php
session_start();
$_SESSION['message']="";
include("cxn.php");
global $db;

if (isset($_POST['submit'])) {

  if (empty($_POST['email_admin']) || empty($_POST['pwd_admin'])) {
    $_SESSION['message']= "Un champ vide";

  }else {
    $email = $db->real_escape_string($_POST['email_admin']);
    $pwd = md5($_POST['pwd_admin']);
    $sql = "SELECT * from inscrire_admin WHERE email_admin = '$email' AND pwd_admin = '$pwd'; ";
    $result = mysqli_query($db,$sql);
    if (mysqli_num_rows($result)) {
      $_SESSION['email_admin'] = $email;
                header("location:admin/index.php");
    }else {
      echo($_SESSION['message']="Wrong email or password.");
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login Administrateur</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

<body>

    <div class="container py-5">


        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text" >
                            <h1><strong>Pour plus d'information</strong> </h1>
                            <div class="description">
                              <p>
                                Numéro : 0539259548 <br>
                                E-mail : ensate_support@uae.ma <br>
                            	</p>
                            </div>
                            
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Bonjour Cher(e) Administrateur</h3>
                            		<h5>Connectez Vous Maintenant</h5>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">



                              <form method="post" action="login_admin.php">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1"><br>email</label>
                                      <input name="email_admin" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer email" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" name="pwd_admin" class="form-control" id="exampleInputPassword1" placeholder="Entrez Password" required>
                                  </div>
                                  <input type="submit" name="submit" value="Login" class="btn btn-block btn-primary">

                                  <div class="alert alert-error">
                                  <p align="center">Vous n'avez pas de compte? <a href="inscrire_admin.php">Inscrivez Vous!</a></p>
                                  <p align="center">Se connectez autant que <a href="login_prof.php">Professeur</a></p>
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
