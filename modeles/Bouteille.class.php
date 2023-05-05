<?php

/**
 * Class Bouteille
 * Cette classe possède les fonctions de gestion des bouteilles dans le cellier et des bouteilles dans le catalogue complet.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Bouteille extends Modele
{
	const TABLE = 'vino__bouteille';

	public function getListeBouteille()
	{

		$rows = array();
		$res = $this->_db->query('Select * from ' . self::TABLE);
		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				$rows[] = $row;
			}
		}

		return $rows;
	}

	public function getListeBouteilleCellier()
	{

		$rows = array();
		$requete = 'SELECT 
						c.id as id_bouteille_cellier,
						c.id_bouteille, 
						c.date_achat, 
						c.garde_jusqua, 
						c.notes, 
						c.prix, 
						c.quantite,
						c.millesime, 
						b.id,
						b.nom, 
						b.type, 
						b.image, 
						b.code_saq, 
						b.url_saq, 
						b.pays, 
						b.description,
						t.type 
						from vino__cellier c 
						INNER JOIN vino__bouteille b ON c.id_bouteille = b.id
						INNER JOIN vino__type t ON t.id = b.type
						';
		if (($res = $this->_db->query($requete)) ==	 true) {
			if ($res->num_rows) {
				while ($row = $res->fetch_assoc()) {
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		} else {
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			//$this->_db->error;
		}



		return $rows;
	}

	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */

	public function autocomplete($nom, $nb_resultat = 10)
	{

		$rows = array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/", "%", $nom);

		//echo $nom;
		$requete = 'SELECT id, nom FROM vino__bouteille where LOWER(nom) like LOWER("%' . $nom . '%") LIMIT 0,' . $nb_resultat;
		//var_dump($requete);
		if (($res = $this->_db->query($requete)) ==	 true) {
			if ($res->num_rows) {
				while ($row = $res->fetch_assoc()) {
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		} else {
			throw new Exception("Erreur de requête sur la base de données", 1);
		}


		//var_dump($rows);
		return $rows;
	}


	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */

	public function ajouterBouteilleCellier($data)
	{
		var_dump($data);
		// Préparer la requête avec des paramètres
		$requete = "INSERT INTO vino__cellier(id_bouteille,date_achat,garde_jusqua,notes,prix,quantite,millesime) VALUES (?, ?, ?, ?, ?, ?, ?)";

		// Préparer la requête
		$stmt = $this->_db->mysqli_prepare($requete);

		$stmt->mysqli_stmt_bind_param(
			"isssdii",
			$data->id_bouteille,
			$data->date_achat,
			$data->garde_jusqua,
			$data->notes,
			$data->prix,
			$data->quantite,
			$data->millesime
		);

		// Exécuter la requête
		$res = $stmt->execute();

		return $res;
	}


	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		//TODO : Valider les données.


		$requete = "UPDATE vino__cellier SET quantite = GREATEST(quantite + " . $nombre . ", 0) WHERE id = " . $id;
		//echo $requete;
		$res = $this->_db->query($requete);

		return $res;
	}
	public function getBouteilleParid($id)
	{
		$rows = array();
		$res = $this->_db->query('Select * from  vino__cellier where id = ' . $id);
		if ($res->num_rows) {
			while ($row = $res->fetch_assoc()) {
				$rows[] = $row;
			}
		}

		return $rows;
	}
	public function modifierBouteilleCellier($data)
	{
		var_dump($data);

		// la requête SQL
		$requete = "UPDATE vino__cellier
					SET date_achat = ?,
						garde_jusqua = ?,
						notes = ?,
						prix = ?,
						quantite = ?,
						millesime = ?
					WHERE id = ?";

		// Préparer la requête 
		$stmt = $this->_db->prepare($requete);


		// Exécuter la requête
		$stmt->bind_param(
			"sssdiii",
			$data->date_achat,
			$data->garde_jusqua,
			$data->notes,
			$data->prix,
			$data->quantite,
			$data->millesime,
			$data->id
		);
		$res = $stmt->execute();

		// Vérifier si la requête a réussi

		return $res;
	}
}
