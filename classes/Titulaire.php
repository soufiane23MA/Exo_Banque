<?php

class Titulaire
{

	private string $nom;
	private string $prenom;
	private DateTime $dateDeNaissance;
	private string $ville;
	private array $comptes;

	public function __construct(string $nom, string $prenom, string $dateDeNaissance, string $ville)
	{
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->dateDeNaissance = new DateTime($dateDeNaissance);
		$this->ville = $ville;
		$this->comptes = [];
	}
	public function getNom(): string
	{
		return $this->nom;
	}

	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	public function getPrenom(): string
	{
		return $this->prenom;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;

		return $this;
	}

	public function getDateDeNaissance(): DateTime
	{
		return $this->dateDeNaissance;
	}

	public function setDateDeNaissance($dateDeNaissance)
	{
		$this->dateDeNaissance = $dateDeNaissance;

		return $this;
	}

	public function getVille(): string
	{
		return $this->ville;
	}

	public function setVille($ville)
	{
		$this->ville = $ville;

		return $this;
	}
	public function getComptes()
	{
		return $this->comptes;
	}

	public function setComptes($comptes)
	{
		$this->comptes = $comptes;

		return $this;
	}
	/**
	 * créer la fonction qui rajoute les differents comptes 
	 */
	public function addCompteBancaire(CompteBancaire $compte)
	{
		$this->comptes[] = $compte;
	}
	public function affichCompte()
	{
		$resulte = $this . $this->getVille();
		$resulte .= "<ul>";
		foreach ($this->comptes as $compte) {
			$resulte .= '<li>' . $compte . '</li>';
		}
		$resulte .= "</ul>";
		return $resulte;
	}
	public function __toString()
	{
		return  'Titulaire : ' . '<h2> ' . $this->nom . " " . $this->prenom . '</h2>  '
			. '<p> Date de naissance : ' . $this->dateDeNaissance->format("d.M.Y") . '<br> ' .
			'Domicilié à : ';
	}
};
