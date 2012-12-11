<?php 
/*
 * A horrible page to suppress a given ingredient from a given recipe
 * TODO: put it into the controller!
 */
Configure::write('debug', 2);
$sql="DELETE FROM `ingredients_recettes` WHERE (ingredient_id=".$_GET['ing_id'] ." AND recette_id = ".$_GET['rec_id'] .")";
//echo $sql; exit;
$sql=mysql_query($sql);
if(!$sql){
	echo "mysqlerror:" .mysql_error();
}
header("Location: ".$_SERVER["HTTP_REFERER"]);
//echo phpinfo();
?>
