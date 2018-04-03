
<form class="form-signin" id="validateSubmitForm" name="myForm" method="post">
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">ĐĂNG NHẬP</div>
            <div class="loginbox-social">
                <div class="social-title ">Đăng nhập với tài khoản mạng xã hội</div>
                <div class="social-buttons">
                    <a href="" class="button-facebook">
                        <i class="social-icon fa fa-facebook"></i>
                    </a>
                    <a href="" class="button-twitter">
                        <i class="social-icon fa fa-twitter"></i>
                    </a>
                    <a href="" class="button-google">
                        <i class="social-icon fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">Hoặc</div>
            </div>
            <div class="loginbox-textbox">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Tên đăng nhập"/>
                </div>
            </div>
            <div class="loginbox-textbox">
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu"/>
                </div>
            </div>
            <div class="loginbox-forgot">
                <a href="">Quên mật khẩu?</a>
            </div>

            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Đăng nhập">
            </div>
            <div class="loginbox-signup">
                <a href="account/register.html">Đăng Ký?</a>
            </div>
        </div>
    </div>
    <input type="hidden" name="hidden" value="login"/>
</form>

<script type="text/javascript">
    $(function () {
        $("#validateSubmitForm").bootstrapValidator({
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: "Tên đăng nhập không được bỏ trống"
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Mật khẩu không được bỏ trống'
                        }
                    }
                }
            }
        });
    });
</script>