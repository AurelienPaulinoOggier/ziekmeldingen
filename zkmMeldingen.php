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
			<select name="lnaam" style='margin-left:10%;'>
			
		<?php
				
#database connectie
	$host = "localhost";
    $dbname = "zkm";
    $username = "root";
    $password = "";

    $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
		,$username, $password);
		
		$query = "SELECT lnaam FROM student";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

		?>
			<option value="<?php echo $rij->lnaam; ?>"><?php echo $rij->lnaam; ?></option>

		<?php
		
		}
		
		?>
			</select><br/>
		<input type = "submit" name = "btnSorteren" value = "Sorteren" style='margin-left:10%;'/>
		
		</div>
		</form>
		
		<?php


#Sorteer tabel 
	if(isset($_POST['btnSorteren']))
	{	
		$lnaam = $_POST["lnaam"];
		
		echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:25%;'>";
		echo "<tr><th>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbspLeerling&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp</th>
					<th>Ziekgemeld</th><th>Betergemeld</th></tr></h3>";
			
		try {		
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
			$query = "SELECT * FROM student, ziekmelding WHERE ziekmelding.sid = student.sid AND lnaam = '$lnaam'";
			$stm = $con->prepare($query);
			$stm->execute();

			$res = $stm->fetchAll(PDO::FETCH_OBJ);
			foreach($res as $rij)
			{

				echo "<tr><td>$rij->lnaam</td>
						<td>$rij->datumZ</td>
						<td>$rij->datumB</td>";
			}
		}
			
		catch(PDOException $e) {
			echo "Foutmelding: " . $e->getMessage();
		}
	}
	
#tabel van alle meldingen van studenten van vandaag
	echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:25%;'>";
    echo "<tr><th>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbspLeerling&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp</th>
				<th>leerling&nbspnummer</th><th>Ziekgemeld</th><th>Betergemeld</th></tr></h3>";
		
	try {		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$datum = date("Y/m/d");
		
		$query = "SELECT * FROM student, ziekmelding WHERE ziekmelding.sid = student.sid AND datumZ = '$datum'";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

			echo "<tr><td>$rij->lnaam</td>
					<td>$rij->lnummer</td>
					<td>$rij->datumZ</td>
					<td>$rij->datumB</td>";
		}
	}
		
	catch(PDOException $e) {
		echo "Foutmelding: " . $e->getMessage();
	}
	
#tabel van alle meldingen van studenten
	echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:25%;'>";
    echo "<tr><th>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbspLeerling&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp</th>
				<th>leerling&nbspnummer</th><th>Ziekgemeld</th><th>Betergemeld</th></tr></h3>";
		
	try {		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				
		$query = "SELECT * FROM student, ziekmelding WHERE student.sid = ziekmelding.sid";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

			echo "<tr><td>$rij->lnaam</td>
					<td>$rij->lnummer</td>
					<td>$rij->datumZ</td>
					<td>$rij->datumB</td>";
		}
	}
		
	catch(PDOException $e) {
		echo "Foutmelding: " . $e->getMessage();
	}
	?>
	</body>
	
</html>