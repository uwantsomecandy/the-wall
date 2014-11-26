<?php 
	session_start();
	if (!isset($_SESSION['email'])){
		header('location:home.php');
	}
	else
	{

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

		case 'profiel':
		
			

			$tpl->newblock("profiel");


			showprofiel($_SESSION['email']);
	
		break;



		case 'showeditprofiel':

			showgeteditprofiel($_SESSION['email']);



			
		break;

		case 'editprofiel';

			if(isset($_POST['editprofiel'])){

				editprofiel ($_POST, $db);
				
				
				header('location:profiel.php?actie=profiel');
			}

		break;		
	}
		$db = null;
		
	}
		$tpl->printToScreen();

		
 ?>