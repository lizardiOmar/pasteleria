<?php
	class Actualizar_Productos_Controller extends CI_Controller{
		public function VistaActualizarProducto ($page='VistaActualizar_Productos'){
			if ( ! file_exists(APPPATH.'views/paginas/'.$page.'.php')){
                // Whoops, we don't have a page for that!
                show_404();
			}
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('elementos/VistaEncabezado_Administrador', $data);
			$this->load->view('paginas/'.$page, $data);
		}
		
	}
	
?>