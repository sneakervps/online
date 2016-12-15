<?php


$auto_cate = true; // 是否自动建立分类 true | false
$language_id = 1; // 发布的语言ID

@set_time_limit(1000);
@ini_set('memory_limit', '100M');
require('includes/application_top.php');





/*********bof更新价格跟特价*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='priceadd'&&$_POST['model']) {
		$model=zen_db_prepare_input($_POST['model']);
		$products = $db -> Execute ("SELECT * FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $model . "'");
		if ($products -> RecordCount () > 0) { // 更新价格和库存
			$products_id=$products -> fields['products_id'];
			$products_price = zen_db_prepare_input($_POST['products_price']);
			if($products_price){
				$db -> Execute ("UPDATE " . TABLE_PRODUCTS . " SET `products_price`='" . $products_price . "' WHERE `products_id`='" . $products_id . "'");
				echo $products_id;
			}
			if($_POST['specials']){
				if($_POST['specialstime']){
					$specialstime=(int)$_POST['specialstime'].' day';
				}else{
					$specialdays='1095 day';
				}
				$nowday=date('Y-m-d',time());
                $expiredate=date("Y-m-d",strtotime($specialstime));
                $products_specials = zen_db_prepare_input($_POST['specials']);
				$specials = $db -> Execute ("SELECT * FROM " . TABLE_SPECIALS . " WHERE products_id='" . $products_id . "'");
				if ($specials -> RecordCount () > 0) { // 
					$db -> Execute ("UPDATE " . TABLE_SPECIALS . " SET `specials_new_products_price`='" . $products_specials . "',`specials_date_added`='" . $nowday . "',`expires_date`='" . $expiredate . "',`specials_date_available`='" . $nowday . "',`status`=1  WHERE `products_id`='" . $products_id . "'");
				}else{
					 $db->Execute("insert into " . TABLE_SPECIALS . "
                    (products_id, specials_new_products_price, specials_date_added, expires_date, status, specials_date_available)
                    values ('" . (int)$products_id . "',
                            '" . $products_specials . "',
                            '".$nowday."',
                            '".$expiredate."', '1', '".$nowday."')");
				}
				echo $specials;
			}
		}
}
/*********eof更新价格跟特价*******/


/*********eof更新产品状态*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='statusedit'&&$_POST['model']) {
	$products = $db -> Execute ("SELECT * FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $_POST['model'] . "'");
	if ($products -> RecordCount () > 0) { 
		$products_id=$products -> fields['products_id'];
		if($_POST['status']==1){
			$db -> Execute ("UPDATE " . TABLE_PRODUCTS . " SET `products_status`=1 WHERE `products_id`='" . $products_id . "'");
			echo 'on';
		}elseif($_POST['status']==0){
			$db -> Execute ("UPDATE " . TABLE_PRODUCTS . " SET `products_status`=0 WHERE `products_id`='" . $products_id . "'");
			echo 'off';
		}
		
	}
}
/*********eof更新产品状态*******/




/*********bof更新西联*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='westernunionedit'&&$_POST['firstname']!=''&&$_POST['lastname']!=''&&$_POST['telephone']!='') {

	$firstname=zen_db_prepare_input($_POST['firstname']);
	$lastname=zen_db_prepare_input($_POST['lastname']);
	$telephone=zen_db_prepare_input($_POST['telephone']);
	$db -> Execute ("UPDATE " . TABLE_CONFIGURATION . " SET `configuration_value`='".$firstname."' WHERE `configuration_key`='MODULE_PAYMENT_WESTERNUNION_RECEIVER_FIRST_NAME'");
	$db -> Execute ("UPDATE " . TABLE_CONFIGURATION . " SET `configuration_value`='".$lastname."' WHERE `configuration_key`='MODULE_PAYMENT_WESTERNUNION_RECEIVER_LAST_NAME'");
	$db -> Execute ("UPDATE " . TABLE_CONFIGURATION . " SET `configuration_value`='".$telephone."' WHERE `configuration_key`='MODULE_PAYMENT_WESTERNUNION_RECEIVER_PHONE'");
    echo 'ok';
}
/*********bof更新西联*******/









/*********bof更新产品名字*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='updatename'&&$_POST['product_name']!=''&&$_POST['model']!='') {

	$product_name=zen_db_prepare_input($_POST['product_name']);
	$model=zen_db_prepare_input($_POST['model']);
    $products = $db -> Execute ("SELECT * FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $model . "'");
    if ($products -> RecordCount () > 0) { 
		$products_id=$products -> fields['products_id'];
        $db -> Execute ("UPDATE " . TABLE_PRODUCTS_DESCRIPTION . " SET `products_name`='".$product_name."' WHERE `products_id`='".$products_id."'");
    }
    echo 'ok';
    
}
/*********bof更新产品名字*******/








/*
$_POST['key']='Y4filUxH';
$_POST['postdate']='imageupdate';
$_POST['images']='http://online.sneakercon.biz/upload/201612/1612055/1612055.jpg|||http://online.sneakercon.biz/upload/201612/1612055/1612055_001.jpg|||http://online.sneakercon.biz/upload/201612/1612055/1612055_002.jpg|||http://online.sneakercon.biz/upload/201612/1612055/1612055_003.jpg';
$_POST['model']='1612055';
*/
/*********bof更新图片*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='imageupdate'&&$_POST['images']!='') {
    
    if (!empty($_POST['images'])) { // 自动远程图片
        $array_imgs = explode('|||', $_POST['images']);
        $products_image_name=$_POST['model'];    
        $images_dir='20'.substr($products_image_name,0,4).'/'.substr($products_image_name,4,2);
        
        $file_imgs = remote(array_unique(array_filter($array_imgs)), $products_image_name, $images_dir . "/", DIR_WS_IMAGES . "/" . $images_dir . "/");
        
        var_dump($file_imgs);

    }
    
    
}




function unlinkFile($aimUrl) {
        if (file_exists($aimUrl)) {
            unlink($aimUrl);
            return true;
        } else {
            return false;
        }
    }


function deleteallimg($path,$name){
    unlinkFile($path . $name . '.jpg');
    for($i=0;$i<100;$i++){
        $count = sprintf("%03d",$i);
        $fname[$k] = strtolower($name . '_' . $count . '.jpg');
        echo $path.$fname[$k];
        unlinkFile('images/'.$path . $fname[$k]);
        
    }   
}



function remote($urls, $name = '', $path = '', $dir = './') {
	if (!is_array($urls) or count($urls) == 0) {
		return false;
	}

    deleteallimg($path,$name);
    
	foreach($urls as $k => $v) {
		
		if (!empty($v) && preg_match("~^http~i", $v)) {
			$nurl[$k] = trim($v);
			if ($k == 0) {
				$fname[$k] = strtolower($name . '.jpg');
			} else {
				$count = sprintf("%03d",$k);
				$fname[$k] = strtolower($name . '_' . $count . '.jpg');
			}
            
			$data = file_get_contents($nurl[$k]);
			$filedir[$k] = $dir . $fname[$k];
			 file_put_contents($filedir[$k], $data);
			 $filepath[$k] = $path . $fname[$k];
		}
	
	}
    
    
      
	  return $filepath;
}

/*********bof更新图片*******/













/*********bof更新鞋子尺码*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='sizeedit'&&$_POST['model']!='') {
    
$language_id = 1; // 发布的语言ID   
$products = $db -> Execute ("SELECT products_id FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $_POST['model'] . "'");
$products_id = $products -> fields['products_id'];

    
if(!empty($products_id)){
    $db -> Execute ("DELETE FROM products_attributes WHERE products_id = $products_id");
    
    
    
	if (!empty($_POST['options_name'])) { 
		$array_name[0]=$_POST['options_name']; 
		$array_name[1] = empty($array_name[1]) ? 0 :$array_name[1];
		$options = $db -> Execute("select products_options_id
                                from " . TABLE_PRODUCTS_OPTIONS . "
                                where language_id = '" . (int)$language_id . "'
								and products_options_name = '" . addslashes($array_name[0]) . "'
								and products_options_type = 0
                                Limit 0,1");
		if ($options -> fields['products_options_id']) {
			$optid = $options -> fields['products_options_id'];
		} else {
			$max_options_id_values = $db -> Execute("select max(products_options_id) + 1 as next_id
                                             from " . TABLE_PRODUCTS_OPTIONS);
			$optid = $max_options_id_values -> fields['next_id'];
			$optid = $optid == 0 ? 1 : $optid;
			$options = $db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS . " (`products_options_id`, `language_id`, `products_options_name`, `products_options_sort_order`, `products_options_type`, `products_options_length`, `products_options_comment`, `products_options_size`, `products_options_images_per_row`, `products_options_images_style`, `products_options_rows`) VALUES('" . $optid . "', '" . (int)$language_id . "', '" . addslashes($array_name[0]) . "', 0, '" . $array_name[1] . "', 32, NULL, 32, 0, 0, 0);");
		}

		$value=$_POST['options_size'];
		$array_attr = explode('|||', $value); // 添加属性值
		foreach (array_unique(array_filter($array_attr)) as $attr_key => $attr_value) {
			$check = $db -> Execute("select pov.products_options_values_id, pov.products_options_values_name, pov.language_id
                                from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov
                                left join " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . " pov2po on pov.products_options_values_id = pov2po.products_options_values_id
                                where pov.language_id= '" . (int)$language_id . "'
                                and pov.products_options_values_name='" . addslashes($attr_value) . "'
                                and pov2po.products_options_id ='" . (int)$optid . "'");
			if ($check -> fields['products_options_values_id']) {
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $check -> fields['products_options_values_id'] . "')");
			} else {
				$start_id = $db -> Execute("select pov.products_options_values_id from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov order by pov.products_options_values_id DESC LIMIT 1");
				$next_id = ($start_id -> fields['products_options_values_id'] + 1+$attr_key);
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES . "(products_options_values_id, language_id, products_options_values_sort_order, products_options_values_name)
                      values ('" . (int)$next_id . "',
                              '" . (int)$language_id . "',
                              '" . (int)$attr_key . "',
                              '" . addslashes($attr_value) . "')");
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . "
                    (products_options_id, products_options_values_id)
                    values ('" . (int)$optid . "', '" . (int)$next_id . "')");
				echo $attr_value;
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $next_id . "')");
			}
		}
}

    
    

if (!empty($_POST['options_name1'])) { // 属性
		$array_name[0]=$_POST['options_name1']; //属性名称1
		$array_name[1] = empty($array_name[1]) ? 0 :$array_name[1];
		$options = $db -> Execute("select products_options_id
                                from " . TABLE_PRODUCTS_OPTIONS . "
                                where language_id = '" . (int)$language_id . "'
								and products_options_name = '" . addslashes($array_name[0]) . "'
								and products_options_type = '" . $array_name[1] . "'
                                Limit 0,1");
		if ($options -> fields['products_options_id']) {
			$optid = $options -> fields['products_options_id'];
		} else {
			$max_options_id_values = $db -> Execute("select max(products_options_id) + 1 as next_id
                                             from " . TABLE_PRODUCTS_OPTIONS);
			$optid = $max_options_id_values -> fields['next_id'];
			$optid = $optid == 0 ? 1 : $optid;
			$options = $db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS . " (`products_options_id`, `language_id`, `products_options_name`, `products_options_sort_order`, `products_options_type`, `products_options_length`, `products_options_comment`, `products_options_size`, `products_options_images_per_row`, `products_options_images_style`, `products_options_rows`) VALUES('" . $optid . "', '" . (int)$language_id . "', '" . addslashes($array_name[0]) . "', 0, '" . $array_name[1] . "', 32, NULL, 32, 0, 0, 0);");
		}

		$value=$_POST['options_size1'];
		$array_attr = explode('|||', $value); // 添加属性值
		foreach (array_unique(array_filter($array_attr)) as $attr_key => $attr_value) {
			$check = $db -> Execute("select pov.products_options_values_id, pov.products_options_values_name, pov.language_id
                                from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov
                                left join " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . " pov2po on pov.products_options_values_id = pov2po.products_options_values_id
                                where pov.language_id= '" . (int)$language_id . "'
                                and pov.products_options_values_name='" . addslashes($attr_value) . "'
                                and pov2po.products_options_id ='" . (int)$optid . "'");
			if ($check -> fields['products_options_values_id']) {
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $check -> fields['products_options_values_id'] . "')");
			} else {
				$start_id = $db -> Execute("select pov.products_options_values_id from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov order by pov.products_options_values_id DESC LIMIT 1");
				$next_id = ($start_id -> fields['products_options_values_id'] + 1+$attr_key);
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES . "(products_options_values_id, language_id, products_options_values_sort_order, products_options_values_name)
                      values ('" . (int)$next_id . "',
                              '" . (int)$language_id . "',
                              '" . (int)$attr_key . "',
                              '" . addslashes($attr_value) . "')");
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . "
                    (products_options_id, products_options_values_id)
                    values ('" . (int)$optid . "', '" . (int)$next_id . "')");
				echo $attr_value;
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $next_id . "')");
			}
		}
}    
    

 }   


}
/*********eof更新鞋子尺码*******/







/*********
   $_POST['key']='Y4filUxH';
   $_POST['postdate']='optionedit';
   $_POST['model']='1612132';  
   $_POST['option_name']='Men Size';
   $_POST['option_value']='US13/UK12/EURO47';
   $_POST['option_status']=0;

/*********bof尺码上架下架*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='optionedit'&&$_POST['model']!='') {
    $products = $db -> Execute ("SELECT products_id FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $_POST['model'] . "'");
    $products_id = $products -> fields['products_id'];
    
    if(!empty($products_id)){
        $products_options = $db -> Execute ("SELECT products_options_id FROM " . TABLE_PRODUCTS_OPTIONS . " WHERE products_options_name='" . $_POST['option_name'] . "'");
        $products_options_id = $products_options -> fields['products_options_id'];
        if(!empty($products_options_id)){
            $products_options_value = $db -> Execute ("SELECT products_options_values_id FROM " . TABLE_PRODUCTS_OPTIONS_VALUES . " WHERE products_options_values_name='" . $_POST['option_value'] . "'");
            
            
            $products_options_values_id = '';
            $i=0;
            while (!$products_options_value -> EOF) {
                if($i==0){
                    $products_options_values_id=$products_options_value -> fields['products_options_values_id'];
                    $products_options_values_frist_id=$products_options_values_id;
                }else{
                    $products_options_values_id=$products_options_values_id.','.$products_options_value -> fields['products_options_values_id'];
                }
                $i++;
              $products_options_value -> MoveNext();
            }
            
            
            if(!empty($products_options_values_id)){
                if($_POST['option_status']==0){
                    
                    $sql="DELETE FROM " . TABLE_PRODUCTS_ATTRIBUTES . "  WHERE `products_id`='" .$products_id . "' and `options_id`='" .$products_options_id . "' and options_values_id in (".$products_options_values_id.")";
                    
                    //echo $sql;
                    $result=$db -> Execute($sql);
                    if($result){echo 'del';}
                }else{
                        $products_attributes= $db -> Execute ("SELECT products_attributes_id FROM " . TABLE_PRODUCTS_ATTRIBUTES . " WHERE products_id='" . $products_id . "' and `options_id`='" .$products_options_id . "' and options_values_id in (".$products_options_values_id.")");
                         $products_attributes_id = $products_attributes -> fields['products_attributes_id'];
                        if(empty($products_attributes_id)){
                             $result=$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $products_options_id . "', '" . $products_options_values_frist_id . "')");
                             if($result){echo 'add';} 
                        }
                }
                
            }
        }
        
        
    }    
}

/*********bof尺码上架下架*******/



    







?>

<!--

/*************在线发布*******************/


if (empty($_POST)) {
	foreach (locoy_zen_get_category_tree() as $key => $value) { // 刷新分类列表
		echo "<li row='{$value['id']}'>{$value['text']}</li>\r\n";
	}
	exit();
}

if (!empty($_POST['category']) && $auto_cate == true) { // 自动建立分类
	$parent_id = 0;
	$cats = array_filter(explode('|||', $_POST['category']));
	foreach ($cats as $key => $value) {
		$parent_id = locoy_zen_create_category($value, $parent_id, $language_id);
	}
	$_POST['category_id'] = $parent_id;
}

if (empty($_POST['title']) or empty($_POST['price'])) { // 判断必填字段
	exit('some is empty!!!');
}
// 判断商品存在
if (!empty($_POST['model'])) {
	$products = $db -> Execute ("SELECT * FROM " . TABLE_PRODUCTS . " WHERE products_model='" . $_POST['model'] . "'");
	$products -> fields['products_id'];
	if ($products -> RecordCount () > 0) { // 更新价格和库存
		$db -> Execute ("UPDATE " . TABLE_PRODUCTS . " SET `products_price`='" . $_POST['price'] . "',`products_quantity`='" . $_POST['quantity'] . "' WHERE `products_id`='" . $products -> fields['products_id'] . "'");
			$db -> Execute("DELETE FROM " . TABLE_PRODUCTS_DISCOUNT_QUANTITY . "  WHERE `products_id`='" . $products -> fields['products_id'] . "'");

		if ($_POST['pprice']) { // 更新批发信息
			$pparr = array_filter(explode('|||', $_POST['pprice']));
			foreach ($pparr as $pkey => $pvalue) {
				$pinfo = explode('&&&', $pvalue);
				$db -> Execute("insert into " . TABLE_PRODUCTS_DISCOUNT_QUANTITY . " (discount_id, products_id, discount_qty, discount_price) VALUES('{$pkey}', '".$products -> fields['products_id']."', '{$pinfo[0]}', '{$pinfo[1]}');");
				unset($pinfo);
			}
			$db->Execute("update " . TABLE_PRODUCTS . " set products_discount_type='2' where products_id='" . $products -> fields['products_id'] . "'");

		}
		echo "[PID] " . $products -> fields['products_id'];

		exit();
	}
}


$manufacturers_id = !empty($_POST['manufacturers_name']) ? locoy_zen_create_manufacturer($_POST['manufacturers_name'], $language_id) : null; // 自动厂商

$products = $db -> Execute("insert into " . TABLE_PRODUCTS . " (`products_type`, `products_quantity`, `products_model`, `products_image`, `products_price`, `products_virtual`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_status`, `products_tax_class_id`, `manufacturers_id`, `products_ordered`, `products_quantity_order_min`, `products_quantity_order_units`, `products_priced_by_attribute`, `product_is_free`, `product_is_call`, `products_quantity_mixed`, `product_is_always_free_shipping`, `products_qty_box_status`, `products_quantity_order_max`, `products_sort_order`, `products_discount_type`, `products_discount_type_from`, `products_price_sorter`, `master_categories_id`, `products_mixed_discount_quantity`, `metatags_title_status`, `metatags_products_name_status`, `metatags_model_status`, `metatags_price_status`, `metatags_title_tagline_status`) VALUES(1, '" . $_POST['quantity'] . "', '" . $_POST['model'] . "', '', '" . (int)$_POST['price'] . "', 0, now(), 'now()', NULL, '" . (int)$_POST['weight'] . "', 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, '" . (int)$_POST['price'] . "', '" . (int)$_POST['category_id'] . "', 1, 0, 0, 0, 0, 0)");
$products_id = $db->Insert_ID(); // 发布商品
!$products_id && exit('insert error');
echo "[PID] $products_id";
$db -> Execute("insert into " . TABLE_PRODUCTS_TO_CATEGORIES . " (products_id, categories_id) values ('" . (int)$products_id . "', '" . $_POST['category_id'] . "')");
$db -> Execute("insert into " . TABLE_PRODUCTS_DESCRIPTION . " (products_id, language_id, products_name, products_description) values ('" . (int)$products_id . "', '" . (int)$language_id . "', '" . addslashes($_POST['title']) . "', '" . addslashes($_POST['contents']) . "')");
//$db -> Execute("insert into " . TABLE_META_TAGS_PRODUCTS_DESCRIPTION . " (products_id, language_id, `metatags_title`, `metatags_keywords`, `metatags_description`) values ('" . (int)$products_id . "', '" . (int)$language_id . "', '" . addslashes($_POST['meta_title']) . "', '" . addslashes($_POST['meta_keywords']) . "', '" . addslashes($_POST['meta_description']) . "')");

if($_POST['meta_keywords']){
	$db -> Execute("insert into " . TABLE_META_TAGS_PRODUCTS_DESCRIPTION . " (products_id, language_id, `metatags_title`, `metatags_keywords`, `metatags_description`) values ('" . (int)$products_id . "', '" . (int)$language_id . "', '" . addslashes($_POST['meta_title']) . "', '" . addslashes($_POST['meta_keywords']) . "', '" . addslashes($_POST['meta_description']) . "')");
}


if ($_POST['sprice']) { // 更新打折信息
	$products = $db -> Execute("insert into " . TABLE_SPECIALS . " (`products_id`, `specials_new_products_price`, `specials_date_added`, `specials_last_modified`, `expires_date`, `date_status_change`, `status`, `specials_date_available`) VALUES('" . (int)$products_id . "', '" . $_POST['sprice'] . "', now(), NULL, '0001-01-01', NULL, 1, '0001-01-01');");
}
if ($_POST['pprice']) { // 更新批发信息
	$pparr = array_filter(explode('|||', $_POST['pprice']));
	foreach ($pparr as $pkey => $pvalue) {
		$pinfo = explode('&&&', $pvalue);
		$db -> Execute("insert into " . TABLE_PRODUCTS_DISCOUNT_QUANTITY . " (discount_id, products_id, discount_qty, discount_price) VALUES('{$pkey}', '{$products_id}', '{$pinfo[0]}', '{$pinfo[1]}');");
		unset($pinfo);
	}
	$db->Execute("update " . TABLE_PRODUCTS . " set products_discount_type='2' where products_id='" . $products_id . "'");
}

if (!empty($_POST['images'])) { // 自动远程图片
	$array_imgs = explode('|||', $_POST['images']);
	$products_image_name=$_POST['model'];
	$products_image_name=strtolower($products_image_name);
	$products_image_name= str_replace(' ','-',$products_image_name);
	echo "$products_image_name";

	if(!empty($_POST['images_dir'])){
	$file_imgs = remote(array_unique(array_filter($array_imgs)), $products_image_name, $_POST['images_dir'] . "/", DIR_WS_IMAGES . "/" . $_POST['images_dir'] . "/");
	}else{
	$file_imgs = remote(array_unique(array_filter($array_imgs)), $products_image_name, $_POST['category_id'] . "/", DIR_WS_IMAGES . "/" . $_POST['category_id'] . "/");
	}

	foreach ($file_imgs as $key => $value) {
		if ($key == 0) {
			$products = $db -> Execute("update " . TABLE_PRODUCTS . " set products_image = '" . $value . "' where products_id = " . $products_id);
		}
	}
}



if (!empty($_POST['options_name'])) { // 添加属性
		$array_name[0]=$_POST['options_name']; //属性名称1
		$array_name[1] = empty($array_name[1]) ? 0 :$array_name[1];
		$options = $db -> Execute("select products_options_id
                                from " . TABLE_PRODUCTS_OPTIONS . "
                                where language_id = '" . (int)$language_id . "'
								and products_options_name = '" . addslashes($array_name[0]) . "'
								and products_options_type = '" . $array_name[1] . "'
                                Limit 0,1");
		if ($options -> fields['products_options_id']) {
			$optid = $options -> fields['products_options_id'];
		} else {
			$max_options_id_values = $db -> Execute("select max(products_options_id) + 1 as next_id
                                             from " . TABLE_PRODUCTS_OPTIONS);
			$optid = $max_options_id_values -> fields['next_id'];
			$optid = $optid == 0 ? 1 : $optid;
			$options = $db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS . " (`products_options_id`, `language_id`, `products_options_name`, `products_options_sort_order`, `products_options_type`, `products_options_length`, `products_options_comment`, `products_options_size`, `products_options_images_per_row`, `products_options_images_style`, `products_options_rows`) VALUES('" . $optid . "', '" . (int)$language_id . "', '" . addslashes($array_name[0]) . "', 0, '" . $array_name[1] . "', 32, NULL, 32, 0, 0, 0);");
		}

		$value=$_POST['options_size'];
		$array_attr = explode('|||', $value); // 添加属性值
		foreach (array_unique(array_filter($array_attr)) as $attr_key => $attr_value) {
			$check = $db -> Execute("select pov.products_options_values_id, pov.products_options_values_name, pov.language_id
                                from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov
                                left join " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . " pov2po on pov.products_options_values_id = pov2po.products_options_values_id
                                where pov.language_id= '" . (int)$language_id . "'
                                and pov.products_options_values_name='" . addslashes($attr_value) . "'
                                and pov2po.products_options_id ='" . (int)$optid . "'");
			if ($check -> fields['products_options_values_id']) {
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $check -> fields['products_options_values_id'] . "')");
			} else {
				$start_id = $db -> Execute("select pov.products_options_values_id from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov order by pov.products_options_values_id DESC LIMIT 1");
				$next_id = ($start_id -> fields['products_options_values_id'] + 1+$attr_key);
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES . "(products_options_values_id, language_id, products_options_values_sort_order, products_options_values_name)
                      values ('" . (int)$next_id . "',
                              '" . (int)$language_id . "',
                              '" . (int)$attr_key . "',
                              '" . addslashes($attr_value) . "')");
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . "
                    (products_options_id, products_options_values_id)
                    values ('" . (int)$optid . "', '" . (int)$next_id . "')");
				echo $attr_value;
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $next_id . "')");
			}
		}
}



if (!empty($_POST['options_name1'])) { // 自动远程图片
		$array_name[0]=$_POST['options_name1']; //属性名称1
		$array_name[1] = empty($array_name[1]) ? 0 :$array_name[1];
		$options = $db -> Execute("select products_options_id
                                from " . TABLE_PRODUCTS_OPTIONS . "
                                where language_id = '" . (int)$language_id . "'
								and products_options_name = '" . addslashes($array_name[0]) . "'
								and products_options_type = '" . $array_name[1] . "'
                                Limit 0,1");
		if ($options -> fields['products_options_id']) {
			$optid = $options -> fields['products_options_id'];
		} else {
			$max_options_id_values = $db -> Execute("select max(products_options_id) + 1 as next_id
                                             from " . TABLE_PRODUCTS_OPTIONS);
			$optid = $max_options_id_values -> fields['next_id'];
			$optid = $optid == 0 ? 1 : $optid;
			$options = $db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS . " (`products_options_id`, `language_id`, `products_options_name`, `products_options_sort_order`, `products_options_type`, `products_options_length`, `products_options_comment`, `products_options_size`, `products_options_images_per_row`, `products_options_images_style`, `products_options_rows`) VALUES('" . $optid . "', '" . (int)$language_id . "', '" . addslashes($array_name[0]) . "', 0, '" . $array_name[1] . "', 32, NULL, 32, 0, 0, 0);");
		}

		$value=$_POST['options_size1'];
		$array_attr = explode('|||', $value); // 添加属性值
		foreach (array_unique(array_filter($array_attr)) as $attr_key => $attr_value) {
			$check = $db -> Execute("select pov.products_options_values_id, pov.products_options_values_name, pov.language_id
                                from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov
                                left join " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . " pov2po on pov.products_options_values_id = pov2po.products_options_values_id
                                where pov.language_id= '" . (int)$language_id . "'
                                and pov.products_options_values_name='" . addslashes($attr_value) . "'
                                and pov2po.products_options_id ='" . (int)$optid . "'");
			if ($check -> fields['products_options_values_id']) {
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $check -> fields['products_options_values_id'] . "')");
			} else {
				$start_id = $db -> Execute("select pov.products_options_values_id from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov order by pov.products_options_values_id DESC LIMIT 1");
				$next_id = ($start_id -> fields['products_options_values_id'] + 1+$attr_key);
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES . "(products_options_values_id, language_id, products_options_values_sort_order, products_options_values_name)
                      values ('" . (int)$next_id . "',
                              '" . (int)$language_id . "',
                              '" . (int)$attr_key . "',
                              '" . addslashes($attr_value) . "')");
				$db -> Execute("insert into " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . "
                    (products_options_id, products_options_values_id)
                    values ('" . (int)$optid . "', '" . (int)$next_id . "')");
				echo $attr_value;
				$db -> Execute("insert into " . TABLE_PRODUCTS_ATTRIBUTES . " (products_id, options_id, options_values_id) values('" . $products_id . "', '" . $optid . "', '" . $next_id . "')");
			}
		}
}





function locoy_zen_create_manufacturer($name = '', $language_id = '1') {
	global $db;
	$manufacturer = $db -> Execute("select c.manufacturers_id
                                from " . TABLE_MANUFACTURERS . " c, " . TABLE_MANUFACTURERS_INFO . " cd
                                where c.manufacturers_id = cd.manufacturers_id
                                and cd.languages_id = '" . (int)$language_id . "'
								and c.manufacturers_name = '" . addslashes($_POST['manufacturers_name']) . "'
                                Limit 0,1");
	if ($manufacturer -> fields['manufacturers_id']) {
		return $manufacturer -> fields['manufacturers_id'];
	} else {
		$db -> Execute("insert into " . TABLE_MANUFACTURERS . " (manufacturers_name, date_added) values ('" . addslashes($_POST['manufacturers_name']) . "', now())");
		$manufacturers_id = $db->Insert_ID();
		$db -> Execute("insert into " . TABLE_MANUFACTURERS_INFO . " (manufacturers_id, languages_id) values ('" . $manufacturers_id . "', '" . $language_id . "')");
		return $manufacturers_id;
	}
}

function locoy_zen_create_category($name = '', $parent_id = '0', $language_id = '1') {
	global $db;
	$categorie = $db -> Execute("select c.categories_id, cd.categories_name, c.parent_id
                                from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd
                                where c.categories_id = cd.categories_id
                                and cd.language_id = '" . (int)$language_id . "'
                                and c.parent_id = '" . (int)$parent_id . "'
								and cd.categories_name = '" . addslashes($name) . "'
                                order by c.sort_order Limit 0,1");
	if ($categorie -> fields['categories_id']) {
		return $categorie -> fields['categories_id'];
	} else {
		$db -> Execute("insert into " . TABLE_CATEGORIES . " (sort_order, parent_id, date_added) values ('0', '" . $parent_id . "', now())");
		$categories_id = $db->Insert_ID();
		$db -> Execute("insert into " . TABLE_CATEGORIES_DESCRIPTION . " (categories_name, categories_description, categories_id, language_id) values ('" . addslashes($name) . "', '', '" . $categories_id . "', '" . $language_id . "')");
		return $categories_id;
	}
}

function locoy_zen_get_category_tree($parent_id = '0', $spacing = '', $exclude = '', $category_tree_array = '', $include_itself = false, $category_has_products = false, $limit = false) {
	global $db;

	if ($limit) {
		$limit_count = " limit 1";
	} else {
		$limit_count = '';
	}

	if (!is_array($category_tree_array)) $category_tree_array = array();
	if ((sizeof($category_tree_array) < 1) && ($exclude != '0')) $category_tree_array[] = array('id' => '0', 'text' => TEXT_TOP);

	if ($include_itself) {
		$category = $db -> Execute("select cd.categories_name
                                from " . TABLE_CATEGORIES_DESCRIPTION . " cd
                                where cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and cd.categories_id = '" . (int)$parent_id . "'");

		$category_tree_array[] = array('id' => $parent_id, 'text' => $category -> fields['categories_name']);
	}

	$categories = $db -> Execute("select c.categories_id, cd.categories_name, c.parent_id
                                from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd
                                where c.categories_id = cd.categories_id
                                and cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                and c.parent_id = '" . (int)$parent_id . "'
                                order by c.sort_order, cd.categories_name");

	while (!$categories -> EOF) {
		if ($category_has_products == true and zen_products_in_category_count($categories -> fields['categories_id'], '', false, true) >= 1) {
			$mark = '*';
		} else {
			$mark = '&nbsp;&nbsp;';
		}
		if ($exclude != $categories -> fields['categories_id']) $category_tree_array[] = array('id' => $categories -> fields['categories_id'], 'text' => $spacing . $categories -> fields['categories_name'] . $mark);
		$category_tree_array = locoy_zen_get_category_tree($categories -> fields['categories_id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $category_tree_array, '', $category_has_products);
		$categories -> MoveNext();
	}
	return $category_tree_array;
}




function remote($urls, $name = '', $path = '', $dir = './') {
	if (!is_array($urls) or count($urls) == 0) {
		return false;
	}
	dmkdir($dir);
	foreach($urls as $k => $v) {
		
		if (!empty($v) && preg_match("~^http~i", $v)) {
			$nurl[$k] = trim($v);
			if ($k == 0) {
				$fname[$k] = strtolower($name . '.jpg');
			} else {
				$count = sprintf("%03d",$k);
				$fname[$k] = strtolower($name . '_' . $count . '.jpg');
			}
			$data = curl_getcontent($nurl[$k]);
			$filedir[$k] = $dir . $fname[$k];
			 file_put_contents($filedir[$k], $data);
			 $filepath[$k] = $path . $fname[$k];
		}
	
	}
	  return $filepath;
}




function  curl_getcontent($url){
        $curl = curl_init($url);
        $header = array();
        $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
        $header[] = 'Accept-Encoding: gzip, deflate, sdch';
        $header[] = 'Accept-Language: en-US,en;q=0.8';
        $header[] = 'Cache-Control: max-age=0';
        $header[] = 'Connection: keep-alive';
        $header[] = 'CLIENT-IP:108.162.219.199'; 
        $header[] = 'X-FORWARDED-FOR:108.162.219.199';  
        $header[] = 'Referer:http://www.perfectkickz.ru/index.htm';
        $header[] = 'Cookie: Comm100_CC_Identity_219872=-106536; __cfduid=d04818789bafc8cbba6bbdc26c17be1d81480639902; Comm100_CC_Identity_219872=-106437; a2403_times=2; comm100_session_219872=-129200; comm100_guid2_219872=4ff024819d004a5eb32fbb26b61186d9; JSESSIONID=2A5CE583C7A582D15B2B3941C120EFA6; _ga=GA1.2.2009008181.1480639881; _gat=1';
        $header[] = 'Connection: keep-alive';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        // 不输出header头信息
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        // 伪装浏览器
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36 OPR/41.0.2353.69');
        // 保存到字符串而不是输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($curl);
        curl_close($curl);
        return $html;
        //echo $rs;
}  




function dmkdir($dir, $mode = 0777) {
	if (!is_dir($dir)) {
		dmkdir(dirname($dir));
		@mkdir($dir, $mode);
		@touch($dir . '/index.htm');
		@chmod($dir . '/index.htm', 0777);
	}
	return true;
}



/*************在线发布*******************/
-->
















