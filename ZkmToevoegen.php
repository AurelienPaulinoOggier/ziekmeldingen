<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="Zkm.css">
		<title> Ziekmeldig Home </title>
	</head>
	<body>
		<form method="POST">
		<nav>
				<ul>
					<li><a href="http://localhost/ziekmelding/ZkmHome.php" style="color: #ffedde; text-decoration: none;"> HOME <a/></li>
					<li><a href="http://localhost/ziekmelding/ZkmStudenten.php" style="color: #ffedde; text-decoration: none;"> Studenten <a/></li>
					<li><a href="http://localhost/ziekmelding/ZkmToevoegen.php" style="color: #ffedde; text-decoration: none;"> Toevoegen <a/></li>
					<li><a href="http://localhost/ziekmelding/ZkmMeldingen.php" style="color: #ffedde; text-decoration: none;"> Meldingen <a/></li>
				</ul>
		</nav>
		<div class = 'ToBx'>
			<h1> Student toevoegen</h1>
			<h3><input name="lname" type="name" placeholder="naam"><br/>
				<input name="lnummer" type="text" placeholder="leerling nummer"/><br/>
				<input name="klas" type="text" placeholder="klas"/><br/>
			
			<h3><input type = "submit" name = "btnToevoegen" value = "Toevoegen" class='submitBx' /></h3>
		
		<?php
	#database connectie
		$host = "localhost";
		$dbname = "zkm";
		$username = "root";
		$password = "";

		$con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
			
	#toevoegen student
		if (isset($_POST["btnToevoegen"])){
		
			$lnaam = $_POST["lname"];
			$lnummer  = $_POST["lnummer"];
			$klas = $_POST["klas"];
				
			$query = "INSERT INTO student(lnaam, lnummer, klas) VALUES".
						"('$lnaam', '$lnummer', '$klas')";
			$stm = $con->prepare($query);
			if($stm->execute()){
				echo "Het Toevoegd is geluket";
				Header("location: ZkmStudenten.php");
			}else echo "!ERROR!";
		}
		
		?>
		</div>
		</form>
	</body>
	
</html>