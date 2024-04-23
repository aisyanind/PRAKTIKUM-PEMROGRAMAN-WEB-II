<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <table>
            <tr>
                <td>Nilai:</td>
                <td><input type="number" name="bilangan" value="<?php echo isset($_POST['bilangan']) ? htmlspecialchars($_POST['bilangan']) : ''; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Konversi</button></td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['bilangan'])) {
            $bilangan = $_POST['bilangan'];
            $ejaan = '';
            if ($bilangan < 0 || $bilangan > 999) {
                echo "<p>Anda Menginput Melebihi Limit Bilangan</p>";} 
                else {
                if ($bilangan == 0) {
                    $ejaan = 'nol';} 
                elseif ($bilangan >= 1 && $bilangan <= 9) {
                    $ejaan = 'satuan';} 
                elseif ($bilangan == 10 || ($bilangan >= 20 && $bilangan <= 99)) {
                    $ejaan = 'puluhan';} 
                elseif ($bilangan >= 11 && $bilangan <= 19) {
                    $ejaan = 'belasan';} 
                elseif ($bilangan >= 100 && $bilangan <= 999) {
                    $ejaan = 'ratusan';}
                echo "<p>Hasil: $ejaan</p>";
            }
        }
    }
    ?>
</body>
</html>