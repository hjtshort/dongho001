<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
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
                
                    <h4 class="heading glyphicons list"><i></i>Nhập danh sách sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                        <a href="" class="btn btn-primary btn-icon glyphicons share"><i></i> Huỷ</a>
                        <a href="" class="btn btn-primary btn-icon glyphicons new_window"><i></i> Tiếp tục</a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>                
                <div class="widget-body">
                    <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Nhập sản phẩm trùng</p>
					</div>
					<div class="span5">
                        <select id="ddlOrderStatus" class="span5">
                            <option selected="selected" value="0">Không ghi đề sản phẩm</option>
                            <option value="1">Ghi đè sản phẩm</option>
                        </select>
                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Ghi đè sản phẩm sẽ tự động ghi đè sản phẩm nếu gặp sản phẩm trùng lặp trong cơ sở dữ liệu."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Nhập tập tin</p>
					</div>
					<div class="span9">
                    	<p class="muted">Tải lên một tập tin từ máy (Tối đa 5 MB) </p>
						<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
						  	<div class="input-append">
						    	<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name=""></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
						  	</div>
						<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="File upload lên phải có định dạng là .xml hoặc .xls và có kích thước từ 5 MB trở xuống."></span>
                        </div>
                        
						<div class="separator"></div>
					</div>
				</div> 
                <div class="row-fluid">  
             <p class="muted">Bạn có thể download file mẫu xls <a style="color:#0088ef;font-weight:bold;" href="/WebPages/TemplateForImportExportDownload.aspx?type=xls">Tại đây</a> hoặc file mẫu xml <a style="color:#0088ef;font-weight:bold;" href="/WebPages/TemplateForImportExportDownload.aspx?type=xml">Tại đây</a></p> 
                </div>   
				</div>     
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>