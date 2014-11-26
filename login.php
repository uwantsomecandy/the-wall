<?php 
	include ("./database-conection.php.");
	include("./class.TemplatePower.inc.php");
	include("./loginfunctions.php");

	$tpl = new TemplatePower("./login.tpl");
	$tpl->prepare();

		if(isset($_GET['actie'])){
		$actie = $_GET['actie'];
		} else {
			$actie = null;
		}

		switch ($actie) {
	case 'login':

		if(isset($_POST['submit'])){

			$login = login ($email, $paswoord, $db);
			echo $login;

			header('location:home.php');
			

		} elseif (isset($_GET['id'])) {

			$sql = "SELECT * FROM gebruiker WHERE email = email , paswoord = paswoord";

			$stmt = $db->prepare($sql);

			$stmt->bindParam(':id', $id, PDO::PARAM_INT);

			$id = $_GET['id'];

			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			$tpl->login("login");

			$tpl->assign("id", $row['id']);	
			$tpl->assign("paswoord", $row['paswoord']);	
			$tpl->assign("email", $row['email']);	
			
		 }


		} else {
			header('location:home.php');
		}

		break;
	}


	$db = null;
	$tpl->printToScreen();

 ?>