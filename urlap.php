<?php 
    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

    if ( mysqli_select_db($conn, 'csaladfa') ) { 

        $sql = "SELECT csaladnev FROM csalad";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasitás!');

        $sql1 = "SELECT hazastarsak FROM eskuvo";
        $res1 = mysqli_query($conn, $sql1) or die ('Hibás utasitás!');
        
    } else {
        die ('Nem sikerült csatlakozni az adatbázishoz.');
    }



?>
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
    <form action="in.php" method="post">
	<div class="content">
	<p>
        Igazolványszám:<br>
        <input type='text' name="igazolvanyszam">
    </p>
	<p>
        Családnév:<br>
        <select name="csaladnev">
            <?php 
                while ( ($current_row = mysqli_fetch_assoc($res))!= null)
                {
            ?>
                <option value="<?=$current_row["csaladnev"]?>"><?=$current_row["csaladnev"]?></option>
            <?php 

                }

            ?>
        </select>
    </p>
    <p>
        Keresztnév:<br>
        <input type='text' name="keresztnev">
    </p>
    <p>
        Születési dátum:<br>
        <input type='date' name="szuletesnap">
    </p><br>
    <p>
         Nem:
        <br>
        <select name="nem">
            <option value="férfi">férfi</option>
            <option value="nő">nő</option>
        </select>
    </p><br>
    <p>
        Párja igazolványszáma:<br>
        <input type='text' name="parja_igazolvanyszama">
    </p>
    <p>
        Szülei:<br>
        <select name="szulei">
            <?php 
                while ( ($current_row = mysqli_fetch_assoc($res1))!= null)
                {
            ?>
                <option value="<?=$current_row["hazastarsak"]?>"><?=$current_row["hazastarsak"]?></option>
            <?php 

                }

            ?>
        </select>
    </p><br><br>
	
	<button class="sndbtn" type="submit">Személy hozzáadása</button>
</div>
</form>
</body>
</html>