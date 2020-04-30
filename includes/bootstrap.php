<?php
// Ensemble des fonctions qui permettront de créer des éléments Bootstrap

/**
 * Création du document HTML
 */
function start_html($title)
{
	$out = '<!doctype html>';
	$out .= '<html>';
	$out .= '<head>';
	$out .= '<meta charset="utf-8">';

	// Titre de la page
	$out .= '<title>' . $title . '</title>';

	// Lien vers le CSS
	$out .= '<link href="' . CSS . '" rel="stylesheet">';
  
  	$out .= '</head>';
  	$out .= '<body>';

  	return $out;
}

/**
 * Fin du fichier HTML
 */
function end_html()
{
	$out = '</body>';
	$out .= '</html>';

	return $out;
}

/**
 * Ouverture container
 */
function container()
{
	return '<div class="container">';
}

/**
 * Ouverture row
 */
function row()
{
	return '<div class="row">';
}

/**
 * Ouverture col
 */
function col($nb, $type = 'md')
{
	return '<div class="col-'. $type .'-'. $nb .'">';
}

/**
 * Fermeture de div
 */
function close_div($nbDiv)
{
	$out = '';

	for ($i=0; $i<$nbDiv; $i++) {
		$out .= '</div>';
	}

	return $out;
}

/**
 * Création d'un élément Jumbotron
 * Documentation : https://getbootstrap.com/docs/4.0/components/jumbotron/
 * Paramètres : Titre, Description et Lien (facultatif)
 */
function jumbotron($titre, $description, $lien = '')
{
	// Ouverture div Jumbotron
	$out = '<div class="jumbotron">';

		// Titre de mon jumbotron
		$out .= '<h1 class="display-4">' . $titre . '</h1>';

		// Description de mon jumbotron
		$out .= '<p class="lead">' . $description . '</p>';
		// $out .= $description; // Variante

		// Lien du jumbotron
		if ($lien != '') {
			$out .= '<p class="lead">';
			$out .= '<a class="btn btn-primary btn-lg" href="' . $lien . '" role="button">En savoir +</a>';
 			$out .= '</p>';
		}

	// Fermeture div Jumbotron
	$out .= '</div>';

	return $out;
}

/**
 * Création d'un élément Button
 * Documentation : https://getbootstrap.com/docs/4.0/components/buttons/
 * Paramètres : Nom, Lien, Class (par défaut à primary)
 */
function button($nom, $lien, $class = 'primary')
{
	return '<a class="btn btn-'. $class .'" href="'. $lien .'" role="button">'. $nom .'</a>';
}


/**
 * Création d'un élément Alert
 * Documentation : https://getbootstrap.com/docs/4.0/components/alerts/
 * Paramètres : Texte, Class (par défaut à primary)
 */
function alert($texte, $class = 'primary')
{
	return '<div class="alert alert-'. $class .'" role="alert">'. $texte .'</div>';
}


/**
 * FONCTIONS A CODER CI-DESSOUS
 */

// * Documentation : https://getbootstrap.com/docs/4.0/components/table/

/**
 * Création de la ligne d'entête d'un tableau à la sauce bootstrap
 * Paramètres : 
 *		$entetes => Array contenant les noms des entêtes
 *		$class => Array (facultatif) contenant les class à ajouter au tableau
 * Retourne une chaine de caractères qui contient le code html, de <table> à </thead>
 */
function start_table($entetes){
	

	$out = '<table>';
	$out .= '<thead>';
	$out .= '<tr>';

	for($i = 0; $i < count($entetes); $i++){
		$out .= '<th>';
		$out .= $entetes[$i];
		$out .= '</th>';
	}

	$out .= '</tr>';
	$out .= '</thead>';
	return $out;
}

/**
 * Création de la balise <tbody>
 * Pas de paramètre
 * Retourne une chaine de caractères
 */
function start_body_table(){

	$out = '<tbody>';
	return $out;

}

/**
 * Fermeture de la balise </tbody>
 * Pas de paramètre
 * Retourne une chaine de caractères
 */
function end_body_table(){

	$out = '</tbody>';
	return $out;

}

/**
 * Fermerture de la balise </table>
 * Pas de paramètre
 * Retourne une chaine de caractères
 */
function end_table(){

	$out = '</table>';
	return $out;

}


// * Documentation : https://getbootstrap.com/docs/4.0/components/progressbar/

/**
 * Création d'une progressbar
 * Paramètres :
 *		$longueur : valeur entière représentant le pourcentage de complétion
 *		$class : nom de la classe pour gérer la couleur (par défaut à success)
 * 		$animated : booleen pour définir si on ajoute ou non une animation sur la progressbar 
 * 		(par défaut à false)
 * Retourne une chaine de caractères
 */
function progress_bar($longueur, $class, $animated){

	$out = '<div class="progress">';
	$out .= '<div class="' . $class . ' role="progressbar" style="width:'. $longueur . '%" aria-valuenow="' . $longueur . '" aria-valuemin="0" aria-valuemax="100"></div>';
	$out .= '</div>';

	return $out;
}


// * Documentation : https://getbootstrap.com/docs/4.0/components/labels/
/**
 * Création d'un label
 * Paramètres :
 *			$texte : chaine de caractères
 * 			$class : class, par défaut à primary
 * Retourne une chaine de caractères
 */
function label($texte, $class){

	$out = '<span class="' . $class . '" >';
	$out .= $texte;
	$out .= '</span>';

	return $out;

}


// * Documentation : 
/**
 * Création d'une icone [i] qui contient un tooltip
 * 
 */
function indications($manufacturer){
$out ='';
	if (strlen($manufacturer) > 20){
		$out .= substr($manufacturer, 0, 21) . '... ';
		$out .= '<a href="#" data-toggle="tooltip" title="' . $manufacturer . '">[I]</a>';
	}
	else{
		$out .= $manufacturer;
	}
 return $out;
}

