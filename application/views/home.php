<style type="text/css">
  .test1 {
    max-width: 300px;
    max-height: 240px;
  }
  #information {
  margin-left:20%;
  padding-bottom: 10px;
  }

  #information a.clearfix {
    border-bottom: 1px dotted #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
    font-size: 14px !important;
  }
  #information a.clearfix:hover dt {
    color: #111 !important;
  }
  #information a.clearfix dt {
    float: left;
    margin-right: 20px;
    width: 90px;
  }
  #information a.clearfix dd {
    font-weight: bold;
    width: 685px;
    float: left;
  }
  #information a.clearfix:last-of-type {
    border: 0;
  }
  .thongbao {
    width: 60px;
    height: 60px;
  }
  hr.example1 {
  width: 70%;
  margin-left: 2px;
  background-color: #42f4a4;
  border: 1px #41f4eb solid;
  color: #ffdfe2;
  }
</style>
<div class="sap_tabs">
    <?php if (! empty($news_list)): ?>
      <section id="information" class="clearfix">
        <h3 style="color: #42a4f4;"><img class="thongbao" src="<?= img_url() . 'thongbao.jpeg' ?>">THÔNG BÁO</h3>
        <?php foreach ($news_list as $news): ?>
          <a href="/news#<?=$news->id; ?>" class="clearfix">
            <dl>
              <dt>
                <?= date('Y.m.d', strtotime($news->da_update)); ?>
              </dt>
              <dd>
                <?= $news->title; ?>
              </dd>
            </dl>
          </a>
        <?php endforeach; ?>
        <hr class="example1">
      </section>
    <?php endif; ?>
  <div class="container">
    <h2>Sản phẩm được yêu thích</h2>
    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
      <ul class="resp-tabs-list">
          <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span style="font-family: arial;">Khăn giấy khô</span></li>
          <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span style="font-family: arial;">Giấy lau tay</span></li>
          <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span style="font-family: arial;">Giấy cuộn lớn</span></li>
        <div class="clearfix"></div>
      </ul>
      <div class="resp-tabs-container">
        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
          <div class="tab_img">
            <?php if (!empty($giay_kho)): ?>
              <?php foreach ($giay_kho as $value): ?>
                <div class="img-top simpleCart_shelfItem">
                  <img src="<?=base_url() . $value->path ?>" class="img-responsive" alt=""/>
                  <div class="tab_desc">
                    <ul class="round-top">
                      <li><a href="<?= site_url() . 'product/detail/'. $value->product_id;?>"><i class="glyphicon glyphicon-search"> </i></a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                    </ul>
                    <div class="agency">
                      <div class="agency-left">
                        <h6 class="jean"><?= $value->name, 18 ?></h6>
                        <span class="dollor item_price"><?= number_format($value->price) . 'đ' ?></span>
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-in">
                    <p>NEW</p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
      </div>
      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
        <div class="tab_img">
          <?php if (! empty($giay_lau_tay)): ?>
            <?php foreach($giay_lau_tay as $value): ?>
              <div class="img-top simpleCart_shelfItem">
                <img src="<?=base_url() . $value->path ?>" class="img-responsive" alt=""/>
                <div class="tab_desc">
                  <ul class="round-top">
                    <li><a href="<?= site_url() . 'product/detail/'. $value->product_id;?>"><i class="glyphicon glyphicon-search"> </i></a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
                  </ul>
                  <div class="agency ">
                    <div class="agency-left">
                      <h6 class="jean"><?= $value->name ?></h6>
                      <span class="dollor item_price"><?= number_format($value->price) . 'đ' ?></span>
                      <div class="clearfix"> </div>
                    </div>
                  </div>
                </div>
                </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="clearfix"></div>
      </div>
  </div>
  <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
    <div class="tab_img">
      <?php if (!empty($giay_cuon)): ?>
        <?php foreach ($giay_cuon as $value): ?>
          <div class="img-top simpleCart_shelfItem">
            <img src="<?=base_url() . $value->path ?>" class="img-responsive" alt=""/>
            <div class="tab_desc">
              <ul class="round-top">
                <li><a href="<?= site_url() . 'product/detail/'. $value->product_id;?>"><i class="glyphicon glyphicon-search"> </i></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-resize-small"> </i></a></li>
              </ul>
              <div class="agency ">
                <div class="agency-left">
                  <h6 class="jean"><?= $value->name ?></h6>
                  <span class="dollor item_price"><?= number_format($value->price) . 'đ' ?></span>
                  <div class="clearfix"> </div>
                </div>
              </div>
            </div>
            <div class="col-in">
              <p>NEW</p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
  <!--start-shoes--> 
<?php if (! empty($products)): ?>
<div class="goggles"> 
  <div class="container"> 
      <h2>Danh sách sản phẩm</h2>
      <div class="product-one">
          <?php foreach($products as $product) {?>
          <div class="col-md-4 product-left"> 
          <br>
              <div class="p-one simpleCart_shelfItem">
                      <a href="<?php echo site_url().'product/detail/'.$product->product_id;?>">
                          <img class="test1" src="<?= base_url() . $product->path ?>" alt="" />
                          <div class="mask">
                              <span>Xem chi tiết</span>
                          </div>
                      </a>
                  <h4><?= short_name($product->name, 36); ?></h4>
                  <p><a><i></i> <span class=" item_price"><?= number_format($product->price) . 'đ' ?></span></a></p>
                  <br/>
              </div>
          </div>
          <?php } ?>
          <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
  </div>
</div>
<?php endif; ?>