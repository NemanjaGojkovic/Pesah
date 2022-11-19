<?php
require_once "dbbroker.php";
$db = new Database("iteh_pesah");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesah</title>
    <link rel="stylesheet" href="fajlovi/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
    <a href="index.php"><img src="slike/logo.png" class="logoNavbar"></a>
    

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php" style="color: white; opacity: 0.5;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" onmouseover="this.style.fontSize='20px'; this.style.transition='linear 0.2s'; this.style.opacity='1'"
           onmouseout="this.style.transition='linear 0.2s'; this.style.fontSize='16px'; this.style.opacity='0.5'">Pocetna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="figure.php" style="color: white; opacity: 0.5;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" onmouseover="this.style.fontSize='20px'; this.style.transition='linear 0.2s'; this.style.opacity='1'"
           onmouseout="this.style.transition='linear 0.2s'; this.style.fontSize='16px'; this.style.opacity='0.5'">Figure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="table.php" style="color: white; opacity: 0.5;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" onmouseover="this.style.fontSize='20px'; this.style.transition='linear 0.2s'; this.style.opacity='1'"
           onmouseout="this.style.transition='linear 0.2s'; this.style.fontSize='16px'; this.style.opacity='0.5'">Table</a>
        </li>
    </div>
  </nav>