<?php

/**
 * créer la classe des comptes bancaires
 */

class CompteBancaire
{
	private string $libelle;
	private float $soldeInitial;
	private string $deviseMonnetaire;
	private Titulaire $titulaire;

	public function __construct(string $libelle, float $soldeInitial, string $deviseMonnetaire, Titulaire $titulaire)
	{

		$this->libelle = $libelle;
		$this->soldeInitial = $soldeInitial;
		$this->deviseMonnetaire = $deviseMonnetaire;
		$this->titulaire = $titulaire;
		/**
		 * cette fonction (addcomptbancaire) permet de rajouter les comptes au tableau
		 * crée dans la classe titulaire.
		 */
		$this->titulaire->addCompteBancaire($this);
	}


	public function getLibelle(): string
	{
		return $this->libelle;
	}


	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;

		return $this;
	}

	public function getSoldeInitial(): float
	{
		return $this->soldeInitial;
	}


	public function setSoldeInitial($soldeInitial)
	{
		$this->soldeInitial = $soldeInitial;


		return $this;
	}
	/**
	 * débiter le compte courant du montant en €
	 */
	public function debiterCompteCourant(float $montant)
	{

		$this->soldeInitial -= $montant;
		return $this;
	}
	/**
	 * créditer le solde compte courant du monatnt en €
	 */
	public function crediterCompteCourant(float $montant)
	{
		$this->soldeInitial += $montant;
		return $this;
	}
	/**
	 * virement entre les 2 comptes (comptecourant et livré Bleu)
	 * utilse les 2 fonctions (debit/ credit) pour éffectuer le virement entre les 2 comptes
	 * n'oublie pas de montionner le compte que tu va debiter ou crediter comme paramêtre
	 */
	public function virement(CompteBancaire $compteEparg, float $montant)
	{
		$this->debiterCompteCourant($montant);
		$compteEparg->crediterCompteCourant($montant);
		return $this;
	}

	public function getDeviseMonnetaire(): string
	{
		return $this->deviseMonnetaire;
	}

	public function setDeviseMonnetaire($deviseMonnetaire)
	{
		$this->deviseMonnetaire = $deviseMonnetaire;

		return $this;
	}

	public function getTitulaire(): Titulaire
	{
		return $this->titulaire;
	}

	public function setTitulaire($titulaire)
	{
		$this->titulaire = $titulaire;

		return $this;
	}

	//public function affichTitulaire() {}
	public function __toString()
	{
		return  'Libellé : ' . $this->libelle . '<br> - Solde : ' .

			'  ' . $this->soldeInitial . ' ' . $this->deviseMonnetaire;
	}
};
