<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                    <h4 class="heading glyphicons gift"><i></i>Thêm mới thông tin khuyến mãi</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="seo/promotion/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a> </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Modal inline --> 
                
                <!-- Modal -->
                <div class="modal hide fade" id="modal-simple"> 
                    
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3>Modal header</h3>
                    </div>
                    <!-- // Modal heading END --> 
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                    <!-- // Modal body END --> 
                    
                    <!-- Modal footer -->
                    <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    <!-- // Modal footer END --> 
                </div>
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span2"> <br>
                            <p class="muted">Tiêu đề khuyến mãi&nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9"><br>
                            <input type="text" id="inputTitle" class="span5" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Trạng thái hoạt động<span class="required">*</span></p>
                        </div>
                        <div class="span5">
                            <select class="span4">
                                <option>Hoạt động</option>
                                <option>Ngừng hoạt động</option>
                            </select>
                            &nbsp;
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Đặt hạn áp dụng khuyến mãi<span class="required">*</span></p>
                        </div>
                        <div class="span5">
                            <div class="groupcheckbox">
                                <div>
                                    <input type="radio" class="checkbox" value="1">
                                    Áp dụng theo ngày</div>
                                <div>
                                    <input type="radio" class="checkbox" value="1">
                                    Áp dụng theo lượt mua</div>
                                <div class="separator">
                                    <input type="checkbox" class="checkbox" value="1">
                                    Không áp dụng chương trình khuyến mãi này với các chương trình khác</div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Kiểu khuyến mãi&nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span5">
                            <div class="groupcheckbox">
                                <p class="muted"><strong>Khuyến mãi theo đơn hàng:</strong></p>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/1.png" alt="">&nbsp;Miễn phí vận chuyển cho đơn hàng mua trên <strong>X</strong> sản phẩm.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/2.png" alt="">&nbsp;Miễn phí vận chuyển cho đơn hàng có trị trên <strong>X</strong> vnđ.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/3.png" alt="">&nbsp;Giảm giá cho đơn hàng có giá trị trên <strong>X</strong> vnđ.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/4.png" alt="">&nbsp;Tặng quà cho đơn hàng có giá trị trên <strong>X</strong> vnđ.</div>
                                <p class="muted"><strong>Khuyến mãi theo đơn hàng:</strong></p>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/5.png" alt="">&nbsp;Mua <strong>X</strong> sản phẩm tặng 1 sản phẩm cùng loại.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/6.png" alt="">&nbsp;Mua <strong>X</strong> sản phẩm tặng <strong>Y</strong> sản phẩm khác.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/7.png" alt="">&nbsp;Giảm giá sản phẩm khi mua số lượng lớn.</div>
                                <div style="margin: 12px;">
                                    <input type="radio" class="checkbox" value="1">
                                    &nbsp;<img src="<?php echo $template_admin; ?>/html/images/promotions/8.png" alt="">&nbsp;Giảm giá cho tất cả các sản phẩm thuộc danh mục.</div>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Thông báo hiển thị</p>
                        </div>
                        <div class="span9">
                            <textarea name="message" class="span7" rows="4"></textarea>
                            &nbsp;
                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content --> 
    </div>
    <!-- End Wrapper --> 
</div>
