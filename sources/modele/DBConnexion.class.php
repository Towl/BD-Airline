<?php
class DBConnexion {
	private static $bdd;
	
	public static function clientConnexion(){
		try{
			self::$bdd = new PDO('mysql:host=localhost;dbname=airline','Client');
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}
	
	public static function adminConnexion(){
		try{
			self::$bdd = new PDO('mysql:host=localhost;dbname=airline', 'Admin', 'admin');
		}
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}
	
	public static function getBDD(){
		return self::$bdd;
	}
}
?>
