<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-top">
          <h3 style="font-family: arial;">Liên hệ với chúng tôi</h3>
          <form>
            <input type="text" value="MỜI NHÂP TÊN CỦA BẠN*" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='MỜI NHÂP TÊN CỦA BẠN*';}">
            <input type="text" value="ĐỊA CHỈ EMAIL*" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='ĐỊA CHỈ EMAIL*';}">
            <input type="text" value="SỐ ĐIỆN THOẠI" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='SỐ ĐIỆN THOẠI';}">
            <textarea cols="77" rows="6" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'LỜI NHẮN*';}">MỜI BẠN NHẬP NỘI DUNG*</textarea>
            <input type="submit" value="GỬI" >
          </form>
        </div>
        <div class="col-md-4 footer-middle">
            <h3 style="font-family:arial;">Sản phẩm được đánh giá</h3>
                <?php if (! empty($category_1)): ?>
                    <div class="product-go">
                        <div class="grid-product">
                            <h6><a href="<?php echo site_url().'product/detail/' . $category_1[0]->product_id ?>" style="font-family:arial;" ><?= $category_1[0]->name ?></a></h6>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <span class=" price-in"><?= number_format($category_1[0]->price) . 'đ' ?></span>
                        </div>
                            <div class="fashion">
                                <a href="#"><img class="img-responsive " src="<?= site_url() . $category_1[0]->path ?>" alt="">
                                <p>NEW</p></a>
                            </div>
                        <div class="clearfix"> </div>
                    </div>
                    <?php endif; ?>
                    <?php if (! empty($category_2)): ?>
                    <div class="product-go">
                        <div class="grid-product">
                            <h6><a href="<?php echo site_url().'product/detail/' . $category_2[0]->product_id ?>" style="font-family:arial;" ><?= $category_2[0]->name ?></a></h6>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <span class=" price-in"><?= number_format($category_2[0]->price) . 'đ' ?></span>
                        </div>
                            <div class="fashion">
                                <a href="#"><img class="img-responsive " src="<?= site_url() . $category_2[0]->path ?>" alt="">
                                <p>NEW</p></a>
                            </div>
                        <div class="clearfix"> </div>
                    </div>
                    <?php endif; ?>
                    <?php if (! empty($category_3)): ?>
                    <div class="product-go">
                        <div class="grid-product">
                            <h6><a href="<?php echo site_url().'product/detail/' . $category_3[0]->product_id ?>" style="font-family:arial;" ><?= $category_3[0]->name ?></a></h6>
                            <div class="rating">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                            <span class=" price-in"><?= number_format($category_3[0]->price) . 'đ' ?></span>
                        </div>
                            <div class="fashion">
                                <a href="#"><img class="img-responsive " src="<?= site_url() . $category_3[0]->path ?>" alt="">
                                <p>NEW</p></a>
                            </div>
                        <div class="clearfix"> </div>
                    </div>
                    <?php endif; ?>

        </div>
        <div class="col-md-4 footer-bottom">
            <h3 style="font-family: arial;">Kết nối với chúng tôi</h3>
            <div class="logo-footer">
                <ul class="social">
                        <li><a href="#"><i class="fb"> </i> </a></li>
                        <li><a href="#"><i class="rss"> </i></a></li>
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="dribble"> </i></a></li>
                        <div class="clearfix"> </div>
                    </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="indo">
              <ul class="social-footer ">
                  <li><span><i class="glyphicon glyphicon-earphone"> </i>00000000000 </span></li>
                  <li><a href="mailto:info@example.com"><i class="glyphicon glyphicon-envelope" class="mes"> </i>info@example.com</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-link" class="mes-in"> </i>http://example.com</a></li>
              </ul>
            </div>
        </div>
        <div class="clearfix"> </div>
        <p class="footer-class" style="font-family: arial;">Công ty cổ phần giấy SilkWell</p>
    </div>
</div>
             <!---->
<script type="text/javascript">
        $(document).ready(function() {
                /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
                */
        $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 

<!---->
</body>
</html>