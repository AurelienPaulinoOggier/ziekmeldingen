<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="Zkm.css">
		<title> Wijzigen </title>
	</head>
	<body>
	<?php
		$host = "localhost";
		$dbname = "zkm";
		$username = "root";
		$password = "";

		$con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
			
		$sid = $_GET['sid'];
			
	#terug naar vorige pagina
		if(isset($_POST{'btnTerug'})){
			Header("location: zkmStudenten.php");
		}
		
	#wijzigen
		if(isset($_POST['btnWijzigen']))
		{
			
				$datum = date("Y/m/d");
				$lstatus  = $_POST["lstatus"];
				if($lstatus == ziek){
				
					$query = "INSERT INTO ziekmelding(sid, datumZ) VALUES".
								"('$sid', '$datum')";
					$stm = $con->prepare($query);
					if($stm->execute()){
								$query = "UPDATE student SET lstatus = '$lstatus' 
									WHERE sid = '$sid'";
								$stm = $con->prepare($query);
								if($stm->execute())
								{
									Header("location: zkmStudenten.php");
								}
							}
				}elseif($lstatus == gezond){
						
					$query = "UPDATE ziekmelding SET datumB = '$datum' 
									WHERE sid = '$sid' AND datumB = 0 ";
					$stm = $con->prepare($query);
					if($stm->execute()){	
					
						$query = "UPDATE student SET lstatus = '$lstatus' 
									WHERE sid = '$sid'";
										
						$stm = $con->prepare($query);
						if($stm->execute())
						{
							Header("location: zkmStudenten.php");
						}
					}
				}else $query = $query = "INSERT INTO ziekmelding(sid, datumZ, datumB) VALUES".
								"('$sid', '$datum', '$datum')";
					$stm = $con->prepare($query);
					if($stm->execute()){	
					
						$query = "UPDATE student SET lstatus = '$lstatus' 
									WHERE sid = '$sid'";
										
						$stm = $con->prepare($query);
						if($stm->execute())
						{
							Header("location: zkmStudenten.php");
						}
					}
							
		}
		
	#query van wijzigen 
		$query = "SELECT * FROM student WHERE sid = $sid";
		$stm = $con->prepare($query);
		if($stm->execute())
		{
			$res = $stm->fetch(PDO::FETCH_OBJ);
			?>
			<form method="POST">
			<div class = 'ToBx' style='margin-top:10%;'>
				<h1> <?php echo $res->lnaam; ?> </h1><br/>
				<select name="lstatus" style='margin-left:10%;'>
							<option value="<?php echo $res->lstatus; ?>"><?php echo $res->lstatus; ?></option>
							<option value="gezond">gezond</option>
							<option value="ziek">ziek</option>
							<option value="afwezig">afwezig</option>
						</select><br/>
				<input type="submit" name="btnWijzigen" value="Wijzigen" style='margin-top:7%; margin-left:15%; width:200px;'/>
				<input type = "submit" name="btnTerug" value="terug" style='margin-top:3%; margin-left:15%; width:200px;'/>
			</div>
			</form>
			<?php
			
		}else "werkt niet?!?"
		
		?>
		
	</body>
	
</html>