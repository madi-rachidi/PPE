<div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;"><h1>Validation des Frais</h1></div>	
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:6575BA;color:white;height:88%;">
	<form name="formValidFrais" method="post" action="index.php?uc=fraisAValider&action=enregistrement&idvisiteur=<?php  echo"$valeur" ?>&date=<?php  echo"$leMois" ?>">
            <h1> Validation des frais par visiteur </h1>
            <p class="titre" />
            <div style="clear:left;"><h2>Frais au forfait </h2></div>
            <table style="color:white;" border="1">
		<tr><th>Repas midi</th><th>Nuitée </th><th>Etape</th><th>Km </th><th>Situation</th></tr>
            <?php 
            $etape = $lesFraisForfait[0][2];
            $fraisKm= $lesFraisForfait[1][2];
            $nuitee=$lesFraisForfait[2][2];
            $repas=$lesFraisForfait[3][2];
            $array=array();
            echo $repas;
            ?>
                <tr align="center"><td width="80" ><input type="text" size="3" name="repas" value="<?php  echo $repas ?>"/></td>
                    <td width="80"><input type="text" size="3" name="nuitee" value="<?php  echo $nuitee ?>"/></td> 
                    <td width="80"> <input type="text" size="3" name="etape" value="<?php  echo $etape ?>"/></td>
                    <td width="80"> <input type="text" size="3" name="km" value="<?php  echo $fraisKm ?>"/></td>
                    <td width="80"> 
                            <select size="3" name="situ">
                                    <option value="E">Enregistrer</option>
                                    <option value="V">Valider</option>
                                    <option value="R">Rembourser</option>
                            </select></td>
                </tr>
		
         </table>
            <p class="titre"></p>
		<div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant" value="<?php  $nbJustificatifs ?>"/>		
		<p class="titre" /><label class="titre">&nbsp;</label><input class="zone"type="reset" /><input class="zone"type="submit" name="valider" />
	
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
                
                <table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait</caption>
             <tr>
                <th class="date">Date</th>
		<th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>  
                <th class="libelle">Date</th>
                <th class="action">&nbsp;</th>              
             </tr>
          
    <?php    
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date = $unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
	?>		
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td width="80"> <input type="text" size="10" name="datetxt" value="<?php  echo $date ?>"/></td>
                <td><a href="index.php?uc=fraisAValider&action=supprimerFrais&idFrais=<?php echo $id ?>"onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
             </tr>
                </table>
                </form>
	</div>
	<?php		 
          }
	?>
      	