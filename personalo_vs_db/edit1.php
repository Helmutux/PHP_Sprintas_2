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

    //jungiuosi prie serverio ir pasirinktos duomenu bazes
    $jungtis = @new mysqli($servername, $username, $password, $dbname);

    //jei prisijungimas nesekmingas, vartotojas gaus pranesima, nenurodant jokios failu katalogu strukturos
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');

    //Apsirasau personalo lenteles uzpildyma naujais duomenimis. Gauname is edit.php 
        $query = "UPDATE personalas set Vardas ='$name',
            Pavardė ='$surname', Telefonas='$phone',
            pro_id='$pro_id'
            WHERE
            person_id ='$pid'";
            $result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));
            
            mysqli_close($jungtis);           
    ?>	
    <!-- sekmes atveju, i ekrana isvedu pranesima -->
    <script type="text/javascript">
        alert("Duomenys sėkmingai atnaujinti");
        window.location = "index.php";
    </script>
</body>
</html>