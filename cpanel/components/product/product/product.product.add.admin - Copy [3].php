<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$product_process = new product_process();	
?>

	<script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
    <script type="text/javascript" src="<?= $conf['rooturl']; ?>//myeditor/ckeditor.js"></script>

	<div class="page-content">
        <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs breadcrumbs-fixed">
                <div class="buttons-task col-xs-12 col-md-6">
                    <ul class="breadcrumb breadcrumbs-fixed">
                        <li>
                            <i class="fa fa-table"></i>
                            <li><a href="product/product/view.html">Quản lý sản phẩm</a></li>
                            <li class="toast-title">Thêm sản phẩm</li>
                        </li>                
                    </ul>
                </div>
                <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                    <a href="product/product/add.html" class="btn btn-sky shiny">Hủy</a>
                    <button type="submit" class="btn btn-sky shiny">Lưu</button>
                </div>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Thông tin sản phẩm</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">                                                                         
    
                                        <div class="form-group">
                                            <label for="product_name">Tên sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Nhập tên của sản phẩm (VD:Iphone 6 Plus 64GB)"></i></label>
                                            <div>
                                                <input type="text" class="form-control" name="product_name" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="product_name">Mã sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_code" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product_name">BarCode <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_barcode" />
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label>Mô tả <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mô tả chi tiết thông tin sản phẩm"></i></label>
                                            <div>
                                                <textarea name="product_detail"></textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace( 'product_detail' , {width : '100%', height : '300px', toolbar : 'MyToolbar'});
                                                </script>
                                            </div>
                                        </div> 
                                        <hr class="wide">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label for="product_price">Giá bán <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_price" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_price_promo">Giá khuyến mãi <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_price_promo" />
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:10px;">Hoặc</div>
                                            </div>
                                            <div class="col-lg-3">                                            	
                                                <label for="product_percent_discount">Giảm % </label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="product_percent_discount">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    <span class="text"> Giá đã bao gồm VAT <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Tích vào lựa chọn nếu giá đã bao gồm thuế VAT"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Đơn vị tính (kg/grams)</label>
                                            <div>
                                                <input type="text" class="form-control" name="product_name" />
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Hình ảnh</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <!-- styles -->
                                        <link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
                                        <link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
                                        
                                        <!-- js -->
                                        <script src="plugin/fileuploader/js/jquery.fileuploader.min.js" type="text/javascript"></script>
                                        <script src="plugin/fileuploader/js/custom.js" type="text/javascript"></script>
                                                                                                                        
                                        <input type="file" name="files" data-fileuploader-files='[{"name":"kq-1311-5.jpg","type":"image/jpeg","size":75001,"file":"../uploads/kq-1311-7.jpg"}]'>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                                
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Thông tin khác</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="product_name">Cho phép đặt hàng <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>
                                                <select class="form-control" name="IsAllowPurchase" id="IsAllowPurchase" onchange="javascript:IsDisplayPurchase();">
                                                    <option selected="selected" value="allow">Cho phép</option>
                                                    <option value="disallow">Không cho phép</option>
                                                    <option value="disallowandtext">Không cho phép và hiển thị chữ thay thế giá</option>	
                                                </select>                                        
                                            </div>
                                            <div class="col-lg-6">
                                            	<div class="d-none" id="divCallForPricingLabel">
                                            	<label for="CallForPricingLabel">Chữ hiển thị thay thế: <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="VD: Liên hệ"></i></label>
                                                <input class="form-control" name="CallForPricingLabel" type="text" id="CallForPricingLabel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="product_name">Tinh trạng <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></i></label>
                                                <select class="form-control" name="product_old_new">
                                                    <option value="new">Hàng mới</option>
                                                    <option value="old">Hàng đã sử dụng</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="product_name"></label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        <span class="text"> Hiển thị tình trạng này</span>
                                                    </label>
                                                </div>
                                            </div>                                        
                                        </div>
                                        <hr class="wide">
                                                                           
                                        <div class="form-group tbl_product_properties">
                                        
                                        	<div class="form-group row group_row_properties">
                                                <div class="col-lg-12">                            	
                                                    <label>Thuộc tính sản phẩm</label>
                                                </div>
                                                <div class="col-lg-4 col-xs-4">                                            	
                                                    <input name="product_properties_name[]" type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-6 col-xs-5 row">
                                                    <input name="product_properties_value[]" type="text" class="form-control">                                                
                                                </div>
                                                <div class="col-lg-2 col-xs-3">
                                                    <div class="margin-top-7">
                                                        <i class="menu-icon glyphicon glyphicon-move"></i>&nbsp;&nbsp;
                                                        <a title="thêm thuộc tính" href="javascript:void(0)" onClick="javascript:addproperties()">
                                                            <i class="menu-icon glyphicon glyphicon-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Sản phẩm có nhiều phiên bản <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Sản phẩm có các phiên bản dựa theo thuộc tính như kích thước hoặc màu sắc ?"></i></span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">                                    	
                                    	<div class="text-align-right margin-bottom-5"><a id="modal-edit-properties" href="javascript:void(0)">Chỉnh sữa</a> | <a id="model-add-properties" href="javascript:void(0)">Thêm mới</a></div>
                                        <div class="table-scrollable">
                                        	<table class="table table-bordered table-hover tbl-product-multi-version"></table>
                                        	<!--
                                            <table class="table table-bordered table-hover tbl-product-multi-version">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="table-cell-sticky">Hình</th>
                                                        <th data-id="Size" scope="col">Kích thước</th>
                                                        <th data-id="Material" scope="col">Vật liệu</th>
                                                        <th data-id="Color" scope="col">Màu sắc</th>
                                                        <th scope="col">Mã sản phẩm</th>
                                                        <th scope="col">Giá sản phẩm</th>
                                                        <th scope="col">SLượng</th>
                                                        <th scope="col" class="table-cell-sticky"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="table-cell-sticky"><img src="../files/product/xoai.png" style="width:45px; height:45px;"></td>
                                                        <td><input class="form-control Size" type="text" value="30x40" /></td>
                                                        <td><input class="form-control Material" type="text" value="Nhựa" /></td>
                                                        <td><input class="form-control Color" type="text" value="Trắng" /></td>
                                                        <td><input class="form-control" type="text" value="DCDT-1" /></td>
                                                        <td><input class="form-control" type="text" value="150000" /></td>
                                                        <td><input class="form-control" type="text" value="---" /></td>
                                                        <td class="table-cell-sticky">
                                                            <a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-edit "></i></a>
                                                            <a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-times "></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-cell-sticky"><img src="../files/product/cam.png" style="width:45px; height:45px;"></td>
                                                        <td><input class="form-control Size" type="text" value="50x60" /></td>
                                                        <td><input class="form-control Material" type="text" value="Polyme" /></td>
                                                        <td><input class="form-control Color" type="text" value="Xanh" /></td>
                                                        <td><input class="form-control" type="text" value="DCDT-1" /></td>
                                                        <td><input class="form-control" type="text" value="150000" /></td>
                                                        <td><input class="form-control" type="text" value="---" /></td>
                                                        <td class="table-cell-sticky">
                                                            <a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-edit "></i></a>
                                                            <a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-times "></i></a>
                                                        </td>
                                                    </tr>                                             
                                                </tbody>
                                            </table>
                                            -->
                                        </div>
                                        
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Hiển thị</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">
                                                    <span class="text"> (Cho phép ẩn / hiện sản phẩm)</span>
                                                </label>
                                            </div>                                                                               
                                        </div>
                                        
                                        <div class="form-group no-margin-bottom row">
                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <input class="form-control" id="timepicker1" type="text">
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Phân loại</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <label for="product_name">Loại sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn danh mục chứa sản phẩm"></i></label>
                                            <div class="input-group">
                                                <input type="text" name="parent_category" id="parent_category" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Chọn <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-category">
                                                    	<?php 
															$result = $product_process->get_category_view();
															$table_row = $result->fetchAll();															
															
															$category = array();
															$product_process->category($table_row, $category);
															foreach($category as $key => $row){
														?> 
                                                        <li><a data-id="<?= $row["danhmuc_id"]; ?>" data-text="<?= $row["tieude"]; ?>"><?= $row["level"] , $row["tieude"]; ?></a></li>
														<?php } ?>                                                        
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Nhà sản xuất <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn nhà sản xuất của sản phẩm"></i></label>                                            
                                            <div class="input-group">
                                                <input type="text" name="manufacturers" id="manufacturers" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Chọn <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-manufacturers">
                                                    	<?php 
															$result = $product_process->get_nhasanxuat( );
															while($row = $result->fetch()){
														?> 
                                                        <li><a data-id="<?= $row["nhasanxuat_id"]; ?>" data-text="<?= $row["nhasanxuat"]; ?>"><?= $row["nhasanxuat"]; ?></a></li>
														<?php } ?>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>  
                                        <hr class="wide">      
                                        <div class="form-group no-margin-bottom">
                                            <label for="product_name">Nhóm sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn nhóm sản phẩm là sản phẩm mới hoặc sản phẩm nổi bật"></i></label>
                                            <label for="more_new_group" class="f_right"><a id="more_new_group" href="javascript:void(0)">» Thêm mới</a></label>
                                            
                                            <div class="form-group new_group d-none">
                                            	<div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default shiny" type="button">Thêm</button>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-inline row">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="colored-warning">
                                                        <span class="text">Nổi bật</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="colored-warning">
                                                        <span class="text">Mới</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="colored-warning">
                                                        <span class="text">Bán chạy</span>
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="colored-warning">
                                                        <span class="text">Khuyến mãi</span>
                                                    </label>
                                                </div>                                                
                                            </div>                                            
                                        </div>                                                                                
                                    </div>
                                </div>
                                
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Tối ưu SEO</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <label for="product_name">Tiêu đề trang <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                            <div>
                                                <input type="text" class="form-control" name="product_seo_title" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Thẻ từ khoá <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mô tả các từ khóa chính của website."></i></label>
                                            <div>
                                                <input type="text" class="form-control" name="product_seo_keyword" />
                                            </div>
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <label for="product_name">Thẻ mô tả <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                            <div>
                                                <textarea id="inputDescrip" name="product_seo_desc" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <input type="hidden" name="hidden" value="product.add" />
            <input type="hidden" name="act" value="save"/>
            <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y");?>" />
        </form>
        <!-- /Page Body -->                
    </div>
    
    <script language="javascript">	
	
		var jselectbox = [{"id":"Color", "name":"Màu sắc"},
							{"id":"Size", "name":"Kích thước"},
							{"id":"Material", "name":"Vật liệu"},
							{"id":"Style", "name":"Kiểu dáng"},
							{"id":"Custom", "name":"Tùy chọn mới"}];
		
		var option = "";
		for (i = 0; i < jselectbox.length; i++) {
			option += '<option value="' + jselectbox[i].id + '">' + jselectbox[i].name + '</option>';
		}
		//$('.ddl_properties').html(option);
	
		$.each($("[class$='ddl-manufacturers']").find("a"), function (i, option) {
			$(this).on("click", function(){
				$("#manufacturers").val($(this).data('text'));
			});
		});
		
		$.each($("[class$='ddl-category']").find("a"), function (i, option) {
			$(this).on("click", function(){
				$("#parent_category").val($(this).data('text'));
			});
		});
		
		/* --- modal thêm thuộc tính --- */
		$("#model-add-properties").on('click', function () {
								
			var modal = srtjoin('<div id="new-properties-modal">')
				('<div class="row">')
					('<div class="col-md-12">')();
						if($('.tbl-product-multi-version tbody tr').length == 0){
						modal += srtjoin('<div class="form-group row modal-add_properties_row">')
							('<div class="col-lg-3 col-xs-12 pro-col-1 m_xs_bottom_10">')
								('<select onchange="javascript:modal_add_new_properties(this)" class="form-control" name="modal-add-ddl-properties">')
									(option)
								('</select>')
							('</div>')
							('<div class="col-lg-9 col-xs-10 pro-col-2 m_xs_bottom_10">')
								('<input type="text" class="form-control" name="modal-add-properties-value" placeholder="Nhập giá trị">')
							('</div>')
						('</div>')();
						} else {
							var arr = new Array();
							modal += srtjoin('<div class="form-group row">')();
							$('.tbl-product-multi-version th').each(function(){
								if( typeof $(this).data('id') != 'undefined' || $(this).data('id') != null ){
									modal += srtjoin('<div class="col-lg-4">')
										('<label for="modal-add-properties-value"><strong>' + $(this).text() + '</strong></label>')
										('<div>')
											('<input data-name="'+ $(this).data('id') +'" type="text" class="form-control" name="modal-add-properties-value">')
										('</div>')
									('</div>')();
								}				
							});
							modal += srtjoin('</div><hr class="wide">')();
						}
						modal += srtjoin('<div class="form-group row">')
							('<div class="col-lg-6">')
								('<label for="product_name">Mã sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_code-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-6">')
								('<label for="product_name">BarCode <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_barcode-modal">')
								('</div>')
							('</div>')
						('</div>')				
						('<div class="form-group row">')
							('<div class="col-lg-4">')
								('<label for="product_price">Giá bán <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_price-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_price_promo">Giá khuyến mãi <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_price_promo-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-1">')
								('<label for="product_percent_discount"></label>')
								('<div style="margin-top:10px;">Hoặc</div>')
							('</div>')
							('<div class="col-lg-3">')
								('<label for="product_percent_discount-modal">Giảm % </label>')
								('<div>')
									('<div class="input-group">')
										('<input type="text" class="form-control" name="product_percent_discount">')
										('<span class="input-group-addon">%</span>')
									('</div>')
								('</div>')
							('</div>')
						('</div>')						
						('<div class="form-group">')
							('<div class="checkbox">')
								('<label>')
									('<input type="checkbox" name="include-vat-modal">')
									('<span class="text"> Giá đã bao gồm VAT <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Tích vào lựa chọn nếu giá đã bao gồm thuế VAT"></i></span>')
								('</label>')
							('</div>')
						('</div>')						
						('<div class="form-group">')
							('<label for="product-unit-modal">Đơn vị tính (kg/grams)</label>')
							('<div>')
								('<input type="text" class="form-control" name="product-unit-modal">')
							('</div>')
						('</div>')						
					('</div>')
				('</div>')
			('</div>')();

            bootbox.dialog({
				message: $(modal).html(),
                title: "Tạo thuộc tính mới",
                className: "",
                buttons: {
                    success: {
                        label: "Tạo mới",
                        className: "btn-blue",
                        callback: function () {														
							
							if( $("[name$='modal-add-ddl-properties'] :selected").val() == "Custom"){
								var modal_add_ddl_properties_val = "Custom";
								var modal_add_properties_name = $("[name$='modal-add-properties_name']").val();
								var modal_add_properties_value = $("[name$='modal-add-properties-value']").val();								
							} else {
								if($('.tbl-product-multi-version tbody tr').length == 0){
									var modal_add_ddl_properties_val = $("[name$='modal-add-ddl-properties'] :selected").val();
								} else {
									var modal_add_ddl_properties_val = $("[name$='modal-add-properties-value']").data("name");
								}
								var modal_add_properties_name = $("[name$='modal-add-ddl-properties'] :selected").text();
								var modal_add_properties_value = $("[name$='modal-add-properties-value']").val();
							}
							
							if($('.tbl-product-multi-version tbody tr').length == 0){
								var thead = srtjoin('')
								('<thead>')
									('<tr>')
										('<th scope="col" class="table-cell-sticky">Hình</th>')
										('<th data-id="'+ modal_add_ddl_properties_val +'" scope="col">'+ modal_add_properties_name +'</th>')
										('<th scope="col">Mã sản phẩm</th>')
										('<th scope="col">Giá sản phẩm</th>')
										('<th scope="col">SLượng</th>')
										('<th scope="col" class="table-cell-sticky"></th>')
									('</tr>')
								('</thead>')();
								$(".tbl-product-multi-version").append(thead);
							}
							
							var tbody = srtjoin('')
							('<tbody>')
								('<tr>')
									('<td class="table-cell-sticky"><img src="../files/product/xoai.png" style="width:45px; height:45px;"></td>')
									('<td><input class="form-control '+ modal_add_ddl_properties_val +'" type="text" value="'+ modal_add_properties_value +'" /></td>')
									('<td><input class="form-control" type="text" value="'+ $("[name$='product_code-modal']").val() +'" /></td>')
									('<td><input class="form-control" type="text" value="'+ $("[name$='product_price-modal']").val() +'" /></td>')
									('<td><input class="form-control" type="text" value="---" /></td>')
									('<td class="table-cell-sticky">')
										('<a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-edit "></i></a>')
										('<a class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);"><i class="fa fa-times "></i></a>')
									('</td>')
								('</tr>')
							('</tbody>')();
							
							$(".tbl-product-multi-version").append(tbody);
														
						}
                    },
                    "Hủy": {
                        className: "btn-white",
                        callback: function () { }
                    }
                }
            });

        });
		
		$("body").on('click', '#modal-add-cancel_properties', function () {
			
			var col1 = srtjoin('<select onchange="javascript:modal_add_new_properties(this)" class="form-control" name="modal-add-ddl-properties">')
									(option)
								('</select>')();
			var col2 = srtjoin('<input type="text" class="form-control" name="modal-add-properties-value" placeholder="Nhập giá trị">')();
			var col3 = srtjoin('<a id="cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
									('<i class="fa fa-times "></i>')
								('</a>')();
								
			$(".modal-add_properties_row .pro-col-1").html(col1);
			$(".modal-add_properties_row .pro-col-2").html(col2);
			
		});
		
		function modal_add_new_properties(opt){
			
			if($(opt).val() == "Custom"){

				var col2 = srtjoin('<div class="row">')
										('<div class="col-lg-5 m_xs_bottom_10">')
											('<input type="text" class="form-control" name="modal-add-properties_name" placeholder="Nhập tên thuộc tính">')
										('</div>')
										('<div class="col-lg-6 m_xs_bottom_10 row">')
											('<input type="text" class="form-control" name="modal-add-properties-value" placeholder="Nhập giá trị">')
										('</div>')
										('<div class="col-lg-1 m_xs_bottom_10">')
											('<a id="modal-add-cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
												('<i class="fa fa-times "></i>')
											('</a>')
										('</div>')
									('</div>')();
				
				$(".modal-add_properties_row .pro-col-2").html(col2);

			} else {

				var col2 = srtjoin('<input type="text" class="form-control" name="modal-add-properties-value" placeholder="Nhập giá trị">')();
				var col3 = srtjoin('<a id="cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
										('<i class="fa fa-times "></i>')
									('</a>')();									

				$(".modal-add_properties_row .pro-col-2").html(col2);
			}
		}
		
		/* --- end modal thêm thuộc tính --- */
		
		/* --- modal sữa thuộc tính --- */
		$("body").on("click","#modal-edit-properties",function(){
			
			var arr = new Array();
										
			$('.tbl-product-multi-version thead th').each(function(){
				var id = $(this).data('id'); var value = "";				
				if( typeof id != 'undefined' || id != null ){
					$('.tbl-product-multi-version input.'+ id).each(function(){
						value += $(this).val() + ", ";
					});
					arr.push({"title": id, "value": value});
				}
			});
			
			var jselectbox1 = new Array();

			for (i = 0; i < jselectbox.length; i++) {
				
				jselectbox1.push({"id": jselectbox[i].id, "name": jselectbox[i].name, "disabled": ""});
				
				$.each(arr, function( k, v ) {
					if(jselectbox[i].id == v.title){
						jselectbox1[jselectbox1.length-1].disabled = "disabled";						
					}
				});
			}
			
			var modal = srtjoin('')
			('<div id="edit-properties-modal">')
				('<div class="row edit-properties-modal">')
					('<div class="col-md-12">')();
						$.each(arr, function( k, v ) {
							modal += srtjoin('<div class="form-group row">')
								('<div class="col-lg-3 col-xs-4">')
									('<select onchange="javascript:select_curren_properties(this)" class="form-control ddl_properties" name="ddl_properties[]">')();
									for (i = 0; i < jselectbox1.length; i++) {
										modal += srtjoin('<option ' + jselectbox1[i].disabled)();
										if(jselectbox1[i].id == v.title){ modal += srtjoin(' selected ')(); }
										modal += srtjoin(' value="' + jselectbox1[i].id + '">' + jselectbox1[i].name + '</option>')();
									}
									modal += srtjoin('</select>')
								('</div>')
								('<div class="col-lg-8 col-xs-8">')
									('<label class=" text-align-center margin-top-7">' + v.value + '</label>')
								('</div>')
							('</div>')();
						});
						modal += srtjoin('<div class="form-group row add_properties_row">')
							('<div class="col-lg-3 col-xs-12 pro-col-1 m_xs_bottom_10">')
								('<a id="add_properties" class="btn btn-default purple" href="javascript:void(0);" style="width:135px;">')
									('Thêm thuộc tính')
								('</a>')
							('</div>')
							('<div class="col-lg-8 col-xs-10 pro-col-2 m_xs_bottom_10">')
								('<label class=" text-align-center margin-top-7">')
									('ví dụ : Màu sắc , Kích thước , Nguyên liệu')
								('</label>')
							('</div>')
							('<div class="col-lg-1 col-xs-2 row pro-col-3 m_xs_bottom_10"></div>')
						('</div>')
					('</div>')
				('</div>')
			('</div>')();

            bootbox.dialog({
				message: $(modal).html(),
                title: "Chỉnh sửa thuộc tính",
                className: "",
                buttons: {
                    success: {
                        label: "Lưu thay đổi",
                        className: "btn-blue",
                        callback: function () {
							
							var arr = new Array();
							$('.edit-properties-modal select').each(function(){
								
								if( $(this).find(":selected").val() == "Custom"){
									arr.push({"value": $(this).find(":selected").val(), "text": $(this).parent().next().find("input").val()});	
								} else {
									arr.push({"value": $(this).find(":selected").val(), "text": $(this).find(":selected").text()});	
								}
								
							});
							
							var th = 0;
							$('.tbl-product-multi-version th').each(function(){
								var id = $(this).data('id');
								if( typeof id != 'undefined' || id != null ){									
									$(this).text(arr[th].text);
									//$(this).attr('data-id', arr[th].value);
									$(this).data('id', arr[th].value);
									th++;
								}								
							});
							
							$(".edit-properties-modal .properties_ddl_new").each(function(){
								alert($(this).val());
								alert($("[name$='properties_name_new']").val());								
							});
							
							
							//$('.tbl-product-multi-version thead tr th:first').after('<th data-id="style" scope="col">Kiểu dáng</th>');
							//$('.tbl-product-multi-version tbody tr td:first').after('<td><input class="form-control Style" type="text" value="hình tròn"></td>');
						}
                    },
                    "Hủy": {
                        className: "btn-white",
                        callback: function () { }
                    }
                }
            });

        });
		
		$("body").on('click', '#add_properties', function () {
			
			var jselectbox1 = new Array();
			
			$(".ddl_properties").find('option').each(function() {				
				jselectbox1.push({"id": $(this).val(), "name": $(this).text(), "disabled": $(this).attr("disabled")});				
			});

			var option = "";
			for (i = 0; i < jselectbox1.length; i++) {
				option += '<option '+ jselectbox1[i].disabled +' value="' + jselectbox1[i].id + '">' + jselectbox1[i].name + '</option>';					
			}

			var col1 = srtjoin('<select data-id="ddl_new" onchange="javascript:select_curren_properties(this)" class="form-control ddl_properties properties_ddl_new" name="properties_ddl_new">')
									('<option selected disabled value="Title">Tiêu đề</option>')
									(option)
								('</select>')();
			var col2 = srtjoin('<input type="text" class="form-control" name="properties_name_new" placeholder="Nhập giá trị">')();
			var col3 = srtjoin('<a id="cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
									('<i class="fa fa-times "></i>')
								('</a>')();
								
			$(".add_properties_row .pro-col-1").html(col1);
			$(".add_properties_row .pro-col-2").html(col2);
			$(".add_properties_row .pro-col-3").html(col3);
		});
		
		$("body").on('click', '#cancel_properties', function () {
			
			var col1 = srtjoin('<a id="add_properties" class="btn btn-default purple" href="javascript:void(0);" style="width:135px;">')
									('Thêm thuộc tính')
								('</a>')();
			var col2 = srtjoin('<label class="text-align-center margin-top-7">')
									('ví dụ : Màu sắc , Kích thước , Nguyên liệu')
								('</label>')();
			var col3 = srtjoin('')();
			
			$(".add_properties_row .pro-col-1").html(col1);
			$(".add_properties_row .pro-col-2").html(col2);
			$(".add_properties_row .pro-col-3").html(col3);
			
		});	
		
		function select_new_properties(opt){
			if($(opt).val() == "Custom"){

				var col2 = srtjoin('<div class="row">')
									('<div class="col-lg-6 m_xs_bottom_10">')
										('<input type="text" class="form-control ddl_properties" name="properties_name" placeholder="Nhập tên thuộc tính">')
									('</div>')
									('<div class="col-lg-6 m_xs_bottom_10">')
										('<input type="text" class="form-control" name="properties_name_new" placeholder="Nhập giá trị">')
									('</div>')();
				var col3 = srtjoin('<a id="cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
									('<i class="fa fa-times "></i>')
									('</a>')
									('</div>')();
				
				$(".add_properties_row .pro-col-2").html(col2);
				$(".add_properties_row .pro-col-3").html(col3);

			} else {
				
				var jselectbox1 = new Array();
			
				$(opt).find('option').each(function() {
									
					jselectbox1.push({"id": $(this).val(), "name": $(this).text(), "disabled": ""});
					
					if($(this).attr("disabled") && $(this).attr("selected") != "selected" || $(opt).val() == $(this).val()){
						if($(this).val() != "Custom"){
							jselectbox1[jselectbox1.length-1].disabled = "disabled";
						}
					}
					
				});
				
				console.log(jselectbox1);
				
				$.each($("[class$='ddl_properties']"), function (i, val) {
					var option = "";
					for (i = 0; i < jselectbox1.length; i++) {
						option += '<option ';
						if(val.value == jselectbox1[i].id) { option += 'selected '; }
						option += jselectbox1[i].disabled +' value="' + jselectbox1[i].id + '">' + jselectbox1[i].name + '</option>';					
					}
					$(this).html(option);
				});
				
				var col1 = srtjoin('<select onchange="javascript:select_new_properties(this)" class="form-control ddl_properties properties_ddl_new" name="properties_ddl_new">')
									
								('</select>')();
				var col2 = srtjoin('<input type="text" class="form-control" name="properties_name" placeholder="Nhập giá trị">')();
				var col3 = srtjoin('<a id="cancel_properties" class="btn btn-default btn-sm shiny icon-only danger" href="javascript:void(0);">')
										('<i class="fa fa-times "></i>')
									('</a>')();
									
				//$(".add_properties_row .pro-col-1").html(col1);
				$(".add_properties_row .pro-col-2").html(col2);
				$(".add_properties_row .pro-col-3").html(col3);
				
			}
		}
		
		function select_curren_properties(opt){
						
			if($(opt).val() == "Custom"){
				var str = srtjoin('<div class="col-lg-6 col-xs-12 pro-col-2 m_xs_bottom_10 no-padding-left">')
									('<input type="text" class="form-control ddl_properties" name="properties_name" placeholder="Nhập tên thuộc tính">')
								 ('</div>')();
				$(opt).parent().next().first().append(str);
			} else {
				$(opt).parent().next().children().remove("div");
			}
			
			var jselectbox1 = new Array();			
			
			$(opt).find('option').each(function() {								
				jselectbox1.push({"id": $(this).val(), "name": $(this).text(), "disabled": ""});				
				if($(this).attr("disabled") && $(this).attr("selected") != "selected" || $(opt).val() == $(this).val()){
					if($(this).val() != "Custom"){
						jselectbox1[jselectbox1.length-1].disabled = "disabled";
					}
				}
			});
			
			$.each($("body .ddl_properties"), function (i, val) {
				
				var option = "";
				
				if( $(this).data("id") == "ddl_new" && jselectbox1[i].id != "Title" ){
					var option = '<option value="Title">Tiêu đề</option>';
				} else if( $(this).data("id") != "ddl_new" && jselectbox1[i].id == "Title"){
					jselectbox1.shift();										
				}
				
				for (i = 0; i < jselectbox1.length; i++) {
					option += '<option ';
					if(val.value == jselectbox1[i].id) { option += 'selected '; }
					option += jselectbox1[i].disabled +' value="' + jselectbox1[i].id + '">' + jselectbox1[i].name + '</option>';					
				}
				$(this).html(option);
				
			});
			
		}
		
		/* --- end modal sữa thuộc tính --- */
	
		function BrowseServer( inputId )
		{
			var finder = new CKFinder() ;
			finder.StartupPath  = "Image:/image/";
			finder.selectActionFunction = SetFileField ;
			finder.selectActionData = inputId ;
			finder.popup();
		}
	
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

		/* add properties row */
		var intRowproper = 10;
		/* add image row */
		var intRowActive = 1;
		
		function addproperties(){
			
			var row_length = $('.group_row_properties').length;
			if( row_length >= 10 ){
				return false;
			}
			
			var str = srtjoin('<div class="form-group row group_row_properties">')
					('<div class="col-lg-4 col-xs-4">')
						('<input name="product_properties_name[]" type="text" class="form-control">')
					('</div>')
					('<div class="col-lg-6 col-xs-5 row">')                                  	
						('<input name="product_properties_value[]" type="text" class="form-control">')
					('</div>')
					('<div class="col-lg-2 col-xs-4">')
						('<div class="margin-top-7">')
							('<i class="menu-icon glyphicon glyphicon-move"></i>&nbsp;&nbsp;&nbsp;')
							('<a title="thêm thuộc tính" href="javascript:void(0)" onClick="javascript:addproperties()">')
								('<i class="menu-icon glyphicon glyphicon-plus"></i>')
							('</a>&nbsp;&nbsp;')
							('<a title="Xóa thuộc tính" href="javascript:void(0)" onClick="removeRowFromTable(this);return false;">')
								('<i class="menu-icon glyphicon glyphicon-minus-sign"></i>')
							('</a>')
						('</div>')
					('</div>')
				('</div>')();
			
			$( ".tbl_product_properties" ).append( str );
			intRowproper++;
		}						
		
		function removeRowFromTable(r_delete)
		{
			$(r_delete).parent().parent().parent().remove();
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
				
		$("#more_new_group").on('click', function () {
            $(".new_group").fadeToggle(500);
			if($(this).text() == "» Ẩn"){
				$(this).text("» Thêm mới");
			} else if($(this).text() == "» Thêm mới"){
				$(this).text("» Ẩn");
			}
        });		
		
    </script>
    
    <!--Bootstrap Date Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-datepicker.js"></script>

    <!--Bootstrap Time Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-timepicker.js"></script>

    <!--Bootstrap Date Range Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>
    
    <script src="<?= $conf['template_admin']; ?>/assets/js/bootbox/bootbox.js"></script>
    
    <script>

        //--Bootstrap Date Picker--
        $('.date-picker').datepicker();

        //--Bootstrap Time Picker--
        $('#timepicker1').timepicker();
        
    </script>