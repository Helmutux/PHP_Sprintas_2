<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Projektų valdymo sistema</title>
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

    mysqli_close($jungtis);
?> 
<body>
    <header>
        <a href="index.php">Personalas</a>
        <a href="pro_index.php">Projektai</a>
        <h1>Projektų valdymo sistema </h1>
    </header>
    <main>
        <div class="col-lg-12">
            <h3>Pridėti naują projektą</h3>
            <div class="col-lg-6">

                <!-- apsirasau pridejimo forma -->
                <form role="form" method="post" action="pro_transac.php?action=add">
                    <div class="form-group">
                        <label for="pavadinimas">Projekto pavadinimas (būtina nurodyti)</label>
                        <input class="form-control" placeholder="Projekto pavadinimas" name="pavadinimas">
                    </div>
                    <div class="form-group">
                        <label for="paskirtis">Projekto paskirtis (būtina nurodyti)</label>
                        <input class="form-control" placeholder="Projekto paskirtis" name="paskirtis">
                    </div> 
                    <div class="form-group">
                        <label for="data">Projekto realizavimo pradžios data (būtina nurodyti)</label>
                        <input class="form-control" placeholder="Realizavimo pradžios data" name="data">
                    </div>  
                    <button type="submit" class="btn add">Išsaugoti</button>
                    <button type="reset" class="btn delete">Išvalyti</button>
                </form>  
            </div>
            <!-- col-lg-6 -->
        </div>
        <!-- col-lg-12 -->
    </main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
</body>
</html>