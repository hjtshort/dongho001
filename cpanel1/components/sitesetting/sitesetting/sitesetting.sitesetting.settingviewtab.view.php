<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<div class="page-body">

<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="." class="glyphicons home"><i></i> Cpanel</a></li>
                <li class="divider"></li>
                <li>Thiết lập cấu hình website</li>
            </ul>
            <div class="separator bottom"></div>
    
            <div class="heading-buttons">
                <h3 class="glyphicons settings"><i></i> Thiết lập cấu hình website</h3>
                <div class="buttons pull-right">
                    <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>
                    <button type="submit" class="btn btn-primary btn-icon glyphicons edit"><i></i>Cập nhật</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="separator bottom"></div>
    
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
                    <ul>
                        <li><a href="./sitesetting/sitesetting/view.html" class="glyphicons cogwheel"><i></i>Cấu hình website</a></li>
                        <li><a href="./sitesetting/sitesetting/view_settinginfotab.html" class="glyphicons message_plus"><i></i>Thông tin liên hệ</a></li>
                        <li><a href="./sitesetting/sitesetting/view_settingmaptab.html" class="glyphicons google_maps"><i></i>Bản đồ</a></li>
                        <li class="active"><a href="./sitesetting/sitesetting/view_settingviewtab.html" class="glyphicons show_big_thumbnails"><i></i>Cấu hình hiển thị</a></li>
                        <li><a href="./sitesetting/sitesetting/view_settingviewinfotab.html" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                        <li><a href="./sitesetting/sitesetting/view_settingurltab.html" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                    </ul>
                </div>
                <div class="widget-body" style="padding: 20px;">
                    <!-- Bộ lọc sản phẩm -->
                    <div class="tab-pane" id="settingviewtTab">
                        <div class="row-fluid">
                            <div class="span3">
                                <label class="control-label" for="text_showbutton" style="width:160px">Text hiển thị nút mua hàng</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" class="span2" value="<?= $_APP['sitesetting']['settingviewtab']['text_showbutton']; ?>" name="text_showbutton" id="text_showbutton">
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="size_imgproduct" style="width:160px">Kích thước ảnh sản phẩm</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizewidth_imgproduct']; ?>" name="sizewidth_imgproduct" id="sizewidth_imgproduct">
                                    &nbsp;x &nbsp;&nbsp;<input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizeheight_imgproduct']; ?>" name="sizeheight_imgproduct" id="sizeheight_imgproduct">&nbsp;rộng x cao
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thay đổi kích thước ảnh sản phẩm."></span>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="size_imgproductdefault" style="width:255px">Kích thước ảnh sản phẩm<br /> 
                                (Chi tiết sản phẩm)</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizewidth_imgproductdefault']; ?>" name="sizewidth_imgproductdefault" id="sizewidth_imgproductdefault">
                                    &nbsp;x &nbsp;&nbsp;<input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizeheight_imgproductdefault']; ?>" name="sizeheight_imgproductdefault" id="sizeheight_imgproductdefaul2">&nbsp;rộng x cao
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="size_imgproductoder" style="width:255px">Kích thước ảnh sản phẩm khác<br />
                                (Chi tiết sản phẩm)</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                <input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizewidth_imgproductoder']; ?>" id="sizewidth_imgproductoder" name="sizewidth_imgproductoder">
                                &nbsp;x &nbsp;&nbsp;<input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizeheight_imgproductoder']; ?>" id="sizeheight_imgproductoder" name="sizeheight_imgproductoder">&nbsp;rộng x cao
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="num_showproduct" style="width:255px">Số lượng sản phẩm cùng loại được hiện thị<br /> 
                                (Chi tiết sản phẩm)</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['num_showproduct']; ?>" name="num_showproduct" id="num_showproduct">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="size_imginfo" style="width:160px">Kích thước ảnh tin tức</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizewidth_imginfo']; ?>" name="sizewidth_imginfo" id="sizewidth_imginfo">
                                    &nbsp;x &nbsp;&nbsp;<input type="text" class="span1" value="<?= $_APP['sitesetting']['settingviewtab']['sizeheight_imginfo']; ?>" name="sizeheight_imginfo" id="sizeheight_imginfo">&nbsp;rộng x cao
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thay đổi kích thước ảnh sản phẩm."></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="view_description" style="width:160px">Hiển thị mô tả ngắn</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">                        
                                    <input type="checkbox" class="checkbox" id="view_description" name="view_description" <?php if(isset($_APP['sitesetting']['settingviewtab']['view_description'])){echo "checked";}?> >&nbsp;
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="view_ratingproduct" style="width:160px">Hiển thị đánh giá sản phẩm</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="checkbox" class="checkbox"  name="view_ratingproduct" id="view_ratingproduct" <?php if(isset($_APP['sitesetting']['settingviewtab']['view_ratingproduct'])){echo "checked";}?>>
                                    &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tích lựa chọn nếu muốn hiển thị các thông tin đánh giá sản phẩm."></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" for="view_pricetranfer" style="width:160px">Hiển thị phí vận chuyển</label>    
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="checkbox" class="checkbox" value="1" name="view_pricetranfer" id="view_pricetranfer" <?php if(isset($_APP['sitesetting']['settingviewtab']['view_pricetranfer'])){echo "checked";}?>>
                                    &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tích lựa chọn nếu muốn hiển thị các thông tin phí vận chuyển."></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" style="width:160px">Hiển thị thông tin số người đã mua</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="checkbox" class="checkbox" value="1" name="view_numbuyer" id="view_numbuyer" <?php if(isset($_APP['sitesetting']['settingviewtab']['view_numbuyer'])){echo "checked";}?>>&nbsp;
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" style="width:200px" for="view_fbcomment">Hiển thị comments Facebook cho sản phẩm</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="checkbox" class="checkbox" value="1" name="view_fbcomment" id="view_fbcomment" <?php if(isset($_APP['sitesetting']['settingviewtab']['view_fbcomment'])){echo "checked";}?>>&nbsp;
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" style="width:200px" for="id_facebook">Facebook ApplicationID</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <input type="text" id="id_facebook" name="id_facebook" class="span3" value="<?= $_APP['sitesetting']['settingviewtab']['id_facebook']; ?>" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <label class="control-label" style="width:200px" for="search_product">Cấu hình tìm kiếm website</label>
                            </div>
                            <div class="span9">
                                <div class="groupcheckbox">
                                    <select class="span3" id="search_product" name="search_product">
                                    <option value="OnlyProd" <?php if ($_APP['sitesetting']['settingviewtab']['search_product'] == 'OnlyProd') echo ' selected="selected"'; ?>>Chỉ t&#236;m kiếm sản phẩm</option>
                                    <option value="OnlyNews" <?php if ($_APP['sitesetting']['settingviewtab']['search_product'] == 'OnlyNews') echo ' selected="selected"'; ?>>Chỉ t&#236;m kiếm tin tức</option>
                                    <option value="BothProdAndNews" <?php if ($_APP['sitesetting']['settingviewtab']['search_product'] == 'BothProdAndNews') echo ' selected="selected"'; ?>>Sản phẩm v&#224; tin tức</option>
                                    </select>&nbsp;
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
        <input type="hidden" name="hidden" value="sitesetting.settingviewtab.add" />
    </div>
            
    <script type="text/javascript">
        <?php if(!empty($_SESSION["message"]["notyfy"])){ ?>
            $(function () {
                func_notyfy("top", "information", "<?= $_SESSION["message"]["notyfy"]; ?>");
            });
        <?php unset($_SESSION["message"]["notyfy"]);} ?>
        
        $.validator.setDefaults(
        {
            submitHandler: function(form) {
                form.submit();
            },
            showErrors: function(map, list) 
            {
                this.currentElements.parents('label:first, .groupcheckbox:first').find('.error').remove();
                this.currentElements.parents('.row-fluid:first').removeClass('error');
                
                $.each(list, function(index, error) 
                {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.groupcheckbox:first');
                    
                    ee.parents('.row-fluid:first').addClass('error');
                    eep.find('.error').remove();
                    eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
                });
                //refreshScrollers();
            }
        });
        
        $(function()
        {
            // validate signup form on keyup and submit
            $("#validateSubmitForm").validate({
                rules: {
                    sizewidth_imgproduct: "required",
                    sizeheight_imgproduct: "required",
                    sizewidth_imgproductdefault: "required",
                    sizeheight_imgproductdefault: "required",
                    sizewidth_imgproductoder: "required",
                    sizeheight_imgproductoder: "required",
                    sizewidth_imginfo: "required",
                    sizeheight_imginfo: "required"
                },
                messages: {
                    sizewidth_imgproduct: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizeheight_imgproduct: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizewidth_imgproductdefault: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizeheight_imgproductdefault: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizewidth_imgproductoder: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizeheight_imgproductoder: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizewidth_imginfo: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống",
                    sizeheight_imginfo: "Kích thước ảnh sản phẩm là số nguyên và không được bỏ trống"						
                }
            });							
        });
        
    </script>
        
</form>
</div>
