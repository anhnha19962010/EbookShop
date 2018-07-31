<h1 style="color:#3f8812;padding: 10px 10px; border:1px solid #3f8812;display: inline-block; ">Ebook-shop</h1>
<h3 style="color:#c00">Chào bạn!</h3>
<p>
    Bạn đã mua hàng thành công ở <b style="color:#3f8812;text-transform: uppercase;">ebook-shop</b><br>
    Sản phẩm : <?php echo $name;?><br>
    Đơn giá  : $<?php echo $price;?> usd<br>
    Ngày mua : <?php echo $date;?><br>
</p>
<p>
    Nhấp chuột vào nút bên dưới để tải sản phẩm.
</p>
<p>
    Bạn có tất cả:<b style="color: #c00;"> <?php echo $total?></b> lần tải,
</p>
<p style="text-align: center;background-color: #868686;padding: 20px 0">
    <a href="<?php echo $download_url;?>"
     style="display:inline-block; ;padding:10px 20px;
        border-radius: 4px;border:1px solid #49613b;
        background-color: #66da1d;text-decoration: none;
        font-weight: bold;
        color: #fff;font-size: 20px; 
      ">Tải về</a>
</p>
<h2 style="color: #3f8812;">Thank you!</h2>
