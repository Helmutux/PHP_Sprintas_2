<!DOCTYPE html>
<html lang="lt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Personalo trynimo algoritmas</title>
</head>
<body>
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

    // apsirasau trynimo algoritma
	if (!isset($_GET['do']) || $_GET['do'] != 1) {					
	    switch ($_GET['type']) {
			case 'personalas':
				$query = 'DELETE FROM personalas
					WHERE person_id = ' . $_GET['id'];
					$result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));
						
            ?>
            <!-- sekmingo trynimo atveju isvedame i ekrana pranesima -->
            <script type="text/javascript">
            alert("Sėkmingai ištrinta");
            window.location = "index.php";
            </script>				    
            <?php
        }
    }
?>
</body>
</html>