<?php
include_once("modele/Modele.php");
class Controle {
	public $modele;
	
	public function __construct() {
        $this->modele = new Modele();
    }
	
	public function invoke() {
		$reslt = $this->modele->getlogin();     
		if($reslt == 'login') {
			include 'vue/pageAccueil.php';
		}
		else {
			include 'vue/pageLogin.php';
		}
	}
}
?>