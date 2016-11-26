<?php echo $header; ?><?php echo $column_left; ?>
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
            <div class="container-fluid recurring">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list"></i> 商品列表</h3> </div>
                    <div class="panel-body">
                        
                       <form action="<?php echo $priceaction; ?>" method="post" enctype="multipart/form-data" id="form-price" class="form-horizontal">
                           
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:100px;" class="text-left">价格更新</td>
                                             <!--td class="text-center"><input id="name" class="form-control" name="name" type="text" value=""></td-->
                                             <td class="text-center"><lable>型号:</lable><input id="model" class="form-control" name="model" type="text" value=""></td>
                                             <td class="text-center"><lable>特价:</lable><input id="specials" class="form-control" name="specials" type="text" value=""></td>
                                             <td class="text-center"><lable>特价时间:</lable><input id="specialstime" class="form-control" name="specialstime" type="text" value=""></td>
                                             <td class="text-center"><lable>价格:</lable><input id="price" class="form-control" name="price" type="text" value=""></td>
                                            <td class="text-right"><button type="submit" form="form-price" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
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
                       <form action="<?php echo $statusaction; ?>" method="post" enctype="multipart/form-data" id="form-status" class="form-horizontal">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:100px;" class="text-left">商品上架下架</td>
                                             <td class="text-center"><lable>型号:</lable><input id="model" class="form-control" name="model" type="text" value=""></td>
                                             <td class="text-center">
                                             <select id="product_status" class="form-control" name="status">
                                             <option value="0">下架</option>
                                             <option value="1">上架</option>
                                             </select>
                                            </td>
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
                       <form action="<?php echo $sizeaction; ?>" method="post" enctype="multipart/form-data" id="form-size" class="form-horizontal">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:100px;" class="text-left">鞋子尺码</td>
                                             <td class="text-center"><lable>型号:</lable><input id="model" class="form-control" name="model" type="text" value=""></td>
                                             <td class="text-center"><lable>属性1:</lable><input id="optionname" class="form-control" name="options_name" type="text" value=""></td>
                                             <td class="text-center"><lable>尺码1:</lable><input id="optionvalue" class="form-control" name="options_size" type="text" value=""></td>
                                             <td class="text-center"><lable>属性2:</lable><input id="optionname1" class="form-control" name="options_name1" type="text" value=""></td>
                                             <td class="text-center"><lable>尺码2:</lable><input id="optionvalue1" class="form-control" name="options_size1" type="text" value=""></td>
                                             <td class="text-center">
                                             <select id="selectoption_id3" name="filter_image" class="form-control">
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
                                            </td>
                                             <td class="text-center">
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
                                            </td>
                                            <td class="text-right"><button type="submit" form="form-size" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
                                        </tr>
                                        
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
                </script>                                 
                                                                          
                                                                                            
                                                                                                                                
                    
                    
       
                    <div class="panel-body">
                       <form action="<?php echo $westernunionaction; ?>" method="post" enctype="multipart/form-data" id="form-westernun" class="form-horizontal">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td style="width:100px;" class="text-left">西联修改</td>
                                             <td class="text-center"><lable>First Name(名字):</lable><input id="firstname" class="form-control" name="firstname" type="text" value=""></td>
                                             <td class="text-center"><lable>Last Name(姓):</lable><input id="lastname" class="form-control" name="lastname" type="text" value=""></td>
                                             <td class="text-center"><lable>电话:</lable><input id="telephone" class="form-control" name="telephone" type="text" value=""></td>
                                            <td class="text-right"><button type="submit" form="form-westernun" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button></td>
                                        </tr>
                                        
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
        
        

        
<?php echo $footer; ?>