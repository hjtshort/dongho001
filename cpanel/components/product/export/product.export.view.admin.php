<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
<div class="page-content"> 
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Danh sách sản phẩm</li>
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
                                    <span class="widget-caption">Danh sách sản phẩm</span>
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
                                            <label for="inputTitle">Danh mục<span class="text-danger">*</span></label>
                                            <div>
                                                <select multiple="multiple" size="12" name="catids[]" id="catids" class="form-control">
                                                    <option value="-1" selected="selected"> -- Tất cả danh mục -- </option>
                                                    <option value="1140134"> Điều hòa</option>
                                                    <option value="1140135"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Panasonic</option>
                                                    <option value="1140136"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa Fujitsu</option>
                                                    <option value="1140137"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điều hòa LG</option>
                                                    <option value="1140138"> Tủ lạnh</option>
                                                    <option value="1140139"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh Samsung</option>
                                                    <option value="1140140"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ Lạnh LG</option>
                                                    <option value="1140141"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tủ lạnh Sanyo</option>
                                                    <option value="1140142"> Máy giặt</option>
                                                    <option value="1140143"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt LG</option>
                                                    <option value="1140144"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt SamSung</option>
                                                    <option value="1140145"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Máy giặt ELECTROLUX</option>
                                                </select>                 
                                            </div>
                                    </div>

                                    <div class="form-group">

                                        <label for="inputTitle">Định dạng tệp tin<span class="text-danger">*</span> </label>
                                        <div>
                                            <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False">          
                                           <label style="margin-top:-5px;margin-left:2px;">Xuất định dạng CSV </label>                                       
                                        </div>
                                        <div>
                                             <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False">          
                                           <label style="margin-top:-5px;margin-left:2px;">Xuất định dạng XLS</label>
                                        </div>
                                        <div>
                                             <input type="radio" id="rdoInputByAdmin_False" name="choose" class="checkbox" value="rdoInputByAdmin_False">          
                                            <label style="margin-top:-5px;margin-left:2px;">Xuất định dạng XML</label>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="colored-warning">
                                                <span class="text">Lưu trên server</span>
                                            </label>
                                        </div>
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