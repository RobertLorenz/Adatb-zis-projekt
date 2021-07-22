<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) { 

		$Csnev = $_POST['csaladnev'];

		$sql = "UPDATE csalad SET csaladnev='$_POST[nev]' WHERE csaladnev = '$_POST[csaladnev]' ";

		$res = mysqli_query($conn, $sql) or die ('Hibás utasitás!'); 

		if (mysqli_query($conn, $sql)) {
			header("refresh:5;url=csaladmod.php");
			echo "Sikerült a változás";
		} else {
			echo "Nem sikerült változtani";
		}

	} else {
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}
	mysqli_close($conn);
?>