<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) { 

		$sql = "SELECT CONCAT(p.csaladnev , ' ' , p.keresztnev) AS parja, sz.igazolvanyszam AS igazolvanyszam, sz.csaladnev AS csaladnev, sz.keresztnev AS keresztnev, sz.szuletesnap AS szuletesnap, sz.nem AS nem, sz.szulei AS szulei FROM szemely sz LEFT JOIN szemely p ON p.igazolvanyszam = sz.parja_igazolvanyszama ORDER BY sz.szuletesnap ASC";

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
			<th>Vezetéknév</th>
			<th>Keresztnév</th>
			<th>Születési dátum</th>
			<th>Nem</th>
			<th>Élettársa</th>
			<th>Szülei</th>
			<th>Művelet</th>
		</tr>
		<?php
		$i=0;
		while($row = mysqli_fetch_array($res)) {
			if($i%2==0) {
				$classname="paros";
			} else {
				$class="paratlan";
			}
		?>
		
		<tr class="<?php if(isset($classname)) echo $classname;?>">
			<td><?php echo $row["igazolvanyszam"]; ?></td>
			<td><?php echo $row["csaladnev"]; ?></td>
			<td><?php echo $row["keresztnev"]; ?></td>
			<td><?php echo $row["szuletesnap"]; ?></td>
			<td><?php echo $row["nem"]; ?></td>
			<td><?php echo $row["parja"]; ?></td>
			<td><?php echo $row["szulei"]; ?></td>
			<td><a class="sndbtn" href="del.php?igazolvanyszam=<?php echo $row["igazolvanyszam"]; ?>">Törlés</a></td>
		</tr>
		<?php
		$i++;
		}
		?>
	</table>
	
</body>
<footer>Hello :)</footer>
<?php
	mysqli_free_result($res);
	mysqli_close($conn);
?>

</html>