<?php
    $r = 4.2;
    $tinggi = 5.4;
    $panjang = 8.9; 
    $lebar = 14.7; 
    
    $volume_prisma_segitiga = round((($panjang * $lebar) / 2) * $tinggi, 3);
    
    echo "$volume_prisma_segitiga m3";
?>