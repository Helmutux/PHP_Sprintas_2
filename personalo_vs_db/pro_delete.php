<!DOCTYPE html>
<html lang="lt">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Projektų trynimas</title>
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
			case 'projektai':
				$query = 'DELETE FROM projektai
					WHERE pro_id = ' . $_GET['id'];
					$result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));
                    
                    mysqli_close($jungtis);
            ?>
            <script type="text/javascript">
            alert("Sėkmingai ištrinta");
            window.location = "pro_index.php";
            </script>				
                        
            <?php
        }
    }
?>
</body>
</html>