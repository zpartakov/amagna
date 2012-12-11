<?php 
/*
		 * add a given ingredient to recipe
		 */
App::import('Lib', 'functions'); //imports app/libs/functions 

/*	?id_rec=9837&id_ingr=534&unit=
*/	
echo "recette id: " .$_GET['id_rec'];
echo "<br>";
echo "id_ingr id: " .$_GET['id_ingr'];
echo "<br>";

if(!$_GET['ing2add']){
?>
<h2>Ajouter un ingrédient à la recette: 
<?php titre_recette($_GET['id_rec']);?>
</h2>
<h3><?php np_recette($_GET['id_rec']);?></h3>
<?php ingredient_info($_GET['id_ingr'],$_GET['id_rec']);?>
<?php 
} elseif($_GET['test']=="test") {
//	echo "Ajouter " .$_GET['ing2add'] ." de l'ingredient " .$_GET['id_ingr']." à la recette " .$_GET['id_rec'];
//$sql="INSERT INTO ingredients_recettes ('id', 'ingredient_id', 'recette_id', 'quant') VALUES (NULL, '".$_GET['id_ingr']."', '".$_GET['id_rec']"', '".$_GET['ing2add']."')";
$sql="
INSERT INTO `ingredients_recettes` 
(`id`, `ingredient_id`, `recette_id`, `quant`) 
VALUES (NULL, '".$_GET['id_ingr']."', '".$_GET['id_rec']."', '".$_GET['ing2add']."')";

//echo $sql;
$sql=mysql_query($sql);
if (!$sql) {
	echo "error mysql: " .mysql_error();
}
$urlredirect="/atable20/recettes/edit/".$_GET['id_rec'];
header("Location: ".$urlredirect);
}
?>

