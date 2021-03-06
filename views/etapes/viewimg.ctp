
<?php 
/*
 * Display a facilitated view of a given recipe, step by step
 */
App::import('Lib', 'functions'); //imports app/libs/functions
echo $this->Html->css('jquery/powertip/jquery.powertip-yellow');
echo $javascript->link('jquery/powertip/jquery.powertip');
?>
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
<?php 
$query="
SELECT * FROM etapes_recettes AS er, etapes AS e 
WHERE er.recette_id=" .$recette['id'] ." AND e.id=er.etape_id 
ORDER BY e.order";
//echo $query; exit; //tests
$result=mysql_query($query);
/* page title */
echo "<div class=\"titre_recette\"><a title=\"début de la recette\" href=\"".CHEMIN ."recettes/viewimg/" .$recette['id']."&np=".$_GET['np']."\">" .$recette['titre'] ."</a></div>";

/* 
 * pagination
 */
$i=0;
while($i<=mysql_num_rows($result)) {
	if($etape['Etape']['id']==mysql_result($result,$i,'etape_id')){
		$etapeprec=mysql_result($result,($i-1),'etape_id');
		$etapesuiv=mysql_result($result,($i+1),'etape_id');
	}
		$i++;
}
/*
 * begin print results of the given step in a html table
 */
echo "<table class=\"etape_table\">";
/* left col */
echo "<tr><td class=\"etape_left_col\">";
/* audio */
if($etape['Etape']['sound']){
	$audio=$etape['Etape']['sound'];
	allvideomp3('recettes/'.$audio);
}
/* howto do the given step */
echo "<div class=\"img_preparation\">";
/*
 * a function to print the step, including glossaries if any
 */
glossaire($etape['Etape']['text']);
echo "</div>";
/* any image */
if($etape['Etape']['image']) {
	echo $html->image('pics/' .$recette['id'] .'/' .$etape['Etape']['image'],
			array("alt"=>"Image de cette étape", "class"=>"img_etape"));
}

echo "</td>";

/* rightcol */ 

echo "<td class=\"etape_right_col\">";
/* video */
if($etape['Etape']['video']){
	$video=$etape['Etape']['video'];
	$thumbnail=preg_replace("/\.flv$/","",$video);
	allvideoflv($video,$thumbnail);
	if(preg_match("/^poisson.*\.flv/", $etape['Etape']['video'])) {
		echo "<br><span style=\"color: grey\">Source vidéo: <a href=\"http://www.goosto.fr/recette-de-cuisine/poisson-vapeur-10009101.htm\">&copy;&nbsp;goosto.fr</a></span>";
	}
}
echo "</td></tr>";
echo "";
?>
<tr><td>
<div>
<?php
/*
 * ingredients pour cette etape
*/
ingredients_etape($etape['Etape']['id'],$_GET['np'],$recette['pers'],$session->read('Auth.User.role'));


?>
</div>
</td></tr>
<script>
/* keyboard navigation next / previous */
$(document).keydown(function(e){
	  if (e.keyCode == 37) { 
	      /* alert( "left pressed" );*/
	       window.location = "http://<?php echo SERVERNAMEPROD; ?><?php echo CHEMIN; ?>etapes/viewimg/<?php echo $etapeprec;?>";
	     
	       return false;
	    }
});
$(document).keydown(function(r){
	  if (r.keyCode == 39) { 
	      /* alert( "right pressed" );*/
	       window.location = "http://<?php echo SERVERNAMEPROD; ?><?php echo CHEMIN; ?>etapes/viewimg/<?php echo $etapesuiv;?>";
	       
	       return false;
	    } 
});
</script>
<?php 


echo "<tr><td style=\"text-align: left\">";
//echo $etape['Etape']['order'];
if($etape['Etape']['order']!=1){
	//not the first step, there are some previous
	//todo: put blank page if absent
	echo "<a title=\"Etape précédente\" href=\"".CHEMIN ."etapes/viewimg/".$etapeprec ."&np=".$_GET['np']."\"><img alt=\"Etape précédente\" src=\"".CHEMIN ."img/icons/previous.jpg\" /></a>";
} else {
	//echo phpinfo();
	echo "<a title=\"Etape précédente\" href=\"".$_SERVER["HTTP_REFERER"]."\"><img alt=\"Etape précédente\" src=\"".CHEMIN ."img/icons/previous.jpg\" /></a>";
}
echo "&nbsp;&nbsp;&nbsp;Etape: " .$etape['Etape']['order'] ." de " .(mysql_num_rows($result));

echo "</td><td style=\"text-align: right\">";
//if($etape['Etape']['order']!=(mysql_num_rows($result)-1)){//not the last step, there are some next
if($etape['Etape']['order']!=(mysql_num_rows($result))){
	
	
	//not the last step, there are some next
	//todo: put blank page if absent
	echo "<a title=\"Etape suivante\" href=\"".CHEMIN ."etapes/viewimg/".$etapesuiv ."&np=".$_GET['np']."\"><img alt=\"Etape suivante\" src=\"".CHEMIN ."img/icons/suivant.jpg\" /></a>";
} else {
	/* this is last step: */
	
	/*
	 * record recipe for logged user
	*/
	
	if($session->read('Auth.User.role')) {
		recordRecipe($session->read('Auth.User.id'),$recette['id']);
	}
	
	 /* give a link for navigation */
	
	?>
	<div class="fin_recette">FIN DE LA RECETTE; Bon appétit!</div><a href="<? echo CHEMIN; ?>pages/recettes" title="Accueil">
	<br/>
		<? echo $html->image('menus/accuei_md.jpg', array("alt"=>"Accueil", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
		</a>
		<?php 
}

//echo "</div>";
echo "</td></tr>";
echo "</table>";



?>

			
	<?php endforeach; ?>
<?php endif; ?>
</div>

<br/>
<h3>Mode de cuisson:
<?php 
echo $etape['Modecuisson']['lib'];
?>
</h3>
<?php 

if($recette['source']) {
	echo "<br><span style=\"color: grey\">Source recette: <a href=\"" .$recette['source'] ."\">" .$recette['source'] ."</a></span>";
}

?>