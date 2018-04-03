<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$product_process = new product_process();
	
	$result = $product_process->process_get_product_edit( $conf['geturl']['id'] ); 
	
	$result1 = $product_process->get_phienban( $conf['geturl']['id'] );
	
	$row = $result1->fetchAll();
	
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
            <?php if($data = $result->fetch()){ ?>
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="widget radius-bordered">                                   
                                    <div class="widget-body widget-body-white">
                                    	<div class="form-title">Thông tin sản phẩm</div>
                                        <div class="form-group">
                                            <label for="product_name">Tên sản phẩm <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Nhập tên của sản phẩm (VD:Iphone 6 Plus 64GB)"></i></label>
                                            <div>
                                                <input value="<?= $data["tensanpham"]; ?>" type="text" class="form-control" name="product_name" />
                                            </div>
                                        </div>                                                                                
    
                                        <div class="form-group">
                                            <label>Nội dung <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mô tả chi tiết thông tin sản phẩm"></i></label>
                                            <div>
                                                <textarea name="product_detail"><?= $data["motachitiet"]; ?></textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace( 'product_detail' , {width : '100%', height : '300px', toolbar : 'MyToolbar'});
                                                </script>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                
                                <div class="widget radius-bordered">                                    
                                    <div class="widget-body widget-body-white">
                                    	<div class="form-title">Hình ảnh</div>                                        
                                        <?php
											if(!empty($data["hinhanh"]) && $data["hinhanh"] != "null"){
												include_once('../libraries/phpupload/class.fileuploader.php');
												
												$hinhanh = json_decode($data["hinhanh"]);
                                                $uploadDir = "../{$conf['data_user']}/file_upload/product/";
												// create an empty array
												// we will add to this array the files from directory below
												// here you can also add files from MySQL database
												$appendedFiles = array();
					
												foreach ($hinhanh as $key => $file) {
													if(is_dir($file)) continue;
													
													// add file to our array
													// !important please follow the structure below
													$appendedFiles[] = array(
														"name" => $file,
														"type" => FileUploader::mime_content_type($uploadDir . $file),
														"size" => filesize($uploadDir . $file),
														"file" => $uploadDir . $file,
														"data" => array(
															"url" => $uploadDir . $file
														)
													);
												}
												// convert our array into json string
												$appendedFiles = json_encode($appendedFiles);
											}
										?>
                                        
                                        <!-- styles -->
                                        <link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
                                        <link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
                                        
                                        <!-- js -->
                                        <script src="plugin/fileuploader/js/jquery.fileuploader.min.js" type="text/javascript"></script>
                                        <script src="plugin/fileuploader/js/custom.js" type="text/javascript"></script>                                        

                                        <input type="file" name="files" data-fileuploader-files='<?= $appendedFiles; ?>'>
                                        <input type="hidden" name="json_image" value="<?= implode("|",json_decode($data["hinhanh"])); ?>" />                                        

                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                                
                                <?php if(count($row) == 1){ ?>
                                <div class="widget radius-bordered">                         
                                    <div class="widget-body widget-body-white">
                                    	<div class="form-title">Đặt giá</div>
                                        <div class="form-group row">                                        	
                                            <div class="col-lg-4">
                                                <label for="product_price">Giá bán <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>                                               
                                                <div>
                                                    <div class="input-group">
                                                        <input value="<?= number_format($row[0]["giaban"], 0, ",", ","); ?>" type="text" class="form-control" name="product_price">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_price_promo">Giá so sánh <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>                                                
                                                <div>
                                                    <div class="input-group">
                                                        <input value="<?= number_format($row[0]["giasosanh"], 0, ",", ","); ?>" type="text" class="form-control" name="product_price_promo">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
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
                                                        <input value="<?= $row[0]["phantramgiam"]; ?>" type="text" class="form-control" name="product_percent_discount">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input value="1" name="include_vat" id="include_vat" type="checkbox" class="checkbox" <?php if($row[0]["dabaogomvat"]){ echo "checked"; }?> />
                                                    <span class="text"> Giá đã bao gồm VAT <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Tích vào lựa chọn nếu giá đã bao gồm thuế VAT"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr class="wide">
                                        <div class="form-title">Kho hàng</div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label for="product_name">Mã sản phẩm / SKU <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>
                                                <div>
                                                    <input value="<?= $row[0]["masanpham"]; ?>" type="text" class="form-control" name="product_code" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_name">Mã vạch / Barcode <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>
                                                <div>
                                                    <input value="<?= $row[0]["mavach"]; ?>" type="text" class="form-control" name="product_barcode" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_name">Đơn vị tính (kg/grams)</label>
                                                <div class="input-group">
                                                    <input value="<?= $row[0]["donvitinh"]; ?>" type="text" name="product_unit" id="product_unit" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default btn-dropdown dropdown-toggle" data-toggle="dropdown">Chọn <span class="caret"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">                                                    	
                                                            <li><a data-obj="unit" data-id="g" data-text="g">g</a></li>
                                                            <li><a data-obj="unit" data-id="kg" data-text="kg">kg</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="inventory_management">Quản lý kho <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>
                                                <select class="form-control" name="inventory_management" id="inventory_management">
                                                    <option <?php if($row[0]["quanlykho"] == 0){ echo "selected"; }?> value="disallow">Không quản lý kho hàng</option>
                                                    <option <?php if($row[0]["quanlykho"] == 1){ echo "selected"; }?> value="allow">Quản lý kho hàng</option>
                                                </select>                                        
                                            </div>
                                            <div class="col-lg-6">
                                            	<div class="<?php if($row[0]["quanlykho"] == 0){ echo "d-none"; }?>" id="divCallForPricingLabel">
                                                    <label for="inventory_quantity">Số lượng: <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="VD: Liên hệ"></i></label>
                                                    <input value="<?= $row[0]["soluong"]; ?>" class="form-control" name="inventory_quantity" type="text" id="inventory_quantity">
                                                </div>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                <?php } ?>
     
                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                    	<div class="text-align-right margin-top-10 margin-bottom-20">
                                        	<a class="margin-right-20" id="" href="javascript:void(0)">Sắp xếp phiên bản</a>
                                        	<a class="margin-right-20" id="modal-edit-option" href="javascript:void(0)">Sữa tùy chọn</a>
                                            <a id="modal-add-option" href="javascript:void(0)">Thêm phiên bản</a>
                                        </div>
                                        <div class="table-scrollable">
                                            <?php $tuychon_ten = json_decode($data["tuychon_ten"]); ?>                                            
                                            <table class="table table-hover tbl-product-multi-version">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="table-cell-sticky">Hình</th>
                                                        <?php foreach ($tuychon_ten as $key => $opt_name) { ?>
														<th data-id="Size" scope="col"><?= $opt_name; ?></th>
														<?php } ?>
                                                        <th scope="col">Mã sản phẩm</th>
                                                        <th scope="col">Giá sản phẩm</th>
                                                        <th scope="col" class="table-cell-sticky"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php foreach ($row as $key => $val) { ?>
                                                    <tr>
                                                        <td class="table-cell-sticky"><img class="bordered-1 bordered-gray" src="../uploads/<?= $val["hinhanh_phienban"]; ?>" onerror="this.src='resource/images/no_image.jpg'" style="width:45px; height:45px;"></td>
                                                        <?php $tuychon_giatri = json_decode($row[0]["tuychon_giatri"]); 
														foreach ($tuychon_giatri as $key => $opt_value) { ?>
                                                        <td><input class="form-control" type="text" value="<?= $opt_value; ?>" /></td>
                                                        <?php } ?>
                                                        <td><input class="form-control" type="text" value="<?= $val["masanpham"]; ?>" /></td>
                                                        <td><input class="form-control" type="text" value="<?= number_format($val["giaban"], 0, ",", ","); ?>" /></td>
                                                        <td class="table-cell-sticky">
                                                            <a class="btn btn-default btn-sm shiny icon-only row-edit-option" data-id="0"><i class="fa fa-edit"></i></a>
                                                            <a class="btn btn-default btn-sm shiny icon-only" href="javascript:void(0);"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>                                         
                                                </tbody>
                                            </table>

                                        </div>                                        
                                    </div>
                                </div>                            
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="widget radius-bordered">                                   
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" <?php if($data["hienthi"]){ echo "checked"; }?>  name="product_display">
                                                    <span class="text"> (Cho phép ẩn / hiện sản phẩm)</span>
                                                </label>
                                            </div>                                                                               
                                        </div>
                                        
                                        <div class="form-group no-margin-bottom row">
                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <input name="date_display" readonly value="<?= date("d/m/Y", $data["lichhienthi"]); ?>" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd/mm/yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-xs-12">                                               
                                                <div class="input-group">
                                                    <input name="time_display" readonly value="<?= date("h:i A", $data["lichhienthi"]); ?>" class="form-control" id="timepicker1" type="text">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr class="wide">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="product_name">Cho phép đặt hàng <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>
                                                <select class="form-control" name="IsAllowPurchase" id="IsAllowPurchase" onchange="javascript:IsDisplayPurchase();">
                                                    <option <?php if($data["chophepdathang"] == "allow"){ echo "selected"; } ?> value="allow">Cho phép</option>
                                                    <option <?php if($data["chophepdathang"] == "disallow"){ echo "selected"; } ?> value="disallow">Không cho phép</option>
                                                    <option <?php if($data["chophepdathang"] == "disallowandtext"){ echo "selected"; } ?> value="disallowandtext">Không cho phép và hiển thị chữ thay thế giá</option>	
                                                </select>                                        
                                            </div>                                            
                                        </div>
                                        <div id="divCallForPricingLabel" class="form-group row <?php if($data["chophepdathang"] != "disallowandtext"){ echo "d-none"; } ?>">
                                            <div class="col-lg-12">
                                            	<label for="CallForPricingLabel">Chữ hiển thị thay thế: <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="VD: Liên hệ"></i></label>
                                                <input value="<?= $data["chuthaythegia"]; ?>" class="form-control" name="CallForPricingLabel" type="text" id="CallForPricingLabel">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="product_name">Tinh trạng <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></i></label>
                                                <select class="form-control" name="product_old_new">
                                                    <option <?php if($data["tinhtrang"] == "new"){ echo "selected"; } ?> value="new">Hàng mới</option>
                                                    <option <?php if($data["tinhtrang"] == "old"){ echo "selected"; } ?> value="old">Hàng đã sử dụng</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input <?php if($data["hienthitinhtrang"] == 1){ echo "checked"; } ?> type="checkbox" name="product_old_new_display">
                                                        <span class="text"> Hiển thị tình trạng này</span>
                                                    </label>
                                                </div>
                                            </div>                                        
                                        </div>
    
                                    </div>
                                </div>
                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                    	<div class="form-title">Phân loại</div>
                                        <div class="form-group">
                                            <label for="product_category">Danh mục </label> ví dụ: Điện thoại, Ô tô ... <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn danh mục chứa sản phẩm"></i>
                                            <div class="input-group">
                                                <input placeholder="Nhập danh mục sản phẩm" value="<?= $data["tendanhmuc"]; ?>" type="text" name="product_category" id="product_category" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-dropdown" data-toggle="dropdown">Chọn <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                    	<?php 
															$result = $product_process->get_category_view();
															$table_row = $result->fetchAll();															
															
															$category = array();
															$product_process->category($table_row, $category);
															foreach($category as $key => $row){
														?> 
                                                        <li><a data-obj="product_category" <?php if($row["danhmuc_id"] == $data["danhmuc_id"]) { echo 'class="fw_bold"'; }?> data-id="<?= $row["danhmuc_id"]; ?>" data-text="<?= $row["tieude"]; ?>"><?= $row["level"] , $row["tieude"]; ?></a></li>
														<?php } ?>                                                        
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="manufacturers">Nhà sản xuất</label> ví dụ: Sony, Apple ...<i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lưa chọn nhà sản xuất của sản phẩm"></i>
                                            <div class="input-group">
                                                <input placeholder="Nhập nhà sản xuất" value="<?= $data["nhasanxuat"]; ?>" type="text" name="manufacturers" id="manufacturers" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle btn-dropdown" data-toggle="dropdown">Chọn <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                    	<?php 
															$result = $product_process->get_nhasanxuat( );
															while($row = $result->fetch()){
														?> 
                                                        <li><a data-obj="manufacturers" <?php if($row["nhasanxuat_id"] == $data["nhasanxuat_id"]) { echo 'class="fw_bold"'; }?> data-id="<?= $row["nhasanxuat_id"]; ?>" data-text="<?= $row["nhasanxuat"]; ?>"><?= $row["nhasanxuat"]; ?></a></li>
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
                                            	<?php 
													$result = $product_process->get_nhomsanpham( );
													while($row = $result->fetch()){
												?>
                                                <div class="checkbox">
                                                    <label>
                                                        <input <?php if($func->_checkIdinJson($row["nhom_id"], $data["nhomhienthi"])){echo "checked";} ?> value="<?= $row["nhom_id"]; ?>" type="checkbox" class="colored-warning" name="product_option_group">
                                                        <span class="text"><?= $row["tieude"]; ?></span>
                                                    </label>
                                                </div>
                                                <?php } ?>                                               
                                            </div>                                            
                                        </div>                                                                                
                                    </div>
                                </div>
                                
                                <div class="widget radius-bordered">                                    
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Tối ưu SEO</div>
                                        <div class="form-group">
                                            <label for="product_name">Tiêu đề trang <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                            <div>
                                                <input value="<?= $data["seo_tieudetrang"]; ?>" type="text" class="form-control" name="product_seo_title" />
                                            </div>
                                        </div>                                       
                                        <div class="form-group no-margin-bottom">
                                            <label for="product_name">Thẻ mô tả <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                            <div>
                                                <textarea id="inputDescrip" name="product_seo_desc" class="form-control" rows="3"><?= $data["seo_themota"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <input type="hidden" name="hidden" value="product.edit" />
            <input type="hidden" name="act" value="save"/>
            <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y");?>" />
            <?php } ?>
        </form>
        <!-- /Page Body -->                
    </div>
    
    <script language="javascript">
	
		$(document).ready(function () {
            $("#validateSubmitForm").bootstrapValidator();	
			
			<?php if (!empty($_SESSION["message"]["notyfy"])) { echo $_SESSION["message"]["notyfy"]; } ?>
			
			//--Bootstrap Date Picker--
			$('.date-picker').datepicker();
	
			//--Bootstrap Time Picker--
			$('#timepicker1').timepicker();
			
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
			
			$.each($("[class$='ddl-box']").find("a"), function (i, option) {
				$(this).on("click", function(){
					$("[name$='" + $(this).data('obj') + "']" ).val($(this).data('text'));
				});
			});
			
		});
	
		var joption = [{"name":"Màu sắc"},{"name":"Kích thước"},{"name":"Vật liệu"},{"name":"Kiểu dáng"}];
		
		$("body").on('click', '.add_option', function () {
			
			var arr_option_name = $('input.product_option_name').map(function() { return $(this).val(); }).toArray();
			
			var option_val = "Title";
			$.each(joption, function( k, v ) {				
				var result = $.inArray( v.name, arr_option_name );
				if(result == -1){
					option_val = v.name;
				}
			});

			var str = srtjoin('')
				('<div class="form-group row">')
					('<div class="col-lg-5 col-xs-4">')                 	
						('<input name="product_option_name[]" value="'+ option_val +'" type="text" class="form-control product_option_name">')
					('</div>')
					('<div class="col-lg-6 col-xs-7">')
						('<input name="product_option_value[]" placeholder="Nhập giá trị" type="text" class="form-control product_option_value">')
					('</div>')
					('<div class="col-lg-1 col-xs-2 row pro-col-3 m_xs_bottom_10">')
						('<a class="btn btn-default btn-sm shiny icon-only cancel_option">')
							('<i class="fa fa-trash-o"></i>')
						('</a>')
					('</div>')
				('</div>')();
			
			$( ".content-option" ).last().append( str );
			
			var opt_length = $('input.product_option_name').length;
			
			if( opt_length >= 5 ){
				$(".add_option_row").hide();
				return false;
			}

			if(opt_length > 1){
				$(".cancel_option").first().show();
			}			

		});
		
		$("body").on('click', '.cancel_option', function () {			
			$(this).parent().parent().remove();
			var opt_length = $('input.product_option_name').length;
			
			if( opt_length < 5 ){
				$(".add_option_row").show();
			}
			
			if(opt_length == 1){
				$(".cancel_option").first().hide();
			}
		});	
		
		var joption_data = [{"name": ["Kích thước", "Vật liệu"], "value": ["50x60", "Inox"], "price":"50000", "priceCompare":"60000", "discount":"0", "productCode":"DCDT-1", "productBarcode":"Bar-1", "unit":"", "inventoryManagement":""},
							{"name": ["Kích thước", "Vật liệu"], "value": ["80x90", "Bạc"], "price":"80000", "priceCompare":"90000", "discount":"10", "productCode":"DCDT-1", "productBarcode":"Bar-1", "unit":"", "inventoryManagement":""}];							
		
		/* --- sữa thuộc tính --- */
		$("body").on("click", ".row-edit-option",function(){
			
			var i = $(this).data('id');
			
			var modal = srtjoin('')
			('<div id="new-properties-modal">')
				('<div class="row">')
					('<div class="col-md-12">')();
						if($('.tbl-product-multi-version tbody tr').length > 0){
							var arr = new Array();
							modal += srtjoin('')
							('<div class="form-group row">')();
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
						modal += srtjoin('')						
						('<div class="form-group row">')
							('<div class="col-lg-4">')
								('<label for="product_price">Giá bán <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>')
								('<div>')
									('<input value="'+ joption_data[i].price +'" type="text" class="form-control" name="product_price-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_price_promo">Giá so sánh <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>')
								('<div>')
									('<input value="'+ joption_data[i].priceCompare +'" type="text" class="form-control" name="product_price_promo-modal">')
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
						('<hr class="wide">')
						('<div class="form-group row">')
							('<div class="col-lg-4">')
								('<label for="product_name">Mã sản phẩm / SKU <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_code-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_name">Mã vạch / Barcode <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_barcode-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_name">Đơn vị tính (kg/grams)</label>')
								('<div class="input-group">')
									('<input type="text" name="parent_category" id="parent_category" class="form-control">')
									('<div class="input-group-btn">')
										('<button type="button" class="btn btn-default dropdown-toggle btn-dropdown" data-toggle="dropdown">Chọn <span class="caret"></span></button>')
										('<ul class="dropdown-menu dropdown-menu-pos-right ddl-category">')
											('<li><a data-id="g" data-text="g">grams</a></li>')
											('<li><a data-id="kg" data-text="kg">kg</a></li>')
										('</ul>')
									('</div>')
								('</div>')
							('</div>')
						('</div>')
						('<div class="form-group row">')
							('<div class="col-lg-6">')
								('<label for="inventory_management">Quản lý kho <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>')
								('<select class="form-control" name="inventory_management" id="inventory_management">')
									('<option selected="selected" value="disallow">Không quản lý kho hàng</option>')
									('<option value="allow">Quản lý kho hàng</option>')
								('</select>')
							('</div>')
							('<div class="col-lg-6">')
								('<div class="d-none" id="divCallForPricingLabel">')
								('<label for="inventory_quantity">Số lượng: <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="VD: Liên hệ"></i></label>')
								('<input class="form-control" name="inventory_quantity" type="text" id="inventory_quantity">')
								('</div>')
							('</div>')
						('</div>')
					('</div>')
				('</div>')
			('</div>')();

            bootbox.dialog({
				message: $(modal).html(),
                title: "Thay đổi tùy chọn",
                className: "",
                buttons: {
                    success: {
                        label: "Cập nhật",
                        className: "btn-blue shiny",
                        callback: function () {							
														
						}
                    },
                    "Hủy": {
                        className: "btn-default shiny",
                        callback: function () { }
                    }
                }
            });

        });	
		
		/* --- modal sữa thuộc tính --- */
		$("body").on("click", "#modal-edit-option",function(){
			
			var arr = new Array();
										
			$('.tbl-product-multi-version thead th').each(function(){
				var id = $(this).data('id'); var value = ""; var title = $(this).text(); 
				if( typeof id != 'undefined' || id != null ){
					$('.tbl-product-multi-version input.'+ id).each(function(){
						value += $(this).val() + ", ";
					});
					arr.push({"title": title, "value": value});
				}
			});
						
			var modal = srtjoin('')
			('<div id="edit-properties-modal">')
				('<div class="row edit-properties-modal">')
					('<div class="col-md-12">')
						('<div class="content-option">')();
						$.each(arr, function( k, v ) {
							modal += srtjoin('')							
							('<div class="form-group row">')
								('<div class="col-lg-5 col-xs-4"><input name="product_option_name[]" class="form-control product_option_name" type="text" value="' + v.title + '"></div>')
								('<div class="col-lg-6 col-xs-7">')
									('<label class=" text-align-center margin-top-7">' + v.value + '</label>')
								('</div>')
								('<div class="col-lg-1 col-xs-2 row pro-col-3 m_xs_bottom_10">')
									('<a class="btn btn-default btn-sm shiny icon-only cancel_option">')
										('<i class="fa fa-trash-o"></i>')
									('</a>')
								('</div>')
							('</div>')();
						});
						modal += srtjoin('</div>')();
						modal += srtjoin('')
						('<div class="form-group row add_option_row">')
							('<div class="col-lg-5 col-xs-12 m_xs_bottom_10">')
								('<a class="btn btn-default purple add_option">')
									('Thêm tuỳ chọn mới')
								('</a>')
							('</div>')
							('<div class="col-lg-6 col-xs-10 m_xs_bottom_10">')
								('<label class=" text-align-center margin-top-7">')
									('ví dụ : Màu sắc , Kích thước , Vật liệu')
								('</label>')
							('</div>')
							('<div class="col-lg-1 col-xs-2 row m_xs_bottom_10"></div>')
						('</div>')
					('</div>')
				('</div>')
			('</div>')();

            bootbox.dialog({
				message: $(modal).html(),
                title: "Sửa tùy chọn",
                className: "",
                buttons: {
                    success: {
                        label: "Cập nhật",
                        className: "btn-blue shiny",
                        callback: function () {
														
						}
                    },
                    "Hủy": {
                        className: "btn-default shiny",
                        callback: function () { }
                    }
                }
            });

        });			
		
		/* --- modal thêm thuộc tính --- */
		$("#modal-add-option").on('click', function () {
								
			var modal = srtjoin('')
			('<div id="new-properties-modal">')
				('<div class="row">')
					('<div class="col-md-12">')();
						if($('.tbl-product-multi-version tbody tr').length > 0){
							var arr = new Array();
							modal += srtjoin('')
							('<div class="form-group row">')();
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
						modal += srtjoin('')						
						('<div class="form-group row">')
							('<div class="col-lg-4">')
								('<label for="product_price">Giá bán <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_price-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_price_promo">Giá so sánh <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>')
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
						('<hr class="wide">')
						('<div class="form-group row">')
							('<div class="col-lg-4">')
								('<label for="product_name">Mã sản phẩm / SKU <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_code-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_name">Mã vạch / Barcode <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>')
								('<div>')
									('<input type="text" class="form-control" name="product_barcode-modal">')
								('</div>')
							('</div>')
							('<div class="col-lg-4">')
								('<label for="product_name">Đơn vị tính (kg/grams)</label>')
								('<div class="input-group">')
									('<input type="text" name="parent_category" id="parent_category" class="form-control">')
									('<div class="input-group-btn">')
										('<button type="button" class="btn btn-default dropdown-toggle btn-dropdown" data-toggle="dropdown">Chọn <span class="caret"></span></button>')
										('<ul class="dropdown-menu dropdown-menu-pos-right ddl-category">')
											('<li><a data-id="g" data-text="g">grams</a></li>')
											('<li><a data-id="kg" data-text="kg">kg</a></li>')
										('</ul>')
									('</div>')
								('</div>')
							('</div>')
						('</div>')
						('<div class="form-group row">')
							('<div class="col-lg-6">')
								('<label for="inventory_management">Quản lý kho <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>')
								('<select class="form-control" name="inventory_management" id="inventory_management">')
									('<option selected="selected" value="disallow">Không quản lý kho hàng</option>')
									('<option value="allow">Quản lý kho hàng</option>')
								('</select>')
							('</div>')
							('<div class="col-lg-6">')
								('<div class="d-none" id="divCallForPricingLabel">')
								('<label for="inventory_quantity">Số lượng: <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title="VD: Liên hệ"></i></label>')
								('<input class="form-control" name="inventory_quantity" type="text" id="inventory_quantity">')
								('</div>')
							('</div>')
						('</div>')
					('</div>')
				('</div>')
			('</div>')();

            bootbox.dialog({
				message: $(modal).html(),
                title: "Thêm phiên bản mới",
                className: "",
                buttons: {
                    success: {
                        label: "Tạo mới",
                        className: "btn-blue shiny",
                        callback: function () {							
														
						}
                    },
                    "Hủy": {
                        className: "btn-default shiny",
                        callback: function () { }
                    }
                }
            });

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
				
		$("#more_new_group").on('click', function () {
            $(".new_group").fadeToggle(500);
			if($(this).text() == "» Ẩn"){
				$(this).text("» Thêm mới");
			} else if($(this).text() == "» Thêm mới"){
				$(this).text("» Ẩn");
			}
        });				
		
		/* --- end modal sữa thuộc tính --- */
	
		function BrowseServer( inputId )
		{
			var finder = new CKFinder() ;
			finder.StartupPath  = "Image:/image/";
			finder.selectActionFunction = SetFileField ;
			finder.selectActionData = inputId ;
			finder.popup();
		}
		
    </script>
    
    <!--Bootstrap Date Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-datepicker.js"></script>

    <!--Bootstrap Time Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-timepicker.js"></script>

    <!--Bootstrap Date Range Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>
    
    <script src="<?= $conf['template_admin']; ?>/assets/js/bootbox/bootbox.js"></script>
    <script src="javascript/jquery.formatCurrency-1.4.0.js"></script>
    
	<?php if (!empty($_SESSION["message"])) { unset($_SESSION["message"]); } ?>    