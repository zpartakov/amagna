<?php 

App::import('Lib', 'functions'); //imports app/libs/functions 

/*
 * record recipe for logged user
 */

if($session->read('Auth.User.role')) {
	recordRecipe($session->read('Auth.User.id'),$recette['Recette']['id']);
}
?>
<style>
dt {
width: 30%;
}
dd {
width: 70%;

}
</style>
<div class="recettes view">



	<h2><?php  
	__('Recette');
	echo ": ";
	echo $recette['Recette']['titre'];
	?>
	<a href="<? echo CHEMIN; ?>recettes/viewimg/<? echo $recette['Recette']['id']; ?>" title="Recette facilitée par étapes">
	<? echo $html->image('icons/Fairytale_image.png', array("alt"=>"Recette facilitée par étapes", "style"=>"vertical-align: middle"));?>
		</a>
	</h2>
	<img class="img_recette" src="<? echo CHEMIN; ?>img/pics/<?php echo $recette['Recette']['pict']; ?>
	" alt="<?php echo $recette['Recette']['titre']; ?>" title="<?php echo $recette['Recette']['titre']; ?>">



	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prep'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recette['Recette']['prep']; 
			?>
		
			&nbsp;
		</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recette['Country']['name'], array('controller' => 'countries', 'action' => 'view', $recette['Country']['id'])); ?>
			&nbsp;
		</dd>	
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ustensiles'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			ustensiles_list($recette['Recette']['id'],$session->read('Auth.User.role'));
			?>
			&nbsp;
		</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ingrédients'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			ingredients($recette['Recette']['id'],0,$session->read('Auth.User.role'));
			?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?> title="changer la valeur pour calculer les commissions"><?php __('Personnes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				
				<form action="../commissions" target="_blank">
				<input type="hidden" name="img" value="0">
		&nbsp;
		<?php echo $recette['Recette']['pers'];?>
				&nbsp;
				<span style="font-style: italic; font-size: smaller">
			<input type="submit" value="recalculer"> pour: 
				<input title="changer la valeur pour calculer les commissions" type="text" 
		name="np" value="<?php echo $recette['Recette']['pers'];?>" 
		style="width: 30px; font-size: smaller" onchange="this.form.submit()">
		&nbsp;personnes
	</span>
	<input type="hidden" name="id" value="<?php echo $recette['Recette']['id'];?>">
		<input type="hidden" name="type" value="texte">
		</form>

		
		&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recette['Type']['name'], array('controller' => 'types', 'action' => 'view', $recette['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recette['User']['email'], array('controller' => 'users', 'action' => 'view', $recette['User']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Etapes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			$etapes=etapes($recette['Recette']['id'],$session->read('Auth.User.role')); 
			echo $etapes;
			

/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
		echo "&nbsp;<a href=\"".CHEMIN ."etapes/add/?recette=".$recette['Recette']['id'] ."\">Ajouter une étape</a>";
}
?>

		
			&nbsp;
		</dd>
		
		 
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo datemySQL2fr($recette['Recette']['date']); ?>
			&nbsp;
		</dd>
<!--  		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Score'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recette['Recette']['score']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Source'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recette['Recette']['source']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pict'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			&nbsp;
		</dd>-->
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Private'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recette['Recette']['private']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>
	</dl>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
	
?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $recette['Recette']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $recette['Recette']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recette['Recette']['id'])); ?>




<?
	}
//end hide from non-admin registred user
?>
<?php 
if($recette['Recette']['source']) {
	echo "<br><span style=\"color: grey\">Source recette: <a href=\"" .$recette['Recette']['source'] ."\">" .$recette['Recette']['source'] ."</a></span>";
}

?>

<?php 
menus_lies($recette['Recette']['id'],$recette['Recette']['type_id']);
?>
