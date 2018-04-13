<!-- Start Content -->
<div id="login">
    <form class="form-signin" id="validateSubmitForm" name="myForm" method="post">
        <h2 class="glyphicons unlock form-signin-heading"><i></i> Đăng nhập</h2>
        <div class="uniformjs">
        
            <div class="row-fluid">                
                <div class="controls">
                    <input type="text" id="username" name="username" class="input-block-level" placeholder="Tên đăng nhập">                       
                </div>
                <div class="separator"></div>               
            </div>
            
            <div class="row-fluid">                
                <div class="controls">
                    <input type="password" id="password" name="password" class="input-block-level" placeholder="Mật khẩu">                       
                </div>
                <div class="separator"></div>               
            </div>
                       
            <label class="checkbox"><input type="checkbox" value="remember-me">Nhớ mật khẩu</label>
        </div>
        <button class="btn btn-large btn-primary" type="submit">Đăng nhập</button>
        <input type="hidden" name="hidden" value="login" />
    </form>
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
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			messages: {				
				username: {
					required: "Tên đăng nhập không được bỏ trống",
					minlength: "Tên đăng nhập phải lớn hơn 2 ký tự"
				},
				password: {
					required: "Mật khẩu không được bỏ trống",
					minlength: "Mật khẩu phải lớn hơn 5 ký tự"
				}
			}
		});					
	});													
</script> 