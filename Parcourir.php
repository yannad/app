<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Accueil</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>

	<body>
		<?php include("header.php"); ?>
<div id="RechercheMaxou">
<?php
		$link=mysqli_connect('localhost','root','');
		mysqli_select_db($link,'keydb'); // on se connecte à MySQL.
		$query = mysqli_query($link,"SELECT DISTINCT * FROM logements NATURAL JOIN Photo GROUP BY idLogement ORDER BY dateAjout  ") or die (mysqli_error($link));
		
	 while($donnees = mysqli_fetch_array($query)) 


echo '<div id="encadreResultat">'.'<a  href="voirHabitation.php?search='.$donnees['idLogement'].'" ><img width="125px" height="125px" align="left"  src="'.$donnees['Liendelaphoto'].'">'. $donnees['Ville'].'.'.$donnees['adresse'].'. '.'<br/>
' .'Code Postal : '.$donnees['codePostal'].'<br/>' .$donnees['Description'].'<br/>
'.'Description générale : '.$donnees['capacite'].'metres carrés, '.$donnees['chambres'].' chambres'.'</div>'.'</a>'; 


mysqli_close($link); // fin ?> </div>



		<?php include("footer.php"); ?>


	</body>
</html>