<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="heading-buttons">
            <h3 class="glyphicons user_add"><i></i>Thêm mới thông tin khách hàng</h3>
            <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="contacts/customers/view.html" class="btn btn-primary btn-icon glyphicons share"><i></i> Quay lại</a> </div>
            <div class="clearfix"></div>
        </div>
        <div class="separator bottom"></div>
        
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
        <div class="widget widget-2 widget-tabs">
            <div class="widget-head">
                <ul>
                    <li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Thông tin chi tiết</a></li>
                    <li class=""><a href="#productSeoTab" data-toggle="tab" class="glyphicons user"><i></i>Địa chỉ khách hàng</a></li>
                    <li class=""><a href="#productInfoTab" data-toggle="tab" class="glyphicons table"><i></i>Đơn hàng đã mua</a></li>
                </ul>
            </div>
            <div class="widget-body" style="padding: 10px;">
                <div class="tab-content"> 
                    
                    <!-- Thông tin chung -->
                    <div class="tab-pane active" id="productDescriptionTab">
                        <ul class="breadcrumb" style="background: #E9E9EC;">
                            <li>
                                <p  class="glyphicons user"><i></i><strong class="muted">Thông tin cá nhân</strong></p>
                            </li>
                        </ul>
                        <div class="row-fluid">
                            <div class="span2"> <br>
                                <p class="muted">Họ điệm &nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9"><br>
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập thông tin họ đệm khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Tên&nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập thông tin Tên khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Tên công ty&nbsp;</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span4" value="" placeholder="">
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập thông tin nơi làm việc."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Email&nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span4" value="" placeholder="">
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email liên hệ của Khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Thuộc nhóm</p>
                            </div>
                            <div class="span9">
                                <select class="span3">
                                    <option selected="selected" value="vi-VN">-----Chọn-----</option>
                                </select>
                                &nbsp; <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn nhóm khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Điện thoại &nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện thoại liên hệ khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Ngày sinh &nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span2" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền thông tin về ngày sinh."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Giới tính</p>
                            </div>
                            <div class="span5">
                                <div class="groupcheckbox">
                                    <input type="radio" name="gioitinh" id="gioitinh" value="1">
                                    Nam&nbsp;
                                    <input type="radio" name="gioitinh" id="gioitinh" value="1">
                                    Nữ
                                    &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn thông tin về giới tính."></span> </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Ghi chú</p>
                            </div>
                            <div class="span9">
                                <textarea name="message" class="span5" rows="5"></textarea>
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thông tin khác về khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <ul class="breadcrumb" style="background: #E9E9EC;">
                            <li>
                                <p  class="glyphicons circle_info"><i></i><strong class="muted">Thông tin khác</strong></p>
                            </li>
                        </ul>
                        <br>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Yahoo</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thông tin về Yahoo Messenger của Khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Skype</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thông tin về Skype của khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Google Talk</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thông tin về Google Talk của khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Facebook</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span3" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thông tin về địa chỉ Facebook của khách hàng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <ul class="breadcrumb" style="background: #E9E9EC;">
                            <li>
                                <p  class="glyphicons keys"><i></i><strong class="muted">Mật khẩu khách hàng</strong></p>
                            </li>
                        </ul>
                        <div class="row-fluid">
                            <div class="span2"> <br>
                                <p class="muted">Mật khẩu mới &nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9"><br>
                                <input type="password" id="inputTitle" class="span3" value="" placeholder="">
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Xác nhận mật khẩu&nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <input type="password" id="inputTitle" class="span3" value="" placeholder="">
                                <div class="separator"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Thông tin chung END --> 
                    
                    <!-- SEO -->
                    <div class="tab-pane" id="productSeoTab">
                        <div class="row-fluid">
                            <div class="span3"> <br>
                                <p class="muted">Tiêu đề trang &nbsp;</p>
                            </div>
                            <div class="span9"><br>
                                <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Thẻ từ khóa</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mô tả các từ khóa chính của website"></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Thẻ mô tả</p>
                            </div>
                            <div class="span9">
                                <textarea name="message" class="span6" rows="5"></textarea>
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                    </div>
                    <!-- SEO END --> 
                    
                    <!-- Danh mục tin liên quan -->
                    <div class="tab-pane" id="productInfoTab"> </div>
                    <!-- Danh mục tin liên quan END --> 
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Content --> 
    
</div>
