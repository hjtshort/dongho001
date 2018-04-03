<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );
	$product_process = new product_process();	
	
	/* xu ly link cho tim kiem va phan trang */
	$self_link = $_GET["params"] . ".html?";	
	
	/* xu ly gia tri dau vao cho chuc nang tim kiem */	
	@$search_value = explode("|", @$_GET["search"]);
	
	/* nhung file xu ly phan trang */
	include_once('../include/paging.php');
	/* lay tong so mau tin trong bang */
	$tongsodong = $product_process->get_product_count( @$search_value );
	/* so mau tin mac dinh tren trang */		
	
	/* phan trang */
	if(!isset($_GET["page"])) $tranghientai = 1; else $tranghientai = intval($_GET["page"]);
	if(!isset($_GET["record"])) $somautin = 10; else $somautin = intval($_GET["record"]);
	@$pager = Pager::getPagerData( $tongsodong, $somautin, $tranghientai, $self_link );		
	
	$chucnang_id_ql = 2; // Quản lý thông tin người dùng
	$chucnang_id_them = 3; // thêm thông tin người dùng
	$chucnang_id_sua = 4; // sữa thông tin người dùng
	$chucnang_id_xoa = 5; // xoá thông tin người dùng
	$chucnang_list = $_SESSION["wti"]["chucnang"];
?>
	<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
        	<div class="buttons-task col-xs-12 col-md-4">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li>
                        <i class="fa fa-table"></i>
                        <li class="toast-title">Quản lý sản phẩm</li>
                    </li>                
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
                <a href="product/product/add.html" class="btn btn-sky shiny">Thêm sản phẩm</a>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="widget">
                        <div class="widget-header with-footer">
                            <span class="widget-caption">Danh sách sản phẩm</span>
                            <div class="widget-buttons">
                                <a href="#" data-toggle="maximize">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="#" data-toggle="collapse">
                                    <i class="fa fa-minus"></i>
                                </a>
                                <a href="#" data-toggle="dispose">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">                           
                            <div class="flip-scroll">
                                <form id="validateSubmitForm" name="myForm" method="post">
                                    <div id="simpledatatable_wrapper"> 
                                    	<div class="row">
                                            <div class="col-xs-12 col-md-6 text-align-right">
                                                <div id="simpledatatable_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="search" class="form-control input-sm" placeholder="" aria-controls="simpledatatable">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-6 text-align-right">
                                                <div class="btn-group">
                                                    <a class="btn btn-default" href="javascript:void(0);">Chọn thao tác</a>
                                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right">
                                                        <li>
                                                            <a href="javascript:void(0);">Xóa những sản phẩm đã chọn</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Ẩn sản phẩm khỏi kênh bán hàng</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Thay đổi nhóm cho sản phẩm</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Thay đổi loại cho sản phẩm</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Cập nhật thứ tự</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <table class="table table-hover table-bordered table-striped table-condensed flip-content">
                                            <thead class="flip-content bordered-palegreen">
                                                <tr>
                                                    <th>#</th>
                                                    <th>
                                                        <label>
                                                            <input type="checkbox">
                                                            <span class="text"></span>
                                                        </label>
                                                    </th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Kho hàng</th>
                                                    <th>Danh mục sản phẩm</th>
                                                    <th>Nhà sản xuất</th>                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 							
                                                    /* goi ham truy van du lieu dua tren cac gia tri tim kiem */
                                                    $result = $product_process->get_product_view( @$search_value, intval($pager->offset), intval($pager->limit) ); 								
                                                    if($result->rowCount() > 0){
                                                    while($data = $result->fetch()){ @$i++; 
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td>
                                                        <label>
                                                            <input name="chkItem[]" id="chkItem_<?= $data["Id"]; ?>" type="checkbox" value="<?= $data["Id"]; ?>">
                                                            <span class="text"></span>
                                                        </label>
                                                    </td>                                            
                                                    <td>
                                                        <?php $hinhanh = json_decode($data["hinhanh"]); ?>
                                                        <img style="height:40px;border:1px solid #ddd" src="../uploads/<?= $hinhanh[0]; ?>" onerror="this.src='resource/images/no_image.jpg'">
                                                    </td>                                                                                         
                                                    <td>
                                                        <a href="product/product/edit/<?= $data["sanpham_id"]; ?>.html"><?= $data["tensanpham"]; ?></a>
                                                    </td> 
                                                    <td>10 sản phẩm của 1 loại</td>
                                                    <td><?= $data["tieude"]; ?></td>
                                                    <td><?= $data["nhasanxuat"]; ?></td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    
                                        <div class="row DTTTFooter">
                                            <div class="col-sm-4">
                                                <div class="dataTables_info" id="simpledatatable_info" role="status" aria-live="polite">Hiển thị 1 - 5 của 25 sản phẩm</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div id="simpledatatable_paginate">
                                                    <ul class="pagination">
                                                        <li class="prev disabled"><a href="#">Prev</a></li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">4</a></li>
                                                        <li><a href="#">5</a></li>
                                                        <li class="next"><a href="#">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="text-align-right" id="simpledatatable_length">
                                                    <select name="simpledatatable_length" aria-controls="simpledatatable" class="form-control input-sm">
                                                        <option value="10">10 bản ghi/ trang</option>
                                                        <option value="25">25 bản ghi/ trang</option>
                                                        <option value="50">50 bản ghi/ trang</option>
                                                        <option value="100">100 bản ghi/ trang</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                                                       
                                        
                                    </div>
                                    
                                    <input type="hidden" name="hidden" value="product.view" />
                                    <input type="hidden" name="act" id="act" />
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- /Page Body -->
    </div>
    
    <script language="javascript">			
		
        $(function () {
            
            $('.btn_submit').click(function(e) {
                
                var self = $(this);			
    
                if(self.data("action") == "lock-all"){
                
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "unlock-all"){
                
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần mở khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete-all"){
                    
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần xoá !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete"){
                    
                    $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody tr.selectable').removeClass('selected');			
                    
                    $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
                    
                    bootbox.confirm("Bạn có chắc chắn xoá các sản phẩm được chọn hay không !", function(result)
                    {
                        if(result){						
                            $("#act").val(self.data("action"));
                            $("#validateSubmitForm").submit();
                        }
                    });
                                
                } else if(self.data("action") == "lock") {
                    
                    $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody tr.selectable').removeClass('selected');			
                    
                    $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
                    
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                    
                } else if(self.data("action") == "unlock") {
                    
                    $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody tr.selectable').removeClass('selected');
                    
                    $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
                    
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                    
                } else if(self.data("action") == "add") {
                    location.href = self.data("link");
                } else if(self.data("action") == "edit") {
                    location.href = self.data("link");
                } else if(self.data("action") == "search") {				
                    var priceRangeFrom 	= $("#priceRangeFrom").val();
                    var priceRangeTo 	= $("#priceRangeTo").val();
                    var searchinput 	= $("#searchinput").val();
                    var parent_category	= $("#parent_category").val();
                    location.href = self.data("link") + "search=" + priceRangeFrom + "|" + priceRangeTo + "|" + searchinput + "|" + parent_category ;				
                } else if(self.data("action") == "un-filter") {				
                    location.href = self.data("link");
                } else if(self.data("action") == "sort") {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }				
            });
			
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