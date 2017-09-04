<style type="text/css">
  .error {
    color: red;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Thêm thông báo mới
    </h1>
  </section>
  <section class="content">
  <div class="box box-info" id="quick-product-box">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Thêm thông báo mới</h3>
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
      <form action="<?php echo site_url();?>admin/news/update/<?php echo !empty($news) ? $news->id : "";?>" class="form-horizontal"  method="post">
    <?php  } ?>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="title">Tiêu đề</label>
      <div class="col-sm-10">
        <?php echo form_error('title'); ?>
        <input id="title" name="title" class="form-control" value="<?php echo isset($news) ? $news->title : set_value('title');?>" type="text" placeholder="Tiêu đề">
      </div>
    </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="name">Nội dung</label>
    <div class="col-sm-10">
    <?php echo form_error('content'); ?>
    <textarea name="content" class="textarea" placeholder="Nhập nội dung" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($news) ? $news->content : set_value('content');?></textarea>
    </div>
  </div>
  <div class="box-footer clearfix">
    <?php if($action=='insert') { ?>
    <button class="pull-right btn btn-default" id="<?php echo $action;?>-product">
      Gửi <i class="fa fa-arrow-circle-right"></i>
    <?php } else { ?>
      <input cinsertpull-right btn btn-default"  value="Gửi" type="submit">
    <?php } ?>
    </button>
    </form>
  </div>
  </div>
  </section>
</div>
