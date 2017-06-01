<?php

	class client{ //*************************
		// DONNEES MEMBRES ---------------
		private $_idClient;
		private $_nom;
		private $_prenom;
		private $_adresse;
		private static $_nbClient=0;
		private $_collectionFact;	
		
		public function hydrate(array $donnees){
			if (isset($donnees['idClient'])){
				$this->setClient($donnees['idClient']);			
			}
			
			if (isset($donnees['nom'])){
				$this->setnom($donnees['nom']);							
			}
			
			if (isset($donnees['prenom'])){
				$this->setprenom($donnees['prenom']);
			}

			if (isset($donnees['adresse'])){
				$this->setadresse($donnees['adresse']);								
			}	
		}
		
		// FONCTIONS MEMBRES -----------------
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
			$this->_collectionFact=array();
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
		
		public function setadresse($adresse){
			$this->_adresse=$adresse;
		}
		
		//Autres -------------------------------------------
		
		public function afficheCli(){
			echo '----- Client : -----'.'<br/>';
			echo $this->_idClient.'<br/>';
			echo $this->_nom.'<br/>';
			echo $this->_prenom.'<br/>';
			echo $this->_adresse.'<br/>';	
			echo '----- Factures : -----'.'<br/>';
			foreach (self::getCollectionFact() as $valeur){
				echo $valeur->afficheFact().'<br/>';
			}
		}
		
		public function getCollectionFact(){
			return $this->_collectionFact;
		}
		
		public function addFactCollection(facture $fact){ //typage pour gestion rigoureuse donnees
			if (!in_array($fact,$this->_collectionFact)){ //on cherche si la facture est deja dans la collection
				$fact->setClient($this); //qd ajout facture, on set client correspondant a fact	
				$this->_collectionFact[]=$fact; //crochets seuls -> ajout automatique a la fin
			}
		}
		
		
	}
		
	class facture{ // *******************************
		// DONNEES MEMBRES --------------------
		private $_idFact;
		private $_modePaiement;
		private $_dateFact;
		private static $_nbFact=0; 
		private $_client; //indiq quel client est rattache a la fact
		private $_qteProd;
		private $_collectionProd;
	
		public function hydrate(array $donnees){
			if (isset($donnees['idFact'])){
				$this->setidFact($donnees['idFact']);			
			}
			
			if (isset($donnees['modePaiement'])){
				$this->setmodePaiement($donnees['modePaiement']);							
			}
			
			if (isset($donnees['dateFact'])){
				$this->setdateFact($donnees['dateFact']);
			}

			if (isset($donnees['qteProd'])){
				$this->setqteprod($donnees['qteProd']);								
			}				
		}
	
		// FONCTIONS MEMBRES 	--------------------
		private static function initFact(){
			self::$_nbFact++;
		}
		
		//Constructeur ----------------------------
		public function __construct($idFact,$modePaiement,$dateFact){
			$this->_idFact=$idFact;
			$this->_modePaiement=$modePaiement;
			$this->_dateFact=$dateFact;
			self::initFact();
			$this->_collectionProd=array();
			$this->_qteProd=array();
			
		}
			
		//Destructeur -----------------------------
		public function __destruct(){		
			$this->_idFact;
			$this->_modePaiement;
			$this->_dateFact;
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
		
		public function setqteprod($qte){
			$this->_qteProd=$qte;
		}
		
		//Autres
		public function afficheFact(){
			echo $this->_idFact.'<br/>';
			echo $this->_modePaiement.'<br/>';
			echo $this->_dateFact.'<br/>';
			foreach (self::getCollectionProd() as $key=>$valeur){
				echo $valeur->afficheProd().'<br/>';
				echo $this->_qteProd[$key]->getQte();	
			}
		}
		
	
		public function getCollectionProd(){	
			return $this->_collectionProd;
		}
		
		public function addProdCollection(produit $prod, dfacture $qte){
			if(!in_array($prod,$this->_collectionProd)){
				$this->_collectionProd[]=$prod;			
				$this->_qteProd[]=$qte;
			}
		}
		
		public function setClient(client $cli){
			$this->_client=$cli;
		}
	}
	
	class produit{ // *******************************
		// DONNEES MEMBRES
		private $_numprod;
		private $_des;
		private $_prix;
		private static $_nbProd=0; 
		
		public function hydrate(array $donnees){
			if (isset($donnees['numprod'])){
				$this->setnumprod($donnees['numprod']);			
			}
			
			if (isset($donnees['des'])){
				$this->setdes($donnees['des']);							
			}
			
			if (isset($donnees['prix'])){
				$this->setprix($donnees['prix']);
			}		
		}
		
		// FONCTIONS MEMBRES ----------------------
		private static function initProd(){
			self::$_nbProd++;
		}		
		
		//Constructeur ----------------------------
		public function __construct($numprod,$des,$prix){
			$this->_numprod=$numprod;
			$this->_des=$des;
			$this->_prix=$prix;
			self::initProd();
		}
			
		//Destructeur -----------------------------
		public function __destruct(){		
			$this->_numprod;
			$this->_des;
			$this->_prix;
		}
		
		//Mutateurs -------------------------------
		public function afficheProd(){
			echo $this->_numprod.'<br/>';
			echo $this->_des.'<br/>';
			echo $this->_prix.'<br/>';
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
	
	class dfacture{ // *******************************
		// DONNEES MEMBRES
		private $_qte;
		private static $_nbDet=0; 
		
		// FONCTIONS MEMBRES ----------------------
		private static function initDet(){
			self::$_nbDet++;
		}		
		
		//Constructeur ----------------------------
		public function __construct($qte){
			$this->_qte=$qte;
			self::initDet();
		}
			
		//destructeur -----------------------------
		public function __destruct(){		
			$this->_qte;
		}
		
		//Mutateurs -------------------------------
		public function afficheDet(){
			echo $this->_qte.'<br/>';
		}
		
		public function getQte(){
			return $this->_qte;	
		}	
		
		//Autres ------------------------------------	

	}
	
	class managerClient{
		private $_db;
		
		public function __construct($db){
			$this->setDb($db);
		}
		
		public function ajoutClient(client $client){
			$nom=$client->_nom;
			$prenom=$client->_prenom;
			$adresse=$client->_adresse;
			
			$q=$this->_db->prepare('INSERT INTO client(nom,prenom,adresse)
			VALUES (:nom,:prenom,:adresse)');
			
			$q->execute(array(
				'nom'=>$nom,
				'prenom'=>$prenom,
				'adresse'=>$adresse));
		}
		
		public function suppClient(client $client){
			$idClient=$this->_idClient;
			
			$q->$this->_db->prepare('DELETE FROM client WHERE idClient= :idClient');
			$q->execute(array('idClient'=>$idClient));
		}
		
		public function modifClient(client $client){
			$nom=$this->_nom;
			$prenom=$this->_prenom;
			$adresse=$this->_adresse;
			
			$q->$this->_db->prepare('UPDATE client
									SET nom=:nom, prenom=:prenom, adresse=:adresse
									WHERE idClient=:idClient');
			$q->execute(array(
				'nom'=>$nom,
				'prenom'=>$prenom,
				'adresse'=>$adresse));		
		}
		
		public function setDb(PDO $db){
			$this->_db=$db;
		}
	}

//MAIN

/*
	$df1=new dfacture(1);
	$df2=new dfacture(200);
	
	$f1=new facture(5,'CB','2017-05-18');
	$f2=new facture(6,'Especes','2016-03-03');
	
	$p1=new produit(56,'tige en bois',5.26);
	$p2=new produit(24,'craie',1.20);
	$p3=new produit(100,'gommes',100);
	
	$c1=new client(100,'NOM','PRENOM','5, rue toto');
	
	$f1->addProdCollection($p1,$df1);
	$f1->addProdCollection($p2,$df2);
	
	$f2->addProdCollection($p3,$df2);
	
	$c1->addFactCollection($f1);
	$c1->addFactCollection($f2);
	
	
	$c1->afficheCli();
	$f1->afficheFact();*/
	
	$client1= new client(12,'PATULACCI','Marcel','LSPD Commissariat');
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=facture','root','');
	}
	catch (Exception $e) 
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	$manager= new managerClient($bdd);
	
	$manager->ajoutClient($client1);

	
?>