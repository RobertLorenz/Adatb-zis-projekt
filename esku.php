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
	</nav>
	<table>
		<tr>
			<th>Házastársak</th>
			<th>Dátum</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "csaladfa");
		if ($conn -> connect_error) {
			die("Hibás csatlakozás:". $conn -> connect_error);
		}
		
		$sql = "SELECT * FROM eskuvo";

		$result = $conn -> query($sql);
		
		if($result -> num_rows > 0) {
			while($row = $result -> fetch_assoc()){
				echo "<tr><td>". $row["hazastarsak"]."</td><td>".$row["datum"]."</td>";
			}
			echo "</table>";
		} else {
			echo "0 eredmény";
		}
		$conn-> close();
		?>
	</table>
</body>
</html>