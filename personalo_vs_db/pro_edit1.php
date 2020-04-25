<!DOCTYPE html>
<html lang="lt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Redagavimo logika</title>
</head>
<body>
    <header>
        <a href="index.php">Personalas</a>
        <a href="pro_index.php">Projektai</a>
        <h1>Projektų valdymo sistema </h1>
    </header>
<?php
    $prid = $_POST['id'];
    $name = $_POST['pavadinimas'];
    $purpose = $_POST['paskirtis'];
    $sdate = $_POST['data'];
    
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

    //apsirasau redagavimo algoritmo 2 dali - suformuoju projektu lenteles iraso atnaujinimo uzklausa

        $query = "UPDATE projektai set Pavadinimas ='$name',
            Paskirtis ='$purpose', Realizavimo_pradžia='$sdate'
            WHERE
            pro_id ='$prid'";
            $result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));
         
        mysqli_close($jungtis);
    ?>	
    <script type="text/javascript">
        alert("Duomenys sėkmingai atnaujinti");
        window.location = "pro_index.php";
    </script>
 </body>
</html>