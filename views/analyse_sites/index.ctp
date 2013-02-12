<?php 
$title_for_layout="Sites de recettes avec analyse";
?>
	<div class="analyseSites index">
	<h2><?php  echo $title_for_layout; ?></h2>
<h3>Cette page propose des liens sur des sites ou des logiciels de cuisine, avec des analyses
sur la facilitation proposée.</h3>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<?php echo $this->Html->link(__('New Analyse Site', true), array('action' => 'add')); ?>
<?
	}
//end hide from non-admin registred user
?> 	
<!-- begin search form -->
<table>
	<tr>
	<td> 
		<div class="input">
			<?php echo $form->create('AnalyseSite', array('type' => 'get')); ?>
			<?php #echo $form->input('q', array('style' => 'width: 250px;', 'label' => false, 'size' => '80')); ?>
			<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
	</td>
	<td>
		<input type="button" class="vider" value="Vider" onClick="javascript:vide_recherche('AnalyseSiteQ')" />
		<input type="submit" class="chercher" value="Chercher" /> 
	</td>
	</tr>
</table>
<!-- end search form -->	
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('soft');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('rss');?></th>
			<th><?php echo $this->Paginator->sort('lang');?></th>
			<th><?php echo $this->Paginator->sort('date_mod');?></th>
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
	foreach ($analyseSites as $analyseSite):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php ; ?>&nbsp;
		<?php echo $this->Html->link($analyseSite['AnalyseSite']['soft'], array('action' => 'view', $analyseSite['AnalyseSite']['id'])); ?>
		
		</td>
		
		<td>
		<?php 
		if(strlen($analyseSite['AnalyseSite']['url'])>1) {
		echo "<a href=\"" .$analyseSite['AnalyseSite']['url'] ."\" target=\"_blank\">";
		echo $html->image('icons/url/url.png', array("alt"=>"Site web","width"=>"20","height"=>"20"));
		echo "</a>";
		}
		?>
		&nbsp;
		</td>
		
		<td>
		<?php 
		if(strlen($analyseSite['AnalyseSite']['rss'])>1) {
		echo "<a href=\"" .$analyseSite['AnalyseSite']['rss'] ."\" target=\"_blank\">";
		echo $html->image('rss.gif', array("alt"=>"Site web","width"=>"20","height"=>"20"));
		echo "</a>";
		}
		?>
		&nbsp;
		</td>
				
		<td><?php echo $analyseSite['AnalyseSite']['lang']; ?>&nbsp;</td>
		<td><?php echo $analyseSite['AnalyseSite']['date_mod']; ?>&nbsp;</td>
		<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $analyseSite['AnalyseSite']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $analyseSite['AnalyseSite']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $analyseSite['AnalyseSite']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Analyse Site', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?> 