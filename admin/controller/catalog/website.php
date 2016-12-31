<?php
class ControllerCatalogWebsite extends Controller {
    private $error = array();

	public function index() {
		$this->load->language('catalog/website');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/website');

		$this->getList();
	}
    
  
    
  
    
    
    
    
    
   public function add() {
		$this->load->language('catalog/website');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/website');
       
       if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
           if (isset($this->request->post['site'])&&$this->request->post['site']!='') {
              $data['site']=$this->request->post['site'];
              $data['status'] = $this->request->post['status'];
              $results = $this->model_catalog_website->addWebsite($data);
               
              $this->response->redirect($this->url->link('catalog/website', 'token=' . $this->session->data['token'], true));
           }
              
       }
       
       
       $this->getForm();
   }
    
    
    
    
    
    
    
    
    
    
    
    
   public function edit() {
		$this->load->language('catalog/website');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/website');
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
           if (isset($this->request->post['site'])&&$this->request->post['site']!='') {
              $data['site']=$this->request->post['site'];
              $data['status'] = $this->request->post['status'];
              $data['id'] =  $this->request->get['id'];
              $results = $this->model_catalog_website->editWebsite($data);
              $this->response->redirect($this->url->link('catalog/website', 'token=' . $this->session->data['token'], true));
           }
              
       }
       
       
       
       
       
       
       $this->getForm();
   }
    
    
    
    
    
    
    
    
    
    
    
  public function delete() {
		$this->load->language('catalog/website');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/website');
      
        foreach ($this->request->post['selected'] as $id) {
				$this->model_catalog_website->deleteWebsite($id);
			}
      
     $this->response->redirect($this->url->link('catalog/website', 'token=' . $this->session->data['token'], true));
  }
    
    
    
    
    
    
    
    
    
    
    
    protected function getList() {  
        $data['text_list'] = $this->language->get('text_list');
        $data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
        $data['heading_title'] = $this->language->get('heading_title');
        $data['column_action'] = $this->language->get('column_action');
        $data['text_confirm'] = $this->language->get('text_confirm');
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/website', 'token=' . $this->session->data['token'], true)
		);
        
        $data['add'] = $this->url->link('catalog/website/add', 'token=' . $this->session->data['token'], true);
		$data['delete'] = $this->url->link('catalog/website/delete', 'token=' . $this->session->data['token'], true);
        $data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
        
        $results = $this->model_catalog_website->getWebsite();
        foreach ($results as $result) {
          $data['websites'][] = array(
				'id'  => $result['id'],
				'url' => $result['website_url'],
				'status'=> $result['status'],
                'edit'  => $this->url->link('catalog/website/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['id'], true)
			);  
        }
        
        
        
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('catalog/website_list', $data));
    }
    

    
    
    
    
    
   protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');
        $data['entry_site'] = $this->language->get('entry_site');
        $data['entry_status'] = $this->language->get('entry_status');
       
        $data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
       
       
       
       	if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('catalog/website/add', 'token=' . $this->session->data['token'], true);
		} else {
			$data['action'] = $this->url->link('catalog/website/edit', 'token=' . $this->session->data['token'] . '&id=' . $this->request->get['id'], true);
		}
       
       
       	if (isset($this->request->get['id']) && ($this->request->server['REQUEST_METHOD']!= 'POST')) {
			$web_info = $this->model_catalog_website->getWebid($this->request->get['id']);     
		}
       
       
       if(!empty($web_info)){
            $data['site'] = $web_info['site'];
            $data['status'] = $web_info['status'];
       }else{
            $data['site'] = '';
            $data['status'] = '';
       }
       
       
       
       if (isset($this->error['site'])) {
			$data['error_site'] = $this->error['site'];
		} else {
			$data['error_site'] = array();
		}
       
     
      if (isset($this->error['status'])) {
			$data['error_status'] = $this->error['status'];
		} else {
			$data['error_status'] = array();
		}
       
       
       
       
       
        $data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/part', 'token=' . $this->session->data['token'], true)
		);
       
       
       	if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
       
       
       
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/website_form', $data));
       
       
   }
    
    
    
    
    
    
    
    
    
    
    
    
}