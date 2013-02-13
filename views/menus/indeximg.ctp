<?php 
/*
 * a facilitated view of the index of the menus of recipes
 */
App::import('Lib', 'functions'); //imports app/libs/functions 
?>
<div class="menus index">
	<h2><?php __('Menus');?></h2>
	<table cellpadding="0" cellspacing="0">
	<?php
	$i = 0;
	foreach ($menus as $menu):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
		<tr<?php echo $class;?>>
	<td><h2>

<?php
/*
 * audio display file if any
*/
display_audio("menus/".$menu['Menu']['id']);
?>

<div class="menuindeximg">
	<a class="tooltip" href="<? echo CHEMIN; ?>menus/viewimg/<?php echo $menu['Menu']['id'];?>" title="<?php echo $menu['Menu']['libelle']; ?>
	<?php echo $menu['Menu']['descriptif']; ?>"><?php
	/*
	 * special output with images
	*
	*/
	
show_thumb_menu($menu['Menu']['id']);
?>
	
	<?php echo $menu['Menu']['libelle']; ?>
&nbsp;
		
		<?php 
		/*
		 * graphical display for price and difficulty
		*
		*/
		
		
		for($i=1; $i<=$menu['Menu']['prix']; $i++){
			#echo $html->image('icons/dollar.png', array("alt"=>"Prix", "width"=>"20","height"=>"20"));
		}		
		?>
		
		<?php 
		for($i=1; $i<=$menu['Menu']['difficulte']; $i++){
		echo $html->image('icons/star.png', array("alt"=>"Difficulté", "width"=>"20","height"=>"20"));		
		}
		
		?>
				<?php 
				#echo $menu['Saison']['saison']; 
				season_image($menu['Saison']['id']);
				
				?>
				
		</h2>
	</a>	</div>
	</td></tr>
<?php endforeach; ?>
</table>
	<p>
		</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
