<?php App::import('Lib', 'functions'); //imports app/libs/functions ?>
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

<div class="titre_index_img">	
<a href="<? echo CHEMIN; ?>recettes/viewimg/<? echo $recette['Recette']['id']?>" 
title="Voir la recette de : <? echo $recette['Recette']['titre']?>">
<? echo $html->image('pics/'.$recette['Recette']['pict'], 
		array("alt"=>"Lien vers les recettes de viandes", 
			"width" => $largeur_image."px", 
				"class" => "image_index_img"));?>
<h1>
<?php
	echo $recette['Recette']['titre'];
?>
</h1>
</a>
</div>
<div class="audio_index_img">	
<?php
/* audio ingredients */
if($recette['Recette']['ingr']){
	$audio=$recette['Recette']['ingr'];
	allvideomp3('recettes/'.$audio);
}
?>
</div>
<div class="preparation_recette_index_img">
	<?php 
			glossaire($recette['Recette']['prep']); 
			?>
</div>
<div class="market_index_img">
			<?php 
/* market */ 
echo "<a href=\"" .CHEMIN ."recettes/commissions?id=".$recette['Recette']['id']."\" title=\"";
__('Market');
echo "\">";
//echo $html->image('icons/panier.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
echo $html->image('icons/caddi.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
//echo "<br/>";
//__('Market');
echo "</a>";
?>
</div>
<div class="suite_index_img">
<a href="<? echo CHEMIN; ?>recettes/viewimg/<? echo $recette['Recette']['id']?>" 
title="Voir la recette de : <? echo $recette['Recette']['titre']?>">
LIRE LA SUITE
<? echo $html->image('icons/suivant.jpg', array("alt"=>"Lire la suite de la recette", "style"=>"vertical-align: middle"));?>
</a>
</div>

	</td>
	</tr>
<?php endforeach; ?>
	</table>



