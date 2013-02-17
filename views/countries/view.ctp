<div class="countries view">
<h2><?php  __('Country');?></h2>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $country['Country']['id']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>


			<h1><?php echo $country['Country']['name']; ?></h1>
			
	</dl>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country', true), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Country', true), array('action' => 'delete', $country['Country']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
	<br />
<h3><?php __('Related Recettes');?></h3>
<div class="related_all_recettes">
<?php if (!empty($country['Recette'])):
		$i = 0;
		foreach ($country['Recette'] as $recette):
		echo "<div class=\"relatedrecette\">";
		echo "<a href=\"". CHEMIN ."recettes/view/" 
		.$recette['id'] ."\" title=\"Voir la recette\">";
		//echo "<span style=\"width: 30px;\">";
		echo $recette['titre'];
		//echo "</span>";
		echo "<img class=\"related_img_recette\" 
			src=\"".CHEMIN."img/pics/".$recette['pict']."\"></a>";
		echo "</div>";
		echo " ";
		endforeach;
	endif; ?>
</div>
