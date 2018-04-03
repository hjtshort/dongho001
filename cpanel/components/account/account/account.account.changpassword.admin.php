<?php defined( '_VALID_MOS' ) or die( include("404.php") );
?>
<div id="wrapper">	
		<div id="content">
		<ul class="breadcrumb">
	<li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
	<li class="divider"></li>
	<li>Online Shop</li>
	<li class="divider"></li>
	<li>Products</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
	<h3 class="glyphicons user"><i></i>Quản lý tài khoản quản trị</h3>
	<div class="buttons pull-right">  
	</div>
	<div class="clearfix"></div>
</div>
<div class="separator bottom"></div>
<div class="widget widget-2 widget-tabs widget-tabs-2 tabs-right border-bottom-none">
	<div class="widget-head">
		<ul>
			<li class="active"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Thiết lập tài khoản</a></li>
			<li class=""><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Tài khoản chi tiết</a></li>
		</ul>
	</div>
</div>
<div class="innerLR">
	
	<form class="form-horizontal">
	<div class="tab-content">
		<div class="tab-pane" id="account-details">
		
			<div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons edit"><i></i>Thông tin cá nhân</h4>
				</div>
				<div class="widget-body" style="padding-bottom: 0;">
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<label class="control-label">Họ</label>
								<div class="controls">
									<input type="text" value="John" class="span10">
									<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tên</label>
								<div class="controls">
									<input type="text" value="Doe" class="span10">
									<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Ngày sinh</label>
								<div class="controls">
									<div class="input-append">
										<input type="text" id="datepicker" class="span12" value="13/06/1988">
										<span class="add-on glyphicons calendar"><i></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="span6">
							<div class="control-group">
								<label class="control-label">Giới tính</label>
								<div class="controls">
									<select class="span12">
										<option>Nam</option>
										<option>Nữ</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tuổi</label>
								<div class="controls">
									<input type="text" value="25" class="input-mini">
								</div>
							</div>
						</div>
					</div>
					<hr class="separator bottom">
					<div class="control-group row-fluid">
						<label class="control-label">Giới thệu bản thân</label>
						<div class="controls">
							<textarea id="mustHaveId" class="wysihtml5 span12" rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
						</div>
					</div>
					<div class="form-actions" style="margin: 0;">
						<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu thay đổi</button>
						<button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Thoát</button>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane active" id="account-settings">
			<div class="widget widget-2">
				<div class="widget-head">
					<h4 class="heading glyphicons settings"><i></i>Thiết lập tài khoản</h4>
				</div>
				<div class="widget-body" style="padding-bottom: 0;">
					<div class="row-fluid">
						<div class="span3">
							<strong>Thai đổi mật khẩu</strong>
							<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
						<div class="span9">
							<label for="inputUsername">Username</label>
							<input type="text" id="inputUsername" class="span10" value="john.doe2012" disabled="disabled">
							<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
							<div class="separator"></div>
									
							<label for="inputPasswordOld">Mật khẩu cũ</label>
							<input type="password" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change">
							<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Để ô nhập rỗng nếu bạn không muốn thai đổi mật khẩu"><i></i></span>
							<div class="separator"></div>
							
							<label for="inputPasswordNew">Mật khẩu mới</label>
							<input type="password" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change">
							<div class="separator"></div>
							
							<label for="inputPasswordNew2">Nhập lại mật khẩu mới</label>
							<input type="password" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change">
							<div class="separator"></div>
						</div>
					</div>
					<hr class="separator bottom">
					<div class="row-fluid">
						<div class="span3">
							<strong>Thông tin liên hệ</strong>
							<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
						<div class="span9">
							<div class="row-fluid">
							<div class="span6">
								<label for="inputPhone">Phone</label>
								<div class="input-prepend">
									<span class="add-on glyphicons phone"><i></i></span>
									<input type="text" id="inputPhone" class="input-large" placeholder="01234567897">
								</div>
								<div class="separator"></div>
									
								<label for="inputEmail">E-mail</label>
								<div class="input-prepend">
									<span class="add-on glyphicons envelope"><i></i></span>
									<input type="text" id="inputEmail" class="input-large" placeholder="contact@mosaicpro.biz">
								</div>
								<div class="separator"></div>
									
								<label for="inputWebsite">Website</label>
								<div class="input-prepend">
									<span class="add-on glyphicons link"><i></i></span>
									<input type="text" id="inputWebsite" class="input-large" placeholder="http://www.mosaicpro.biz">
								</div>
								<div class="separator"></div>
							</div>
							<div class="span6">
								<label for="inputFacebook">Facebook</label>
								<div class="input-prepend">
									<span class="add-on glyphicons facebook"><i></i></span>
									<input type="text" id="inputFacebook" class="input-large" placeholder="/mosaicpro">
								</div>
								<div class="separator"></div>
								
								<label for="inputTwitter">Twitter</label>
								<div class="input-prepend">
									<span class="add-on glyphicons twitter"><i></i></span>
									<input type="text" id="inputTwitter" class="input-large" placeholder="/mosaicpro">
								</div>
								<div class="separator"></div>
								
								<label for="inputSkype">Skype ID</label>
								<div class="input-prepend">
									<span class="add-on glyphicons skype"><i></i></span>
									<input type="text" id="inputSkype" class="input-large" placeholder="mySkypeID">
								</div>
								<div class="separator"></div>
								
								<label for="inputYahoo">Yahoo ID</label>
								<div class="input-prepend">
									<span class="add-on glyphicons yahoo"><i></i></span>
									<input type="text" id="inputYahoo" class="input-large" placeholder="myYahooID">
								</div>
								<div class="separator"></div>
							</div>
							</div>
						</div>
					</div>
					<div class="form-actions" style="margin: 0; padding-right: 0;">
						<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Lưu thay đổi</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	</form>
	
</div>			
  </div>				
</div>	
<?php //} ?>