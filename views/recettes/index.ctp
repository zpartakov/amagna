<div class="recettes index">
	<h2><?php __('Recettes');?></h2>
	<!-- begin search form -->
<table>
	<tr>
	<td>
		<div class="input">
			<?php echo $form->create('Recette', array('url' => array('action' => 'index'))); ?>
			<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
	</td>
	<td>
		<input type="button" class="vider" value="Vider" onClick="javascript:vide_recherche('RecetteQ')" />
		<input type="submit" class="chercher" value="Chercher" /> 
	</td>
	</tr>
</table>
<!-- end search form -->
	<table cellpadding="0" cellspacing="0">
	<!--<tr>
			 <th><?php echo $this->Paginator->sort('id');?></th> 
			<th><?php echo $this->Paginator->sort('country_id');?></th> 
			<th><?php echo $this->Paginator->sort('titre');?></th>
			 <th><?php echo $this->Paginator->sort('temps');?></th>
			<th><?php echo $this->Paginator->sort('ingr');?></th>
			<th><?php echo $this->Paginator->sort('pers');?></th>
			<th><?php echo $this->Paginator->sort('type_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('prep');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('score');?></th>
			<th><?php echo $this->Paginator->sort('source');?></th>
			<th><?php echo $this->Paginator->sort('pict');?></th>
			<th><?php echo $this->Paginator->sort('private');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>-->
	<?php
	if(count($recettes)<1) {
			$word=$this->data['Recette']['q'];
			$word = strtolower($word);
			echo "Désolé, il n'y a pas de recettes correspondant à votre recherche: <em>" .$word."</em>";
				
echo "<br/>Voulez-vous dire:<br/>";
//FUNCTION picadametlesch5.levenshtein does not exist

			
			$lev = 0;
			
			$q = mysql_query("SELECT titre FROM `recettes`");
			$mots=array();
			while($r = mysql_fetch_assoc($q))
			{
			
//echo $r['titre'];
$titre=explode(" ",$r['titre']);

$size=count($titre);

for ($i=0; $i <= $size; $i++)
	//echo $titre[$i] . "<BR>";
array_push($mots,$titre[$i]);


}
				
foreach ($mots as $mot){
	$lev = levenshtein($word, $mot);
	if($lev >= 0 && $lev < 5)
	{
		echo "<em>" .$mot ."</em><br/>";
	}
}

			}
	
	
	$i = 0;
	foreach ($recettes as $recette):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $recette['Recette']['id']; ?>&nbsp;</td> 
		<td>
			<?php echo $this->Html->link($recette['Country']['name'], array('controller' => 'countries', 'action' => 'view', $recette['Country']['id'])); ?>
		</td>-->
		<td><?php 
		echo $this->Html->link($recette['Recette']['titre'], 
				array('action' => 'view', $recette['Recette']['id'])); ?>
				
		&nbsp;</td>
		<!-- <td><?php echo $recette['Recette']['temps']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['ingr']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['pers']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recette['Type']['name'], array('controller' => 'types', 'action' => 'view', $recette['Type']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recette['User']['email'], array('controller' => 'users', 'action' => 'view', $recette['User']['id'])); ?>
		</td>
		<td><?php echo $recette['Recette']['prep']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['date']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['score']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['source']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['pict']; ?>&nbsp;</td>
		<td><?php echo $recette['Recette']['private']; ?>&nbsp;</td> -->
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $recette['Recette']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $recette['Recette']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $recette['Recette']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recette['Recette']['id'])); ?>
		</td>
<?
	}
//end hide from non-admin registred user
?>	
	</tr>
<?php endforeach; ?>
	</table>
<?php
//paginator only it there are results
		if(count($recettes)>0) {
?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?
	}
?>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recette', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries', true), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country', true), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus', true), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu', true), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stats', true), array('controller' => 'stats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stat', true), array('controller' => 'stats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etapes', true), array('controller' => 'etapes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etape', true), array('controller' => 'etapes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients', true), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient', true), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modecuissons', true), array('controller' => 'modecuissons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modecuisson', true), array('controller' => 'modecuissons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orthographes', true), array('controller' => 'orthographes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Orthographe', true), array('controller' => 'orthographes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Saisons', true), array('controller' => 'saisons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saison', true), array('controller' => 'saisons', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
