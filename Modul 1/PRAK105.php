<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        h1 {
            text-align: center;}

        .judul {
            font-size: 24px; 
            font-weight: normal; 
            background-color: red; }

        table, td {
            border: 1px solid black;}
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="judul"><span style="font-weight: bold;">Daftar Smartphone Samsung</span></td>
        </tr>
        <?php
        $daftar_smartphone = array( 
            1 => "Samsung Galaxy S22", 
            2 => "Samsung Galaxy S22+", 
            3 => "Samsung Galaxy A03", 
            4 => "Samsung Galaxy Xcover 5");
        
        foreach ($daftar_smartphone as $nama) {
            echo "<tr><td>$nama</td></tr>";}
        ?>
    </table>
</body>
</html>