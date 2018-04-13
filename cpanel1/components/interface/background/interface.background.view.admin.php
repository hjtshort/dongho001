<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") ); ?>
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
            <div class="widget widget-2">
                <div class="widget-head">
                
                    <h4 class="heading glyphicons picture"><i></i>Thiết lập hình nền</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
							<a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    
                </div>
                 <div class="modal hide fade" id="modal-simple">
                    
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
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> 
                    </div>
                    <!-- // Modal footer END -->
                    
                </div>               
                <div class="widget-body">
		        	<div class="row-fluid">
					<div class="span2">
						<p class="muted">Đang sử dụng &nbsp;</p>
					</div>
					<div class="span9">
                    	<p class="muted" style="font-weight:bold;">Nền mặc định</p>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Chọn nền</p>
					</div>
					<div class="span8">
						<select name="Main$ctl00$ctl00$cbBackgroundType" id="cbBackgroundType" class="bg_combo">
                            <option selected="selected" value="default">Nền mặc định</option>
                            <option value="color">M&#224;u nền</option>
                            <option value="upload">Upload h&#236;nh nền</option>
                            <option value="system">H&#236;nh nền hệ thống</option>
                            <option value="Events">Events</option>
                            <option value="Tet_2014">Tet_2014</option>
                        </select>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mỗi một giao diện sẽ có 1 hình nền mặc định ngoài ra có thể lựa chọn theo màu nền, hình nền theo hệ thống, hình nền theo sự kiện nổi bật trong năm, hoặc có thể tự upload hình nền từ máy tính cá nhân."></span>
                    <input type="checkbox" class="checkbox" value="1"><span class="muted">Hình nền cố định (không thay đổi khi kéo trang xuống dưới)</span>
						<div class="separator"></div>
					</div>
                    
				</div>
                <div class="row-fluid">
                	<div class="span2"></div>
                    <div class="span8">
                      <div id="plColor" class="item hidden">
                    	<div style="padding: 5px;" class="muted">
                Mã màu:
                <input name="ctl00$cph_Main$ctl00$ctl00$txtColor" type="text" readonly="readonly" id="txtColor" class="span2">
                &nbsp;&nbsp;&nbsp;&nbsp;Đang sử dụng:
                <input name="ctl00$cph_Main$ctl00$ctl00$txtBackground" type="text" readonly="readonly" id="txtBackground" disabled="disabled" class="span2">
            </div>
            <div id="colorContainer">
                <table style="border-collapse: collapse;" cellpadding="0" cellspacing="0">

                    <script type="text/javascript">
                        for (i = 0; i <= 256; i += 18) {
                            if (i == 252) i = 255; document.write("<tr>");
                            for (j = 0; j <= 256; j = j + 51) {
                                for (k = 0; k <= 256; k = k + 51) {
                                    document.write("<td onclick='clicked(" + i + "," + j + "," + k + ")' \
				                            style=\"border: 1px inset black; width:10px; \
				                            height: 10px; font-size: 6px; background-color: rgb(" + i + "," + j + "," + k + ");\"" + "> </td>");
                                }
                            }
                            document.write("</tr>");
                        }
                    </script>

                </table>
            </div>
                    </div>
                    <div id="plUpload" class="item hidden">
                    	<div class="fileupload fileupload-new" data-provides="fileupload">
						  	<div class="input-append">
						    	<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
						  	</div>
                            <a href="" class="btn btn-default btn-icon glyphicons upload" style="position:relative; bottom: 4px; left: 5px;"><i></i> Tải lên</a>
						</div>
                    </div>
                    	<div id="plImage" class="item hidden">
                    		<div style="float: left; width: 200px; margin-right: 10px;">
                <select size="4" name="Main$ctl00$ctl00$lbImages" id="lbImages" style="height:286px;width:100%;">

</select>
                <input type="hidden" name="Main$ctl00$ctl00$hfImage" id="hfImage" />
            </div>
            <div style="float: left; width: 429px; height: 286px; overflow: hidden;">
                <img id="imgImage" src="/1.jpg" style="height:286px;width:429px;" />
            </div>

                    	</div>
                    </div>
                </div>
                <br /><br /><br /><br /><br />
				</div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<script type="text/javascript">
    jQuery(function () {
        // Initialize
        document.cookie = "Background=#FFFFFF";
        switch (jQuery("[id$='cbBackgroundType']").val()) {
            case "default": break;
            case "color": jQuery('#plColor').removeClass('hidden'); break;
            case "upload": jQuery('#plUpload').removeClass('hidden'); break;
            default: jQuery('#plImage').removeClass('hidden'); break;
        }

        // Events
        jQuery("[id$='cbBackgroundType']").change(function () {
            var cbItem = jQuery(this).find("option:selected");
            if (cbItem != null)
            {
                jQuery('.item').addClass('hidden');
                switch (jQuery(cbItem).val())
                {
                    case "default": break;
                    case "color":
                        jQuery('#plColor').removeClass('hidden');
                        break;
                    case "upload":
                        jQuery('#plUpload').removeClass('hidden');
                        break;
                    default:
                        jQuery('#plImage').removeClass('hidden');
                        var folderName = jQuery(cbItem).val();
                        if (folderName == 'system') folderName = '';
                        jQuery.ajax({
                            type: "GET",
                            dataType: "text",
                            url: '/Admin/Services/GetBackgroundImages.ashx',
                            data: "folderName=" + folderName + "&siteId=72448",
                            success: function (text) {
                                var jsonList = JSON.parse(text);
                                jQuery("[id$='lbImages']").empty();
                                jQuery(jsonList).each(function (i, jsonItem) {
                                    jQuery("<option />", { val: jsonItem.Value, text: jsonItem.Name }).appendTo(jQuery("[id$='lbImages']"));
                                });
                            },
                            error: function (e) { console.log(e.message); }
                        });
                        break;
                }
            }
        });
        jQuery("[id$='lbImages']").change(function () {
            jQuery("[id$='hfImage']").val(jQuery(this).val());
            jQuery("[id$='imgImage']").attr('src', jQuery(this).val());
        });
        jQuery("[id$='lbImages']").click(function () {
            jQuery("[id$='hfImage']").val(jQuery(this).val());
            jQuery("[id$='imgImage']").attr('src', jQuery(this).val());
        });
    });
</script>