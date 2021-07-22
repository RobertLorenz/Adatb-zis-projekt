<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) { 

		$sql = "SELECT * FROM szemely";
		$res = mysqli_query($conn, $sql) or die ('Hibás utasitás!'); 

	} else {
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Személyek</title>
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
	</nav>
	<table>
		<tr>
			<th>Igazolványszám</th>
			<th>Születési dátum</th>
			<th>Keresztnév</th>
			<th>Vezetéknév</th>
			<th>Nem</th>
			<th>Művelet</th>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($res)) {
			echo "<tr><form action=up.php method=post>";
			echo "<input type=hidden name=igazolvanyszam value='" . $row['igazolvanyszam'] . "'>";
			echo "<td>". $row['igazolvanyszam']."</td>";
			echo "<td><input type=date name=szuletesnap value='". $row['szuletesnap']."'></td>";
			echo "<td><input type=text name=csaladnev value='". $row['csaladnev']."'></td>";
			echo "<td><input type=text name=keresztnev value='". $row['keresztnev']."'></td>";
			echo "<td><input type=text name=nem value='". $row['nem']."'></td>";
			echo "<td><input type=submit>";
			echo "</form></tr>";
		}
	?>
	</table>
	<footer>footer</footer>
</body>
</html>