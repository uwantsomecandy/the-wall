<?php 


	include ("./database-conection.php.");
	include("./class.TemplatePower.inc.php");
	include("./loginfunctions.php");

	$tpl = new TemplatePower("./thewall.tpl");
	$tpl->prepare();

	if(isset($_GET['actie'])){
	$actie = $_GET['actie'];
	} else {
		$actie = null;
	}

	switch ($actie) {	

		case 'postapost';
			 if(isset($_POST['postapost'])){

			 	


				$posten = postapost ($_POST, $db);
				echo $posten;

				header('location:profiel.php?actie=profiel');
			} else {
				$tpl->newBlock("postapost");
				
			}
				
		break;

		case 'showownposts';
			$tpl->newblock("showownpost");


			showownpost($_SESSION['gebruiker_id']);
		break;
		default:
		$tpl->newblock("postapost");
		$tpl->printToScreen();
		break;
	}
		$db = null;


		
 ?>