<?php 
$req = "SELECT * FROM ingredient NATURAL JOIN unite" ;
$resultat = mysqli_query($connexion, $req);//execute la requette ou retourne FALSE
if($resultat == FALSE) {
	printf("<p style='font-color: red;'>Erreur : probl�me d'ex�cution de la requ�te.</p>");
}
else {
	if(mysqli_num_rows($resultat) == 0) //si le nombre de tuples de $req est nul
	{
		echo "<p>Il n'y a aucun ingredient dans la base.</p>";
	}
	else 
	{	//cr�� un tableau avec les l�gendes de chaque colonne en html
		echo "<p><table style='width:100%' id='table'><tr><td id='td'><h7><b>nom de l'ingredient</b></h7></td><td id='td'><h7><b>categorie</b></h7></td><td id='td'><h7><b>date</b></h7></td><td id='td'><h7><b>localisation</b></h7></td><td id='td'><h7><b>quantite</b></h7></td></tr>";
		while ($row = mysqli_fetch_assoc($resultat))  //cr�� un tableau associatif avec les r�sultats de $req en php
		{
			echo "<tr><td id='td'>".$row['nomI']."</td><td id='td'>".$row['categorieI']."</td><td id='td'>".$row['dateI']."</td><td id='td'>".$row['lieuI']."</td><td id='td'>".$row['quantiteStockI']."".$row['abreviationUN']."</tr>";
		}// remplit le tableau ligne par ligne en html
		echo "</table></p>";
	}
}

?>
