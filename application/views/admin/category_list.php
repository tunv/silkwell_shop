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
      <li><a href="#"><i class="fa fa-dashboard"></i>Quản lý sản phẩm</a></li>
      <li class="active"> <a href="#">Quản lý nhóm sản phẩm (loại sản phẩm)</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-info" id="quick-product-box">
      <div class="box-header">
          <i class="fa fa-envelope"></i>
          <h3 class="box-title">Danh sách nhóm sản phẩm</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
              <a href="<?php echo site_url()?>admin/category/insert" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i> Thêm nhóm sản phẩm mới</a>
          </div>
          <br>
          <!-- /. tools -->
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th> STT </th>
                <th> Tên nhóm sản phẩm phẩm </th>
                <th> Mô tả </th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <?php if (! empty($categories)): ?>
              <?php $i = 1; ?>
              <tbody>
                  <?php foreach ($categories as $category): ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $category->category_name ?></td>
                        <td><?php echo $category->category_description ?></td>
                        <td>
                          <a href="<?php echo base_url()?>admin/category/update/<?=$category->category_id?>" class="btn btn-info "> <i class="fa fa-edit"> </i>
                              Sửa <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </td>
                        <td>
                          <a href="<?php echo base_url()?>admin/category/delete/<?=$category->category_id?>" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="fa fa-trash-o" > </i>
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
