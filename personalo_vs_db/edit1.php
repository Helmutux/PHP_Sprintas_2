<!DOCTYPE html>
<html lang="lt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Personalo redagavimo logika</title>
</head>
<body>
<?php
    $pid = $_POST['id'];
    $name = $_POST['vardas'];
    $surname = $_POST['pavarde'];
    $phone = $_POST['telefonas'];
    $pro_id = $_POST['pro_id'];
    
    //apsirasau prisijungima prie duomenu bazes:
    //prisijungimo duomenys
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "personalo_vs_db";

    //jungiuosi prie serverio
    $serveris = mysqli_connect($servername, $username, $password);

    //kas vyksta, jei nepavyko prisijungti
    if(!$serveris) {
        error_log('Nepavyko prisijungti prie MySQL:'.mysqli_errors($serveris));
        die ('Vidinė serverio klaida'); 
    }

    //nurodau, kuria duomenu baze naudosiu
    $pasirinkta_db = mysqli_select_db($serveris, $dbname);

    //kas vyksta, jei nepavyko pasiekti duomenu bazes
    if(!$pasirinkta_db) {
        error_log('Duomenu bazes pasiekti nepavyko: '.mysqli_error($serveris));
        die ('Vidinė serverio klaida');
    }
    //Apsirasau personalo lenteles uzpildyma naujais duomenimis. Gauname is edit.php 
        $query = "UPDATE personalas set Vardas ='$name',
            Pavardė ='$surname', Telefonas='$phone',
            pro_id='$pro_id'
            WHERE
            person_id ='$pid'";
            $result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));
                        
    ?>	
    <!-- sekmes atveju, i ekrana isvedu pranesima -->
    <script type="text/javascript">
        alert("Duomenys sėkmingai atnaujinti");
        window.location = "index.php";
    </script>
</body>
</html>