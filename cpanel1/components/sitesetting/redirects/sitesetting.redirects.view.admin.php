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
                
                    <h4 class="heading glyphicons cogwheel"><i></i>Chuyển hướng 301</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                       		<a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                            <a onclick="javascript:return ToolboxAdd();" id="cph_Main_ctl00_toolbox1_rptAction_lbtAction_1" href="javascript:__doPostBack(&#39;ctl00$cph_Main$ctl00$toolbox1$rptAction$ctl02$lbtAction&#39;,&#39;&#39;)" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Thêm mới</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
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
                	<div id="redirects">
                        <div class="header">
                            <div class="check header-c" style="padding-top: 0px;">
                                <input id="check_item" type="checkbox" name="redirect">
                            </div>
                            <div class="oldpage header-c">
                                <strong>Địa chỉ Url</strong>
                            </div>
                            <div class="newpage header-c">
                                <strong>Chuyển hướng tới</strong>
                            </div>
                            <div class="actions header-c">
                                <strong>Thao tác</strong>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div id="rc">
                            
                            <div class="clear"></div>
                        </div>
                    </div>
				</div>
				</div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<script>
var siteId;
var noTextOldPage = "Kích để nhập địa chỉ URL";
var noTextNewPage = "Kích để nhập URL chuyển tới";
var portalDomainName = 'http://' + window.location.hostname;
/* ************************************************************************************************ */
function Apply(itemIndex, nodeType) {
    if (CheckValidate(itemIndex, nodeType) == false) return;
    var url = '';
    if (nodeType == 1) url = jQuery("#oldpage_input_" + itemIndex).val();
    else url = jQuery("#newpage_input_" + itemIndex).val();
    jQuery.ajax({
        type: "POST",
        url: "/WebServices/RedirectService.asmx/UpdateRedirect",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: "{'itemIndex':'" + itemIndex + "','nodeType':'" + nodeType + "','url':'" + url + "'}",
        success: function (response) {
            if (response.d == "1") {
                alert("Chỉnh sửa thông tin thành công !");
                Refresh(); Cancel();
            }
            else alert(response.d);
        }
    });
}
function Delete(itemIndex) {
    var res = confirm("Chắc chắn xóa thông tin chuyển hướng này ?");
    if (res == true) {
        jQuery.ajax({
            type: "POST",
            url: "/WebServices/RedirectService.asmx/DeleteRedirect",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: "{'itemIndex':'" + itemIndex + "'}",
            success: function (response) {
                if (response.d == "1") {
                    alert("Xóa thông tin thành công !");
                    RemoveRedirectContainer(itemIndex); Refresh();
                }
                else alert(response.d);
            }
        });
    }
}
function Add(itemIndex) {
    var oldPage = jQuery("#oldpage_input_" + itemIndex).val().trim();
    var newPage = jQuery("#newpage_input_" + itemIndex).val().trim();
    if (CheckValidate(itemIndex, 1) == false) return;
    if (CheckValidate(itemIndex, 2) == false) return;
    jQuery.ajax({
        type: "POST",
        url: "/WebServices/RedirectService.asmx/AddNewRedirect",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: "{'oldPage':'" + oldPage + "','newPage':'" + newPage + "'}",
        success: function (response) {
            if (response.d == "1") {
                alert("Thêm mới thông tin thành công !");

                jQuery("#redirect_" + itemIndex + " .check").html("<input type='checkbox' name='redirect' id='check_item_" + itemIndex + "' />");

                jQuery("#redirect_" + itemIndex + " .oldpage").append("&nbsp;<input type='button' onclick='javascript:Apply(" + itemIndex + ", 1);' class='hidden' value='Lưu' id='oldpage_apply_" + itemIndex + "' />");
                jQuery("#redirect_" + itemIndex + " .oldpage").append("&nbsp;<input type='button' onclick='javascript:Cancel();' class='hidden' value='Hủy' id='oldpage_cancel_" + itemIndex + "'>");

                jQuery("#redirect_" + itemIndex + " .newpage").append("&nbsp;<input type='button' onclick='javascript:Apply(" + itemIndex + ", 2);' class='hidden' value='Lưu' id='newpage_apply_" + itemIndex + "' />");
                jQuery("#redirect_" + itemIndex + " .newpage").append("&nbsp;<input type='button' onclick='javascript:Cancel();' class='hidden' value='Hủy' id='newpage_cancel_" + itemIndex + "'>");

                jQuery("#redirect_" + itemIndex + " .actions").html("<a href='/index.htm' target='_blank'>Kiểm tra</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='javascript:void(0);' class='' onclick='javascript:return Delete(" + itemIndex + ");'>Xóa</a>");

                RegisterEvents(); Refresh();
            }
            else alert(response.d);
        }
    });
}
function Cancel() {
    jQuery(".redirect input[type='button']").each(function () {
        jQuery(this).attr("class", "hidden");
    });
}
/* ************************************************************************************************ */
function ToolboxDelete() {
    var isMsg1 = false;
    jQuery(".redirect input[type='checkbox']").each(function (i, cbox) {
        var checked = jQuery(cbox).attr("checked");
        if (checked == "checked") { isMsg1 = true; }
    });
    if(isMsg1 == false) {
        alert("Hãy chọn ít nhất 1 danh mục để thao tác!");
        return false;
    }

    var res = confirm("Chắc chắn xóa các chuyển hướng đã chọn ?");
    if (res == true) {
        var items = '/';
        jQuery(".redirect .check input[type='checkbox']").each(function (i, cbox) {
            var checked = jQuery(cbox).attr("checked");
            if (checked == "checked") { items = items + i + "/"; }
        });
        if (items != '/') {
            jQuery.ajax({
                type: "POST",
                url: "/WebServices/RedirectService.asmx/DeleteRedirects",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: "{'itemIndex':'" + items + "'}",
                success: function (response) {
                    if (response.d == "1") {
                        alert("Xóa thông tin thành công !");
                        jQuery(".redirect .check input[type='checkbox']").each(function (i, cbox) {
                            var checked = jQuery(cbox).attr("checked");
                            if (checked == "checked") { RemoveRedirectContainer(i); }
                        });
                        Refresh();
                    }
                    else alert(response.d);
                }
            });
        }
    }
    return false;
}
function ToolboxAdd() {
    var maxId = jQuery(".redirect").length;
    var newRedirect = "" +
        "<div id='redirect_" + maxId + "' class='redirect'>" +
            "<div class='check item'>&nbsp;</div>" +
            "<div id='oldpage_" + maxId + "' class='oldpage item'>" +
                "<input type='text' id='oldpage_input_" + maxId + "' value='' />" +
            "</div>" +
            "<div id='newpage_" + maxId + "' class='newpage item'>" +
                "<input type='text' id='newpage_input_" + maxId + "' value='" + noTextNewPage + "' />" +
            "</div>" +
            "<div class='actions item'>" +
                "<a href='javascript:void(0);' onclick='javascript:Add(" + maxId + ");'>Cập nhật</a>" +
            "</div>" +
        "</div>";
    jQuery("#rc").append(newRedirect);
    RegisterEvents();
    jQuery("#oldpage_input_" + maxId).focus();
    return false;
}
/* ************************************************************************************************ */
function RemoveRedirectContainer(itemIndex) {
    jQuery("#redirect_" + itemIndex).fadeTo("medium", 0, function () {
        jQuery(this).slideUp("medium", function () { jQuery(this).remove(); });
    });
}
function Refresh() {
    jQuery(".redirect").each(function (i, obj) { jQuery(obj).attr("id", "redirect_" + i); });
    jQuery(".redirect .actions").each(function (i, obj) {
        jQuery(jQuery(obj).find("a")[0]).attr("href", jQuery("#oldpage_input_" + i).val().trim());
    });
}
function IsValidPrefix(url) {
    if (url.substring(0, 1) == "/" || url.substring(0, 7) == "http://" || url.substring(0, 8) == "https://") return true;
    return false;
}
function CheckValidate(itemIndex, nodeType) {
    var oldPage = jQuery("#oldpage_input_" + itemIndex).val().trim();
    var newPage = jQuery("#newpage_input_" + itemIndex).val().trim();
    var urlRegex = new RegExp("/((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)|)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/");
    if (nodeType == 1) {
        if (oldPage == '' || oldPage == noTextOldPage) {
            alert("Xin mời nhập địa chỉ URL !");
            jQuery("#oldpage_input_" + itemIndex).focus();
            return false;
        }
        if (IsValidPrefix(oldPage) == false) {
            alert("URL phải được bắt đầu bằng một dấu gạch chéo (/)");
            jQuery("#oldpage_input_" + itemIndex).focus();
            return false;
        }
        if (oldPage.indexOf("http") != -1) {
            alert("Địa chỉ URL không hợp lệ !");
            jQuery("#oldpage_input_" + itemIndex).focus();
            return false;
        }
        else {
            if (urlRegex.test(portalDomainName + oldPage) == false) {
                alert("Địa chỉ URL không hợp lệ !");
                jQuery("#oldpage_input_" + itemIndex).focus();
                return false;
            }
            else {
                var isOk;
                jQuery(".newpage input[type='text']").each(function (i, tbox) {
                    if (oldPage == jQuery(tbox).val().trim()) {
                        alert("Địa chỉ URL không được giống địa chỉ chuyển hướng đã có !");
                        jQuery("#oldpage_input_" + itemIndex).focus();
                        isOk = false;
                    }
                });
                if (isOk == false) return false;
            }
        }
    }
    if (nodeType == 2) {
        if (newPage == '' || newPage == noTextNewPage) {
            alert("Xin mời nhập địa chỉ chuyển tới !");
            jQuery("#newpage_input_" + itemIndex).focus();
            return false;
        }
        if (IsValidPrefix(newPage) == false) {
            alert("URL phải được bắt đầu bằng một dấu gạch chéo (/), http:// hoặc https://");
            jQuery("#newpage_input_" + itemIndex).focus();
            return false;
        }
        newPage = newPage.replace(portalDomainName, "");
        var isOk;
        jQuery(".oldpage input[type='text']").each(function (i, tbox) {
            if (jQuery(tbox).val().trim() == newPage) {
                alert("Địa chỉ chuyển tới không được giống địa chỉ URL đã có !");
                jQuery("#newpage_input_" + itemIndex).focus();
                isOk = false;
            }
        });
        if (isOk == false) return false;
    }
    return true;
}
function DisableButtons(container) {
    jQuery(".redirect input[type='button']").each(function (i, bt) { 
        jQuery(bt).attr("class", "hidden"); 
    });
}
function EnableButton(container) {
    jQuery(container).find("input[type='button']").each(function (i, bt) {
        jQuery(bt).attr("class", ""); 
    });
}
function RegisterEvents() {
    jQuery(".redirect .oldpage input[type='text']").each(function (i, tbox) {
        jQuery(tbox).focus(function () {
            if (jQuery(this).val() == noTextOldPage) { jQuery(this).val(""); }
            jQuery(this).attr("class", "focus");
            EnableButton(jQuery(this).parent());
        });
        jQuery(tbox).focusout(function () {
            if (jQuery(this).val() == "") { jQuery(this).val(noTextOldPage); }
            setTimeout(function () {
                jQuery(tbox).attr("class", "");
                jQuery(tbox).parent().find("input[type='button']").each(function () {
                    jQuery(this).attr("class", "hidden"); 
                })
            }, 500);
        });
    });
    jQuery(".redirect .newpage input[type='text']").each(function (i, tbox) {
        jQuery(tbox).focus(function () {
            if (jQuery(this).val() == noTextNewPage) { jQuery(this).val(""); }
            jQuery(this).attr("class", "focus");
            EnableButton(jQuery(this).parent());
        });
        jQuery(tbox).focusout(function () {
            if (jQuery(this).val() == "") { jQuery(this).val(noTextNewPage); }
            setTimeout(function () {
                jQuery(tbox).attr("class", "");
                jQuery(tbox).parent().find("input[type='button']").each(function () {
                    jQuery(this).attr("class", "hidden");
                })
            }, 500);
        });
    });
}
/* ************************************************************************************************ */
jQuery(function () {
    RegisterEvents();
    jQuery("#check_item").click(function () {
        var checked = jQuery(this).attr("checked");
        jQuery(".redirect .check input[type='checkbox']").each(function (i, cbox) {
            jQuery(cbox).attr("checked", checked);
        });
    });
});
</script>
