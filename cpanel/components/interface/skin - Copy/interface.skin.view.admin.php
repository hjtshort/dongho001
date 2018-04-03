<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

    include_once 'interface.skin.view.admin.process.php';

    $proc = new PageData(true);

    // Xử lý
    ?>
<style>
    .imgPreview {
        display: block;
        max-width: 450px;
        margin: 0 auto;
    }

    .control-group {
        border-bottom: 1px solid #ededed;
        /*padding: 10px 0;*/
        margin: 5px 0;
    }

    .control-group label {
        font-size: 0.9rem;
        font-weight: bold;
        float: left;
        width: 140px;
    }

    .control-group p {
       display: block;
       clear: both;
    }

    .accordion-inner .control-group:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    #accordionTemplate .accordion-toggle {
        height: 42px;
        line-height: 42px;
    }

    .control-group .preview {
        background: #b9edff;
        color: #333;
        padding: 3px 4px;
        margin-right: 5px;
        font-weight: bold;
    }

    .image-placeholder {
       width: auto;
       border: 1px solid #eee;
       padding: 4px;
       border-radius: 3px
    }
</style>
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
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            <a href="#" class="btn btn-primary btn-icon glyphicons edit" id="btnEditLayout"><i></i> Cập nhật</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="row-fluid">
                        <div class="span10 offset1">
                            <?php
                                $proc->parse_theme_config();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="previewModal" class="modal hide fade" style="left: 32%; width: 1000px">
  <div class="modal-body">
    <img src="">
  </div>
  <div class="modal-footer">
    <a class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a>
  </div>
</div>
<script>
$( function(){
    $("#btnEditLayout").on("click", function(e){
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
