<?php 
App::import('Lib', 'functions'); //imports app/libs/functions 
?>    <?php 
    //$this->pageTitle = __('titre_page_accueil', true); 
    ?>
<table style="margin-top: -50px">
<tr><td>
<?php      
/*
 * display menus for the current season
 */
$menus_saison = $this->requestAction('/menus/lesmenus_saison/'.$saison[1]); // menus saisonniers
?>
<div id="suggestion_recette">
<h1>Suggestions du jour &nbsp;
<?php 
echo $html->image('suggestions/suggestion2.jpg',
array("alt"=>"Suggestion", "width" => "100px", "style"=>"vertical-align: middle"));
?>
</h1>
<?php 
/*
 * a random suggestion of n recipes
 */
random_recipes(4);
?>
</div>	

</td>
</tr>

</table>
<!-- cooking souris: hidden -->
<!-- 
<br/>
<br/>
<p>
<?php
$largeur_image=200;
echo $html->image('animate/souris.gif', 
array("alt"=>"Cooking Souris", "width" => $largeur_image."px", "style"=>"vertical-align: middle"));?>
		

<p>
<strong>Cooking Souris</strong>
</p>
 -->
<p style="margin-top: 15px;">
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
  </p>
  <?php 
 /*	hide from non-admin registred user */
	if($session->read('Auth.User.role')=="administrator") { 
		?>
  <hr/>
  <h2>tests</h2>
    <?php
/* display a on work image */
echo $html->image('AT_WORK0.GIF', array("alt"=>"FIXME","title"=>"FIXME", "width"=>"50","height"=>"50"));

    $this->set("title_for_layout","Accueil");

if($session->read('Auth.User.role')) {
		echo "Bienvenue, " .$session->read('Auth.User.username');
	echo "<br>Mon groupe: " .$session->read('Auth.User.role')."<br>";
	echo "<br><a href=\"".CHEMIN."ilikerecipes/myrecipes\">Mes recettes</a><br>";
	
}

 //total_recettes
      //$this->requestAction('/recettes/total_recettes');
 
?>
    <h1>test internationlization<?php 
    echo "langue actuelle: " .Configure::read('Config.language');
    echo "<br>";
       __('Delete'); ?></h1>

<script type="text/javascript">
       function glossaire(terme) {
           //alert(terme);
           $.ajax({
               type: 'GET',
               url: '<? echo CHEMIN; ?>glossaires/terme?terme='+terme,
               success: function(data) {
                 alert(data); },
               error: function() {
                 alert('La requête n\'a pas abouti'); }
             })
       }
</script>

<p>
Braiser <a onmouseOver=glossaire('Abricoter')>Abricoter</a>.
</p>

       <em>
Exemples

     … (calcul lieu et date)<br/>
    Genève / et on est en hiver<br/>
    Grenade et on est en été<br/>
<br/>
menu calculé selon la saison et l'endroit<br/>
</em>
       <?php 
	}
       ?>