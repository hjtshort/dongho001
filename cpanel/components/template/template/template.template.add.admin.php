<?php defined('_VALID_MOS') or die(include("404.php"));
$template_process = new template_process();
?>

    <script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
    <script type="text/javascript" src="<?= $conf['rooturl']; ?>//myeditor/ckeditor.js"></script>

    <div class="page-content">
        <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs breadcrumbs-fixed">
                <div class="buttons-task col-xs-12 col-md-6">
                    <ul class="breadcrumb breadcrumbs-fixed">
                        <li><i class="fa fa-table"></i></li>
                        <li><a href="template/template/view.html">Quản lý sản phẩm</a></li>
                        <li class="toast-title">Thêm sản phẩm</li>
                    </ul>
                </div>
                <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                    <a href="template/template/view.html" class="btn btn-sky shiny">Hủy</a>
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
                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Thông tin sản phẩm</div>
                                        <div class="form-group <?php if (!empty($_SESSION["message"]["template_name"])) {
                                            echo "has-error";
                                        } ?>">
                                            <label for="template_name">Tên sản phẩm <span
                                                        class="text-danger">*</span></label> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Nhập tên của sản phẩm (VD:Iphone 6 Plus 64GB)"></i>
                                            <div>
                                                <input placeholder="Nhập tên sản phẩm" type="text" class="form-control"
                                                       name="template_name"
                                                       data-bv-notempty="true"
                                                       data-bv-notempty-message="Tên sản phẩm không được để trống"/>
                                                <?php  if (!empty($_SESSION["message"]["template_name"])) {
                                                    echo $_SESSION["message"]["template_name"];
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="template_author">Tác giả</label>
                                            <div>
                                                <select class="form-control" name="template_author" id="template_author">
                                                    <option value="">-- Chọn tác giả --</option>
                                                    <?php
                                                    $list_author = $template_process->get_list_author();

                                                    foreach ($list_author->fetchAll() as $author):
                                                        $author_name = "{$author['ho']} {$author['ten']} ({$author['email']})";
                                                        ?>
                                                        <option value="<?= $author['Id'] ?>"><?= $author_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="url_demo">Đường Dẫn Demo <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Nhập đường dẫn demo trên superweb.VD:dongho.superweb.vn"></i></label>
                                            <a href="#" target="_blank" id="link_url_demo">Xem thử</a>
                                            <div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">http:// </span>
                                                    <input value="" type="text"
                                                           class="form-control" name="url_demo" id="url_demo"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Nội dung <i class="fa fa-question-circle tooltip-info sky"
                                                               data-toggle="tooltip" data-placement="top"
                                                               data-original-title="Mô tả chi tiết thông tin sản phẩm"></i></label>
                                            <div>
                                                <textarea name="template_detail"></textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace('template_detail', {
                                                        width: '100%',
                                                        height: '300px',
                                                        toolbar: 'MyToolbar'
                                                    });
                                                </script>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Hình ảnh</div>
                                        <!-- styles -->
                                        <link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all"
                                              rel="stylesheet">
                                        <link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css"
                                              media="all" rel="stylesheet">

                                        <!-- js -->
                                        <script src="plugin/fileuploader/js/jquery.fileuploader.min.js"
                                                type="text/javascript"></script>
                                        <script src="plugin/fileuploader/js/custom.js" type="text/javascript"></script>

                                        <input type="file" name="files">
                                        <div style="clear:both"></div>
                                    </div>
                                </div>

                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Đặt giá</div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label for="template_price">Giá bán <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>
                                                <div>
                                                    <div class="input-group">
                                                        <input value="0" type="text" class="form-control moneyformat"
                                                               name="template_price">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="template_price_promo">Giá so sánh <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control moneyformat"
                                                               name="template_price_compare">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <label for="template_price_promo"></label>
                                                <div style="margin-top:10px;">Hoặc</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="template_percent_discount">Giảm %</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                               name="template_percent_discount">
                                                        <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="include_vat">
                                                    <span class="text"> Giá đã bao gồm VAT <i
                                                                class="fa fa-question-circle tooltip-info sky"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Tích vào lựa chọn nếu giá đã bao gồm thuế VAT"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked" name="template_display">
                                                    <span class="text"> (Cho phép ẩn / hiện sản phẩm)</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group no-margin-bottom row">
                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <input name="date_display" readonly value="<?= date("d/m/Y"); ?>"
                                                           class="form-control date-picker" id="id-date-picker-1"
                                                           type="text" data-date-format="dd/mm/yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <input name="time_display" readonly value="<?= date("h:i A"); ?>"
                                                           class="form-control" id="timepicker1" type="text">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-clock-o"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="wide">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="template_name">Cho phép đặt hàng <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>
                                                <select class="form-control" name="IsAllowPurchase" id="IsAllowPurchase"
                                                        onchange="javascript:IsDisplayPurchase();">
                                                    <option selected="selected" value="allow">Cho phép</option>
                                                    <option value="disallow">Không cho phép</option>
                                                    <option value="disallowandtext">Không cho phép, hiển thị chữ thay
                                                        thế giá
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="divCallForPricingLabel" class="form-group row d-none">
                                            <div class="col-lg-12">
                                                <label for="CallForPricingLabel">Chữ hiển thị thay thế: <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="VD: Liên hệ"></i></label>
                                                <input class="form-control" name="CallForPricingLabel" type="text"
                                                       id="CallForPricingLabel">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label for="template_name">Tinh trạng <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></i></label>
                                                <select class="form-control" name="template_old_new">
                                                    <option value="new">Hàng mới</option>
                                                    <option value="old">Hàng đã sử dụng</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="template_old_new_display">
                                                        <span class="text"> Hiển thị tình trạng này</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Phân loại</div>
                                        <div class="form-group">
                                            <label for="template_category">Danh mục </label> ví dụ: Điện thoại, Ô tô ...
                                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                               data-placement="top"
                                               data-original-title="Lưa chọn danh mục chứa sản phẩm"></i>
                                            <div class="input-group">
                                                <input placeholder="Nhập danh mục sản phẩm" type="text"
                                                       name="template_category" id="template_category"
                                                       class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button"
                                                            class="btn btn-default btn-dropdown dropdown-toggle"
                                                            data-toggle="dropdown">Chọn <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                        <?php
                                                        $result = $template_process->get_category_view();
                                                        $table_row = $result->fetchAll();

                                                        $category = array();
                                                        $template_process->category($table_row, $category);
                                                        foreach ($category as $key => $row) {
                                                            ?>
                                                            <li><a data-obj="template_category"
                                                                   data-id="<?= $row["danhmuc_id"]; ?>"
                                                                   data-text="<?= $row["tieude"]; ?>"><?= $row["level"], $row["tieude"]; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Tối ưu SEO</div>
                                        <div class="form-group">
                                            <label for="template_name">Tiêu đề trang <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                            <div>
                                                <input type="text" class="form-control" name="template_seo_title"/>
                                            </div>
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <label for="template_name">Thẻ mô tả <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                            <div>
                                                <textarea id="inputDescrip" name="template_seo_desc" class="form-control"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="hidden" value="template.add"/>
            <input type="hidden" name="act" value="save"/>
            <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y"); ?>"/>
        </form>
        <!-- /Page Body -->
    </div>

    <script language="javascript">

        $(document).ready(function () {
            $("#validateSubmitForm").bootstrapValidator();

            //--Bootstrap Date Picker--
            $('.date-picker').datepicker();

            //--Bootstrap Time Picker--
            $('#timepicker1').timepicker();

            // money format
            $(function () {
                $('.moneyformat').keyup(function () {
                    $(this).formatCurrency({
                        symbol: '',
                        colorize: true,
                        negativeFormat: '-%s%n',
                        roundToDecimalPlace: 0
                    });
                }).keypress(function (e) {
                    if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
                });
                $('#url_demo').keyup(function () {
                    $('#link_url_demo').attr('href','http://'+$(this).val())
                });
                $('.intformat').keypress(function (e) {
                    if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
                });
            });
            $.each($("[class$='ddl-box']").find("a"), function (i, option) {
                $(this).on("click", function () {
                    $("[name$='" + $(this).data('obj') + "']").val($(this).data('text'));
                });
            });
        });
    </script>

    <!--Bootstrap Date Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-datepicker.js"></script>

    <!--Bootstrap Time Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-timepicker.js"></script>

    <!--Bootstrap Date Range Picker-->
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
    <script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>

    <script src="<?= $conf['template_admin']; ?>/assets/js/bootbox/bootbox.js"></script>

    <script src="javascript/jquery.formatCurrency-1.4.0.js"></script>

<?php if (!empty($_SESSION["message"])) {
    unset($_SESSION["message"]);
} ?>