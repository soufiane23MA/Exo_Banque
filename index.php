<?php
/**
 * créer la relation entre les différentes classe
 */

spl_autoload_register(function ($class_name) {
	require 'classes/' . $class_name . '.php';
});
/**
 * instancier le titulaire des comptes 
 */

$titulaire = new Titulaire("Cassin", "Robert",  "25.10.1968", "STRASBOURG");
/**
 * instancier 2 comptes différentes.
 */

$compteCourant = new CompteBancaire("Compte Courant", 1250.75, "€",$titulaire);
$compteEpargne = new CompteBancaire("Livré Bleu",0,'€', $titulaire);


/**
 * vérifier l'affichage avec les 2 fonctions 
 * toString() et affichCompte().
 */
 
 
 /**
	* affichage du solde initial du compte courant
	*/
echo $titulaire -> affichCompte();
/**
 * affiche les 2 opération effectuées sur le compte courant
 */
echo $compteCourant->debiterCompteCourant(200) .'<br>';
echo $compteCourant->crediterCompteCourant(300).'<br>';
/**
 * affichage du virement entre les 2 comptes
 */
echo $compteCourant ->virement($compteEpargne,300).'<br>';
echo $compteEpargne;
