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
    $jungtis = @new mysqli($servername, $username, $password, $dbname);

    //jei prisijungimas nesekmingas, vartotojas gaus pranesima, nenurodant jokios failu katalogu strukturos. 
    //Galima atskirti prisijungima prie serverio ir atskirai prie duomenu bazes, tuo paciu nurodant kurioje vietoje nepavyko, bet cia to nedarome
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');

?>
<!-- apsirasome pagrindini puslapi -->
<body>
    <header>
        <a href="index.php">Personalas</a>
        <a href="pro_index.php">Projektai</a>
        <h1>Personalo valdymo sistema </h1>
    </header>
    <main>   
        <div class="col-lg-12">
            <h3>Duomenys apie darbuotojus</h3><a href="add.php?action=add" class="btn btn-xs add">Pridėti naują</a>       
            <div class="table-responsive">
                
                <!-- susikuriame lentele, i kuria kelsime duomenis is duomenu bazes personalo lenteles -->
                <table class="table table-striped">
                    
                    <!-- apsirasome lenteles virsu  -->
                    <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>Telefonas</th>
                            <th>Atsakingas už projektą</th>
                            <th>Įrašų redagavimas</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <!-- apsirasome lenteles pildyma php kodo pagalba is duomenu bazes-->
                        <?php

                        //pasiimame reikiamus duomenis uzklausos pagalba is personalas ir projektai (apie priskirta projekta) lenteliu                    
                        $query = 'SELECT person_id, Vardas, Pavardė, Telefonas,
                        (SELECT Pavadinimas FROM projektai WHERE personalas.pro_id = projektai.pro_id) as Projektas
                        FROM personalas 
                        ORDER BY person_id';
                        $result = mysqli_query($jungtis, $query) or die (mysqli_error($jungtis));
                
                        while ($row = mysqli_fetch_assoc($result)) {                
                            echo '<tr>';
                            echo '<td>'. $row['Vardas'].'</td>';
                            echo '<td>'. $row['Pavardė'].'</td>';
                            echo '<td>'. $row['Telefonas'].'</td>';
                            echo '<td>'. $row['Projektas'].'</td>';
                            // pridedame irasu perziuros, redagavimo, trynimo mygtukus
                            echo '<td> <a class="btn btn-xs view" href="view.php?action=edit & id='.$row['person_id'] . '" > Peržiūrėti </a> ';
                            echo ' <a class="btn btn-xs edit" href="edit.php?action=edit & id='.$row['person_id'] . '"> Redaguoti </a> ';
                            echo ' <a class="btn btn-xs delete" href="delete.php?type=personalas&delete & id=' . $row['person_id'] . '"> Trinti </a> </td>';
                            echo '</tr> ';
                        }
                        mysqli_close($jungtis);
                        ?> 
                                    
                    </tbody>
                </table>
            </div>
        </div>
        <!-- col-lg-12 -->
    </main>
    <footer>
        <div>
            D.Kulvinskas
        </div>
        <div>
            2020-ieji, 41 karantino diena
        </div>
        <div>
            <a href="http://donatas.site">Asmeninis studento puslapis</a>
        </div>
        <div>
            Kopijuoti ir platinti nedraudžiama
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>