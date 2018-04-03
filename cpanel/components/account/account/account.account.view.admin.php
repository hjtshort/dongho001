<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); 
   $data=$profile_process->get_data();
?>
<script language="javascript" type="text/javascript">
 
</script>
<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Quản lý tài khoảng quản trị</li>
                    <!-- <li class="toast-title">Thêm mới</li> -->
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="content/news/view.html" class="btn btn-sky shiny">Hủy</a>
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
                                    <span class="widget-caption">Giới thiệu bản thân</span>
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
								<?php var_dump($_POST); ?>                                    
                                    <div class="form-group">

                                        <label for="inputTitle">Họ</label>
                                        <div>
                                            <input name="ho" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['ho']; ?>">


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Tên </label>
                                        <div>
                                            <input name="ten" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['ten']; ?>">


                                        </div>
                                    </div>
                                        <div class="form-group">

                                        <label for="inputTitle">Địa chỉ</label>
                                        <div>
                                            <input  name="diachi" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['diachi']; ?>">


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Giới tính </label>
                                        <div>
											<select class="span12">
												<option value="NAM" <?php if($data[0]['gioitinh']=="NAM") echo 'selected="selected"'; ?>>Nam</option>
												<option value="NU" <?php if($data[0]['gioitinh']=="NU") echo 'selected="selected"'; ?>>Nữ</option>
											</select>


                                        </div>
                                    </div>  
									<div class="form-group">

										<label for="inputTitle">Phone</label>
										<div>
											<input name="sdt" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['dienthoai']; ?>"  >


										</div>
									</div>
									<div class="form-group">

                                        <label for="inputTitle">E-mail </label>
                                        <div>
                                            <input name="email" type="text" id="inputTitle" class="form-control" placeholder="contact@mosaicpro.biz" value="<?php echo $data[0]['email']; ?>">
                                       
									   
									    </div>
                                    </div>
									<div class="form-group">
                                        <label for="inputTitle">Facebook</label>
                                        <div>
                                            <input name="facebook" type="text" id="inputTitle" class="form-control" placeholder="/mosaicpro">
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-themeprimary">
                                    <span class="widget-caption">Thông tin liên hệ</span>
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
								
									
								                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="edit"/>
        <input type="hidden" name="act" value="save"/>
    </form>
    <!-- /Page Body -->
</div>

<script type="text/javascript">


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
                'ho': {
                    validators: {
                        notEmpty: {
                            message: 'Họ không được bỏ trống'
                        }
                    }
                },
				'ten': {
                    validators: {
                        notEmpty: {
                            message: 'Tên không được bỏ trống'
                        },
						stringLength: {
                            min: 4,
                            message: "Tên phải lớn hơn 4 ký tự"
                        }
                    }
                },
				'diachi': {
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ không được bỏ trống'
                        },
						stringLength: {
                            min: 4,
                            message: "Địa chỉ phải lớn hơn 4 ký tự"
                        }
                    }
                },
				'sdt': {
                    validators: {
                        notEmpty: {
                            message: 'Số điện thoại không được bỏ trống'
                        },
						stringLength: {
                            min: 10,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số ",
							max: 11,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số "
                        }
                    }
                },
				'email': {
                    validators: {
                        notEmpty: {
                            message: 'Email không được bỏ trống'
                        },
						stringLength: {
                            min: 10,
                            message: "Email phải lớn hơn 10 ký tự "
                        }
                    }
                },
				'facebook': {
                    validators: {
                        notEmpty: {
                            message: 'Facebook không được bỏ trống'
                        },
						stringLength: {
                            min: 4,
                            message: "Facebook phải lớn hơn 4 ký tự "
                        }
                    }
                }
				

            }
        });
    });

</script>
<!--Bootstrap Date Picker-->
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-datepicker.js"></script>

<!--Bootstrap Time Picker-->
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/bootstrap-timepicker.js"></script>

<!--Bootstrap Date Range Picker-->
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>

<!-- styles -->
<link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
<link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">

<!-- js -->
<script src="plugin/fileuploader/js/jquery.fileuploader.min.js" type="text/javascript"></script>
<script>

    //--Bootstrap Date Picker--
    $('#datepicker').datepicker();

    //--Bootstrap Time Picker--
    $('#timepicker').timepicker();

</script>
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
