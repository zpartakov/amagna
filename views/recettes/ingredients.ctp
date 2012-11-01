<?php 
/*
 * a view for editing the ingredients for a given recipe
 */
App::import('Lib', 'functions'); //imports app/libs/functions 
?>
<?php
//	echo phpinfo();
//print_r($recette);
//echo $recette['Recette']['id'];
// exit;
$ingredients=$recette['Ingredient'];
echo "<h2>Modifier les ingrédients de la recette: ";
titre_recette($recette['Recette']['id']);
echo "</h2>";
echo "<h2>Liste des ingrédients</h2>";
ingredients_modif($recette['Recette']['id']);
?>
<a href="/atable20/recettes/ajouteringredient?id=<?php echo $recette['Recette']['id']?>">Ajouter un ingrédient</a>