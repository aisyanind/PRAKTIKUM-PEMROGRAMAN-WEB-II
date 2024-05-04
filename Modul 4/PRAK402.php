<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4 Soal 2</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;
            padding-right: 20px;}
    </style>
</head>
<body>
    <table>
        <tr style="background-color: #C0C0C0;">
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php
        $data = [
            ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
            ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
            ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
            ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75],];
        foreach ($data as &$mahasiswa) {
            $mahasiswa["akhir"] = $mahasiswa["uts"] * 0.4 + $mahasiswa["uas"] * 0.6;
            $mahasiswa["huruf"] = ($mahasiswa["akhir"] >= 80) ? "A" : (($mahasiswa["akhir"] >= 70) ? "B" : (($mahasiswa["akhir"] >= 60) ? "C" : (($mahasiswa["akhir"] >= 50) ? "D" : "E")));
            echo "<tr>";
            foreach ($mahasiswa as $key => $value) {
                echo "<td>".$value."</td>";}
            echo "</tr>";}
        ?>
    </table>
</body>
</html>