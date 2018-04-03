<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="heading-buttons">
            <h3 class="glyphicons globe"><i></i> Thiết lập SEO cho Site</h3>
            <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> </div>
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
            <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
            <!-- // Modal footer END --> 
            
        </div>
        <div class="widget widget-2 widget-tabs">
            <div class="widget-head">
                <ul>
                    <li class="active"><a href="#SEOWebTab" data-toggle="tab" class="glyphicons globe"><i></i>Thiết lập SEO cho website</a></li>
                    <li><a href="#SEOPageTab" data-toggle="tab" class="glyphicons file"><i></i>Thiết lập SEO cho trang</a></li>
                    <li><a href="#ProductListTab" data-toggle="tab" class="glyphicons list"><i></i>Danh mục sản phẩm</a></li>
                    <li><a href="#InfoListTab" data-toggle="tab" class="glyphicons justify"><i></i>Danh mục tin tức</a></li>
                </ul>
            </div>
            <div class="widget-body" style="padding: 10px;">
                <div class="tab-content"><br>
                    <!-- Thiết lập SEO cho website -->
                    <div class="tab-pane active" id="SEOWebTab"> 
                        <!--------------------------------------->
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Tên site &nbsp;</p>
                            </div>
                            <div class="span9">
                                <label class="important"><strong>TÊN WEBSITE</strong></label>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3"> <br>
                                <p class="muted">Tiêu đề &nbsp;</p>
                            </div>
                            <div class="span9"><br>
                                <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung tiêu đề website. Ví dụ một website chuyên bán mỹ phẩm có thể nhập tiêu đề như sau: Mỹ phẩm | Mỹ phẩm giá gốc | Mỹ phẩm nhau cừu
Giới hạn: Nhỏ hơn 70 ký tự"></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Mô tả</p>
                            </div>
                            <div class="span9">
                                <input type="text" id="inputTitle" class="span6" value="" placeholder="">
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung miêu tả về website và sản phẩm vào, ví dụ như website bán mỹ phẩm có thể nhập mô tả như sau: mỹ phẩm giá gốc, Mỹ phẩm giá gốc giúp chị em chăm sóc da, Làm Sạch, Dưỡng da cơ bản, trị nám, Trị mụn, Trắng da…
Giới hạn: Nhỏ hơn 155 ký tự"></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Từ khóa</p>
                            </div>
                            <div class="span9">
                                <textarea name="message" class="span6" rows="5"></textarea>
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung các từ khóa bạn muốn SEO trên google vào. Giới hạn: Tốt nhất dưới 5 từ khóa, cách nhau bởi dấu phẩy"></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Tiêu đề trang</p>
                            </div>
                            <div class="span9">
                                <select class="span3">
                                    <option selected="selected" value="False">Không thêm tiêu đề của website</option>
                                    <option value="True">Thêm tiêu đề của website</option>
                                </select>
                                &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Cho phép bạn có thể cấu hình có thêm title của website vào trong title của trang hay không.
Không thêm tiêu đề của webiste
VD: Tiêu đề trang
Thêm tiêu đề của webiste
VD: Tiêu đề trang - Tiêu đề webiste"></span>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <!------------------------------------------> 
                    </div>
                    
                    <!-- Thiết lập SEO cho page -->
                    <div class="tab-pane"  id="SEOPageTab">
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th style="width: 4%;" class="uniformjs"></th>
                                    <th style="width: 21%;">Tên trang</th>
                                    <th style="width: 20%;">Tiêu đề trang</th>
                                    <th style="width: 7%;" class="center">Kéo thả</th>
                                    <th style="width: 18%;">Mô tả</th>
                                    <th style="width: 30%;">Từ khóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">1</td>
                                    <td class="center uniformjs"><input type="checkbox" /></td>
                                    <td class="important">Trang chủ</td>
                                    <td>-</td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td>Trang chủ</td>
                                    <td>-</td>
                                </tr>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">2</td>
                                    <td class="center uniformjs"><input type="checkbox" /></td>
                                    <td class="important">Giới thiệu</td>
                                    <td>-</td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td>Giới thiệu về Công ty</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    
                    <!-- Danh mục sản phẩm -->
                    <div class="tab-pane" id="ProductListTab">
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th style="width: 19%;">Danh mục</th>
                                    <th style="width: 25%;">Tiêu đề</th>
                                    <th style="width: 7%;" class="center">Kéo thả</th>
                                    <th>Mô tả</th>
                                    <th style="width: 24%;">Từ khóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">1</td>
                                    <td class="important">Điều hòa</td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">2</td>
                                    <td class="important"><a href="/admin.aspx?module=seo&amp;action=pcate-edit&amp;id=1140135"> |---------------  Điều hòa Panasonic </a></td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">3</td>
                                    <td class="important"><a href="/admin.aspx?module=seo&amp;action=pcate-edit&amp;id=1140136"> |---------------  Điều hòa Fujitsu </a></td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">4</td>
                                    <td class="important">Tủ lạnh</td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">5</td>
                                    <td class="important"><a href="/admin.aspx?module=seo&amp;action=pcate-edit&amp;id=1140139"> |---------------  Tủ Lạnh Samsung </a></td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Danh mục tin tức -->
                    <div class="tab-pane" id="InfoListTab">
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th style="width: 19%;">Nhóm tin</th>
                                    <th style="width: 25%;">Tiêu đề</th>
                                    <th style="width: 7%;" class="center">Kéo thả</th>
                                    <th>Mô tả</th>
                                    <th style="width: 24%;">Từ khóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="selectable">
                                    <td class="center" style="width: 28px;">1</td>
                                    <td class="important">Tin thị điện máy</td>
                                    <td></td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content --> 
    
</div>
