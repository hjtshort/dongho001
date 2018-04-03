var siteId;

jQuery(function () {
    // Page_Load
    init();
    installColorPicker();
    installTypeChange();
    installActions();

    jQuery("#option").sortable({
        placeholder: "ui-state-highlight",
        update: function (event, ui) { }
    });

    jQuery(".link-image").fancybox({
        openEffect: 'fade',
        closeEffect: 'fade',
        arrows: false,
        mouseWheel: false
    });

    // Events Handler
    jQuery("[id$='ddlDataType']").change(function () {
        if (jQuery(this).val() == 1) {
            jQuery(".type").hide();
            jQuery(".color-value").hide();
            jQuery(".color-box").hide();
            jQuery(".texture").hide();

            jQuery("#displayType").show();
        }
        else {
            jQuery(".option-item").each(function () {
                var optionvarid = Number(jQuery(this).attr("varid"));
                jQuery("#opttype" + optionvarid).show();
                if (jQuery("#opttype" + optionvarid).val() == 2) {
                    jQuery("#optcolor" + optionvarid).show();
                    jQuery("#optcolorbox" + optionvarid).show();
                    jQuery("#optimage" + optionvarid).hide();
                    jQuery("#optlinkimage" + optionvarid).hide();
                }
                else {
                    jQuery("#optcolor" + optionvarid).hide();
                    jQuery("#optcolorbox" + optionvarid).hide();
                    jQuery("#optimage" + optionvarid).show();
                    if (jQuery("#optlinkimage" + optionvarid).attr("href") != "#") {
                        jQuery("#optlinkimage" + optionvarid).show();
                    }
                }
            });
            jQuery("#displayType").hide();
        }
    });
});
function init() {
    jQuery(".option-item").each(function () {
        var optionvarid = Number(jQuery(this).attr("varid"));
        if (jQuery("#opttype" + optionvarid).val() == 2) {
            jQuery("#optcolor" + optionvarid).show();
            jQuery("#optcolorbox" + optionvarid).show();
            jQuery("#optimage" + optionvarid).hide();
            jQuery("#optlinkimage" + optionvarid).hide();
        }
        else {
            jQuery("#optcolor" + optionvarid).hide();
            jQuery("#optcolorbox" + optionvarid).hide();
            jQuery("#optimage" + optionvarid).show();
            if (jQuery("#optlinkimage" + optionvarid).attr("href") != "#") {
                jQuery("#optlinkimage" + optionvarid).show();
            }
        }
    });

    if (jQuery("[id$='ddlDataType']").val() == 1) {
        jQuery(".type").hide();
        jQuery(".color-value").hide();
        jQuery(".color-box").hide();
        jQuery(".texture").hide();
    }
    else {
        jQuery(".option-item").each(function () {
            var optionvarid = Number(jQuery(this).attr("varid"));
            jQuery("#opttype" + optionvarid).show();
            if (jQuery("#opttype" + optionvarid).val() == 2) {
                jQuery("#optcolor" + optionvarid).show();
                jQuery("#optcolorbox" + optionvarid).show();
                jQuery("#optimage" + optionvarid).hide();
                jQuery("#optlinkimage" + optionvarid).hide();
            }
            else {
                jQuery("#optcolor" + optionvarid).hide();
                jQuery("#optcolorbox" + optionvarid).hide();
                jQuery("#optimage" + optionvarid).show();
                if (jQuery("#optlinkimage" + optionvarid).attr("href") != "#") {
                    jQuery("#optlinkimage" + optionvarid).show();
                }
            }
        });
    }
}
function installTypeChange() {
    jQuery(".option-item").each(function () {
        var optionvarid = Number(jQuery(this).attr("varid"));
        jQuery("#opttype" + optionvarid).change(function () {
            if (jQuery(this).val() == 2) { // color
                jQuery("#optcolor" + optionvarid).show();
                jQuery("#optcolorbox" + optionvarid).show();
                jQuery("#optimage" + optionvarid).hide();
                jQuery("#optlinkimage" + optionvarid).hide();
            }
            else { // texture
                jQuery("#optcolor" + optionvarid).hide();
                jQuery("#optcolorbox" + optionvarid).hide();
                jQuery("#optimage" + optionvarid).show();
                if (jQuery("#optlinkimage" + optionvarid).attr("href") != "#") {
                    jQuery("#optlinkimage" + optionvarid).show();
                }
            }
        });
    });
}
function installColorPicker() {
    jQuery(".option-item").each(function () {
        var optionvarid = Number(jQuery(this).attr("varid"));
        jQuery("#optcolor" + optionvarid).ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).val(hex);
                jQuery(el).ColorPickerHide();
                jQuery("#optcolorbox" + optionvarid).css("background", "#" + hex);
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(this.value);
            },
            onChange: function (hsb, hex, rgb) {
                jQuery("#optcolorbox" + optionvarid).css("background", "#" + hex);
                jQuery("#optcolor" + optionvarid).val(hex);
            }
        }).bind("keyup", function () {
            jQuery(this).ColorPickerSetColor(this.value);
        });
        jQuery("#optcolorbox" + optionvarid).ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).ColorPickerHide();
                jQuery("#optcolorbox" + optionvarid).css("background", "#" + hex);
            },
            onChange: function (hsb, hex, rgb) {
                jQuery("#optcolorbox" + optionvarid).css("background", "#" + hex);
                jQuery("#optcolor" + optionvarid).val(hex);
            }
        });
    });
}
function installActions() {
    jQuery(".option-item").each(function () {
        var optionvarid = Number(jQuery(this).attr("varid"));
        installAppendAction(optionvarid);
        installRemoveAction(optionvarid);

        jQuery("#optimage" + optionvarid).change(function () {
            var image = jQuery(this).val();
            jQuery("#opthiddenimage" + optionvarid).val(image);
        });
    });
}
function installAppendAction(optionvarid) {
    jQuery("#append" + optionvarid).click(function () {
        var virtualid = Number(jQuery("#virtualid").val());
        var datatype = Number(jQuery("[id$='ddlDataType']").val());

        var innerHTML2 =
                    "<select id='opttype" + virtualid + "' name='opttype" + virtualid + "' class='type'>" +
                        "<option value='2'>Màu sắc</option>" +
                        "<option value='3'>Ảnh biểu thị</option>" +
                    "</select>&nbsp;" +
                    "<input type='text' id='optcolor" + virtualid + "' name='optcolor" + virtualid + "' class='color-value' maxlength='6' />&nbsp;" +
                    "<input type='text' id='optcolorbox" + virtualid + "' name='optcolorbox" + virtualid + "' class='color-box' readonly='readonly' />" +
                    "<input type='file' id='optimage" + virtualid + "' name='optimage" + virtualid + "' class='texture' style='display: none;' />" +
                    "<input type='hidden' id='opthiddenimage" + virtualid + "' name='opthiddenimage" + virtualid + "' class='texture' />";

        var innerHTML =
                    "<li class='option-item clear' varid='" + virtualid + "'>" +
                        "<input type='text' id='optname" + virtualid + "' name='optname" + virtualid + "' class='name' />&nbsp;" +
                        (datatype == 1 ? "" : innerHTML2) +
                        "<a id='delete" + virtualid + "' href='javascript:;' title='Xóa giá trị tùy chọn'>" +
                            "<img src='/images/delicon.png' alt='' />" +
                        "</a>" +
                        "<a id='append" + virtualid + "' href='javascript:;' title='Thêm giá trị tùy chọn'>" +
                            "<img src='/images/addicon.png' alt='' />" +
                        "</a>"
        "</li>";

        jQuery("#option").append(innerHTML);

        installAppendAction(virtualid);

        jQuery("#delete" + virtualid).click(function () {
            jQuery(this).parent().fadeTo("fast", 0, function () {
                jQuery(this).slideUp("fast", function () { jQuery(this).remove(); });
            });
        });

        if (datatype == 2) {
            installColorPicker();
            installTypeChange();
            jQuery("#optimage" + virtualid).change(function () {
                var image = jQuery(this).val();
                var id = Number(jQuery(this).attr("id").replace("optimage", ""));
                jQuery("#opthiddenimage" + id).val(image);
            });
        }

        virtualid = virtualid - 1;
        jQuery("#virtualid").val(virtualid);
    });
    return false;
}
function installRemoveAction(optionvarid) {
    jQuery("#delete" + optionvarid).click(function () {
        jQuery(this).parent().fadeTo("fast", 0, function () {
            jQuery(this).slideUp("fast", function () { jQuery(this).remove(); });
        });
        if (optionvarid > 0) {
            var querystring = "{'optionVarId':'" + optionvarid + "'}";
            jQuery.ajax({
                beforeSend: function () { },
                type: "POST",
                url: "/WebServices/OptionService.asmx/DeleteOptionVar",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: querystring,
                success: function (response) {
                    if (response.d == "1") { console.log("Xóa thông tin thành công!"); }
                    else { console.log(response.d); }
                }
            });
        }
    });
    return false;
}