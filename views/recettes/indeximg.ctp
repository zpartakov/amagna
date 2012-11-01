<div class="recettes index">
	<h2><?php __('Recettes');?></h2>
	<table cellpadding="0" cellspacing="0">
		<?php
	if(count($recettes)<1) {
			echo "Désolé, il n'y a pas de recettes correspondant à votre recherche";
	}
	$i = 0;
	foreach ($recettes as $recette):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	<td>
		<a href="<? echo CHEMIN; ?>recettes/viewimg/<? echo $recette['Recette']['id']?>" title="Voir la recette de : <? echo $recette['Recette']['titre']?>">
			<? echo $html->image('pics/'.$recette['Recette']['pict'], array("alt"=>"Lien vers les recettes de viandes", "width" => $largeur_image."px", "class" => "rounded", "style"=>"vertical-align: middle"));?>
<br />
<?php
	echo $recette['Recette']['titre'];
?>
	</a>
	</td>
	</tr>
<?php endforeach; ?>
	</table>



