<style type="text/css">
  .error {
    color: red;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Thêm sản phẩm
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Product</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>
  <section class="content">
  <div class="box box-info" id="quick-product-box">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Thêm sản phẩm mới</h3>
    <div class="pull-right box-tools">
      <button class="btn btn-info btn-sm" data-toggle="tooltip" title="Add More">
        <i class="fa fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <?php if($action === 'insert') {?>
      <form action="insert" class="form-horizontal" id="quick-product" method="post" enctype = "multipart/form-data">
    <?php } else {?>
      <form action="<?php echo site_url();?>admin/product/update/<?php echo !empty($product) ? $product->product_id : "";?>" class="form-horizontal"  method="post">
    <?php  } ?>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="name">Tên sản phẩm</label>
      <div class="col-sm-10">
        <?php echo form_error('name'); ?>
        <input id="name" name="name" class="form-control" value="<?php echo isset($product) ? $product->name : set_value('name');?>" type="text" placeholder="Tên sản phẩm">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="name">Nhóm sản phẩm</label>
      <div class="col-sm-10">
        <select name="category_id" class="form-control">
          <?php foreach($categories as $cat) {?>
            <option value="<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></option>
          <?php }?>
        </select>
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="name">Giá</label>
    <div class="col-sm-10">
      <?php echo form_error('price'); ?>
      <input id="name" name="price" class="form-control numbers" value="<?php echo isset($product) ? $product->price : set_value('price');?>" type="text" placeholder="VNĐ">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="name">Mô tả</label>
    <div class="col-sm-10">
    <?php echo form_error('description'); ?>
    <textarea name="description" class="textarea" placeholder="Nhập mô tả" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($product) ? $product->description : set_value('description');?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="image">Hình ảnh</label>
    <div class="col-sm-10">
      <span class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i><span>Ảnh 1</span>
      </span>
      <input name="img_0" type="file" multiple="" />
      <?php if (isset($error_img_1)): ?>
        <div class="error"><?= $error_img_1 ?></div>
      <?php endif; ?>
      <br ><br >
      <span class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i><span>Ảnh 2</span>
      </span>
      <input name="img_1" type="file" multiple="" />
      <?php if (isset($error_img_2)): ?>
        <div class="error"><?= $error_img_2 ?></div>
      <?php endif; ?>
    </div>
  </div>
  <div class="box-footer clearfix">
    <?php if($action=='insert') { ?>
    <button class="pull-right btn btn-default" id="<?php echo $action;?>-product">
      Gửi <i class="fa fa-arrow-circle-right"></i>
    <?php } else { ?>
      <input class="pull-right btn btn-default"  value="Gửi" type="submit">
    <?php } ?>
    </button>
    </form>
  </div>
  </div>
  </section>
</div>
