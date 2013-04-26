
     Je pense que vous venez de : 

  <!-- geolocalization: see  http://www.geoplugin.com/examples-->
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
  <script language="Javascript"> 
	/* document.write(""+geoplugin_city()+", "+geoplugin_countryName()); */
	document.write(geoplugin_countryName()); 
	</script>
	
<p>Saison actuelle<br/> 
<?php      
     // affiche la saison
$saison=saison();
$saison=explode(",",$saison);

season_image($saison[1]);//num_season
?>
</p>
