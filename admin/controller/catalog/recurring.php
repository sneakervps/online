<?php
class ControllerCatalogRecurring extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_recurring->addRecurring($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getForm();
	}

    
    
    
    
  public function priceadd() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['model'])) {
			$pricedata['model'] = $this->request->post['model'];
            }
            
            if (isset($this->request->post['name'])) {
			$pricedata['name'] = $this->request->post['name'];
            }
            
            if (isset($this->request->post['price'])) {
			$pricedata['price'] = $this->request->post['price'];
            }
            
            if (isset($this->request->post['specials'])) {
			$pricedata['specials'] = $this->request->post['specials'];
            }
            
            if (isset($this->request->post['specialstime'])) {
			$pricedata['specialstime'] = $this->request->post['specialstime'];
            }
            
            if($pricedata['model']!=''||$pricedata['name']!=''){
              $key="Y4filUxH";
              $pricedata['key']=$key;
              $pricedata['postdate']='priceadd';  
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
            /****************************/
  
                $success='';
                foreach ($url as $key=>$value) {
                    $result=$this->curl_post($value, $pricedata);
                    if($result){
                       $success=$success.'|||'.$key;
                    }
                  }
            
              $this->session->data['success'] = $success; 
                
            }

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}
   
    
    
    
    
    
    
  public function updatename() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['model'])) {
			$productnamedata['model'] = $this->request->post['model'];
            }
            
            if (isset($this->request->post['product_name'])) {
			$productnamedata['product_name'] = $this->request->post['product_name'];
            }
                  
            if($productnamedata['model']!=''&&$productnamedata['product_name']!=''){
              $key="Y4filUxH";
              $productnamedata['key']=$key;
              $productnamedata['postdate']='updatename';  
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
                
            /****************************/
                $success='';
                foreach ($url as $key=>$value) {
                    $result=$this->curl_post($value, $productnamedata);
                    if($result){
                       $success=$success.'|||'.$key;
                    }
                  }
            
              $this->session->data['success'] = $success; 
            }

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}   
    
    
    
    
    
    
   public function statusedit() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['model'])) {
			$statusdata['model'] = $this->request->post['model'];
            }

            if (isset($this->request->post['status'])) {
			$statusdata['status'] = $this->request->post['status'];
            }
            
            
            if($statusdata['model']!=''){
              $key="Y4filUxH";
              $statusdata['key']=$key;
              $statusdata['postdate']='statusedit';
                
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
                

            /****************************/  
                $success='';
                foreach ($url as $key=>$value) {
                     $result=$this->curl_post($value, $statusdata);
                    if($result){
                       $success=$success.'|||'.$key.$result;
                    }
                  }
            
              $this->session->data['success'] = $success; 
            }
            $this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}   
    
    
    
    
    public function westernunionedit() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['firstname'])) {
			$westernuniondata['firstname'] = $this->request->post['firstname'];
            }
            
            if (isset($this->request->post['lastname'])) {
			$westernuniondata['lastname'] = $this->request->post['lastname'];
            }
            
            if (isset($this->request->post['telephone'])) {
			$westernuniondata['telephone'] = $this->request->post['telephone'];
            }
            
            
            
            if($westernuniondata['firstname']!=''&&$westernuniondata['lastname']!=''&&$westernuniondata['telephone']!=''){
              $key="Y4filUxH";
              $westernuniondata['key']=$key;
              $westernuniondata['postdate']='westernunionedit';
                
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
            
            /****************************/

                $success='';
                foreach ($url as $key=>$value) {
                     $result=$this->curl_post($value, $westernuniondata);
                    if($result){
                       $success=$success.'|||'.$key;
                    }
                  }
            
              $this->session->data['success'] = $success; 
                
                
                
                
                
                
            }
            $this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}   
    
    
 

      
  public function sizeedit() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['model'])) {
			$sizedata['model'] = $this->request->post['model'];
            }
            
            if (isset($this->request->post['options_name'])) {
			$sizedata['options_name'] = $this->request->post['options_name'];
            }
            
            if (isset($this->request->post['options_size'])) {
			$sizedata['options_size'] = $this->request->post['options_size'];
            }
            
            if (isset($this->request->post['options_name1'])) {
			$sizedata['options_name1'] = $this->request->post['options_name1'];
            }
            
            if (isset($this->request->post['options_size1'])) {
			$sizedata['options_size1'] = $this->request->post['options_size1'];
            }
            
            if($sizedata['model']!=''){
              $key="Y4filUxH";
              $sizedata['key']=$key;
              $sizedata['postdate']='sizeedit';  
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
            /****************************/
                
              $success='';
                foreach ($url as $key=>$value) {
                     $result=$this->curl_post($value, $sizedata);
                    if($result){
                       $success=$success.'|||'.$key;
                    }
                  }
            
              $this->session->data['success'] = $success; 
                
                
            }

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}
    
    
    
   
    
    
   
  public function optionedit() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            
            if (isset($this->request->post['model'])) {
			$optiondata['model'] = $this->request->post['model'];
            }
            
            if (isset($this->request->post['option_name'])) {
			$optiondata['option_name'] = $this->request->post['option_name'];
            }
            
            if (isset($this->request->post['option_value'])) {
			$optiondata['option_value'] = $this->request->post['option_value'];
            }
            
            if (isset($this->request->post['option_status'])) {
			$optiondata['option_status'] = $this->request->post['option_status'];
            }
            
            
            
            
            if($optiondata['model']!=''&&$optiondata['option_name']!=''&&$optiondata['option_value']!=''){
              $key="Y4filUxH";
              $optiondata['key']=$key;
              $optiondata['postdate']='optionedit';  
                /****/
                
                
                
                
                
                
              $url[1]='http://www.sneakeradd.me/online.php';
              $url[2]='http://www.sneakerbook.top/online.php';
              $url[3]='http://www.footwearlocker.cc/online.php';
              $url[4]='http://www.sneakerpage.ru/online.php';
              $url[5]='http://www.sneakerjump.us/online.php';
              $url[6]='http://www.sneakerfile.cc/online.php';
              $url[7]='http://www.stayfashion.ru/online.php';
              $url[8]='http://www.sneakersite.ru/online.php';
              $url[9]='http://www.sneakerahead.ru/online.php';
                
                
            /****************************/
               $site=array(1=>'add',2=>'book',3=>'foot',4=>'page',5=>'jump',6=>'file',7=>'stay',8=>'site',9=>'head');

              $success='';
                foreach ($url as $key=>$value) {
                     $result=$this->curl_post($value, $optiondata);
                    if($result){
                       $success=$success.'|||'.$site[$key].'-'.$result;
                    }
                  }
            
              $this->session->data['success'] = $success; 
                
                
            }

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'], true));
		}

		//$this->getList();
	}    
    
    
    
    
    
    
  function curl_post($url, $data) 
  {
    if (empty($url)) return false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch ,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch ,CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  } 
    
    
    
    
	public function edit() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_recurring->editRecurring($this->request->get['recurring_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $recurring_id) {
				$this->model_catalog_recurring->deleteRecurring($recurring_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getList();
	}

	public function copy() {
		$this->load->language('catalog/recurring');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/recurring');

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $recurring_id) {
				$this->model_catalog_recurring->copyRecurring($recurring_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
        
        
        
        
        
        
        
        
        $data['priceaction'] = $this->url->link('catalog/recurring/priceadd', 'token=' . $this->session->data['token'], true);
        $data['statusaction'] = $this->url->link('catalog/recurring/statusedit', 'token=' . $this->session->data['token'], true);
        $data['westernunionaction'] = $this->url->link('catalog/recurring/westernunionedit', 'token=' . $this->session->data['token'], true);
        $data['sizeaction'] = $this->url->link('catalog/recurring/sizeedit', 'token=' . $this->session->data['token'], true);
        $data['optionaction'] = $this->url->link('catalog/recurring/optionedit', 'token=' . $this->session->data['token'], true);
        $data['productnameaction'] = $this->url->link('catalog/recurring/updatename', 'token=' . $this->session->data['token'], true);
        
        
        
        
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'rd.name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/recurring/add', 'token=' . $this->session->data['token'] . $url, true);
		$data['copy'] = $this->url->link('catalog/recurring/copy', 'token=' . $this->session->data['token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/recurring/delete', 'token=' . $this->session->data['token'] . $url, true);

		$data['recurrings'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$recurring_total = $this->model_catalog_recurring->getTotalRecurrings();

		$results = $this->model_catalog_recurring->getRecurrings($filter_data);

		foreach ($results as $result) {
			$data['recurrings'][] = array(
				'recurring_id' => $result['recurring_id'],
				'name'         => $result['name'],
				'sort_order'   => $result['sort_order'],
				'edit'         => $this->url->link('catalog/recurring/edit', 'token=' . $this->session->data['token'] . '&recurring_id=' . $result['recurring_id'] . $url, true)
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_copy'] = $this->language->get('button_copy');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

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

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . '&sort=pd.name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . '&sort=p.sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $recurring_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($recurring_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($recurring_total - $this->config->get('config_limit_admin'))) ? $recurring_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $recurring_total, ceil($recurring_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/recurring_list', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['recurring_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_profile'] = $this->language->get('text_profile');
		$data['text_trial'] = $this->language->get('text_trial');
		$data['text_recurring'] = $this->language->get('text_recurring');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_duration'] = $this->language->get('entry_duration');
		$data['entry_cycle'] = $this->language->get('entry_cycle');
		$data['entry_frequency'] = $this->language->get('entry_frequency');
		$data['entry_trial_price'] = $this->language->get('entry_trial_price');
		$data['entry_trial_duration'] = $this->language->get('entry_trial_duration');
		$data['entry_trial_status'] = $this->language->get('entry_trial_status');
		$data['entry_trial_cycle'] = $this->language->get('entry_trial_cycle');
		$data['entry_trial_frequency'] = $this->language->get('entry_trial_frequency');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true)
		);

		if (!isset($this->request->get['recurring_id'])) {
			$data['action'] = $this->url->link('catalog/recurring/add', 'token=' . $this->session->data['token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/recurring/edit', 'token=' . $this->session->data['token'] . '&recurring_id=' . $this->request->get['recurring_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/recurring', 'token=' . $this->session->data['token'] . $url, true);

		if (isset($this->request->get['recurring_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$recurring_info = $this->model_catalog_recurring->getRecurring($this->request->get['recurring_id']);
		}

		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['recurring_description'])) {
			$data['recurring_description'] = $this->request->post['recurring_description'];
		} elseif (!empty($recurring_info)) {
			$data['recurring_description'] = $this->model_catalog_recurring->getRecurringDescription($recurring_info['recurring_id']);
		} else {
			$data['recurring_description'] = array();
		}

		if (isset($this->request->post['price'])) {
			$data['price'] = $this->request->post['price'];
		} elseif (!empty($recurring_info)) {
			$data['price'] = $recurring_info['price'];
		} else {
			$data['price'] = 0;
		}

		$data['frequencies'] = array();

		$data['frequencies'][] = array(
			'text'  => $this->language->get('text_day'),
			'value' => 'day'
		);

		$data['frequencies'][] = array(
			'text'  => $this->language->get('text_week'),
			'value' => 'week'
		);

		$data['frequencies'][] = array(
			'text'  => $this->language->get('text_semi_month'),
			'value' => 'semi_month'
		);

		$data['frequencies'][] = array(
			'text'  => $this->language->get('text_month'),
			'value' => 'month'
		);

		$data['frequencies'][] = array(
			'text'  => $this->language->get('text_year'),
			'value' => 'year'
		);

		if (isset($this->request->post['frequency'])) {
			$data['frequency'] = $this->request->post['frequency'];
		} elseif (!empty($recurring_info)) {
			$data['frequency'] = $recurring_info['frequency'];
		} else {
			$data['frequency'] = '';
		}

		if (isset($this->request->post['duration'])) {
			$data['duration'] = $this->request->post['duration'];
		} elseif (!empty($recurring_info)) {
			$data['duration'] = $recurring_info['duration'];
		} else {
			$data['duration'] = 0;
		}

		if (isset($this->request->post['cycle'])) {
			$data['cycle'] = $this->request->post['cycle'];
		} elseif (!empty($recurring_info)) {
			$data['cycle'] = $recurring_info['cycle'];
		} else {
			$data['cycle'] = 1;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($recurring_info)) {
			$data['status'] = $recurring_info['status'];
		} else {
			$data['status'] = 0;
		}

		if (isset($this->request->post['trial_price'])) {
			$data['trial_price'] = $this->request->post['trial_price'];
		} elseif (!empty($recurring_info)) {
			$data['trial_price'] = $recurring_info['trial_price'];
		} else {
			$data['trial_price'] = 0.00;
		}

		if (isset($this->request->post['trial_frequency'])) {
			$data['trial_frequency'] = $this->request->post['trial_frequency'];
		} elseif (!empty($recurring_info)) {
			$data['trial_frequency'] = $recurring_info['trial_frequency'];
		} else {
			$data['trial_frequency'] = '';
		}

		if (isset($this->request->post['trial_duration'])) {
			$data['trial_duration'] = $this->request->post['trial_duration'];
		} elseif (!empty($recurring_info)) {
			$data['trial_duration'] = $recurring_info['trial_duration'];
		} else {
			$data['trial_duration'] = '0';
		}

		if (isset($this->request->post['trial_cycle'])) {
			$data['trial_cycle'] = $this->request->post['trial_cycle'];
		} elseif (!empty($recurring_info)) {
			$data['trial_cycle'] = $recurring_info['trial_cycle'];
		} else {
			$data['trial_cycle'] = '1';
		}
		if (isset($this->request->post['trial_status'])) {
			$data['trial_status'] = $this->request->post['trial_status'];
		} elseif (!empty($recurring_info)) {
			$data['trial_status'] = $recurring_info['trial_status'];
		} else {
			$data['trial_status'] = 0;
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($recurring_info)) {
			$data['sort_order'] = $recurring_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/recurring_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/recurring')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['recurring_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 3) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/recurring')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('catalog/product');

		foreach ($this->request->post['selected'] as $recurring_id) {
			$product_total = $this->model_catalog_product->getTotalProductsByProfileId($recurring_id);

			if ($product_total) {
				$this->error['warning'] = sprintf($this->language->get('error_product'), $product_total);
			}
		}

		return !$this->error;
	}

	protected function validateCopy() {
		if (!$this->user->hasPermission('modify', 'catalog/recurring')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}