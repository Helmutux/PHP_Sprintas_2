<!DOCTYPE html>
<html lang="lt">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iraso pridejimas i projektai lentele</title>
</head>
<?php
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
?>  
<body>
<?php
    $name = $_POST['pavadinimas'];
    $purpose = $_POST['paskirtis'];
    $sdate = $_POST['data'];
    // ivedame naujo iraso duomenis i lentele projektai duomenu bazeje
    switch($_GET['action']){
        case 'add':			
                $query = "INSERT INTO `projektai`
                (`pro_id`,`Pavadinimas`, `Paskirtis`, `Realizavimo_pradžia`)
                VALUES (null,'$name','$purpose','$sdate')";
        
                $result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));

                break;
            }
?>
<!-- sekmingo pridejimo atveju isvedame i ekrana pranesima -->
<script type="text/javascript">
    alert("Sėkmingai pridėta");
    window.location = "pro_index.php";
</script>
</body>
</html>

