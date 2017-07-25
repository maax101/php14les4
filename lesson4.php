<?php
$cache = 'cache.txt';
$cachetime = 60*60;//время с посл. изменения
//если  есть кэш менее часа и не пустой, берем апи из кэша
if (file_exists($cache) && time() - $cachetime < filemtime($cache) && filesize($cache)>0)	{
	$api = file_get_contents($cache);
	$content = json_decode ($api,true);
}
//если кэша нет, кэш пустой или кэш более часа берем апи с инета
else {
	$api = 'http://api.openweathermap.org/data/2.5/weather?id=518909&type=accurate&units=metric&lang=ru&APPID=aecc8410ebcf14903c7baf356b3d96e7';
	$handle = file_get_contents($api);	
	$content = json_decode ($handle,true);
	file_put_contents($cache, $handle);
	}	
}
$city = $content ['name'];
$icon = $content ['weather'][0]['icon'].'.png';
$temper = $content ['main']['temp'].' C.';
$pres = 0.75*$content ['main']['pressure'].' мм. рт. ст.';
$hum = $content ['main']['humidity'].' %';
$obl = $content ['weather'][0]['description'];
$wind = $content ['wind']['speed'].' м/с';
$weather =[
	['name'=>'На улице: ', 'status'=>$obl],
	['name'=>'Температура: ', 'status'=>$temper],
	['name'=>'Давление: ', 'status'=>$pres],
	['name'=>'Влажность: ', 'status'=>$hum],
	['name'=>'Ветер: ', 'status'=>$wind],
];
var_dump($weather);
?>	
<html> 
	<head>  
		<title>Погода</title>
 	</head>
	<body>
  		<h1><?=$city?></h1>
  		<div>
  		<img src="http://openweathermap.org/img/w/<?=$icon?>" alt="<?=$obl?>">
  		</div>
  		<table>
  			<?php foreach ($weather as $v): ?>
  				<tr>
  					<td><?=$v['name']?></td>
  					<td><?=$v['status']?></td>
  				</tr>
  			<?php endforeach; ?>
  		</table>  					
	</body>
</html>





