<?php include_once 'header.php'; ?>
<br>

<div id = "sortirajdiv" class="text-center d-flex flex-wrap" style=" align-items: center; margin-left: 35%;">
  <label for="exampleFormControlSelect1" class="mr-3"><b>Sortiraj</b></label>
  <select class="form-control mr-3" style="width: 150px;" id="exampleFormControlSelect1">
    <option></option>
    <option value="cena">Ceni</option>
  </select>
  <form id="search-form1" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" id="search-input" type="search" placeholder="Pretraga..." aria-label="Search">
    <button class="btn btn-dark my-2 my-sm-0" type="submit">Pretrazi</button>
  </form>
</div>


<?php

$db->select("figure", $rows = "*", null, null, null);
$figure = $db->getResult()->fetch_all(MYSQLI_ASSOC);

?>

<section id="figure" class="mb-5">
  <div class="container">
    <div class="row" id="figure-container">

      <?php foreach ($figure as $figura) : ?>

        <div class="col-md-4 col-sm-6 col-12 mt-4">
          <div class="card" style="box-sizing: border-box; border-radius: 5%;">
            <div class="card-slika">
              <img src="<?php echo $figura['slika']; ?>" alt="" style="max-height: 255px; max-width: 333px; width: 100%; height: auto;">
            </div>
            <div class="card-sadrzaj">
              <h4 class="card-naziv"><?php echo $figura['drvo'] . " " . $figura['naziv']; ?></h4>
              <p class="card-cena" style="color: black; font-weight: 700;">Cena: <?php echo $figura['cena']; ?> €</p>
              <p class="card-opis"><?php echo substr($figura['opis'], 0, 250); ?></p>
            </div>
          </div>
        </div>

      <?php endforeach; ?>


    </div>
  </div>
</section>

<?php include_once 'footer.php'; ?>