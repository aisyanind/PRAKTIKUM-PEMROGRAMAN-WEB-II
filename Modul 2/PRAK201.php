<?php
$nama_terkecil = "";
$nama_menengah = "";
$nama_terbesar = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama1 = $_POST['nama1'];
  $nama2 = $_POST['nama2'];
  $nama3 = $_POST['nama3'];

  if ($nama1 < $nama2 && $nama1 < $nama3) {
    $nama_terkecil = $nama1;
    if ($nama2 < $nama3) {
      $nama_menengah = $nama2;
      $nama_terbesar = $nama3;} 
      else {
      $nama_menengah = $nama3;
      $nama_terbesar = $nama2;}} 
      
  elseif ($nama2 < $nama1 && $nama2 < $nama3) {
    $nama_terkecil = $nama2;
    if ($nama1 < $nama3) {
      $nama_menengah = $nama1;
      $nama_terbesar = $nama3;} 
      else {
      $nama_menengah = $nama3;
      $nama_terbesar = $nama1;}} 
      else {
    $nama_terkecil = $nama3;
    if ($nama1 < $nama2) {
      $nama_menengah = $nama1;
      $nama_terbesar = $nama2;} 
      else {
      $nama_menengah = $nama2;
      $nama_terbesar = $nama1;}}}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pengurutan Nama</title>
</head>
<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $nama_terkecil === "") {
  ?>
  <p>Hasil yang diinginkan:</p>
  <form method="post">
    <label for="nama1">Nama 1:</label>
    <input type="text" name="nama1" id="nama1" required><br><br>
    <label for="nama2">Nama 2:</label>
    <input type="text" name="nama2" id="nama2" required><br><br>
    <label for="nama3">Nama 3:</label>
    <input type="text" name="nama3" id="nama3" required><br><br>
    <button type="submit">Urutkan</button>
  </form>
  <?php
  } 
  else {
    echo "<p>$nama_terkecil</p>";
    echo "<p>$nama_menengah</p>";
    echo "<p>$nama_terbesar</p>";}
  ?>
</body>
</html>