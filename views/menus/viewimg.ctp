<?php 
/*
 * a facilitated view of the view of a menu of recipes
 */
App::import('Lib', 'functions'); //imports app/libs/functions ?>
<div class="menus view">
<h2><a class="tooltip" href="#"><?php echo $menu['Menu']['libelle']; ?>
<em><span></span>
<?php echo $menu['Menu']['descriptif']; ?>
</em></a>
</h2>
<div style="position: relative; left: 250px; top: -50px;">
<?php /*
 * audio display file if any
*/
display_audio("menus/".$menu['Menu']['id']); ?>
</div>

<dl><?php $i = 0; $class = ' class="altrow"';?>
<!-- 		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descriptif'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			
			
			<?php echo $menu['Menu']['descriptif']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prix'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
/*
 * graphical display for price and difficulty
 * 
 */			for($i=1; $i<=$menu['Menu']['prix']; $i++){
				echo $html->image('icons/dollar.png', array("alt"=>"Prix", "width"=>"20","height"=>"20"));
			}
			?>
			&nbsp;
		</dd>
-->		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Difficulte'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			for($i=1; $i<=$menu['Menu']['difficulte']; $i++){
				echo $html->image('icons/star.png', array("alt"=>"Difficulté", "width"=>"20","height"=>"20"));		
			}
		?>
			&nbsp;
		</dd>
<!--  		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['date_created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last Update'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['last_update']; ?>
			&nbsp;
		</dd>
-->		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Saison'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php #echo $this->Html->link($menu['Saison']['saison'], array('controller' => 'saisons', 'action' => 'view', $menu['Saison']['id'])); 
			
			season_image($menu['Saison']['id']);
			?>
			&nbsp;
		</dd>
<!--		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rem'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['rem']; ?>
			&nbsp;
		</dd> -->
	</dl>

</div>
	<br />
<!-- RECIPES LINKED TO THIS MENU -->	
<div class="related">
	<?php if (!empty($menu['Recette'])):?>
	<table cellpadding = "0" cellspacing = "0">
		<tr>
	<?php
		$i = 0;
		foreach ($menu['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<td<?php echo $class;?>>
			<a href="<? echo CHEMIN; ?>recettes/viewimg/<?php echo $recette['id']; ?>">
			<img class="img_menus_recette_thumb" src="<? echo CHEMIN; ?>img/pics/<?php echo $recette['pict']; ?>">
	</a><p class="menus_lib">
			<?php echo $this->Html->link($recette['titre'], array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
			</p>
</td>		<?php endforeach; ?>
		</tr>
	</table>
<?php endif; ?>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add'));?> </li>
		</ul>
	</div>
<?
	}
//end hide from non-admin registred user
?>	
</div>
