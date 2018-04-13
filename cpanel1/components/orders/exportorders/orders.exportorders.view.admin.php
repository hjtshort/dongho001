<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="../../content/news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                    <h4 class="heading glyphicons file_export"><i></i> Xuất danh sách đơn hàng</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons share"><i></i> Huỷ</a> <a href="" class="btn btn-primary btn-icon glyphicons new_window"><i></i> Tiếp tục</a> </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
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
                        <div class="span2">
                            <p class="muted">Kiểu xuất dữ liệu</p>
                        </div>
                        <div class="span5">
                            <div class="groupcheckbox">
                                <div>
                                    <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False">
                                    Xuất theo đơn hàng</div>
                                <div>
                                    <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False">
                                    Xuất theo sản phẩm</div>
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Thời gian đặt hàng</p>
                        </div>
                        <div class="span5">
                            <div style="position:relative; float:left; bottom: 5px;">
                                <p class="muted" style="position:relative; float:left; top:7px;">Từ ngày:</p>
                                <div class="input-append" style="position:relative;left: 5px;">
                                    <input type="text" name="from" id="dateRangeFrom" class="input-mini" value="08/05/13" style="width: 53px;">
                                    <span class="add-on glyphicons calendar"><i></i></span> </div>
                            </div>
                            <div style="position:relative; float:left; bottom: 5px;left: 17px;">
                                <p class="muted" style="position:relative; float:left; top:7px;">Đến ngày:</p>
                                <div class="input-append" style="position:relative;left: 5px;">
                                    <input type="text" name="to" id="dateRangeTo" class="input-mini" value="08/18/13" style="width: 53px;">
                                    <span class="add-on glyphicons calendar"><i></i></span> </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Trạng thái đơn hàng</p>
                        </div>
                        <div class="span5">
                            <select id="ddlOrderStatus" style="width:160px;">
                                <option selected="selected" value="0"> -- Tất cả -- </option>
                                <option value="1">Chờ xử l&#253;</option>
                                <option value="2">Chờ thanh to&#225;n</option>
                                <option value="3">Chờ ho&#224;n th&#224;nh</option>
                                <option value="4">Chờ xuất h&#224;ng</option>
                                <option value="5">Chờ nhận h&#224;ng</option>
                                <option value="6">Chuyển một phần</option>
                                <option value="7">Ho&#224;n th&#224;nh</option>
                                <option value="8">Đ&#227; chuyển hết</option>
                                <option value="9">Hủy đơn h&#224;ng</option>
                                <option value="10">Từ chối đơn h&#224;ng</option>
                                <option value="11">Ho&#224;n trả đơn h&#224;ng</option>
                                <option value="12">Đ&#227; tiếp nhận</option>
                                <option value="13">Đề nghị hủy</option>
                            </select>
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
