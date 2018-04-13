<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$product_process = new product_process();	
?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">		
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="." class="glyphicons home"><i></i>Cpanel</a></li>
                <li class="divider"></li>
                <li>Thêm mới sản phẩm</li>
            </ul>
            <div class="separator bottom"></div>
    
            <div class="heading-buttons">
                <h3 class="glyphicons cart_in"><i></i> Thêm mới sản phẩm</h3>
                <div class="buttons pull-right">
                    <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu lại</button>
                    <a href="product/product/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
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
                        <li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Thông tin chi tiết</a></li>
                        <li><a href="#productPhotosTab" data-toggle="tab" class="glyphicons picture"><i></i>Ảnh/Videos</a></li>
                        <li><a href="#productInfomationTab" data-toggle="tab" class="glyphicons adjust_alt"><i></i>Thông tin khác</a></li>
                        <li><a href="#productPriceTab" data-toggle="tab" class="glyphicons cogwheel"><i></i>Sản phẩm có nhiều phiên bản</a></li>
                        <li><a href="#producttPlusTab" data-toggle="tab" class="glyphicons table"><i></i>Sản phẩm liên quan</a></li>
                        <li><a href="#productSeoTab" data-toggle="tab" class="glyphicons pie_chart"><i></i>Cấu hình SEO</a></li>
                        <li><a href="#productRaitingTab" data-toggle="tab" class="glyphicons comments"><i></i>Bài viết đánh giá</a></li>
                    </ul>
                </div>
                <div class="widget-body" style="padding: 20px;">
                  <div class="tab-content">
                    
                        <!-- Description -->
                        <div class="tab-pane active" id="productDescriptionTab">
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Tên sản phẩm &nbsp;<span class="required">*</span></p>
                                </div>
                                <div class="span9">
                                	<div class="controls">
                                        <input name="product_name" type="text" id="product_name" class="span6" />
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập tên của sản phẩm (VD:Iphone 6 Plus 64GB)"></span>
                                    	<?php 
											if(!empty($_SESSION["validator"]["product_name"])){
												echo $_SESSION["validator"]["product_name"];
											}
										?>
                                    </div>
                                </div>
                            </div>
                          	<div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Mã sản phẩm</p>
                                </div>
                                <div class="span9">
                                    <input name="product_code" type="text" id="product_code" class="span6" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></span>                                    
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Danh mục &nbsp;<span class="required">*</span></p>
                                </div>
                                <div class="span9">
                                	<div class="controls">
                                        <select size="10" name="parent_category" id="parent_category" class="span6">
                                            <option value="0">ROOT</option>                                            
                                            <?php
                                                $result = $product_process->get_category_view();
                                                $table_row = $result->fetchAll();			
                                                
                                                $category = array();
                                                $product_process->category($table_row, $category);
                                                
                                                foreach($category as $key => $row){
                                                    echo '<option value="', $row["danhmuc_id"], '">', $row["level"],  $row["tieude"], '</option>';
                                                }
                                            ?>
                                        </select>                                   
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lưa chọn danh mục chứa sản phẩm"></span>
                                        <?php 
											if(!empty($_SESSION["validator"]["parent_category"])){
												echo $_SESSION["validator"]["parent_category"];
											}
										?>
                                    </div>
                                </div>
                            </div>                                                        
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Giá &nbsp;<span class="required">*</span></p>
                                </div>
                                <div class="span9">
                                    <input name="product_price" type="text" id="product_price" class="span2 moneyformat" />
                                    <a onclick="more_price_options()" href="javascript:void(0)"> 
                                    <span id="more_price_options">Thêm lựa chọn &raquo;</span></a>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></span></div>
                            </div>
                            <!--show or hidden component-->
                            <div class="row-fluid" id="div_retailprice" style="display: none;">
                                <div class="span3">	
                                    <p class="muted">Giá thị trường</p>
                                </div>
                                <div class="span9">
                                    <input type="text" name="product_price_market" id="product_price_market" class="span2 moneyformat" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Giá của sản phẩm trên thị trường"></span>
                                    
                                </div>
                            </div>
                            <div class="row-fluid" id="div_saleprice" style="display: none;">
                                <div class="span3">	
                                    <p class="muted">Giá khuyến mãi</p>
                                </div>
                                <div class="span9">
                                    <input type="text" name="product_price_promo" id="product_price_promo" class="span2 moneyformat" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></span>&nbsp;<font style="color:#999">
                                    Hoặc giảm&nbsp;<input name="product_percent_discount" type="text" id="inputTitle" class="span1 intformat" />&nbsp;&nbsp;%</font>
                                    
                                </div>
                            </div>
                            <div class="row-fluid" id="div_costprice" style="display: none;">
                                <div class="span3">	
                                    <p class="muted">Giá gốc</p>
                                </div>
                                <div class="span9">
                                    <input type="text" name="product_price_cost" id="product_price_cost" class="span2 moneyformat" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title=">Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></span>  
                                </div>
                            </div>
                            
                            <!--end show or hidden component-->
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Giá đã bao gồm VAT</p>
                                </div>
                                <div class="span9">
                					<input value="1" name="include_vat" id="include_vat" type="checkbox" class="checkbox" />
                					<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title=" Tích vào lựa chọn nếu giá đã bao gồm thuế VAT"></span>
                              	</div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Đơn vị của sản phẩm</p>
                                </div>
                                <div class="span9">
                                <input type="text" name="product_unit" id="product_unit" class="span2" value="" placeholder="" />                                  
                              </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Hiển thị</p>
                                </div>
                                <div class="span5">
                                    <label class="groupcheckbox">
                                        <input name="product_display" id="product_display" type="checkbox" class="checkbox" checked="checked"> &nbsp; (Chọn mục này nếu bạn muốn ẩn / hiện sản phẩm)
                                    </label>                                   
                                </div>
                            </div>                            
                            <hr class="separator bottom" />
                            <div class="row-fluid">
                                <div class="span3"><br>
                                    <p class="muted">Mô tả chi tiết</p>
                                </div>
                                <div class="span9">
                                    <textarea name="product_detail"></textarea>
									<script type="text/javascript">
                                        CKEDITOR.replace( 'product_detail' , {width : '95%', height : '300px', toolbar : 'Full'});
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- Description END -->
                        
                        <!-- Photos --================================================================================================-->
                        <div class="tab-pane" id="productPhotosTab">                           
                           <div class="row-fluid">
                               <h4 class="heading glyphicons picture"><i></i> Hình ảnh</h4>
                               <br>					
                                <div class="span2" style="float:right;margin-right: 3%;">		
                                	<a onclick="BrowseServer('image_src')" class="btn btn-block btn-primary btn-icon glyphicons delete" style="float:left;"><i></i>Thêm ảnh</a>
                                </div>
                            </div>
                            <div class="row-fluid"><br>
                                <div style="width:94.452991%;margin-left: 2.7%;">
                                    <table id="tbl_product_image" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                                <th style="width: 22%;" class="center">Hình ảnh</th>
                                                <th class="center">Mô tả hình ảnh</th>
                                                <th style="width: 12%;" class="center">Ảnh chính</th>
                                                <th style="width: 5%;" class="center">Drag</th>
                                                <th class="center" style="width: 10%;">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6" style="text-align:center;font-weight:bold;">Chưa chọn hình ảnh sản phẩm</td>
                                            </tr>                                                                                    
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                            <hr class="separator bottom" />
                            
                            <div class="row-fluid">
                                <h4 class="heading glyphicons facetime_video"><i></i> Videos</h4>
                            </div><br>
                            <div class="row-fluid">
                                <div style="margin-left: 30px; margin-top: 0px;">	
                                    <input type="text" id="searchYouTube" value="" placeholder="" style="float:left;width: 29.5%;">	
                                    <button type="submit" id="findVideosButton" class="btn btn-block btn-primary btn-icon glyphicons search" style="vertical-align: middle;float: left;position: relative;right: -3px;width: 11%;top: -1px;"><i></i>Tìm kiếm</button>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Đánh nội dung tìm kiếm (tên Video, từ khóa...) hệ thống sẽ tìm các Video liên quan trên trang youtube.com -&gt; Kết quả sẽ hiển thị ở ô vuông phía dưới -&gt; Chọn Video cần đăng tải -&gt; Click vào mũi tên đưa sang ô bên tay phải." style="right: -3px; top: 5px;"></span>                        
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div id="youtubeContainer" style="margin-left: 30px; margin-top: 11px;">
                                    <div class="youtubeVideoListBox" id="youtubeLeftBox">
                                        <ul id="youTubeSearchVideos">
                                            <div id="useSearchVideos">
                                                <p class="muted">Sử dụng trường tìm kiếm ở trên để tìm kiếm video.</p>
                                            </div>
                                        </ul>
                                        <div style="display: none;" id="noSearchVideos">
                                            Không tìm thấy kết quả với từ khóa mà bạn đã nhập vào.<br>
                                            Hãy thử với các từ khác.
                                        </div>
                                    </div>
                                    <div id="youtubeJoinBox">
                                        <input type="button" id="addYouTubeVideos" class="btn" style="width: 40px;" value="»" disabled="disabled">
                                        <br><br>
                                        <input type="button" id="removeYouTubeVideos" class="btn" style="width: 40px;" value="«" disabled="disabled">
                                    </div>
                                    <div class="youtubeVideoListBox" id="youtubeRightBox">
                                        <ul style="display:none;" id="youTubeCurrentVideos" class="ui-sortable">                                            
                                        </ul>
                                        <div id="noCurrentVideos" style=""><label class="muted">
                                            Kích vào nút » để thêm video vào danh sách.<br>
                                            Tất cả các video trong danh sách sẽ được hiển thị trên trang sản phẩm.</label>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row-fluid">
                                <div class="separator bottom"></div>
                            </div>    
                        </div>
                        <!-- Photos END --============================================================================================-->
                        
                        <!-- Infomation -->
                        <div class="tab-pane" id="productInfomationTab">
                         	<div class="row-fluid">
                                <div class="span3"><br>	
                                    <p class="muted">Cho phép đặt hàng</p>
                                </div>
                                <div class="span6"><br>
                                    <select class="span6" name="IsAllowPurchase" id="IsAllowPurchase" onchange="javascript:IsDisplayPurchase();">
                                        <option selected="selected" value="allow">Cho phép</option>
                                        <option value="disallow">Không cho phép</option>
                                        <option value="disallowandtext">Không cho phép và hiển thị chữ thay thế giá</option>	
                                    </select>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></span>
                                    <div style="margin-left: 15px; display: none;" id="divCallForPricingLabel">
                                        <img style="vertical-align: middle;float: left;position: relative; top: 6px;right: 3px;" alt="" src="<?php echo $template_admin; ?>/html/images/nodejoin.gif" /><label style="float:left" class="muted">Chữ hiển thị thay thế:&nbsp;&nbsp;
                                        <input name="CallForPricingLabel" type="text" id="CallForPricingLabel" />
                                         &nbsp; ( VD: Liên hệ )
                                        </label>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Bảo hành</p>
                                </div>
                                <div class="span9">
                                    <textarea name="quaranty" class="span6" rows="5"></textarea>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung bảo hành cho sản phẩm này ở đây."></span>                                    
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Tinh trạng</p>
                                </div>
                                <div class="span5">
                                    <select class="span6" name="product_old_new">
                                        <option value="new">Hàng mới</option>
                                        <option value="old">Hàng đã sử dụng</option>
                                    </select>&nbsp;&nbsp;
                                    <input value="1" type="checkbox" class="checkbox" name="product_old_new_display" />
                                    <font style="color:#999">Hiển thị tình trạng này</font>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></span>
                                        
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Tùy chọn</p>
                                </div>
                            	<div class="span5">
                                    <div class="groupcheckbox">
                                        <input value="1" type="checkbox" class="checkbox" name="product_option_group[]" /> Nổi bật&nbsp;&nbsp;
                                        <input value="2" type="checkbox" class="checkbox" name="product_option_group[]" /> Mới&nbsp;&nbsp;
                                        <input value="3" type="checkbox" class="checkbox" name="product_option_group[]" /> Bán chạy&nbsp;&nbsp;
                                        <input value="4" type="checkbox" class="checkbox" name="product_option_group[]" id="IsPromotional" onclick="javascript:IsDisplayPromotionContent();"/> Khuyến mãi
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></span>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row-fluid" id="pPromotionContent" style="display:none">
                                <div class="span3">	
                                    <p class="muted">Nội dung khuyến mãi</p>
                                </div>
                                <div class="span9">
                                    <textarea name="txtPromotionContent" class="span6" rows="3" id="txtPromotionContent"></textarea>                                    
                                </div>
                            </div>
                            <div class="row-fluid" id="pPromotionDate" style="display:none">
                                <div class="span3">	
                                    <p class="muted">Thời gian khuyến mãi</p>
                                </div>
                                <div class="span9">                        
                                    <div>
                                        <div class="input-append" style="float:left">
                                            <input type="text" name="dateRangeFrom" id="dateRangeFrom" class="input-mini" value="<?= date("d/m/Y"); ?>" style="width: 70px; float:left" />
                                            <span class="add-on glyphicons calendar"><i></i></span>
                                        </div>
                                        <label class="muted" style="vertical-align: middle;float: left;position: relative; top: 6px;right: -12px;">Đến:</label>
                                        <div class="input-append" style="vertical-align: middle;float: left;position: relative;right: -27px;">
                                            <input type="text" name="dateRangeTo" id="dateRangeTo" class="input-mini" value="" style="width: 70px;" />
                                            <span class="add-on glyphicons calendar"><i></i></span>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>                            
                            <div class="row-fluid">
                                 <div class="span3">	
                                     <p class="muted">Hãng sản xuất</p>
                                 </div>
                                 <div class="span5">
                                    <select class="span5" name="manufacturers">
                                    	<option> -- Nhà sản xuất --</option>
                                    	<?php 
											$result = $product_process->get_nhasanxuat( ); 
											while($row = $result->fetch()){
										?> 
                                        <option value="<?= $row["nhasanxuat_id"]; ?>"> <?= $row["nhasanxuat"]; ?> </option>                                  	
                                        <?php } ?>
                                    </select>                                
                                 </div>
                            </div>
                            
                            <hr class="separator bottom" />
                                                        
                            <div class="row-fluid">
                                <div class="span3">	
                                	<p class="muted">Thuộc tính sản phẩm</p>
                                </div>
                            	<div class="span7">
                                	
                                    <table id="tbl_product_properties" class="table js-table-sortable ui-sortable">                                   
                                        <tbody>
                                        	<?php 
												$result = $product_process->get_properties();
												if ($data = $result->fetch()){
												$tenthuoctinh = unserialize($data["tenthuoctinh"]);
												for($i = 0; $i <count($tenthuoctinh); $i++){
													if(!empty($tenthuoctinh[$i])){
											?>
                                            <tr>
                                                <td style="border:none;padding:0px;">
                                                    <div class="group_row_properties">
                                                        <input value="<?= $tenthuoctinh[$i]; ?>" name="product_properties_name[]" type="text" style="width:36%" />
                                                        &nbsp;&nbsp;&nbsp;<input name="product_properties_value[]" type="text" class="span7" />
                                                    </div>
                                                </td>
                                                <td class="js-sortable-handle" style="border:none;padding:0px;">
                                                    &nbsp;&nbsp;<span title="kéo để thay đổi vị trí" class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span>
                                                    &nbsp;<a title="thêm thuộc tính" href="javascript:void(0)" onclick="javascript:addproperties()"><img src="templates/adminplus/html/images/icons/addicon.png" /></a>
                                                    <?php if($i > 0) { ?><a title="Xóa thuộc tính" href="javascript:void(0)" onclick="removeRowFromTable('tbl_product_properties', <?= @$intRowProper; ?>);return false;"><img src="templates/adminplus/html/images/icons/delicon.png" /></a> <?php } ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                </td>
                                            </tr>   
                                            <?php @$intRowProper++; }
												} 
											}?>                                     
                                        </tbody>
                                    </table>
                                    
                            	</div>
                            </div>                            
                            
                        </div>
                        <!-- Infomation END -->
                        
                        <!-- Price -->
                        <div class="tab-pane" id="productPriceTab">
                        	<div style="width:94.452991%;margin-left: 2.7%;">
                                <div class="buttons pull-right">
                                    <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="sort"><i></i> Cập nhật</a>
                                    <a title="Thêm mới sản phẩm" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="product/product/add.html"><i></i>Thêm mới</a>
                                </div>
                                <br><br>
                                <div class="row-fluid">
                                    <table id="tbl_product_image" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                                <th style="width: 22%;" class="center">Hình ảnh</th>
                                                <th class="center">Màu sắc</th>
                                                <th style="width: 12%;" class="center">Mã sản phẩm</th>
                                                <th style="width: 12%;" class="center">Giá</th>
                                                <th style="width: 5%;" class="center">Drag</th>
                                                <th class="center" style="width: 10%;">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="center">
                                            	<td><div class="checker" id="uniform-chkItem_9524"><span><input class="chkItem" name="chkItem[]" id="chkItem_9524" type="checkbox" value="9524" style="opacity: 0;"></span></div></td>
                                                <td>
                                                   	<img style="height:40px;border:1px solid #ddd" src="resource/images/no_image.jpg" onerror="this.src='resource/images/no_image.jpg'">
                                                </td>
                                                <td><input type="text" class="span12" value="Phiên bản 2018 Màu đỏ"></td>
                                                <td><input type="text" class="span12" value="HD0934"></td>
                                                <td><input type="text" class="span12" value="980.000.000"></td>
                                                <td class="center"><a title="kéo để thay đổi vị trí" class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></a></td>
                                                <td class="center"><a title="Xoá sản phẩm" data-action="delete" data-id="9524" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a></td>
                                            </tr>                                                                                    
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                        </div>
                        <!-- Price END -->                                               
                        
                        <!-- Plus -->
                        <div class="tab-pane" id="producttPlusTab">
                            <div class="row-fluid">
                                <div class="span3">	<br>
                                    <p class="muted">Sản phẩm liên quan</p>
                                </div>
                                <div class="span9"><br>
                                    <select size="10" name="lbxCategory" id="lbxCategory" class="span6">
                                    
                                    	<?php
											$category = array();
											$product_process->category($table_row, $category);
											
											foreach($category as $key => $row){
												echo '<option value="', $row["danhmuc_id"], '">', $row["level"],  $row["tieude"], '</option>';
											}
										?>
										<!--
                                        <option value="1066737">Blackberry</option>
                                        <option value="1066738">&#160;&#160;&#160;&#160;&#160;└ Blackberry Bold</option>
                                        <option value="1066739">&#160;&#160;&#160;&#160;&#160;└ Blackberry Curve</option>
                                        <option value="1066740">&#160;&#160;&#160;&#160;&#160;└ Blackberry Storm</option>
                                        <option value="1066741">Android</option>
                                        <option value="1066742">&#160;&#160;&#160;&#160;&#160;└ Android HTC</option>
                                        <option value="1066743">&#160;&#160;&#160;&#160;&#160;└ Android SamSung</option>
                                        <option value="1066744">&#160;&#160;&#160;&#160;&#160;└ Android Sony</option>
                                        <option value="1066745">WindowPhone</option>
                                        <option value="1066746">&#160;&#160;&#160;&#160;&#160;└ WindowPhone HTC</option>
                                        <option value="1066747">&#160;&#160;&#160;&#160;&#160;└ WindowPhone Nokia</option>
                                        <option value="1066748">&#160;&#160;&#160;&#160;&#160;└ Window Mobile</option>
                                        -->
                                    </select>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3"></div>
                                <div class="span9">
									<select size="10" name="lbxProducts" id="lbxProducts" class="span6">
										<option value="5860425">123344655</option>
									</select>
									<div class="separator">
                                    	<p class="muted" style="font-style:italic">* Click chuột đúp để thêm vào danh sách sản phẩm liên quan.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Danh sách đã chọn</p>
                                </div>
                                <div class="span9">
                                <select size="10" name="lbxSelectedProducts" id="lbxSelectedProducts" class="span6"></select>
                                    <div class="separator">
                                    	<p class="muted" style="font-style:italic">* Click chuột đúp để loại bỏ khỏi danh sách sản phẩm liên quan.</p>
                                    </div>
									<input type="hidden" name="hdlSelectedProducts" id="hdlSelectedProducts" />
                                </div>
                            </div>
                        </div>
                        <!-- Plus END -->
                        
                        <!-- SEO -->
                        <div class="tab-pane" id="productSeoTab">
                            <div class="row-fluid">
                                <div class="span3">
                                    <br>
                                    <p class="muted">Tiêu đề trang &nbsp;</p>                                    
                                </div>
                                <div class="span9"><br>
                                	<input name="product_seo_title" type="text" id="inputTitlePage" class="span6" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></span>                                
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Thẻ từ khoá &nbsp;</p>                                    
                                </div>
                                <div class="span9">
                                    <input name="product_seo_keyword" type="text" id="inputKeyword" class="span6" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mô tả các từ khóa chính của website."></span>                                    
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Thẻ mô tả &nbsp;</p>                                    
                                </div>
                                <div class="span9">
                                    <textarea id="inputDescrip" name="product_seo_desc" class="span6" rows="3"></textarea>
                					<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></span>                                    
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Tags</p>
                                </div>
                                <div class="span9">
                                    <input name="product_tags" type="text" id="select2_5" class="span6" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập tên tag, ấn Enter để thêm tag. Những gợi ý hiện ra là những tag đã có trên website của bạn, bạn có thể chọn để sử dụng." style="position:relative;left:4px"></span>
                                    <div class="separator bottom"></div>
                                    <div class="separator bottom"></div>
                                    <div class="separator bottom"></div>
                                    <p style="color:#686868; margin-top:-7px; font-style:italic;">Nhập tên tag, ấn Enter để thêm tag. Những gợi ý hiện ra là những tag đã có trên website của bạn, bạn có thể chọn để sử dụng.</p>
                                </div>
                            </div>
                        </div>                                                 
                        
                        <!-- SEO END -->
                        
                        <!-- Raiting -->
                        <div class="tab-pane" id="productRaitingTab">
                            <div class="row-fluid">
                                <div class="span9">
                                    <br>
                                    <textarea id="textRaiting" class="wysihtml5" style="width: 133%;" rows="8"></textarea>
                                </div>
                        	</div>
                        </div>
                        <!-- Raiting END -->
                    </div>
                </div>
            </div>
    		<br/>
            <!-- End Content -->
        </div>
        <!-- End Wrapper -->
	</div>
    
	<script language="javascript">
	
		// tagging support
		$(function(){
			$("#select2_5").select2({tags:[]});
		});
		
		<!-- script check valid form add product -->
		function more_price_options() {
			if(jQuery("#more_price_options").html().indexOf("Thêm lựa chọn") > -1) {
				jQuery("#more_price_options").html("&laquo; Bớt lựa chọn");
				jQuery("#div_costprice").css("display", "");
				jQuery("#div_retailprice").css("display", "");
				jQuery("#div_saleprice").css("display", "");
			}
			else {
				jQuery("#more_price_options").html("Thêm lựa chọn &raquo;");
				jQuery("#div_costprice").css("display", "none");
				jQuery("#div_retailprice").css("display", "none");
				jQuery("#div_saleprice").css("display", "none");
			}
		}
		// ========== Add Products ========== //
		
		$("[id$='lbxCategory']").change(function () {
            GetProductByCate($(this).val());
        });
        $("[id$='lbxProducts']").change(function () {
            //GetProductImage();
        }).dblclick(function () {
            AddRelatedProduct();
        });
        $("[id$='lbxSelectedProducts']").change(function () {
            //GetSelectedProductImage();
        }).dblclick(function () {
            RemoveRelatedProduct();
        });
		
		function GetProductByCate(categoryId){
			var response = srtjoin('<option value="5860425">Samsung Galaxy Trend Lite S7392</option>')
								  ('<option value="5860424">Samsung Galaxy Grand 2 G7102</option>')();
                $("[id$='lbxProducts']").find("option").remove();
                $("[id$='lbxProducts']").append(response);   
		}
		function AddRelatedProduct()
		{
			var choosenProductId = $("[id$='lbxProducts']").val();
			var append = true;

			$.each($("[id$='lbxSelectedProducts']").find("option"), function (i, option) {
				if(choosenProductId == $(option).val()) {
					alert("Sản phẩm đã tồn tại trong danh sách sản phẩm liên quan");
					append = false;
					return false;
				}
			});

			if (append == true) {
				$("[id$='lbxSelectedProducts']").append("<option value=\"" + choosenProductId + "\">" + $("[id$='lbxProducts']").find("option:selected").text() + "</option>");
				if ($("[id$='hdlSelectedProducts']").val() == "") {
					$("[id$='hdlSelectedProducts']").val(choosenProductId);
				}
				else {
					var t = $("[id$='hdlSelectedProducts']").val() + "," + choosenProductId;
					$("[id$='hdlSelectedProducts']").val(t)
				}
			}
		}
		function RemoveRelatedProduct()
		{
			var choosenProductId = $("[id$='lbxSelectedProducts']").val();
			if (choosenProductId > 0) {
				$("[id$='lbxSelectedProducts']").find("option[value='" + choosenProductId + "']").remove();
				$("[id$='hdlSelectedProducts']").val("");
				$.each($("[id$='lbxSelectedProducts']").find("option"), function (i, option) {
					if ($("[id$='hdlSelectedProducts']").val() == "") {
						$("[id$='hdlSelectedProducts']").val($(option).val());
					}
					else {
						var t = $("[id$='hdlSelectedProducts']").val() + "," + $(option).val();
						$("[id$='hdlSelectedProducts']").val(t);
					}
				});
			}
		}
		// ========== Related Products ========== //    
		jQuery("[id$='rdoInputByAdmin_True']").change(function () {
			if (jQuery(this).attr("checked") == "checked") {
				jQuery("[id$='txtQuantityPurchases']").removeAttr("disabled");
			}
		});
		
		jQuery("[id$='rdoInputByAdmin_False']").change(function () {
			if (jQuery(this).attr("checked") == "checked") {
				jQuery("[id$='txtQuantityPurchases']").attr("disabled", "disabled");
			}
		});
		// ========== Purchase Products ========== //
		var isPurchase = document.getElementById('IsAllowPurchase').value;
		if(isPurchase == "disallowandtext"){ ShowPurchaseDetail(); }
		
		function IsDisplayPurchase(){
			var isPurchase = jQuery("[id$='IsAllowPurchase']").val();
			if(isPurchase == "disallowandtext"){
				ShowPurchaseDetail();
			}
			else{
				InvisiblePurchaseDetail();
			}
		}
		function ShowPurchaseDetail(){
				var divDetail = document.getElementById("divCallForPricingLabel");
				divDetail.style.display = "";
			}
		function InvisiblePurchaseDetail(){
			var divDetail = document.getElementById("divCallForPricingLabel");
			divDetail.style.display = "none";
		}
		//=========Hang khuyen mai===========//
		IsDisplayPromotionContent();
				
		function IsDisplayPromotionContent(){
			if(jQuery("[id$=IsPromotional]").attr("checked") == "checked"){
				jQuery("#pPromotionContent").show();
				jQuery("#pPromotionDate").show();
			}
			else{
				jQuery("#pPromotionContent").hide();
				jQuery("#pPromotionDate").hide();
			}
		}
		
		/* check validation form */
		<?php if(!empty($_SESSION["message"]["notyfy"])){ ?>
			$(function () {
				func_notyfy("top", "information", "<?= $_SESSION["message"]["notyfy"]; ?>");
			});
		<?php unset($_SESSION["message"]["notyfy"]);} ?>
		
		$.validator.setDefaults(
		{
			submitHandler: function(form) {				
				form.submit();
			},
			showErrors: function(map, list) 
			{
				this.currentElements.parents('label:first, .controls:first').find('.error').remove();
				this.currentElements.parents('.row-fluid:first').removeClass('error');
				
				$.each(list, function(index, error) 
				{
					var ee = $(error.element);
					var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
					
					ee.parents('.row-fluid:first').addClass('error');
					eep.find('.error').remove();
					eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
				});
				//refreshScrollers();
			}
		});
		
		$(function()
		{
			// validate signup form on keyup and submit
			$("#validateSubmitForm").validate({
				rules: {					
					product_name: {
						required: true,
						minlength: 2
					},
					parent_category: {
						required: true
					}
				},
				messages: {					
					product_name: {
						required: "Tên sản phẩm không được bỏ trống",
						minlength: "Tên sản phẩm phải lớn hơn 2 ký tự"
					},
					parent_category: {
						required: "Vui lòng chọn danh mục sản phẩm",
					}
				}
			});
		
		});		
		
		/* add properties row */
		var intRowproper = <?= $intRowProper; ?>;
		function addproperties(){
			
			var row_length = $('.group_row_properties').length;
			if( row_length >= 10 ){
				return false;
			}
			
			var str = srtjoin('<tr>')
				('<td style="border:none;padding:0px;">')
					('<div class="group_row_properties">')
					('<input name="product_properties_name[]" type="text" style="width:36%" />')
					('&nbsp;&nbsp;&nbsp;&nbsp;<input name="product_properties_value[]" type="text" class="span7" />')
					('</div>')
				('</td>')
				('<td class="js-sortable-handle" style="border:none;padding:0px;">')
					('&nbsp;&nbsp;<a title="kéo để thay đổi vị trí" class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></a>')
					('&nbsp;&nbsp;<a title="Thêm thuộc tính" href="javascript:void(0)" onclick="javascript:addproperties()"><img src="templates/adminplus/html/images/icons/addicon.png" /></a>')
					('&nbsp;<a title="Xóa thuộc tính" href="javascript:void(0)" onclick="removeRowFromTable(\'tbl_product_properties\', ' + intRowproper + ');return false;"><img src="templates/adminplus/html/images/icons/delicon.png" /></a>')
				('</td>')
			('</tr>')();
										
			var tblBody = document.getElementById('tbl_product_properties').tBodies[0];
			var newRow = tblBody.insertRow(-1);
        	var newCell0 = newRow.insertCell(0);
			newRow.innerHTML = str;
			intRowproper++;	
		}			
		
		function BrowseServer( inputId )
		{
			var finder = new CKFinder() ;
			finder.StartupPath  = "Image:/image/";
			finder.selectActionFunction = SetFileField ;
			finder.selectActionData = inputId ;
			finder.popup();
		}
		
		/* add image row */
		var intRowActive = 1;
		
		// This is a sample function which is called when a file is selected in CKFinder.
		function SetFileField( fileUrl, data )
		{	
			var row_length = $('.image_file').length;
			if( row_length >= 10 ){
				return false;
			}
			
			if( row_length == 0 ){
				removeRowFromTable('tbl_product_image', 0);
				var checked = "checked";
			}
	
			var str = srtjoin('<tr class="selectable">')
					('<td class="center uniformjs"><input class="chkItem" name="chkImg[]" type="checkbox"></td>')
					('<td class="center">')
						('<img id="image_file_'+ intRowActive +'" style="height:80px;border:1px solid #ddd" alt="150x150" src="'+ fileUrl +'">')
						('<input type="hidden" class="image_file" name="image_src[]" value="'+ fileUrl +'" />')
					('</td>')
					('<td><input type="text" name="product_image_desc[]" class="span12" /></td>')
					('<td class="center"><input type="radio" id="rdoImageMain" name="choose" class="checkbox" '+ checked +'></td>')
					('<td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>')
					('<td class="center">')
						('<a onclick="removeRowFromTable(\'tbl_product_image\', ' + intRowActive + ');return false;" href="javascript:void(0);" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>')
					('</td>')
				('</tr>')();
			var tblBody = document.getElementById('tbl_product_image').tBodies[0];
			var newRow = tblBody.insertRow(-1);
        	var newCell0 = newRow.insertCell(0);
			newRow.innerHTML = str;
			intRowActive++;
		}
		
		function removeRowFromTable(tblId, intDelRow)
		{
			if (navigator.appName == "Microsoft Internet Explorer"){
				intVersion = 0;
			} else {
				intVersion = 1;
			}
			var tblBody = document.getElementById(tblId).tBodies[0];
			if(intVersion == 0)
				{
				tblBody.rows[intDelRow].innerText = "";
			}
			else
				{
				tblBody.rows[intDelRow].innerHTML = "";
			}
			tblBody.rows[intDelRow].style.display = "none";
		}
		
		srtjoin = function(str) {
		  var store = [str];
		  return function extend(other) {
			if (other != null && 'string' == typeof other ) {
			  store.push(other);
			  return extend;
			}
			return store.join('');
		  }
		};
		
		// money format
		$(function() {
			$('.moneyformat').keyup(function() {
				$(this).formatCurrency({ symbol: '', colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
			}).keypress(function(e) {
				if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
			});
			
			$('.intformat').keypress(function(e) {
				if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
			});						
		});
    </script>
    
    <input type="hidden" name="hidden" value="product.add" />
    <input type="hidden" name="act" value="save"/>
    <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y");?>" />
</form>