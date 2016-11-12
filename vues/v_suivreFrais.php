<form action="index.php?uc=fraisAValider&action=rembourser" method="post">

    <input type='hidden' name='in_user' value='<?php echo $visiteur; ?>' />
    <input type='hidden' name='in_mois' value='<?php echo $dateValide; ?>' />
    
    <br/>
    <?php 
        //$infos = $pdo->getNomPrenomVisiteur($visiteur);
        echo $nomPrenomVisiteur;
        ?>
    <br/>
    
    <table class="listeLegere">
       <caption>Eléments forfaitisés</caption>
        <tr>
         <?php
            foreach ( $lesFraisForfait as $unFraisForfait ) 
                 {
                    $libelle = $unFraisForfait['libelle'];
         ?>	
                    <th> <?php echo $libelle?></th>
            <?php
                }
            ?>
        </tr>
        <tr>
        <?php
            foreach (  $lesFraisForfait as $unFraisForfait  ) 
                {
                    $quantite = $unFraisForfait['quantite'];
                    $id_ff = $unFraisForfait['idfrais'];
        ?>
              <td class="qteForfait">
                  
                  <?php echo $quantite; ?>
                 
              </td>
        <?php
                }
        ?>
        </tr>
    </table>

    <br/>
    <br/>

    <table class="listeLegere">
        <caption>Descriptif des éléments hors forfait</caption>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>
        </tr>
        
    <?php
    
    
      foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
              {
          
                    $id_hf = $unFraisHorsForfait['id'];
                    $date = $unFraisHorsForfait['date'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $montant = $unFraisHorsForfait['montant'];
                    
    ?>
         <tr>
             
            <td>
                <?php echo $date; ?>
            </td>
            <td>
                <?php echo $libelle; ?>
               
            </td>
            <td>
                <?php echo $montant; ?>
            </td>

    <?php 
    
            }
    ?>

    
         </tr>
    </table>
    
    <br/>
    <br/>
    
    <!-- Etat de la fiche -->
    
    <table class="listeLegere">
        <caption>Etat de la fiche de frais</caption>
        <tr>
            <th>Etat actuel</th>
        </tr>
        <tr>
            <td>
                <?php
                
                    $etat_actuel = $lesInfosFicheFrais['libEtat'];
                    //$etat_actuel_id = strtoupper($lesInfosFicheFrais['idEtat']);
                    
                    echo $etat_actuel;
                ?>
                
                    <input type='hidden' name='etat_defaut' value='<?php echo $etat_actuel_id; ?>' />
            </td>
        </tr>
    </table>
    
    <br/>
    <br/>

    <div class="encadre">
     <p>
        <br> Montant validé : <?php echo $montantValide?>
     </p>


    <p class="titre"></p>
    <span>Nb justificatif : </span> <?php echo $nbJustificatifs ?>
    
    <br />
    <br />
    
    <input value="Rembourser" class="zone"type="submit" />
    
    <br />
    <br />
    <a href="index.php?uc=fraisAValider&action=pdf"><img id=supp src="images/pdf.png" alt="pdf" /> </a>
    
    <br />
    <br /> 
    
    </div>
</form>