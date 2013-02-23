<?php 
/*
 * display recipes viewed by logged user, ranking # of views desc
 */
$this->$pageTitle="Mes recettes péférées";
?>
<div class="ilikerecipes index">
	<h2><?php 
	//Configure::write('debug', 2);
	$sql="	
	SELECT *, COUNT(i.recette_id) AS nr  
	FROM ilikerecipes AS i, recettes AS r
	WHERE i.user_id = '".$_SESSION['Auth']['User']['id'] ."' 
	AND  i.recette_id = r.id 
	GROUP BY i.recette_id 
	ORDER BY nr DESC
	";
	#echo "<br>test<br>" .nl2br($sql) ."<br>";
	$sql=mysql_query($sql);
		echo $this->$pageTitle;?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>recette</th>
			<th>visites</th>
				</tr>
	<?php
	//echo "<br>testnumrows: #" .mysql_num_rows($sql) ."<br>";
	$i = 0;
	while($i<mysql_num_rows($sql)) {		
		$class = null;
		if (intval($i/2) == $i/2) {
			$class = ' class="altrow"';
		}
		
	echo '<tr' .$class .'>';
		echo '<td>';
			echo $this->Html->link(
					mysql_result($sql,$i,'r.titre'), 
					array('controller' => 'recettes', 'action' => 'view', 
							mysql_result($sql,$i,'r.id')));			 
		echo '</td>';
		echo '<td>';
		echo mysql_result($sql,$i,'nr');
		echo '</td>';		
	echo '</tr>';
		$i++;
	}
echo '</table>';
?>
</div>