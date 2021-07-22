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
	<div class="big">
	<div class="mid">
		<ul>
			<h1>Személyek kezelése</h1><br>
			<li><a href="urlap.php"><button class="btn">Új személy hozzáadása</button></a></li>
			<li><a href="szemelymod.php"><button class="btn">Személy módosítása</button></a></li>
			<li><a href="szemelydel.php"><button class="btn">Személy törlése</button></a></li><br>
		</ul>
		<div class="mid">
		<ul>
			<h1>Családok kezelése</h1><br>
			<li><a href="urlapcs.php"><button class="btn">Új család hozzáadása</button></a></li>
			<li><a href="csaladmod.php"><button class="btn">Család módosítása</button></a></li>
			<li><a href="csaladdel.php"><button class="btn">Család törlése</button></a></li><br>
		</ul>
	</div>
	</div>
	</div>
</body>
</html>