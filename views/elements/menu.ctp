<?php
//check browser, warning if IE
if(preg_match("/MSIE/",$_SERVER['HTTP_USER_AGENT'])&&preg_match("/8.0/",$_SERVER['HTTP_USER_AGENT'])){
	$messagebrowser="<div style=\"font-size: 12pt; background-color: #FF778F; padding: 10px; border: thin solid red; border-style: outset;\">Vous utilisez Internet Explorer 8 ou 9: ce logiciel propriétaire ne vous permet pas de consulter le site avec toutes ses fonctionnalités (notamment les menus déroulants que vous devriez voir à la place de ce texte, etc.). Nous vous recommandons d'utiliser Firefox, logiciel libre que vous pouvez télécharger sur <a href=\"http://www.mozilla-europe.org/fr/firefox/\" target=\"_blank\">http://www.mozilla-europe.org/fr/firefox/</a>. Il est disponible pour linux, mac et windows.</div>";

} else {
	$messagebrowser="";
}
?>

<div id="cakephp-global-navigation">
<ul id="menuDeroulant">
	<!-- homepage -->
	<li><a href="<? echo CHEMIN; ?>">Accueil</a>
		<ul class="sousMenu">
	<li><?
echo "<a href=\"". CHEMIN ."pages/about/\" title=\"À propos\">";
echo $html->image('menus/about_th.jpg', array("alt"=>"À propos", "width"=>"20","height"=>"20"));
echo "&nbsp;À propos</a>";
?></li>		
			
<li><?
echo "<a href=\"http://www.picadametles.ch/blog/index.php?category/Sites-int%C3%A9ressants\" title=\"Liens\">";
echo $html->image('menus/th_liens.jpg', array("alt"=>"Liens","width"=>"20","height"=>"20"));
echo "&nbsp;Liens</a>";
?></li>
<li><?
echo "<a href=\"/blog/\" title=\"Blog\">";
echo $html->image('icons/btn_blog.png', array("alt"=>"Blog", "width"=>"20","height"=>"20"));
echo "&nbsp;Blog</a>";
?></li>
<!-- 
<li><? 
echo "<a href=\"". CHEMIN ."posts/index.rss\" target=\"_blank\" title=\"Flux RSS blog\">";
echo $html->image('rss.gif', array("alt"=>"Flux RSS recettes A table!", "width" => "40px"));
echo "&nbsp;Flux RSS du Blog</a>";
?>
</li>
 -->
<li><?
echo "<a href=\"http://www.picadametles.ch/dokuwiki/doku.php?id=cuisine:aide_recettes\" title=\"Aide\">";
echo $html->image('help.png', array("alt"=>"Aide", "width"=>"20","height"=>"20"));
echo "&nbsp;Aide</a>";
?></li>
<li><?
echo "<a href=\"http://www.picadametles.ch/dokuwiki/doku.php\" title=\"Wiki\">";
echo $html->image('icons/dokuwiki.png', array("alt"=>"Wiki", "width"=>"20","height"=>"20"));
echo "&nbsp;Wiki</a>";
?></li>
<li><?php 
//print page
echo "<a class=\"logoprint\" href=\"javascript:window.print();\" title=\"Imprimer\">";
echo $html->image('icon-print.jpg', array("alt"=>"Imprimer", "width"=>"20","height"=>"20"));
echo "&nbsp;Imprimer</a>"; 
?></li>
<li><?php
echo '<a class="contact" href="http://www.picadametles.ch/atable20/contacts/" title="Contact">'.$html->image('ico-contact.gif', array("alt"=>"Contact", "width"=>"20","height"=>"20")).'&nbsp;Contact</a>';
?></li>
<li><?
//license
echo '<a href="http://www.gnu.org/licenses/gpl-3.0.txt" title="GPL License / CopyLeft">'.$html->image('copyleft.jpg', array("alt"=>"GPL License / CopyLeft","width"=>"20","height"=>"20")).'&nbsp;Licence GPL</a>';
?></li>
		</ul>

	</li>
	
	<!-- recettes texte -->

	<li><a style="color: PeachPuff" href="<? echo CHEMIN; ?>recettes/" title="Recettes de cuisine">Recettes</a>
		<ul class="sousMenu">
	<li><a href="<? echo CHEMIN; ?>menus/" title="Suggestions de menus">Menus</a>	</li>
	
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=5" title="Salades et Légumes">Salades & Légumes</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=4" title="Potages">Potages</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=8" title="Poissons">Poissons</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=9" title="Viandes">Viandes</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=15" title="Pâtes et Céréales">Pâtes et Céréales</a></li>
		<!-- <li><a href="<? echo CHEMIN; ?>recettes/?typ=16" title="Céréales">Céréales</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=18" title="Légumes">Légumes</a></li>-->
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=3" title="Laitages et oeufs">Laitages et oeufs</a></li>
		<li><a href="<? echo CHEMIN; ?>recettes/?typ=19" title="Fruits et desserts">Fruits et desserts</a></li>
		<li><a href="<? echo CHEMIN; ?>countries/" title="Recettes par zones géographiques">Par pays</a></li>
	
	<li><a href="<? echo CHEMIN; ?>glossaires/" title="Glossaire de termes culinaires">Glossaire</a></li>
				<li><a href="<? echo CHEMIN; ?>ingredients/" title="Ingrédients">Ingrédients</a></li>
			<li><a href="<? echo CHEMIN; ?>ustensiles/" title="Ustensiles">Ustensiles</a></li>
			</ul>

	</li>



<?php
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
if($session->read('Auth.User.role')=="administrator") {
?>

	<li style="background-color: PeachPuff"><a href="" title="">Admin</a>
		<ul class="sousMenu">
		
		<li><a style="color: PeachPuff" href="https://129.194.18.197/hg/hgwebdir.wsgi/var/www/atable20/app/" target="_blank">Versioning (hg - mercurial)</a></li>
		<li><a style="color: PeachPuff" href="<? echo CHEMIN; ?>recettes/add">Nouvelle recette</a></li>
	<!--  		<li><a href="<? echo CHEMIN; ?>recettes/rss">MàJ flux RSS</a></li>-->
			<li><a href="http://www.picadametles.ch/dokuwiki/doku.php?id=cuisine:intranet:start&do=recent">Wiki (Recent changes)</a></li>
			<li><a href="recettes/app/webroot/img/up.php">Nouvelle image TODO</a></li>
			<li><a href="<? echo CHEMIN; ?>menus/">Menus</a></li>
			<li><a href="<? echo CHEMIN; ?>modecuissons/">Modes de cuisson</a></li>
			<li><a href="<? echo CHEMIN; ?>invitations/">Invitations</a></li>
			<li><a href="<? echo CHEMIN; ?>stopwords/">Mots-stop</a></li>
			
			<li><a href="<? echo CHEMIN; ?>stats/">Statistiques</a></li>
			<li><a href="<? echo CHEMIN; ?>users">Users</a></li>
			<li><a href="<? echo CHEMIN; ?>groups">Groups</a></li>
			<li><a href="<? echo CHEMIN; ?>lespages">Pages</a></li>
			<li><a href="http://www.picadametles.ch/MySQLAdmin/" target="_blank">MySQLAdmin</a></li>
			<li><a href="http://imu105.infomaniak.ch/MySQLAdmin/index.php?db=picadametlesch5" target="_blank">MySQL aka9</a></li>			
		
		</ul>
	</li>
<?
	}
?>



<!-- login -->
	<li><a href="<? echo CHEMIN; ?>users/login" title="S'enregistrer">Login</a>
		<ul class="sousMenu">
			<li><a href="<? echo CHEMIN; ?>users/logout" title="Logour / Quitter">Logout</a></li>
		</ul>
	</li>
<?php 
/*
 * setting the language for the current session; the translations are in locale/.../default.po
 */
############## ADMIN AREA ##################
/*	hide from non-admin registred user */
if($session->read('Auth.User.role')=="administrator") {

?>	<li>Langues
	 	<ul class="sousMenu">
	
	<div id="languageswitcher">
<form method="post">
<select name="language" onchange="this.form.submit()">
<option value="">--- langue ---</option>
<option value="eng">English</option>
<option value="fre">Français</option>
<option value="spa">Español</option>
</select>
</form>
</div> 
    </ul>
    </li>
<?
	}
?>
 

	
</ul>
<?
echo $messagebrowser;
?>

</div>

