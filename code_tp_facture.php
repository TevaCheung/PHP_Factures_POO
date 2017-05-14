<?php
	class client{ //----------------------------------
		private $_idClient;
		private $_nom;
		private $_prenom;
		private $_adresse;
		private static $_nbClient=0; 
		
		// FONCTIONS MEMBRES *********************	
		// relations avec fact
		private $_fact=array();
		public function remove_fact($i){
			$this->unset(_fact($i));	
		}
		
		public function add_fact($facture){
			$i=count($this->_fact);
			$this->_fact($i)=$facture;
		}
		
		public show_fact(){
			
		}
		
		//Affichage -----------------------------
		private static function initCli(){
			self::$_nbClient++;
		}
		
		//Constructeur --------------------------
		public function __construct($idClient,$nom,$prenom,$adresse){
			$this->_idClient=$idClient;
			$this->_nom=$nom;
			$this->_prenom=$prenom;
			$this->_adresse=$adresse;
			self::initCli();
			echo "Constructeur".'<br/>';
		}
			
		//Destructeur ----------------------------
		public function __destruct(){		
			$this->_idClient;
			$this->_nom;
			$this->_prenom;
		}
		
		//Mutateurs -----------------------------
		public function getNbPoint(){
			return self::$_nbPoint; // self est a utiliser pr les variables statiques
		}
		
		public function getidClient(){
			return $this->_idClient;	
		}		
		
		public function getnom(){
			return $this->_nom;	
		}		
		
		public function getprenom(){
			return $this->_prenom;
		}
		
		public function setidClient($idClient){
			$this->_idClient=$idClient;
		}		
		
		public function setnom($nom){
			$this->_nom=$nom;
		}		
		
		public function setprenom($prenom){
			$this->_prenom=$prenom;
		}
		
		//Autres -------------------------------------------
		public function affichePoint(){
			echo $this->_idClient.'<br/>';
			echo $this->_nom.'<br/>';
			echo $this->_prenom.'<br/>';
			echo $this->_adresse;
			echo 'Instances : ' . self::$_nbPoint . '<br/>';
		}
		
	}
		
	class facture{ // *******************************
		private $_idFact;
		private $_modePaiement;
		private $_dateFact;
		private static $_nbFact=0; 
		
		// FONCTIONS MEMBRES 	--------------------
		private static function initFact(){
			self::$_nbFact++;
		}
		
		//Constructeur ----------------------------
		public function __construct($idFact,$modePaiement,$dateFact,$adresse){
			$this->_idFact=$idFact;
			$this->_modePaiement=$modePaiement;
			$this->_dateFact=$dateFact;
			self::initFact();
			echo "Constructeur".'<br/>';
		}
			
		//Destructeur -----------------------------
		public function __destruct(){		
			$this->_idFact;
			$this->_modePaiement;
			$this->_dateFact;
		}
		
		public function afficheFact(){
			echo $this->_idFact.'<br/>';
			echo $this->_modePaiement.'<br/>';
			echo $this->_dateFact.'<br/>';
			echo 'Instances : ' . self::$_nbFact . '<br/>';
		}
		
		//Mutateurs --------------------------------
		public function getNbPoint(){
			return self::$_nbPoint; // self est a utiliser pr les variables statiques
		}
		
		public function getidFact(){
			return $this->_idFact;	
		}		
		
		public function getmodePaiement(){
			return $this->_modePaiement;	
		}		
		
		public function getdateFact(){
			return $this->_dateFact;
		}
		
		public function setidFact($idFact){
			$this->_idFact=$idFact;
		}		
		
		public function setmodePaiement($modePaiement){
			$this->_modePaiement=$modePaiement;
		}		
		
		public function setdateFact($dateFact){
			$this->_dateFact=$dateFact;
		}
	}
	
	class produit{ // *******************************
		private $_numprod;
		private $_des;
		private $_prix;
		private static $_nbProd=0; 
		
		//FONCTIONS MEMBRES ----------------------
		private static function initProd(){
			self::$_nbProd++;
		}		
		
		//Constructeur ----------------------------
		public function __construct($idFact,$modePaiement,$dateFact,$adresse){
			$this->_idFact=$idFact;
			$this->_modePaiement=$modePaiement;
			$this->_dateFact=$dateFact;
			self::initFact();
			echo "Constructeur".'<br/>';
		}
			
		//Destructeur -----------------------------
		public function __destruct(){		
			$this->_numprod;
			$this->_des;
			$this->_prix;
		}
		
		//Mutateurs -------------------------------
		public function afficheFact(){
			echo $this->_numprod.'<br/>';
			echo $this->_des.'<br/>';
			echo $this->_prix.'<br/>';
			echo 'Instances : ' . self::$_nbProd . '<br/>';
		}
		
		//Autres ------------------------------------
		public function getnumprod(){
			return $this->_numprod;	
		}		
		
		public function getdes(){
			return $this->_des;	
		}		
		
		public function getprix(){
			return $this->_prix;
		}
		
		public function setnumprod($numprod){
			$this->_numprod=$numprod;
		}		
		
		public function setdes($des){
			$this->_des=$des;
		}		
		
		public function setprix($prix){
			$this->_prix=$prix;
		}
	}

//MAIN

	$f1=new facture;

?>