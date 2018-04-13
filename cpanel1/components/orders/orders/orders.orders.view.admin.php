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
                    <h4 class="heading glyphicons list"><i></i>Danh sách đơn hàng</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa</a> </div>
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
                        <div class="filter-bar filter-bar-2" style="margin-bottom: 0px;">
                            <form>
                                <div class="lbl glyphicons search"><i></i>Lọc đơn hàng</div>
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
                                <div>
                                    <label>Giá từ:</label>
                                    <div class="input-append">
                                        <input type="text" name="from" class="input-mini" style="width: 90px;" value="100">
                                        <span class="add-on"><strong>VNĐ</strong></span> </div>
                                </div>
                                <div>
                                    <label>Giá đến:</label>
                                    <div class="input-append">
                                        <input type="text" name="from" class="input-mini" style="width: 90px;" value="500">
                                        <span class="add-on"><strong>VNĐ</strong></span> </div>
                                </div>
                                <div>
                                    <label>Trạng thái:</label>
                                    <div class="input-append">
                                        <select name="from" style="width: 200px;" class="input-mini">
                                            <option selected="selected" value="-1">-- Danh mục trạng thái --</option>
                                            <option value="1053569">Chờ xử lý</option>
                                            <option value="1053570">Chờ thanh toán</option>
                                            <option value="1053571">Chờ hoàn thành</option>
                                            <option value="1053572">Chờ xuất hàng</option>
                                            <option value="1053573">Chờ nhận hàng</option>
                                            <option value="1053574">Chuyển một phần</option>
                                            <option value="1053575">Hoàn thành</option>
                                            <option value="1053576">Đã chuyển hết</option>
                                            <option value="1053577">Hủy đơn hàng</option>
                                            <option value="1053578">Từ chối đơn hàng</option>
                                            <option value="1053579">Hoàn trả đơn hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <script type="text/javascript">
jQuery(function () {
    var json;
    json = { "bindings": [ {"id":"1", "name":"Chờ xử lý"}, {"id":"2", "name":"Chờ thanh toán"}, {"id":"3", "name":"Chờ hoàn thành"}, {"id":"4", "name":"Chờ xuất hàng"}, {"id":"5", "name":"Chờ nhận hàng"}, {"id":"6", "name":"Chuyển một phần"}, {"id":"7", "name":"Hoàn thành"}, {"id":"9", "name":"Đã chuyển hết"}, {"id":"10", "name":"Hủy đơn hàng"}, {"id":"11", "name":"Từ chối đơn hàng"}, {"id":"12", "name":"Hoàn trả đơn hàng"}, {"id":"13", "name":"Đã tiếp nhận"}, {"id":"14", "name":"Đề nghị hủy"} ] };
    jQuery(".OrderStatus").each(function (i, dropdown) {
        var currentstatus = Number(jQuery(this).attr("orderstatus")); // status hiện tại của đơn hàng
        jQuery(json.bindings).each(function (i, obj) {
            jQuery(dropdown).append("<option value=\"" + obj.id + "\">" + obj.name + "</option>");
        });
        jQuery(this).val(currentstatus);
        jQuery(this).change(function () {
            var orderid = Number(jQuery(this).attr("orderid"));
            var orderstatus = Number(jQuery(this).val()); // status mới
            if (orderstatus != currentstatus) {
                jQuery.ajax({
                    type: "POST",
                    url: "/orders/orders/view.html",
                    data: "{'orderId':'" + orderid + "','orderStatus':'" + orderstatus + "'}",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (response) { alert("Cập nhật trạng thái đơn hàng thành công!"); },
                    failure: function (msg) { console.log(msg); },
                });
            }
        });
    });
});
</script>
                    <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
                        <thead>
                            <tr>
                                <th style="width: 1%;" class="center">#</th>
                                <th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
                                <th style="width: 3%;"></th>
                                <th>Khách hàng</th>
                                <th style="width: 1%;" class="center">Drag</th>
                                <th class="center" style="width: 14%;">Thời gian đặt hàng</th>
                                <th class="center" style="width: 14%;">Trạng thái</th>
                                <th class="center">Tin nhắn</th>
                                <th class="center" style="width: 9%;">Tổng</th>
                                <th class="center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="selectable">
                                <td class="center">#108080</td>
                                <td class="center uniformjs"><input type="checkbox" /></td>
                                <td></td>
                                <td class="important">Chương trình Khuyến mãi mừng phiên bản 4.5</td>
                                <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td class="center">17:11:29, 12/06/2014</td>
                                <td class="center"><select id="orderstatus108080" class="TextInput OrderStatus" 
                    								style="width: 140px;top: 4px;position:relative;" orderid="108080" orderstatus="5">
                                    </select></td>
                                <td>0 tin nhắn</td>
                                <td>39.570.000 ₫</td>
                                <td class="center"><a href="orders/orders/invoice.html" class="btn-action glyphicons list btn-info"><i></i></a> <a href="product_edit.html?lang=en" class="btn-action glyphicons bin btn-danger"><i></i></a> <a href="#" class="btn-action glyphicons print btn-success"><i></i></a></td>
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
        <!-- End Content --> 
    </div>
    <!-- End Wrapper --> 
</div>
