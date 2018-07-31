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
        <div class="sidebar col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
            <div class="listCategory">
                <div class="titleSidebar">
                    <h3>Danh sách</h3>
                </div>
                <ul class="mainMenu">
                    <?php if($category != null){?>
                        <?php foreach ($category as $key => $value) {?>
                            <li class="mainItem">
                                <a href="#" class="clearfix">
                                    <span><?php echo $value->name?></span>
                                    <em><?php echo $value->total?></em>
                                </a>
                            </li>
                        <?php }?>
                    <?php }?>
                </ul>
            </div>
            <div class="func-filter listCategory">
                <div class="titleSidebar">
                    <h3>Lọc theo hãng</h3>
                </div>
                <ul class="filter-brand">
                    <?php if($brand != null){?>
                        <?php foreach ($brand as $key => $value) {?>
                            <li>
                                <input type="checkbox" value="<?php echo $value->id?>"><?php echo $value->name?>
                            </li>
                        <?php }?>
                    <?php }?>
                </ul>
                <div class="filter-price">
                    <div class="titleSidebar">
                        <h3>Lọc theo giá</h3>
                    </div>
                    <div class="filter-price-content">
                        <span><input type="text" placeholder="Giá tối thiểu"></span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><span><input type="text" placeholder="Giá tối đa"></span>
                    </div>
                </div>
            </div>
            <div class="listBestViewBook">
                <div class="titleSidebar">
                    <h3>Danh sách Yêu thích</h3>
                </div>
                <ul class="mainMenu">
                        <li class="mainItem">
                            <a href="#" class="clearfix">
                                <img src="<?php echo site_url()?>public/assets/img/common/book-02.jpg" alt="book2">
                                <div class="info-Book">
                                    <h3>Nghệ thuật và nhiếp ảnh</h3>
                                    <span>lauren clout</span>
                                </div>
                            </a>
                        </li>
                        <li class="mainItem">
                            <a href="#" class="clearfix">
                                <img src="<?php echo site_url()?>public/assets/img/common/book-02.jpg" alt="book2">
                                <div class="info-Book">
                                    <h3>Nghệ thuật và nhiếp ảnh</h3>
                                    <span>lauren clout</span>
                                </div>
                            </a>
                        </li>
                        <li class="mainItem">
                            <a href="#" class="clearfix">
                                <img src="<?php echo site_url()?>public/assets/img/common/book-02.jpg" alt="book2">
                                <div class="info-Book">
                                    <h3>Nghệ thuật và nhiếp ảnh</h3>
                                    <span>lauren clout</span>
                                </div>
                            </a>
                        </li>
                        <li class="mainItem">
                            <a href="#" class="clearfix">
                                <img src="<?php echo site_url()?>public/assets/img/common/book-02.jpg" alt="book2">
                                <div class="info-Book">
                                    <h3>Nghệ thuật và nhiếp ảnh</h3>
                                    <span>lauren clout</span>
                                </div>
                            </a>
                        </li>
                        <li class="mainItem">
                            <a href="#" class="clearfix">
                                <img src="<?php echo site_url()?>public/assets/img/common/book-02.jpg" alt="book2">
                                <div class="info-Book">
                                    <h3>Nghệ thuật và nhiếp ảnh</h3>
                                    <span>lauren clout</span>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="mainContent col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
            <div class="bookbestselling">
                <h3 class="title">Sách bán chạy nhất</h3>
                <div class="content-book-selling">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
                            <img src="<?php echo site_url()?>public/assets/img/common/book-04.png" alt="Things To Know About Green Flat Design">
                        </div>
                        <div class="info-book col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <h3 class="booktitle">Things To Know About Green Flat Design</h3>
                            <p class="bookauthor"><a href="#">Farrah Whisenhunt</a></p>
                            <p class="bookprice">
                                <ins>$30.5</ins>
                                <del>$54.7</del>
                            </p>
                            <a href="#" class="bookbtn-payment">
                                <i class="fa fa-shopping-basket"></i>
                                <span>Đặt mua</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booklist">
                <h3 class="title">Tất cả</h3>
                <div class="content-booklist clearfix">
                    <?php load_element($this->theme_path . 'home/list');?>
                </div>
            </div>
        </div>
    </div><!-- .inner -->
</div><!-- #content -->