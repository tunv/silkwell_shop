<script>
    jQuery(document).ready(function($){
        $('.close-carbon-adv').on('click', function(){
            $('#carbonads-container').hide();
        });
    });
</script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<!-- Resource jQuery -->
<div class="back">
    <h2 style="font-family: arial;">Chi tiết sản phẩm</h2>
</div>
<!---->
<div class="product">
    <div class="container">
        <div class="col-md-3 product-price">
            <div class=" rsidebar span_1_of_left">
                <div class="of-left">
                    <h3 class="cate" style="font-family: arial;">Theo loại</h3>
                </div>
                <ul class="menu">
                    <li ><a href="<?= base_url() . 'category/1'?>" style="font-family: arial;"> Giấy khô </a></li>
                    <li ><a href="<?= base_url() . 'category/2'?>" style="font-family: arial;">Giấy lau tay </a>
                    <li ><a href="<?= base_url() . 'category/3'?>" style="font-family: arial;">Giấy cuộn </a></li>
                </ul>
            </div>
            <div class="product-bottom">
                <div class="of-left-in">
                    <h3 class="best" style="font-family:arial;">Sản phẩm bán chạy</h3>
                </div>
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="<?= site_url() . 'product/detail/1'?>">
                        <img class="img-responsive" src="<?php echo img_url();?>sanpham1_0.jpg" alt="">
                        </a>
                    </div>
                    <div class=" fashion-grid1">
                        <h6 class="best2">
                            <a href="<?= site_url() . 'product/detail/1'?>">Khăn giấy rút 2 lớp Silkwell</a>
                        </h6>

                        <span class=" price-in1">18,900đ</span>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="<?= site_url() . 'product/detail/3'?>"><img class="img-responsive "
                            src="<?php echo img_url();?>sanpham3_0.jpg" alt=""></a>
                    </div>
                    <div class="fashion-grid1">
                        <h6 class="best2">
                            <a href="<?= site_url() . 'product/detail/3'?>">Giấy lụa hộp 2 lớp Pulppy </a>
                        </h6>

                        <span class=" price-in1"> 17,000đ</span>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="product-go">
                    <div class=" fashion-grid">
                        <a href="<?= site_url() . 'product/detail/3'?>"><img class="img-responsive "
                            src="<?php echo img_url();?>sanpham4_0.jpg" alt=""></a>

                    </div>
                    <div class=" fashion-grid1">
                        <h6 class="best2">
                            <a href="#">Khăn giấy lụa 2 lớp Teddy Bear</a>
                        </h6>
                        <ul class="star-footer">
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                        </ul>
                        <span class=" price-in1"><small>20,000đ</small> → 18,800đ</span>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!---->
        <div class="col-md-9 product-price1">
            <div class="col-md-5 single-top">
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach($product_images as $value): ?>
                            <li data-thumb="<?= base_url(). $value->path ?>"><img src="<?= base_url(). $value->path ?>" /></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- FlexSlider -->
                <script defer src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="<?php echo base_url()?>assets/css/flexslider.css" type="text/css" media="screen" />
                <script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
            </div>
            <div class="col-md-7 single-top-in simpleCart_shelfItem">
                <div class="single-para ">
                    <h4><?php echo $product->name?></h4>
                    <div class="star-on">
                        <ul class="star-footer">
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                            <li><a href="#"><i> </i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <h5 class="item_price">Giá : <?= number_format($product->price) . 'đ'?></h5>
                    <ul class="tag-men">
                        <li><span style="font-family: arial;">Mô tả sản phẩm</span> </li>
                    </ul>
                    <span class="women1"><?= $product->description ?></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="top-product">
                <h3 class="real">Các sản phẩm liên quan</h3>
                <?php if (! empty($related_product)): ?>
                    <?php foreach ($related_product as $value): ?>
                        <div class="col-md-4 chain-grid  simpleCart_shelfItem">
                            <div class="grid-span-1">
                                <a href="single.html"><img class="img-responsive "
                                    src="<?= base_url() . $value->path ;?>" alt=" "> </a>
                            </div>
                            <div class="grid-chain-bottom ">
                                <h6>
                                    <a href="single.html"><?= $value->name; ?></a>
                                </h6>
                                <div class="star-price">
                                    <div class="price-at-bottom ">
                                        <span class="item_price"><?= number_format($product->price) . 'đ' ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---->
