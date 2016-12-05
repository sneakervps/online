<?php


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











/*********bof更新图片*******/
if ($_POST['key']=='Y4filUxH'&&$_POST['postdate']=='imageupdate'&&$_POST['images']!='') {
    
    if (!empty($_POST['images'])) { // 自动远程图片
        $array_imgs = explode('|||', $_POST['images']);
        $products_image_name=$_POST['model'];    
        $images_dir='20'.substr($products_image_name,0,4).'/'.substr($products_image_name,4,2);
        
        $file_imgs = remote(array_unique(array_filter($array_imgs)), $products_image_name, $images_dir . "/", DIR_WS_IMAGES . "/" . $images_dir . "/");

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

function remote($urls, $name = '', $path = '', $dir = './') {
	if (!is_array($urls) or count($urls) == 0) {
		return false;
	}

	foreach($urls as $k => $v) {
		
		if (!empty($v) && preg_match("~^http~i", $v)) {
			$nurl[$k] = trim($v);
			if ($k == 0) {
				$fname[$k] = strtolower($name . '.jpg');
			} else {
				$count = sprintf("%03d",$k);
				$fname[$k] = strtolower($name . '_' . $count . '.jpg');
			}
			unlinkFile($path . $fname[$k]);
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