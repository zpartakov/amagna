<?
/*
 * Functions outside cakePhp core
 */

/* RECIPES FUNCTIONS */
function titre_recette($id){
	$query="SELECT * FROM recettes WHERE id=".$id;
	$result=mysql_query($query);
	$titre_recette=mysql_result($result, 0, 'titre');
	echo $titre_recette;
}

function recette_link($id){
	$query="SELECT * FROM recettes WHERE id=".$id;
	$result=mysql_query($query);
	$titre_recette=mysql_result($result, 0, 'titre');
	echo "<tr>";
	echo "<td>";
	echo "<a href=\"/amagna/recettes/viewimg/" .mysql_result($result, 0, 'id') ."\">";
	echo $titre_recette;
	echo "</a>";
	
	echo "</td><td>";
	echo "<a href=\"/amagna/recettes/viewimg/" .mysql_result($result, 0, 'id') ."\">";
	
	echo "<img style=\"width: 100px\" class=\"rounded\" src=\"/amagna/img/pics/";
	echo mysql_result($result,0,'pict');
	echo "\"/>";
	echo "</a>";
	echo "</td>";
	echo "</tr>";
	}

function random_recipes($nb) {
$offset_result = mysql_query( " 
		SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `recettes` ");
$offset_row = mysql_fetch_object( $offset_result );
$offset = $offset_row->offset;
$resultran = mysql_query( " SELECT * FROM `recettes` LIMIT $offset, ".$nb ); 
	$i=0;
	if(mysql_num_rows($resultran)<$nb) {
		random_recipes($nb);
	}
	echo "<table>";
	while($i<mysql_num_rows($resultran)) {
		recette_link(mysql_result($resultran, $i, 'id'));
		$i++;
	}
	echo "</table>";
	
}

function np_recette($id){
	$query="SELECT * FROM recettes WHERE id=".$id;
	$result=mysql_query($query);
	$np=mysql_result($result, 0, 'pers');
	//echo "Nombre de personnes: " .$np;
	__('Nombre de personnes: ');
	echo $np;
}

function select_np_recette($id){
	$query="SELECT * FROM recettes WHERE id=".$id;
	$result=mysql_query($query);
	$np=mysql_result($result, 0, 'pers');
	echo "<form method=\"get\">Nombre de personnes: ";
	echo "<select name=\"np\">";
	for($i=1;$i<25;$i++) {
	echo "<option";
	if($i==$np) {
		echo " selected";
	}
	echo ">" .$i;
	}
	echo "</select><input type=\"submit\"></form>";
}



function levenshtein_recettes($word) {
	$word = strtolower($word);
	echo "<p>Désolé, il n'y a pas de recettes correspondant à votre recherche: <em>" .$word."</em></p><br/>";
		
	/* levenshtein fuzzy logic search */
	
	echo "<p>Voulez-vous dire:</p><br/>";
	
	/*
	 * construct the array with the recipe's title words
	*/
	$lev = 0;
	$q = mysql_query("SELECT titre FROM `recettes`");
	$mots=array();
	while($r = mysql_fetch_assoc($q))
	{
		$titre=explode(" ",$r['titre']);
		$size=count($titre);
		for ($i=0; $i <= $size; $i++)
			array_push($mots,$titre[$i]);
	}
	
	/*
	 * find suggested levenshtein's words
	*/
	foreach ($mots as $mot){
		$lev = levenshtein($word, $mot);
		if($lev >= 0 && $lev < 5)
		{
			echo '
			<form id="RecetteIndexForm" method="post" action="/amagna/recettes">
			<input type="hidden" name="_method" value="POST" />
			<input name="data[Recette][q]" type="hidden" size="50"
			class="txttosearch" value="'.$mot.'" id="RecetteQ" />
			<input type="submit" class="chercher" value="'.$mot.'" />
			</form>&nbsp;
			';
		}
	}
}

function etapes($id = null,$role) {
/* 
 * affiche les étapes d'une recette en liste
 */
		$query="
	SELECT * FROM etapes_recettes, etapes 
	WHERE recette_id=".$id ." 
	AND etapes.id=etapes_recettes.etape_id 
	ORDER BY etapes.order" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	//echo "Nombre d'étapes: " .mysql_num_rows($result) ."<br />";
	$i=0;
	
	echo "<ol>";
	while($i<mysql_num_rows($result)){
		echo "<li>";
		/*
		 * encode glossaries entries
		 */
		glossaire(mysql_result($result,$i,'text'));

		/*
		 * display CRUD for admin
		 */
			if($role=="administrator") {
				echo "&nbsp;<a href=\"".CHEMIN ."etapes/edit/".mysql_result($result,$i,'etape_id') ."\"><img alt=\"Modifier\" src=\"".CHEMIN ."img/b_edit.png\" /></a>";
				echo "&nbsp;<a href=\"".CHEMIN ."etapes/delete/".mysql_result($result,$i,'etape_id') ."\"><img alt=\"Supprimer\" src=\"".CHEMIN ."img/b_drop.png\" /></a>";
				echo "&nbsp;<a title=\"Déplacer vers le haut\" href=\"". CHEMIN ."etapes/deplacer?recette_id=".$id ."&etape_id=" .mysql_result($result,$i,'etape_id') ."&dir=up\">";
				echo "<img alt=\"Déplacer vers le haut\" src=\"".CHEMIN ."img/icons/up.jpg\" />";
				echo "&nbsp;<a title=\"Déplacer vers le bas\" href=\"". CHEMIN ."etapes/deplacer?recette_id=".$id ."&etape_id=" .mysql_result($result,$i,'etape_id') ."&dir=down\">";
				echo "<img alt=\"Déplacer vers le bas\" src=\"".CHEMIN ."img/icons/down.jpg\" />";
				echo "&nbsp;</a>";			
			}
echo "</li>";
		$i++;
	}
	echo "</ol>";
	return $etapes;
}

function etapesimg($id = null,$np) {
/* 
 * affiche les étapes d'une recette en liste visuelle facilitée
 */	
	$query="
	SELECT * FROM etapes_recettes, etapes 
	WHERE recette_id=".$id ." 
	AND etapes.id=etapes_recettes.etape_id 
	ORDER BY etapes.order" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	echo "<a title=\"Première étape\" href=\"".CHEMIN ."etapes/viewimg/".
	mysql_result($result,0,'etape_id') ."&np=" .$np  ."\"><img alt=\"Première étape\" src=\"".CHEMIN ."img/icons/suivant.jpg\" /></a>";
	}
	

	
function ustensiles($id){
/* ###############################################################
* a function to display kitchen tools required for a given recipe with images
* */
$query="
SELECT * FROM recettes, ustensiles, recettes_ustensiles
WHERE recettes.id=" .$id ."
AND recettes_ustensiles.recette_id=" .$id ."
AND ustensiles.id=recettes_ustensiles.ustensile_id
ORDER BY ustensiles.lib
" ;
// echo "<br>".$query."<br>";
echo "<h3>Ustensiles pour la recette</h3>";
$result=mysql_query($query);
$i=0;
echo "<table>";
while($i<mysql_num_rows($result)){
echo "<tr><td>";
// echo "<span style=\"color: black\">"
echo mysql_result($result, $i, 'ustensiles.lib');
// . "</span>";
echo "&nbsp;";
echo "</td><td style=\"text-align: right;\">";
echo "<img class=\"rounded\" style=\"width: 100px; \" src=\"/amagna/img/ustensile/" .mysql_result($result, $i, 'ustensiles.img') ."\" />";
//http://www.picadametles.ch/atable/images/stories/atable/poele.jpg //TODO
echo "</td></tr>";
//echo " ";
$i++;
}
echo "</table>";
}
function ustensiles_list($recette,$utilisateur){
	/* ###############################################################
	 * a function to display kitchen tools required for a given recipe without images
	* */
	$query="
	SELECT * FROM recettes, ustensiles, recettes_ustensiles
	WHERE recettes.id=" .$recette ."
	AND recettes_ustensiles.recette_id=" .$recette ."
	AND  ustensiles.id=recettes_ustensiles.ustensile_id
	ORDER BY ustensiles.lib
	" ;
	//	echo "<br>".$query."<br>";
	$result=mysql_query($query);
	$i=0;
	while($i<mysql_num_rows($result)){
		echo "<a href=\"/amagna/ustensiles/view/" 
		.mysql_result($result, $i, 'ustensiles.id')
		."\">" .mysql_result($result, $i, 'ustensiles.lib') 
		."</a>";
		echo "&nbsp;";
#		echo "<img style=\"width: 100px; vertical-align: top\" src=\"/amagna/img/ustensile/" .mysql_result($result, $i, 'ustensiles.img') ."\" />";
		echo "<br/>";
		$i++;
	}
}
function levenshtein_ustensile($word) {
	$word = strtolower($word);
	echo "<p>Désolé, il n'y a pas d'ustensile correspondant à votre recherche: <em>" .$word."</em></p><br/>";

	/* levenshtein fuzzy logic search */

	echo "<p>Voulez-vous dire:</p><br/>";

	/*
	 * construct the array with the recipe's title words
	*/
	$lev = 0;
	$q = mysql_query("SELECT lib FROM `ustensiles`");
	$mots=array();
	while($r = mysql_fetch_assoc($q))
	{
		$titre=explode(" ",$r['lib']);
		$size=count($titre);
		for ($i=0; $i <= $size; $i++)
			array_push($mots,$titre[$i]);
	}

	/*
	 * find suggested levenshtein's words
	*/
	$all_lev="";
	foreach ($mots as $mot){
		$lev = levenshtein($word, $mot);
		if($lev >= 0 && $lev < 3)
			if(!preg_match("/;$mot;/",$all_lev)){
		$all_lev=$all_lev.";".$mot.";";	
		
		{
			echo '
	<form action="/amagna/ustensiles" id="UstensileIndexForm" method="post">
	<input type="hidden" name="_method" value="POST" />
	<input name="data[Ustensile][q]" type="hidden" value="'.$mot.'" id="UstensileQ" />
	<input type="submit" class="chercher" value="'.$mot.'" />
		</form>&nbsp;
			';
			
			
		}
	}
	}
}

######## MENUS ############
function menus_lies($id,$tid) {
	$sql = "
	SELECT *
	FROM menus_recettes
	WHERE menus_recettes.recette_id=" . $id;
	$sql=mysql_query($sql);
	$menuid=mysql_result($sql,0,'menus_recettes.menu_id');
	
	$sql = "
	SELECT *
	FROM menus, menus_recettes, recettes
	WHERE (menus_recettes.menu_id=" . $menuid ." 
	AND recettes.id=menus_recettes.recette_id)  
	AND recettes.type_id NOT LIKE '" .$tid ."'
	 GROUP BY recettes.id 
	 ORDER BY recettes.type_id";
	//echo $sql;
	$sql=mysql_query($sql);
	$i=0;
	if(mysql_num_rows($sql)>0) {
		echo "<h2 class=\"recettes_suggerees\">Recettes suggérées en accompagnement</h2>";
	}
	while($i<mysql_num_rows($sql)){
		echo "<p>";
		echo "<a href=\"" .mysql_result($sql,$i,'recettes.id') ."\"";
		echo " title=\"".mysql_result($sql,$i,'recettes.titre') ."\"";
		echo ">";
		echo "<img style=\"width: 100px\" class=\"rounded\" src=\"/amagna/img/pics/";
		echo mysql_result($sql,$i,'pict');
		echo "\"";
		echo " alt=\"".mysql_result($sql,$i,'recettes.titre') ."\"";
		echo " />";
		echo "<br />";
		echo mysql_result($sql,$i,'recettes.titre');
		echo "</a>";
		echo "</p>";
		$i++;
	}
}

function titre_menu($id){
	$query="SELECT * FROM menus WHERE id=".$id;
	$result=mysql_query($query);
	$titre_recette=mysql_result($result, 0, 'libelle');
	echo $titre_recette;
}



function show_thumb_menu($menu) {
	$sql = "
	SELECT * 
	FROM recettes 
	WHERE id IN (
	SELECT recette_id 
		FROM menus_recettes 
		WHERE menu_id=".$menu." ORDER BY recettes.type_id)";
	//echo $sql;
	$sql=mysql_query($sql);
	$i=0;
	while($i<mysql_num_rows($sql)){
		echo "<img style=\"width: 100px\" class=\"rounded\" src=\"/amagna/img/pics/";
		echo mysql_result($sql,$i,'pict');
		echo "\"/>";
		$i++;
	}
}

######## RESERVES & INGREDIENTS ############
function reserve_calcule($id = null) {
	/*
	 * compute the required quantity of meals belonging to reserve for a given recipe
	*/
	$query="
	SELECT * FROM ingredients_recettes, ingredients, recettes
	WHERE recette_id=".$id ."
	AND recettes.id=" .$id ."
	AND ingredients.id=ingredients_recettes.ingredient_id
	AND ingredients.commissions > 0 
	ORDER BY typ, libelle
	" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	$persrecettes=mysql_result($result, 0, 'pers');
	/* print results */
	echo "<h3>Réserve</h3>";
	echo "<table>";
	echo "<tr><th>Ingrédient</th><th>Image</th><th>Racheter?</th></tr>";
	$i=0;
	/* loop on results */
	while($i<mysql_num_rows($result)){
		echo "<tr><td>";
		echo "<img class=\"img_ingredient\" alt=\"Image de ".mysql_result($result,$i,'libelle') 
		."\" src=\"".CHEMIN ."img/ingredients/".mysql_result($result,$i,'ingredients.img')."\" />";
		echo "</td><td>";
		$commissions=mysql_result($result,$i,'commissions');
		$unite=mysql_result($result,$i,'unit');
		if($unite=="g"){
			$unite="kg";
			$commissions=$commissions/1000;
		}
		if($unite=="ml"){
			$unite="l";
			$commissions=$commissions/1000;
		}
		echo $commissions;
		if(mysql_result($result,$i,'unit')!='0'&&mysql_result($result,$i,'unit')!='1') {
			echo "&nbsp;" .$unite;
		}
		
		echo "&nbsp;" .mysql_result($result,$i,'libelle');
		//echo " (<em>".mysql_result($result,$i,'typ') ."</em>)";
		
		echo "</td><td><input type=\"checkbox\" name=\"ingredient_" .mysql_result($result,$i,'ingredient_id') ."\">";
		
		echo "</td></tr>";
		$i++;
	}
	echo "</table>";
echo "<span style=\"color: black; font-style: italic;\">cocher les ingrédients manquants dans la réserve</span>";	
}

function rachete_reserve($id = null) {
	/*
	 * print the reserve to buy, if any, for a given recipe
	 * TODO: integrate with ingredients
	*/
	$query="
	SELECT * FROM ingredients
	WHERE ingredients.id=" .$id;
	//echo $query ."<br>";
	$result=mysql_query($query);
	/* print results */
	$i=0;
	/* loop on results */
	while($i<mysql_num_rows($result)){
		echo "<tr><td>";
		echo "<img class=\"img_ingredient\" alt=\"Image de ".mysql_result($result,$i,'libelle')
		."\" src=\"".CHEMIN ."img/ingredients/".mysql_result($result,$i,'ingredients.img')."\" />";
		echo "</td><td>";
		$commissions=mysql_result($result,$i,'commissions');
		$unite=mysql_result($result,$i,'unit');
		if($unite=="g"){
			$unite="kg";
			$commissions=$commissions/1000;
		}
		if($unite=="ml"){
			$unite="l";
			$commissions=$commissions/1000;
		}
		echo $commissions;
		if(mysql_result($result,$i,'unit')!='0'&&mysql_result($result,$i,'unit')!='1') {
			echo "&nbsp;" .$unite;
		}

		echo "&nbsp;" .mysql_result($result,$i,'libelle');
		//echo " (<em>".mysql_result($result,$i,'typ') ."</em>)";
		echo "</td></tr>";
		$i++;
	}
}

function arrondit($quantite) {
	/*
	 * arrondir les valeurs
	 */
	if($quantite>9&&$quantite<100){
		//dizaines
		$quantite=ceil($quantite/10)*10;
	}elseif($quantite>99&&$quantite<1000){
		//centaines
		$quantite=ceil($quantite/100)*100;
		
	}
	echo $quantite;
}

function ingredientscalcule($id = null,$image,$np,$arrondit) {
	/*
	 * compute the required quantity of meals for a given recipe, and a given number of people
	 */
	$query="
	SELECT * FROM ingredients_recettes, ingredients, recettes 
	WHERE recette_id=".$id ."
	AND recettes.id=" .$id ." 
	AND ingredients.id=ingredients_recettes.ingredient_id
	ORDER BY typ, libelle
	" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	$persrecettes=mysql_result($result, 0, 'pers');
	/* print results */
	echo "<h3>Nombre d'ingrédients: " .mysql_num_rows($result) ."</h3>";
	echo "Pour: " .$np ." personne(s) à table<br />";

		$multiplicateur=$np/$persrecettes;
		
	//echo "Nbre pers originale: " .$persrecettes ." - à calculer : " .$np ." - multiplicateur: " .$multiplicateur;
			echo "<table>";
	$i=0;
	/* loop on results */
	while($i<mysql_num_rows($result)){
		//do not display if facilitate
			echo "<tr><td>";
		
/*
 * round the quantities required for shopping
 */			
			if($arrondit=="1"){
				/*
				 * facilitated view, make round
				 */
			arrondit($multiplicateur*mysql_result($result,$i,'quant'));
			} else {
				/*
				 * normal view, precise quantitie
				 */
				$quant=$multiplicateur*mysql_result($result,$i,'quant');
				if(preg_match("/\./",$quant)) {
					
					//$quant=preg_replace("/^(.*)\.(..).*$/",$1.".".$2$3,$quant);
					$quant=preg_replace("/^(.*)\.(..).*$/","\$1.$2",$quant);
						
				}
				//echo preg_replace("/\.0*$/","",$quant);
				echo $quant;
				echo "&nbsp;";
			}
		if(mysql_result($result,$i,'unit')!='0'&&mysql_result($result,$i,'unit')!='1') {
			echo "" .mysql_result($result,$i,'unit');
		}
		
		echo "&nbsp;" .mysql_result($result,$i,'libelle');

		//echo " (<em>".mysql_result($result,$i,'typ') ."</em>)";
			echo "</td><td><img class=\"img_ingredient\" alt=\"Image de ".mysql_result($result,$i,'libelle') ."\" src=\"".CHEMIN ."img/ingredients/".mysql_result($result,$i,'ingredients.img')."\" /></a></td></tr>";		
		$i++;
	}
			echo "</table>";
			return $etapes;
}

function ingredients($id = null,$image,$role) {
	/*
	 * print the required meals for a given recipe, with picture if any
	 */
	
	$query="
	SELECT * FROM ingredients_recettes, ingredients
	WHERE recette_id=".$id ."
	AND ingredients.id=ingredients_recettes.ingredient_id
	ORDER BY typ, libelle
	" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	//do not display if facilitate
		if($image!=1){
			//echo "Nombre d'ingrédients: " .mysql_num_rows($result) ."<br />";
		} else {
			echo "<table>";
		}
	$i=0;
	while($i<mysql_num_rows($result)){
		//do not display if facilitate
		if($image!=1){
			$quantite=mysql_result($result,$i,'quant');
			$quantite=preg_replace("/\.0*$/","",$quantite);
		echo $quantite;
		if(mysql_result($result,$i,'unit')!='0') {
			echo "&nbsp;" .mysql_result($result,$i,'unit');
		}
		echo " ";
		} else {
			echo "<tr><td>";
		}
		
		echo mysql_result($result,$i,'libelle');

		
		//do not display if facilitate
		if($image!=1){
		echo " (<em>".mysql_result($result,$i,'typ') ."</em>)";
				/*
				 * suppress ingredient if admin		
				 */
				if($role=="administrator") {
					echo " <a href=\"/amagna/recettes/supprimer/?rec_id=" .$id."&ing_id=" .mysql_result($result,$i,'ingredient_id')."\">Supprimer</a>";
				}
		}
		if($image=="1") { //facilitated print
			/*
			 * mysql_result($result,$i,'ingredients.img')
			 * 
			 */
			$id_imgs=preg_replace("/^.*\//","",mysql_result($result,$i,'ingredients.img'));
			//echo "<br>idimg: " .$id_img ."<br>";
			$id_imgs=preg_replace("/\..*/","",$id_imgs);
			
			//echo "<br>idimg: " .$id_img ."<br>";
						
			echo "</td><td>";
			
			echo "<img onMouseOver=\"javascript:zoomit('".$id_imgs ."')\" class=\"img_ingredient\" alt=\"Image de "
			.mysql_result($result,$i,'libelle') ."\" 
			src=\"".CHEMIN ."img/ingredients/".mysql_result($result,$i,'ingredients.img')."\" id=\"" .$id_img ."\"/>
			</a>";
/*
 * display a hidden image with normal size
 */
			echo "<img id=\"".$id_imgs."\" onMouseOver=\"javascript:zoomout('".$id_imgs ."')\" alt=\"Image de "
			.mysql_result($result,$i,'libelle') ."\" 
			src=\"".CHEMIN ."img/ingredients/"
			.mysql_result($result,$i,'ingredients.img')."\" id=\"" .$id_img ."\" style=\"
			position: realtive; 
			top: 10px;
			left: 300px;
			display: none;
			background-color: lightyellow;
			border: thin solid red;
			padding: 10px; 
			\"/>";
			
		if(strlen(mysql_result($result,$i,'ingredients.url'))>0){
			echo "&nbsp;<a href=\"" .mysql_result($result,$i,'ingredients.url') ."\">@</a>";
		}		
			
			echo "</td></tr>";		
		} else {
			if(strlen(mysql_result($result,$i,'ingredients.url'))>0){
				echo "&nbsp;<a href=\"" .mysql_result($result,$i,'ingredients.url') ."\">@</a>";
			}
		echo "<br />";
		}
		
		$i++;
	}
		if($image=="1") { //facilitated print
			echo "</table>";
		}
			/*
				 * suppress ingredient if admin		
				 */
				if($role=="administrator") {
		echo "</p><a href=\"/amagna/recettes/ajouteringredient?id=" .$id."\">Ajouter un ingrédient</a></p>";
}
}

function ingredients_modif($id = null) {
	/*
	 * print the required meals for a given recipe for editing purpose
	 */
	
	$query="
	SELECT * FROM ingredients_recettes, ingredients
	WHERE recette_id=".$id ."
	AND ingredients.id=ingredients_recettes.ingredient_id
	ORDER BY typ, libelle
	" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
			echo "<table>";
	$i=0;
	while($i<mysql_num_rows($result)){
		//do not display if facilitate
			echo "<tr><td>";
				echo mysql_result($result,$i,'quant');
		if(mysql_result($result,$i,'unit')!='0') {
			echo "&nbsp;" .mysql_result($result,$i,'unit');
		}
		echo "</td><td style=\"padding: 10px;\">";
		echo mysql_result($result,$i,'libelle');
		
		echo "</td><td><a href=\"/amagna/recettes/supprimer/?rec_id=" .$id."&ing_id=" .mysql_result($result,$i,'ingredient_id')."\">Supprimer</a>";
		
		echo "</td></tr>";
		$i++;
	}
			echo "</table>";
}

function ingredient_info($id = null,$idrec){
	$query="SELECT * FROM ingredients WHERE id=".$id;
	$result=mysql_query($query);
	$titre_ingredient=mysql_result($result, 0, 'libelle');
	$unit=mysql_result($result, 0, 'unit');
	
	 
	echo "<form method=\"GET\"><h3>";
	echo "<input type=\"hidden\" name=\"test\" value=\"test\">";
	echo "<input type=\"hidden\" name=\"id_rec\" value=\"".$idrec."\">";
	echo "<input type=\"hidden\" name=\"id_ingr\" value=\"".$id."\">";	
	echo $titre_ingredient."&nbsp;<input style=\"width: 50px\" type=\"text\" name=\"ing2add\" value=\"1\">" ." " .$unit."&nbsp;<input type=\"submit\"></h3></form>";
}

function liste_ingredients($eid){
	//// ingredient_id 	etape_id 	quant 	unit 

	$query="
	SELECT * FROM ingredients
	ORDER BY libelle
	" ;
	//echo $query ."<br>";
	$result=mysql_query($query);
	$i=0;
	echo "<select name=\"ingredient_id\">";
	while($i<mysql_num_rows($result)){
		echo "<option value=\"".mysql_result($result,$i,'id') ."\">" .mysql_result($result,$i,'libelle') ." (" .mysql_result($result,$i,'typ').")</option>";
		$i++;
	}
	echo "</select>";
	echo "<input type=\"hidden\" name=\"etape_id\" value=\"".$eid."\">";
		echo "<br>Quantité: ";
		echo "<input type=\"text\" name=\"quant\" value=\"1\">";
		echo "<br>Unité: ";
		echo "<input type=\"text\" name=\"unit\" value=\"g\">";
		
}
/*
 * a levenshtein function for fuzzy / boolean search
 */
function levenshtein_ingredients($word) {
	$word = strtolower($word);
	echo "<p>Désolé, il n'y a pas d'ingrédient correspondant à votre recherche: <em>" .$word."</em></p><br/>";
	/* levenshtein fuzzy logic search */
	echo "<p>Voulez-vous dire:</p><br/>";
	/*
	 * construct the array with the recipe's title words
	*/
	$lev = 0;
	$q = mysql_query("SELECT libelle FROM `ingredients`");
	$mots=array();
	while($r = mysql_fetch_assoc($q))
	{
		$titre=explode(" ",$r['libelle']);
		$size=count($titre);
		for ($i=0; $i <= $size; $i++)
			array_push($mots,$titre[$i]);
	}

	/*
	 * find suggested levenshtein's words
	*/
	$all_lev="";
	foreach ($mots as $mot){
		$lev = levenshtein($word, $mot);
		if($lev >= 0 && $lev < 3)
			if(!preg_match("/;$mot;/",$all_lev)){
		$all_lev=$all_lev.";".$mot.";";	
		
		{
			echo '
	<form id="IngredientIndexForm" method="post" action="/amagna/ingredients">
	<input type="hidden" name="_method" value="POST" />
	<input name="data[Ingredient][q]" type="hidden" value="'.$mot.'" id="IngredientQ" />
	<input type="submit" class="chercher" value="'.$mot.'" />
	</form>&nbsp;
			';
		}
	}
	}
}

################ glossaire ##################
function glossaire($match) {
/*
 * highlight glossaries
*/
	// Strip the opening and closing markup
	//$text = preg_replace('/\[\[(.*?)|(.*?)\]\]/', '<a target="_blank" href="$1" title="$2">$2</a>', $match);
	//$text = preg_replace('/\[\[(.*?)\]\]/', '<a target="_blank" href="$1">$1</a>', $match);
	$text = preg_replace('/\[\[(.*?)\|(.*?)\]\]/', "
			<a href=\"/amagna/glossaires/viewimg/$1\" title=\"chercher dans le glossaire\"
			onclick=\"window.open('/amagna/glossaires/viewimg/$1','','width=500, height=300,left=50,top=10');return false;\">
			<span style=\"color: #008080;\">
			<img src=\"/amagna/img/icons/glossaire_icone.jpg\"
			border=\"0\" alt=\"chercher dans le glossaire\" />$2</span></a>", $match);
	//echo "test text: ";
	echo $text;
	//new version ajax style
	/*         $sql="SELECT * FROM glossaires WHERE id=".$1;
	 echo $sql;
	$sql=mysql_query($sql);
	echo "test";
	echo mysql_result($sql,0,'libelle');
	echo mysql_result($sql,0,'definition1');
	echo mysql_result($sql,0,'image');
	*/
	/* is there an audio file? */
	if(mysql_result($sql,0,'definition2')) {
		//allvideomp3('glossaire/'.mysql_result($sql,0,'definition2'));
	}
	 
	return true;
}

function levenshtein_glossaire($word) {
	$word = strtolower($word);
	echo "<p>Désolé, il n'y a pas d'entrée dans le glossaire correspondant à votre recherche: <em>" .$word."</em></p><br/>";

	/* levenshtein fuzzy logic search */

	echo "<p>Voulez-vous dire:</p><br/>";

	/*
	 * construct the array with the recipe's title words
	*/
	$lev = 0;
	$q = mysql_query("SELECT libelle FROM `glossaires`");
	$mots=array();
	while($r = mysql_fetch_assoc($q))
	{
		$titre=explode(" ",$r['libelle']);
		$size=count($titre);
		for ($i=0; $i <= $size; $i++)
			array_push($mots,$titre[$i]);
	}

	/*
	 * find suggested levenshtein's words
	*/
	$all_lev="";
	foreach ($mots as $mot){
		$lev = levenshtein($word, $mot);
		if($lev >= 0 && $lev < 3)
			if(!preg_match("/;$mot;/",$all_lev)){
		$all_lev=$all_lev.";".$mot.";";	
		
		{
			echo '
	<form action="/amagna/glossaires" id="GlossaireIndexForm" method="post">
	<input type="hidden" name="_method" value="POST" />
	<input name="data[Glossaire][q]" type="hidden" value="'.$mot.'" id="GlossaireQ" />
	<input type="submit" class="chercher" value="'.$mot.'" />
		</form>&nbsp;
			';
		}
	}
	}
}
#################### etapes ingrédients

function ingredients_etape($id,$np,$pers,$role) {
	/*
	 * print the required meals for a given recipe, with picture if any
	*/
	$query="
	SELECT * FROM etapes_ingredients AS ei, ingredients AS i
	WHERE etape_id=".$id ."
	AND i.id=ei.ingredient_id
	ORDER BY typ, libelle
	" ;
	//	echo $query ."<br>";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>1) {
		echo "<h2>Ingrédients pour cette étape (nombre de personnes: " .$np.")</h2>";
		//echo "role: " .$role;
		echo "<table>";
		$i=0;
		echo "<table style=\"width: 50%\">";
		while($i<mysql_num_rows($result)){
			echo "<tr>";
			echo "<td style=\"text-align: right; padding-right: 10px\">";
			echo mysql_result($result,$i,'i.libelle');
			echo "</td><td>";
			echo intval($np/$pers)*mysql_result($result,$i,'ei.quant');
			echo "&nbsp;";
			echo mysql_result($result,$i,'ei.unit');
			echo "</td>";
			echo "<td>";
			echo "<img style=\"width: 100px\" class=\"rounded\" src=\"/amagna/img/ingredients/";
			echo mysql_result($result,$i,'i.img');
			echo "\">";
			echo "</td>";
			/*	hide from non-admin registred user */
			if($role=="administrator") {
				echo "<td><a href=\"/etapes/delete_ingredient/?eid=".mysql_result($result,$i,'ei.id')."\">delete</a></td>";
			}

			echo "</tr>";
			$i++;
		}
		echo "</table>";
	}
	/*	hide from non-admin registred user */
	if($role=="administrator") {

		echo "&nbsp;<a href=\"/etapes/add_ingredient?etape=".$id ."\">Ajouter un ingrédient</a>";
	}
}

function efface_etape_ingredient($eid){
	//echo "etape à effacer: " .$eid;
	
	$sql="DELETE FROM etapes_ingredients WHERE id=".$eid;
	//echo $sql;
	$sql=mysql_query($sql);
	header("Location: ".$_SERVER["HTTP_REFERER"]);	
}

function ajoute_ingredient_etape($eid){
	
}
#################### MULTIMEDIA FUNCTIONS
function season_image($season){
	$width=120;
	if($season=="1"){
		$season="spring.jpg";
		$saison="Printemps";
	}
	if($season=="2"){
		$season="summer.jpg";
		$saison="Eté";
	}
	if($season=="3"){
		$season="autumn.jpg";
		$saison="Automne";
	}
	if($season=="4"){
		$season="winter.jpg";
		$saison="Hiver";
	}	
	if($season=="5"){
		$season="four_seasons.jpg";
		$saison="Toute l'année";
		$width=350;
	}
	echo "<img style=\"width: " .$width ."px\" src=\"/amagna/img/seasons/".$season."\" alt=\"".$saison."\" title=\"".$saison."\" />";
	#echo "<p style=\"font-style: italic; font-size: 9px; color: #7F7F7F\">Image courtesy: <a href=\"http://seasonswithpurpose.blogspot.in\">seasonswithpurpose.blogspot.in</a></p>";
}


function display_audio($audiofile){
/*
 * audio display file if any
*/
	$filename="/amagna/app/webroot/audios/".$audiofile.".mp3";
	$audio=$audiofile.".mp3";
/*
 * testing which server, if dev or prod two different absolute paths
 */
	if($_SERVER["HTTP_HOST"]=="testserver"){
	$filename="/home/radeff/atable/webroot/audios/".$audiofile.".mp3";
	}elseif($_SERVER["HTTP_HOST"]=="www.picadametles.ch "){
	$filename="/amagna/app/webroot/audios/".$audiofile.".mp3";
	}
	
	if (file_exists($filename)) {
		//echo "The file $filename exists";
		allvideomp3($audio);
	} else {
//	echo "The file $filename does not exist";
	}
	
}

function allvideomp3($audio) {
/* a function to display audio file
 * extra cakephp, see /plugins/content/avreloaded
 */
		echo "
	<!-- AllVideos Reloaded Plugin (v1.2.4.1054) starts here -->
	<span id=\"avreloaded0\" class=\"allvideos\">
	<ins>
	<div id=\"warnflashavreloaded0\" style=\"background-color:red;color:white;width:160px;visibility:hidden\">
	<strong>Adobe Flash Player non installé ou plus vieux que 9.0.115!
	</strong>
	<br/>
	<a href=\"http://www.adobe.com/go/getflashplayer\" onclick=\"window.open(this.href);return false;\" onkeypress=\"window.open(this.href);return false;\">
	<img src=\"/plugins/content/avreloaded/160x41_Get_Flash_Player.jpg\" alt=\"Télécharger le lecteur Adobe Flash ici\" style=\"border:0\" />
	</a>
	</div>
	</ins>
	</span>
	<script type=\"text/javascript\">
	swfobject.embedSWF('http://" .SERVERNAMEPROD .CHEMIN ."plugins/content/avreloaded/mediaplayer.swf','avreloaded0','70','60','9.0.115','http://" .SERVERNAMEPROD .CHEMIN ."plugins/content/avreloaded/expressinstall.swf',
	{
		file:'http://" .SERVERNAMEPROD .CHEMIN ."audios/" .$audio ."',width:'70',height:'60',image:'/img/hautparleur.jpg',
		showeq:'false',searchbar:'false',enablejs:'false',autostart:'false',showicons:'true',shownavigation:'false',usefullscreen:'false',backcolor:'0xFFFFFF',frontcolor:'0x000000',
		lightcolor:'0x000000',screencolor:'0x000000',overstretch:'false'}
		,{
			allowscriptaccess:'always',seamlesstabbing:'true',allowfullscreen:'true',wmode:'window',bgcolor:'#FFFFFF',menu:'true'},
			{
				id:'p_avreloaded0',styleclass:'allvideos'});
	
				</script>
				<script type=\"text/javascript\">window.addEvent(\"domready\",function(){
					var s = \"warnflashavreloaded0\"; if ($(s)){
						$(s).setOpacity(1);
					}
				});
				</script>
				<!--
				AllVideos Reloaded Plugin (v1.2.4.1054) ends here -->
	";
}
function allvideoflv($video,$thumbnail){
	echo "
	<!-- AllVideos Reloaded Plugin (v1.2.4.1054) starts here -->
	<span id=\"avreloaded3\" class=\"allvideos\">
	<ins>
	<div id=\"warnflashavreloaded3\" style=\"background-color:red;color:white;width:160px;visibility:hidden\">
	<strong>Adobe Flash Player non installé ou plus vieux que 9.0.115!</strong><br/>
	<a href=\"http://www.adobe.com/go/getflashplayer\" onclick=\"window.open(this.href);return false;\" onkeypress=\"window.open(this.href);return false;\">		
	<img src=\"/plugins/content/avreloaded/160x41_Get_Flash_Player.jpg\" alt=\"Télécharger le lecteur Adobe Flash ici\" style=\"border:0\" />
	</a></div></ins></span>
	<script type=\"text/javascript\">
	swfobject.embedSWF('/plugins/content/avreloaded/mediaplayer.swf','avreloaded3','300','220','9.0.115','/plugins/content/avreloaded/expressinstall.swf',
	{
		file:'http://" .SERVERNAMEPROD .CHEMIN ."videos/" .$video ."',width:'300',height:'220',image:'http://" .SERVERNAMEPROD .CHEMIN ."videos/thumb/" .$thumbnail ."',			
		showeq:'false',searchbar:'false',enablejs:'false',autostart:'false',showicons:'true',showstop:'false',showdigits:'true',
		showdownload:'false',usefullscreen:'false',backcolor:'0xFFFFFF',frontcolor:'0x000000',
		lightcolor:'0x000000',screencolor:'0x000000',overstretch:'false'}
		,{
			allowscriptaccess:'always',seamlesstabbing:'true',allowfullscreen:'true',wmode:'window',bgcolor:'#FFFFFF',menu:'true'},
			{
				id:'p_avreloaded3',styleclass:'allvideos'});
				</script><script type=\"text/javascript\">window.addEvent(\"domready\",function(){
					var s = \"warnflashavreloaded3\"; if ($(s)){
						$(s).setOpacity(1);
					}
				});</script><!--
				AllVideos Reloaded Plugin (v1.2.4.1054) ends here -->
	";			
}
/* ##############
 * SQL functions
 */
#convertir date française DD-MM-YYYY au format MySQL YYYY-MM-DD
function datefr2mySQL($date) {
	$split = explode(".",$date);
	$annee = $split[2];
	$mois = $split[1];
	$jour = $split[0];
	return "$annee"."-"."$mois"."-"."$jour";
}

#convertir date MySQL YYYY-MM-DD  au format français DD-MM-YYYY
function datemySQL2fr($date) {
	$split = explode("-",$date);
	$annee = $split[0];
	$mois = $split[1];
	$jour = $split[2];
	return "$jour"."-"."$mois"."-"."$annee";
}

/*
 * a mysql's test fonction
*/
function testsql($sql) {
	if(!$sql) {
		echo "SQL error:<br>" .$sql ."<br>" .mysql_error() ."<hr>";
	}
}
/* ##############
 * USERS FUNCTIONS
 */


function generate_password($length){
	// A List of vowels and vowel sounds that we can insert in
	// the password string
	$vowels = array("a",  "e",  "i",  "o",  "u",  "ae",  "ou",  "io",
			"ea",  "ou",  "ia",  "ai");
	// A List of Consonants and Consonant sounds that we can insert
	// into the password string
	$consonants = array("b",  "c",  "d",  "g",  "h",  "j",  "k",  "l",  "m",
			"n",  "p",  "r",  "s",  "t",  "u",  "v",  "w",
			"tr",  "cr",  "fr",  "dr",  "wr",  "pr",  "th",
			"ch",  "ph",  "st",  "sl",  "cl");
	// For the call to rand(), saves a call to the count() function
	// on each iteration of the for loop
	$vowel_count = count($vowels);
	$consonant_count = count($consonants);
	// From $i .. $length, fill the string with alternating consonant
	// vowel pairs.
	for ($i = 0; $i < $length; ++$i) {
		$pass .= $consonants[rand(0,  $consonant_count - 1)] .
		$vowels[rand(0,  $vowel_count - 1)];
	}
	 
	// Since some of our consonants and vowels are more than one
	// character, our string can be longer than $length, use substr()
	// to truncate the string
	return substr($pass,  0,  $length);
	}
	
	#class to compute unique random numbers, to move in an external file eg inc.classes.php
	class UniqueRand{
		var $alreadyExists = array();
		function uRand($min = NULL, $max = NULL){
			$break='false';
			while($break=='false'){
				$rand=mt_rand($min,$max);
				if(array_search($rand,$this->alreadyExists)===false){
					$this->alreadyExists[]=$rand;
					$break='stop';
				}
			}
			return $rand;
		}
	}
/* ##############
 * HTML functions
 * 
 */

function retour_page_precedente(){
	/* go back to previous page */
	echo "<a title=\"Etape précédente\" href=\"".$_SERVER["HTTP_REFERER"]."\"><img alt=\"Etape précédente\" src=\"".CHEMIN ."img/icons/previous.jpg\" /></a>";
}

/*
 * a function to convert urls and emails to <a href's
* */

function urlize($chaine) { 
/* 
 * replace urls with links a href=http://... */
	$chaine = preg_replace("/(https:\/\/)(([[:punct:]]|[[:alnum:]]=?)*)/","<a target=\"_blank\" href=\"\\0\">\\0</a>",$chaine);
	$chaine=preg_replace("/(http:\/\/)(([[:punct:]]|[[:alnum:]]=?)*)/","<a target=\"_blank\" href=\"\\0\">\\0</a>",$chaine);
	//exclude emails
	if(!preg_match("/[a-zA-Z0-9]*\.[a-zA-Z0-9]*@/",$chaine)){
	}else {
	$chaine = preg_replace('/[-a-zA-Z0-9]*\.?[-a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~]+@([.]?[a-zA-Z0-9_\/-])*/','<a href="mailto:\\0">\\0</a>',$chaine);	
	}
	echo nl2br($chaine);
}


/*
 * convert a date YYYY-MM-DD to french format DD-MM-YYYY
*/

function datetime2fr($ladate) {
	$ladate=explode(" ",$ladate);
	$ladate=$ladate[0];
	$ladate=explode("-",$ladate);
	$ladate=$ladate[2]."-".$ladate[1]."-".$ladate[0];
	return $ladate;
}




function melto($chaine) { 
/*
 * replace mails with a link mailto:
 */
	$chaine = "<a href=\"mailto:" .$chaine ."\">".$chaine ."</a>";
	echo $chaine;
}

/*                                                                            */
/* Titre          : Affiche la saison actuelle                                */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts312-PHP.htm              */
/* Auteur         : Mathieu                                                   */
/* Date édition   : 10 Déc 2007                                               */
/* Website auteur : http://www.phpsources.org                                 */
/*                                                                            */
/******************************************************************************/


function saison() {
	//get current month
	$currentMonth=DATE("m");
	
	//retrieve season
	IF ($currentMonth>="03" && $currentMonth<="05") //spring
	$season = "1";
	ELSEIF ($currentMonth>="06" && $currentMonth<="08") //summer
	$season = "2";
	ELSEIF ($currentMonth>="09" && $currentMonth<="11") //autumn
	$season = "3";
	ELSE //winter
	$season = "winter,4";
	return($season);
}

/*
 * personalization - personalisation
 */

function recordActivity($uid)
/*
 * log logged user's actions
*/
{
		
	$sql="INSERT INTO `activities` 
	(`id`, `user_browser`, `user_ip`, `user_id`, `user_accessed`, `referer`, `url`) 
	VALUES
	('', 
	'" .$_SERVER['HTTP_USER_AGENT'] ."', 
	'".$_SERVER['REMOTE_ADDR']."', 
	'" .$uid ."', 
	'".date("Y-m-d H:i:s")."',
	'".$_SERVER["HTTP_REFERER"]."',
	'".$_SERVER["REQUEST_URI"]."' 
	)";
	
	//echo "<pre>$sql</pre>";
	$sql=mysql_query($sql);
	
}

function recordRecipe($uid,$url)
/*
 * log logged user's viewing a recipe
*/
{

	$sql="INSERT INTO `ilikerecipes` 
	(`id`, `user_id`, `user_accessed`, `recette_id`)
	VALUES
	('',
		'" .$uid ."',
	'".date("Y-m-d H:i:s")."',
	'".$url."'
	)";

	//echo "<pre>$sql</pre>";
	$sql=mysql_query($sql);

}
?>

