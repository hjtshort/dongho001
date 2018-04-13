<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="../category/index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="heading-buttons">
            <h3 class="glyphicons picture"><i></i> Danh sách ảnh trình diển</h3>
            <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-default btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a> <a href="content/gallery/add.html" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a> <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a> </div>
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
                    <li class="active"><a href="#quanlyanhTab" data-toggle="tab" class="glyphicons posterous_spaces"><i></i>Quản lý ảnh</a></li>
                    <li><a href="#xoathumucTab" data-toggle="tab" class="glyphicons folder_flag"><i></i>Thư mục ảnh</a></li>
                </ul>
            </div>
            <div class="widget-body" style="padding: 10px;">
                <div class="tab-content"><br>
                    <!-- Thông tin chung -->
                    <div class="tab-pane active" id="quanlyanhTab">
                        <label class="groupcheckbox">Danh mục Gallery &nbsp;
                            <select name="ctl00$cph_Main$ctl00$ctl00$ddl_ModuleDef" id="cph_Main_ctl00_ctl00_ddl_ModuleDef" >
                                <option selected="selected" value="1">Demo</option>
                            </select>
                        </label>
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th style="width: 4%;" class="uniformjs"><div id="uniform-undefined" style="position: relative;left: 3px;"><span>
                                            <input type="checkbox" style="opacity: 0;">
                                            </span></div></th>
                                    <th>Tiêu đề</th>
                                    <th style="width: 21%;">Liên kết</th>
                                    <th style="width: 7%;" class="center">Kéo thả</th>
                                    <th style="width: 5%;" class="center">Thứ tự</th>
                                    <th style="width: 27%;">Mô tả</th>
                                    <th class="center" style="width: 75px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="selectable selected">
                                    <td class="center" style="width: 28px;">1</td>
                                    <td class="center uniformjs"><input type="checkbox" /></td>
                                    <td class="important" style="width: 275px;">Tiêu đề</td>
                                    <td style="width: 240px;">Liên kết</td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td class="center" style="width: 64px;"><input type="text" style="width: 50px; margin-bottom:0px" value="999"></td>
                                    <td>dien may</td>
                                    <td class="center" style="width: 75px;"><a href="../category/product_edit.html?lang=en" class="btn-action glyphicons pencil btn-success"><i></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <!-- Thông tin chung END --> 
                    
                    <!-- SEO -->
                    <div class="tab-pane" id="xoathumucTab">
                        <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                            <thead>
                                <tr>
                                    <th style="width: 4%;" class="center">#</th>
                                    <th style="width: 4%;" class="uniformjs"><div id="uniform-undefined" style="position: relative;left: 3px;"><span>
                                            <input type="checkbox" style="opacity: 0;">
                                            </span></div></th>
                                    <th style="width: 39%;">Tên Gallery</th>
                                    <th style="width: 7%;" class="center">Kéo thả</th>
                                    <th style="width: 6%;" class="center">Thứ tự</th>
                                    <th>Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="selectable selected">
                                    <td class="center" style="width: 28px;">1</td>
                                    <td class="center uniformjs"><input type="checkbox" /></td>
                                    <td class="important" style="width: 275px;">Demo</td>
                                    <td class="center js-sortable-handle" style="width: 53px;"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                    <td class="center">1</td>
                                    <td>Mô tả</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- SEO END --> 
                    
                </div>
                <div class="separator top form-inline small">
                    <div class="pull-right"> Tổng số mẫu tin: 6 / 500
                        <select name="from" style="width: 200px;" class="input-mini">
                            <option value="10">10 Bản ghi / trang</option>
                            <option selected="selected" value="20">20 Bản ghi / trang</option>
                            <option value="30">30 Bản ghi / trang</option>
                            <option value="50">50 Bản ghi / trang</option>
                            <option value="100">100 Bản ghi / trang</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <center>
                        <div class="pagination pagination-small">
                            <ul>
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">»</a></li>
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
