<script type="text/javascript">
			   function zoomit(img) {
				   document.getElementById(img).style.display = 'block'
			   }
			   function zoomout(img) {
				   document.getElementById(img).style.display = 'none'
			   }
   </script>
<?php
App::import('Lib', 'functions'); //imports app/libs/functions 

/* 
 * Easy display of recipes, visual and cutted into pieces like a cucumber
 * 
 * */
 /* pagination */
 $keletape=$_GET['keletape'];
 if(!$keletape) {
	 $keletape=0;
 }

?>
<a title="Début de la recette" href="<? echo CHEMIN; ?>recettes/viewimg/<?php echo $recette['Recette']['id']; ?>">
<h1><?php echo $recette['Recette']['titre']; ?></h1>
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
<div class="img_display" style="padding-right: 50px; width: 60%; font-size: 1.3em">
			<?php 
			glossaire($recette['Recette']['prep']); 
			?>
</div>

<h2 style="margin-top: 20px; font-size: 2.3em"><?php __('Ingrédients'); ?>&nbsp;
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
</h2>
<p class="img_display" >
			<?php 
			ingredients($recette['Recette']['id'],1);
			?>
</p>
		
			<h2 style="margin-top: 20px; font-size: 2.3em"><?php __('Ustensiles'); ?></h2>
			<?php 
			ustensiles($recette['Recette']['id'],$session->read('Auth.User.role'));
			?>

			<?php 
			
			//$etapes=etapesimg($recette['Recette']['id'],$session->read('Auth.User.role'),$keletape); 
			etapesimg($recette['Recette']['id']);
				
			//echo $etapes;
?>

		<?php 
/*
 * AS we work with etapes, field prep is a kind of general features about the recipe; 
 * string __('Prep') replaced in french with "Note", see locale/fre/default.po
 */		?>




