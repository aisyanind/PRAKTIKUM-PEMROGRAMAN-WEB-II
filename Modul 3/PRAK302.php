<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form method="post">
      Tinggi : <input type="text" name="tinggi" id="tinggi" <?php if(isset($_POST['tinggi'])) { echo 'value="' . $_POST['tinggi'] . '"'; } ?>><br>
      Alamat Gambar : <input type="text" name="img" id="img" <?php if(isset($_POST['img'])) { echo 'value="' . $_POST['img'] . '"'; } ?>><br>
      <button type="submit" name="submit">Cetak</button>
    </form>
    <br>
</body>
</html>
<?php
    if(isset($_POST["submit"])) {
    $tinggi = $_POST["tinggi"];
    $i = 1; $j = 1;
    $k = $tinggi;
    $img = $_POST['img'];
    while($i <= $tinggi) {
        while($j < $i) {
          echo"<img src='" .$img. "' style='width: 25px; opacity: 0'>";
          $j++;}
        while($k >= $i) {
          echo "<img src='" .$img. "' style='width: 25px'>";
          $k--;}
          echo"<br>";
          $j = 1;
          $k = $tinggi;
          $i++;
        }
    }
?>