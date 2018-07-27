<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class RegistrosController extends AppController {

	public $uses = array('Personas');
	public function registro(){
		if($this->request->is('post')){
			$this->Personas->create();
			if(!empty($this->request->data['id'])){
				$this->request->data['Personas']['id'] = $this->request->data['id'];
			}
			if($this->Personas->save($this->request->data['Personas'])){
				echo json_encode("success");
			}else{
				echo json_encode("false");
			}
		}
		exit();
	}

	public function index(){
		$personas = $this->Personas->find('all');
		$this->set(compact('personas'));
	}

	public function eliminar(){
		if($this->request->is('post')){
			if($this->Personas->delete($this->request->data['id'])){
				echo json_encode("success");
			}else{
				echo json_encode("false");
			}
		}
		exit();
	}
}