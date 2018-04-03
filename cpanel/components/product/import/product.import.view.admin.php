<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
<div class="page-content"> 
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Nhập danh sách sản phẩm</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="content/news/view.html" class="btn btn-sky shiny">Hủy</a>
                <button type="submit" class="btn btn-sky shiny">Lưu</button>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-sm-8 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Nhập danh sách sản phẩm</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand blue"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus blue"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">

                                    <div class="form-group">

                                        <label for="inputTitle">Nhập sản phẩm trùng</label>
                                        <div>
                                        <select id="ddlOrderStatus" class="span5">
                                            <option selected="selected" value="0">Không ghi đề sản phẩm</option>
                                            <option value="1">Ghi đè sản phẩm</option>
                                        </select>                                         
                                        </div>
                                    </div>                                   
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="product_name">Nhập tập tin</label>
                                        </div>
                                        <div class="col-lg-8">
											<label for="product_name">Tải lên một tập tin từ máy (Tối đa 5 MB)</label>
											
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label for="product_name">&nbsp</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="file" name="">   
                                        </div>
                                    </div>
                                    <div class="row-fluid">  
                                        <p class="muted">Bạn có thể download file mẫu xls <a style="color:#0088ef;font-weight:bold;" href="/WebPages/TemplateForImportExportDownload.aspx?type=xls">Tại đây</a> hoặc file mẫu xml <a style="color:#0088ef;font-weight:bold;" href="/WebPages/TemplateForImportExportDownload.aspx?type=xml">Tại đây</a></p> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="news.add"/>
        <input type="hidden" name="act" value="save"/>
    </form>
</div>