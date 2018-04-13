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
                
                    <h4 class="heading glyphicons search"><i></i>Tìm kiếm nâng cao</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                        <a href="contacts/contacts/view.html" class="btn btn-primary btn-icon glyphicons search"><i></i> Tìm kiếm</a>
						<a href="contacts/contacts/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
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
                     <div class="row-fluid">
                       <div class="span2">
                            <p class="muted">Người gửi</p>
                       </div>
                       <div class="span7">
                           <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                           <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">
                            <p class="muted">Nội dung</p>
                        </div>
                        <div class="span7">
                            <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                            <div class="separator"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span2">	
                            <p class="muted">Ngày gửi</p>
                        </div>
                        <div class="span5">
                          		<div style="position:relative; float:left; bottom: 5px;">
                                    
                                    <div class="input-append" style="position:relative;">
                                        <input type="text" name="from" id="dateRangeFrom" class="input-mini hasDatepicker" value="08/05/13" style="width: 53px;">
                                        <span class="add-on glyphicons calendar"><i></i></span>
                                    </div>
                                </div>
                                <div style="position:relative;bottom: 5px;left: 8px;">
                                    <p class="muted" style="position:relative; float:left; top:7px;">đến:</p>
                                    <div class="input-append" style="position:relative;left: 5px;">
                                        <input type="text" name="to" id="dateRangeTo" class="input-mini hasDatepicker" value="08/18/13" style="width: 53px;">
                                        <span class="add-on glyphicons calendar"><i></i></span>
                                    </div>
                                </div></div>
                            <div class="separator"></div>
                        </div> 
                    <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Trạng thá</p>
					</div>
					<div class="span5">
                        <select id="ddlOrderStatus" style="width:160px;">
                            <option selected="selected" value="0"> -- Tất cả -- </option>
                            <option value="1">Chưa đọc</option>
                            <option value="2">Đã đọc</option>
                        </select>
						<div class="separator"></div>
					</div>
				</div>    
				</div>     
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<?php } ?>