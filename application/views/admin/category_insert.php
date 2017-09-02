<style type="text/css">
  .error {
    color: red;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Thêm nhóm sản phẩm
    </h1>
  </section>
  <section class="content">
  <div class="box box-info" id="quick-product-box">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Thêm nhóm sản phẩm mới</h3>
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
      <form action="<?php echo site_url();?>admin/category/update/<?php echo !empty($category) ? $category->category_id : "";?>" class="form-horizontal"  method="post">
    <?php  } ?>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="name">Tên nhóm sản phẩm</label>
      <div class="col-sm-10">
        <?php echo form_error('name'); ?>
        <input id="name" name="name" class="form-control" value="<?php echo isset($category) ? $category->category_name : set_value('name');?>" type="text" placeholder="Tên sản phẩm">
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="name">Mô tả</label>
    <div class="col-sm-10">
    <?php echo form_error('description'); ?>
    <textarea name="description" class="textarea" placeholder="Nhập mô tả" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($category) ? $category->category_description : set_value('description');?></textarea>
    </div>
  </div>
  <div class="box-footer clearfix">
    <?php if($action=='insert') { ?>
    <button class="pull-right btn btn-default" id="<?php echo $action;?>-product">
      Gửi <i class="fa fa-arrow-circle-right"></i>
    <?php } else { ?>
      <input cinsertpull-right btn btn-default"  value="Submit" type="submit">
    <?php } ?>
    </button>
    </form>
  </div>
  </div>
  </section>
</div>
