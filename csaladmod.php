<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) { 

		$sql = "SELECT csaladnev FROM csalad";

		$res = mysqli_query($conn, $sql) or die ('Hibás utasitás!'); 

	} else {
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Családfa</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn"><i class="fas fa-bars"></i> </label>
		<label class="logo"><a href="index.php">Családfa</a></label>
		<ul>
			<li><a href="szemelyek.php">Személyek</a></li>
			<li><a href="csaladok.php">Családok</a></li>
			<li><a href="esemenyek.php">Események</a></li>
			
		</ul>
	</nav><br>
	<form action="csup.php" method="post" class="csup">
		<label>Család választása</label>
			<div>
			<select name="csaladnev">
				<?php 
					while ( ($current_row = mysqli_fetch_assoc($res))!= null)
					{
				?>
					<option value="<?=$current_row["csaladnev"]?>"><?=$current_row["csaladnev"]?></option>
				<?php 

					}

				?>
			</select><br>
			</div>
			<br>
			<label>Család változtatása</label><br>
			<input type="text" name="nev"><br>
			<button class="sndbtn" input type="submit">Mehet</button>
	</form>
</body>
</html>