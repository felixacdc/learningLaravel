<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interfaz</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		img{
			width: 100%;
			height: 250px;
			border-radius: 5px;
			margin-bottom: 20px;
		}

		*{
			font-family:Calibri;
		}

		.center{
			text-align: center;
			margin: 20px auto;
		}


	</style>
</head>
<body>
	<div class="container">

		<img src="0000011.png" alt="">

		<div class="center">
			<p>Certifica A:</p>
			<h1><?= $name ?></h1><!-- Agrega las variables que se definen en el archivo que incluye a lal archivo-->
			<p>por haber aprobado el curso de</p>
			<h1><?= $course ?></h1>
		</div>

</body>
</html>
