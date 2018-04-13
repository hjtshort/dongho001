<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	$category_process = new category_process();
?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Cpanel</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
            </ul>
            <div class="separator bottom"></div>
        
            <div class="heading-buttons">
                <h3 class="glyphicons list"><i></i> Danh mục sản phẩm</h3>
                <div class="buttons pull-right">
                    <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                    <a title="Ẩn danh mục" class="btn btn-primary btn-icon glyphicons lock btn_submit" data-action="lock-all"><i></i> Ẩn</a>
                    <a title="Hiện danh mục" class="btn btn-primary btn-icon glyphicons unlock btn_submit" data-action="unlock-all"><i></i> Hiện</a>
                    <a title="cập nhật danh mục" class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="sort"><i></i> Cập nhật</a>
                    <a title="Thêm mới danh mục" href="product/category/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a>
                    <a title="Xóa danh mục" class="btn btn-primary btn-icon glyphicons delete btn_submit" data-action="delete-all"><i></i> Xóa</a>
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
            <div class="widget widget-2" style="margin: 0;">
                <div class="widget-body">
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 4%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                <th>Danh mục sản phẩm</th>
                                <th style="width: 9%;" class="center">Trạng thái</th>
                                <th style="width: 10%;" class="center">Thứ tự</th>
                                <th class="center" style="width: 120px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                 
                                $result = $category_process->get_category_view();
                                $table_row = $result->fetchAll();			
                                
                                $category = array();
                                $category_process->category($table_row, $category);
                                
                                foreach($category as $key => $row){ @$i++;	
                            ?>
                            <tr class="selectable">
                                <td class="center"><?= @$i; ?></td>
                                <td class="center uniformjs">
                                    <input class="chkItem" name="chkItem[]" id="chkItem_<?= $row["danhmuc_id"]; ?>" type="checkbox" value="<?= $row["danhmuc_id"]; ?>">
                                </td>
                                <td class="important"><?= $row["level"] , $row["tieude"]; ?></td>
                                <td class="center"><?php if( $row["hienthi"] ){ echo "<strong>Hiện</strong>"; } else { echo "Ẩn"; } ?></td>
                                <td class="center">
                                    <input name="catId[]" id="catId_<?= $row["danhmuc_id"]; ?>" type="hidden" value="<?= $row["danhmuc_id"]; ?>">
                                    <input type="text" style="width: 50px; margin-bottom:0px;text-align:center;" value="<?= $row["thutu"]; ?>" name="sort[]">
                                </td>
                                <td class="center">
                                    <a title="sao chép danh mục" data-action="copy" data-id="<?= $row["danhmuc_id"]; ?>" data-link="product/category/copy/<?= $row["danhmuc_id"]; ?>.html" class="btn-action glyphicons circle_plus btn-info"><i></i></a>
                                    <a title="Sữa danh mục" data-action="edit" data-id="<?= $row["danhmuc_id"]; ?>" data-link="product/category/edit/<?= $row["danhmuc_id"]; ?>.html" class="btn-action glyphicons pencil btn-success btn_submit"><i></i></a>
                                    <a title="Xoá danh mục" data-action="delete" data-id="<?= $row["danhmuc_id"]; ?>" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a>
                                    <?php if($func->_checkIdinArray( $chucnang_id_ql, $chucnang_list) ){
									if( $row["hienthi"]) { ?>
										<a title="Hiện" data-action="lock" data-id="<?= $row["danhmuc_id"]; ?>" class="btn-action glyphicons unlock btn-danger btn_submit"><i></i></a>
									<?php } else { ?>
										<a title="Ẩn" data-action="unlock" data-id="<?= $row["danhmuc_id"]; ?>" class="btn-action glyphicons lock btn-danger btn_submit"><i></i></a>
									<?php }
									} ?>
                                </td>
                            </tr>
                            <?php } ?>																		
                      </tbody>
                    </table>
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

    <input type="hidden" name="hidden" value="category.view" />
    <input type="hidden" name="act" id="act" />
</form>