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
                                        
                                            <input type="file" name="files">
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
                                        <div class="form-group row">
                                            <div class="col-lg-12">                                    	
                                                <label>Thuộc tính sản phẩm</label>                    
                                            </div>
                                            <div class="col-lg-4">                                            	
                                                <input value="Thương hiệu" name="product_properties_name[]" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-6">                                            	
                                                <input name="product_properties_value[]" type="text" class="form-control">                                                
                                            </div>
                                            <div class="col-lg-2">
                                                <div style="margin-top:5px;">
                                                    <i class="menu-icon glyphicon glyphicon-move"></i>&nbsp;&nbsp;
                                                    <a title="thêm thuộc tính" href="javascript:void(0)" onClick="javascript:addproperties()">
                                                        <i class="menu-icon glyphicon glyphicon-plus"></i>
                                                    </a>
                                                </div>
                                            </div>                               
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-4">                                            	
                                                <input value="Chống nước" name="product_properties_name[]" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-6">                                   	
                                                <input name="product_properties_value[]" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-2">
                                                <div style="margin-top:5px;">
                                                    <i class="menu-icon glyphicon glyphicon-move"></i>&nbsp;&nbsp;
                                                    <a title="thêm thuộc tính" href="javascript:void(0)" onClick="javascript:addproperties()">
                                                    <i class="menu-icon glyphicon glyphicon-plus"></i>
                                                    <a title="Xóa thuộc tính" href="javascript:void(0)" onClick="removeRowFromTable('tbl_product_properties', 9);return false;">
                                                        <i class="menu-icon glyphicon glyphicon-minus-sign"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Sản phẩm có nhiều phiên bản</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="maximize">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        
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
                                        
                                        <div class="form-group row">
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
                                            <div>
                                                <select name="parent_category" id="parent_category" class="form-control">
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
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Nhà sản xuất <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn nhà sản xuất của sản phẩm"></i></label>
                                            <div>
                                                <select name="parent_category" id="parent_category" class="form-control">
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
                                            </div>
                                        </div>  
                                        <hr class="wide">      
                                        <div class="form-group">
                                            <label for="product_name">Nhóm sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn nhóm sản phẩm là sản phẩm mới hoặc sản phẩm nổi bật"></i></label>
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
                                        <div class="form-group">
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
    
    <!--Bootstrap Date Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-datepicker.js"></script>

    <!--Bootstrap Time Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-timepicker.js"></script>

    <!--Bootstrap Date Range Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>
    
    <script>

        //--Bootstrap Date Picker--
        $('.date-picker').datepicker();

        //--Bootstrap Time Picker--
        $('#timepicker1').timepicker();
        
    </script>