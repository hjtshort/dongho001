<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	$category_process = new category_process();
?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="../news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
            </ul>
            <div class="separator bottom"></div>
            <div class="innerLR">
                <div class="widget widget-2">
                    <div class="widget-head">
                    
                        <h4 class="heading glyphicons list"><i></i>Danh mục tin tức</h4>                    
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="sort"><i></i> Cập nhật</a>
                                <a href="content/category/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <!--scrollbar hiddent-->
                    <div id="hiddenToolBarScroll" class="scrollBox hidden">
                        <div class="widget widget-2">
                            <div class="widget-head">
                            
                                <h4 class="heading glyphicons list"><i></i>Danh mục tin tức</h4>
                                
                                <div class="heading-buttons">
                                    <div class="buttons pull-right">
                                        <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                        <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                                        <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Thêm mới</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>
                        </div>
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
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th>Danh mục tin</th>
                                    <th style="width: 30%;">Mô tả</th>
                                    <th style="width: 10%;" class="center">Trạng thái</th>
                                    <th style="width: 10%;" class="center">Thứ tự</th>
                                    <th class="center" style="width: 10%;">Thao tác</th>
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
                                    <td><?= $row["level"] , $row["tieude"]; ?></td>
                                    <td><?= $row["tomtat"]; ?></td>
                                    <td class="center"><?php if( $row["hienthi"] ){ echo "<strong>Hiện</strong>"; } else { echo "Ẩn"; } ?></td>
                                    <td class="center">
                                    	<input name="chkItem[]" id="chkItem_<?= $row["danhmuc_id"]; ?>" type="hidden" value="<?= $row["danhmuc_id"]; ?>">
                                    	<input type="text" style="width: 50px; margin-bottom:0px;text-align:center;" value="<?= $row["thutu"]; ?>" name="sort[]">
                                    </td>
                                    <td class="center">
                                        <a href="./content/category/edit/<?= $row["danhmuc_id"]; ?>.html" class="btn-action glyphicons pencil btn-success"><i></i></a>
                                        <a href="#" class="btn-action glyphicons bin btn-danger"><i></i></a>
                                    </td>
                                </tr> 
                                <?php } ?>                         																
                            </tbody>
                        </table>                    
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
	
				if(self.data("action") == "add") {
					location.href = self.data("link");
				} else if(self.data("action") == "edit") {
					location.href = self.data("link");
				} else if(self.data("action") == "sort") {
					$("#act").val(self.data("action"));
					$("#validateSubmitForm").submit();
				}				
			});
			
		});
		
	</script>

    <input type="hidden" name="hidden" value="category.view" />
    <input type="hidden" name="act" id="act" />
</form>