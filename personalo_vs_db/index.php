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
                            <th>ID</th>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>Telefonas</th>
                            <th>Priskirtas projektas</th>
                            <th>Įrašų redagavimas</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <!-- apsirasome lenteles pildyma php kodo pagalba is duomenu bazes -->
                        <?php                  
                        $query = 'SELECT * FROM personalas';
                        $result = mysqli_query($serveris, $query) or die (mysqli_error($serveris));
                
                        while ($row = mysqli_fetch_assoc($result)) {                
                            echo '<tr>';
                            echo '<td>'. $row['person_id'].'</td>';
                            echo '<td>'. $row['Vardas'].'</td>';
                            echo '<td>'. $row['Pavardė'].'</td>';
                            echo '<td>'. $row['Telefonas'].'</td>';
                            echo '<td>'. $row['Priskirtas_projektas'].'</td>';
                            // pridedame irasu perziuros, redagavimo, trynimo mygtukus
                            echo '<td> <a class="btn btn-xs view" href="view.php?action=edit & id='.$row['person_id'] . '" > Peržiūrėti </a> ';
                            echo ' <a class="btn btn-xs edit" href="edit.php?action=edit & id='.$row['person_id'] . '"> Redaguoti </a> ';
                            echo ' <a class="btn btn-xs delete" href="delete.php?type=personalas&delete & id=' . $row['person_id'] . '"> Trinti </a> </td>';
                            echo '</tr> ';
                        }
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
            2020-ieji, 37 karantino diena
        </div>
        <div>
            <a href="http://donatas.site">Asmeninis studento puslapis</a>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>