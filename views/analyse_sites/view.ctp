<?php 
App::import('Lib', 'functions'); //imports app/libs/functions
$title_for_layout="Analyse des sites - voir le site: " .$analyseSite['AnalyseSite']['soft'];

?>
<style>
dl {
}
dt {
text-width: 400px;
}
dd {
text-width: 800px;
}
</style>
<div class="analyseSites view">
<h2><?php echo $title_for_layout; ?></h2>
	<table>
	<?php $i = 0; $class = ' class="altrow"';?>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Id'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $analyseSite['AnalyseSite']['id']; ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Soft'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $analyseSite['AnalyseSite']['soft']; ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Url'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php 
		if(strlen($analyseSite['AnalyseSite']['url'])>1) {
			?>
		<?php 
			echo $html->image('icons/url/url.png', array("alt"=>"Site web","width"=>"20","height"=>"20"));
		?>
				&nbsp;
			<a href="<?php echo $analyseSite['AnalyseSite']['url']; ?>">
			<?php echo $analyseSite['AnalyseSite']['url']; ?>

		</a>			
<?php 
				}
?>	
		
					&nbsp;
		</td>
	</tr>
		
				<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Rss'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php 
		if(strlen($analyseSite['AnalyseSite']['rss'])>1) {
			?>
		<?php 
			echo $html->image('rss.gif', array("alt"=>"Site web","width"=>"20","height"=>"20"));
		?>
				&nbsp;
			<a href="<?php echo $analyseSite['AnalyseSite']['rss']; ?>">
			<?php echo $analyseSite['AnalyseSite']['rss']; ?>

		</a>			
<?php 
				}
?>	
		
					&nbsp;
		</td>
	</tr>
		
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Facilite'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['facilite']); ?>
			&nbsp;
		</td>
	</tr>
		
				
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Langue'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['lang']); ?>
			&nbsp;
		</td>
	</tr>
		
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Calc Invites'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['calc_invites']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Calc Ingredients'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['calc_ingredients']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Formats'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['formats']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Langage'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['langage']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Glossaire'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['glossaire']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Icones'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['icones']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Graphisme'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['graphisme']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Audio'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['audio']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Video'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['video']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Sequencage'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['sequencage']); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Automatisation'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($analyseSite['AnalyseSite']['automatisation']); ?>
			&nbsp;
		</td>
	</tr>

		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('User'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($analyseSite['User']['pseudo'], array('controller' => 'users', 'action' => 'view', $analyseSite['User']['id'])); ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Date Mod'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $analyseSite['AnalyseSite']['date_mod']; ?>
			&nbsp;
		</td>
	</tr>
		<tr<?php if ($i % 2 == 0) echo $class;?>><td><?php __('Note'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo urlize($analyseSite['AnalyseSite']['note']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") {
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Analyse Site', true), array('action' => 'edit', $analyseSite['AnalyseSite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Analyse Site', true), array('action' => 'delete', $analyseSite['AnalyseSite']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $analyseSite['AnalyseSite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Analyse Sites', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Analyse Site', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?
	}
//end hide from non-admin registred user
?>