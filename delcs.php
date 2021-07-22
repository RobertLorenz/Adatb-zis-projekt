<?php 
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) {

		$sql = "DELETE FROM csalad WHERE csaladnev = '" . $_GET["csaladnev"] . "'";
		$res = mysqli_query($conn, $sql) or die ('Hibás utasitás!');

		if (mysqli_query($conn, $sql)) {
			echo 'Sikeresen törörlve lett';
		} else {
			echo 'Nem sikerült törölni';
		}

	} else {
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}

	header('refresh:5; url=csaladdel.php');

	mysqli_close($conn);
?>