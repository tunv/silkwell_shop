<style>
  table, th, td {
      border: 1px solid black;
  }

  .content {
    margin-left: 40px;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Màn hình quản lý
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url()?>admin/dashboard/"><i class="fa fa-dashboard"></i>Quản lý sản phẩm</a></li>
      <li> <a href="<?php echo site_url()?>admin/dashboard/category">Quản lý nhóm sản phẩm (loại sản phẩm)</a></li>
      <li class="active"> <a href="#">Quản lý thông báo trên web</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-info" id="quick-product-box">
      <div class="box-header">
          <i class="fa fa-envelope"></i>
          <h3 class="box-title">Danh sách thông báo</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
              <a href="<?php echo site_url()?>admin/news/insert" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i> Thêm thông báo mới</a>
          </div>
          <br>
          <!-- /. tools -->
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th> STT </th>
                <th> Tiêu đề </th>
                <th> Nội dung </th>
                <th> Ngày tạo thông báo </th>
                <th> Ngày sửa thông báo </th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <?php if (! empty($news_list)): ?>
              <?php $i = 1; ?>
              <tbody>
                  <?php foreach ($news_list as $item): ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?= $item->title ?></td>
                        <td><?= $item->content ?></td>
                        <td><?= $item->da_create ?></td>
                        <td><?= $item->da_update ?></td>
                        <td>
                          <a href="<?php echo base_url()?>admin/news/update/<?=$item->id?>" class="btn btn-info "> <i class="fa fa-edit"> </i>
                              Sửa <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </td>
                        <td>
                          <a href="<?php echo base_url()?>admin/news/delete/<?=$item->id?>" class="btn btn-danger " onclick="return confirm('Bạn thật sự muốn xoá tin tức này?')"> <i class="fa fa-trash-o" > </i>
                              Xoá <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </section>
</div>
