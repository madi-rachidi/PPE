
<h3>Fiche de frais a valider du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
  	<table class="listeLegere">
  	   <caption>FICHE</caption>
        <tr>
         <?php
         for ($i=0;$i<3; $i++)
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
                      // $a contient le premier élément du tableau interne,
                     // et $b contient le second élément.
                        echo "A: $a; B: $b; C: $c\n  ";
                
		?>
                <td class="qteForfait"><?php echo $a?><?php echo $b?><?php echo $c?></td>
		 <?php
          }
		?>
		</tr>
    </table>
  	
  </div>
  </div>
 













