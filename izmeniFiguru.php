<?php include_once 'header.php'; ?>

<?php

if ($_GET['id']) {
  $id = $_GET['id'];
  $db->select("figure", "*", null, null, null, "id = '$id'");
  $figura = $db->getResult()->fetch_array();
} else {
  header("Location: index.php");
}

if (isset($_POST['update-figuru'])) {
  $errors = [];
  $values = [];
  $keys = [];

  $naziv =   $_POST['naziv'];
  $drvo =   $_POST['drvo'];
  $slika =   $_POST['slika'];
  $opis =   $_POST['opis'];
  $cena =   $_POST['cena'];

  
  

  if (empty($naziv) || empty($drvo) || empty($opis) || empty($cena) || empty($slika)) {
    array_push($errors, "Niste popunili sva polja!");
  }

  


  if (count($errors) == 0) {
    array_push($keys, "naziv", "drvo", "cena", "slika", "opis");
    array_push($values, $naziv, $drvo, $cena, $slika, $opis);
    $db->update("figure", $id,  $keys, $values);
    header("Location: admin.php");
  }
}

?>

<section id="update-figuru" class="my-5">
  <div class="container">
    <h1 class="text-center mb-5">IZMENI FIGURU <br>
      "<?php echo $figura['drvo'] . " " . $figura['naziv']; ?>"
      <hr>
    </h1>
    <div id="errors" class="text-center text-danger mb-5">
      <?php
      if (isset($errors)) {
        foreach ($errors as $error) {
          echo $error . "<br>";
        }
      }
      ?>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 offset-md-3 offset-sm-3">
        <form method="POST">
          <div class="form-group">
            <label for="naziv">Naziv</label>
            <input type="text" class="form-control" id="naziv" value="<?php if (isset($naziv)) echo $naziv; ?>" name="naziv">
          </div>
          
          <div class="form-group">
            <label for="tipIgre">Drvo</label>
            <input type="text" class="form-control" id="drvo" value="<?php if (isset($drvo)) echo $drvo; ?>" name="drvo">
          </div>

          <div class="form-group">
            <label for="slika">Slika URL</label>
            <input type="text" class="form-control" value="<?php if (isset($slika)) echo $slika; ?>" name="slika" id="slika">
          </div>

          <div class="form-group">
            <label for="Opis">Opis</label>
            <textarea class="form-control" id="opis" rows="3" name="opis"><?php if (isset($opis)) echo $opis; ?></textarea>
          </div>

          <div class="form-group">
            <label for="cena">Cena</label>
            <input type="number" class="form-control" id="cena" value="<?php if (isset($cena)) echo $cena; ?>" name="cena">
          </div>


          <button type="submit" name="update-figuru" class="btn btn-primary w-100">IZMENI FIGURU</button>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>