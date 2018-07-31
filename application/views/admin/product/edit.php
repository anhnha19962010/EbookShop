<?php  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo site_url('admin/products') ?>">Sản phẩm</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm Sản phẩm mới</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Tên Sản phẩm</label>
                        <input type="text" class="form-control" required="" id="name" name="name" placeholder="" value="<?php echo $product->name?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Hãng</label>
                        <select name="brand_id" class="select2 form-control " required="">
                        	<?php if($data['brands'] != null){?>
                        		<?php foreach ($data['brands'] as $key => $value) {?>
                        			<option value="<?php echo $value->id?>" <?php echo ($value->id == $product->brand_id)?'selected':'' ?>><?php echo $value->name?></option>
                        		<?php }?>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Danh muc</label>
                        <select name="category_id" class="select2 form-control " required="">
                            <?php if($data['categories'] != null){?>
                        		<?php foreach ($data['categories'] as $key => $value) {?>
                        			<option value="<?php echo $value->id?>" <?php echo ($value->id == $product->category_id)?'selected':'' ?>><?php echo $value->name?></option>
                        		<?php }?>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                    	<?php 
                    		$image_path = '';
                    		if ($product->images != null) {
                    			foreach ($product->images as $key => $value) {
                    				if($value->active == 'Yes'){
                    					$image_path = $value->path_img;
                    				}
                    			}
                    		}
                    	?>
                        <?php echo form_label('Ảnh sản phẩm', 'feature_image'); ?>
                        <input type="text" name="image" class="form-control" id="txtSelectedFile" style="cursor:pointer;" value="<?php echo $image_path ?>" onclick="openCustomRoxy('roxyCustomPanel2', '<?php echo site_url() ?>public/fileman/custom.html?integration=custom&type=files&txtFieldId=txtSelectedFile&preview=thumbPreview&dialog=roxyCustomPanel2')">
                        <div id="roxyCustomPanel2" style="display: none;">
                            <iframe src="" style="width:100%;height:100%" frameborder="0">
                            </iframe>
                        </div>
                    </div>
                    <div class="form-group">
                        <img id="thumbPreview" class="img-thumbnail" alt="Chưa có ảnh sản phẩm" src="<?php echo site_url().$image_path?>" style="width: 200px;height: auto;" />
                    </div>
                    <div class="form-group">
                        <!-- <label for="description">Ảnh khác</label> -->
                        <a class="btn btn-primary " onclick="openCustomRoxy('roxyCustomPanel3', '<?php echo site_url() ?>public/fileman/custom.html?integration=custom&type=files&is_other=1&dialog=roxyCustomPanel3')"><i class="fa fa-plus"></i> Thêm ảnh kích thước 400x400</a>
                        <div id="roxyCustomPanel3" style="display: none;">
                            <iframe src="" style="width:100%;height:100%" frameborder="0">
                            </iframe>
                        </div>
                    </div>
                    <div class="form-group row" id="other-imgs">
                    </div>
					
                    <div class="form-group">
                        <?php echo form_label('File Docs', 'Document'); ?>
                        <input type="text" name="docs" class="form-control" id="txtSelectedFile1" style="cursor:pointer;" value="<?php echo $product->docs->path_doc?>" onclick="openCustomRoxy('roxyCustomPanel4', '<?php echo site_url() ?>public/fileman/custom.html?integration=custom&type=files&txtFieldId=txtSelectedFile1&preview=thumbPreview1&dialog=roxyCustomPanel4')">
                        <div id="roxyCustomPanel4" style="display: none;">
                            <iframe src="" style="width:100%;height:100%" frameborder="0">
                            </iframe>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control ckeditor" name="description" id="description">
                        	<?php echo $product->descriptions?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" class="form-control" required="" id="price" name="price" placeholder="" maxlength="15" value="<?php echo $product->price?>">
                    </div>
                    <div class="form-group">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" class="normal" name="is_active" value="Yes" checked=""> Sẵn hàng
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="save" class="btn btn-primary" value="1">Lưu</button>
                    <a href="<?php echo site_url('admin/products') ?>" class="btn btn-default">Hủy</a>
                    <input type="hidden" name="pid" value="<?php echo $product->id?>" />
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

