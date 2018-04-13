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
	<h3 class="glyphicons coins"><i></i> Cấu hình thanh toán</h3>
	<div class="buttons pull-right">
		<a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
		<a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
        <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>

<!-- Modal inline -->

<!-- Modal -->
<div class="modal hide fade" id="modal-simple">
	
	<!-- Modal heading -->
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
<div class="widget widget-2 widget-tabs">
	<div class="widget-head">
		<ul>
			<li class="active"><a href="#settingTab" data-toggle="tab" class="glyphicons cogwheel"><i></i>Cấu hình chung</a></li>
			<li><a href="#pay1Tab" data-toggle="tab" class="glyphicons pie_chart"><i></i>Thanh toán tại cửa hàng</a></li>
            <li><a href="#pay2Tab" data-toggle="tab" class="glyphicons table"><i></i>Thanh toán khi nhận được hàng</a></li>
		</ul>
	</div>
	<div class="widget-body" style="padding: 10px;">
		<div class="tab-content">
		
			<!-- Thông tin chung -->
			<div class="tab-pane active" id="settingTab">
				
                <div class="row-fluid">
					<div class="span3">
						<br>
						<p class="muted">Lựa chọn phương thức thanh toán <br />(có thể chọn một hoặc nhiều phương thức thanh toán)<p class="required">*</p></p>
                        
					</div>
					<div class="span9"><br>
						<div id="phPaymentProvider" class="muted">
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_2" type="checkbox" value="2" onclick="javascript:OnPaymentProviderClick(this);">
                                Tích hợp Bảo Kim đơn giản</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_3" type="checkbox" value="3" onclick="javascript:OnPaymentProviderClick(this);">
                                Tích hợp Bảo Kim Merchant</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_4" type="checkbox" value="4" onclick="javascript:OnPaymentProviderClick(this);" checked="checked">
                                Thanh toán tại cửa hàng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_5" type="checkbox" value="5" onclick="javascript:OnPaymentProviderClick(this);" checked="checked">
                                Thanh toán khi nhận được hàng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_6" type="checkbox" value="6" onclick="javascript:OnPaymentProviderClick(this);">
                                Tích hợp đơn giản Ngân Lượng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_7" type="checkbox" value="7" onclick="javascript:OnPaymentProviderClick(this);">
                                Tích hợp nâng cao Ngân Lượng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_8" type="checkbox" value="8" onclick="javascript:OnPaymentProviderClick(this);">
                                Thanh toán qua PayPal</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_9" type="checkbox" value="9" onclick="javascript:OnPaymentProviderClick(this);">
                                Thanh toán qua tài khoản Ngân hàng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_11" type="checkbox" value="11" onclick="javascript:OnPaymentProviderClick(this);">
                                Hình thức thanh toán riêng</label>
                        </div>
                    
                        <div style="margin-top: 5px;">
                            <label>
                                <input id="chk_payment_provider_12" type="checkbox" value="12" onclick="javascript:OnPaymentProviderClick(this);">
                                Thanh toán qua OnePay</label>
                        </div>
                    
            </div>

						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid">
					<div class="span3"><br>
						<p class="muted">Nội dung thông báo đặt hàng thành công:</p>
					</div>
					<div class="span9"><br />
                    <textarea id="textDescription" class="wysihtml5" style="width:70%" rows="7"></textarea>
                    </div>
				</div>
                
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Cấu hình địa chỉ thanh toán:</p>
					</div>
					<div class="span9">
<select name="ctl00$cph_Main$ctl00$ctl00$ddlRegion" id="cph_Main_ctl00_ctl00_ddlRegion" style="width:200px;">
	<option value="1">Việt Nam</option>
	<option value="2">Nước ngoài</option>

</select>
					  <div class="separator"></div>
				  </div>
				</div>	
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">Ưu tiên giao hàng đến địa chỉ khác:<br />
(mặc định là giao hàng đến cùng địa chỉ)</p>
					</div>
					<div class="span9">
<select name="ctl00$cph_Main$ctl00$ctl00$ddlAnotherShippingAddressAllow" id="cph_Main_ctl00_ctl00_ddlAnotherShippingAddressAllow" style="width:200px;">
	<option selected="selected" value="No">Không</option>
	<option value="Yes">Có</option>

</select>
					  <div class="separator"></div>
				  </div>
				</div>
			</div>
			<!-- Thông tin chung END -->
			
            <!-- SEO -->
			<div class="tab-pane" id="pay1Tab">
			
              	<div class="row-fluid"><br>
					<div class="span9"><p class="muted" style="float:left;position:relative;right: 33px;">
						Nhập vào chỉ dẫn thanh toán tại quầy, chỉ dẫn này sẽ hiển thị ở trang thanh toán đơn hàng<br>
Thiết lập</p>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Tên hiển thị</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">
            Chỉ dẫn thanh toán
        </p>
					</div>
					<div class="span9">
						<textarea id="textDescription2" class="wysihtml5" style="width:70%" rows="7">Bạn vui lòng đến cửa hàng để thanh toán và nhận hàng.</textarea>
						<div class="separator"></div>
					</div>
				</div>
            
			</div>
			<!-- SEO END -->
		
			<!-- Danh mục tin liên quan -->
			<div class="tab-pane" id="pay2Tab">
			
              	<div class="row-fluid"><br>
					<div class="span9"><p class="muted" style="float:left;position:relative;right: 33px;">
						Nhập vào chỉ dẫn thanh toán tại quầy, chỉ dẫn này sẽ hiển thị ở trang thanh toán đơn hàng<br>
Thiết lập</p>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
					  <p class="muted">Tên hiển thị</p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span3">	
						<p class="muted">
            Chỉ dẫn thanh toán
        </p>
					</div>
					<div class="span9">
						<textarea id="textDescription3" class="wysihtml5" style="width:70%" rows="7">Bạn sẽ thanh toán khi nhận được hàng chuyển đến địa chỉ mua hàng của bạn.</textarea>
						<div class="separator"></div>
					</div>
				</div>
            
			</div>
			<!-- Danh mục tin liên quan END -->
			
		</div>
	</div>
</div>
				
		</div>
				<!-- End Content -->
				
		</div>
