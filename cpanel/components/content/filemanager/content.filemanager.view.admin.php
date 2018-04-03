<?php
?>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý hình ảnh</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <a href="javascript:BrowseServer" class="btn btn-sky shiny">Thêm hình ảnh</a>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                    <?php
                    // we are inclunding it only for using FileUploader::mime_content_type method
                    include_once('../libraries/phpupload/class.fileuploader.php');

                    // create an empty array
                    // we will add to this array the files from directory below
                    // here you can also add files from MySQL database
                    $appendedFiles = array();
                    $uploadDir = '../'.$conf['data_user'].'/file_upload/images/';
                    // scan uploads directory
                    $uploadsFiles = array_diff(scandir($uploadDir), array('.', '..'));

                    // add files to our array with
                    // made to use the correct structure of a file
                    foreach($uploadsFiles as $file) {
                        // skip if directory
                        if(is_dir($file))
                            continue;

                        // add file to our array
                        // !important please follow the structure below
                        $appendedFiles[] = array(
                            "name" => $file,
                            "type" => FileUploader::mime_content_type($uploadDir . $file),
                            "size" => filesize($uploadDir . $file),
                            "file" => $uploadDir . $file,
                            "data" => array(
                                "url" => $file
                            )
                        );
                    }

                    // convert our array into json string
                    $appendedFiles = json_encode($appendedFiles);
                    ?>
                    <input type="file" name="files" data-fileuploader-files='<?php echo $appendedFiles;?>'>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
<!-- styles -->
<link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
<link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
<style>
    .fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
        height: 200px !important;
        line-height: 160px;
        padding: 10px;
        vertical-align: top;
        border-radius: 10px !important;
    }
</style>
<!-- js -->
<script src="plugin/fileuploader/js/jquery.fileuploader.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

        // enable fileuploader plugin
        $('input[name="files"]').fileuploader({
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
            maxSize: 5,
            changeInput: ' ',
            theme: 'thumbnails',
            enableApi: true,
            addMore: true,
            thumbnails: {
                box: '<div class="fileuploader-items">' +
                '<ul class="fileuploader-items-list">' +
                '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">Thêm Ảnh</div></li>' +
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
                    //item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-change" title="Đổi Ảnh"><i class="fa fa-history"></i></a>');
                    if (api.getFiles().length >= api.getOptions().limit) {
                        plusInput.hide();
                    }

                    //plusInput.insertBefore(item.html);
                   /* var action_change = listEl.find('.fileuploader-action-change');
                    action_change.on('click', function () {
                        api.open();
                    });*/

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

<script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
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
</script>