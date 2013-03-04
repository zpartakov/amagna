<?php
/* RECIPES FUNCTIONS */
$sql = "
	SELECT *
	FROM recettes WHERE id NOT IN 
	(SELECT recette_id FROM menus_recettes) 
	 ORDER BY recettes.type_id";
	//echo $sql;
	$sql=mysql_query($sql);
	$i=0;
	if(mysql_num_rows($sql)>0) {
		echo "<h2 class=\"recettes_suggerees\">Recettes orphelines (n'appartenant à aucun menu)</h2>";
	}
	while($i<mysql_num_rows($sql)){
		echo "<p>";
		echo "<a href=\"view/" .mysql_result($sql,$i,'recettes.id') ."\"";
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