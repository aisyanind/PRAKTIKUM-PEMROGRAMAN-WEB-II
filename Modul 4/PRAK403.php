<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4 Soal 3</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;}
        table{
            width: 700px;}
        table tr th{
            background-color: #C0C0C0;
            text-align: left;}
    </style>
</head>
<body>
    <?php
        $nilai = [
            ["no" => 1, "nama" => "Ridho", "matakuliah" => [
                ["namamatkul" =>"Pemrograman I", "sks" => 2], 
                ["namamatkul" => "Praktikum Pemrograman I", "sks" => 1],
                ["namamatkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2], 
                ["namamatkul" => "Arsitektur Komputer", "sks" => 3]]],
            ["no" => 2, "nama" => "Ratna", "matakuliah" => [
                ["namamatkul" =>"Basis Data I", "sks" => 2], 
                ["namamatkul" => "Praktikum Basis Data I", "sks" => 1],
                ["namamatkul" => "Kalkulus", "sks" => 3]]],
            ["no" => 3, "nama" => "Tono", "matakuliah" => [
                ["namamatkul" => "Rekayasa Perangkat Lunak", "sks" => 3], 
                ["namamatkul" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["namamatkul" => "Komputasi Awan", "sks" => 3], 
                ["namamatkul" => "Kecerdasan Bisnis", "sks" => 3]]]];
        for ($i=0; $i < count($nilai); $i++){
            $totalSKS = 0;
            for ($j=0; $j < count($nilai[$i]["matakuliah"]); $j++) {
                $totalSKS += $nilai[$i]["matakuliah"][$j]["sks"];}
            $nilai[$i]["totalSKS"] = $totalSKS;
            if ($nilai[$i]["totalSKS"] < 7) {
                $nilai[$i]["keterangan"] = "Revisi KRS";} 
            else {
                $nilai[$i]["keterangan"] = "Tidak Revisi";}}
        ?>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php
        for ($i=0; $i < count($nilai); $i++) {
            for ($j=0; $j < count($nilai[$i]["matakuliah"]); $j++) {
                echo "<tr>";
                if ($j == 0) {
                    echo "<td>".$nilai[$i]["no"]."</td>";
                    echo "<td>".$nilai[$i]["nama"]."</td>";
                    echo "<td>".$nilai[$i]["matakuliah"][$j]["namamatkul"]."</td>";
                    echo "<td>".$nilai[$i]["matakuliah"][$j]["sks"]."</td>";
                    echo "<td>".$nilai[$i]["totalSKS"]."</td>";
                    if ($nilai[$i]["keterangan"] == "Revisi KRS"){
                        echo '<td style="background-color: #ff0000;">'.$nilai[$i]["keterangan"]."</td>";} 
                    else {
                        echo '<td style="background-color: #32CD32;">'.$nilai[$i]["keterangan"]."</td>";}} 
                else {
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>".$nilai[$i]["matakuliah"][$j]["namamatkul"]."</td>";
                    echo "<td>".$nilai[$i]["matakuliah"][$j]["sks"]."</td>";
                    echo "<td></td>";
                    echo "<td></td>";}
                echo "</tr>";}}
        ?>
        </table>
</body>
</html>