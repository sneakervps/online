<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a> <a href="<?php echo $repair; ?>" data-toggle="tooltip" title="<?php echo $button_rebuild; ?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-category').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      
      
      
      
                       <div class="panel-body">
                       <form  method="post" enctype="multipart/form-data" id="form-status" class="form-horizontal">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:100px;" class="text-left">商品上传</td>
                                             <td class="text-center"><lable>beyourjordans.club商品网站:</lable><input id="beyourjordans" class="form-control" name="beyourjordans" value="" type="text"></td>
                                             
                                             <td class="text-center"><lable>perfectkickz.ru商品网站:</lable><input id="perfectkickz" class="form-control" name="perfectkickz" value="" type="text"></td>
                                            <td class="text-right"><button type="submit" form="form-status" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                        </div>
                    </div>
      
     
      
       
        
                   <div class="panel-body">
                          
                          
                      <?php  if(isset($product_name)&&isset($images)){  ?>    
                    <div class="well">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label" for="input-name">分类</label>
                                        <select id="select_id" name="topcata" class="form-control">
                                         <option disabled="" selected="">选择一级分类</option>
                                           <?php foreach($topcategories as $key=>$categorie_value){  
                                           
                                           echo '<option value="'.$categorie_value['categories_id'].'">'.$categorie_value['categories_name'].'</option>';
                                           
                                          }  ?>
                                        </select>
                                        
                                        
                                        <select id="select_id1" name="topcata1" class="form-control">
                                           <option disabled="" selected="">选择二级分类</option>
                                        </select>
                                        
                                        <select id="select_id2" name="topcata2" class="form-control">
                                          <option disabled="" selected="">选择三级分类</option>
                                        </select>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>
                         <?php  }  ?> 
                          
                           <form action="<?php echo $add; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td style="width: 1px;" class="text-center">
                                                <input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox">
                                            </td>
                                            
                                            <td style="width: 300px;" class="text-left">商品名称</td>
                                            <td style="width: 300px;" class="text-left">商品分类</td>
                                            <td style="width: 120px;" class="text-left">型号</td>
                                            <td style="width: 100px;" class="text-right">价格</td>
                                            <td style="width: 100px;" class="text-right">特价</td>
                                            <td style="width: 200px;" class="text-center">尺码名称</td>
                                            <td style="width: 300px;" class="text-center">尺码值</td>
                                            <td style="width: 120px;" class="text-left">图片</td>
                                            <td class="text-right">操作</td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php

                                        if(isset($product_name)&&isset($images)){ 
                                    
                                        ?>
                                         
                                        <tr>
                                            <td class="text-center">
                                             <input name="selected[]" value="42" type="checkbox"> </td>
                                             <td class="text-center"><input class="form-control" name="name1" type="text" value="<?php echo $product_name;  ?>"></td>
                                             <td class="text-center"><input class="form-control" id="cate" name="category1" type="text" value="<?php echo $cate; ?>"></td>
                                             <td class="text-center"><input class="form-control" name="model1" type="text" value="<?php echo $model;  ?>"></td>
                                             <td style="display:none;" class="text-center"><input class="form-control" name="imagedir1" type="text" value="<?php echo $image_dir;  ?>"></td>
                                             <td class="text-center"><input class="form-control" name="price1" type="text" value="<?php echo $price;  ?>"></td>
                                             <td class="text-center"><input class="form-control" name="special" type="text" value="<?php echo $special;  ?>"></td>
                                             <td class="text-center"><input id="optionname" class="form-control" name="optiona1" type="text" value="Size"></td>
                                             <td class="text-center"><input id="optionvalue" class="form-control" name="valuea1" type="text" value="<?php echo $size;  ?>"></td>
                                             <td class="text-center"><input class="form-control" name="image1" type="text" value="<?php echo $images;  ?>"></td>
                                            <td class="text-right"><button type="submit" form="form-product" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
                                        </tr>
                                     <?php   }else{
                                               
                                            }
                                       
                                        
                                          ?> 
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                        </div>
                    </div> 
      
      
      
              <script>
            
            $('#selectoption_id3').change(function(){
              var optionname=$("#selectoption_id3").find("option:selected").text();
              var optionvalue=$("#selectoption_id3").find("option:selected").val();
              $('#optionname').val(optionname);
              $('#optionvalue').val(optionvalue);
            });


            $('#selectoption_id4').change(function(){
              var optionname=$("#selectoption_id4").find("option:selected").text();
              var optionvalue=$("#selectoption_id4").find("option:selected").val();
              $('#optionname1').val(optionname);
              $('#optionvalue1').val(optionvalue);
            });
            
            $("#select_id").change(function(){
                 var topcateid=$("#select_id").val();
                  $.get('index.php?route=catalog/product/ajaxcate&token=<?php echo $token; ?>',{'checkValue':$("#select_id").val()},function(data){
                     $('#select_id1').html(data);
                     $('#select_id2').html('<option disabled="" selected="">选择三级分类</option>');
                  });  
                
                  var checkText1=$("#select_id").find("option:selected").text();
                  var catevalue=checkText1;
                  $('#cate').html(catevalue);
                  $('#cate').val(catevalue);
                
                
            });
            
            
           $("#select_id1").change(function(){
                 var twocateid=$("#select_id1").val();
                 $.get('index.php?route=catalog/product/ajaxcate&token=<?php echo $token; ?>',{'checkValue':$("#select_id1").val()},function(data){
                     $('#select_id2').html(data);
                  });     
               
                  var checkText1=$("#select_id").find("option:selected").text();
                  var checkText2=$("#select_id1").find("option:selected").text();
                  var catevalue=checkText1+'|||'+checkText2;
                  $('#cate').html(catevalue);
                  $('#cate').val(catevalue);
               
               
            });
            
            
             $("#select_id2").change(function(){
                  var checkText1=$("#select_id").find("option:selected").text();
                  var checkText2=$("#select_id1").find("option:selected").text();
                  var checkText3=$("#select_id2").find("option:selected").text();
                  var catevalue=checkText1+'|||'+checkText2+'|||'+checkText3;
                  $('#cate').html(catevalue);
                  $('#cate').val(catevalue);
             });
            
            
        </script>
      
      

    </div>
  </div>
</div>
<?php echo $footer; ?>