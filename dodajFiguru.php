<?php include_once 'header.php'; ?>

<?php

if (isset($_POST['dodaj-figuru'])) {
  $errors = [];
  $values = [];

  $naziv = $_POST['naziv'];
  $drvo = $_POST['drvo'];
  $slika = $_POST['slika'];
  $opis = $_POST['opis'];
  $cena = $_POST['cena'];
  $tabla_id = $_POST['tabla_id'];

  $db->select("tablesah", $rows = "id", null, null, null);
  $tablesah_id = $db->getResult()->fetch_all(MYSQLI_ASSOC);
  $svi_id = array();
  foreach($tablesah_id as $id_tabla){
    array_push($svi_id, $id_tabla['id']);
  }  
  

  if (empty($naziv) || empty($opis) || empty($cena) || empty($slika) || empty($drvo) || empty($tabla_id)) {
    array_push($errors, "Niste popunili sva polja!");
  }

  if(!in_array($tabla_id, $svi_id)){
    array_push($errors, "Niste uneli dobar spoljni kljuc ka tabeli table");
  }

  if (count($errors) == 0) {
    array_push($values, $naziv, $drvo, $cena, $slika, $opis, $tabla_id);
    $db->insert("figure", "naziv, drvo, cena, slika, opis, tabla_id", $values);
    header("Location: admin.php");
  }

  

}

?>

<section id="dodaj-figuru" class="my-5">
  <div class="container">
    <h1 class="text-center mb-5">DODAJ FIGURU
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
            <label for="naziv">Drvo</label>
            <input type="text" class="form-control" id="naziv" value="<?php if (isset($drvo)) echo $drvo; ?>" name="drvo">
          </div>

          <div class="form-group">
            <label for="img">Slika URL</label>
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

          <div class="form-group">
            <label for="tabla_id">Tabla</label>
            <input type="number" class="form-control" id="tabla_id" value="<?php if (isset($tabla_id)) echo $tabla_id; ?>" name="tabla_id">
          </div>


          <button type="submit" name="dodaj-figuru" class="btn btn-primary w-100">DODAJ FIGURU</button>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>