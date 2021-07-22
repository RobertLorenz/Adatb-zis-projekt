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
	<form action="incs.php" method="post">
	<div class="content">
	<p>
        Család neve:<br>
        <input type='text' name="csaladnev">
    </p>
	<br><br>
	
	<button class="sndbtn" type="submit">Család hozzáadása</button>
</div>
</form>
</body>
</html>