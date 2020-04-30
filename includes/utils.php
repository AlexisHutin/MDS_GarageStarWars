<?php
// Fonctions diverses

/**
 * Retourne la classe correspondante au cout
 * Paramètre :
 * 			$cout : nombre
 * Retourne une chaine de caractères composée exclusivement d'une classe Bootstrap
 */
function getClassByCout($cout){
	// Consigne supplémentaire, les tranches et les classes doivent être paramétrées dans le fichier constantes.php
	$out = '';

	switch (true) {
		case $cout > TRANCHE_HAUTE:
			$out .= label($cout, "badge badge-danger");
			break;
		
		case $cout > TRANCHE_MOYENNE:
			$out .= label($cout, "badge badge-warning");
			break;

		case $cout > TRANCHE_BASSE:
			$out .= label($cout, "badge badge-success");
			break;

		case $cout > TRANCHE_MINI:
			$out .= label($cout, "badge badge-info");
			break;

		//Ne marche pas Quand le cout a pour valeur null 
		//default :
		//	$out .= label('null', "badge badge-default");
		//	break;
	}
	return $out;
}


/**
 * Retourne la première lettre d'une chaine de caractères
 * Paramètre :
 *			$name : chaine de caractères
 * Retourne une chaine de caractère, composée d'un seul caractère
 */
function getFirstLetter($name){
	// Se renseigner sur la méthode "substr" dans la documentation officielle de php

	$premiereLettre = substr($name, 0, 1);
	return $premiereLettre;

}

/**
 * Retourne le nombre d'étoile à afficher
 * Paramètre :
 *			$name : chaine de caractères
 * Retourne un nombre, correspondant au nombre d'étoiles de la classe
 */
function getStarByClass($name){
	// Définissez vous même :
		// 1 class qui vaudra 4 étoiles
		// 2 class qui vaudront 3 étoiles
		// 3 class qui vaudront 2 étoiles
		// Toutes les autres vaudront 1 étoile
	
	
}