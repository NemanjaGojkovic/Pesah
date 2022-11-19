<?php include_once 'header.php'; ?>

<?php

if (isset($_POST['dodaj-tablu'])) {
  $erros = [];
  $values = [];

  $naziv = $_POST['naziv'];
  $drvo = $_POST['drvo'];
  $slika = $_POST['slika'];
  $opis = $_POST['opis'];
  $cena = $_POST['cena'];
  

  if (empty($naziv) || empty($opis) || empty($cena) || empty($slika) || empty($drvo)) {
    array_push($erros, "Niste popunili sva polja!");
  }

  if (count($erros) == 0) {
    array_push($values, $naziv, $drvo, $cena, $slika, $opis);
    $db->insert("tablesah", "naziv, drvo, cena, slika, opis", $values);
    header("Location: admin.php");
  }
}

?>

<section id="dodaj-tablu" class="my-5">
  <div class="container">
    <h1 class="text-center mb-5">DODAJ TABLU
      <hr>
    </h1>
    <div id="errors" class="text-center text-danger mb-5">
      <?php
      if (isset($erros)) {
        foreach ($erros as $error) {
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


          <button type="submit" name="dodaj-tablu" class="btn btn-primary w-100">DODAJ TABLU</button>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>