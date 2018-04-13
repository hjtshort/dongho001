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
                
                    <h4 class="heading glyphicons truck"><i></i>Thêm mới phương thức vận chuyển</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        	<a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                        	<a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="sitesetting/currency/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            
                        </div>
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
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> 
                    </div>
                    <!-- // Modal footer END -->
                    
                </div>               
                <div class="widget-body">
                	<div class="row-fluid">
					<div class="span2"><br>	
						<p class="muted">Phương thức vận chuyển<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
                        <select size="5" name="ctl00$cph_Main$ctl00$ctl00$lstShippingProvider" onchange="javascript:setTimeout('__doPostBack(\'ctl00$cph_Main$ctl00$ctl00$lstShippingProvider\',\'\')', 0)" id="cph_Main_ctl00_ctl00_lstShippingProvider" style="width:200px;">
	<option value="1">Miễn phí vận chuyển</option>
	<option value="4">Phí cố định</option>
	<option value="8">Phí cố định trên 1 đơn vị sản phẩm</option>
	<option value="6">Phí theo giá trị đơn hàng</option>
	<option selected="selected" value="7">Phí theo khối lượng đơn hàng</option>

</select>

                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn 1 phương thức vận chuyển. Sau đó thêm các nội dung liên quan đến phương thức vận chuyển."></span>
						<div class="separator"></div>
					</div>
				</div>
					<div class="row-fluid">
					<div class="span2">
						<p class="muted">Tên hiển thị<span class="required">*</span></p>   
					</div>
					<div class="span8">
						<input type="text" id="inputTitle" class="span4" value="" style="float:left;bottom: 7px;position:relative;">&nbsp; 
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tên hiển thị của phương thức vận chuyển."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Thời gian vận chuyển</p>
					</div>
					<div class="span8">
						<input type="text" id="inputTitle" class="span4" value="" style="float:left;bottom: 7px;position:relative;">&nbsp; 
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thời gian để vận chuyển hàng, khi lựa chọn phương thức vận chuyển này."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Bật phương thức này</p>  
					</div>
					<div class="span9">
						<input type="checkbox" id="inputTitle" checked="checked">
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn để hiển thị phương thức này khi khách hàng thanh toàn trên website."></span>
						<div class="separator"></div>
					</div>   
				</div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Thứ tự</p>      
					</div>
					<div class="span8">
						<input type="text" id="inputTitle" class="span2" value="1" style="float:left;bottom: 7px;position:relative;">&nbsp; 
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thứ tự hiển thị của phương thức vận chuyển."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row_fluid">
                	<h4 class="muted">Cấu hình cho phương thức Phí theo khối lượng đơn hàng</h4>
                </div>
                <div class="row-fluid">
					<div class="span2">
						<p class="muted">Mức phí mặc định</p>
					</div>
					<div class="span8">
						<input type="text" id="inputTitle" class="span3" value="0">&nbsp; 
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2"><p class="muted">Giải giá trị</p></div>
					<div class="span8"><p class="muted">kg và nhỏ hơn
						<input type="text" id="inputTitle" class="span2" value="" >&nbsp;
                        kg thì phí vận chuyển là &nbsp;
                        <input type="text" id="inputTitle" class="span2" value="" >&nbsp;
                        đ Thêm
						</p>
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