<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Đổi mật khẩu</li>
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
                                    <span class="widget-caption">Thông tin khác</span>
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
										<label for="inputTitle">Mật khẩu cũ </label>
										<div>
											<input name="matkhaucu" type="password" id="inputTitle" class="form-control">
                                            <?php if(isset($_SESSION['validator']['matkhaucu'])) echo $_SESSION['validator']['matkhaucu']; 
                                                  if(isset($_SESSION['error']['0'])) echo $_SESSION['error']['0'];
                                             ?>
										</div>
									</div>   
									<div class="form-group">
										<label for="inputTitle">Mật khẩu mới </label>
										<div>
											<input name="matkhaumoi" type="password" id="inputTitle" class="form-control">
                                            <?php if(isset($_SESSION['validator']['matkhaumoi'])) echo $_SESSION['validator']['matkhaumoi'];  ?>
										</div>
									</div>
									<div class="form-group">

										<label for="inputTitle">Xác nhận mật khẩu mới </label>
										<div>
											<input name="matkhaumoi2" type="password" id="inputTitle" class="form-control">
                                            <?php if(isset($_SESSION['validator']['matkhaumoi2'])) echo $_SESSION['validator']['matkhaumoi2']; 
                                                  if(isset($_SESSION['error']['1'])) echo $_SESSION['error']['1'];
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
        <input type="hidden" name="hidden" value="changpass"/>
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
                'matkhaucu': {
                    validators: {
                        notEmpty: {
                            message: "Mật khẩu cũ không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Mật khẩu cũ phải lớn hơn 5 ký tự"
                        }

                    }
                },
				'matkhaumoi': {
                    validators: {
                        notEmpty: {
                            message: "Mật khẩu mới không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Mật khẩu mới phải lớn hơn 5 ký tự"
                        }

                    }
                },
				'matkhaumoi2': {
                    validators: {
                        notEmpty: {
                            message: "Xác nhận mật khẩu mới không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Xác nhận mật khẩu mới phải lớn hơn 5 ký tự"
                        }

                    }
                }
            }
        });
    });

</script>

<!--Bootstrap Date Range Picker-->
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/moment.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/datetime/daterangepicker.js"></script>

<!-- styles -->
<link href="plugin/fileuploader/css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
<link href="plugin/fileuploader/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">	

<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]); 
    } 
    if(!empty($_SESSION['error']))
    unset($_SESSION['error']);
?>
