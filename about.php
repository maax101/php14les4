<html> 
	<head>  
		<title>Моя первая страница</title>
 	</head>
	<body>
  		<h1>Страница Макса.</h1>
<?php
$name = 'Максим';
$age = '34';
$city = 'Коряжма';
$mail = 'belous.maxim@gmail.com';
$about = 'Это мой первый шаг в кодинге';
?>
 		<table>
			<tr>		
				<td>Имя:</td>
				<td><b><?php echo ($name)?>.</b></td>
			</tr>
			<tr>		
				<td>Возраст:</td>
				<td><b><?php echo ($age)?>.</b></td>
			</tr>
		<tr>		
			<td>Город:</td>
			<td><b><?php echo ($city)?>.</b></td>
		</tr>
		<tr>		
			<td>E-mail:</td>
			<td><b><a href = "#"><?php echo ($mail)?></a>.</b></td>
		</tr>
		<tr>		
			<td>О себе:</td>
			<td><b><?php echo ($about)?>.</b></td>
		</tr>
	</body>
</html>
