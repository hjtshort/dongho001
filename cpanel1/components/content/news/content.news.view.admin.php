<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	$news_process = new news_process();	
	
	/* xu ly link cho tim kiem va phan trang */
	$self_link = $_GET["params"] . ".html?";	
	
	/* xu ly gia tri dau vao cho chuc nang tim kiem */	
	@$search_value = explode("|", @$_GET["search"]);
	
	/* nhung file xu ly phan trang */
	include_once('../include/paging.php');
	/* lay tong so mau tin trong bang */
	$tongsodong = $news_process->get_news_count( @$search_value );
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
                <li><a href="index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
            </ul>
            <div class="separator bottom"></div>
            <div class="innerLR">
                <div class="widget widget-2">
                    <div class="widget-head">
                    
                        <h4 class="heading glyphicons list"><i></i>Danh sách tin tức</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                <a title="Khóa tài khoản" class="btn btn-primary btn-icon glyphicons lock btn_submit" data-action="lock-all"><i></i> Ẩn</a>
                                <a title="Khóa tài khoản" class="btn btn-primary btn-icon glyphicons unlock btn_submit" data-action="unlock-all"><i></i> Hiện</a>
                                <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="sort"><i></i> Cập nhật</a>
                                <a title="Thêm mới tài khoản" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="content/news/add.html"><i></i>Thêm mới</a>
                                <a title="Xóa tài khoản" class="btn btn-primary btn-icon glyphicons delete btn_submit" data-action="delete-all"><i></i> Xóa</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--scrollbar hiddent-->
    
                    <div id="hiddenToolBarScroll" class="scrollBox hidden">
                       <div class="widget widget-2">
                      <div class="widget-head">
                            
                                <h4 class="heading glyphicons list"><i></i>Danh sách tin tức</h4>
                                
                                <div class="heading-buttons">
                                    <div class="buttons pull-right">
                                        <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>                                    
                                        <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a>
                                        <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div></div>
                    </div>
                    <!-- end croll -->                
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
     
                    <div class="widget-body">
                        <div class="separator bottom form-inline small">    	
                            <div class="filter-bar">                            
                                <div class="lbl glyphicons cogwheel"><i></i>Lọc mẫu tin</div>
                                <div>
                                    <label>Từ:</label>
                                    <div class="input-append">
                                        <input value="<?= @$search_value[0]; ?>" type="text" name="from" id="dateRangeFrom" class="input-mini" style="width: 70px;">
                                        <span class="add-on glyphicons calendar"><i></i></span>
                                    </div>
                                </div>
                                <div>
                                    <label>Đến:</label>
                                    <div class="input-append">
                                        <input value="<?= @$search_value[1]; ?>" type="text" name="to" id="dateRangeTo" class="input-mini" style="width: 70px;">
                                        <span class="add-on glyphicons calendar"><i></i></span>
                                    </div>
                                </div>
                                <div>
                                    <label>Nhập:</label>
                                    <div class="input-append">
                                        <input value="<?= @$search_value[2]; ?>" type="text" name="searchinput" id="searchinput" class="input-mini" style="width: 200px;" placeholder="Tên tiêu đề">
                                    </div>
                                </div>
                                <div>
                                    <label>Chọn:</label>
                                    <div class="input-append">
                                    	<select name="parent_category" id="parent_category" class="input-mini" style="width: 200px;">
                                        	<option value="0">Tất cả danh mục</option>                                            
                                            <?php                 
												$result = $news_process->get_category_view();
												$table_row = $result->fetchAll();			
												
												$category = array();
												$news_process->category($table_row, $category);
												
												foreach($category as $key => $row){
													echo '<option value="', $row["danhmuc_id"], '"', (($row['danhmuc_id'] == @$search_value[3]) ? 'selected="selected"' : ''), '>', $row["level"],  $row["tieude"], '</option>';
												}
											?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <a class="btn btn-default btn-icon glyphicons search btn_submit" data-action="search" data-link="<?= $_GET["params"] . ".html?"; ?>"><i></i> Tìm kiếm</a>
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
                                    <th>Tiêu đề</th>
                                    <th class="center" style="width: 20%;">Danh mục tin</th>
                                    <th class="center" style="width: 10%;">Ngày đăng</th>
                                    <th class="center" style="width: 10%;">Trạng thái</th>
                                    <th style="width: 10%;" class="center">Thứ tự</th>
                                    <th class="center" style="width: 12%;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									/* goi ham truy van du lieu dua tren cac gia tri tim kiem */
									$result = $news_process->get_news_view( @$search_value, intval($pager->offset), intval($pager->limit) ); 
									while($row = $result->fetch()){ @$i++; 
								?>
                                <tr class="selectable">
                                    <td class="center"><?= $i; ?></td>
                                    <td class="center uniformjs">
                                        <input class="chkItem" name="chkItem[]" id="chkItem_<?= $row["Id"]; ?>" type="checkbox" value="<?= $row["Id"]; ?>">
                                    </td>
                                    <td><?= $row["tieude"]; ?></td>
                                    <td><?= $row["danhmuc"]; ?></td>
                                    <td class="center"><?= date("d/m/Y", $row["ngaythem"]); ?></td>
                                    <td class="center">
                                        <?php if( $row["hienthi"] ){ echo "<strong>Hiện</strong>"; } else { echo "Ẩn"; } ?>
                                    </td>  
                                    <td class="center">
                                        <input name="newsId[]" id="newsId<?= $row["Id"]; ?>" type="hidden" value="<?= $row["Id"]; ?>">
                                        <input type="text" style="width: 50px; margin-bottom:0px;text-align:center;" value="<?= $row["thutu"]; ?>" name="sort[]">
                                    </td>                              
                                    <td class="center">
                                    	<a title="sao chép tin tức" data-action="copy" data-id="<?= $row["Id"]; ?>" data-link="content/news/copy/<?= $row["Id"]; ?>.html" class="btn-action glyphicons circle_plus btn-info"><i></i></a>
                                        <?php if($func->_checkIdinArray( $chucnang_id_sua, $chucnang_list) ){ ?>
                                        <a title="Sữa tin tức" data-action="edit" data-id="<?= $row["Id"]; ?>" data-link="content/news/edit/<?= $row["Id"]; ?>.html" class="btn-action glyphicons pencil btn-success btn_submit"><i></i></a>
                                        <?php } ?>
                                        <?php if($func->_checkIdinArray( $chucnang_id_xoa, $chucnang_list) ){ ?>
                                        <a title="Xoá tin tức" data-action="delete" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a>
                                        <?php } ?>                                    
                                        <?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){
                                        if( $row["hienthi"]) { ?>
                                            <a title="Hiện" data-action="lock" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons unlock btn-danger btn_submit"><i></i></a>
                                        <?php } else { ?>
                                            <a title="Ẩn" data-action="unlock" data-id="<?= $row["Id"]; ?>" class="btn-action glyphicons lock btn-danger btn_submit"><i></i></a>
                                        <?php }
                                        } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                             </tbody>
                        </table>
                        <div class="separator top form-inline small">
                            <div class="pull-left">
                                <div class="checkboxs_actions hide pull-left">
                                    <label class="strong">Các mẫu tin được chọn:</label>
                                    <select class="selectpicker dropup" data-style="btn-default btn-small">
                                        <option>Xoá các mẫu tin được chọn</option>
                                        <option>Ẩn các mẫu tin được chọn</option>
                                        <option>Hiện các mẫu tin được chọn</option>
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
                        bootbox.alert("Vui lòng check chọn bản tin cần khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "unlock-all"){
                
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn bản tin cần mở khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete-all"){
                    
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn bản tin cần xoá !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete"){
                    
                    $('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
                    $('.checkboxs tbody tr.selectable').removeClass('selected');			
                    
                    $('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
                    
                    bootbox.confirm("Bạn có chắc chắn xoá các bản tin được chọn hay không !", function(result)
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
                    var parent_category	= $("#parent_category").val();
                    location.href = self.data("link") + "search=" + dateRangeFrom + "|" + dateRangeTo + "|" + searchinput + "|" + parent_category ;				
                } else if(self.data("action") == "un-filter") {				
                    location.href = self.data("link");
                } else if(self.data("action") == "sort") {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }				
            });
            
        });
        
    </script>
    <input type="hidden" name="hidden" value="news.view" />
    <input type="hidden" name="act" id="act" />
</form>