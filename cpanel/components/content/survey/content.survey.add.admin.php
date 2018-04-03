<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );
if($_SESSION["wti"]["key"] == "Supper Administrator" || $_SESSION["wti"]["key"] == "Administrator"){ 
	//$myprocess = new process();
?>
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
                
                    <h4 class="heading glyphicons list"><i></i>Thêm mới nhóm tùy chọn sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                                <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                                <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                                <a href="content/survey/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
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
<!-- // Modal END -->	 
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span2">
                            <br>
                            <p class="muted">Câu hỏi thăm dò:</p>
                        </div>
                        <div class="span9"><br>
                            <input type="text" id="inputTitle" class="span5" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Tùy chọn:</p>
                        </div>
                        <div class="span9">
                            <input type="text" id="inputTitle" class="span5" value="" placeholder="">
                            <a id="lnkAddNewOption" title="Kích để thêm tùy chọn cho câu hỏi thăm dò" href="content/survey/add.html">Thêm tùy chọn</a>
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                       <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                    <thead>
                        <tr>
                        	<th style="width: 4%;" class="center">#</th>
                            <th>Lựa chọn</th>
                            <th class="center" style="width: 10%;">Thứ tự</th>
                            <th class="center" style="width: 9%;">Votes</th>
                            <th class="center" style="width: 9%;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="selectable">
                        	<td class="center">1</td>
                            <td class="important">Samsung Co</td>
                            <td class="center"><input type="text" value="1" class="span1" style="width: 100px; margin-bottom:0px"></td>
                            <td class="center">1</td>
                            <td class="center">
                                <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a>
                            </td>
                        </tr> 
                     </tbody>
                </table>
                    </div>
            </div>   
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<?php } ?>