<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<!-- apsirasau projekto (iraso is lenteles projektai) perziura -->
<body>
  <header>
    <a href="index.php">Personalas</a>
    <a href="pro_index.php">Projektai</a>
    <h1>Projektų valdymo sistema </h1>
  </header>
  <main>
  <?php
  //pasiimame atskiro projekto iraso duomenis is lenteles projektai duomenu bazeje 
  $query = 'SELECT * FROM projektai
    WHERE
    pro_id ='.$_GET['id'];
    $result = mysqli_query($serveris, $query) or die(mysqli_error($serveris));
    while($row = mysqli_fetch_array($result))
    {   
      $prid= $row['pro_id'];
      $name= $row['Pavadinimas'];
      $purpose=$row['Paskirtis'];
      $sdate=$row['Realizavimo_pradžia'];
      $manager=$row['Atsakingas_personalas'];
    }
    $id = $_GET['id'];       
?>
    <div class="col-lg-12">
      <h3>Detali peržiūra</h3>
      <div class="col-lg-6">
        <form role="form" method="post" action="pro_index.php">
          <!-- uzsipildom forma gautais is duomenu bazes irasais -->
          <div class="form-group">
            <input class="form-control" placeholder="Pavadinimas" name="pavadinimas" value="<?php echo $name; ?>">
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Projekto paskirtis" name="paskirtis" value="<?php echo $purpose; ?>">
          </div> 
          <div class="form-group">
            <input class="form-control" placeholder="Projekto realizavimo pradžios data" name="data" value="<?php echo $sdate; ?>">
          </div> 
          <div class="form-group">
            <input class="form-control" placeholder="Atsakingas personalas" name="atsakingas" value="<?php echo $manager; ?>">
          </div>   
          <button type="submit" class="btn view">Grįžti atgal į projektų lentelę</button>
        </form>  
      </div>
    </div>   
  </main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

