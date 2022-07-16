<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
		 <link rel="stylesheet" href="style.css"/>

	<title>D.A.C Accueil</title>
</head>
<body>
              <div class="main">
              	<div class="navbar">
              		<div class="icon">
              			<img src="logo.jpg" alt="logo D.A.C" width="100" height="80" />

              		</div>

              		<div class="menu"> 

                      <ul>
           						<li>    <a href="#">Accueil</a>      </li>
           						<li>	<a href="#presentation">Presentation</a>   </li>
           						<li>	<a href="#connexion">Connexion</a>    </li>
           						<li>   <a href="#contact">Contact</a> 	</li>
           			  </ul>

              		</div>

              		
 
              	</div>

              	<div class="content">
              		
                   <h1> DIADEME <br> <span>ATHLETIQUE</span> <br> CLUB </h1>
                   <p class="par">
                   	
                   	
                   </p>

                   <button class="cn"><a href="formulaire.php">S'inscrire</a></button>


               <div class="form">
               	<h2 id="connexion">CONNEXION</h2>
               
               <form method="post" action="">
                 
               
               <input type="email" name="lemail" placeholder="Votre email" required>
               <input type="password" name="lpassword" placeholder="Votre mot de passe" required>
               <input type="submit"name="formlogin" id="formlogin" value="valider" class="cn">
               

               </form> 






           <!-- verifier si l'utilisateur est dans notre base -->
    <?php
     include 'database.php';
      if (isset($_POST['formlogin']))
      {
        extract($_POST);
        if (!empty($lemail) && !empty($lpassword))
        {
          $q = $db->prepare("SELECT * FROM users WHERE email = :email");
          $q->execute(['email' => $lemail]);
          $result = $q->fetch();
          
          if ($result == true)
          {
            # le compte existe bien
            if (password_verify($lpassword, $result['password']))
            {
              # code...
             # echo "<a href=\"suiv1.php\">continuer</a>";


 echo "<script type=\"text/javascript\">
 		alert('vous etes bien authentifié!') </script>";

          header("location:acces.php");

           }
            else
            {
              echo "Le mot de passe n'est pas correct";
              
            }
            
            
          }
          else
          {
            echo "desole Le compte portant l'email  " .$lemail. "  n'existe pas";
          }
        }
        else
        {
          echo "Veillez completer l'ensemble des champs";
        }
      }
    ?>



               </div>
               


              	</div>
              </div>

              <section class="main2", id="presentation"> 
               	<div class="content2">
               	 		<div class="card2">
                   			<div class="left2">
                   	  			<h1>Nos Valeurs (mot du president)</h1>
                   	  			<p>Le basket est un sport qui permet d’inculquer aux jeunes le goût de l’effort, de la compétition et de la solidarité dans un contexte convivial où la notion de plaisir doit toujours être présente.
								Diadème Athlétique Club s’efforce au quotidien de s’inscrire dans ce registre tout en s’évertuant à obtenir les meilleurs résultats possibles dans les diverses compétitions où elle est engagée.
								A ce titre, l’équipe seniors masculine évolue en championnat national depuis de nombreuses années et peut constituer un vecteur de communication intéressant.
								Pour conserver nos valeurs, atteindre de nouveaux objectifs, nous avons besoin d’accroître encore notre réseaux de partenaires. J’en profite pour remercier chaleureusement ceux qui depuis longtemps nous font confiance.
								</p>
                   			</div>

                   			<div class="right2">
                   	   			<img src="presi.jpg" alt="presi" width="100" height="80" />
                   </div>
                   
               	  </div>


                     <div class="card2">
                   				<div class="left2">
                   	  				<h1>A propos du DAC & Ojectif</h1>
                   	  					<p>Le Diadème Athlétique Club est une association sans but lucratif créé en 2010, avec une vingtaine de licenciés. Depuis, le nombre d’adhérents n’a cessé de progresser, ce qui prouve une implantation et une implication très fortes du Diadème Athlétique Club dans la vie de la commune.
                       					Le Club a pour mission de faire pratiquer ce sport à un grand nombre de Jeunes, dans le cadre des compétitions organisées par la Fédération Burkinabè de Basket-Ball
										Ainsi le Club a toujours su réunir des Jeunes issus de tous les horizons géographiques et de tous les milieux sociaux autour du basket-ball.
										</p>
                   				</div>

                   				<div class="right2">
                   	   			<img src="dac12.jpg" alt="dac12" width="100" height="80" />
                   				</div>
                   
               	  		</div>

               </div>

              </section>


          <footer> 
              	<h1 id="contact">Contact</h1> 
            <div class="Services">
            	        
              <div class="Service">
             	<h3>Editeurs</h3>
             	<table> 
                <tr>
				     <td>Diallo</td>
					 <td>Mouhamad </td>
					 <td>tel:66810973</td>
					 <td>yeroyordan@gmail.com</td>
				  </tr>
          <tr>
				   <td>Baribari</td>
					 <td>A.Bechir</td>
					 <td>tel:75101600</td>
					 <td>ahamedbaribari1@gmail.com</td>
				  </tr>


				</table>
             	
             </div>

             <div class="Service">
             	<h3>Club</h3>
             	<p style ="font-size: 15px" ;> RECEPISSE N°2014-610/MATDS/RHBS/PHUE/HCBDLS/SG/DAG 
							<br>Siège social : Bobo-Dioulasso, secteur 20 Lafiabougou
							<br>Adresse : 01 BP 576 Bobo-Dioulasso (BFA)/Tel. : 20 95 56 00
							<br>Cell. : (+226) 70 85 61 20/78 01 49 66/76 45 18 80 <br>
							Email : diadem_ac@yahoo.fr <br>
             </div>

             <div class="Service">
             	<h3>President</h3>
             	<p>MAMADOU DIARRA<br>
             	Tel : 74-85-51-51 <br>domicilié à Bobo-Dioulasso</p>
             </div>
                  
           </div>
         </footer>
</body>
</html>