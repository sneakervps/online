<?php
class ModelCatalogImageRename extends Model {

 
    
    
    
    
    
public function curl_post($url, $data) 
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
    
    
    
    
    
 public function dir_size($dir){
     $dh = @opendir($dir);             //打开目录，返回一个目录流
     $return = array();
      $i = 0;
          while($file = @readdir($dh)){     //循环读取目录下的文件
             if($file!='.' and $file!='..'){
              $path = $dir.'/'.$file;     //设置目录，用于含有子目录的情况
              if(is_dir($path)){
          }elseif(is_file($path)){
              $filesize[] =  round((filesize($path)/1024),2);//获取文件大小
              $filename[] = $path;//获取文件名称                     
              $filetime[] = date("Y-m-d H:i:s",filemtime($path));//获取文件最近修改日期    
   
              $return[] = $file;
          }
          }
          }  
          @closedir($dh);             //关闭目录流
          //array_multisort($filesize,SORT_DESC,SORT_NUMERIC, $return);//按大小排序
          array_multisort($filename,SORT_ASC,SORT_STRING, $return);//按名字排序
          //array_multisort($filetime,SORT_DESC,SORT_STRING, $files);//按时间排序
          return $return;               //返回文件
     }   
    
    
    
    
    
    
    
public function frename($dirname,$imagename='',$imgnum='0'){
    
    
   
    
   $productnum=$this->model_catalog_product->getProductNum();
   $data['products_date_added'] = date('Y-m-d');
    if($productnum[0]['products_date_added']!=$data['products_date_added']){
         $data['products_number']=0;
         $this->model_catalog_product->updateProductNum($data);
         $imgcount=0;
    }else{
        $imgcount=$productnum[0]['products_number'];
        $data['products_number']=$imgcount+1;
        $this->model_catalog_product->updateProductNum($data);
    }
    

  if(!is_dir($dirname)){
  exit();
 }
    
   $handle = opendir($dirname); 
   while(($fn = readdir($handle))!==false){
       if($fn!='.'&&$fn!='..'){
           $curDir = $dirname.'/'.$fn;
           $fn = iconv('GB2312','UTF-8',$fn);
           $imgcount++;
           $products=$this->imagerename($curDir,$imgcount,$imagename,$imgnum);
           $this->unlinkDir($curDir);
           $product[$imgcount]['image']=$products['image'];
           $product[$imgcount]['image_dir']=$products['image_dir'];
           $product[$imgcount]['model']=$products['model'];
           $product[$imgcount]['name']=$fn;
          
       }
   }
   
    if(isset($product)){
        return $product;
    } 
}

    
    
    
    
    
    
public function createDir($aimUrl) {
        $aimUrl = str_replace('', '/', $aimUrl);
        $aimDir = '';
        $arr = explode('/', $aimUrl);
        $result = true;
        foreach ($arr as $str) {
            $aimDir .= $str . '/';
            if (!file_exists($aimDir)) {
                $result = mkdir($aimDir);
            }
        }
        return $result;
    }      
    
    
    
    
    
 public function unlinkDir($aimDir) {
        $aimDir = str_replace('', '/', $aimDir);
        $aimDir = substr($aimDir, -1) == '/' ? $aimDir : $aimDir . '/';
        if (!is_dir($aimDir)) {
            return false;
        }
        $dirHandle = opendir($aimDir);
        while (false !== ($file = readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!is_dir($aimDir . $file)) {
                $this->unlinkFile($aimDir . $file);
            } else {
                $this->unlinkDir($aimDir . $file);
            }
        }
        closedir($dirHandle);
        return rmdir($aimDir);
    }    
    
    
public function unlinkFile($aimUrl) {
        if (file_exists($aimUrl)) {
            unlink($aimUrl);
            return true;
        } else {
            return false;
        }
    }      
    
    
    


 public function imagerename($imagedirname,$imgcount,$imagename,$imgnum){
    $image_url='';
    $addimage_url='';
    $imagesfile=$this->dir_size($imagedirname);
    $handle = opendir($imagedirname);  
    
    if($imgnum){
        $i=$imgnum;
    }else{
       $i=0; 
       $imgnum=0;
    }
    
      
     
foreach($imagesfile as $key=>$value){
        $curDir = $imagedirname.'/'.$value;
        $count = sprintf("%03d",$i);
        $path = pathinfo($curDir);
        if($imagename!=''){ //更新图片
             $products_image_name=$imagename;
             $pathname='../upload/'.date("Ym").'/'.$products_image_name;
            }else{   //新产品图片
             $products_image_name=date("md");
             $products_image_name='16'.$products_image_name.$imgcount;
             $pathname='../upload/'.date("Ym").'/'.$products_image_name;
            }
    
         if($path['extension']=='jpg'||$path['extension']=='JPG'){
            if($i==$imgnum){
              $this->createDir($pathname);
              @$newname = $pathname.'/'.$products_image_name.'.jpg';
              $image_url=$image_url.'http://online.sneakercon.biz/upload/'.date("Ym").'/'.$products_image_name.'/'.$products_image_name.'.jpg<br />';
              $image_url_main='http://online.sneakercon.biz/upload/'.date("Ym").'/'.$products_image_name.'/'.$products_image_name.'.jpg';
              $product[$imgcount]['image_name']= $products_image_name; 
              $product[$imgcount]['image_dir']= date("Ym").'/'.date("d"); 
            }else{
              @$newname = $pathname.'/'.$products_image_name.'_'.$count.'.jpg';
              $addimage_url=$addimage_url.'|||'.'http://online.sneakercon.biz/upload/'.date("Ym").'/'.$products_image_name.'/'.$products_image_name.'_'.$count.'.jpg';
            }


            //图片压缩成800,600
            $this->resize($curDir,1000,800);
            rename($curDir,$newname);   
            $i++; 
        }
    
} 
    $product['image']=$image_url_main.$addimage_url;
    $product['image_dir']=date("Ym").'/'.date("d");
    $product['model']=$products_image_name;
    return $product;
}
    
 
    

/**   
* 添加背景   
* @param string $src 图片路径   
* @param int $w 背景图像宽度   
* @param int $h 背景图像高度   
* @param String $first 决定图像最终位置的，w 宽度优先 h 高度优先 wh:等比   
* @return 返回加上背景的图片   
* **/    
public function addBg($src,$w,$h,$fisrt="w")     
{     
    $bg=imagecreatetruecolor($w,$h);     
    $white = imagecolorallocate($bg,255,255,255);     
    imagefill($bg,0,0,$white);//填充背景     
    
    //获取目标图片信息     
    $info=$this->getImageInfo($src);     
    $width=$info[0];//目标图片宽度     
    $height=$info[1];//目标图片高度     
    $img=$this->create($src); 
 
}        
    
    
    
/**   
* 创建图片，返回资源类型   
* @param string $src 图片路径   
* @return resource $im 返回资源类型    
* **/    
 public function create($src)     
{     
    $info=$this->getImageInfo($src);     
    switch ($info[2])     
    {     
        case 1:     
            $im=imagecreatefromgif($src);  
            //$im=imagecreatefromjpeg($src);    
            break;     
        case 2:     
            $im=imagecreatefromjpeg($src);     
            break;     
        case 3:     
            $im=imagecreatefrompng($src);  
            //$im=imagecreatefromjpeg($src);    
            break;     
    }     
    return $im;     
}       
    
 function getImageInfo($src)     
{     
    return getimagesize($src);     
}    
    
  
/**   
* 缩略图主函数   
* @param string $src 图片路径   
* @param int $w 缩略图宽度   
* @param int $h 缩略图高度   
* @return mixed 返回缩略图路径   
* **/    
    
 public function resize($src,$w,$h)     
{     
    $temp=pathinfo($src);     
    $name=$temp["basename"];//文件名     
    $dir=$temp["dirname"];//文件所在的文件夹     
    $extension=$temp["extension"];//文件扩展名     
    $savepath="{$dir}/{$name}";//缩略图保存路径,新的文件名为*.thumb.jpg     
    
    //获取图片的基本信息     
    $info=$this->getImageInfo($src);     
    $width=$info[0];//获取图片宽度     
    $height=$info[1];//获取图片高度     
    $per1=round($width/$height,2);//计算原图长宽比     
    $per2=round($w/$h,2);//计算缩略图长宽比     
    
    //计算缩放比例     
    if($per1>$per2||$per1==$per2)     
    {     
        //原图长宽比大于或者等于缩略图长宽比，则按照宽度优先     
        $per=$w/$width;     
    }     
    if($per1<$per2)     
    {     
        //原图长宽比小于缩略图长宽比，则按照高度优先     
        $per=$h/$height;     
    }     
    $temp_w=intval($width*$per);//计算原图缩放后的宽度     
    $temp_h=intval($height*$per);//计算原图缩放后的高度     
    $temp_img=imagecreatetruecolor($temp_w,$temp_h);//创建画布     
    $im=$this->create($src);     
    imagecopyresampled($temp_img,$im,0,0,0,0,$temp_w,$temp_h,$width,$height);     
    if($per1>$per2)     
    {     
        imagejpeg($temp_img,$savepath, 96);     
        imagedestroy($im);     
        return $this->addBg($savepath,$w,$h,"w");     
        //宽度优先，在缩放之后高度不足的情况下补上背景     
    }     
    if($per1==$per2)     
    {     
        imagejpeg($temp_img,$savepath, 96);     
        imagedestroy($im);     
        return $savepath;     
        //等比缩放     
    }     
    if($per1<$per2)     
    {     
        imagejpeg($temp_img,$savepath, 96);     
        imagedestroy($im);     
        return $this->addBg($savepath,$w,$h,"h");     
        //高度优先，在缩放之后宽度不足的情况下补上背景     
    }     
}         
        
    
    
    
    
    
    
    
}