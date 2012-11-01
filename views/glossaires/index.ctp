<?php 
$title_for_layout="Glossaire";

?><div class="glossaires index">
	<h2><?php __('Glossaire');?></h2>
<!-- begin search form -->
<table>
	<tr>
	<td>
		<div class="input">
			<?php echo $form->create('Glossaire', array('url' => array('action' => 'index'))); ?>
			<?php #echo $form->input('q', array('style' => 'width: 250px;', 'label' => false, 'size' => '80')); ?>
			<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
	</td>
	<td>
		<input type="button" class="vider" value="Vider" onClick="javascript:vide_recherche('GlossaireQ')" />
		<input type="submit" class="chercher" value="Chercher" /> 
	</td>
	</tr>
</table>
<!-- end search form -->
	<table cellpadding="0" cellspacing="0">
	<tr>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
/* 
 * useful to get a list from last entries, as ID is an auto-incremental key
 */
	if($session->read('Auth.User.role')=="administrator") {
?>
			<th><?php echo $this->Paginator->sort('id');?></th>
<?
	}
//end hide from non-admin registred user
?>	
			<th><?php echo $this->Paginator->sort('libelle');?></th>
			<th><?php echo $this->Paginator->sort('Définition','definition1');?></th>
			<th><?php echo $this->Paginator->sort('Image','image');?></th>
			<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>	

			<th class="actions"><?php __('Actions');?></th>
<?
	}
//end hide from non-admin registred user
?>	
</tr>
	<?php
	$i = 0;
	foreach ($glossaires as $glossaire):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td><?php echo $glossaire['Glossaire']['id']; ?>&nbsp;</td>
		<?
	}
//end hide from non-admin registred user
?>	
		<td>
		<?php echo $this->Html->link(ucfirst($glossaire['Glossaire']['libelle']), array('action' => 'view', $glossaire['Glossaire']['id'])); ?>
		</td>
		<td><?php echo $glossaire['Glossaire']['definition1']; ?>&nbsp;</td>
		<td><?php 
	/*
		* print image only if any
		*/
		if($glossaire['Glossaire']['image']){
			echo "<img style=\"width: 35px;\" src=\"/atable20/img/glossaire/".$glossaire['Glossaire']['image']."\" />";
		}
		?>&nbsp;</td>
		<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>	
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $glossaire['Glossaire']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $glossaire['Glossaire']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $glossaire['Glossaire']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $glossaire['Glossaire']['id'])); ?>
		</td>
<?
	}
//end hide from non-admin registred user
?>	
		</tr>
<?php endforeach; ?>
	</table>
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
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Glossaire', true), array('action' => 'add')); ?></li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>	