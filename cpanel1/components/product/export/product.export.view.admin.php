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
                
                    <h4 class="heading glyphicons inbox"><i></i>Xuất danh sách sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        <a href="" class="btn btn-primary btn-icon glyphicons share"><i></i> Huỷ</a>
                        <a href="" class="btn btn-primary btn-icon glyphicons new_window"><i></i> Tiếp tục</a>
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
						<p class="muted">Danh mục &nbsp;<span class="required">*</span></p>
					</div>
					<div class="span9"><br />
                    <select multiple="multiple" size="12" name="catids[]" id="catids" class="span6">
                        <option value="-1" selected="selected">
                            -- Tất cả danh mục -- </option>
                        
                                <option value="1140134" >
                                    Điều hòa</option>
                            
                                <option value="1140135" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Panasonic</option>
                            
                                <option value="1140136" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Fujitsu</option>
                            
                                <option value="1140137" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa LG</option>
                            
                                <option value="1140138" >
                                    Tủ lạnh</option>
                            
                                <option value="1140139" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh Samsung</option>
                            
                                <option value="1140140" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh LG</option>
                            
                                <option value="1140141" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ lạnh Sanyo</option>
                            
                                <option value="1140142" >
                                    Máy giặt</option>
                            
                                <option value="1140143" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt LG</option>
                            
                                <option value="1140144" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt SamSung</option>
                            
                                <option value="1140145" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt ELECTROLUX</option>
                            
                    </select>

						&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Định dạng tệp tin &nbsp;</p>
					</div>
					<div class="span5">
                    <div class="groupcheckbox"><div>
						<input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False" />&nbsp;Xuất định dạng CSV</div><div>
                        <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False" />&nbsp;Xuất định dạng XLS</div><div>
                        <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False" />&nbsp;Xuất định dạng XML</div></div>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Lưu trên server &nbsp;</p>
					</div>
					<div class="span5">
                    <div class="groupcheckbox">
                        	<input id="IsPromotional" type="checkbox" name="IsPromotional" class="checkbox" value="1"/>
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="File sau khi xuất ra sẽ được lưu lại trên server"></span>
                        </div>
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