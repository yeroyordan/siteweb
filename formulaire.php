<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="formulairestyle.css">
	<title>D.A.C Formulaire_inscription</title>
</head>
<body>
	<!-- Menu de navigation -->
	<?php 
		
		include 'database.php';
	 	global $db;
		// include 'database.php';
	 ?>
	 <a href="index.php"> Retour Accueil</a>

	      <div class="login-box">
	  <h1> INSCRIPTION </h1>
	 <form method="post">
	 	
	 	<div class="textbox">
	 	 Nom<input type="text" name="nom" id="nom" placeholder="Entrer votre nom!!" size="40"maxlength="30"  required> 
		 Prenom<input type="text" name="prenom" id="prenom" placeholder="Entrer votre prenom!!"  size="40"maxlength="30" required>
		 Adresse<input type="email" name="semail" id="semail" placeholder="Entrer votre email!!"  size="40"maxlength="30" required>
	 	 Mot de passe<input type="password" name="password" id="password" placeholder="votre mot de passe"  size="40"maxlength="30" required>
	 	</div>
	 	<input type="submit" name="formsend" id="formsend" class="button"> 
	 	
	 </form>
  </div>

	 <?php
	 	if (isset($_POST['formsend']))
	 	{
	 		# code...
	 		extract($_POST);
	 		// $nom = $_POST['nom'];
	 		// $prenom = $_POST['prenom'];
	 		// $email = $_POST['semail'];
	 		// $password = $_POST['password'];
	 		if (!empty($nom) && !empty($prenom) && !empty($semail) && !empty($password))
	 		{
	 			# code...
	 			# crypter le mot de passe pour eviter qu'elle soit facile à copier
	 			$options = ['cost' => 12,
	 			];
	 			$hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

	 			// verification de l'email pour eviter la repetition
	 			$c = $db->prepare("SELECT email FROM users WHERE email = :email");
	 			$c->execute(['email' => $semail]);
	 			$result = $c->rowCount();
	 			#echo $result;
	 			if ($result == 0) {
	 				# code...
	 				// insertion de nouvel utilisateur
			 		$q = $db->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(:nom,:prenom,:email,:password)");
			 		$q->execute([
		 			'nom' => $nom,
		 			'prenom' => $prenom,
		 			'email' => $semail,
		 			'password' => $hashpass]); 



					echo "<script type=\"text/javascript\">
					alert('Vous êtes enregistré Votre numéro de client est : ". $db->
					lastInsertId()."') </script>";


                  header("location:acces.php");

	 			}
	 			else
	 			{
	 				
	 				echo "<script type=\"text/javascript\">
 		            alert('Cet email existe deja,veuillez changer') </script>";
	 			}
	 			
	 		}
	 	}
	?>
   
</body>

</html>
