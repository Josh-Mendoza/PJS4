<?php
	
		/*$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];*/
		$nom_user=$_POST['username'];
		$mdp=$_POST['password'];

	 function str_compare($str_1,$str_2){
    	if($str_1 == $str_2){
    		return true;	
    	} 
    	else{
    		return false;	
    	} 
   	}


	function validation_connection($nom_user_,$mdp_){
		$bdd = null;
		$serveur="localhost";
		$user="root";
		$password="";
		$base="pjs4";
		//Collecte des informations entrés dans le formulaire.

		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$base, $user, $password);
		

		$vérif_user="SELECT j.nom_joueur,j.mdp_joueur FROM joueur AS j WHERE (j.nom_joueur=? AND j.mdp_joueur=?)";
		$requete =$bdd->prepare($vérif_user);
		// Exemple de requete SQL qui marche :INSERT INTO etudiant VALUES(NULL,"M.","roger","roger","roger@roger","roger","roger","5454","206","2019-02-17",'0')
		$requete->execute(array($nom_user_,$mdp_));
		$resultat=$requete->fetch();
		//while ($resultat=$requete->fetch()) {
			if (str_compare($resultat['username'], $nom_user_)==true && str_compare($resultat['password'], $mdp_)==true) {	
				return count($resultat->fetchAll())>0 && true;	
			}else{
				return false;
			}
		//}
		
	}

	if (validation_connection($nom_user,$mdp)==true) {
		/*$bdd = null;
		$serveur="localhost";
		$user="root";
		$password="";
		$base="pjs4";
		//Collecte des informations entrés dans le formulaire.

		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$base, $user, $password);
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];
*/
		/*header('Location: pageAccueil.php');*/
		echo "Connecté";
	}elseif (validation_connection($nom_user,$mdp)==false) {
		echo "Mot de passe ou id incorrect";
		//header('Location: ../vue/pageLogin.php');
		?>
			<script type="text/javascript">
				alert("Erreur lors de la connexion.");
			</script>
		<?php
	}
	
?>