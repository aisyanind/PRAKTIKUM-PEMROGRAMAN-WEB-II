<?php
    $tinggi_prisma = 5.4;
    $sisi = 7.9;
    
    $alas = $sisi;
    $tinggi = round(sqrt($sisi * $sisi - (($sisi / 2) * ($sisi / 2))), 2);
    $volume_prisma_segitiga = round((0.5 * $alas * $tinggi) * $tinggi_prisma, 3);
    
    echo "$volume_prisma_segitiga m3";
?>
