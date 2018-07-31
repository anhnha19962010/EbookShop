<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hãng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hãng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('msg')) {?>
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form id="frmMain" method="POST" action="<?php echo site_url()?>admin/brands/action">
                        <div class="box-header addcategory">
                            <h3 class="box-title">&nbsp;</h3>

                            <div class="box-tools">
                                <div class="btn-group pull-right">
                                    <a class="btn btn-sm btn-primary " href="<?php echo site_url('admin/brands/add') ?>"><i class="fa fa-plus"></i> Thêm mới</a>
                                    <a id="bulk-delete" class="btn btn-sm btn-danger " data-toggle="confirmation" data-placement="left" data-singleton="true"><i class="fa fa-trash-o"></i> Xóa</a>
                                    <input type="hidden" id="hidAction" name="hidAction" value="" />
                                </div>

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding box_body_brands" style="overflow-x:auto;">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th style="width: 20px"><input type="checkbox" class="minimal checkth" ></th>
                                    <th>Tên Hãng</th>
                                    <th>Ngày khởi tạo</th>
                                    <th style="width: 80px"></th>
                                </tr>
                                <?php if ($data['total'] > 0) {?>
                                    <?php foreach ($data['brands'] as $key => $brands) {?>
                                        <tr>
                                            <td><input type="checkbox" class="minimal checkitem" name="val[]" value="<?php echo $brands->id ?>" ></td>
                                            <td><?php echo $brands->name ?></td>
                                            <td><?php echo $brands->created_date ?></td>
                                            <td>
                                                <a href="<?php echo site_url() ?>admin/brands/edit/<?php echo $brands->id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo site_url() ?>admin/brands/delete/<?php echo $brands->id; ?>" class="btn btn-xs btn-danger" data-toggle="confirmation" data-placement="left" data-singleton="true"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                <?php } else {?>
                                        <tr>
                                            <td colspan="4" class="text-center">Chưa tồn tại hãng nào!</td>
                                        </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <?php echo custom_pagination('/admin/brands/index/', $data['total']); ?>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
