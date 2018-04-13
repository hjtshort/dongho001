<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="../news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                    <h4 class="heading glyphicons gift"><i></i>Thêm mới mã coupon</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="seo/coupons/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a> </div>
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
                        <div class="span3">
                            <p class="muted">Mã coupon &nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span4" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Tên coupon &nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span4" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Giảm giá &nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span2" value="" placeholder="">
                            <select class="span3">
                                <option selected="selected" value="1">% giảm giá với mỗi sản phẩm</option>
                                <option value="2">giảm giá với mỗi sản phẩm</option>
                                <option value="3">giảm giá với mỗi đơn hàng</option>
                            </select>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted"> Điều kiện nhận Coupon<span class="required">*</span><br />
                                (giá trị đơn hàng)</p>
                        </div>
                        <div class="span9">
                            <div class="groupcheckbox"> từ
                                <input type="text" class="span2">
                                &nbsp;đến &nbsp;&nbsp;
                                <input type="text" class="span2">
                            </div>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Ngày hết hạn &nbsp;</p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span2" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Số tiền tối thiểu của đơn hàng để áp dụng mã coupons &nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span3" value="0" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Số lần sử dụng</p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span3" value="1" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Trạng thái</p>
                        </div>
                        <div class="span9">
                            <select class="span3">
                                <option selected="selected" value="False">Sử dụng</option>
                                <option value="True">Ngừng sử dụng</option>
                            </select>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3">
                            <p class="muted">Áp dụng cho&nbsp;<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <div class="muted">
                                <input type="radio" class="checkbox" value="1">
                                &nbsp;Áp dụng cho danh mục sản phẩm </div>
                            <div style="position:relative; left:20px">
                                <select multiple="multiple" size="12" name="catids[]" id="catids" class="span4">
                                    <option value="-1" selected="selected"> -- Tất cả danh mục -- </option>
                                    <option value="1140134" > Điều hòa</option>
                                    <option value="1140135" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Panasonic</option>
                                    <option value="1140136" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Fujitsu</option>
                                    <option value="1140137" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa LG</option>
                                    <option value="1140138" > Tủ lạnh</option>
                                    <option value="1140139" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh Samsung</option>
                                    <option value="1140140" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh LG</option>
                                    <option value="1140141" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ lạnh Sanyo</option>
                                    <option value="1140142" > Máy giặt</option>
                                    <option value="1140143" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt LG</option>
                                    <option value="1140144" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt SamSung</option>
                                    <option value="1140145" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt ELECTROLUX</option>
                                </select>
                            </div>
                            <div class="muted">
                                <input type="radio" class="checkbox" value="1">
                                &nbsp;Áp dụng cho sản phẩm </div>
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
