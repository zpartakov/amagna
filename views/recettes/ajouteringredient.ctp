<?php 
/*
 * a view for adding ingredient for a given recipe
 */
App::import('Lib', 'functions'); //imports app/libs/functions 

?>
<h2>Ajouter un ingrédient à la recette: 
<?php titre_recette($_GET['id'])?>
</h2>

<table cellpadding="0" cellspacing="0">
	<?php
	$i = 0;
	foreach ($ingredients as $ingredient):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>


	<tr<?php echo $class;?>>
		<!-- <td><?php echo $ingredient['Ingredient']['id']; ?>&nbsp;</td> -->
		<td><?php echo $ingredient['Ingredient']['libelle']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['typ']; ?>&nbsp;</td>
		<td><?php echo $ingredient['Ingredient']['unit']; ?>&nbsp;</td>
			<td>	<? echo $html->image('ingredients/'.$ingredient['Ingredient']['img'], array("width" => "40px", "style"=>"vertical-align: middle"));?></td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ajouter', true), 
			array('action' => 'ajouteringredientok?id_rec='.$_GET['id'].'&id_ingr='.$ingredient['Ingredient']['id'].'&unit='.$ingredient['Ingredient']['unit'])); ?>
		</td>
	</tr>

			
<?php endforeach; ?>
	</table>
<pre>
<?php 
/* TODO: exclude ingredients already in the recipe
 * 
[7] => Array
        (
            [Ingredient] => Array
                (
                    [id] => 51
                    [libelle] => Anchois
                    [typ] => Épicerie
                    [unit] => kg
                    [kcal] => 450.000
                    [price] => 0.000
                    [img] => poissons/anchois.jpg
                    [commissions] => 1
                )

            [Recette] => Array
                (
                    [0] => Array
                        (
                            [id] => 9837
                            [country_id] => 1
                            [titre] => test recette salée
                            [temps] => -
                            [ingr] => -
                            [pers] => 1
                            [type_id] => 20
                            [user_id] => 6
                            [prep] => <p>
	un test pour recette tr&egrave;s sal&eacute;e qui demande de racheter des r&eacute;serves</p>

                            [date] => 2012-09-22
                            [score] => 0
                            [source] => test
                            [pict] => -
                            [private] => 0
                            [IngredientsRecette] => Array
                                (
                                    [id] => 103
                                    [ingredient_id] => 51
                                    [recette_id] => 9837
                                    [quant] => 2.000
                                )

                        )

                )
 */
 ?>
