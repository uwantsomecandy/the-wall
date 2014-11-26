<?php 
	include ("./database-conection.php.");
	include("./class.TemplatePower.inc.php");
	include("./loginfunctions.php");

	$tpl = new TemplatePower("./thewall.tpl");
	$tpl->prepare();
	session_start();

	if(isset($_GET['actie'])){
	$actie = $_GET['actie'];
	} else {
		$actie = null;
	}

	switch ($actie) {	

		case 'logout':
			
				session_start();
				unset($_SESSION['id']);
				header("Location:home.php");
			
		break;

		case 'login':
			
		$stmt = login($_POST['email'], $_POST['paswoord'], $db);
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$email = $row['email'];
			$login = $row['iets'];
		}
		if ($login == 1){

			$_SESSION['email'] = $email;
		
			header('location:profiel.php?actie=profiel');
			
		}
		else
		{
			header('location:home.php');
		}
		
		break;

		case 'registreren':
		
		if(isset($_POST['submit'])){

			$registreren = registreren ($_POST['email'], $_POST['paswoord'], $_POST[':lastInsertId'],$_POST['voornaam'], $_POST['achternaam'], $_POST['geboortedatum'], 
			$_POST['geslacht'], $_POST['woonplaats'], $_POST['adres'], $_POST['postcode'], $_POST['telefoon'], $_POST['mobiel'], $db);
			echo $registreren;

			header('location:home.php');
		} else {
			$tpl->newBlock("registratie");
			
		}
		break;
		default:
		$tpl->newBlock("login");
		
		$tpl->newblock("registratie");
		$tpl->printToScreen();
		break;
	}


	$db = null;

 ?>