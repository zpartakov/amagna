<?php 
$title_for_layout=$lespage['Lespage']['title'];
App::import('Lib', 'functions'); //imports app/libs/functions

?>
<div class="lespages view">
<h2><?php echo $lespage['Lespage']['title'];?></h2>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['id']; ?>
			&nbsp;
		</dd>
<?
	}
//end hide from non-admin registred user
?>		

		<p>
			<?php echo $lespage['Lespage']['introtext']; ?>
			&nbsp;
		</p>
		<p>&nbsp;</p>
		<p>	<?php echo $lespage['Lespage']['fulltext']; ?>
			&nbsp;</p>
		

<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
				<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publish Up'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['publish_up']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publish Down'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['publish_down']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Images'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['images']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Urls'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['urls']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Metadesc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['metadesc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Featured'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['featured']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Language'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $lespage['Lespage']['language']; ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lespage', true), array('action' => 'edit', $lespage['Lespage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Lespage', true), array('action' => 'delete', $lespage['Lespage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lespage['Lespage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lespages', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lespage', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>
