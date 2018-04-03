<?php defined('_VALID_MOS') or die(include("404.php"));
$product_process = new product_process();
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
                        <li><a href="product/product/view.html">Quản lý sản phẩm</a></li>
                        <li class="toast-title">Thêm sản phẩm</li>
                    </ul>
                </div>
                <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                    <a href="product/product/add.html" class="btn btn-sky shiny">Hủy</a>
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
                                        <div class="form-group <?php if (!empty($_SESSION["message"]["product_name"])) {
                                            echo "has-error";
                                        } ?>">
                                            <label for="product_name">Tên sản phẩm <span
                                                        class="text-danger">*</span></label> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Nhập tên của sản phẩm (VD:Iphone 6 Plus 64GB)"></i>
                                            <div>
                                                <input placeholder="Nhập tên sản phẩm" type="text" class="form-control"
                                                       name="product_name"
                                                       data-bv-notempty="true"
                                                       data-bv-notempty-message="Tên sản phẩm không được để trống"/>
                                                <?php if (!empty($_SESSION["message"]["product_name"])) {
                                                    echo $_SESSION["message"]["product_name"];
                                                } ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Nội dung <i class="fa fa-question-circle tooltip-info sky"
                                                               data-toggle="tooltip" data-placement="top"
                                                               data-original-title="Mô tả chi tiết thông tin sản phẩm"></i></label>
                                            <div>
                                                <textarea name="product_detail"></textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace('product_detail', {
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
                                                <label for="product_price">Giá bán <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Giá sản phẩm nhập vào từ nhà cung cấp, không hiện trên website"></i></label>
                                                <div>
                                                    <div class="input-group">
                                                        <input value="0" type="text" class="form-control moneyformat"
                                                               name="product_price">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_price_promo">Giá so sánh <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Giá và % khuyến mãi sẽ được hiển thị trên website thay thế cho giá bán cũ"></i></label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control moneyformat"
                                                               name="product_price_compare">
                                                        <span class="input-group-addon">đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:10px;">Hoặc</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_percent_discount">Giảm %</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                               name="product_percent_discount">
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
                                        <hr class="wide">
                                        <div class="form-title">Kho hàng</div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label for="product_name">Mã sản phẩm / SKU <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Mã của sản phẩm hoặc đơn vị phân loại hàng tồn kho (IPS6), có thể là các con số hoặc một đoạn mã để xác định tính duy nhất của sản phẩm."></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_code"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_name">Mã vạch / Barcode <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Mã vạch dùng để quét khi nhập/ xuất hàng"></i></label>
                                                <div>
                                                    <input type="text" class="form-control" name="product_barcode"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="unit">Đơn vị tính (kg/grams)</label>
                                                <div class="input-group">
                                                    <input type="text" name="unit" id="unit" class="form-control"
                                                           maxlength="15">
                                                    <div class="input-group-btn">
                                                        <button type="button"
                                                                class="btn btn-default btn-dropdown dropdown-toggle"
                                                                data-toggle="dropdown">Chọn <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                            <li><a data-obj="unit" data-id="g" data-text="g">g</a></li>
                                                            <li><a data-obj="unit" data-id="kg" data-text="kg">kg</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label for="inventory_management">Quản lý kho <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Lựa chọn “cho phép” tạo điều kiện cho khách hàng có thể đặt hàng trực tiếp trên website, đồng thời bạn sẽ dễ dàng quản lý đơn hàng trên hệ thống, nếu muốn khách hàng liên hệ đặt hàng sẽ lựa chọn “Không cho phép và hiển thị chữ thay thế giá"></i></label>
                                                <select class="form-control" name="inventory_management"
                                                        id="inventory_management"
                                                        onchange="javascript:IsDisplayStore();">
                                                    <option selected="selected" value="0">Không quản lý kho hàng
                                                    </option>
                                                    <option value="1">Quản lý kho hàng</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="d-none" id="divInventoryManagementQty">
                                                    <label for="inventory_quantity">Số lượng: <i
                                                                class="fa fa-question-circle tooltip-info sky"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-original-title="VD: Liên hệ"></i></label>
                                                    <input value="1" class="form-control" name="inventory_quantity"
                                                           type="number" id="inventory_quantity">
                                                </div>
                                            </div>
                                            <div class="col-lg-3"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Tùy chọn</div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 margin-top-7"><label>Sản phẩm này có nhiều tùy chọn như
                                                    kích thước, màu sắc?</label></div>
                                            <div class="col-lg-3 text-align-right">
                                                <button type="button" class="btn btn-sky shiny btn-option">Thêm tùy
                                                    chọn
                                                </button>
                                                <button type="button" class="btn btn-default shiny hide btn-option">
                                                    Hủy
                                                </button>
                                                <input class="d-none" type="checkbox" name="enable_option"
                                                       id="enable_option" value="1"/>
                                            </div>
                                        </div>
                                        <div class="content-product-option" style="display:none">
                                            <div class="form-group tbl-product-option">
                                                <div class="form-group row product-option">
                                                    <div class="col-lg-4">
                                                        <label>Tên thuộc tính</label>
                                                    </div>
                                                    <div class="col-lg-6 row">
                                                        <label>Giá trị</label>
                                                    </div>
                                                    <div class="col-lg-4 col-xs-4">
                                                        <input name="product_option_name[]" value="Title" type="text"
                                                               class="form-control">
                                                    </div>
                                                    <div class="col-lg-6 col-xs-5 row">
                                                        <input name="product_option_value[]" placeholder="Nhập giá trị"
                                                               type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-2 col-xs-3">
                                                        <a style="display:none" id="cancel_properties"
                                                           class="btn btn-default btn-sm shiny icon-only margin-top-2 opt-remove"
                                                           data-id="Title"
                                                           onClick="removeRowFromTable(this);return false;">
                                                            <i class="fa fa-trash-o "></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-default shiny btn-add-option">Thêm
                                                    tùy chọn
                                                </button>
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
                                                    <input type="checkbox" checked="checked" name="product_display">
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
                                                <label for="product_name">Cho phép đặt hàng <i
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
                                                <label for="product_name">Tinh trạng <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Lựa chọn 1 trong 3 tình trạng của sản phẩm, tích lựa chọn “hiển thị tình trạng này” nếu muốn thông tin hiển thị trên website."></i></label>
                                                <select class="form-control" name="product_old_new">
                                                    <option value="new">Hàng mới</option>
                                                    <option value="old">Hàng đã sử dụng</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="product_old_new_display">
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
                                            <label for="product_category">Danh mục </label> ví dụ: Điện thoại, Ô tô ...
                                            <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                               data-placement="top"
                                               data-original-title="Lưa chọn danh mục chứa sản phẩm"></i>
                                            <div class="input-group">
                                                <input placeholder="Nhập danh mục sản phẩm" type="text"
                                                       name="product_category" id="product_category"
                                                       class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button"
                                                            class="btn btn-default btn-dropdown dropdown-toggle"
                                                            data-toggle="dropdown">Chọn <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                        <?php
                                                        $result = $product_process->get_category_view();
                                                        $table_row = $result->fetchAll();

                                                        $category = array();
                                                        $product_process->category($table_row, $category);
                                                        foreach ($category as $key => $row) {
                                                            ?>
                                                            <li><a data-obj="product_category"
                                                                   data-id="<?= $row["danhmuc_id"]; ?>"
                                                                   data-text="<?= $row["tieude"]; ?>"><?= $row["level"], $row["tieude"]; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="manufacturers">Nhà sản xuất</label> ví dụ: Sony, Apple ...<i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-original-title="Lưa chọn nhà sản xuất của sản phẩm"></i>
                                            <div class="input-group">
                                                <input placeholder="Nhập nhà sản xuất" type="text" name="manufacturers"
                                                       id="manufacturers" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="button"
                                                            class="btn btn-default btn-dropdown dropdown-toggle"
                                                            data-toggle="dropdown">Chọn <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right ddl-box">
                                                        <?php
                                                        $result = $product_process->get_nhasanxuat();
                                                        while ($row = $result->fetch()) {
                                                            ?>
                                                            <li><a data-obj="manufacturers"
                                                                   data-id="<?= $row["nhasanxuat_id"]; ?>"
                                                                   data-text="<?= $row["nhasanxuat"]; ?>"><?= $row["nhasanxuat"]; ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="wide">
                                        <div class="form-group no-margin-bottom">
                                            <label for="product_name">Nhóm sản phẩm <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Lưa chọn nhóm sản phẩm là sản phẩm mới hoặc sản phẩm nổi bật"></i></label>
                                            <label for="more_new_group" class="f_right"><a id="more_new_group"
                                                                                           href="javascript:void(0)">»
                                                    Thêm mới</a></label>

                                            <div class="form-group new_group d-none">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default shiny"
                                                                type="button">Thêm</button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-inline row">
                                                <?php
                                                $result = $product_process->get_nhomsanpham();
                                                while ($row = $result->fetch()) {
                                                    ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input value="<?= $row["nhom_id"]; ?>" type="checkbox"
                                                                   class="colored-warning"
                                                                   name="product_option_group[]">
                                                            <span class="text"><?= $row["tieude"]; ?></span>
                                                        </label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget radius-bordered">
                                    <div class="widget-body widget-body-white">
                                        <div class="form-title">Tối ưu SEO</div>
                                        <div class="form-group">
                                            <label for="product_name">Tiêu đề trang <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                            <div>
                                                <input type="text" class="form-control" name="product_seo_title"/>
                                            </div>
                                        </div>
                                        <div class="form-group no-margin-bottom">
                                            <label for="product_name">Thẻ mô tả <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                            <div>
                                                <textarea id="inputDescrip" name="product_seo_desc" class="form-control"
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
            <input type="hidden" name="hidden" value="product.add"/>
            <input type="hidden" name="act" value="save"/>
            <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y"); ?>"/>
        </form>
        <!-- /Page Body -->
    </div>

    <script language="javascript">

        $(document).ready(function () {
            $("#validateSubmitForm").bootstrapValidator();

            <?php if (!empty($_SESSION["message"]["notyfy"])) {
            echo $_SESSION["message"]["notyfy"];
        } ?>

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

        var joption = [{"name": "Màu sắc"}, {"name": "Kích thước"}, {"name": "Vật liệu"}, {"name": "Kiểu dáng"}];

        // ========== Purchase Products ========== //
        function IsDisplayPurchase() {
            var isPurchase = jQuery("[id$='IsAllowPurchase']").val();
            if (isPurchase == "disallowandtext") {
                $("#divCallForPricingLabel").removeClass("d-none");
            }
            else {
                $("#divCallForPricingLabel").addClass("d-none");
            }
        }

        // ========== Store Products ========== //
        function IsDisplayStore() {
            var isPurchase = jQuery("[id$='inventory_management']").val();
            if (isPurchase == "1") {
                $("#divInventoryManagementQty").removeClass("d-none");
            }
            else {
                $("#divInventoryManagementQty").addClass("d-none");
            }
        }

        $(".btn-add-option").on('click', function () {

            var str = srtjoin('<div class="form-group row product-option">')
            ('<div class="col-lg-4 col-xs-4">')
            ('<input name="product_option_name[]" value="' + joption[0].name + '" type="text" class="form-control">')
            ('</div>')
            ('<div class="col-lg-6 col-xs-5 row">')
            ('<input name="product_option_value[]" placeholder="Nhập giá trị" type="text" class="form-control">')
            ('</div>')
            ('<div class="col-lg-2 col-xs-3">')
            ('<a class="btn btn-default btn-sm shiny icon-only margin-top-2 opt-remove" data-id="' + joption[0].name + '" onClick="removeRowFromTable(this);return false;">')
            ('<i class="fa fa-trash-o"></i>')
            ('</a>')
            ('</div>')
            ('</div>')();

            $(".tbl-product-option").last().append(str);

            var opt_length = $('.product-option').length;

            if (opt_length >= 5) {
                $(".btn-add-option").hide();
                joption.splice(0);
                return false;
            }

            if (opt_length > 1) {
                $(".opt-remove").first().show();
            }
            joption.splice(0, 1);
        });

        function removeRowFromTable(r_delete) {
            value = $(r_delete).data('id');
            joption.push({"name": value});

            $(r_delete).parent().parent().remove();

            var opt_length = $('.product-option').length;

            if (opt_length < 5) {
                $(".btn-add-option").show();
            }

            if (opt_length == 1) {
                $(".opt-remove").first().hide();
            }
        }

        srtjoin = function (str) {
            var store = [str];
            return function extend(other) {
                if (other != null && 'string' == typeof other) {
                    store.push(other);
                    return extend;
                }
                return store.join('');
            }
        };

        $(".btn-option").on('click', function () {
            $(".content-product-option").fadeToggle(0);
            $(".btn-option").removeClass("hide");
            $(this).addClass("hide");

            if ($('#enable_option').is(':checked')) {
                $("#enable_option").attr('checked', false);
            } else {
                $("#enable_option").attr('checked', true);
            }
        });

        $("#more_new_group").on('click', function () {
            $(".new_group").fadeToggle(500);
            if ($(this).text() == "» Ẩn") {
                $(this).text("» Thêm mới");
            } else if ($(this).text() == "» Thêm mới") {
                $(this).text("» Ẩn");
            }
        });

        /* --- end modal sữa thuộc tính --- */

        function BrowseServer(inputId) {
            var finder = new CKFinder();
            finder.StartupPath = "Image:/image/";
            finder.selectActionFunction = SetFileField;
            finder.selectActionData = inputId;
            finder.popup();
        }

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