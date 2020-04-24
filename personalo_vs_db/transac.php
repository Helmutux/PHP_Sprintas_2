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
    <div class="col-lg-12">
    <?php
        $name = $_POST['vardas'];
        $surname = $_POST['pavarde'];
        $phone = $_POST['telefonas'];
        $pro_id= $_POST['pro_id'];
        // ivedame naujo iraso duomenis i lentele personalas duomenu bazeje
        switch($_GET['action']){
        case 'add':			
                $query = "INSERT INTO `personalas`
                (`person_id`,`Vardas`, `Pavardė`, `Telefonas`, `pro_id`)
                VALUES (null,'$name','$surname','$phone', '$pro_id')";
        
                $result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));

                break;
            }

		?>
    	<script type="text/javascript">
			alert("Sėkmingai pridėta");
			window.location = "index.php";
		</script>
</body>
</html>

