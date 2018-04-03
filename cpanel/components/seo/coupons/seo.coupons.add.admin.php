<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript">
    function BrowseServer(inputId) {
        var finder = new CKFinder();
        finder.StartupPath = "Image:/image/";
        finder.selectActionFunction = SetFileField;
        finder.selectActionData = inputId;
        finder.popup();
    }

    // This is a sample function which is called when a file is selected in CKFinder.
    function SetFileField(fileUrl, data) {
        document.getElementById("image_src").value = fileUrl;
        document.getElementById("image_file").src = fileUrl;
    }

    // This is a sample function which is called when a file is selected in CKFinder.
    function ResetImage() {
        document.getElementById("image_file").src = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==";
    }
</script>

<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Thêm mới mã coupon</li>
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
                                    <span class="widget-caption">Thêm mới mã coupon</span>
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
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Mã coupon <span class="text-danger">*</span> </label>
                                            <div>
                                                <input name="news_title" type="text" id="inputTitle" class="form-control">                                         
                                            </div>
                                        </div>   
                                        <div class="col-lg-6">     
                                            <label for="inputTitle">Tên coupon <span class="text-danger">*</span> </label>
                                            <div>
                                                <input name="news_title" type="text" id="inputTitle" class="form-control">                                 
                                            </div>  
                                        </div>
                                    </div>                              
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="product_name">Giảm giá <span class="text-danger">*</span></label>
                                            <div>
                                                <input type="text" class="form-control" name="product_code">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="product_name">&nbsp</label>
                                            <div>
                                            <select class="span3" style="width:100%;">
                                                <option selected="selected" value="1">% giảm giá với mỗi sản phẩm</option>
                                                <option value="2">giảm giá với mỗi sản phẩm</option>
                                                <option value="3">giảm giá với mỗi đơn hàng</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Điều kiện nhận Coupon <span class="text-danger">*</span><br>(Giá trị đơn hàng)</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-1">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:-15px;">Từ</div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div>
                                                <input type="text" class="form-control" name="product_code">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:-15px;">Đến</div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div>
                                                <input type="text" class="form-control" name="product_code">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Ngày hết hạn </label>
                                            <div>
                                                <input name="news_title" type="text" id="inputTitle" class="form-control">                                 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Ngày hết hạn coupon <span class="text-danger">*</span> </label>
                                            <div>
                                                <input name="news_title" type="text" id="inputTitle" class="form-control">                                 
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Số lần sử dụng </label>
                                            <div>
                                                <input name="news_title" type="text" id="inputTitle" class="form-control" value="0">                                 
                                            </div>
                                        </div>     
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Trạng Thái</label>
                                            <div>
                                                <select class="span3" style="width:100%">   
                                                    <option selected="selected" value="False">Sử dụng</option>
                                                    <option value="True">Ngừng sử dụng</option>
                                                </select>                      
                                            </div>
                                        </div>                                  
                                    </div>
                                     <div class="form-group">
                                        <label for="inputTitle">Áp dụng cho<span class="text-danger">*</span></label>
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
    <!-- /Page Body -->
</div>

<script type="text/javascript">


    $.validator.setDefaults(
        {
            submitHandler: function (form) {
                form.submit();
            },
            showErrors: function (map, list) {
                this.currentElements.parents('label:first, .controls:first').find('.error').remove();
                this.currentElements.parents('.row-fluid:first').removeClass('error');

                $.each(list, function (index, error) {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');

                    ee.parents('.row-fluid:first').addClass('error');
                    eep.find('.error').remove();
                    eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
                });
                //refreshScrollers();
            }
        });

    $(function () {
        // validate signup form on keyup and submit
        $("#validateSubmitForm").bootstrapValidator({
            fields: {
                news_title: {
                    validators: {
                        notEmpty: {
                            message: "Tiêu đề bản tin không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Tiêu đề bản tin phải lớn hơn 5 ký tự"
                        }

                    }
                },
                'parent_category[]': {
                    validators: {
                        notEmpty: {
                            message: 'Vui lòng chọn danh mục'
                        }
                    }
                }
            }
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

<!-- styles -->
<link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
<link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">

<!-- js -->
<script src="plugin/fileuploader/js/jquery.fileuploader.min.js" type="text/javascript"></script>
<style>
    .fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
        display: inline-block;
        width: 100% !important;
        height: 221px !important;
        line-height: 195px;
        padding: 10px;
        vertical-align: top;
        border-radius: 10px !important;
    }
    a.fileuploader-action.fileuploader-action-change i{
        color: #fff;
        position: absolute;
        top: 4px;
        left: 7px;
        height: 8px;
        width: 2px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {

        // enable fileuploader plugin
        $('input[name="files"]').fileuploader({
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
            limit: 1,
            maxSize: 5,
            changeInput: ' ',
            theme: 'thumbnails',
            enableApi: true,
            addMore: false,
            thumbnails: {
                box: '<div class="fileuploader-items">' +
                '<ul class="fileuploader-items-list">' +
                '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">Chọn Ảnh</div></li>' +
                '</ul>' +
                '</div>',
                item: '<li class="fileuploader-item">' +
                '<div class="fileuploader-item-inner">' +
                '<div class="thumbnail-holder">${image}</div>' +
                '<div class="actions-holder">' +
                '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
                '<span class="fileuploader-action-popup"></span>' +
                '</div>' +
                '<div class="progress-holder">${progressBar}</div>' +
                '</div>' +
                '</li>',
                item2: '<li class="fileuploader-item">' +
                '<div class="fileuploader-item-inner">' +
                '<div class="thumbnail-holder">${image}</div>' +
                '<div class="actions-holder">' +
                '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
                '<span class="fileuploader-action-popup"></span>' +
                '</div>' +
                '</div>' +
                '</li>',
                startImageRenderer: true,
                canvasImage: false,
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    popup_open: '.fileuploader-action-popup',
                    retry: '.fileuploader-action-retry',
                    remove: '.fileuploader-action-remove'
                },
                onItemShow: function (item, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));
                    item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-change" title="Đổi Ảnh"><i class="fa fa-history"></i></a>');
                    if (api.getFiles().length >= api.getOptions().limit) {
                        plusInput.hide();
                    }

                    plusInput.insertAfter(item.html);
                    var action_change = listEl.find('.fileuploader-action-change');
                    action_change.on('click', function () {
                        api.open();
                    });

                    if (item.format == 'image') {
                        item.html.find('.fileuploader-item-icon').hide();
                    }
                },
                onItemRemove: function (html, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    html.children().animate({'opacity': 0}, 200, function () {
                        setTimeout(function () {
                            html.remove();

                            if (api.getFiles().length - 1 < api.getOptions().limit) {
                                plusInput.show();
                            }
                        }, 100);
                    });

                }
            },
            afterRender: function (listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),

                    api = $.fileuploader.getInstance(inputEl.get(0));

                plusInput.on('click', function () {
                    api.open();
                });

            },
            editor: {
                cropper: {
                    ratio: '1:1',
                    minWidth: 150,
                    minHeight: 150,
                    maxWidth: 800,
                    maxHeight: 600,
                    showGrid: true
                }
            },
            dragDrop: {
                container: '.fileuploader-thumbnails-input'
            }
        });

    });
</script>
<script>

    //--Bootstrap Date Picker--
    $('.date-picker').datepicker();

    //--Bootstrap Time Picker--
    $('#timepicker1').timepicker();

</script>
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
