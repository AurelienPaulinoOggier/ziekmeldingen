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
		</form>
		
		<?php
#database connectie
	$host = "localhost";
    $dbname = "zkm";
    $username = "root";
    $password = "";

    $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
		,$username, $password);

#tabel van studenten
	echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:25%;'>";
    echo "<tr><th>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbspLeerling&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp</th>
				<th>leerling&nbspnummer</th><th>Klas</th><th>Status</th></tr></h3>";
		
	try {		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				
		$query = "SELECT * FROM student";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

			echo "<tr><td>$rij->lnaam</td>
					<td>$rij->lnummer</td>
					<td>$rij->klas</td>
					<td><a style='text-decoration: none;' href='ZBmelden.php?sid=".$rij->sid."'>$rij->lstatus</a></td>
					<td><a style='text-decoration: underline;' href='Verwijderen.php?sid=".$rij->sid."'>Delete</a></td></tr>";
		}
	}
		
	catch(PDOException $e) {
		echo "Foutmelding: " . $e->getMessage();
	}
	
	?>
	</body>
	
</html>