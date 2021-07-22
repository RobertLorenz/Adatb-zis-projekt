<?php
	$conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

	if ( mysqli_select_db($conn, 'csaladfa') ) { 

		$sql = "UPDATE szemely SET szuletesnap='$_POST[szuletesnap]', csaladnev = '$_POST[csaladnev]', keresztnev = '$_POST[keresztnev]', nem = '$_POST[nem]' WHERE igazolvanyszam = '$_POST[igazolvanyszam]' ";

		$res = mysqli_query($conn, $sql) or die ('Hibás utasitás!'); 

		if (mysqli_query($conn, $sql)) {
			header("refresh:3;url=szemelymod.php");
			echo "Sikerült a változás";
		} else {
			echo "Nem sikerült változtani";
		}

	} else {
		die ('Nem sikerült csatlakozni az adatbázishoz.');
	}
	mysqli_close($conn);
?>