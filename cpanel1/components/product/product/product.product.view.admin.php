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

<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="." class="glyphicons home"><i></i>Cpanel</a></li>
                <li class="divider"></li>
                <li>Quản lý sản phẩm</li>
            </ul>
            <div class="separator bottom"></div>
            <div class="innerLR">
                <div class="widget widget-2">
                    <div class="widget-head">
                    
                        <h4 class="heading glyphicons list"><i></i>Quản lý sản phẩm</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">                                    
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                <a title="Ẩn sản phẩm" class="btn btn-primary btn-icon glyphicons lock btn_submit" data-action="lock-all"><i></i> Ẩn</a>
                                <a title="Hiện sản phẩm" class="btn btn-primary btn-icon glyphicons unlock btn_submit" data-action="unlock-all"><i></i> Hiện</a>
                                <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="sort"><i></i> Cập nhật</a>
                                <a title="Thêm mới sản phẩm" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="product/product/add.html"><i></i>Thêm mới</a>
                                <a title="Xóa sản phẩm" class="btn btn-primary btn-icon glyphicons delete btn_submit" data-action="delete-all"><i></i> Xóa</a>                                    
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div>
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
                    <!-- // Modal END -->	 
                    <div class="widget-body">
                        <div class="separator bottom form-inline small">    	
                            <div class="filter-bar" style="margin-bottom: 0px;">
							
                                <div class="lbl glyphicons cogwheel"><i></i>Lọc sản phẩm</div>                                
                                <div>
                                    <div class="input-append">
                                        <label>Giá từ:</label><input type="text" name="priceRangeFrom" id="priceRangeFrom" class="input-mini moneyformat" style="width: 80px;" value="<?= @$search_value[0]; ?>" />
                                        <span class="add-on"><strong>VNĐ</strong></span>
                                    </div>
                                </div>
                                <div>
                                    <label>Đến:</label>
                                    <div class="input-append">
                                        <input type="text" name="priceRangeTo" id="priceRangeTo" class="input-mini moneyformat" style="width: 80px;" value="<?= @$search_value[1]; ?>" />
                                        <span class="add-on"><strong>VNĐ</strong></span>
                                    </div>
                                </div>
                                <div>
                                    <label>Nhập:</label>
                                    <div class="input-append">
                                        <input type="text" name="searchinput" id="searchinput" class="input-mini" style="width: 200px;" value="<?= @$search_value[2]; ?>" placeholder="Tên sản phẩm" />
                                    </div>
                                </div>
                                <div>
                                    <label>Chọn:</label>
                                    <div class="input-append">                                       
                                    <select name="parent_category" id="parent_category" class="span2">
                                        <option value="0">ROOT</option>        
                                        <?php
                                            $result = $product_process->get_category_view();
                                            $table_row = $result->fetchAll();			
                                            
                                            $category = array();
                                            $product_process->category($table_row, $category);
                                            
                                            foreach($category as $key => $row){
												echo '<option value="', $row["danhmuc_id"], '"', (($row['danhmuc_id'] == @$search_value[3]) ? 'selected="selected"' : ''), '>', $row["level"],  $row["tieude"], '</option>';
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-default btn-icon glyphicons search btn_submit" data-action="search" data-link="<?= $_GET["params"] . ".html?"; ?>"><i></i> Tìm kiếm</a>&nbsp;
                                    <a class="btn btn-default btn-icon glyphicons filter btn_submit" data-action="un-filter" data-link="<?= $_GET["params"] . ".html"; ?>"><i></i> Bỏ lọc</a>      
                                </div>
                                <div class="clearfix"></div>
                            </div>    
                        </div>
                        
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                            	<th style="width: 1%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                <th style="width: 6%;" class="center">Ảnh</th>
                                <th style="width: 8%;" class="center">Mã SP</th>
                                <th>Tên sản phẩm</th>
                                <th style="width: 11%;" class="center">Giá</th>
                                <th style="width: 11%;" class="center">Giá khuyến mãi</th>
                                <th style="width: 10%;" class="center">Trạng thái</th>
                                <th style="width: 8%;" class="center">Thứ tự</th>
                                <th class="center" style="width: 10%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 							
                                /* goi ham truy van du lieu dua tren cac gia tri tim kiem */
                                $result = $product_process->get_product_view( @$search_value, intval($pager->offset), intval($pager->limit) ); 								
								if($result->rowCount() > 0){
                                while($data = $result->fetch()){ @$i++; 
                            ?>
                            <tr class="selectable">
                            	<td class="center"><?= $i; ?></td>
                                <td class="center uniformjs">
                                    <input class="chkItem" name="chkItem[]" id="chkItem_<?= $data["Id"]; ?>" type="checkbox" value="<?= $data["Id"]; ?>">
                                </td>
                                <td class="center">
                                    <span class="img">
                                        <?php $hinhanh = unserialize($data["hinhanh"]); ?>
                                        <img style="height:40px;border:1px solid #ddd" src="<?php echo $hinhanh["hinhanh"]["image_src"][$hinhanh["hinhanh"]["choose"][0]]; ?>" onerror="this.src='resource/images/no_image.jpg'">
                                    </span>
                                </td>
                                <td class="center form-inline small">
                                    <input type="text" style="width: 60px;" value="<?= $data["masanpham"]; ?>" />
                                </td>
                                <td><?= $data["tensanpham"]; ?></td>
                                <td class=" form-inline small">
                                    <input type="text" style="width: 90px;text-align:right;" value="<?= number_format($data["gia"], 0, ",", ","); ?>" class="moneyformat" />
                                </td>
                                <td class="center form-inline small">
                                    <input type="text" style="width: 90px;text-align:right;" value="<?= number_format($data["giakhuyenmai"], 0, ",", ","); ?>" class="moneyformat" />
                                </td>
                                <td class="center form-inline small">
                                    <select name="from" style="width: 120px;">
                                        <?php		
                                            $purchase = array(		
                                                array("allow", "Đang bán"),
                                                array("disallow", "Chỉ hiển thị"),
                                                array("disallowandtext", "Hiển thị chữ thay thế")
                                            );
                                            for($i=0; $i < count($purchase); $i++){ ?>
                                                <option <?php if( $purchase[$i][0] == $somautin ) { echo "selected"; } ?> value="<?= $purchase[$i][0]; ?>"><?= $purchase[$i][1]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </select>
                                </td>
                                <td class="center form-inline small">
                                	<input name="productId[]" id="productId<?= $data["Id"]; ?>" type="hidden" value="<?= $data["Id"]; ?>">
                                    <input type="text" style="width: 70px;text-align:center;" value="<?= $data["thutu"]; ?>" name="sort[]" class="intformat">
                                </td>
                                <td class="center"> 
                                	<a title="Sao chép sản phẩm" data-action="copy" data-id="<?= $row["danhmuc_id"]; ?>" data-link="product/category/copy/<?= $row["danhmuc_id"]; ?>.html" class="btn-action glyphicons circle_plus btn-info"><i></i></a>                                   
                                    <?php if($func->_checkIdinArray( $chucnang_id_sua, $chucnang_list) ){ ?>
                                    <a title="Sữa sản phẩm" data-action="edit" data-id="<?= $data["Id"]; ?>" data-link="product/product/edit/<?= $data["Id"]; ?>.html" class="btn-action glyphicons pencil btn-success btn_submit"><i></i></a>
                                    <?php } ?>
                                    <?php if($func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list) ){ ?>
                                    <a title="Xoá sản phẩm" data-action="delete" data-id="<?= $data["Id"]; ?>" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a>
                                    <?php } ?>                                    
                                    <?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){
                                    if( $data["hienthi"]) { ?>
                                        <a title="Hiện" data-action="lock" data-id="<?= $data["Id"]; ?>" class="btn-action glyphicons unlock btn-danger btn_submit"><i></i></a>
                                    <?php } else { ?>
                                        <a title="Ẩn" data-action="unlock" data-id="<?= $data["Id"]; ?>" class="btn-action glyphicons lock btn-danger btn_submit"><i></i></a>
                                    <?php }
                                    } ?>
                                </td>
                            </tr>
                            <?php }
							} else { ?>
								<tr class="selectable">
                            		<td colspan="10" class="center">Không có sản phẩm nào được tìm thấy</td>
                                </tr>
							<?php } ?>
                      </tbody>
                    </table>
                    <div class="separator top form-inline small">
                        <div class="pull-left">
                            <div class="checkboxs_actions hide pull-left">
                                <label class="strong">Các sản phẩm được chọn:</label>
                                <select class="selectpicker dropup" data-style="btn-default btn-small">
                                    <option>Xoá các sản phẩm được chọn</option>
                                    <option>Ẩn các sản phẩm được chọn</option>
                                    <option>Hiện các sản phẩm được chọn</option>
                                </select>
                            </div>
                        </div>       
                        <div class="pull-right">
                            Tổng số mẫu tin: <?= $pager->somautin ?> / <?= $pager->tongsodong ?>
                            <select onchange="javascript:location.href = '<?= $self_link; ?>record='+this.value;" name="from" style="width: 200px;" class="input-mini">
                                <?php		
                                    $record_option = array(		
                                        array("10", "10 Bản ghi / trang"),
                                        array("20", "20 Bản ghi / trang"),
                                        array("30", "30 Bản ghi / trang"),
                                        array("50", "50 Bản ghi / trang"),
                                        array("100", "100 Bản ghi / trang"),
                                        array("99999999999", "Tất cả Bản ghi / trang")
                                    );
                                    for($i=0; $i < count($record_option); $i++){ ?>
                                        <option <?php if( $record_option[$i][0] == $somautin ) { echo "selected"; } ?> value="<?= $record_option[$i][0]; ?>"><?= $record_option[$i][1]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <center>
                        <div class="pagination pagination-small">
                            <ul>
                                <?= $pager->paging; ?>
                            </ul>
                        </div>  
                        </center>       
                        <div class="clearfix"></div>
                    </div>
                </div>
                    
                </div>
            </div>
            <!-- End Content -->        
        </div>
        <!-- End Wrapper -->
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
    
    <input type="hidden" name="hidden" value="product.view" />
    <input type="hidden" name="act" id="act" />
</form>