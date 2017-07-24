<?php
$filename = 'http://api.openweathermap.org/data/2.5/weather?id=518909&type=accurate&units=metric&lang=ru&APPID=aecc8410ebcf14903c7baf356b3d96e7';
$handle = fopen($filename, "r");
$content = json_decode (fread($handle,8192),true);
$icon = $content ['weather'][0]['icon'].'.png';
$city = $content ['name'];
$temper = $content ['main']['temp'];
$pres = 0.75*$content ['main']['pressure'];
$hum = $content ['main']['humidity'];
$obl = $content ['weather'][0]['description'];
$wind = $content ['wind']['speed'];
echo '<pre>';
echo "Город: $city.".PHP_EOL;
echo "На улице: $obl.".PHP_EOL;
echo "Температура: $temper C.".PHP_EOL;
echo "Давление: $pres мм. рт. ст.".PHP_EOL;
echo "Влажность: $hum %.".PHP_EOL;
echo "Ветер: $wind м/с.".PHP_EOL;
//картинка почему-то не прикручивается (
/*
$image = imagecreatefrompng('http://openweathermap.org/img/w/'.$icon);
header('Content-type: image/png');
"<p>";
imagepng($image);
"</p>";
/*heade;r('Content-type: image/png');*/
var_dump($icon);
//api.openweathermap.org\data\2.5\weather?id=518909&type=accurate&units=metric&lang=ru&APPID=aecc8410ebcf14903c7baf356b3d96e7
