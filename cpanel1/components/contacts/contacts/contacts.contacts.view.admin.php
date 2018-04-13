<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet"/>


<div class="page-content">
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
                    <h4 class="heading glyphicons chat"><i></i>Liên hệ từ khách hàng</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Đánh dấu đã đọc</a> <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Đánh dấu chưa đọc</a> <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa</a> </div>
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
                    <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                    <!-- // Modal footer END --> 
                    
                </div>
                <!-- // Modal END -->
                <div class="widget-body">
                    <div class="separator bottom form-inline small">
                        <div class="filter-bar" style="margin-bottom: 0px;">
                        <form>
                            <div class="lbl glyphicons cogwheel"><i></i>Lọc danh sách khách hàng</div>
                            <div>
                                <label>Từ:</label>
                                <div class="input-append">
                                    <input type="text" name="from" id="dateRangeFrom" class="input-mini" value="08/05/13" style="width: 53px;">
                                    <span class="add-on glyphicons calendar"><i></i></span> </div>
                            </div>
                            <div>
                                <label>Đến:</label>
                                <div class="input-append">
                                    <input type="text" name="to" id="dateRangeTo" class="input-mini" value="08/18/13" style="width: 53px;">
                                    <span class="add-on glyphicons calendar"><i></i></span> </div>
                            </div>
                            <div style="float:right;position:relative;right: 7px;bottom: 2px;">
                                <input type="text" class="span3" id="searchinput" value="Tên người gửi">
                                <a href="" class="btn btn-default btn-icon glyphicons search"><i></i> Tìm kiếm</a> <a href="contacts/contacts/advancesearch.html" class="btn btn-default btn-icon glyphicons filter"><i></i> Lọc liên hệ</a> </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
                        <thead>
                            <tr>
                                <th style="width: 3%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox"></th>
                                <th style="width: 18%;">Người gửi</th>
                                <th style="width: 22%;">Tiêu đề</th>
                                <th style="width: 1%;" class="center">Drag</th>
                                <th style="width: 23%;">Nội dung</th>
                                <th class="center" style="width: 10%;">Ngày gửi</th>
                                <th class="center">Trạng thái</th>
                                <th class="center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="selectable">
                                <td class="center" style="width: 4px;">1</td>
                                <td class="center uniformjs"><input type="checkbox"></td>
                                <td>tommeoden</td>
                                <td class="important">Chương trình Khuyến mãi mừng phiên bản 4.5</td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td class="center"></td>
                                <td class="center">12/06/2014</td>
                                <td class="center">Chưa đọc</td>
                                <td class="center"><a href="contacts/contacts/edit.html" class="btn-action glyphicons pencil btn-success"><i></i></a> <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="separator top form-inline small">
                        <div class="pull-left">
                            <div class="checkboxs_actions hide pull-left" style="display: none;">
                                <label class="strong">Danh sách đơn hàng được chọn:</label>
                                <select class="selectpicker dropup" data-style="btn-default btn-small" style="display: none;">
                                    <option>Xoá các đơn hàng được chọn</option>
                                    <option>Ẩn các đơn hàng được chọn</option>
                                    <option>Hiện các đơn hàng được chọn</option>
                                </select>
                            </div>
                        </div>
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
    </div>
    <!-- End Content --> 
</div>
<!-- End Wrapper -->
</div>
</div>
