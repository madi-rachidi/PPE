<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
        case 'selectionnerMoisAValider':{
		$lesMois=$pdo->getLesMoisAValider();
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("vues/v_listMoisAValider.php");
		break;
        }
        case 'visiteurFraisAValider':{
            	$lesMois=$pdo->getLesMoisAValider();
                $leMois = $_REQUEST['lstMois'];
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $leMois;
               /* var_dump($moisASelectionner);*/ //debug
		include("vues/v_listMoisAValider.php");
		$aValider=$pdo->getLesFicheFraisAValider($leMois);
                $title = [IdVisiteur, Nom, Prenom]; // pour l'affichage
                /*var_dump($lesMois);*///debug
                if (! is_array($aValider)){
                   echo"Aucune fiche Frais a valider"; 
                }
                include("vues/v_afficheVisiteur.php");
                /*else{
                    foreach ($aValider as list($a, $b, $c)) {
                      // $a contient le premier élément du tableau interne,
                     // et $b contient le second élément.
                        echo "A: $a; B: $b; C: $c\n  ";
                }
                
}*/
		
            }
        case "voiFraisAValider":{
            $lesMois=$pdo->getLesMoisAValider();
                $leMois = $_REQUEST['lstMois'];
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $leMois;
            echo"en fab oklm et ";
            
            echo"$_GET[$valeur]";
            
            
        }
       }

?>
