<?php 
//echo phpinfo();
/* 
 * Easy display of recipes, visual and cutted into pieces like a cucumber
 * 
 * */

App::import('Lib', 'functions'); //imports app/libs/functions
/*
 * nombre de personnes n'est pas fixé
 */
if(!$_GET['np']){
?>
<div class="titre_recette"><?php echo $recette['Recette']['titre']; ?></div>

<?	
	select_np_recette($recette['Recette']['id']);
	
	/* graphical display 1, 2, 4, 6 , 8, 10 */
	echo "<table><tr>";
	echo "<td>";
	 echo "<form method=\"get\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"1\">";
	echo "<input title=\"une personne\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td><td>";
	
	echo "<form method=\"get\" name=\"2pers\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"2\">";
	echo $html->image('icons/user-identity_s.png', array("onclick"=>"document.forms['2pers'].submit();", 'title'=>'deux personnes', "url"=>$_SERVER["REQUEST_URI"]."?np=2"));
	echo "<input title=\"deux personnes\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td><td>";
	
	echo "<form method=\"get\" name=\"3pers\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"3\">";
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=3", 'title'=>'trois personnes'));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=3", 'title'=>'trois personnes'));
	echo "<input title=\"trois personnes\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td></tr><tr><td>";
	
	echo "<form method=\"get\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"4\">";
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=4"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=4"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=4"));
	echo "<input title=\"quatre personnes\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td><td>";
	
	echo "<form method=\"get\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"6\">";
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=6"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=6"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=6"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=6"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=6"));
	echo "<input title=\"six personnes\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td><td>";
	
	echo "<form method=\"get\">";
	echo "<input type=\"hidden\" name=\"np\" value=\"8\">";
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo $html->image('icons/user-identity_s.png', array("url"=>$_SERVER["REQUEST_URI"]."?np=8"));
	echo "<input title=\"quatre personnes\" type='image' src='" .CHEMIN ."img/icons/user-identity_s.png'></form>";
	echo "</td></tr></table>";
} else {
?>
<script type="text/javascript">
			   function zoomit(img) {
				   document.getElementById(img).style.display = 'block'
			   }
			   function zoomout(img) {
				   document.getElementById(img).style.display = 'none'
			   }
   </script>
<?php
 /* pagination */
 $keletape=$_GET['keletape'];
 if(!$keletape) {
	 $keletape=0;
 }
?>
<a title="Début de la recette" href="<? echo CHEMIN; ?>recettes/viewimg/<?php echo $recette['Recette']['id']; ?>">
<div class="titre_recette"><?php echo $recette['Recette']['titre']; ?>&nbsp;<a title="version texte" href="<? echo CHEMIN; ?>recettes/view/<?php echo $recette['Recette']['id']; ?>" style="font-size: 8px">(txt)</a></div>
<img class="img_recette" src="<? echo CHEMIN; ?>img/pics/
<?php echo $recette['Recette']['pict']; ?>" alt="<?php echo $recette['Recette']['titre']; ?>" title="<?php echo $recette['Recette']['titre']; ?>">
</a>

<?php

/* audio ingredients */
if($recette['Recette']['ingr']){
	$audio=$recette['Recette']['ingr'];
	allvideomp3('recettes/'.$audio);
}
?>
<div class="img_display">
<div class="img_first_display">
			<?php 
			glossaire($recette['Recette']['prep']); 
			?>
			</div>
</div>

<?php 


etapesimg($recette['Recette']['id'],$_GET['np']);
?>
<?php 
/* market */ 
echo "<a href=\"" .CHEMIN ."recettes/commissions?id=".$recette['Recette']['id']."\" title=\"";
__('Market');
echo "\">";
?>
<h2 style="margin-top: 20px; font-size: 2.3em"><?php __('Ingrédients & commissions'); ?>&nbsp;

<?php

//echo $html->image('icons/panier.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
echo $html->image('icons/caddi.jpg', array("class"=>"img_market", "alt"=>"Marché", "width"=>"20","height"=>"20"));
//echo "<br/>";
//__('Market');
echo "</a>";
?>
</h2>
<?php 
if($recette['Recette']['source']) {
	echo "<br><span style=\"color: grey\">Source recette: <a href=\"" .$recette['Recette']['source'] ."\">" .$recette['Recette']['source'] ."</a></span>";
}

?>
<?php 
menus_lies($recette['Recette']['id'],$recette['Recette']['type_id']);

}
?>
