<?php 
/* 
 * Easy display of recipes, visual and cutted into pieces like a cucumber
 * 
 * */

App::import('Lib', 'functions'); //imports app/libs/functions
/*
 * nombre de personnes n'est pas fixé
 */
if(!$_GET['np']){
?>
<div class="titre_recette"><?php echo $recette['Recette']['titre']; ?></div>

<?	
	select_np_recette($recette['Recette']['id']);
} else {
?>
<script type="text/javascript">
			   function zoomit(img) {
				   document.getElementById(img).style.display = 'block'
			   }
			   function zoomout(img) {
				   document.getElementById(img).style.display = 'none'
			   }
   </script>
<?php
 /* pagination */
 $keletape=$_GET['keletape'];
 if(!$keletape) {
	 $keletape=0;
 }
?>
<a title="Début de la recette" href="<? echo CHEMIN; ?>recettes/viewimg/<?php echo $recette['Recette']['id']; ?>">
<div class="titre_recette"><?php echo $recette['Recette']['titre']; ?></div>
<img class="img_recette" src="<? echo CHEMIN; ?>img/pics/
<?php echo $recette['Recette']['pict']; ?>" alt="<?php echo $recette['Recette']['titre']; ?>" title="<?php echo $recette['Recette']['titre']; ?>">
</a>

<?php

/* audio ingredients */
if($recette['Recette']['ingr']){
	$audio=$recette['Recette']['ingr'];
	allvideomp3('recettes/'.$audio);
}
?>
<div class="img_display">
<div class="img_first_display">
			<?php 
			glossaire($recette['Recette']['prep']); 
			?>
			</div>
</div>

<?php 


etapesimg($recette['Recette']['id'],$_GET['np']);
?>
<?php 
/* market */ 
echo "<a href=\"" .CHEMIN ."recettes/commissions?id=".$recette['Recette']['id']."\" title=\"";
__('Market');
echo "\">";
?>
<h2 style="margin-top: 20px; font-size: 2.3em"><?php __('Ingrédients & commissions'); ?>&nbsp;

<?php

//echo $html->image('icons/panier.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
echo $html->image('icons/caddi.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
//echo "<br/>";
//__('Market');
echo "</a>";
?>
</h2>
<?php 
if($recette['Recette']['source']) {
	echo "<br><span style=\"color: grey\">Source recette: <a href=\"" .$recette['Recette']['source'] ."\">" .$recette['Recette']['source'] ."</a></span>";
}

?>
<?php 
menus_lies($recette['Recette']['id'],$recette['Recette']['type_id']);

}
?>
