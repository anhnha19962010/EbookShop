<?php foreach ($all['products'] as $key => $product) {?>
    <div class="boxBook col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <a href="#">
            <img src="<?php echo site_url().$product->image?>" alt="book1">
            <p class="categorybook">
                <?php echo $product->category?>
            </p>
            <h3 class="nameBook">
                <?php echo $product->name?>
            </h3>
            <p class="authorBook">
                Tác giả: 
                <span><?php echo $product->descriptions?></span>
            </p>
            <p class="priceBook">
                <ins><?php echo number_format($product->price, 0, ',', '.'); ?> ₫</ins>
                <del><?php echo number_format($product->price+30000, 0, ',', '.'); ?> ₫</del>
            </p>

        </a>
        <a href="<?php echo site_url().'detail/'.$product->id?>" class="bookbtn-payment">
                <i class="fa fa-shopping-basket"></i>
                <span>Đặt mua</span>
        </a>
    </div>
<?php }?>