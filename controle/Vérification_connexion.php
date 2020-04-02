<?php

	 function str_compare($str_1,$str_2){
    	if($str_1 == $str_2) return TRUE;
    	else return FALSE;
   	}


	function validation_connection($nom_user,$mdp){
		$bdd = null;
		$serveur="localhost";
		$user="root";
		$password="";
		$base="pjs4";
		//Collecte des informations entrés dans le formulaire.

		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$base, $user, $password);
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];
		$nom_user=$_SESSION['username'];
		$mdp=$_SESSION['password'];

		$vérif_user="SELECT 'j.nom_joueur','j.mdp_joueur' FROM joueur AS j WHERE         
		('j.nom_joueur'=? AND pass_etu=?) ";
		$resultat =$bdd->prepare($vérif_user);
		// Exemple de requete SQL qui marche :INSERT INTO etudiant VALUES(NULL,"M.","roger","roger","roger@roger","roger","roger","5454","206","2019-02-17",'0')
		$resultat->execute(array($nom_user,$mdp));
		$login_mdp=$resultat->fetch();

		if (str_compare($login_mdp['username'], $nom_user)==true && str_compare($login_mdp['password'], $mdp)) {	
			return count($resultat->fetchAll())>0 && true;	
		}else{
			return false;
		}
	}

	if (validation_connection($_POST['username'],$_POST['password'])==true && isset($_POST['submit'])) {
		$bdd = null;
		$serveur="localhost";
		$user="root";
		$password="";
		$base="pjs4";
		//Collecte des informations entrés dans le formulaire.

		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$base, $user, $password);
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];

		header('Location: pageAccueil.php');
	
	}elseif (validation_connection($_POST['username'],$_POST['password'])==false) {
		header('Location: pageLogin.php');
		?>
			<script type="text/javascript">
				alert("Erreur lors de la connexion.");
			</script>
		<?php
	}
	
?>