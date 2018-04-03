<?php defined( '_VALID_MOS' ) or die( include("404.php") );

	$myprocess = new process();		
	
	/* nhung file xu ly phan trang */
	include_once('../include/paging.php');
	/* lay tong so mau tin trong bang */
	$tongsodong = $myprocess->get_user_list_count( ); 
	/* so mau tin mac dinh tren trang */
	
	/* xu ly link cho tim kiem va phan trang */
	$self_link = $_GET["params"] . ".html?";
	if(isset($_GET["search"])) { $self_link .= "search=" . $_GET["search"] . "&"; }
	if(isset($_GET["record"])) { $self_link .= "record=" . $_GET["record"] . "&"; }
	
	/* xu ly gia tri dau vao cho chuc nang tim kiem */	
	@$search_value = explode("|", @$_GET["search"]);
	$condition = ""; $uid = "%%"; $email = "%%";
	
	if(!empty($search_value[0]) && !empty($search_value[1])){
		$condition .= " AND taikhoanquantri.ngaythem >= " . $func->_formatdate($search_value[0]) . " AND taikhoanquantri.ngaythem <= ". $func->_formatdate($search_value[1]);
	} if(!empty($search_value[2]) && $search_value[3] == "uid"){
		$uid = "%" . $search_value[2] . "%";
	} if(!empty($search_value[2]) && $search_value[3] == "email"){
		$email = "%" . $search_value[2] . "%";
	} 
	
	/* phan trang */
	if(!isset($_GET["page"])) $tranghientai = 1; else $tranghientai = intval($_GET["page"]);
	if(!isset($_GET["record"])) $somautin = 10; else $somautin = intval($_GET["record"]);
	@$pager = Pager::getPagerData( $tongsodong, $somautin, $tranghientai, $self_link );
	
	/* goi ham truy van du lieu dua tren cac gia tri tim kiem */
	$result = $myprocess->get_user_list( $uid, $email, $condition, intval($pager->offset), intval($pager->limit) ); 
	$stt = 1;
	
	$chucnang_id_ql = 2; // Quản lý thông tin người dùng
	$chucnang_id_them = 3; // thêm thông tin người dùng
	$chucnang_id_sua = 4; // sữa thông tin người dùng
	$chucnang_id_xoa = 5; // xoá thông tin người dùng
	$chucnang_list = $_SESSION["wti"]["chucnang"];
	
?>
<form class="form-horizontal" id="validateSubmitForm" name="myForm" method="post">
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
                
                    <h4 class="heading glyphicons user"><i></i> Quản lý tài khoản</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        	<?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){ ?>
                        	<a title="Khóa tài khoản" class="btn btn-primary btn-icon glyphicons lock btn_submit" data-action="lock-all"><i></i> Khóa tài khoản</a>
                            <a title="Khóa tài khoản" class="btn btn-primary btn-icon glyphicons unlock btn_submit" data-action="unlock-all"><i></i> Mở tài khoản</a>
                            <?php } ?>
                            <?php if($func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list) ){ ?>
                            <a title="Xóa tài khoản" class="btn btn-primary btn-icon glyphicons delete btn_submit" data-action="delete-all"><i></i> Xóa</a>
                            <?php } ?>
                            <?php if($func->_checkIdinArray( $chucnang_id_them, $chucnang_list) ){ ?>
                            <a title="Thêm mới tài khoản" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="admin/users/add.html"><i></i>Thêm mới</a>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <div class="widget-body">
                    <div class="separator bottom form-inline small">    	
                        <div class="filter-bar" style="margin-bottom: 0px;">
                                
                            <div class="lbl glyphicons cogwheel"><i></i>Lọc danh sách người dùng</div>
                            <div>
                                <label>Từ:</label>
                                <div class="input-append">
                                    <input type="text" name="from" id="dateRangeFrom" class="input-mini" value="<?= date("d/m/Y");?>" style="width: 65px;">
                                    <span class="add-on glyphicons calendar"><i></i></span>
                                </div>
                            </div>
                            <div>
                                <label>Đến:</label>
                                <div class="input-append">
                                    <input type="text" name="to" id="dateRangeTo" class="input-mini" value="<?= date("d/m/Y");?>" style="width: 65px;">
                                    <span class="add-on glyphicons calendar"><i></i></span>
                                </div>
                            </div>
                            <div style="float:right;position:relative;right: 7px;bottom: 2px;">
                                <input type="text" class="span3" id="searchinput" placeholder="<?= @$search_value[2]; ?>">
                                
                                <select name="type" id="type" style="width: 200px;" class="input-mini">
                                	<?php
										$type_option = array(
											array("uid", "Theo tên đăng nhập"),
											array("email", "Theo địa chỉ email")
										);
										for($i=0; $i < count($type_option); $i++){ ?>
											<option <?php if( $type_option[$i][0] == @$search_value[3] ) { echo "selected"; } ?> value="<?= $type_option[$i][0]; ?>"><?= $type_option[$i][1]; ?></option>
									<?php } ?>
                                </select>
                                <a class="btn btn-default btn-icon glyphicons search btn_submit" data-action="search" data-link="<?= $_GET["params"] . ".html?"; ?>"><i></i> Tìm kiếm</a>
                                <a class="btn btn-default btn-icon glyphicons filter btn_submit" data-action="un-filter" data-link="<?= $_GET["params"] . ".html"; ?>"><i></i> Bỏ lọc</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                        <table class="js-table-sortable table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 3%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
                                <th style="width: 18%;">Username</th>
                                <th style="width: 22%;">Họ tên</th>
                                <th style="width: 1%;" class="center">Drag</th>
                                <th style="width: 23%;" class="center">Email</th>
                                <th class="center" style="width: 10%;">Điện thoại</th>
                                <th class="center" style="width: 10%;">Trạng thái</th>
                                <?php						
									if($func->_checkIdinArray( @$chucnang_id, @$chucnang_list) ){
								?>
                                <th class="center" style="width: 10%;">Thao tác</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch()){ ?>
                            <tr class="selectable">
                                <td class="center" style="width: 4px;"><?= $stt; ?></td>
                                <td class="center uniformjs">
                                	<input class="chkItem" name="chkItem[]" id="chkItem_<?= $row["Id"]; ?>" type="checkbox" value="<?= $row["Id"]; ?>">
                                    <input class="ordItem" name="ordItem" id="ordItem_<?= $row["thutu"]; ?>" type="hidden" value="<?= $row["thutu"]; ?>">
                                </td>
                                <td><?= $row["uid"]; ?></td>
                                <td class="important"><?= $row["ho"] . " " . $row["ten"]; ?></td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>   
                                <td class="center"><?= $row["email"]; ?></td>
                                <td class="center"><?= $row["dienthoai"]; ?></td>
                                <td class="center">
                                    <?php if( $row["trangthai"]) { ?> Hoạt động <?php } else { ?> Tạm khoá <?php } ?>
                                </td>                                
                                <td class="center">
                                	<?php if($func->_checkIdinArray( $chucnang_id_sua, $chucnang_list) ){ ?>
                                    <a title="Sữa tài khoản" data-action="edit" data-id="<?= $row["Id"]; ?>" data-link="admin/users/edit/<?= $row["Id"]; ?>.html" class="btn-action glyphicons pencil btn-success btn_submit"><i></i></a>
                                    <?php } ?>
                                    <?php if($func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list) ){ ?>
                                    <a title="Xoá tài khoản" data-action="delete" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a>
                                    <?php } ?>                                    
                                    <?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){
									if( $row["trangthai"]) { ?>
                                        <a title="Hoạt động" data-action="lock" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons unlock btn-danger btn_submit"><i></i></a>
                                    <?php } else { ?>
                                        <a title="Tạm khóa" data-action="unlock" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons lock btn-danger btn_submit"><i></i></a>
                                    <?php }
									} ?>
                                </td>                                
                            </tr>
                            <?php $stt++; } ?>
                         </tbody>
                    </table> 
                    
                    <div class="separator top form-inline small">                    	
                        <div class="pull-left">
                            <div class="checkboxs_actions hide pull-left">
                                <label class="strong">Các sản phẩm được chọn:</label>
                                <select class="selectpicker dropup" data-style="btn-default btn-small">
                                	<?php if($func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list) ){ ?>
                                    <option>Xoá các sản phẩm được chọn</option>
                                    <?php } ?>
                                    <?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){ ?>
                                    <option>Ẩn các sản phẩm được chọn</option>
                                    <option>Hiện các sản phẩm được chọn</option>
                                    <?php } ?>
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
					bootbox.alert("Vui lòng check chọn tài khoản cần khóa !", function(result) {  });
				} else {
					$("#act").val(self.data("action"));
					$("#validateSubmitForm").submit();				
				}
				
			} else if(self.data("action") == "unlock-all"){
			
				if($(".chkItem:checked").length <= 0){
					bootbox.alert("Vui lòng check chọn tài khoản cần mở khóa !", function(result) {  });
				} else {
					$("#act").val(self.data("action"));
					$("#validateSubmitForm").submit();				
				}
				
			} else if(self.data("action") == "delete-all"){
				
				if($(".chkItem:checked").length <= 0){
					bootbox.alert("Vui lòng check chọn tài khoản cần xoá !", function(result) {  });
				} else {
					$("#act").val(self.data("action"));
					$("#validateSubmitForm").submit();				
				}
				
			} else if(self.data("action") == "delete"){
				
				$('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
				$('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
				$('.checkboxs tbody tr.selectable').removeClass('selected');			
				
				$('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
				
				bootbox.confirm("Bạn có chắc chắn xoá các tài khoản được chọn hay không !", function(result)
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
				var dateRangeFrom 	= $("#dateRangeFrom").val();
				var dateRangeTo 	= $("#dateRangeTo").val();
				var searchinput 	= $("#searchinput").val();
				var type 			= $("#type").val();
				location.href = self.data("link") + "search=" + dateRangeFrom + "|" + dateRangeTo + "|" + searchinput + "|" + type ;				
			} else if(self.data("action") == "un-filter") {				
				location.href = self.data("link");
			}					
		});
		
	});
	
</script>
<input type="hidden" name="hidden" value="user.view" />
<input type="hidden" name="act" id="act" />
</form>