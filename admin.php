<?php include_once 'header.php'; ?>

<?php


if (isset($_POST['delete'])) {
  if (isset($_POST['delete-id-tabla'])) { 
    $id = $_POST['delete-id-tabla'];
    $db->delete("tablesah", "id", $id);
  } else if (isset($_POST['delete-id-figura'])) {
    $id = $_POST['delete-id-figura'];
    $db->delete("figure", "id", $id);
  }
}


$db->select("tablesah", $rows = "*", null, null, null);
$tablesah = $db->getResult()->fetch_all(MYSQLI_ASSOC);

$db->select("figure", $rows = "*", null, null, null);
$figure = $db->getResult()->fetch_all(MYSQLI_ASSOC);

?>

<section id="stolovi" class="container">
  <h1 class="text-center my-5">TABLE
    <hr>
  </h1>
  <table class="table table-sm table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naziv</th>
        <th scope="col">Drvo</th>
        <th scope="col">Cena</th>
        <th scope="col">Opis</th>
      </tr>
    </thead>
    <tbody>
      <?php $counter = 1;
      foreach ($tablesah as $tabla) : ?>
        <tr>
          <th scope="row"><?php echo $counter++; ?></th>
          <td><?php echo $tabla['naziv']; ?></td>
          <td><?php echo $tabla['drvo']; ?></td>
          <td><?php echo $tabla['cena']; ?></td>
          <td><?php echo substr($tabla['opis'], 0, 40) . "..."; ?></td>
          <td class="text-center text-danger"><a href="izmeniTablu.php?id=<?php echo $tabla['id']; ?>">CHANGE</a></td>
          <form method="POST">
            <input type="hidden" name="delete-id-tabla" value="<?php echo $tabla['id']; ?>">
            <td class="text-center text-danger"><button class="delete-btn" name="delete" type="submit">DELETE</button></td>
          </form>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="dodajTablu.php" class="btn btn-dark">DODAJ TABLU</a>
</section>

<section id="figure" class="container mb-5">
  <h1 class="text-center my-5">FIGURE
    <hr>
  </h1>
  <table class="table table-sm table-hover table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Naziv</th>
        <th scope="col">Drvo</th>
        <th scope="col">Cena</th>
        <th scope="col">Opis</th>
      </tr>
    </thead>
    <tbody>
      <?php $counter = 1;
      foreach ($figure as $figura) : ?>
        <tr>
          <th scope="row"><?php echo $counter++; ?></th>
          <td><?php echo $figura['naziv']; ?></td>
          <td><?php echo $figura['drvo']; ?></td>
          <td><?php echo $figura['cena']; ?></td>
          <td><?php echo substr($figura['opis'], 0, 40) . "..."; ?></td>
          <td class="text-center text-warning"><a href="izmeniFiguru.php?id=<?php echo $figura['id']; ?>">CHANGE</a></td>
          <form method="POST">
            <input type="hidden" name="delete-id-figura" value="<?php echo $figura['id']; ?>">
            <td class="text-center"><button class="delete-btn" name="delete" type="submit">DELETE</button></td>
          </form>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="dodajFiguru.php" class="btn btn-dark">DODAJ FIGURU</a>
</section>

<?php include_once 'footer.php'; ?>