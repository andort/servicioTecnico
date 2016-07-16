
<?php 

include('../Library/mpdf.php');

class Pdf extends CI_Controller{
	
    public function __construct(){
        parent::__construct();
        $this->load->library("mpdf");
    	}
     
		public function vista(){
		$this->mpdf->mPDF('utf-8','A4');
		 
		//PASAMOS LA RUTA DONDE ESTA EL ESTILO
		$stylesheet = file_get_contents('../Assets/css/style.css');
		//cargamos el estilo CSS
		$this->mpdf->WriteHTML($stylesheet,1);
		//CARGAMOS LOS PARAMETROS
		$data['nombre'] = "Renatto NL";
		//OBTENEMOS LA VISTA EN HTML
		$html = $this->load->view('../View/prueba_factura.php', $data, true);
		//ESCRIBIMOS AL PDF
		$this->mpdf->WriteHTML($html,2);
		//SALIDA DE NUESTRO PDF
		$this->mpdf->Output();
		}
	}

?>