<?php echo $header; ?>
    <?php echo $column_left; ?>
        <div id="content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-filter').submit() : false;"><i class="fa fa-trash-o"></i></button>
                    </div>
                    <h1><?php echo $heading_title; ?></h1>
                    <ul class="breadcrumb">
                        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                            <li>
                                <a href="<?php echo $breadcrumb['href']; ?>">
                                    <?php echo $breadcrumb['text']; ?>
                                </a>
                            </li>
                            <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <?php if ($error_warning) { ?>
                    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>
                        <?php echo $error_warning; ?>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    <?php } ?>
                        <?php if ($success) { ?>
                            <div class="alert alert-success"><i class="fa fa-check-circle"></i>
                                <?php echo $success; ?>
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3> </div>
                                    <div class="panel-body">
                                        <form action="<?php echo $add; ?>" method="post" enctype="multipart/form-data" id="form-status" class="form-horizontal">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:100px;" class="text-left">商品上传</td>
                                                            <td class="text-center" style="width:200px;">
                                                                <lable>型号:</lable>
                                                                <input id="model" class="form-control" name="model" value="" type="text"> </td>
                                                            <td style="width:100px;" class="text-center">
                                                                <lable>图片开始id:</lable>
                                                                <input id="imgnum" class="form-control" name="imgnum" value="" type="text"> </td>
                                                            <td class="text-right">
                                                                <button type="submit" form="form-status" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="保存"><i class="fa fa-save"></i></button>
                                                            </td>
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