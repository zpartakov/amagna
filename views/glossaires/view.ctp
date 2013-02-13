<?php 
$title_for_layout="Glossaire: " .$glossaire['Glossaire']['libelle'];
App::import('Lib', 'functions'); //imports app/libs/functions

?><div class="glossaires view">
<h2><?php  __('Glossaire');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
	<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
/* 
 * useful to get a list from last entries, as ID is an auto-incremental key
 */
	if($session->read('Auth.User.role')=="administrator") {
?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['id']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>	
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Libelle'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['libelle']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Definition1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['definition1']; ?>
			&nbsp;
		</dd>
<!-- AUDIO = field definition2  -->
<?php 
/*
 * print audio only if any
 */
if($glossaire['Glossaire']['definition2']){
?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Definition2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php #echo $glossaire['Glossaire']['definition2']; 
			
/* audio */
if($glossaire['Glossaire']['definition2']){
	$audio=$glossaire['Glossaire']['definition2'];
	allvideomp3($audio);
}?>
			&nbsp;
		</dd>
<?
	}
?>		
<!-- VIDEO = field definition3  -->
<?php 
/*
 * print video only if any
 */
if($glossaire['Glossaire']['definition3']){
?>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Definition3'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			#echo $glossaire['Glossaire']['definition3']; 
			
			if($glossaire['Glossaire']['definition3']){
				$video=$glossaire['Glossaire']['definition3'];
				//$thumbnail=preg_replace("/\.flv$/","",$video);
				allvideoflv($video,$thumbnail);
			}
				
			?>
			&nbsp;
		</dd>
<?
	}
?>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
/* 
 * useful to get a list from last entries, as ID is an auto-incremental key
 */
	if($session->read('Auth.User.role')=="administrator") {
?>		

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Definition4'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['definition4']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Source'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['source']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $glossaire['Glossaire']['type']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>	
<?php 
/*
 * print image only if any
 */
if($glossaire['Glossaire']['image']){
?>		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<img src="<? echo CHEMIN; ?>img/glossaire/<?php echo $glossaire['Glossaire']['image']; ?>" />
			
			&nbsp;
		</dd>
<?
	}
?>	
		
		</dl>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
/* 
 * useful to get a list from last entries, as ID is an auto-incremental key
 */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Glossaire', true), array('action' => 'edit', $glossaire['Glossaire']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Glossaire', true), array('action' => 'delete', $glossaire['Glossaire']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $glossaire['Glossaire']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Glossaires', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Glossaire', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>	
<br/>
<p><?php echo $this->Html->link(__('List Glossaires', true), array('action' => 'index')); ?> </p>
