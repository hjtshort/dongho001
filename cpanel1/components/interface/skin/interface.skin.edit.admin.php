<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));

include 'interface.skin.edit.admin.process.php';
$myprocess = new process();

// Xử lý
if (isset($_GET['pages_id'])) @$pages_id = $_GET['pages_id'];
?>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="." class="glyphicons home"><i></i>Cpanel</a></li>
            <li class="divider"></li>
            <li>Thiết lập giao diện</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <form id="save_setting" name="save_setting" method="POST">
                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons picture"><i></i>Thiết lập giao diện</h4>
                        <div class="heading-buttons">
                            <div class="buttons pull-right"><a href="#modal-simple"
                                                               class="btn btn-primary btn-icon glyphicons circle_question_mark"
                                                               data-toggle="modal"><i></i> Trợ giúp</a> <a href="#"
                                                                                                           class="btn btn-primary btn-icon glyphicons edit"
                                                                                                           id="btnEditLayout"><i></i>
                                    Cập nhật</a></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="modal hide fade" id="modal-simple" aria-hidden="true" style="display: none;">
                        <!-- Modal heading -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3>Modal header</h3>
                        </div>
                        <!-- // Modal heading END -->
                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <!-- // Modal body END -->
                        <!-- Modal footer -->
                        <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        </div>
                        <!-- // Modal footer END -->
                    </div>
                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="span3">

                                <div class="accordion accordion-2" id="accordion1">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle glyphicons right_arrow collapsed"
                                               data-toggle="collapse" data-parent="#accordion1" href="#collapse-1">
                                                <i></i>Layout
                                            </a>
                                        </div>
                                        <div id="collapse-1" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul>
                                                    <li><a href="interface/skin/edit.html?act=layout&load=theme"
                                                           class="">theme.html</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion accordion-2" id="accordion2">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle glyphicons right_arrow collapsed"
                                               data-toggle="collapse" data-parent="#accordion2" href="#collapse-2">
                                                <i></i>Trang chức năng
                                            </a>
                                        </div>
                                        <div id="collapse-2" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <ul>
                                                    <?php
                                                    $directory = REAL_PATH . "/" . $conf['template_user'] . "/pages";
                                                    $files = $func->folderdir($directory);
                                                    foreach ($files as $key => $file) { ?>
                                                        <li>
                                                            <a href="interface/skin/edit.html?act=page&load=<?= $file; ?>"
                                                               class=""><?= $file; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion accordion-2" id="accordion3">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle glyphicons right_arrow collapsed"
                                               data-toggle="collapse" data-parent="#accordion3" href="#collapse-3">
                                                <i></i>Modules
                                            </a>
                                        </div>
                                        <div id="collapse-3" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <ul>
                                                    <?php
                                                    $directory = REAL_PATH . "/" . $conf['template_user'] . "/modules";
                                                    $files = $func->folderdir($directory);
                                                    foreach ($files as $key => $file) { ?>
                                                        <li>
                                                            <a href="interface/skin/edit.html?act=module&load=<?= $file; ?>"
                                                               class=""><?= $file; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion accordion-2" id="accordion4">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle glyphicons right_arrow collapsed"
                                               data-toggle="collapse" data-parent="#accordion4" href="#collapse-4">
                                                <i></i>Cấu hình
                                            </a>
                                        </div>
                                        <div id="collapse-4" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <ul>
                                                    <li><a href="interface/skin/edit.html?act=config&load=setting"
                                                           class="">setting.html</a></li>
                                                    <li>
                                                        <a href="interface/skin/edit.html?act=config&load=setting_config"
                                                           class="">setting_config.json</a></li>
                                                    <li><a href="interface/skin/edit.html?act=config&load=setting_data"
                                                           class="">setting_data.json</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php
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
                                            $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/config/setting_config.json");
                                            break;

                                        case "setting_data":
                                            $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/config/setting_data.json");
                                            break;
                                    }

                                    break;

                                case "layout":
                                    switch ($_GET["load"]) {
                                        case "theme":
                                            $content = $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/index.html");
                                            break;
                                    }
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
                            <div class="span9">
                                <textarea id="editor" class="span12" name="content_setting"><?= $content ?></textarea>
                                <div class="separator"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hidden" id="hidden" value="<?= $_GET["load"]; ?>">
            </form>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Wrapper -->
</div>
<div id="customizeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
</div>


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
            "F11": function(cm) {
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
            },
            "Esc": function(cm) {
                if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
            },
            "Ctrl-Space": "autocomplete",
            "Ctrl-J": "toMatchingTag"
        }
    });
    $('.accordion-body').removeClass('in');
    $('.accordion-inner a').each(function (key,elem) {
        if($(elem).attr('href').indexOf(location.href.split('?')[1])>=0){
            $(elem).parents('.accordion-body').addClass('in');
            $(elem).css({'color': '#333','font-weight': 'bold','text-decoration':'underline'});
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