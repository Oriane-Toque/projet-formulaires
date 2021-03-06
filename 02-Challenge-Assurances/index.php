<?php
/* RECAP :
	Palier 1: par défaut tout le monde
	Accidents: descend d'1 palier par accident
	Anciennete permis: +2ans = 1 palier de +
	Age: +25ans = 1 palier de +
	Anciennete assureur = +5ans = 1 palier de +
		Seulement si le conducteur n'est pas refusé avant
	*/

	/*ETAPES :

	1- $palier = 1;
		$palier0 = "Refus d'assurer"
		$palier1 = "Rouge"
		$palier2 = "Orange"
		$palier3 = "Vert"
		$palier4 = "Bleu"
	2- Première condition "IF" si $anciennete_permis > 2 alors $palier += 1;
	3- Seconde condition "IF" si $age > 25 alors $palier += 1;
	4- Troisième condition "IF" si nb_accidents est superieur à 0 alors $palier -= $nb_accidents
	5- Quatrième condition "IF" si $palier >= 1 && $anciennete_assureur > 5 alors $palier +=1;
	6- Condition d'attribution "IF" si $palier <= 0 alors echo $palier0;
		"ELSEIF" si $palier === 1 alors echo $palier1;
		"ELSEIF" si $palier === 2 alors echo $palier2;
		"ELSEIF" si $palier === 3 alors echo $palier3;
		"ELSE" echo $palier4;

	*/

	//ASSIGNATION DES VALEURS CONTENUES DANS LE FORMULAIRE

	//Par défaut tout le monde est au palier 1 donc $palier = 1;
function calculPalier($age, $anciennete_permis, $nb_accidents, $anciennete_assureur)
	{
		$palier = 1;

		if ($anciennete_permis > 2)
		{
			$palier++; //rajout d'un palier si permis +2ans
		}
		if ($age > 25)
		{
			$palier++; //rajout d'un palier si age +25ans
		}
		if ($nb_accidents > 0)
		{
			$palier -= $nb_accidents; //perte paliers en fct nb accidents
		}
		if ($palier >= 1 && $anciennete_assureur > 5)
		{
			$palier++; //rajout d'un palier uniquement pour les clients pas encore refusés et dont l'ancienneté chez assureur > 5ans
		}

		return $palier;
	}

function affichePalier($palierT, $p0, $p1, $p2, $p3, $p4)
{
	if ($palierT < 1) :?>
		<p>Désolé votre client ne remplit pas les conditions : <strong id='palier0'><?= $p0 ?></strong> (score obtenu: <?php echo $palierT ?>)</p>

	<?php elseif ($palierT === 1) : ?>
		<p>Votre client à droit au tarif <strong id='palier1'><?= $p1 ?></strong> (score obtenu: <?php echo $palierT ?> bonus)</p>
	
	<?php elseif ($palierT === 2) : ?>
		<p>Votre client à droit au tarif <strong id='palier2'><?= $p2 ?></strong> (score obtenu: <?php echo $palierT ?> bonus)</p>
	
	<?php elseif ($palierT === 3) : ?>
		<p>Votre client à droit au tarif <strong id='palier3'><?= $p3 ?></strong> (score obtenu: <?php echo $palierT ?> bonus)</p>
	
	<?php else : ?>
		<p>Votre client à droit au tarif <strong id='palier4'><?= $p4 ?></strong> (score obtenu: <?php echo $palierT ?> bonus)</p>
	<?php 
	endif; 
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>O'ssurance</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/paliers_style.php">
	</head>
	<body>
	<?php

		// 1. Créer un formulaire HTML demandant les informations nécessaires au calcul
		// 2. Après soumission du formulaire, créer les variables qui vont contenir les informations du client
		// 3. Écrire le script qui permet de déterminer à quel palier peut prétendre un client, selon ses informations (et donc à quelle couleur de tarif)
		// 4. Afficher le résultat, par ex. "Votre client a droit au tarif Vert"
		// Bonus 1. Afficher le résultat de trois manières différentes : via `if` & `elseif` ou bien `switch` ou bien `array()`
		// Bonus 2. fioritures graphiques

	?>

		<h1>O'ssurance</h1>

		<h2>Calcul du tarif de votre client</h2>

		<form action="" method="POST">
			<fieldset>
				<!-- Age du client -->
				<div>
					<label for="age">Âge</label>
					<input type="number" id="age" name="age">
				</div>
				<!-- Années de permis -->
				<div>
					<label for="anciennete_permis">Années de permis</label>
					<input type="number" name="anciennete_permis" id="anciennete_permis">
				</div>
				<!-- Nombre d'accidents -->
				<div>
					<label for="nb_accidents">Nombre d'accidents responsables</label>
					<input type="number" name="nb_accidents" id="nb_accidents">
				</div>
				<!-- Années chez son assureur -->
				<div>
					<label for="anciennete_assureur">Années chez son assureur</label>
					<input type="number" name="anciennete_assureur" id="anciennete_assureur">
				</div>
			</fieldset>
			<button type="submit" id="submit">Calculer le tarif</button>
		</form>

		<?php 
			if (count($_POST) > 0) :
				$age = $_POST['age'];
				$anciennete_permis = $_POST['anciennete_permis'];
				$nb_accidents = $_POST['nb_accidents'];
				$anciennete_assureur = $_POST['anciennete_assureur'];

				if ($age >= 18 && $anciennete_permis >= 0 && $anciennete_assureur >= 0 && $nb_accidents >= 0) :

					$palierT = calculPalier($age, $anciennete_permis, $nb_accidents, $anciennete_assureur);

					/* ATTRIBUTION TARIFS EN FONCTION DE LA VALEUR $palier */
					$palier0 = "Refus d'assurer";
					$palier1 = "Rouge";
					$palier2 = "Orange";
					$palier3 = "Vert";
					$palier4 = "Bleu";
					
					$affichageP = affichePalier($palierT, $palier0, $palier1, $palier2, $palier3, $palier4);
				else : echo "<p>Vous avez mal renseigné les champs ou vous êtes mineurs alors vous n'êtes pas assurables !</p>";
				endif;
			endif;
		?>
	</body>
</html>