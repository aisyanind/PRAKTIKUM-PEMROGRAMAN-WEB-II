<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</html>
<?php
    $bintang = NULL;
    $picture = "<img style='width: 70px;' src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png'>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bintang = $_POST['bintang'];}
    if (isset($_POST['tambah'])) {
        $bintang += 1;}
    if (isset($_POST['kurang'])) {
        $bintang -= 1;}
    if (empty($bintang)) { ?>
        <form method="post">
            Jumlah Bintang : <input type="text" name="bintang"></br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php } 
    ?>
    <?php if (!empty($bintang)) {
        echo "Jumlah Bintang : $bintang "; ?>
        <br><br>
        <?php for ($i = 0; $i < $bintang; $i++) {
            echo "$picture";} 
            ?>
        <form method="post">
            <input type="text" name="bintang" value="<?= $bintang ?>" hidden>
            <button type="submit" name="tambah" value="tambah">Tambah</button>
            <button type="submit" name="kurang" value="kurang">Kurang</button>
        </form>
    <?php } 
?>