<?php defined( '_VALID_MOS' ) or die( include("404.php") );
    $order=new orders();
    $query="SELECT bill_name,bill_email,bill_address,
            bill_phone,note,total,quantity,tensanpham,date_create,giaban
            from donhang inner join donhang_chitiet on donhang.id=donhang_chitiet.order_id
            INNER JOIN sanpham on donhang_chitiet.product_id=sanpham.sanpham_id INNER JOIN sanpham_phienban on sanpham.sanpham_id=sanpham_phienban.sanpham_id 
            where donhang.id=?";
    intval( $conf['geturl']['id'] );
    $data=$order->get_orders_view($query, intval( $conf['geturl']['id'] ));


?>