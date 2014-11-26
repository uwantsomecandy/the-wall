<?php 







	function registreren($email, $paswoord, $lastid, $voornaam, $achternaam, $geboortedatum, $geslacht, $woonplaats, $adres, $postcode, $telefoon, $mobiel, $avatar, $db){

		$sql = "INSERT INTO persoon (voornaam, achternaam, geboortedatum, geslacht, woonplaats, adres, postcode, telefoon, mobiel, avatar) VALUES 
		(:voornaam, :achternaam, :geboortedatum, :geslacht, :woonplaats, :adres, :postcode, :telefoon, :mobiel, :avatar)";

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
		$stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
		$stmt->bindParam(':geboortedatum', $geboortedatum, PDO::PARAM_STR);
		$stmt->bindParam(':geslacht', $geslacht, PDO::PARAM_STR);
		$stmt->bindParam(':woonplaats', $woonplaats, PDO::PARAM_STR);
		$stmt->bindParam(':adres', $adres, PDO::PARAM_STR);
		$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
		$stmt->bindParam(':telefoon', $telefoon, PDO::PARAM_STR);
		$stmt->bindParam(':mobiel', $mobiel, PDO::PARAM_STR);
		$stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);

		$stmt->execute();

		$personid = $db->lastInsertId();
		echo $personid;

		$sql2 = "INSERT INTO gebruiker (email, paswoord, status, groep_id, persoon_id) VALUES (:email, :paswoord, 0, 3,:lastInsertId)";

		$stmt2 = $db->prepare($sql2);

		$stmt2->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt2->bindParam(':paswoord', $paswoord, PDO::PARAM_STR);
		$stmt2->bindParam(':lastInsertId', $lastid, PDO::PARAM_STR);
       	$lastid = $db->lastInsertId();

		
		$stmt2->execute();
		return 'ok';	
	}


	function showprofiel($profiel){

			global $tpl, $db;
				
				$sql = "select * from gebruiker left join persoon on gebruiker.persoon_id = persoon.id where email = :email";

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':email', $profiel, PDO::PARAM_STR);
			
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$tpl->newblock("row");
				$tpl->assign("avatar", $row['avatar']);	
				$tpl->assign("voornaam", $row['voornaam']);	
				$tpl->assign("achternaam", $row['achternaam']);	
				$tpl->assign("geboortedatum", $row['geboortedatum']);	
				$tpl->assign("geslacht", $row['geslacht']);	
				$tpl->assign("woonplaats", $row['woonplaats']);	
				$tpl->assign("adres", $row['adres']);	
				$tpl->assign("postcode", $row['postcode']);
				$tpl->assign("telefoon", $row['telefoon']);	
				$tpl->assign("mobiel", $row['mobiel']);

	}

	function showgeteditprofiel($emailfromlogedinuser){

		global $tpl, $db;
				
				
				$sql = "select * from gebruiker left join persoon on gebruiker.persoon_id = persoon.id where email = :email";

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':email', $emailfromlogedinuser, PDO::PARAM_STR);
			
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$tpl->newblock("editprofiel");
				$tpl->assign("paswoord", $row['paswoord']);
				$tpl->assign("avatar", $row['avatar']);	
				$tpl->assign("voornaam", $row['voornaam']);	
				$tpl->assign("achternaam", $row['achternaam']);	
				$tpl->assign("geboortedatum", $row['geboortedatum']);	
				$tpl->assign("geslacht", $row['geslacht']);	
				$tpl->assign("woonplaats", $row['woonplaats']);	
				$tpl->assign("adres", $row['adres']);	
				$tpl->assign("postcode", $row['postcode']);
				$tpl->assign("telefoon", $row['telefoon']);	
				$tpl->assign("mobiel", $row['mobiel']);
				$tpl->assign("id", $row['id']);

	}
	function editprofiel($data, $db){
		
		$sql = "UPDATE persoon SET voornaam=:voornaam, achternaam=:achternaam, geslacht=:geslacht, woonplaats=:woonplaats, adres=:adres, 
		postcode=:postcode, telefoon=:telefoon, mobiel=:mobiel, avatar=:avatar WHERE id=:id";

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':voornaam', $data['voornaam'], PDO::PARAM_STR);
		$stmt->bindParam(':achternaam', $data['achternaam'], PDO::PARAM_STR);
		$stmt->bindParam(':geslacht', $data['geslacht'], PDO::PARAM_STR);
		$stmt->bindParam(':woonplaats', $data['woonplaats'], PDO::PARAM_STR);
		$stmt->bindParam(':adres', $data['adres'], PDO::PARAM_STR);
		$stmt->bindParam(':postcode', $data['postcode'], PDO::PARAM_STR);
		$stmt->bindParam(':telefoon', $data['telefoon'], PDO::PARAM_STR);
		$stmt->bindParam(':mobiel', $data['mobiel'], PDO::PARAM_STR);
		$stmt->bindParam(':avatar', $data['avatar'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);

		$stmt->execute();
		
	}

	function postapost($data){

		global $db;

		$sql = "INSERT INTO post (titel, content, datum, gebruiker_id) VALUES (:titel, :content, :datum, :gebruiker_id)";

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':titel', $data['titel'], PDO::PARAM_STR);
		$stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
		$stmt->bindParam(':gebruiker_id', $data['gebruiker_id'], PDO::PARAM_STR);
		$stmt->bindParam(':datum', $datum, PDO::PARAM_STR);
		$datum = time();
		
		$stmt->execute();

	}


	function showownpost($gebruikerid){

		global $tpl, $db;
				
				$sql = "select * from gebruiker left join post on post.gebruiker_id = id where gebruiker_id = :gebruiker_id";

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':gebruiker_id', $gebruikerid, PDO::PARAM_STR);
			
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$tpl->newblock("row");
				$tpl->assign("content", $row['content']);	
				$tpl->assign("titel", $row['titel']);	
				$tpl->assign("gebruiker_id", $row['gebruiker_id']);	
				$tpl->assign("datum", $row['datum']);	
				

	}

	function login($email, $paswoord, $db){

		$sql = "select *, count(*) as iets from gebruiker where email = :email and paswoord = :paswoord";

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':paswoord', $paswoord, PDO::PARAM_STR);
		
		$email = $_POST['email'];
		$paswoord = $_POST['paswoord'];

		$stmt->execute();
		return $stmt;

	}
 ?>

