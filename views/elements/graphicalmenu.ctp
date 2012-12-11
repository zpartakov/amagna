<?php 
$largeur_image=120;
?>
	<p>
	<a href="<? echo CHEMIN; ?>" title="Accueil">
	<? echo $html->image('menus/accuei_md.jpg', array("alt"=>"Accueil", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
	</a>
	</p>
	<p>
	<a href="<? echo CHEMIN; ?>pages/recettes" title="Recettes">
		<? echo $html->image('menus/recettes_md.jpg', array("alt"=>"Recettes", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
	</a></p>
	<p><a href="<? echo CHEMIN; ?>menus/indeximg" title="Menus">
		<? echo $html->image('menus/carte_md.jpg', array("alt"=>"Menus", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
	</a></p>
	<p><a href="<? echo CHEMIN; ?>glossaires/" title="Glossaire de termes culinaires">
		<? echo $html->image('menus/glossair_md.jpg', array("alt"=>"Glossaire de termes culinaires", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
	</a></p>




