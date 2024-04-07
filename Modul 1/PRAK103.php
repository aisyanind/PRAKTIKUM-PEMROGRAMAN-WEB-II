<?php
    $celcius = 37.841;

    $fahrenheit = round((($celcius * 9)/5)+32, 4);
    $reamur = round(($celcius * 4)/5, 4);
    $kelvin = round($celcius + 273.15, 4);

    echo "Fahrenheit (F) = $fahrenheit <br>";
    echo "Reamur (R) = $reamur <br>";
    echo "Kelvin (K) = $kelvin <br>"
?>