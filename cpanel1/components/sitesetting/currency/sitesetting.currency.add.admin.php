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
                
                    <h4 class="heading glyphicons inbox"><i></i>Thêm mới nhóm Menu</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        	<a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="sitesetting/currency/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            
                        </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
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
                <div class="widget-body">
                	<div class="row-fluid">
					<div class="span2"><br />	
						<p class="muted">Tiền đệ<span class="required">*</span></p>
					</div>
					<div class="span9"><br />
                        <select size="7" name="Main$ctl00$ctl00$lstCurrencyId" id="lstCurrencyId" class="TextInput" style="width:250px;">
                                <option value="1">Dollar (USD)</option>
                                <option value="2">Việt Nam Đồng (VND)</option>
                                <option value="4">Yen (JPY)</option>
                                <option value="5">WON (WON)</option>
                                <option value="6">AUST.DOLLAR (AUD)</option>
                                <option value="7">CANADIAN DOLLAR (CAD)</option>
                                <option value="8">SWISS FRANCE (CHF)</option>
                                <option value="9">DANISH KRONE (DKK)</option>
                                <option value="10">EURO (EUR)</option>
                                <option value="11">BRITISH POUND (GBP)</option>
                                <option value="12">HONGKONG DOLLAR (HKD)</option>
                                <option value="13">INDIAN RUPEE (INR)</option>
                                <option value="14">SOUTH KOREAN WON (KRW)</option>
                                <option value="15">KUWAITI DINAR (KWD)</option>
                                <option value="16">MALAYSIAN RINGGIT (MYR)</option>
                                <option value="17">NORWEGIAN KRONER (NOK)</option>
                                <option value="18">RUSSIAN RUBLE (RUB)</option>
                                <option value="19">SWEDISH KRONA (SEK)</option>
                                <option value="20">SINGAPORE DOLLAR (SGD)</option>
                                <option value="21">THAI BAHT (THB)</option>
                                <option value="23">POLISH ZLOTY (PLN)</option>
                            </select>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn một trong các loại tiền tệ trong khung để làm đơn vị tiền tệ cho website và ghi tỷ giá so với đồng Việt Nam tại ô Tỷ giá."></span>
						<div class="separator"></div>
					</div>
				</div>
					<div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tỉ giá<span class="required">*</span></p>
                        
					</div>
					<div class="span5"><br>
						<input type="text" id="inputTitle" class="span2" value="" style="float:left;bottom: 7px;position:relative;">&nbsp; <p class="muted" style="float:left;position:relative;left: 4px;">(so với đồng Việt Nam)</p>
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title=" Viết tên nhóm menu, thêm mới nhóm menu giúp bạn có thể tùy biến thêm mới một danh sách menu theo ý mình."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Cập nhật từ hệ thống</p>
                        
					</div>
					<div class="span9"><br>
						<input type="checkbox" id="inputTitle" checked="checked">
						<div class="separator"></div>
					</div>   
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Mã tiền tệ &nbsp;</p>
					</div>
					<div class="span9"><br>
						<span id="code"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tên</p>
					</div>
					<div class="span9"><br>
						<span id="name"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Ký tự hiển thị</p>
					</div>
					<div class="span9"><br>
						<span id="currencystring"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Vị trí<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<span id="position"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tỷ giá từ hệ thống<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<span id="exchangerate"></span>
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