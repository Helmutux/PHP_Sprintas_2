<!DOCTYPE html>
<html lang="lt">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iraso pridejimas i personalas lentele</title>
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
    <div class="col-lg-12">
    <?php
        $name = $_POST['vardas'];
        $surname = $_POST['pavarde'];
        $phone = $_POST['telefonas'];
        $pro_id=$_POST['pro_id'];
        // ivedame naujo iraso duomenis i lentele personalas duomenu bazeje
        switch($_GET['action']){
        case 'add':			
                $query = "INSERT INTO `personalas`
                (`person_id`,`Vardas`, `Pavardė`, `Telefonas`, `pro_id`)
                VALUES (null,'$name','$surname','$phone', '$pro_id')";
        
                $result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));

                break;
            }
            mysqli_close($jungtis);
		?>
    	<script type="text/javascript">
			alert("Sėkmingai pridėta");
			window.location = "index.php";
		</script>
</body>
</html>

