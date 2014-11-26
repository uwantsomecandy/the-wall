<?php 
	$db = new PDO('mysql:host=localhost;dbname=the wall', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	function getALLpersonen(){
		global $db;
		$sql = "SELECT * FROM  persoon;
				SELECT * FROM gebruiker";

		$result = $db->query($sql);
		;
		return $result;
	}

	function getONEpersoon($id){
		global $db;
		$sql = "SELECT * FROM persoon WHERE id=:id";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

?>