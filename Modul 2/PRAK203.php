<?php
function celciusToFahrenheit($celsius) {
  return $celsius * 9 / 5 + 32;}

function celciusToReamur($celsius) {
  return $celsius * 4 / 5;}

function celciusToKelvin($celsius) {
  return $celsius + 273.15;}

function fahrenheitToCelcius($fahrenheit) {
  return ($fahrenheit - 32) * 5 / 9;}

function fahrenheitToReamur($fahrenheit) {
  return ($fahrenheit - 32) * 4 / 9;}

function fahrenheitToKelvin($fahrenheit) {
  return ($fahrenheit - 32) * 5 / 9 + 273.15;}

function reamurToCelcius($reamur) {
  return $reamur * 5 / 4;}

function reamurToFahrenheit($reamur) {
  return $reamur * 9 / 4 + 32;}

function reamurToKelvin($reamur) {
  return $reamur * 5 / 4 + 273.15;}

function kelvinToCelcius($kelvin) {
  return $kelvin - 273.15;}

function kelvinToFahrenheit($kelvin) {
  return ($kelvin - 273.15) * 9 / 5 + 32;}

function kelvinToReamur($kelvin) {
  return ($kelvin - 273.15) * 4 / 5;}

function main() {
  $nilaiAwal = isset($_POST['nilaiAwal']) ? $_POST['nilaiAwal'] : '';
  $satuanAwal = isset($_POST['satuanAwal']) ? $_POST['satuanAwal'] : 'C';
  $satuanHasil = isset($_POST['satuanHasil']) ? $_POST['satuanHasil'] : 'C';
  echo "<h2>Konversi Suhu</h2>";
  echo "<form method='post'>";
  echo "<label for='nilaiAwal'>Nilai : </label>";
  echo "<input type='number' id='nilaiAwal' name='nilaiAwal' value='$nilaiAwal' required><br>";
  echo "<label for='satuanAwal'>Dari :</label><br>";
  echo "<input type='radio' id='celcius' name='satuanAwal' value='C' " . ($satuanAwal == 'C' ? 'checked' : '') . ">";
  echo "<label for='celcius'>Celcius</label><br>";
  echo "<input type='radio' id='fahrenheit' name='satuanAwal' value='F' " . ($satuanAwal == 'F' ? 'checked' : '') . ">";
  echo "<label for='fahrenheit'>Fahrenheit</label><br>";
  echo "<input type='radio' id='reamur' name='satuanAwal' value='Re' " . ($satuanAwal == 'Re' ? 'checked' : '') . ">";
  echo "<label for='reamur'>Reamur</label><br>";
  echo "<input type='radio' id='kelvin' name='satuanAwal' value='K' " . ($satuanAwal == 'K' ? 'checked' : '') . ">";
  echo "<label for='kelvin'>Kelvin</label><br>";
  echo "<label for='satuanHasil'>Ke :</label><br>";
  echo "<input type='radio' id='celcius' name='satuanHasil' value='C' " . ($satuanHasil == 'C' ? 'checked' : '') . ">";
  echo "<label for='celcius'>Celcius</label><br>";
  echo "<input type='radio' id='fahrenheit' name='satuanHasil' value='F' " . ($satuanHasil == 'F' ? 'checked' : '') . ">";
  echo "<label for='fahrenheit'>Fahrenheit</label><br>";
  echo "<input type='radio' id='reamur' name='satuanHasil' value='Re' " . ($satuanHasil == 'Re' ? 'checked' : '') . ">";
  echo "<label for='reamur'>Reamur</label><br>";
  echo "<input type='radio' id='kelvin' name='satuanHasil' value='K' " . ($satuanHasil == 'K' ? 'checked' : '') . ">";
  echo "<label for='kelvin'>Kelvin</label><br>";
  echo "<button type='submit'>Konversi</button>";
  echo "</form>";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nilaiAwal'], $_POST['satuanAwal'], $_POST['satuanHasil'])) {
      $nilaiAwal = $_POST['nilaiAwal'];
      $satuanAwal = $_POST['satuanAwal'];
      $satuanHasil = $_POST['satuanHasil'];
      switch ($satuanAwal) {
        case 'C':
          if ($satuanHasil === 'F') {
            $hasil = celciusToFahrenheit($nilaiAwal);} 
            elseif ($satuanHasil === 'Re') {
            $hasil = celciusToReamur($nilaiAwal);} 
            elseif ($satuanHasil === 'K') {
            $hasil = celciusToKelvin($nilaiAwal);} 
            else {
            $hasil = $nilaiAwal;}
          break;
        case 'F':
          if ($satuanHasil === 'C') {
            $hasil = fahrenheitToCelcius($nilaiAwal);} 
            elseif ($satuanHasil === 'Re') {
            $hasil = fahrenheitToReamur($nilaiAwal);} 
            elseif ($satuanHasil === 'K') {
            $hasil = fahrenheitToKelvin($nilaiAwal);} 
            else {
            $hasil = $nilaiAwal;}
          break;
        case 'Re':
          if ($satuanHasil === 'C') {
            $hasil = reamurToCelcius($nilaiAwal);} 
            elseif ($satuanHasil === 'F') {
            $hasil = reamurToFahrenheit($nilaiAwal);} 
            elseif ($satuanHasil === 'K') {
            $hasil = reamurToKelvin($nilaiAwal);} 
            else {
            $hasil = $nilaiAwal;}
          break;
        case 'K':
          if ($satuanHasil === 'C') {
            $hasil = kelvinToCelcius($nilaiAwal);} 
            elseif ($satuanHasil === 'F') {
            $hasil = kelvinToFahrenheit($nilaiAwal);} 
            elseif ($satuanHasil === 'Re') {
            $hasil = kelvinToReamur($nilaiAwal);} 
            else {
            $hasil = $nilaiAwal; }
          break;}
      echo "<h3>Hasil Konversi: $hasil &deg;$satuanHasil<h3>";
    }
  }
}
main();
?>