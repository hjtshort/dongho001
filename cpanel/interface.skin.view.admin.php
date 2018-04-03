<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

    include_once 'interface.skin.view.admin.process.php';
	$myprocess = new process();
	
	$type_product = $myprocess->get_type_product_json();
	$collection_product = $myprocess->get_collection_product_json();

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./javascript/jquery-populate.min.js" type="text/javascript" charset="utf-8"></script>

<div id="wrapper">
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="." class="glyphicons home"><i></i>Panel</a></li>
            <li class="divider"></li>
            <li>Giao diện</li>
            <li class="divider"></li>
            <li>Giao diện website</li>
        </ul>
        <div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                    <h4 class="heading glyphicons picture"><i></i>Thiết lập giao diện</h4>
                    <div class="heading-buttons">
                        <div class="buttons pull-right"> <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a> <a href="#" class="btn btn-primary btn-icon glyphicons edit" id="btnEditLayout"><i></i> Cập nhật</a> </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span10 offset1">
                            <form method="post" enctype="multipart/form-data" class="accordion" id="accordionTemplate" name="accordionTemplate">
                                <?php echo $func->get_file_contents(REAL_PATH."/".$conf['template_user']."/config/setting.html"); ?>
                                <input type="hidden" name="hidden" value="save" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="previewModal" class="modal hide fade" style="left: 32%; width: 1000px">
    <div class="modal-body"> <img src=""> </div>
    <div class="modal-footer"> <a class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a> </div>
</div>
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
$( function(){
    $("#btnEditLayout").on("click", function(e){
		
		$('input[type="file"]').each( function(){
			if(typeof($(this).attr("data-max-width")) !== "undefined"){
				$('<input>').attr({
					type: 'hidden',
					id: $(this).attr("name"),
					name: $(this).attr("name") + '--size', value: $(this).attr("data-max-width") +"|"+ $(this).attr("data-max-height")
				}).appendTo('form');
			}
		});

        $("#accordionTemplate").submit();
        e.preventDefault();
    });		 
	
    $(".control-group .preview").on("click", function(e){
        $("#previewModal .modal-body img").attr("src", $(this).data('src'));
        e.preventDefault();
    });	

	$(".accordion-page").on("click", function(e){
        if ($("#curent_page").val() == $(this).data("id")) {
			$("#curent_page").val("");	
		} else {
			$("#curent_page").val($(this).data("id"));
		}
    });
	
	$(".accordion-section").on("click", function(e){
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
