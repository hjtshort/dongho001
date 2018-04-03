<?php defined('_VALID_MOS') or die(include("../../content/news/404.php"));

$myprocess = new process();

$type_product = $myprocess->get_type_product_json();
$collection_product = $myprocess->get_collection_product_json();
$path_template = $myprocess->path_template;

?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="./javascript/jquery-populate.min.js" type="text/javascript" charset="utf-8"></script>

<div class="page-content">

    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li><a href="interface/template/view.html">Quản lý giao diện</a></li>
                <li class="toast-title">Cấu hình</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <a href="interface/template/view.html" class="btn btn-sky shiny">Hủy</a>
            <button onclick="$('#accordionTemplate').submit()" class="btn btn-sky shiny">Lưu</button>
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
                            <form method="post" enctype="multipart/form-data" class="accordion" id="accordionTemplate"
                                  name="accordionTemplate">
                                <?php echo $func->get_file_contents("$path_template/config/setting.html"); ?>
                                <input type="hidden" name="hidden" value="save"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    var list_menu = $.parseJSON('<?= $myprocess->get_list_group_menu_json() ?>');

    $(document).ready(function () {
        $.each(type_product, function (index, value) {
            $('.type_product').append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        $.each(collection_product, function (index, value) {
            $('.collection_product').append('<option value="' + value.id + '">' + value.name + '</option>');
        });
        $.each(list_menu, function (index, value) {
            $('.list_menu').append('<option value="' + value.Id + '">' + value.title + '</option>');
        });

        $('#accordionTemplate').populate(<?= $func->json_encode_unicode($myprocess->data_setting_template()) ?>);

    });

</script>

<script>
    $(function () {
        $('img.layout_review').each(function (index,elem_img_review) {
            console.log(elem_img_review)
            var original_src = $(elem_img_review).data('img');
            $(elem_img_review).attr('src','../resource/<?= $myprocess->Id_template ?>/assets/'+original_src);
        });
    });
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
                    } catch (e) {
                    }
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
