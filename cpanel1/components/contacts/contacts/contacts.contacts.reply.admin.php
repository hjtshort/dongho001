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
                    <h4 class="heading glyphicons chat"><i></i>Trả lời tin nhắn:(ms tin nhắn)</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="contacts/contacts/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a> </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
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
                <!-- // Modal END -->
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Gửi đến &nbsp;:<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input name="tbMessageTo" type="text" value="tommeoden@yahoo.com" id="tbMessageTo" disabled="disabled" class="aspNetDisabled" style="width:400px;">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Tiêu đề &nbsp;:<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <input name="tbSubject" type="text" value="Re: Sản phẩm mới" id="tbSubject" style="width:400px;">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Nội dung &nbsp;:<span class="required">*</span></p>
                        </div>
                        <div class="span9">
                            <textarea name="tbMessage" rows="5" cols="20" id="tbMessage" style="width:400px;"></textarea>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2"> </div>
                        <div class="span9"> <a href="contacts/contacts/view.html" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Gửi</a>
                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content --> 
</div>
<!-- End Wrapper -->