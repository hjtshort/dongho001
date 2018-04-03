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
                    <li><a href="sitesetting/sitesetting/view.html">Thiết lập cấu hình website</a></li>
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
                                    <span class="widget-caption">Thông tin chung</span>
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
                                         Link website: <strong>http://superweb.vn/webtienich</strong>
                                    </div>   
                                    <div class="form-group">
                                         Ngày tạo: <strong>01/01/2018</strong>
                                    </div>   
                                    <div class="form-group">
                                         Tình trạng: <label>                                      
                                        <input type="checkbox" class="colored-warning">
                                        <span class="text">Hoạt động</span>      
                                         </label>
                                    </div>                                  
                                    <div class="form-group">
                                        <label for="inputTitle">Tiêu đề website <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Nhập nội dung tiêu đề website. Ví dụ một website chuyên bán mỹ phẩm có thể nhập tiêu đề như sau: Mỹ phẩm | Mỹ phẩm giá gốc | Mỹ phẩm nhau cừu"></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Từ khóa <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Nhập nội dung các từ khóa bạn muốn SEO trên google vào"></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="inputTitle">Mô tả <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Nhập nội dung miêu tả về website và sản phẩm vào, ví dụ như website bán mỹ phẩm có thể nhập mô tả như sau: mỹ phẩm giá gốc, Mỹ phẩm giá gốc giúp chị em chăm sóc da, Làm Sạch, Dưỡng da cơ bản,  trị nám, Trị mụn, Trắng da…"></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Email quản trị <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Tất cả các liên hệ hay đơn đặt hàng của khách hàng sẽ được gửi vào hệ thống quản trị website đồng thời đến email quản trị, và email quản trị này có thể thay đổi."></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>                                     
                                </div>
                            </div>
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Cấu hình website</span>
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
                                        <label for="inputTitle">Trang mặc định <span class="text-danger"></span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Lựa chọn trang đầu tiên hiện ra khi người dùng truy cập vào địa chỉ trang web"></i>
                                        </label>
                                        <div>
                                            <select class="span3" id="page_default" name="page_default" >
                                                <option value="1">Trang chủ</option>
                                                <option selected="" value="2">Tin tức</option>
                                                <option value="3">Chi tiết sản phẩm</option>
                                            </select>
                                        </div>
                                    </div>     
                                    <div class="form-group">
                                        <label for="inputTitle">Ngôn ngữ mặc định</label>
                                        <div>
                                            <select class="span3" id="default_language" name="default_language" >                                           
                                                        <option value="vi-VN">Việt Nam</option>
                                                        <option selected="" value="en-US">English</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputTitle">Chuyển hướng www</label>
                                        <div>
                                            <select class="span3" id="www_redirect" name="www_redirect">
                                                <option value="-1">Không chuyễn</option>
                                                <option selected="" value="www">Chuyển hướng từ không www sang www</option>
                                                <option value="non-www">Chuyển hướng từ www sang không www</option>                                                                         
                                             </select>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label for="inputTitle">Sử dụng tìm kiếm thông minh</label>
                                        <div>
                                            <select class="span3" id="smart_search" name="smart_search" >                                           
                                                <option value="False">Không</option>
                                                <option selected="" value="True">Có</option>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label for="inputTitle">Cấu hình tìm kiếm website</label>
                                        <div>
                                        <select class="span3" id="search_product" name="search_product">
                                            <option value="OnlyProd">Chỉ tìm kiếm sản phẩm</option>
                                            <option value="OnlyNews">Chỉ tìm kiếm tin tức</option>
                                            <option value="BothProdAndNews">Sản phẩm và tin tức</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Địa chỉ cửa hàng</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">
                                    <div class="form-group">

                                        <label for="inputTitle">Tên đăng ký giấy phép kinh doanh (GPKD) của doanh nghiệp <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Điền nội dung tên công ty hiển thị trên phần Liên hệ của website."></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Địa chỉ <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Địa chỉ liên hệ của web site"></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Điện thoại <span class="text-danger"></span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Số điện thoại hiển thị trong phần Liên hệ của website."></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Fax <span class="text-danger"></span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Địa chỉ Fax, hiển thị trong phần Liên hệ của website."></i></label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>                        
                                </div>
                            </div>                                  
                        </div>
                        <div class="col-lg-4 col-sm-4 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Cài đặt tracking web</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">
                                    <div class="form-group">
                                        <label for="inputTitle">Để tích hợp Google Analytics vào website của bạn, bạn cần thực hiện các bước sau:</label>
                                    </div>     
                                    <div class="form-group">
                                        <ul>
                                            <li><a href="http://www.google.com/analytics/" target="_blank">Tạo 1 tài khoản Google Analytics</a> và làm theo hướng dẫn để thêm trang web của bạn.</li>
                                            <li>Sao chép mã theo dõi từ Google Analytics vào ô phía dưới</li>
                                            <li>Ấn <strong>"Lưu"</strong> để Google Analytics được tích hợp vào website của bạn</li>
                                        </ul>                            
                                    </div> 
                                    <div class="form-group">
                                        <label for="inputTitle">Google Analytics Code:  <span class="text-danger"></span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Đoạn mã Google Analytics, giúp bạn sử dụng một dịch vụ của Google để thống kê, phân tích website."></i>
                                        </label>
                                        <div>
                                            <input name="news_title" type="text" id="inputTitle" class="form-control">
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label for="inputTitle">Facebook ApplicationID</label>
                                        <div>
                                             <input name="news_title" type="text" id="inputTitle" class="form-control">
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
