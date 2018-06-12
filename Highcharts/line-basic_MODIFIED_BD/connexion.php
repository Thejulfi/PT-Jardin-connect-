<?php

$PARAM_hote='localhost';
$PARAM_nom_bd='releve';
$PARAM_utilisateur='root';
$PARAM_mdp=''; 

try
{
	$connexion = new PDO('mysql:host='.$PARAM_hote.';
	dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mdp);
	$connexion -> exec("set charset utf8");
}
catch(Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo'N°: '.$e->getCode();
}
?>