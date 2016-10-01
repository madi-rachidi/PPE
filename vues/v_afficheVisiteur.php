
<h3>Fiche de frais a valider du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <?php $title = [Idvisiteur,Nom, Prenom]; // pour l'affichage ?>
    <div class="encadre">
  	<table class="listeLegere">
  	   <caption>FICHE</caption>
        <tr>
         <?php
         for ($i=0;$i<2; $i++)
		 {
			/*$libelle = $unFraisForfait['libelle'];*/
		?>	
			<th> <?php echo $title[$i]?></th>
		 <?php
        }
		?>
	</tr>
        <tr>
        <?php
          foreach ($aValider as list($a, $b, $c)) {
            ?>
            <td class="qteForfait"><a href="index.php?uc=fraisAValider&action=voiFraisAValider&valeur=<?php echo $a?>&date=<?php echo $leMois?>"><?php echo $a?></a></td>
            <td class="qteForfait"><a href="index.php?uc=fraisAValider&action=voiFraisAValider"><?php echo $b?></a></td>
            <td class="qteForfait"><a href="index.php?uc=fraisAValider&action=voiFraisAValider"><?php echo $c?></a></td>
         </tr>
		 <?php
          }
		?>
	
    </table>
  	
  </div>
 













