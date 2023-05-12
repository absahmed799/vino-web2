<?php

/**
 * Class MonSQL
 * Classe qui génère ma connection à MySQL à travers un singleton
 *
 *
 * @author Jonathan Martel
 * @version 2.0
 * @see : http://www.apprendre-php.com/tutoriels/tutoriel-45-singleton-instance-unique-d-une-classe.html
 * @since 2.0 Correction du singleton, PHP 7.1 valide la visibilité du constructeur de l'objet hérité. Retrait de l'héritage et réécriture du singleton.
 *
 */
class MonSQL {
	
	/**
	 * @var $_instance
	 * @access private
	 * @static
	 */
	private static $_instance = null;

	/**
	 * Constructeur de la classe
	 *
	 * @param void
	 * @return void
	 */
	// Définir la valeur de la constante "HOST"

	private function __construct($host, $user, $password, $database) 
	{
		// Initialisation de la connexion à la base de données
		self::$_instance = new mysqli($host, $user, $password, $database);

		// Vérification des erreurs de connexion
		if (self::$_instance->connect_errno) {
			echo "Echec lors de la connexion à MySQL : (" . self::$_instance->connect_errno . ") " . self::$_instance->connect_error;
		} else {
			// Définition du jeu de caractères pour la connexion
			self::$_instance->set_charset("UTF-8");    
		}
	}

	/**
	 * Méthode qui crée l'unique instance de la classe
	 * si elle n'existe pas encore puis la retourne.
	 *
	 * @param void
	 * @return Singleton
	 */
	public static function getInstance() {

		if (is_null(self::$_instance)) {
			self::$_instance = new mysqli(HOST, USER, PASSWORD, DATABASE);
			if (self::$_instance-> connect_errno) {
				echo "Echec lors de la connexion à MySQL : (" . self::$_instance -> connect_errno . ") " . self::$_instance-> connect_error;
			}
			else {
				self::$_instance->set_charset("UTF-8");	
			}
		}

		return self::$_instance;
	}

}
?>