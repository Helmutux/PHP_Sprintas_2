<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    if($jungtis->connect_errno)exit('Klaida, jungiantis prie serverio');
?>
<!-- apsirasau darbuotojo (iraso is lenteles personalas) perziura -->
<body>
  <header>
    <a href="index.php">Personalas</a>
    <a href="pro_index.php">Projektai</a>
    <h1>Personalo valdymo sistema </h1>
  </header>
  <main>           
  <?php 
    //pasiimame atskiro darbuotojo iraso duomenis is lenteles personalas duomenu bazeje 
    $query = 'SELECT person_id, Vardas, Pavardė, Telefonas,
      (SELECT Pavadinimas FROM projektai WHERE personalas.pro_id = projektai.pro_id) as Projektas,
      (SELECT pro_id FROM projektai WHERE personalas.pro_id = projektai.pro_id) as projekto_id
      FROM personalas 
      WHERE
      person_id ='.$_GET['id'];
      $result = mysqli_query($jungtis, $query) or die(mysqli_error($jungtis));
      while($row = mysqli_fetch_array($result))
      {   
        $pid= $row['person_id'];
        $name= $row['Vardas'];
        $surname=$row['Pavardė'];
        $phone=$row['Telefonas'];
        $project=$row['Projektas'];
        $pro_id=$row['projekto_id'];
      }
      $id = $_GET['id'];
      
      mysqli_close($jungtis);
  ?>
    <div class="col-lg-12">
      <h3>Detali peržiūra</h3>
      <div class="col-lg-6">
        <form role="form" method="post" action="index.php">
          <!-- uzsipildom forma gautais is duomenu bazes irasais -->
          <div class="form-group">
              <label for="person_id">Personalo unikalus ID</label>
              <input class="form-control" name="person_id" value="<?php echo $pid; ?>">
            </div>
            <div class="form-group">
            <label for="vardas">Vardas</label>
              <input class="form-control" name="vardas" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
            <label for="pavarde">Pavardė</label>
              <input class="form-control" name="pavarde" value="<?php echo $surname; ?>">
            </div> 
            <div class="form-group">
              <label for="telefonas">Telefonas</label>
              <input class="form-control" name="telefonas" value="<?php echo $phone; ?>">
            </div> 
            <div class="form-group">
            <label for="project">Priskirtas projektas</label>
              <input class="form-control" name="project" value="<?php echo $project; ?>">
            </div>
            <div class="form-group">
              <label for="pro_id">Priskirto projekto unikalus ID</label>
              <input class="form-control" name="pro_id" value="<?php echo $pro_id; ?>">
            </div>      
            <button type="submit" class="btn view">Grįžti atgal į personalo lentelę</button>
        </form>  
      </div>
    </div>
  </main>  
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

