<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); 
	$product_process = new product_process();
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
                    
                        <h4 class="heading glyphicons list"><i></i>Thuộc tính sản phẩm</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="setdefault"><i></i> Cập nhật</a>
                                <a title="Thêm mới tài khoản" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="product/properties/add.html"><i></i>Thêm mới</a>
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
                                        <a class="btn btn-primary btn-icon glyphicons edit btn_submit" data-action="setdefault"><i></i> Cập nhật</a>
                                        <a title="Thêm mới tài khoản" class="btn btn-primary btn-icon glyphicons circle_plus btn_submit" data-action="add" data-link="product/properties/add.html"><i></i>Thêm mới</a>
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
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                                    <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                    <th style="width: 30%;">Nhóm thuộc tính</th>
                                    <th style="width: 40%;">Mô tả</th>
                                    <th class="center">Mặc định</th>
                                    <th class="center" style="width: 90px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $result = $product_process->get_product_properties( ); 
                                    while($row = $result->fetch()){ @$i++; 
                                ?>
                                <tr class="selectable">
                                    <td class="center"><?= @$i; ?></td>
                                    <td class="center uniformjs">
                                        <input class="chkItem" name="chkItem[]" id="chkItem_<?= $row["thuoctinh_id"]; ?>" type="checkbox" value="<?= $row["thuoctinh_id"]; ?>">
                                    </td>
                                    <td class="important"><?= $row["tennhom"]; ?></td>
                                    <td class="important"><?= $row["motanhom"]; ?></td>
                                    <td class="center">
                                        <input value="<?= $row["thuoctinh_id"]; ?>" type="radio" id="default" name="setdefault" <?php if( $row["macdinh"] ){ echo "checked"; } ?> />
                                    </td>                                
                                    <td class="center">
                                        <a title="Sữa thuộc tính" data-action="edit" data-id="<?= $row["thuoctinh_id"]; ?>" data-link="product/properties/edit/<?= $row["thuoctinh_id"]; ?>.html" class="btn-action glyphicons pencil btn-success btn_submit"><i></i></a>
                                        <a title="Xoá thuộc tính" data-action="delete" data-id="<?= $row["thuoctinh_id"]; ?>" class="btn-action glyphicons bin btn-danger btn_submit"><i></i></a>
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
	
				if(self.data("action") == "delete"){
					
					$('.checkboxs thead :checkbox').prop('checked', false).parent().removeClass('checked');
					$('.checkboxs tbody :checkbox').prop('checked', false).parent().removeClass('checked');
					$('.checkboxs tbody tr.selectable').removeClass('selected');			
					
					$('#chkItem_' + self.data("id")).prop('checked', true).parent().addClass('checked');
					
					bootbox.confirm("Bạn có chắc chắn xoá các bản ghị được chọn hay không !", function(result)
					{
						if(result){						
							$("#act").val(self.data("action"));
							$("#validateSubmitForm").submit();
						}
					});												
					
				} else if(self.data("action") == "add") {
					location.href = self.data("link");
				} else if(self.data("action") == "edit") {
					location.href = self.data("link");
				} else if(self.data("action") == "setdefault") {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }			
			});
			
		});
		
	</script>

    <input type="hidden" name="hidden" value="properties.view" />
    <input type="hidden" name="act" id="act" />
</form>