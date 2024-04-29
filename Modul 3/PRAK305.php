<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        <input type="text" name="teks" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $teks = $_POST['teks'];
    $p = strlen($teks);
    $input = str_split($teks);
    $output = "";
    for ($i = 0; $i < $p; $i++) {
        $output .= strtoupper($input[$i]);
        for ($j = 1; $j < $p; $j++) {
            $output .= strtolower($input[$i]);}}
    echo "<h2> Input: </h2>" .$_POST['teks'];
    echo "<h2> Output: </h2>" .$output;
}
?>