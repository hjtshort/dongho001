<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

include 'interface.skin.edit.admin.process.php';
$myprocess = new process();

// Xử lý
if(isset($_GET['pages_id'])) @$pages_id = $_GET['pages_id'];
?>

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
            <form id="savelayout" method="POST">
                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons picture"><i></i>Thiết lập giao diện</h4>
                        <div class="heading-buttons">
                            <div class="buttons pull-right"> <a href="#modal-simple" class="btn btn-primary btn-icon glyphicons circle_question_mark" data-toggle="modal"><i></i> Trợ giúp</a> <a href="" class="btn btn-primary btn-icon glyphicons edit" id="btnEditLayout"><i></i> Cập nhật</a> </div>
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
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <!-- // Modal body END -->
                        <!-- Modal footer -->
                        <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                        <!-- // Modal footer END -->
                    </div>
                    <div class="widget-body">
                        <!--<div class="row-fluid">
                  <div class="span2">
                    <p class="muted">Giao diện đang sử dụng &nbsp;</p>
                  </div>
                  <div class="span9">
                                    <p class="muted" style="font-weight:bold;">Ecom84</p>
                    <img id="imgCurentSkin" src="<?php echo $template_admin; ?>/html/images/skin/Ecom84.master.mini.gif" style="width:160px;">
                    <div class="separator"></div>
                  </div>
                  </div> -->
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Chọn trang</p>
                            </div>
                            <div class="span8">
                                <select class="span4" name="pages_id" id="pages_id">
                                    <option value="-1">Vui lòng chọn trang cần chỉnh sửa</option>
                                    <?php $result = $myprocess->get_pages_list();
                                    while ($row = $result->fetch()){ ?>
                                        <option value="<?= $row['pages_id'] ?>" <?= ($pages_id == $row['pages_id']) ? 'selected' : ''?>><?= $row['pages_title'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Chọn giao diện</p>
                            </div>
                            <div class="span10">
                                <textarea id="editor" style="height:500px" class="span12" name="pages_html"><?= unserialize($myprocess->get_layout($pages_id)); ?></textarea>
                                <div class="separator"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hidden" id="hidden" value="savelayout">
            </form>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Wrapper -->
</div>
<div id="customizeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<script src="javascript/codemirror-5.32.0/lib/codemirror.js"></script>
<script src="javascript/codemirror-5.32.0/mode/htmlmixed/htmlmixed.js"></script>

<script src="javascript/codemirror-5.32.0/addon/selection/selection-pointer.js"></script>
<script src="javascript/codemirror-5.32.0/mode/xml/xml.js"></script>

<script src="javascript/codemirror-5.32.0/mode/css/css.js"></script>
<script src="javascript/codemirror-5.32.0/mode/vbscript/vbscript.js"></script>

<script src="javascript/codemirror-5.32.0/mode/twig/twig.js"></script>
<script language="javascript">
      var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                       mode: null},
                      {matches: /(text|application)\/(x-)?vb(a|script)/i,
                       mode: "vbscript"},
                       {matches: /(text|application)\/(x-)?vb(a|script)/i,
                       mode: "twig"}]
      };
      var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        mode: mixedMode,
        selectionPointer: true,
         lineNumbers: true,
      });
      /*var editor =
      CodeMirror.fromTextArea(document.getElementById("editor"), {mode:
        {name: "twig", htmlMode: true}});*/
    $("#pages_id").on("change", function(){
        window.location.href = "interface/skin/edit.html?pages_id=" + $(this).val();
    });

    $("#btnEditLayout").on("click", function(e){
        if($("#pages_id").val() == "-1"){
            alert("Vui lòng chọn trang cần chỉnh sữa trước");
            e.preventDefault();
            return;
        }
        $("form#savelayout").submit();
        e.preventDefault();
    });
</script>