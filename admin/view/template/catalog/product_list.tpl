<?php echo $header; ?>
    <?php echo $column_left; ?>
        <div id="content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="pull-right"><a href="http://localhost/online/admin/index.php?route=catalog/product/add&amp;token=QugDb6BJQLIoFN4bfte9TbOHfXGPky28" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="新增"><i class="fa fa-plus"></i></a>
                        <button type="submit" form="form-product" formaction="http://localhost/online/admin/index.php?route=catalog/product/copy&amp;token=QugDb6BJQLIoFN4bfte9TbOHfXGPky28" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="复制"><i class="fa fa-copy"></i></button>
                        <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('确定吗？') ? $('#form-product').submit() : false;" data-original-title="删除"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <h1>商品</h1>
                    <ul class="breadcrumb">
                        <li><a href="http://localhost/online/admin/index.php?route=common/dashboard&amp;token=QugDb6BJQLIoFN4bfte9TbOHfXGPky28">首页</a></li>
                        <li><a href="http://localhost/online/admin/index.php?route=catalog/product&amp;token=QugDb6BJQLIoFN4bfte9TbOHfXGPky28">商品</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list"></i> 商品列表</h3> </div>
                    <div class="panel-body">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="input-price">价格</label>
                                        <input name="filter_price" value="" placeholder="价格" id="input-price" class="form-control" type="text"> </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-quantity">数量</label>
                                        <input name="filter_quantity" value="" placeholder="数量" id="input-quantity" class="form-control" type="text"> </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="input-image">尺码1</label>
                                        <select id="selectoption_id3" name="filter_image" id="input-image" class="form-control">
                                            <option value="Select Size|||US8/UK7/EURO41|||US8.5/UK7.5/EURO42|||US9/UK8/EUR42.5|||US9.5/UK8.5/EURO43|||US10/UK9/EURO44|||US10.5/UK9.5/EURO44.5|||US11/UK10/EURO45|||US12/UK11/EURO46|||US13/UK12/EURO47.5">Men Jordan Size</option>
                                            <option value="Select Size|||US8/UK7.5/Eur41 1/3|||US8.5/UK8/Eur42|||US9/UK8.5/Eur42 2/3|||US9.5/UK9/Eur43 1/3|||US10/UK9.5/Eur44|||US10.5/UK10/Eur44 2/3|||US11/UK10.5/Eur45 1/3|||US11.5/UK11/Eur46|||US12/UK11.5/Eur46 2/3">Adidas Size</option>
                                            <option value="Select Size|||US4/UK3.5/EUR36|||US5/UK4.5/EUR37 1/3|||US5.5/UK5/EUR38|||US6/UK5.5/EUR38 2/3|||US6.5/UK6/EUR39 1/3|||US7/UK6.5/EUR40">Adidas GS Size</option>
                                            <option value="Select Size|||US4/UK3.5/EUR36|||US5/UK4.5/EUR37 1/3|||US5.5/UK5/EUR38|||US6/UK5.5/EUR38 2/3|||US6.5/UK6/EUR39 1/3|||US7/UK6.5/EUR40">Women Size</option>
                                            <option value="38|||39|||40|||41|||42|||43|||44|||45">CL Size</option>
                                            <option value="38|||39|||40|||41|||42|||43|||44|||45">Size</option>
                                            <option value="Select Size|||US4.0/UK3.5/EUR36|||US4.5/UK4.0/EUR36.5|||US5.0/UK4.5/EUR37.5|||US5.5/UK5.0/EUR38.0|||US6.0/UK5.5/EUR38.5|||US6.5/UK6.0/EUR39.0">GS Size</option>
                                            <option value="Select Size|||US7/UK6/EUR40|||US8/UK7/EURO41|||US8.5/UK7.5/EURO42|||US9.5/UK8.5/EURO43|||US10/UK9/EURO44|||US11/UK10/EURO45|||US12/UK11/EURO46|||US13/UK12/EURO47">Men Size</option>
                                            <option value="Select Size|||US5.5/UK3/EUR36|||US6.5/UK4/EUR37|||US7/UK4.5/EUR38|||US8/UK5.5/EUR39|||US8.5/UK6/EUR40">Women Size</option>
                                            <option value="Select Size|||US8/UK7.5/Eur41 1/3|||US8.5/UK8/Eur42|||US9/UK8.5/Eur42 2/3|||US9.5/UK9/Eur43 1/3|||US10/UK9.5/Eur44|||US10.5/UK10/Eur44 2/3|||US11/UK10.5/Eur45 1/3|||US11.5/UK11/Eur46|||US12/UK11.5/Eur46 2/3|||US13/UK12.5/Eur48">Adidas Size</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-image">尺码2</label>
                                        <select id="selectoption_id4" name="filter_image" id="input-image" class="form-control">
                                            <option value="Select Size|||US8/UK7/EURO41|||US8.5/UK7.5/EURO42|||US9/UK8/EUR42.5|||US9.5/UK8.5/EURO43|||US10/UK9/EURO44|||US10.5/UK9.5/EURO44.5|||US11/UK10/EURO45|||US12/UK11/EURO46|||US13/UK12/EURO47.5">Men Jordan Size</option>
                                            <option value="Select Size|||US8/UK7.5/Eur41 1/3|||US8.5/UK8/Eur42|||US9/UK8.5/Eur42 2/3|||US9.5/UK9/Eur43 1/3|||US10/UK9.5/Eur44|||US10.5/UK10/Eur44 2/3|||US11/UK10.5/Eur45 1/3|||US11.5/UK11/Eur46|||US12/UK11.5/Eur46 2/3">Adidas Size</option>
                                            <option value="Select Size|||US4/UK3.5/EUR36|||US5/UK4.5/EUR37 1/3|||US5.5/UK5/EUR38|||US6/UK5.5/EUR38 2/3|||US6.5/UK6/EUR39 1/3|||US7/UK6.5/EUR40">Adidas GS Size</option>
                                            <option value="Select Size|||US4/UK3.5/EUR36|||US5/UK4.5/EUR37 1/3|||US5.5/UK5/EUR38|||US6/UK5.5/EUR38 2/3|||US6.5/UK6/EUR39 1/3|||US7/UK6.5/EUR40">Women Size</option>
                                            <option value="38|||39|||40|||41|||42|||43|||44|||45">CL Size</option>
                                            <option value="38|||39|||40|||41|||42|||43|||44|||45">Size</option>
                                            <option value="Select Size|||US4.0/UK3.5/EUR36|||US4.5/UK4.0/EUR36.5|||US5.0/UK4.5/EUR37.5|||US5.5/UK5.0/EUR38.0|||US6.0/UK5.5/EUR38.5|||US6.5/UK6.0/EUR39.0">GS Size</option>
                                            <option value="Select Size|||US7/UK6/EUR40|||US8/UK7/EURO41|||US8.5/UK7.5/EURO42|||US9.5/UK8.5/EURO43|||US10/UK9/EURO44|||US11/UK10/EURO45|||US12/UK11/EURO46|||US13/UK12/EURO47">Men Size</option>
                                            <option value="Select Size|||US5.5/UK3/EUR36|||US6.5/UK4/EUR37|||US7/UK4.5/EUR38|||US8/UK5.5/EUR39|||US8.5/UK6/EUR40">Women Size</option>
                                            <option value="Select Size|||US8/UK7.5/Eur41 1/3|||US8.5/UK8/Eur42|||US9/UK8.5/Eur42 2/3|||US9.5/UK9/Eur43 1/3|||US10/UK9.5/Eur44|||US10.5/UK10/Eur44 2/3|||US11/UK10.5/Eur45 1/3|||US11.5/UK11/Eur46|||US12/UK11.5/Eur46 2/3|||US13/UK12.5/Eur48">Adidas Size</option>
                                        </select>
                                    </div>
                                    <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-filter"></i> 筛选</button>
                                </div>
                            </div>
                        </div>
                       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal">
                           
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
                                            <td style="width: 200px;" class="text-center">尺码名称</td>
                                            <td style="width: 300px;" class="text-center">尺码值</td>
                                            <td style="width: 200px;" class="text-center">尺码名称1</td>
                                            <td style="width: 300px;" class="text-center">尺码值1</td>
                                            <td class="text-right">操作</td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       
                                       
                                       <?php foreach($product as $key=>$product_value){   ?>
                                        <tr>
                                            <td class="text-center">
                                             <input name="selected[]" value="42" type="checkbox"> </td>
                                             <td class="text-center"><input class="form-control" name="name1" type="text" value="<?php echo $product_value['name'];  ?>"></td>
                                             <td class="text-center"><input class="form-control" id="cate" name="category1" type="text" value=""></td>
                                             <td class="text-center"><input class="form-control" name="model1" type="text" value="<?php echo $product_value['model'];  ?>"></td>
                                             <td style="display:none;" class="text-center"><input class="form-control" name="imagedir1" type="text" value="<?php echo $product_value['image_dir'];  ?>"></td>
                                              <td style="display:none;" class="text-center"><input class="form-control" name="image1" type="text" value="<?php echo $product_value['image'];  ?>"></td>
                                             <td class="text-center"><input class="form-control" name="price1" type="text" value=""></td>
                                             <td class="text-center"><input id="optionname" class="form-control" name="optiona1" type="text" value=""></td>
                                             <td class="text-center"><input id="optionvalue" class="form-control" name="valuea1" type="text" value=""></td>
                                             <td class="text-center"><input id="optionname1" class="form-control" name="optionb1" type="text" value=""></td>
                                             <td class="text-center"><input id="optionvalue1" class="form-control" name="valueb1" type="text" value=""></td>
                                            <td class="text-right"><button type="submit" form="form-product" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
                                        </tr>
                                     <?php   } ?> 
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            
                        </form>
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                        </div>
                    </div>
                </div>
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
        
        
        
        <?php echo $footer; ?>