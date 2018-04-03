<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));

include 'interface.skin.edit.admin.process.php';
$myprocess = new process();

// Xử lý
if (isset($_GET['pages_id'])) @$pages_id = $_GET['pages_id'];

$content = '';
switch (@$_GET["act"]) {

    case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;

    case "config":
        switch ($_GET["load"]) {
            case "setting":
                $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/config/setting.html");
                break;

            case "setting_config":
                $content = $func->get_file_contents(REAL_PATH . "/" . $conf['data_user'] . "/setting_config.json");
                break;

            case "setting_data":
                $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/config/setting_data.json");
                break;
        }

        break;

    case "layout":
        $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . '/'.$_GET["load"]);
        break;


    case "page":
        $page = REAL_PATH . "/" . $conf['template_user'] . "/pages/" . $_GET["load"];
        if (file_exists($page)) {
            $content = $func->get_file_contents($page);
        } else {
            $content = "Trang " . $_GET["load"] . " không tồn tại";
        }
        break;

    case "module":
        $page = REAL_PATH . "/" . $conf['template_user'] . "/modules/" . $_GET["load"];
        if (file_exists($page)) {
            $content = $func->get_file_contents($page);
        } else {
            $content = "Module " . $_GET["load"] . " không tồn tại";
        }
        break;

    default:
        $func->_redirect(".");
        break;
}
?>
<style>
    .btn.btn-link.active {
        color: #333 !important;
        font-weight: bold;
    }

    .btn.btn-link {
        padding: 0 !important;
    }
</style>
<div class="page-content">
    <form id="save_setting" name="save_setting" method="POST">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-4">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li class="toast-title">Quản lý giao diện</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
                <button class="btn btn-sky shiny">Lưu</button>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <div class="widget-header bordered-bottom bordered-blue">
                            <span class="widget-caption">Cấu hình</span>

                            <div class="widget-buttons">
                                <a href="#" data-toggle="maximize">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main ">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 col-lg-3">

                                        <ul class="list-unstyled list-file">

                                            <li>
                                                <div>
                                                    <a data-toggle="collapse" href="#collapse-1">
                                                        <i class="fa fa-folder blue"></i> Layout
                                                    </a>
                                                </div>
                                                <div id="collapse-1" class="collapse">
                                                    <ul>
                                                        <?php

                                                        $directory = REAL_PATH . "/" . $conf['template_user'].'/';
                                                        $files = $func->folderdir($directory);
                                                        foreach ($files as $key => $file):
                                                            if(is_file($directory.$file)):?>
                                                                <li>
                                                                    <a href="interface/skin/edit.html?act=layout&load=<?= $file; ?>"
                                                                       class="btn btn-link"><?= $file; ?></a>
                                                                </li>
                                                            <?php endif;
                                                        endforeach; ?>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div>
                                                    <a data-toggle="collapse" href="#collapse-2">
                                                        <i class="fa fa-folder blue"></i> Trang chức năng
                                                    </a>
                                                </div>
                                                <div id="collapse-2" class="collapse">
                                                    <ul>
                                                        <?php
                                                        $directory = REAL_PATH . "/" . $conf['template_user'] . "/pages";
                                                        $files = $func->folderdir($directory);
                                                        foreach ($files as $key => $file): ?>
                                                            <li>
                                                                <a href="interface/skin/edit.html?act=page&load=<?= $file; ?>"
                                                                   class="btn btn-link"><?= $file; ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div>
                                                    <a data-toggle="collapse" href="#collapse-3">
                                                        <i class="fa fa-folder blue"></i> Modules
                                                    </a>
                                                </div>
                                                <div id="collapse-3" class="collapse">
                                                    <ul>
                                                        <?php
                                                        $directory = REAL_PATH . "/" . $conf['template_user'] . "/modules";
                                                        $files = $func->folderdir($directory);
                                                        foreach ($files as $key => $file): ?>
                                                            <li>
                                                                <a href="interface/skin/edit.html?act=module&load=<?= $file; ?>"
                                                                   class="btn btn-link"><?= $file; ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div>
                                                    <a data-toggle="collapse" href="#collapse-4">
                                                        <i class="fa fa-folder blue"></i> Cấu hình
                                                    </a>
                                                </div>
                                                <div id="collapse-4" class=" collapse">
                                                    <ul>
                                                        <li>
                                                            <a href="interface/skin/edit.html?act=config&load=setting"
                                                               class="btn btn-link">setting.html</a></li>
                                                        <li>
                                                            <a href="interface/skin/edit.html?act=config&load=setting_config"
                                                               class="btn btn-link">setting_config.json</a></li>
                                                        <li>
                                                            <a href="interface/skin/edit.html?act=config&load=setting_data"
                                                               class="btn btn-link">setting_data.json</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_add"
                                                   class="btn btn-link"><i class="fa fa-plus"></i> Thêm Mới</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-9 col-md-9 col-lg-9">
                                        <textarea id="editor" class="span12"
                                                  name="content_setting"><?= $content ?></textarea>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" id="hidden" value="<?= $_GET["load"]; ?>">
    </form>
    <!-- /Page Body -->
</div>
<!--Small Modal Templates-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_add" id="modal_add" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Thêm File</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="label-control">Loại</label>
                        <div>
                            <select name="dir" class="form-control">
                                <option value="">Layout</option>
                                <option value="pages">Trang Chức Năng</option>
                                <option value="modules">Modules</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Tên</label>
                        <div>
                            <input name="name_file" required type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-success">Thêm</button>
                </div>
            </div><!-- /.modal-content -->
            <input type="hidden" name="hidden" id="hidden" value="add.file">
        </form>
    </div><!-- /.modal-dialog -->
</div>
<!--End Small Modal Templates-->

<!--Page Related Scripts-->

<link rel="stylesheet" href="javascript/codemirror-5.32.0/lib/codemirror.css">
<link rel="stylesheet" href="javascript/codemirror-5.32.0/addon/dialog/dialog.css">
<link rel="stylesheet" href="javascript/codemirror-5.32.0/addon/search/matchesonscrollbar.css">
<link rel="stylesheet" href="javascript/codemirror-5.32.0/addon/hint/show-hint.css">
<link rel="stylesheet" href="javascript/codemirror-5.32.0/addon/display/fullscreen.css">
<link rel="stylesheet" href="javascript/codemirror-5.32.0/addon/fold/foldgutter.css">

<script src="javascript/codemirror-5.32.0/lib/codemirror.js"></script>
<script src="javascript/codemirror-5.32.0/keymap/sublime.js"></script>

<script src="javascript/codemirror-5.32.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="javascript/codemirror-5.32.0/mode/xml/xml.js"></script>
<script src="javascript/codemirror-5.32.0/mode/css/css.js"></script>
<script src="javascript/codemirror-5.32.0/mode/vbscript/vbscript.js"></script>
<script src="javascript/codemirror-5.32.0/mode/twig/twig.js"></script>

<script src="javascript/codemirror-5.32.0/addon/selection/selection-pointer.js"></script>
<script src="javascript/codemirror-5.32.0/addon/display/fullscreen.js"></script>
<script src="javascript/codemirror-5.32.0/addon/comment/comment.js"></script>
<script src="javascript/codemirror-5.32.0/addon/wrap/hardwrap.js"></script>
<script src="javascript/codemirror-5.32.0/addon/edit/closetag.js"></script>
<script src="javascript/codemirror-5.32.0/addon/edit/matchtags.js"></script>

<script src="javascript/codemirror-5.32.0/addon/fold/foldcode.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/foldgutter.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/brace-fold.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/xml-fold.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/indent-fold.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/markdown-fold.js"></script>
<script src="javascript/codemirror-5.32.0/addon/fold/comment-fold.js"></script>

<script src="javascript/codemirror-5.32.0/addon/search/search.js"></script>
<script src="javascript/codemirror-5.32.0/addon/search/searchcursor.js"></script>
<script src="javascript/codemirror-5.32.0/addon/search/jump-to-line.js"></script>
<script src="javascript/codemirror-5.32.0/addon/search/match-highlighter.js"></script>
<script src="javascript/codemirror-5.32.0/addon/scroll/annotatescrollbar.js"></script>
<script src="javascript/codemirror-5.32.0/addon/search/matchesonscrollbar.js"></script>
<script src="javascript/codemirror-5.32.0/addon/dialog/dialog.js"></script>

<script src="javascript/codemirror-5.32.0/addon/hint/show-hint.js"></script>
<script src="javascript/codemirror-5.32.0/addon/hint/html-hint.js"></script>
<script src="javascript/codemirror-5.32.0/addon/hint/javascript-hint.js"></script>
<script src="javascript/codemirror-5.32.0/addon/hint/css-hint.js"></script>
<script src="javascript/codemirror-5.32.0/addon/hint/xml-hint.js"></script>


<script language="javascript">
    var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [
            {matches: /\/x-handlebars-template|\/x-mustache/i, mode: null},
            {matches: /(text|application)\/(x-)?vb(a|script)/i, mode: "vbscript"}
        ]
    };

    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        mode: mixedMode,
        selectionPointer: true,
        lineNumbers: true,
        keyMap: "sublime",
        foldGutter: true,
        autoCloseTags: true,
        gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
        extraKeys: {
            "F11": function (cm) {
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
            },
            "Esc": function (cm) {
                if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
            },
            "Ctrl-Space": "autocomplete",
            "Ctrl-J": "toMatchingTag"
        }
    });
    $('.list-file .collapse').removeClass('show');

    var patt = new RegExp('^' + location.href.split('?')[1] + '$');
    $('.list-file .collapse a').each(function (key, elem) {
        var href = $(elem).attr('href').split('?')[1];
        if (patt.test(href)) {
            $(elem).parents('.collapse:first').addClass('show');
            $(elem).addClass('active');
        }
    })
</script>

<script>
    $(function () {
        $("#btnEditLayout").on("click", function (e) {
            $("#save_setting").submit();
            e.preventDefault();
        });
    });
</script> 