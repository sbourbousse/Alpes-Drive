<?php
    $serveur="localhost:3306";
	$baseName="Alpes_Drive";
	$mdp="";
    $user="root";
    
    $maBase=new mysqli($serveur,$user,$mdp,$baseName);
        
		if($maBase -> errno)    echo"Erreur : ".$maBase -> error;
?>