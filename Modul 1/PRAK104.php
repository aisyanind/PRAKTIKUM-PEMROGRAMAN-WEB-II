<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        h1 {
            text-align: center;}
        table, td {
            border: 1px solid black;}
    </style>
</head>
<body>
    <table>
        <tr>
            <td><b>Daftar Smartphone Samsung</b></td>
        </tr>
        <?php
        $daftar_smartphone = array(
            "Samsung Galaxy S22",
            "Samsung Galaxy S22+",
            "Samsung Galaxy A03",
            "Samsung Galaxy Xcover 5");
            
        foreach ($daftar_smartphone as $smartphone) {
            echo "<tr><td>$smartphone</td></tr>";}
        ?>
    </table>
</body>
</html>