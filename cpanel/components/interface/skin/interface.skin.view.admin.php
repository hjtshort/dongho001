<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));

include_once 'interface.skin.view.admin.process.php';
$myprocess = new process();

$type_product = $myprocess->get_type_product_json();
$collection_product = $myprocess->get_collection_product_json();

?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="./javascript/jquery-populate.min.js" type="text/javascript" charset="utf-8"></script>

<div class="page-content">
    <form method="post" enctype="multipart/form-data" class="accordion" id="accordionTemplate" name="accordionTemplate">
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
                                <?php echo $func->get_file_contents(REAL_PATH . "/" . $conf['template_user'] . "/config/setting.html"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="save"/>
    </form>
    <!-- /Page Body -->
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="previewModal" id="previewModal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="thumbnail  text-center">
                    <img src="">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!--jQUery MiniColors-->
<script src="<?= $conf['template_admin']; ?>/assets/js/colorpicker/jquery.minicolors.js"></script>
<script>

    /*
    $('input[type="checkbox"]').on('click', function(e){
        if(this.checked){$(this).val(1)} else {$(this).val(0)}
    });
    */

    var type_product = $.parseJSON('<?= $type_product; ?>');
    var collection_product = $.parseJSON('<?= $collection_product; ?>');

    $(document).ready(function () {
        $.each(type_product, function (index, value) {
            $('.type_product').append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        $.each(collection_product, function (index, value) {
            $('.collection_product').append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        $('#accordionTemplate').populate(<?= $func->json_encode_unicode($conf['data']) ?>);

    });

</script>

<script>
    $(function () {
        $('.colorpicker').each(function () {
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom right',
                change: function (hex, opacity) {
                    if (!hex) return;
                    if (opacity) hex += ', ' + opacity;
                    try {
                        console.log(hex);
                    } catch (e) { }
                },
                theme: 'bootstrap'
            });

        });
        $("#btnEditLayout").on("click", function (e) {

            $('input[type="file"]').each(function () {
                if (typeof($(this).attr("data-max-width")) !== "undefined") {
                    $('<input>').attr({
                        type: 'hidden',
                        id: $(this).attr("name"),
                        name: $(this).attr("name") + '--size',
                        value: $(this).attr("data-max-width") + "|" + $(this).attr("data-max-height")
                    }).appendTo('form');
                }
            });

            $("#accordionTemplate").submit();
            e.preventDefault();
        });

        $(".preview").on("click", function (e) {
            $("#previewModal .modal-body img").attr("src", $(this).data('src'));
            e.preventDefault();
        });

        $(".accordion-page").on("click", function (e) {
            if ($("#curent_page").val() == $(this).data("id")) {
                $("#curent_page").val("");
            } else {
                $("#curent_page").val($(this).data("id"));
            }
        });

        $(".accordion-section").on("click", function (e) {
            if ($("#curent_section").val() == $(this).data("id")) {
                $("#curent_section").val("");
            } else {
                $("#curent_section").val($(this).data("id"));
            }
        });

        /*
        $(".accordion-page").toggle(
            function(e){
                $("#curent_accord").val($(this).data("id"));
                e.preventDefault();
            },
            function(e){
                $("#curent_accord").val("");
                e.preventDefault();
            }
        );
        */
    });
</script> 
