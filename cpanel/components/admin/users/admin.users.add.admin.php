<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); 
$myprocess = new process;
$data=$myprocess->get_group_function_list();
?>
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Thêm tài khoản mới</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="admin/users/view.html" class="btn btn-sky shiny">Hủy</a>
                <button type="submit" class="btn btn-sky shiny">Lưu</button>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-sm-8 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Thông tin cá nhân</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand blue"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus blue"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">                                        
                                    <div class="form-group">

                                        <label for="inputTitle">Họ đệm <span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Họ và chữ lót tên người được cấp phát tài khoản"></i></label>
                                        <div>
                                            <input name="firstname" type="text" id="inputTitle" class="form-control" value="Nguyễn">
                                            <?php if(isset($_SESSION['validator']['firstname'])) echo $_SESSION['validator']['firstname']; ?> 


                                        </div>
                                    </div>
                                        <div class="form-group">

                                        <label for="inputTitle">Tên  <span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Tên người được cấp phát tài khoản"></i></label>
                                        <div>
                                            <input name="lastname" type="text" id="inputTitle" class="form-control" value="chipu">
                                            <?php if(isset($_SESSION['validator']['lastname'])) echo $_SESSION['validator']['lastname']; ?> 

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Địa chỉ Email<span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Địa chỉ Email của tài khoản được cấp phát"></i></label>
                                        <div>
                                            <input name="email" type="text" id="inputTitle" class="form-control" value="chipuu@gmail.com">
                                            <?php if(isset($_SESSION['validator']['email'])) echo $_SESSION['validator']['email']; ?> 
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Facebook<span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Địa chỉ Email của tài khoản được cấp phát"></i></label>
                                        <div>
                                            <input name="facebook" type="text" id="inputTitle" class="form-control" value="/caigido">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Giới tính <span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Giới tính của tài khoản được cấp phát"></i></label>
                                        <div>
                                            <select id="gender" name="gender" class="span5">
                                                <option value="NAM">Nam</option>
                                                <option value="NU">Nữ</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Địa chỉ <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Địa chỉ của tài khoản được cấp phát"></i></label>  
                                        <div>
                                            <textarea name="address" id="address" class="span6" rows="2" style="width:50%;">Cần Thơ</textarea>
                                            <?php if(isset($_SESSION['validator']['address'])) echo $_SESSION['validator']['address']; ?> 
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Số điện thoại<span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Số điện thoại của tài khoản được cấp phát"></i></label>  
                                        <div>
                                            <input name="phone" type="text" id="inputTitle" class="form-control" value="0121111111">
                                            <?php if(isset($_SESSION['validator']['phone'])) echo $_SESSION['validator']['phone']; ?> 
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Phân quyền người sử dụng, cho phép bạn giới hạn những chức năng mà người dùng có thể truy cập đến.</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand blue"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus blue"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">   
                                    <div class="form-group">

                                        <label for="inputTitle">Nhóm quyền <span class="text-danger">*</span> <i
                                                    class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Thông tin về Yahoo Messenger của khách hàng"></i></label>
                                        <div>
                                            <select name="ddlRoleTypes" id="ddlRoleTypes" class="TextInput"  style="width:285px;">
                                                <option selected="selected" value="0">-- Nhóm quyền --</option>  
                                                <?php  foreach($data as $value){ ?>                      
                                                <option value="<?php echo $value['Id']; ?>"><?php echo $value['tennhom']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if(isset($_SESSION['validator']['ddlRoleTypes'])) echo $_SESSION['validator']['ddlRoleTypes']; ?> 

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Quản trị hệ thống </label>
                                            <div>
                                                <div class="BorderListbox">                                                                                                       
                                            
                                                    <?php 
                                                      $result1 = $myprocess->get_function_list(1)->fetchAll(); 
                                                      foreach($result1 as $value){
                                                     ?>
                                                       
                                                       <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="colored-success"  value="<?php echo $value['Id'] ?>" name="chucnang[]">
                                                                <span class="text"><?php echo $value['chucnang'] ?></span>
                                                            </label>
                                                        </div>
                                                        
                                                      <?php } ?>
                                              
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Quản lý bán hàng </label>
                                            <div>
                                                <div class="BorderListbox ql">                                                                                                       
                                                    
                                                    <?php 
                                                      $result2 = $myprocess->get_function_list(2)->fetchAll(); 
                                                      foreach($result2 as $value){
                                                     ?>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="colored-success"  value="<?php echo $value['Id'] ?>" name="chucnang[]">
                                                                <span class="text"><?php echo $value['chucnang'] ?></span>
                                                            </label>
                                                        </div>
                                                      
                                                      <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Quản lý nội dung </label>
                                            <div>
                                                <div class="BorderListbox nd">                                                                                                       
                                                  
                                                    <?php 
                                                      $result3 = $myprocess->get_function_list(3)->fetchAll(); 
                                                      foreach($result3 as $value){
                                                     ?>
                                                      
                                                      <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="colored-success"  value="<?php echo $value['Id'] ?>" name="chucnang[]">
                                                                <span class="text"><?php echo $value['chucnang'] ?></span>
                                                            </label>
                                                        </div>
                                                     
                                                      <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="inputTitle">Nhân viên bán hàng </label>
                                            <div>
                                                <div class="BorderListbox bh">                                                                                                       
                                                 
                                                    <?php 
                                                      $result4 = $myprocess->get_function_list(4)->fetchAll(); 
                                                      foreach($result4 as $value){
                                                     ?>
                                                      
                                                      <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="colored-success"  value="<?php echo $value['Id'] ?>" name="chucnang[]">
                                                                <span class="text"><?php echo $value['chucnang'] ?></span>
                                                            </label>
                                                        </div>
                                                      
                                                      <?php } ?>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Tài khoản</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body widget-body-white">
                                <div class="form-group">

                                    <label for="inputTitle">Tên đăng nhập <span class="text-danger">*</span> <i
                                                class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                data-placement="right"
                                                data-original-title="Tên tài khoản đăng nhập được cấp phát"></i></label>
                                    <div id="check">
                                        <input name="username" type="text" id="inputTitle" class="form-control checkid">


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Mật khẩu <span class="text-danger">*</span></label>
                                    <div>
                                        <input name="password" type="text" id="inputTitle" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                    <div>
                                        <input name="confirm_password" type="text" id="inputTitle" class="form-control">
                                    </div>
                                </div>
                            </div>                                  
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="news.add"/>
        <input type="hidden" name="act" value="save"/>
        <input type="hidden" name="hdRoles" id="hdRoles" />
        <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y");?>" />

    </form>
    <!-- /Page Body -->


<script type="text/javascript">
$('#ddlRoleTypes').on('change', function () {
    if(this.value==1)
        $('.BorderListbox').find('input[type=checkbox]').prop('checked', true);
    else if(this.value==2){
        $('.BorderListbox').find('input[type=checkbox]').prop('checked', false);
        $('.ql').find('input[type=checkbox]').prop('checked', true);
        $('.bh').find('input[type=checkbox]').prop('checked', true);
    }
    else if(this.value==3){
        $('.BorderListbox').find('input[type=checkbox]').prop('checked', false);
        $('.nd').find('input[type=checkbox]').prop('checked', true);
    }
    else if(this.value==4){
        $('.BorderListbox').find('input[type=checkbox]').prop('checked', false);
        $('.bh').find('input[type=checkbox]').prop('checked', true);
    }else
    {
        $('.BorderListbox').find('input[type=checkbox]').prop('checked', false);
    }

});
    $.validator.setDefaults(
        {
            submitHandler: function (form) {
                form.submit();
            },
            showErrors: function (map, list) {
                this.currentElements.parents('label:first, .controls:first').find('.error').remove();
                this.currentElements.parents('.row-fluid:first').removeClass('error');

                $.each(list, function (index, error) {
                    var ee = $(error.element);
                    var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');

                    ee.parents('.row-fluid:first').addClass('error');
                    eep.find('.error').remove();
                    eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
                });
                //refreshScrollers();
            }
        });

    $(function () {
        // validate signup form on keyup and submit
        $("#validateSubmitForm").bootstrapValidator({
            fields: {
                "firstname": {
                    validators: {
                        notEmpty: {
                            message: "Họ không được bỏ trống"
                        }
                    }
                },
                "lastname": {
                    validators: {
                        notEmpty: {
                            message: "Họ không được bỏ trống"
                        }
                    }
                },
                "username": {
                    validators: {
                        notEmpty: {
                            message: "Tài khoản không được bỏ trống"
                        }
                    }
                },
                "password": {
                    validators: {
                        notEmpty: {
                            message: "Mật khẩu không được bỏ trống"
                        }
                    }
                },
                'email': {
                    validators: {
                        notEmpty: {
                            message: 'Email không được để trống'
                        }
                    }
                },
                'address': {
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ không được để trống'
                        }
                    }
                },
                'phone': {
                    validators: {
                        notEmpty: {
                            message: 'Phone không được để trống'
                        },
                        stringLength: {
                            min: 10,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số ",
							max: 11,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số "
                        }
                    }
                }
                

            }
        });
    });

</script>


</script>
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
