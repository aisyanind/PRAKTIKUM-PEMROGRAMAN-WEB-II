<!DOCTYPE html>
<html>
<head>
    <style>
        .hijau {
            color: green;}
        .merah {
            color: red;}
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;}
        input[type="number"] {
            -moz-appearance: textfield;}
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="jumlah_peserta">Jumlah Peserta:</label>
        <?php
        $jumlahPeserta = isset($_POST['jumlah_peserta']) ? $_POST['jumlah_peserta'] : '';
        ?>
        <input type="number" id="jumlah_peserta" name="jumlah_peserta" min="1" value="<?php echo $jumlahPeserta; ?>" required><br>
        <button type="submit">Cetak</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlahPeserta = $_POST['jumlah_peserta'];
        $i = 1;
        while ($i <= $jumlahPeserta) {
            $warna = ($i % 2 == 0) ? 'hijau' : 'merah';
            echo "<h2 class='$warna'>Peserta ke-$i</h2>";
            $i++;}}
    ?>
</body>
</html>