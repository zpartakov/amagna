<?php 
/*
 * shopping list (commissions) for a given recipe, with reserves
 * 
 */
App::import('Lib', 'functions'); //imports app/libs/functions 
?>
<div class="recettes view">

<h2>
<?php  
/* print the title of the recipe */
__('Commissions');
echo ": ";
$id=$_GET['id'];
//echo "<br/>";
titre_recette($id);
echo "</h2><br/>";

$np=$_GET['np'];
$type=$_GET['type'];
if(!$np){
	/* select first how many people for the recipe before computing quantities */
	?>
	<form>
	<?php __('Nombre de personnes');?>
	<input type="text" name="np" value="2" style="width: 30px">
	<input type="hidden" name="id" value="<?php echo $id;?>">

		<?php
		/*
		 * print the required meals which belongs to reserves for the given recipe id
		 */
		reserve_calcule($id);
	?>
	<input type="submit">
	</form>	<?php
} else {
/* compute missing reserves */	
	$reserves=$_SERVER["REQUEST_URI"];
	$reserves=explode("ingredient_", $reserves);

	if(count($reserves)>1) {
		echo "<h3>Réserves à racheter</h3>";
		echo "<table>";
		for($i=1;$i<count($reserves);$i++) {
			$manque=$reserves[$i];
			$manque=preg_replace("/\=.*/","",$manque);
			//echo "<br>reserves: " .$manque ."<br>";
			/* 
			 * cree un array avec les reserves a racheter pour une utilisation ulterieure, pas encore eu la bonne idée pour cumuler avec les commissions "normales"
			 * 
			 */
			array_push($reserves_a_racheter,$manque);
			rachete_reserve($manque);
			}
	echo "</table>";

	}
	$reserves_a_racheter=array();

//print_r($reserves_a_racheter) ."<br>";
/* compute ingredients 
 * la derniere valeur 1 pour arrondir, 0 si on veut précis
 * */
	
	if($_GET['img']=="0"){
		$arrondir=0;
	}else {
		$arrondir=1;
	}
	ingredientscalcule($id,1,$np,$arrondir);
	$audio="ingredients/".$id.".mp3";
	allvideomp3($audio);
//print page
echo "<a style=\"float: right\" class=\"logoprint\" href=\"javascript:window.print();\">";
echo $html->image('icon-print.jpg', array("alt"=>"Imprimer","title"=>"Imprimer", "width"=>"20","height"=>"20"));
echo "&nbsp;Imprimer</a>"; 
echo "
<table>
<tr>";
if($type!="texte") {
echo "<td style=\"text-align: left\">";
retour_page_precedente();
echo "</td>";
}
echo "<td style=\"text-align: right\">";
/* normal display */
if($type=="texte") {
	echo "<a title=\"Retour\" href=\"".$_SERVER["HTTP_REFERER"]."\"><img alt=\"Retour\" src=\"".CHEMIN ."img/icons/suivant.jpg\" /></a>";	
} else {
	/* facilitated display */
	echo "<a title=\"Etape suivante\" href=\"".CHEMIN ."recettes/ustensiles?id=".$id ."\"><img alt=\"Etape suivante\" src=\"".CHEMIN ."img/icons/suivant.jpg\" /></a>";
}
echo "</td></tr></table>";
}
?>

