<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
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
                        <li class="active"><a href="#settingwebtab" data-toggle="tab" class="glyphicons cogwheel"><i></i>Cấu hình website</a></li>
                        <li><a href="#settinginfotab" data-toggle="tab" class="glyphicons message_plus"><i></i>Thông tin liên hệ</a></li>
                        <li><a href="#settingviewtab" data-toggle="tab" class="glyphicons show_big_thumbnails"><i></i>Cấu hình hiển thị</a></li>
                        <li><a href="#settingdomaintab" data-toggle="tab" class="glyphicons display"><i></i>Cấu hình tên miền</a></li>
                        <li><a href="#settinganalytictab" data-toggle="tab" class="glyphicons link"><i></i>Cài đặt Google Analytics</a></li>
                    </ul>
                </div>
                <div class="widget-body" style="padding: 20px;">
                    <div class="tab-content">
                    
                        <!-- Thông tin chung -->
                        <div class="tab-pane active" id="settingwebtab">
                            <!--------------------------------------->
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label">Tên website </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <label class="important"><strong>Web Tiện Ích</strong></label>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label">Mã website </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <label class="important"><strong>234678</strong></label>
                                    </div>
                                    <div class="separator"></div>                            
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label">Ngày tạo </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <label class="important"><strong>06/06/2014</strong></label>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="site_status">Hoạt động website</label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <div class="groupcheckbox">
                                            <input <?php if( $conf['app']['site_status'] ) { echo "checked"; } ?> value="1" type="checkbox" class="checkbox" name="site_status" id="site_status" onclick="javascript:Issitestatus();"/> Hoạt động
                                            <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn tình trạng website cho phép hoạt động hay tạm dừng."></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row-fluid" id="pSiteCloseContent" style="display:none">
                                <div class="span3">	
                                    <label class="control-label" for="keyword">Nội dung bảo trì </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <textarea id="site_close_msg" name="site_close_msg" class="span6" rows="3"><?= $conf['app']['site_status']; ?></textarea>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung thông báo bảo trì website"></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                               
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="website_title">Tiêu đề <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input value="<?= $conf['app']['website_title']; ?>" type="text" id="website_title" name="website_title" class="span7" >
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung tiêu đề website. Ví dụ một website chuyên bán mỹ phẩm có thể nhập tiêu đề như sau: Mỹ phẩm | Mỹ phẩm giá gốc | Mỹ phẩm nhau cừu"></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>                                        
                                
                            <div class="row-fluid">
                                <div class="span3">	
                                    <label class="control-label" for="keyword">Từ khóa <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <textarea id="keyword" name="keyword" class="span7" rows="3"><?= $conf['app']['keyword']; ?></textarea>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung các từ khóa bạn muốn SEO trên google vào"></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="description">Mô tả <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <textarea id="description" name="description" class="span7" rows="3"><?= $conf['app']['description']; ?></textarea>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập nội dung miêu tả về website và sản phẩm vào, ví dụ như website bán mỹ phẩm có thể nhập mô tả như sau: mỹ phẩm giá gốc, Mỹ phẩm giá gốc giúp chị em chăm sóc da, Làm Sạch, Dưỡng da cơ bản,  trị nám, Trị mụn, Trắng da…"></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>                        
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="email_admin">Email quản trị </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input value="<?= $conf['app']['email_admin']; ?>" type="text" id="email_admin" name="email_admin" class="span7">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tất cả các liên hệ hay đơn đặt hàng của khách hàng sẽ được gửi vào hệ thống quản trị website đồng thời đến email quản trị, và email quản trị này có thể thay đổi."></span>
                                        <div style="font-style: italic;">(Các email phân cách nhau bởi dấu '<strong style="color: #F00;">;</strong>')</div>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="separator"></div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="page_default">Trang mặc định </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <select class="span3" id="page_default" name="page_default">
                                            <?php 
                                                $page_default = array(		
                                                    array("1", "Trang chủ"),
                                                    array("2", "Tin tức"),
                                                    array("3", "Chi tiết sản phẩm")
                                                );
                                            	for($i=0; $i < count($page_default); $i++){ ?>
                                                    <option <?php if( $page_default[$i][0] == $conf['app']['page_default'] ) { echo "selected"; } ?> value="<?= $page_default[$i][0]; ?>"><?= $page_default[$i][1]; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn trang đầu tiên hiện ra khi người dùng truy cập vào địa chỉ trang web"></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="default_language">Ngôn ngữ mặc định </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <select class="span3" id="default_language" name="default_language">                                           
                                            <?php 
                                                $default_language = array(		
                                                    array("vi-VN", "Việt Nam"),
                                                    array("en-US", "English")
                                                );
                                            	for($i=0; $i < count($default_language); $i++){ ?>
                                                    <option <?php if( $default_language[$i][0] == $conf['app']['default_language'] ) { echo "selected"; } ?> value="<?= $default_language[$i][0]; ?>"><?= $default_language[$i][1]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <label class="control-label" for="www_redirect">Chuyển hướng www </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <select class="span3" id="www_redirect" name="www_redirect">
                                        	<?php 
                                                $www_redirect = array(		
                                                    array("-1", "Không chuyễn"),
                                                    array("www", "Chuyển hướng từ không www sang www"),
													array("non-www", "Chuyển hướng từ www sang không www")
                                                );
                                            	for($i=0; $i < count($www_redirect); $i++){ ?>
                                                    <option <?php if( $www_redirect[$i][0] == $conf['app']['www_redirect'] ) { echo "selected"; } ?> value="<?= $www_redirect[$i][0]; ?>"><?= $www_redirect[$i][1]; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <label class="control-label" for="smart_search">Sử dụng tìm kiếm thông minh </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <select class="span3" id="smart_search" name="smart_search">                                           
                                            <?php 
                                                $smart_search = array(		
                                                    array("False", "Không"),
                                                    array("True", "Có")
                                                );
                                            	for($i=0; $i < count($smart_search); $i++){ ?>
                                                    <option <?php if( $smart_search[$i][0] == $conf['app']['smart_search'] ) { echo "selected"; } ?> value="<?= $smart_search[$i][0]; ?>"><?= $smart_search[$i][1]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="settinginfotab">
                           <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="company_name">Tên công ty <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="company_name" name="company_name" class="span6" value="<?= $conf['app']['company_name']; ?>" >
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền nội dung tên công ty hiển thị trên phần Liên hệ của website."></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="slogan">Slogan <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="slogan" name="slogan" class="span6" value="<?= $conf['app']['slogan']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Điền nội dung Slogan của công ty"></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="address">Địa chỉ <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="address" name="address" class="span6" value="<?= $conf['app']['address']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện liên hệ của website."></span>
                                    </div>                            
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3"> 
                                    <label class="control-label" for="phone">Số điện thoại <span class="required">*</span></label>                         
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="phone" name="phone" class="span3" value="<?= $conf['app']['phone']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện thoại hiển thị trong phần Liên hệ của website."></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="fax">FAX </label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="fax" name="fax" class="span3" value="<?= $conf['app']['fax']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Fax, hiển thị trong phần Liên hệ của website."></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="email">Email <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="email" name="email" class="span3" value="<?= $conf['app']['email']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email, hiển thị trong phần Liên hệ của website."></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">
                                    <label class="control-label" for="website">Website <span class="required">*</span></label>
                                </div>
                                <div class="span9">
                                    <div class="controls">
                                        <input type="text" id="website" name="website" class="span3" value="<?= $conf['app']['website']; ?>">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ website(có thể là một website khác), hiển thị trong phần Liên hệ của website."></span>
                                    </div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="tab-pane" id="settingviewtab">
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
                        
                        <div class="tab-pane" id="settingdomaintab">
                    
                            <div class="row-fluid">                
                                <p>Nhập tên miền bạn muốn sử dụng cho website. Nếu bạn chưa có tên miền riêng, có thể đăng ký mua tên miền <a href="http://www.webtienich.vn/dang-ky-ten-mien.html" target="_blank">tại đây</a>.</p>
                                <div class="separator bottom"></div>
                                
                                <div class="span1"><strong>Tên miền:</strong></div>                            
                                <div class="span10">
                                    <div class="groupcheckbox">
                                        <input type="text" class="span4" name="add_namesite" id="add_namesite">
                                        <a style="margin-top:-8px;" class="btn-action glyphicons circle_plus btn-success" title="Thêm mới tên miền"><i></i></a>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Trỏ tên miền bạn muốn sử dụng bằng cách gõ tên miền vào ô Tên miền sau đó click vào dấu "+" để thêm tên miền"></span>
                                    </div>
                                </div>                                                        
                            </div>
                            
                            <div class="row-fluid">                        
                                <table class="table table-bordered table-striped" style="width: 58%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 7%;" class="center">#</th>
                                           <th style="width: 79%;">Tền miền</th>
                                            <th style="width: 13%;" class="center">Mặc định</th>
                                            <th class="center" style="width: 7%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="selectable">
                                            <td class="center" style="width: 28px;">1</td>
                                           <td class="importan">igooseco.bizwebvietnam.com</td>
                                            <td class="center"><a href="product_edit.html?lang=en" class="btn-action glyphicons ok_2 btn-success"><i></i></a></td>
                                            <td class="center" style="width:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>                                                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane" id="settinganalytictab">
                        
                            <div class="row-fluid">
                                
                                <div class="span9">                               
                                    <div id="cph_Main_ctl00_ctl00_AdvanceSetting" style="display: block;">
                                    	<p>Để tích hợp Google Analytics vào website của bạn, bạn cần thực hiện các bước sau:</p>
                                        <ul>
                                            <li><a href="http://www.google.com/analytics/" target="_blank">Tạo 1 tài khoản Google Analytics</a> và làm theo hướng dẫn để thêm trang web của bạn.</li>
                                            <li>Sao chép mã theo dõi từ Google Analytics vào ô phía dưới</li>
                                            <li>Ấn <strong>"Lưu"</strong> để Google Analytics được tích hợp vào website của bạn</li>
                                        </ul>
                                        <div class="separator bottom"></div>
                                        <div class="row-fluid">
                                            <div class="span3"><strong>Google Analytics Code:</strong></div>
                                            <div class="span9">
                                                <div class="controls">
                                                    <input type="text" class="span3" name="GACode" id="GACode" value="<?= $conf['app']['ga_code']; ?>">
                                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title=">Đoạn mã Google Analytics, giúp bạn sử dụng một dịch vụ của Google để thống kê, phân tích website."></span>
                                                    <?php 
														if(!empty($_SESSION["validator"]["GACode"])){
															echo $_SESSION["validator"]["GACode"];
														}
													?>
                                                </div>
                                            </div>
                                        </div>                                        
                                        
                                    </div>
                                </div>
                            </div>
    
                        </div>
                                     
                    </div>
                </div>
            </div>
                
        </div>
        <!-- End Content -->
        <input type="hidden" name="hidden" value="sitesetting" />
    </div>
        
	<script type="text/javascript">
        <?php if(!empty($_SESSION["validator"])){ unset($_SESSION["validator"]); } ?>
        
        $.validator.setDefaults(
        {
            submitHandler: function(form) {
                //alert("submitted!");
                //var val = $("input[type=submit][clicked=true]").val();
                //alert(val);
                
                //var btn = $( ":input[type=submit]:focus" );
                //alert(btn.val());
                //$("#validateSubmitForm").submit();
                form.submit();
            },
            showErrors: function(map, list) 
            {
                this.currentElements.parents('label:first, .controls:first').find('.error').remove();
                this.currentElements.parents('.row-fluid:first').removeClass('error');
                
                $.each(list, function(index, error) 
                {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
                    
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
                    website_title: "required",
                    keyword: "required",
                    description: "required",						
                    email_admin: {
                        required: true,
                        email: true
                    }						
                },
                messages: {
                    website_title: "Tiêu đề website không được bỏ trống",
                    keyword: "Từ khoá không được bỏ trống",
                    description: "Mô tả website không được bỏ trống",						
                    email_admin: "Email không được bỏ trống"						
                }
            });							
        });
        Issitestatus();
        function Issitestatus(){
            if(jQuery("[id$=site_status]").attr("checked") == "checked"){
                jQuery("#pSiteCloseContent").hide();
            }
            else{
                jQuery("#pSiteCloseContent").show();
            }
        }
    </script>
        
</form>