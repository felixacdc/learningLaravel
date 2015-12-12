<?php namespace Course\Core\View; //se utiliza para encapsular elementos

	class Template{

		public static function render($file, array $data= array()){
			//Permite incluir un php pero que no lo despliegue en el navegador sino que se pueda asignar a una variable.
			ob_start();

			extract($data); // se utiliza par agregar los datos en el archivo php que se incluye

			include'../Templates/'. $file .'.php';

			//$html= ob_get_clean(); //asigna el valor include a la variable

			return ob_get_clean();
			//**********************
		}
	}

?>