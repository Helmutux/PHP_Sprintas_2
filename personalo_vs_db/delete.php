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

    //jungiuosi prie serverio ir pasirinktos duomenu bazes
    $jungtis = @new mysqli($servername, $username, $password, $dbname);

    //jei prisijungimas nesekmingas, vartotojas gaus pranesima, nenurodant jokios failu katalogu strukturos
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');

    // apsirasau trynimo algoritma
	if (!isset($_GET['do']) || $_GET['do'] != 1) {					
	    switch ($_GET['type']) {
			case 'personalas':
				$query = 'DELETE FROM personalas
					WHERE person_id = ' . $_GET['id'];
					$result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));
						
            ?>
            <!-- sekmingo trynimo atveju isvedame i ekrana pranesima -->
            <script type="text/javascript">
            alert("Sėkmingai ištrinta");
            window.location = "index.php";
            </script>				    
            <?php
        }
    }
    mysqli_close($jungtis);
?>
</body>
</html>