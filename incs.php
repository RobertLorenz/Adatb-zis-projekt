<?php 
    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

    

    if ( mysqli_select_db($conn, 'csaladfa') ) {

        $Csnev = $_POST['csaladnev'];

       

       

        if (empty($Csnev)) {
            echo 'Adjon meg egy csaladnevet! <br>';
        }

        

        if (!empty($Csnev)) {

            $sql = "INSERT INTO csalad (csaladnev) VALUES ('$Csnev')";           
        }


        if(!mysqli_query($conn, $sql)) {
            echo 'Nem sikerült feltölteni';
            echo $sql;
        } else {
            echo 'Sikerült feltölteni';
        }

    } else {
        die ('Nem sikerült csatlakozni az adatbázishoz.');
    }
    mysqli_close($conn);

?>