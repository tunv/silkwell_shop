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
      <li class="active"> <a href="<?= site_url() . 'admin/dashboard/category' ?>">Quản lý category (loại sản phẩm)</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-info" id="quick-product-box">
      <div class="box-header">
          <i class="fa fa-envelope"></i>
          <h3 class="box-title">Danh sách sản phẩm</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
              <a href="<?php echo site_url()?>admin/product/insert" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i> Thêm sản phẩm mới</a>
          </div>
          <br>
          <!-- /. tools -->
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th> STT </th>
                <th> Tên sản phẩm </th>
                <th> Category </th>
                <th> Giới thiệu sản phẩm </th>
                <th> Giá </th>
                <th> Ảnh sản phẩm </th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <?php if (! empty($products)): ?>
              <?php $i = 1; ?>
              <tbody>
                  <?php foreach ($products as $product): ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->category_name ?></td>
                        <td><?php echo $product->description ?></td>
                        <td><?php echo $product->price ?></td>
                        <td>
                          <?php if (! empty($product->path)): ?>
                            <img src="<?= base_url() . $product->path ?>" style="width: 100px; height: 100px;"/>
                          <?php else: ?>
                            No Image
                          <?php endif; ?>
                        <td>
                          <a href="<?php echo base_url()?>admin/product/update/<?=$product->product_id?>" class="btn btn-info "> <i class="fa fa-edit"> </i>
                              Sửa <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </td>
                        <td>
                          <a href="<?php echo base_url()?>admin/product/delete/<?=$product->product_id?>" class="btn btn-danger " onclick="return confirm('Bạn thật sự muốn xoá sản phẩm này?')"> <i class="fa fa-trash-o" > </i>
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
