<?php

// Inclusion des fichiers nécessaires
include('includes/constantes.php');
include('includes/bootstrap.php');
include('includes/utils.php');
include('includes/starwars.php');

// Début du document HTML
echo start_html('Le garage de Star Wars') .
	 
	 // Grille de Bootstrap
	 container() .
	 row() .
	 col(12) .

	 	jumbotron('Star Wars Garage', 'Inventaire des vaisseaux de la galaxie');
		
		// Début du code ici -----

			// 1. Dans bootstrap.php, codez la fonction start_table
	 		// 1.1 Appeler la fonction ici pour démarrer le tableau des vaisseaux
	 			// Les entêtes seront : Nom - Fabricant - Classe - Coût - Longueur - Vitesse max
				 // Les class du tableau seront :
				
	 		// 1.2 Coder les fonctions start_body_table, end_body_table et end_table et appelez les
	 		// Note : à ce niveau, vous devez visualiser un tableau composé simplement de la première ligne
			// Barème : 3pts

			// 2. Parcourez l'ensemble de $arrayShips pour créer une ligne par vaisseau en mettant les bonnes valeurs dans les bonnes colonnes
			// Barème : 1pt

			// 3. En amont de l'affichage du tableau, recherchez le vaisseau le + grand.
	 		// 3.1 Codez la fonction progressbar dans bootstrap.php
			 // 3.2 Remplacez la valeur de la colonne longueur par une progressbar représentant la 
			 //longueur du vaisseau par rapport au plus grand des vaisseaux
	 			// Le plus grand vaiseau représente 100%
	 			// Si le + grand vaisseau fait 300, un vaisseau de 60 représente 20%
	 			// Note : utiliser la fonction round() pour arrondir la valeur
			 // Barème : 4pts

	 		// 4. Codez la fonction label dans bootstrap.php
	 		// 4.1 Définissiez vous même 4 tranches de coût, chaque tranche associée à une classe de bootstrap différente
	 		// 4.2 Codez la fonction getClassByCout dans utils.php
	 		// 4.3 Affichez le cout sous la forme d'un label avec la classe associée à sa tranche
			 // Barème : 3pts

			 // 5. Codez la fonction getFirstLetter dans utils.php
	 		// 5.1 Sur chaque nom de vaisseau, créez un lien qui permet de passer en paramètre GET la première lettre du vaisseau
	 		// 5.2 Si ce paramètre est présent, n'affichez que les vaisseaux dont la première lettre est identique
	 		// 5.3 Ajoutez un bouton "reset" dans le jumbotron de départ pour "effacer" ce paramètre
	 			// 5.4 bonus : utilisez l'instruction "continue"
	 		// Barème : 4pts + 1pt (bonus)
			  
	 		// 6. Codez la fonction indications dans bootstrap.php
	 		// 6.1 Si le nom du fabricant fait + de 20 caractères, racourcissez le et affichez le nom complet dans une indication à côté
	 			// Par exemple :
	 				// Kuat Drive Yards => Kuat Drive Yards
	 				// Alliance Underground Engineering => Alliance Underground... [I]
	 		// Barème : 3pts


			$entetes = ['Nom', 'Fabricant', 'Classe', 'Coût', 'Longueur', 'Vitesse max']; 
			echo start_table($entetes);
			echo start_body_table();
			echo end_body_table();
			
			 //LE PLUS GRAND
			$longueurMax = 0;
			for ($i = 1; $i < count($arrayShips); $i++) {
				if ($arrayShips[$i]['length'] > $longueurMax){
					$longueurMax = $arrayShips[$i]['length'];
				}
			}
			echo '<br/>';
			//echo $longueurMax . '<br/>';
			
			$out = '';
			
				
				if (isset($_GET['firstLetter'])){

					for ($i = 0;$i < count($arrayShips); $i++) {
						//calcule du pourcentage par rapport a la longueur max
						//echo getFirstLetter($arrayShips[$i]['name']) . '<br/>';

						$longueur = ceil(($arrayShips[$i]['length'] / $longueurMax) * 100);
						if (getFirstLetter($arrayShips[$i]['name']) == $_GET['firstLetter']){
							$out .= '<tr>';
							$out .= '<td>' . '<a href="http://localhost/back_end/exam/index.php?firstLetter=' . getFirstLetter($arrayShips[$i]['name']) . '">'. $arrayShips[$i]['name'] . '</a>' . '</td>';
							$out .= '<td>' . $arrayShips[$i]['manufacturer'] . '</td>';
							$out .= '<td>' . $arrayShips[$i]['class'] . '</td>';
							$out .= '<td>' . getClassByCout($arrayShips[$i]['cost_in_credits']) . '</td>';
							$out .= '<td>' . progress_bar($longueur, 'progress-bar', false) . '</td>';
							$out .= '<td>' . $arrayShips[$i]['max_atmosphering_speed'] . '</td>';
							$out .= '</tr>';
						}
					}
				}
				else{	
					for ($i = 0;$i < count($arrayShips); $i++) {
						//calcule du pourcentage par rapport a la longueur max
		
						$longueur = ceil(($arrayShips[$i]['length'] / $longueurMax) * 100);
						//echo $longueur . '<br/>';			
						$out .= '<tr>';
						$out .= '<td>' . '<a href="http://localhost/back_end/exam/index.php?firstLetter=' . getFirstLetter($arrayShips[$i]['name']) . '">'. $arrayShips[$i]['name'] . '</a>' . '</td>';
						$out .= '<td>' . indications($arrayShips[$i]['manufacturer']) . '</td>';
						$out .= '<td>' . $arrayShips[$i]['class'] . '</td>';
						$out .= '<td>' . getClassByCout($arrayShips[$i]['cost_in_credits']) . '</td>';
						$out .= '<td>' . progress_bar($longueur, 'progress-bar', false) . '</td>';
						$out .= '<td>' . $arrayShips[$i]['max_atmosphering_speed'] . '</td>';
						$out .= '</tr>';
					}
				}
			
			echo $out;
			echo end_table();
			echo '<a href=http://localhost/back_end/exam/index.php>RESET</a>';




	 		// 7. Codez la fonction getStarByClass dans utils.php
	 		// 7.1 Affichez la classe sous forme d'étoiles, via <i class="fa fa-star"></i>
	 		// Barème : 3pts


	 		// Note : vous devriez avoir un joli tableau maintenant plein de couleurs et d'étoiles 

	 		// 8. Pour finir, résolvez le problème suivant : (affichage libre des réponses)
	 			// 8.1 Pour le coût du vaisseau le + cher, combien de vaisseau le moins cher je peux construire ?
	 			// 8.2 Si je mets bout à bout tous les vaisseaux, combien de fois je peux caler le vaisseau le + grand ? le vaisseau le + petit ? Un vaisseau de taille moyenne ?
	 		// Barème : 4pts


	 		// 9. Question bonus
	 			// Afficher le nombre vaisseaux construits par manufacturer et le cout moyen de leurs vaisseaux
	 		// Barème : 2pts


	 		// Barème total : 3 + 1 + 4 + 3 + 4 + (1) + 3 + 3 + 4 + (2) => 25 + (3)

 		// Fin du codee -----------
echo close_div(3);
// Fin du document HTML
echo end_html();