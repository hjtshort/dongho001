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
                
                    <h4 class="heading glyphicons phone"><i></i>Hỗ trợ trực tuyến</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                            <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                            <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="sitesetting/support/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
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
						<br>
						<p class="muted">Nhóm<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<select name="ddlGroupId" id="ddlGroupId" class="span4" onchange="javascript:OnChangeType();">
	<option value="Yahoo">Yahoo</option>
	<option value="Skype">Skype</option>
	<option value="Gtalk">Gtalk</option>

</select>
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn nhóm công cụ hỗ trợ trực tuyến: yahoo, skype hoặc Gtalk"></span><img id="imgImage" />
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Nickname<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tên của địa chỉ Yahoo Messenger, Gtalk hay Skype bạn dùng để hỗ trợ"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tên hiển thị</p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tên, chức danh, hay bộ phận hỗ trợ ... sẽ hiển thị tại mục hỗ trợ trên website"></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Điện thoại</p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Hiển thị Số điện thoại của người hỗ trợ khi nhập thông tin này."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Email</p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span4" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Hiển thị Email của người hỗ trợ khi nhập thông tin này."></span>
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid" id="pYahooImage">
					<div class="span2">	
						<p class="muted">Ảnh</p>
					</div>
					<div class="span9">
                       <select name="ddlYahooImage" id="ddlYahooImage" multiple="multiple" style="width: 270px; height: 100px;" onchange="javascript:OnChangeYahooImage();" onclick="javascript:OnChangeYahooImage();">
                            <option selected="selected" value="1">Ảnh 1</option>
                            <option value="2">Ảnh 2</option>
                            <option value="3">Ảnh 3</option>
                            <option value="4">Ảnh 4</option>
                            <option value="5">Ảnh 5</option>
                            <option value="6">Ảnh 6</option>
                            <option value="7">Ảnh 7</option>
                            <option value="8">Ảnh 8</option>
                            <option value="9">Ảnh 9</option>
                            <option value="10">Ảnh 10</option>
                            <option value="11">Ảnh 11</option>
                            <option value="12">Ảnh 12</option>
                            <option value="13">Ảnh 13</option>
                            <option value="14">Ảnh 14</option>
                            <option value="15">Ảnh 15</option>
                            <option value="16">Ảnh 16</option>
                            <option value="17">Ảnh 17</option>
                            <option value="18">Ảnh 18</option>
                            <option value="19">Ảnh 19</option>
                            <option value="20">Ảnh 20</option>
                            <option value="21">Ảnh 21</option>
                            <option value="22">Ảnh 22</option>
                            <option value="23">Ảnh 23</option>
                            <option value="24">Ảnh 24</option>
                        </select>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn icon cho mục hỗ trợ, click chuột trái để xem hình ảnh hiển thị của icon.(Áp dụng với kiểu hiển thị ảnh lớn)"></span>
						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid" id="pSkypeImage">
					<div class="span2">	
						<p class="muted">Ảnh</p>
					</div>
					<div class="span9">
                       <select name="ddlSkypeImage" id="ddlSkypeImage" class="TextInput" onchange="javascript:OnChangeSkypeImage();" style="width:285px;">
                            <option value="<?php echo $template_admin; ?>/html/images/iconSkype/skype-non-text.png">Ảnh 1</option>
                            <option value="<?php echo $template_admin; ?>/html/images/iconSkype/skype-text.png">Ảnh 2</option>
                    
                        </select>
                        &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn icon cho mục hỗ trợ, click chuột trái để xem hình ảnh hiển thị của icon.(Áp dụng với kiểu hiển thị ảnh lớn)"></span>
						<div class="separator"></div>
					</div>
				</div>
                
                <div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Thứ tự</p>
					</div>
					<div class="span4"><br>
						<input type="text" id="inputTitle" class="span2" value="" placeholder="">
<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Thứ tự hiển thị của người hỗ trợ trên module."></span>
						<div class="separator"></div>
					</div>
				</div>
	</div>      
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<script type="text/javascript">
jQuery(document).ready(function() { OnChangeType(); });
function OnChangeType() {
    var group = document.getElementById('ddlGroupId').value;
    if (group == "Yahoo") {
        document.getElementById('pYahooImage').style.display = '';
        document.getElementById('pSkypeImage').style.display = 'none';

        OnChangeYahooImage();
    }
    else {
        if (group == "Skype") {
            document.getElementById('pYahooImage').style.display = 'none';
            document.getElementById('pSkypeImage').style.display = '';

            OnChangeSkypeImage();
        }
        else {
            document.getElementById('pYahooImage').style.display = 'none';
            document.getElementById('pSkypeImage').style.display = 'none';

            document.getElementById('imgImage').src = "";
        }
    }
}
function OnChangeYahooImage(){
    var yahoo = document.getElementById('ddlYahooImage').value;
    var image = document.getElementById('imgImage');
    image.src = '<?php echo $template_admin; ?>/html/images/iconYahoo/' + yahoo + '.gif';
}
function OnChangeSkypeImage() {
    var skype = document.getElementById('ddlSkypeImage').value;
    var image = document.getElementById('imgImage');
    image.src = skype;
}
</script>