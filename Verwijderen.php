<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="Zkm.css">
		<title> Verwijderen </title>
	</head>
	<body>
	<form method="POST">
		
			<div class = 'ToBx' style='margin-top:10%;'>
				<h1> Weet u zeker dat u deze leerling verwijderen? </h1><br/> 
				<h3><input type = "submit" name = "btnJa" value = "Ja" class='btnDelete' />
				<input type = "submit" name = "btnNee" value = "Nee" class='btnDelete' /></h3>
			<div/>
		</form>
		
		<?php	
	#verwijderen van leerling
	
	#database connectie
		$host = "localhost";
		$dbname = "zkm";
		$username = "root";
		$password = "";

		$con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
					,$username, $password);
			
		$sid = $_GET['sid'];
		
	#bevestigen om de Leerling te verwijderen
		if(isset($_POST["btnJa"])) {

			$query = "DELETE FROM student WHERE sid = '$sid'";
			$stm = $con->prepare($query);
			if ($stm->execute()) {
			
				$query = "DELETE FROM ziekmelding WHERE sid = '$sid'";
				$stm = $con->prepare($query);
				if ($stm->execute()) {
					header("Location: zkmStudenten.php");
				}
				
			}		
		}elseif(isset($_POST['btnNee'])){
			header("Location: zkmStudenten.php");
			}
			
		?>
		
	</body>
	
</html>