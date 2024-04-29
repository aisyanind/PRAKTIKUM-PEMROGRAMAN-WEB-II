<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        Batas Bawah : <input type="text" name="bawah" <?php if(isset($_POST['bawah'])) { echo 'value="' . $_POST['bawah'] . '"'; } ?>><br>
        Batas Atas : <input type="text" name="atas" <?php if(isset($_POST['atas'])) { echo 'value="' . $_POST['atas'] . '"'; } ?>><br>
        <input type="submit" name="submit" value="Cetak">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $bawah = $_POST['bawah'];
    $atas = $_POST['atas'];
    $i = $bawah;
    do {
        if (($i + 7) % 5 == 0) {
            echo "<img src='Bintang.png' width='15px' height='15px'>";}
        else {
            echo $i;}
        echo "&nbsp";
        $i++;}
    while ($i <= $atas);}
?>