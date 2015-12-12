<?php namespace Course\Helpers;

	use DOMPDF;
	
	class pdf{

		public static $configured = false; //variable que permite verificar si la funcion configure ya fue llamada o no

		public static function configure(){

			if(static::$configured) return;//validar si la funcion esta siendo llamada mas de una vez

			// disable DOMPDF's internal autoloader if you are using Composer
			define('DOMPDF_ENABLE_AUTOLOAD', false);

			// include DOMPDF's default configuration
			require_once '../vendor/dompdf/dompdf/dompdf_config.inc.php';

			static::$configured=true;
		}

		public static function render($file,$html){

			static::configure();//llamada a la funcion configure


			$dompdf=new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->render();
			$dompdf->stream(''. $file .'.pdf');
		}

	}

?>