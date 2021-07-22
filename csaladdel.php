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
			<th>Családnév</th>
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
			<td><?php echo $row["csaladnev"]; ?></td>
			
			<td><a class="sndbtn" href="delcs.php?csaladnev=<?php echo $row["csaladnev"]; ?>">Törlés</a></td>
		</tr>
		<?php
		$i++;
		}
		?>
	</table>
	
</body>
<?php
	mysqli_free_result($res);
	mysqli_close($conn);
?>

</html>