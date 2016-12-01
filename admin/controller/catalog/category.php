<?php
class ControllerCatalogCategory extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');
        $this->load->model('catalog/product');

		$this->getList();
	}

    
    
	public function add() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

        
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            if (isset($this->request->post['model1'])) {
			$data['model'] = $this->request->post['model1'];
            }
            
            if (isset($this->request->post['name1'])) {
			$data['title'] = $this->request->post['name1'];
            }
            
            if (isset($this->request->post['imagedir1'])) {
			$data['images_dir'] = $this->request->post['imagedir1'];
            }
            
            if (isset($this->request->post['image1'])) {
			$data['images'] = $this->request->post['image1'];
            }        
            
            if (isset($this->request->post['price1'])) {
			$data['price'] = $this->request->post['price1'];
            }              
             
            if (isset($this->request->post['category1'])) {
			$data['category'] = $this->request->post['category1'];
            }  
            
            if (isset($this->request->post['optiona1'])) {
			$data['options_name'] = $this->request->post['optiona1'];
            }             
           
            
            if (isset($this->request->post['valuea1'])) {
			$data['options_size'] = $this->request->post['valuea1'];
            }  
            
            if (isset($this->request->post['optionb1'])) {
			$data['options_name1'] = $this->request->post['optionb1'];
            }             
  
            if (isset($this->request->post['valueb1'])) {
			$data['options_size1'] = $this->request->post['valueb1'];
            }               
            $data['quantity']='99';
            
          
          if($data['category']!=''&&$data['model']!=''&&$data['title']!=''&&$data['images_dir']!=''&&$data['images']!=''&&$data['price']!=''){
              
              
              setcookie("price", $data['price'] );
              setcookie("category", $data['category']);
              
              
              $cats = array_filter(explode('|||', $data['category']));
              $language_id=2;   //语言id
              $parent_id = 0;
                foreach ($cats as $key => $value) {
                    $parent_id=$this->model_catalog_category->create_category($value, $parent_id, $language_id);
                }
              
              
             // $url='http://www.sneakerjump.us/jk.php';
              /****************************/
             /* $url[1]='http://www.sneakeradd.me/jk.php';
              $url[2]='http://www.sneakerbook.top/jk.php';
              $url[4]='http://www.footwearlocker.cc/jk.php';
              $url[5]='http://www.sneakerpage.ru/jk.php';
              $url[6]='http://www.sneakerjump.us/jk.php';
              $url[7]='http://www.sneakerfile.cc/jk.php';
              $url[8]='http://www.stayfashion.ru/jk.php';
              $url[9]='http://www.sneakerahead.ru/jk.php';
              $url[10]='http://www.sneakersite.ru/jk.php';*/
              
              //$key="Y4filUxH";
               $url[1]='http://www.9201688.com/jk.php';
               //$url[2]='http://www.9201688.com/jk.php';
            /****************************/

                foreach ($url as $value) {
                    $result=$this->curl_post($value, $data);
                  }
          }  
             $this->response->redirect($this->url->link('catalog/category', 'token=' . $this->session->data['token'], true));
        }

		$this->getList();
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
    
    
  	public function upload() {
		$this->load->language('catalog/category');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/category');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {

			if (isset($this->request->post['yupoourl'])) {
                $url=$this->request->post['yupoourl'];
                $html = file_get_contents($url);
                preg_match_all('/<span id="albumtitle" class="albumOwner">(.*?)</s',$html,$matchs);
                $productname=$matchs[1][0];
                $productname =trim($productname);
                preg_match_all('/<table class="DayView">(.*?)<\/table/s',$html,$imgmatchs);
               
                $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
                preg_match_all($pattern,$imgmatchs[1][0],$imagearrays);
                
                $images=$imagearrays[1];
                $data['images']=$images;
                $data['product_name']= $productname;
               // var_dump($data);
                
			}


			//$this->response->redirect($this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url, true));
		}

		$this->getList();
	}  
    
    
    
    
function getsize($productsname) {    

     if(stripos($productsname,'36-44')||stripos($productsname,'36--44')||stripos($productsname,'36---44')||stripos($productsname,'36―44')||stripos($productsname,'36――44')||stripos($productsname,'36―――44')){
      $Size='36|||37|||38|||39|||40|||41|||42|||43|||44';
     }elseif(stripos($productsname,'36-39')||stripos($productsname,'36--39')||stripos($productsname,'36---39')||stripos($productsname,'36―39')||stripos($productsname,'36――39')||stripos($productsname,'36―――39')){
       $Size='36|||37|||38|||39';
     }elseif(stripos($productsname,'31-37')){
       $Size='31|||32|||33|||34|||35|||36|||37';
     }elseif(stripos($productsname,'24-37')){
       $Size='24|||25|||26|||27|||28|||29|||30|||31|||32|||33|||34|||35|||36|||37';
     }elseif(stripos($productsname,'23-36')){
       $Size='23|||24|||25|||26|||27|||28|||29|||30|||31|||32|||33|||34|||35|||36';
     }elseif(stripos($productsname,'25-37')){
       $Size='25|||26|||27|||28|||29|||30|||31|||32|||33|||34|||35|||36|||37';
     }elseif(stripos($productsname,'26-35')){
       $Size='26|||27|||28|||29|||30|||31|||32|||33|||34|||35';
     }elseif(stripos($productsname,'39-45')){
       $Size='39|||40|||41|||42|||43|||44|||45';
     }elseif(stripos($productsname,'24-30.5')){
       $Size='24|||25|||26|||27|||28|||29|||30.5';
     }elseif(stripos($productsname,'31-37')){
       $Size='31|||32|||33|||34|||35|||36|||37';
     }elseif(stripos($productsname,'27-35')){
       $Size='27|||28|||29|||30|||31|||32|||33|||34|||35';
     }elseif(stripos($productsname,'28-35')){
       $Size='28|||29|||30|||31|||32|||33|||34|||35';
     }elseif(stripos($productsname,'35-39')||stripos($productsname,'35--39')||stripos($productsname,'35---39')){
       $Size='35|||36|||37|||38|||39';
     }elseif(stripos($productsname,'40-44')||stripos($productsname,'40--44')||stripos($productsname,'40---44')){
       $Size='40|||41|||42|||43|||44';
     }elseif(stripos($productsname,'39-44')||stripos($productsname,'39--44')||stripos($productsname,'39---44')){
       $Size='39|||40|||41|||42|||43|||44';
     }elseif(stripos($productsname,'40-45')||stripos($productsname,'40--45')||stripos($productsname,'40---45')){
       $Size='40|||41|||42|||43|||44|||45';
     }elseif(stripos($productsname,'40-46')||stripos($productsname,'40--46')||stripos($productsname,'40---46')||stripos($productsname,'40#-46')){
       $Size='40|||41|||42|||43|||44|||45|||46';
     }elseif(stripos($productsname,'40-47')||stripos($productsname,'40--47')||stripos($productsname,'40---47')||stripos($productsname,'40#-47')){
       $Size='40|||41|||42|||43|||44|||45|||46|||47';
     }elseif(stripos($productsname,'41-47')||stripos($productsname,'41--47')||stripos($productsname,'41---47')||stripos($productsname,'41#-47')){
       $Size='41|||42|||43|||44|||45|||46|||47';
     }elseif(stripos($productsname,'36-40')||stripos($productsname,'36--40')||stripos($productsname,'36---40')||stripos($productsname,'36#--40')){
       $Size='36|||37|||38|||39|||40';
     }elseif(stripos($productsname,'41-44')||stripos($productsname,'41--44')||stripos($productsname,'41---44')){
       $Size='41|||42|||43|||44';
     }elseif(stripos($productsname,'36-45')||stripos($productsname,'36--45')||stripos($productsname,'36---45')||stripos($productsname,'36#--40')){
       $Size='36|||37|||38|||39|||40|||41|||42|||43|||44|||45';
     }elseif(stripos($productsname,'36-46')||stripos($productsname,'36--46')||stripos($productsname,'36---46')){
       $Size='36|||37|||38|||39|||40|||41|||42|||43|||44|||45|||46';
     }elseif(stripos($productsname,'36-47')||stripos($productsname,'36--47')||stripos($productsname,'36---47')){
       $Size='36|||37|||38|||39|||40|||41|||42|||43|||44|||45|||46|||47';
     }elseif(stripos($productsname,'37-39')||stripos($productsname,'37--39')||stripos($productsname,'37---39')){
       $Size='37|||38|||39';
     }elseif(stripos($productsname,'男女鞋')||stripos($productsname,'情侣鞋')){
       $Size='36|||37|||38|||39|||40|||41|||42|||43|||44';
     }elseif(stripos($productsname,'男鞋')){
       $Size='41|||42|||43|||44';
     }elseif(stripos($productsname,'女鞋')){
       $Size='36|||37|||38|||39';
     }elseif(stripos($productsname,'女')){
       $Size='36|||37|||38|||39';
     }elseif(stripos($productsname,'男')){
       $Size='41|||42|||43|||44';
     }else{
      //$Size="xxxx";
     }

  return $Size;

}
    
    
    
    
    
    
    

	protected function getList() {
        
        
     if (($this->request->server['REQUEST_METHOD'] == 'POST')) {

			if (isset($this->request->post['yupoourl'])) {
                $url=$this->request->post['yupoourl'];
                
                
                $html = file_get_contents($url);
                $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
                preg_match_all('/<span id="albumtitle" class="albumOwner">(.*?)</s',$html,$matchs);
                $productname=$matchs[1][0];
                $productname =trim($productname);
                
                
                preg_match_all('/<div class="albumCoverThumb">(.*?)<\/div/s',$html,$mainimage);
                preg_match_all($pattern,$mainimage[1][0],$mainimg);
                
                $mainimageurl=str_replace("thumb.jpg","big.jpg",$mainimg[1][0]);
                 
                
                preg_match_all('/<table class="DayView">(.*?)<\/table/s',$html,$imgmatchs);
                preg_match_all($pattern,$imgmatchs[1][0],$imagearrays);
                $images=$imagearrays[1];
                
                
                
                
                $data['image_dir']= date("Ym").'/'.date("d");
                $data['images']=implode('|||',$images);
                $data['images']=$mainimageurl.'|||'.$data['images'];
                
               
                
                $data['product_name']= $productname;
                $data['size']=$this->getsize($productname);

                $data['topcategories']=$this->model_catalog_product->getTopcategories();
                $data['token']=$this->session->data['token'];
               
                
                $productnum=$this->model_catalog_product->getProductNum();
                $data['products_date_added'] = date('Y-m-d');
                if($productnum[0]['products_date_added']!=$data['products_date_added']){
                     $data['products_number']=0;
                     $this->model_catalog_product->updateProductNum($data);
                     $imgcount=0;
                }else{
                    $imgcount=$productnum[0]['products_number'];
                    $data['model']='16'.date("md").$imgcount;
                    $data['products_number']=$imgcount+1;
                    $this->model_catalog_product->updateProductNum($data);
                }
                
                
                
                
                
                
                
                
                
			}


			//$this->response->redirect($this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url, true));
		}
        
        

        $data['add'] = $this->url->link('catalog/category/add', 'token=' . $this->session->data['token'], true);
        
        
        
        
        
        
        
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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
			'href' => $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url, true)
		);


		$data['delete'] = $this->url->link('catalog/category/delete', 'token=' . $this->session->data['token'] . $url, true);
		$data['repair'] = $this->url->link('catalog/category/repair', 'token=' . $this->session->data['token'] . $url, true);

		$data['categories'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_rebuild'] = $this->language->get('button_rebuild');

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

		$data['sort_name'] = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		
		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/category_list', $data));
	}

    
    
}
