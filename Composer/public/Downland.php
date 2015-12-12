<?php
	use Course\Core\View\Template as Raiz;//se utiliza para incluir una clase y as para asignarle un aleas
	use Course\Helpers\pdf;//sirve para incluir una clase el ultimo nombre es el que se utilizara cuando se quiera usar el objeto

	// somewhere early in your project's loading, require the Composer autoloader
	// see: http://getcomposer.org/doc/00-intro.md
	require '../vendor/autoload.php';



	$data=array(
			'name'=>'Pablo Mendez',
			'course'=>'Curso basico de Laravel'
		);

	// require '../Course/Template.php'; //sirve para cargar la clase manualmente
	// require '../Course/pdf.php'; //sirve para cargar la clase manualmente


	// Utilizacion de clases con PSR-4

	$html=Raiz::render('pdf/certificate',$data);
	Pdf::render('certificate',$html);

?>
