<div id="bxslider">
    <ul class="slider">
        <li><img src="<?php echo site_url()?>public/assets/img/common/img-01.jpg" alt="" /></li>
        <li><img src="<?php echo site_url()?>public/assets/img/common/img-01.jpg" alt="" /></li>
        <li><img src="<?php echo site_url()?>public/assets/img/common/img-01.jpg" alt="" /></li>
    </ul>
</div>
<div id="pageTitle">
    <h2 class="title"><span class="icon"></span><span class="text">Sách điện tử</span></h2>
</div><!-- #titlePage -->
<div id="content">
        <div class="inner clearfix">
            <?php 
                $image_path = '';
                  if ($data->images != null) {
                      foreach ($data->images as $key => $value) {
                            if($value->active == 'Yes'){
                                $image_path = $value->path_img;
                            }
                       }
                  }
                ?>
            <div class="mainContent col-xs-12 col-sm-6 col-md-6 col-lg-7 pull-left">
                <div class="bookbestselling">
                    <h3 class="title">Chi tiết</h3>
                    <div class="content-book-selling">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
                                <img src="<?php echo site_url().$image_path?>" alt="Things To Know About Green Flat Design">
                            </div>
                            <div class="info-book col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <h3 class="booktitle"><?php echo $data->name?></h3>
                                <p class="bookauthor"><a href="#"><?php echo $data->name?></a></p>
                                <p class="bookprice">
                                    <ins><?php echo number_format($data->price, 0, ',', '.'); ?> ₫</ins>
                                    <del><?php echo number_format($data->price+30000, 0, ',', '.'); ?> ₫</del>
                                </p>
                            </div>
                            
                        </div>
                        <div class="row description">
                                <h3 class="title-description">
                                    Giới thiệu
                                </h3>
                                <p class="content-description">
                                    <?php echo $data->descriptions?>
                                </p>
                            </div>
                    </div>
                </div>
                
            </div>
            <div class="sidebar col-xs-12 col-sm-6 col-md-6 col-lg-5 pull-right payment">
                <div class="listCategory">
                    <div class="titleSidebar">
                        <h3>Đăt hàng</h3>
                    </div>
                    <div data-form-type="formoid">
                        <div data-form-alert="" hidden="">
                            Thanks for filling out the form!
                        </div>
                        <form class="block mbr-form" action="<?php echo site_url()?>payment/buy/<?php echo $data->id?>" method="post" >
                            <div class="row">
                                <div class="col-md-6 multi-horizontal" data-for="name">
                                    <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Họ và tên" required="" id="name-form4-4v">
                                </div>
                                <div class="col-md-6 multi-horizontal" data-for="phone">
                                    <input type="text" class="form-control input" name="phone" data-form-field="Phone" placeholder="Số điện thoại" required="" id="phone-form4-4v">
                                </div>
                                <div class="col-md-12" data-for="email">
                                    <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-4v">
                                </div>
                                <div class="input-group-btn col-md-12" style="margin-top: 10px;">
                                    <input name="save" type="submit" class="btn bookbtn-payment btn-form" value="Thanh toán PayPal">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .inner -->
    </div><!-- #content -->