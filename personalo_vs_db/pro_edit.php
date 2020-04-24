<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
  <header>
    <a href="index.php">Personalas</a>
    <a href="pro_index.php">Projektai</a>
    <h1>Projektų valdymo sistema </h1>
  </header>              
  <?php 
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
      }
      
      $id = $_GET['id'];     
  ?>
  <main>
    <div class="col-lg-12">
      <h3>Redaguoti duomenis</h3>
      <div class="col-lg-6">
        <form role="form" method="post" action="pro_edit1.php">
          <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $prid; ?>" />
          </div>
          <div class="form-group">
            <label for="pavadinimas">Projekto pavadinimas</label>
            <input class="form-control" placeholder="Pavadinimas" name="pavadinimas" value="<?php echo $name; ?>">
          </div>
          <div class="form-group">
            <label for="paskirtis">Projekto paskirtis</label>
            <input class="form-control" placeholder="Paskirtis" name="paskirtis" value="<?php echo $purpose; ?>">
          </div> 
          <div class="form-group">
            <label for="data">Realizavimo pradžios data</label>
            <input class="form-control" placeholder="Realizavimo pradžios data" name="data" value="<?php echo $sdate; ?>">
          </div>
          <button type="submit" class="btn edit">Atnaujinti duomenis</button>
        </form>  
      </div>
    </div>
  </main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
</body>
</html>