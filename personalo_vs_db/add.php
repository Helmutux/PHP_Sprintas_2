<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Personalo valdymo sistema</title>
</head>
<?php
    //apsirasau prisijungima prie duomenu bazes:
    //prisijungimo duomenys
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "personalo_vs_db";

    //jungiuosi prie serverio ir pasirinktos duomenu bazes
    $jungtis = new mysqli($servername, $username, $password, $dbname);

    //jei prisijungimas nesekmingas, vartotojas gaus pranesima, nenurodant jokios failu katalogu strukturos
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');

    mysqli_close($jungtis);
?> 
<!-- apsirasau naujo darbuotojo pridejimo puslapi  -->
<body>
    <header>
        <a href="index.php">Personalas</a>
        <a href="pro_index.php">Projektai</a>
        <h1>Personalo valdymo sistema </h1>
    </header>
    <main>          
        <div class="col-lg-12">
            <h3>Pridėti naują darbuotoją</h3>
            <div class="col-lg-6">
                <!-- apsirasau pridejimo forma. ivestus duomenis siusime apdoroti i transac.php puslapi -->
                <form role="form" method="post" action="transac.php?action=add">
                    <div class="form-group">
                        <label for="vardas">Darbuotojo vardas (būtina nurodyti)</label>
                        <input class="form-control" placeholder="Vardas" name="vardas">
                    </div>
                    <div class="form-group">
                        <label for="pavarde">Darbuotojo pavardė</label>
                        <input class="form-control" placeholder="Pavardė" name="pavarde">
                    </div> 
                    <div class="form-group">
                        <label for="telefonas">Darbuotojo kontaktinis telefonas (nebūtina nurodyti; galima patikslinti vėliau redaguojant)</label>
                        <input class="form-control" placeholder="Kontaktinis telefonas" name="telefonas">
                    </div>
                    <div class="form-group">
                    <label for="">Projekto, kuriam darbuotojas priskiriamas, unikalus ID (būtina nurodyti; pasitikslinti galimą reikšmę naudojant projekto peržiūrą)</label>
                    <input class="form-control" placeholder="Projekto unikalus id" name="pro_id">
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