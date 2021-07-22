<?php 
    $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

    

    if ( mysqli_select_db($conn, 'csaladfa') ) {

        $ID = $_POST['igazolvanyszam'];
        $Csnev = $_POST['csaladnev'];
        $Knev = $_POST['keresztnev'];
        $Datum = $_POST['szuletesnap'];
        $Nem = $_POST['nem'];
        $ParjaID = $_POST['parja_igazolvanyszama'];
        $Szulei = $_POST['szulei'];

        $sql_ID = "SELECT * FROM szemely WHERE igazolvanyszam ='$ID'";
        $result_ID = mysqli_query($conn, $sql_ID);

        if (mysqli_num_rows($result_ID) > 0) {
            echo 'A személyi szám már foglalt! <br>';
        }

        
        if (empty($ID)) {
            echo 'Adjon meg egy személyi számot! <br>' ;
        }

        if (empty($Knev)) {
            echo 'Adjon meg egy keresztnevet! <br>';
        }

        if (empty($Datum)) {
            echo 'Adjon meg egy születési dátumot! <br>';
        }

        if (empty($Szulei)) {
            echo 'Adja meg a szüleit! <br>';
        }

        $ParjaID = !empty($ParjaID) ? "'$ParjaID'" : "NULL";
        $Szulei = !empty($Szulei) ? "'$Szulei'" : "NULL";
        

        if (!empty($ID) && !empty($Datum) && !empty($Knev) && !empty($Szulei)) {

            $sql = "INSERT INTO szemely (igazolvanyszam, csaladnev, keresztnev, szuletesnap,nem,  parja_igazolvanyszama, szulei) VALUES ('$ID','$Csnev', '$Knev', '$Datum', '$Nem',$ParjaID, $Szulei )";

            
        }


        if(!mysqli_query($conn, $sql)) {
            echo 'Nem sikerült feltölteni';
            echo $sql;
        } else {
            echo 'Sikerült feltölteni';
        }
       

        mysqli_free_result($result_ID);

    } else {
        die ('Nem sikerült csatlakozni az adatbázishoz.');
    }


    

    mysqli_close($conn);

?>