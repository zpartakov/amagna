<div class="related">
	<?php if (!empty($etape['Recette'])):?>

	<?php
		$i = 0;
		foreach ($etape['Recette'] as $recette):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
<h1><?php echo $recette['titre'];?></h1>

<?php 
$query="
SELECT * FROM etapes_recettes AS er, etapes AS e 
WHERE er.recette_id=" .$recette['id'] ." AND e.id=er.etape_id 
ORDER BY e.order";

//echo $sql; exit;
$result=mysql_query($query);
echo "<h3>Etape: " .$etape['Etape']['order'] ." de " .mysql_num_rows($result) ."</h3>";

/* 
 * pagination
 */
$i=0;
while($i<mysql_num_rows($result)) {
	if($etape['Etape']['id']==mysql_result($result,$i,'etape_id')){
		$etapeprec=mysql_result($result,($i-1),'etape_id');
		$etapesuiv=mysql_result($result,($i+1),'etape_id');
	}
		$i++;
}

echo "etape id: ".$etape['Etape']['id'] ." - prec: " .$etapeprec ." - suivante: " .$etapesuiv ."<br>";

echo "<div class=\"pagination\">";

if($etape['Etape']['order']!=1){//not the first step, there are some previous
	echo "<a title=\"Etape précédente\" href=\"".CHEMIN ."etapes/view/".$etapeprec ."\"><img alt=\"Etape précédente\" src=\"".CHEMIN ."img/icons/previous.jpg\" /></a>";
}
if($etape['Etape']['order']<mysql_num_rows($result)){//not the last step, there are some next
	echo "<a title=\"Etape suivante\" href=\"".CHEMIN ."etapes/view/".$etapesuiv ."\"><img alt=\"Etape suivante\" src=\"".CHEMIN ."img/icons/suivant.jpg\" /></a>";
}

echo "</div>";
?>

<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>				<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'recettes', 'action' => 'view', $recette['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'recettes', 'action' => 'edit', $recette['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'recettes', 'action' => 'delete', $recette['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recette['id'])); ?>
				
<?
	}
//end hide from non-admin registred user
?>			
	<?php endforeach; ?>
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
<div class="etapes view">

<h2><?php  __('Etape');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Text'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['text']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['image']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sound'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['sound']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Video'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			if($etape['Etape']['video']){
				#echo '<iframe width="420" height="315" src="'. $etape['Etape']['video'] .'" frameborder="0" allowfullscreen></iframe>'; 
			}
			?>
			&nbsp;
			<br />
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $etape['Etape']['notes']; ?>
			&nbsp;
		</dd>
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
		<li><?php echo $this->Html->link(__('Edit Etape', true), array('action' => 'edit', $etape['Etape']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Etape', true), array('action' => 'delete', $etape['Etape']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $etape['Etape']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Etapes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etape', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recettes', true), array('controller' => 'recettes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recette', true), array('controller' => 'recettes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>