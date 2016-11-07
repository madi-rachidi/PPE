<?php
include("vues/v_sommaire.php");
$action     = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
    case 'selectionnerMoisAValider': {
        $lesMois = $pdo->getLesMoisAValider();
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        array_filter($lesMois); //va clean le tableau et supprimer les lignes qui aurons des valeurs null, vides ou false.
        if (empty($lesMois)) {
            ajouterErreur("Pas de fiche frais a valider ce mois-ci !");
            include("vues/v_erreurs.php");
        } else {
            $lesCles           = array_keys($lesMois);
            $moisASelectionner = $lesCles[0];
            include("vues/v_listMoisAValider.php");
        }
        break;
    }
    case 'visiteurFraisAValider': {
        $lesMois           = $pdo->getLesMoisAValider();
        $leMois            = $_REQUEST['lstMois'];
        $lesCles           = array_keys($lesMois);
        $moisASelectionner = $leMois;
        /* var_dump($moisASelectionner);*/ //debug
        include("vues/v_listMoisAValider.php");
        $numAnnee = substr($leMois, 0, 4);
        /*modifie le formatage de l'année*/
        $numMois  = substr($leMois, 4, 2);
        /*modifie le formatage du mois*/
        $aValider = $pdo->getLesFicheFraisAValider($leMois);
        include("vues/v_afficheVisiteur.php");
        break;
    }
    case "voirFraisAValider": {
        $valeur            = $_REQUEST["valeur"];
        $leMois            = $_REQUEST["date"];
        /**/
        $numAnnee          = substr($leMois, 0, 4);/*modifie le formatage de l'année*/
        $numMois           = substr($leMois, 4, 2);/*modifie le formatage du mois*/
        /**/
        $lesMois           = $pdo->getLesMoisAValider();
        $lesCles           = array_keys($lesMois);
        $moisASelectionner = $leMois;
        /**/
        var_dump($valeur);
        var_dump($leMois);
        $aValider            = $pdo->getLesFicheFraisAValider($leMois);
        /**/
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($valeur, $leMois);
        $lesFraisForfait     = $pdo->getLesFraisForfait($valeur, $leMois);
        $lesInfosFicheFrais  = $pdo->getLesInfosFicheFrais($valeur, $leMois);
        $numAnnee            = substr($leMois, 0, 4);
        $numMois             = substr($leMois, 4, 2);
        $libEtat             = $lesInfosFicheFrais['libEtat'];
        $montantValide       = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs     = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif           = $lesInfosFicheFrais['dateModif'];
        $dateModif           = dateAnglaisVersFrancais($dateModif);
        /**/
        include("vues/v_listMoisAValider.php");
        include("vues/v_afficheVisiteur.php");
        include("vues/v_validerFiche.php");
        break;
    }
    case 'enregistrement': {
        
        $repas  = $_POST['repas'];
        $nuitee = $_POST['nuitee'];
        $etape  = $_POST['etape'];
        $km     = $_POST['km'];
        $id     = $_REQUEST["idvisiteur"];
        $leMois = $_REQUEST["date"];
        // test afin de voir si toute les valeur son bien saisie
        if (($repas && $nuitee && $etape && $km && $id && $leMois) != null) {
            $pdo->majValeurFicheFrais($id, $leMois, $etape, $km, $nuitee, $repas);
            echo "enregistrement prit en compte";
            
           /* include("vues/v_validerFiche.php");*/
        } else {
            ajouterErreur("Valeur non saisie");
            include("vues/v_erreurs.php");
        }
        break;
    }
    case 'reporterFrais':{
	$idFrais = $_REQUEST['idFrais'];
	$pdo->reporterFraisHorsForfait($idFrais);
        break;
    }
    case 'refuserFrais':{
	$idFrais = $_REQUEST['idFrais'];
        $pdo ->refuserFraisHorsForfait($idFrais);
        break;
	 
        }
}

?>