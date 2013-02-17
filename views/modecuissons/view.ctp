<div class="modecuissons view">
<h2><?php  __('Modecuisson');?></h2>
		
		<h1><?php echo $modecuisson['Modecuisson']['lib']; ?></h1>
<p>		
			<?php echo $modecuisson['Modecuisson']['rem']; ?>
</p>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Modecuisson', true), array('action' => 'edit', $modecuisson['Modecuisson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Modecuisson', true), array('action' => 'delete', $modecuisson['Modecuisson']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $modecuisson['Modecuisson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modecuissons', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modecuisson', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
		<br />
<div class="related">
	<h3><?php __('Related Recettes');?></h3>
	<?php if (!empty($modecuisson['Recette'])):?>
	<?php
		$i = 0;
		foreach ($modecuisson['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		echo "<div class=\"relatedrecette\">";
		echo "<a href=\"". CHEMIN ."recettes/view/" 
		.$recette['id'] ."\" title=\"Voir la recette\">";
		//echo "<span style=\"width: 30px;\">";
		echo $recette['titre'];
		//echo "</span>";
		echo "<img class=\"related_img_recette\" 
			src=\"".CHEMIN."img/pics/".$recette['pict']."\"></a>";
		echo "</div>";
		endforeach; ?>
	</table>
<?php endif; ?>

</div>
