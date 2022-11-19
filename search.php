<?php

require_once 'dbbroker.php';
$db = new Database("iteh_pesah");


if (isset($_POST['unetTekst'])) {
  $unetTekst = $_POST['unetTekst'];

  $db->select($_POST['table'], $rows = "*", null, null, null, "naziv LIKE '%$unetTekst%' OR drvo LIKE '%$unetTekst%'");
  $rezultat = $db->getResult()->fetch_all(MYSQLI_ASSOC);

  echo json_encode($rezultat);
}
