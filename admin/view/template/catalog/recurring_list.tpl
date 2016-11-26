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