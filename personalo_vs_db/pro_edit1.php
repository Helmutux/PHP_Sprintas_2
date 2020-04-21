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
    $manager = $_POST['atsakingas'];
    
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

        $query = "UPDATE projektai set Pavadinimas ='$name',
            Paskirtis ='$purpose', Realizavimo_pradžia='$sdate',
            Atsakingas_personalas='$manager'
            WHERE
            pro_id ='$prid'";
            $result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));
                        
    ?>	
    <script type="text/javascript">
        alert("Duomenys sėkmingai atnaujinti");
        window.location = "pro_index.php";
    </script>
 </body>
</html>