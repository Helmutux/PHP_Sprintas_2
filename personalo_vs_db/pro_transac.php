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

    //jungiuosi prie serverio ir pasirinktos duomenu bazes
    $jungtis = @new mysqli($servername, $username, $password, $dbname);

    //jei prisijungimas nesekmingas, vartotojas gaus pranesima, nenurodant jokios failu katalogu strukturos
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');
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
        
                $result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));

                break;
            }
            mysqli_close($jungtis);
?>
<!-- sekmingo pridejimo atveju isvedame i ekrana pranesima -->
<script type="text/javascript">
    alert("Sėkmingai pridėta");
    window.location = "pro_index.php";
</script>
</body>
</html>

