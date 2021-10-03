<?php
		class Ver_Catalogo_Controller extends CI_Controller{
			public function vistaCatalogo ($page= 'Ver_Catalogo'){
				if ( ! file_exists(APPPATH.'views/paginas/'.$page.'.php')){

			// Whoops, we don't have a page for that!
			show_404();
				}
				$data['title'] = ucfirst($page); //Capitalize the first letter
				$this->load->view('paginas/Ver_Catalogo', $data);
				$this->load->view('paginas/'.$page, $data);
			}
		}