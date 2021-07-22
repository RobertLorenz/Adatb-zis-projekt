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
			<th>Vezetéknév</th>
			<th>Keresztnév</th>
			<th>Születési dátum</th>
			<th>Nem</th>
			<th>Élettársa</th>
			<th>Szülei</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "csaladfa");
		if ($conn -> connect_error) {
			die("Hibás csatlakozás:". $conn -> connect_error);
		}
		
		$sql = "SELECT CONCAT(p.csaladnev , ' ' , p.keresztnev) AS parja, sz.igazolvanyszam AS igazolvanyszam, sz.csaladnev AS csaladnev, sz.keresztnev AS keresztnev, sz.szuletesnap AS szuletesnap, sz.nem AS nem, sz.szulei AS szulei FROM szemely sz LEFT JOIN szemely p ON p.igazolvanyszam = sz.parja_igazolvanyszama ORDER BY sz.szuletesnap ASC";

		$result = $conn -> query($sql);
		
		if($result -> num_rows > 0) {
			while($row = $result -> fetch_assoc()){
				echo "<tr><td>". $row["igazolvanyszam"]."</td><td>".$row["csaladnev"]."</td><td>".$row["keresztnev"]."</td><td>".$row["szuletesnap"]."</td><td>".$row["nem"]."</td><td>".$row["parja"]."</td><td>".$row["szulei"]."</td>";
			}
			echo "</table>";
		} else {
			echo "0 eredmény";
		}
		$conn-> close();
		?>
	</table>
	<footer>footer</footer>
</body>
</html>