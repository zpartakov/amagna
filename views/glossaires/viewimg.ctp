<?php App::import('Lib', 'functions'); //imports app/libs/functions ?>
<h2><?php  __('Glossaire');?>: 			<?php echo $glossaire['Glossaire']['libelle']; ?>
</h2>
<div style="color: black; padding: 10px">
			<?php echo $glossaire['Glossaire']['definition1']; ?>
			<img src="/atable20/img/glossaire/<?php echo $glossaire['Glossaire']['image']; ?>" />
			
			<?php 
			/* is there an audio file? */
			if($glossaire['Glossaire']['definition2']) {
				allvideomp3('glossaire/'.$glossaire['Glossaire']['definition2']);
			}
			?>
</div>
.
