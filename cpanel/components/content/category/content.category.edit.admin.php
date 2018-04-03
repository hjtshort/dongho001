<?php defined('_VALID_MOS') or die(include("404.php"));
$category_process = new category_process();
/*
function update_child_listId($table_row, &$category, $danhmuccha = 0, $danhmuc_id_assoc = 0){
    foreach($table_row as $key => $row){
        if($row['danhmuccha'] == $danhmuccha){

            $danhmuc_id_assoc .= "," . $row["danhmuc_id"];

            //echo $row["danhmuc_id"] . " | " . $danhmuc_id_assoc . "<br>";

            $category .= "UPDATE danhmuctintuc SET danhmuc_id_assoc = '" . $danhmuc_id_assoc . "' WHERE danhmuc_id = " . $row["danhmuc_id"] . "; <br>";

            unset($table_row[$key]);
            update_child_listId($table_row, $category, $row['danhmuc_id'], $danhmuc_id_assoc);
            $danhmuc_id_assoc = $danhmuccha;
        }
    }
}

$result = $category_process->get_category_view();
$table_row = $result->fetchAll();

$category = "";
update_child_listId($table_row, $category, 0, 0);

echo $category;
*/
?>


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
                    <li><a href="content/category/view.html">Quản lý Danh mục</a></li>
                    <li class="toast-title">Thêm Danh mục</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="content/category/view.html" class="btn btn-sky shiny">Hủy</a>
                <button type="submit" class="btn btn-sky shiny">Lưu</button>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
            <?php
            $result = $category_process->get_category_edit($conf['geturl']['id']);
            if ($data = $result->fetch()):
                ?>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-12">
                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Nội Dung</span>
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
                                            <label for="category_title">Tên danh mục <span class="text-danger">*</span>
                                                <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip"
                                                        data-placement="right"
                                                        data-original-title="Tên danh mục sản phẩm (VD: Thời trang nữ)"></i></label>
                                            <div>
                                                <input value="<?= $data["tieude"]; ?>" name="category_title" type="text"
                                                       id="category_title" class="form-control">
                                                <?php
                                                if (!empty($_SESSION["validator"]["category_title"])) {
                                                    echo $_SESSION["validator"]["category_title"];
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="parent_category"> Danh mục cha <span
                                                                class="text-danger">*</span> <i
                                                                class="fa fa-question-circle tooltip-info sky"
                                                                data-toggle="tooltip"
                                                                data-placement="right"
                                                                data-original-title="Danh mục cấp trên của danh mục đang cập nhật"></i></label>
                                                    <div>
                                                        <?php
                                                        $result = $category_process->get_category_view();
                                                        $table_row = $result->fetchAll();

                                                        $category = array();
                                                        $category_process->category($table_row, $category);

                                                        $selected_option = $data["danhmuccha"];
                                                        ?>
                                                        <select size="10" name="parent_category" id="parent_category"
                                                                class="form-control">
                                                            <option <?= $selected_option==0?'selected':''?> value="0">ROOT</option>
                                                            <?php foreach ($category as $key => $row): ?>

                                                                <option value="<?= $row["danhmuc_id"] ?>"
                                                                    <?= $row['danhmuc_id'] == $selected_option ? 'selected' : '' ?>
                                                                    <?=$row['danhmuc_id']==$data["danhmuc_id"]?'disabled':''?> >
                                                                    <?= $row["level"], $row["tieude"] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php
                                                        if (!empty($_SESSION["validator"]["parent_category"])) {
                                                            echo $_SESSION["validator"]["parent_category"];
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="image_src">Ảnh chính <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title=""></i></label>
                                                    <div>
                                                        <?php if(empty($data["hinhanh"])) { ?>
                                                            <img id="image_file" style="height:180px;" data-src="holder.js/150x150" class="img-thumbnail" alt="150x150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                                        <?php } else { ?>
                                                            <img id="image_file" style="height:180px;" class="img-thumbnail" alt="150x150" src="<?= '/'.$conf['data_user'].'/file_upload/'.$data["hinhanh"]; ?>">
                                                        <?php } ?>

                                                        <input value="<?= '/'.$conf['data_user'].'/file_upload/'.$data["hinhanh"]; ?>" type="hidden" name="image_src" id="image_src">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="button" class="btn btn-default" onClick="javascript:BrowseServer('image_src');">Chọn hình ảnh</button>
                                                        <button type="button" class="btn btn-default" onClick="javascript:ResetImage('image_src');">Bỏ chọn</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_desc">Mô tả <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip"
                                                        data-placement="right"
                                                        data-original-title=""></i></label>
                                            <div>
                                                <textarea name="category_desc"> <?= $data["tomtat"]; ?></textarea>
                                                <script type="text/javascript">
                                                    CKEDITOR.replace('category_desc', {
                                                        width: '100%',
                                                        height: '150px',
                                                        toolbar: 'Basic'
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-12">

                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Hiển Thị</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="collapse">
                                                <i class="fa fa-minus blue"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <label for="category_display">Hiển thị <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Lựa chọn để danh mục sản phẩm hiển thị trên website"></i></label>
                                            <div>
                                                <label>
                                                    <input <?= $data["hienthi"] ? "checked" : '' ?>
                                                            name="category_display" value="1"
                                                            class="checkbox-slider colored-blue" type="checkbox">
                                                    <span class="text"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget flat">
                                    <div class="widget-header bordered-bottom bordered-themeprimary">
                                        <span class="widget-caption">Thông Tin SEO</span>
                                        <div class="widget-buttons">
                                            <a href="#" data-toggle="collapse">
                                                <i class="fa fa-minus blue"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget-body widget-body-white">
                                        <div class="form-group">
                                            <label for="category_seo_title">Tiêu đề trang <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip"
                                                        data-placement="right"
                                                        data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                            <div>
                                                <input name="category_seo_title" type="text" id="category_seo_title"
                                                       class="form-control" value="<?= $data["seo_tieudetrang"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_seo_keyword">Thẻ từ khóa <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip"
                                                        data-placement="right"
                                                        data-original-title="Mô tả các từ khóa chính của website"></i></label>
                                            <div>
                                                <input name="category_seo_keyword" type="text" id="category_seo_keyword"
                                                       class="form-control" value="<?= $data["seo_thetukhoa"]; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_seo_desc">Thẻ mô tả <i
                                                        class="fa fa-question-circle tooltip-info sky"
                                                        data-toggle="tooltip"
                                                        data-placement="right"
                                                        data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                            <div>
                                                <textarea id="category_seo_desc" name="category_seo_desc"
                                                          class="form-control" rows="5"><?= $data["seo_themota"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <input type="hidden" name="hidden" value="category.edit"/>
        <input type="hidden" name="act" value="save"/>
        <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y"); ?>"/>

    </form>
    <!-- /Page Body -->
</div>
<script type="text/javascript">
    $(function () {
        // validate signup form on keyup and submit
        $("#validateSubmitForm").bootstrapValidator({
            fields: {
                category_title: {
                    validators: {
                        notEmpty: {
                            message: "Tên danh mục không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Tên danh mục phải lớn hơn 5 ký tự"
                        }

                    }
                },
                'parent_category': {
                    validators: {
                        notEmpty: {
                            message: 'Vui lòng chọn danh mục cha'
                        }
                    }
                }
            }
        });
    });
</script>
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
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
