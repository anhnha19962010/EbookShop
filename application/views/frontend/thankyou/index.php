
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
        
        <h2>Chào bạn!</h2>
		<p>Bạn đã thanh toán thành công, cảm ơn bạn đã mua hàng trên trang chúng tôi.</p>
		<p>Mã sản phẩm : <b><?php echo $item_number; ?></b></p>
		<p>Mã thanh toán : <b><?php echo $txn_id; ?></b></p>
		<p>Số tiền đã thanh toán : <b>$<?php echo $payment_amt.' '.$currency_code; ?></b></p>
		<p>Tình trạng thanh toán : <b><?php echo $status; ?></b></p>
		<a href="<?php echo site_url() ?>">Quay lại trang chủ</a>

    </div><!-- .inner -->
</div><!-- #content -->