<?php defined('_VALID_MOS') or die(include_once("../../404.php"));

?>

<form id="validateSubmitForm" action="" method="post">
    <div class="register-container animated fadeInDown">
        <div class="registerbox bg-white">
            <div class="registerbox-title">Đăng Ký</div>

            <div class="registerbox-caption ">
              <p>Vui lòng điền thông tin bên dưới</p>
                <?php if(isset($_SESSION["validator"])) foreach ($_SESSION["validator"] as $validator) { echo  $validator;} ?>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="text"  name="title" class="form-control" placeholder="Tên Website"/>
                </div>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="text"  name="username" class="form-control" placeholder="Tài Khoản"/>
                </div>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="password"  name="password" class="form-control" placeholder="Mật Khẩu"/>
                </div>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                           placeholder="Xác Nhận Lại Mật Khẩu"/>
                </div>
            </div>
            <!-- <hr class="wide" />-->
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="email"  class="form-control" name="email" placeholder="Email"/>
                </div>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="text" class="form-control" name="full_name" placeholder="Họ Tên"/>
                </div>
            </div>
            <div class="registerbox-textbox">
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="SĐT"/>
                </div>
            </div>

            <div class="registerbox-textbox no-padding-bottom">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="colored-primary" checked="checked">
                        <span class="text darkgray">Tôi đồng ý với  <a class="themeprimary">Điều khoản Dịch vụ</a> và Chính sách Bảo mật của công ty</span>
                    </label>
                </div>
            </div>
            <div class="registerbox-submit">
                <button type="submit" class="btn btn-primary margin-bottom-20">ĐĂNG KÝ</button>
            </div>
        </div>
        <div class="logobox">
        </div>
    </div>
    <input type="hidden" name="hidden" value="register">
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#validateSubmitForm").bootstrapValidator({
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: "Tên Website không được bỏ trống"
                            },
                            stringLength: {
                                min: 2,
                                message: "Tên Website phải lớn hơn 2 ký tự"
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Tên đăng nhập không được bỏ trống"
                            },
                            stringLength: {
                                min: 2,
                                message: "Tên đăng nhập phải lớn hơn 2 ký tự"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Mật khẩu không được bỏ trống'
                            },
                            stringLength: {
                                min: 6,
                                message: "Mật khẩu phải lớn hơn 6 ký tự"
                            }
                        }
                    },
                    confirmPassword: {
                        validators: {
                            notEmpty: {
                                message: 'Mật khẩu xác nhận không được bỏ trống'
                            },
                            identical: {
                                field: 'password',
                                message: 'Xác nhận mật khẩu chưa đúng'
                            }
                        }
                    },
                    full_name: {
                        validators: {
                            notEmpty: {
                                message: 'Tên không được bỏ trống'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email không được bỏ trống'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Số điện thoại không được bỏ trống'
                            },
                            regexp: {
                                message: 'Số điện thoại chưa chính xác',
                                regexp: '^0(([8-9][0-9]{8})|(1[0-9]{9}))$'
                            }
                        }
                    }
                }
            });
        });
    });

</script>
<?php if(isset($_SESSION["validator"])){ unset($_SESSION["validator"]);} ?>