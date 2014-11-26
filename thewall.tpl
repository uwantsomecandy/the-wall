<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
	<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		  <title>THE WALL</title>
		  <link rel="stylesheet" type="text/css" href="login.css" />
		  <style>
			label{
				width: 5em;
				float: left;
			}

		  </style>
		  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		</head>
		<body>
			<!-- START BLOCK : login -->
			  <form method="post" action="home.php?actie=login" class="login">
			    <p>
			      <label for="email">email:</label>
			      <input type="text" name="email"  placeholder="email" required>
			    </p>

			    <p>
			      <label for="paswoord">Paswoord: </label>
			      <input type="password" name="paswoord"  placeholder="paswoord" required>
			    </p>

			    <p class="login-submit">
			      <input type="submit" class="login-button" value="login" name="login" actie="profiel">			     
			    </p>

			  </form>
			<!-- END BLOCK : login -->


			<!-- START BLOCK : registratie -->
			<h1>Registratie</h1>
			<div>
				<form method="POST" class="registratie" class="login" action="home.php?actie=registreren">
				<p>
					<input type="text" placeholder="email" name="email" required>  
				
					<input type="password" placeholder="paswoord" name="paswoord" required> 
				</p>
				<p>
					<input type="text" placeholder="voornaam" name="voornaam" required>  
				
					<input type="text" placeholder="achternaam" name="achternaam" required>
				</p>
				<p>
					<label for="geboortedatum" >geboortedatum:</label>

					<input type="date" name="geboortedatum" value"" required>  
				</p>
				<p>
					<input type="text" placeholder="geslacht" name="geslacht"> 
				</p>
				<p>
					<input type="text" placeholder="woonplaats" name="woonplaats"> 
				</p>
				<p>
					<input type="text" placeholder="adres" name="adres"> 
				</p>
				<p>
					<input type="text" placeholder="postcode" name="postcode"> 
				</p>
				<p>
					<input type="text" placeholder="telefoon" name="telefoon">
				</p>
				<p>
					<input type="text" placeholder="mobiel" name="mobiel">  
				</p>
				</p class="login-submit">
					<input type="submit" class="login-button" value="registreer" name="submit">
				</form>
			<div>
			<!-- END BLOCK : registratie -->

			<!-- START BLOCK : profiel -->
				<div class="profiel">
						<!-- START BLOCK : row -->	
								<img class="avatar" src="{avatar}">
								<p class="bovenste">voornaam: {voornaam}</p>
								<p>achternaam: {achternaam}</p>
								<p>geboortedatum: {geboortedatum}</p>
								<p>geslacht: {geslacht}</p>
								<p>woonplaats: {woonplaats}</p>
								<p>adres: {adres}</p>
								<p>postcode: {postcode}</p>
								<p>telefoon: {telefoon}</p>
								<p>mobiel: {mobiel}</p>
						<!-- END BLOCK : row -->
						
				<p><a href ="profiel.php?actie=showeditprofiel">edit</a></p>
				<p><a href ="post.php?actie=makeapost">post aanmaken</a></p>
				<p><a href ="post.php?actie=showownposts">bekijk je eigen posts</a></p>
				<p><a href ="home.php?actie=logout">uitloggen</a></p>
				</div>

			
			<!-- END BLOCK : profiel -->
			<!-- START BLOCK : editprofiel -->
			
			<h1>profielwijzigen</h1>
			<div class="profielwijzigen">
				<form method="POST" action="profiel.php?actie=editprofiel">
				<p>		
					<label for="paswoord">paswoord:</label>		
					<input class="profielwijzigen"  type="password"  id="paswoord" value="{paswoord}" name="paswoord" required><br> 
				</p>
				<p>
					<label for="voornaam">voornaam:</label>
					<input  class="profielwijzigen" type="text"  id="voornaam" value="{voornaam}" name="voornaam" required><br>  
				</p>
				<p>
					<label for="achternaam">Achternaam:</label>
					<input class="profielwijzigen" type="text"  id="achternaam" value="{achternaam}" name="achternaam" required><br>
				</p>
				<p>
					<label for="geslacht">geslacht:</label>
					<input class="profielwijzigen" type="text"  id="geslacht" value="{geslacht}" name="geslacht"><br> 
				</p>
				<p>
					<label for="woonplaats">woonplaats:</label>
					<input class="profielwijzigen" type="text"  id="woonplaats" value="{woonplaats}" name="woonplaats"><br> 
				</p>
				<p>
					<label for="adres">Adres:</label>
					<input class="profielwijzigen" type="text"  id="adres" value="{adres}" name="adres"><br> 
				</p>
				<p>
					<label for="postcode">postcode:</label>
					<input class="profielwijzigen"  type="text"  id="postcode" value="{postcode}" name="postcode"><br> 
				</p>
				<p>
					<label for="telefoon">telefoon:</label>
					<input class="profielwijzigen" type="text"  id="telefoon" value="{telefoon}" name="telefoon"><br>
				</p>
				<p>
				</p>
				<p>
					<label for="mobiel">mobiel:</label>
					<input class="profielwijzigen" type="text"  id="mobiel" value="{mobiel}" name="mobiel"><br>  
				</p>
				</p class="login-submit">
					<label for="avatar">avatar:</label>
					<input class="profielwijzigen" type="text"  id="avatar" value="{avatar}" name="avatar"><br> 
					<input type="hidden" name="id" value="{id}">
					<input type="submit" class="login-button" value="editprofiel" name="editprofiel">
				
				</form>
				<p><a href ="profiel.php?actie=profiel">terug naar profiel</a></p>

			<div>

			<!-- END BLOCK : editprofiel -->
			<!-- START BLOCK : postapost -->
				<div>
					
					<form method="POST" action="post.php?actie=postapost">
						<p>je kan hier een post posten:</p>
						<p><input type="text" placeholder='de titel van je post' id="titel" name="titel"></p>
						<p><textarea class="post" type="text" placeholder='bericht schrijven van max 500 characters...'  id="content"  name="content"></textarea> </br></p> 
						<p class="login-submit">
							<input type="submit" class="login-button" value="postapost" name="postapost" actie="postapost">			     
						</p>	
					</form>
					<p><a href ="profiel.php?actie=profiel">terug naar profiel</a></p>
				</div>
			<!-- END BLOCK : postapost -->
			<!-- START BLOCK : showownpost -->

			<h1>{titel}</h1>
			<p>{content}</p>
			<p>{datum} , {gebruiker_id}</p>
			<p><a href ="profiel.php?actie=profiel">terug naar profiel</a></p>
			<!-- END BLOCK : showownpost -->
			
		</body>
	</html>