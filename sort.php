<?php

require_once 'dbbroker.php';
$db = new Database("iteh_pesah");


if (isset($_POST['vrstaSorta'])) {
  $vrstaSorta = $_POST['vrstaSorta'];
  $db->select($_POST['table'], $rows = "*", null, null, null, null, $vrstaSorta);
  $rezultat = $db->getResult()->fetch_all(MYSQLI_ASSOC);

  echo json_encode($rezultat);
}
