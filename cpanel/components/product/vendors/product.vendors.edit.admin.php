<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); 
$url=$func->get_url('1|2|3|id');
$myprocess = new process(); 
$data=$myprocess->get_value($url['id']);     
?>
<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Cập nhật thông tin nhà sản xuất</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="product/vendors/view.html" class="btn btn-sky shiny">Hủy</a>
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
                                    <span class="widget-caption">Thông tin nhà sản xuất</span>
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

                                        <label for="inputTitle">Nhà sản xuất <span class="text-danger">*</span></label>
                                        <div>
                                            <input name="nhasanxuat" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['nhasanxuat']; ?>">
											<?php if(isset($_SESSION['validator']['nhasanxuat'])) echo $_SESSION['validator']['nhasanxuat']; ?>

                                        </div>
                                    </div>
									<div class="form-group">

										<label for="inputTitle">Điện thoại</label>  
										<div>
											<input name="dienthoai" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['sodienthoai']; ?>">
											<?php if(isset($_SESSION['validator']['dienthoai'])) echo $_SESSION['validator']['dienthoai']; ?>
										</div>
									</div>
                                    <div class="form-group">

                                        <label for="inputTitle">Địa chỉ</label>
                                        <div>
                                            <input name="diachi" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['diachi']; ?>">
											<?php if(isset($_SESSION['validator']['diachi'])) echo $_SESSION['validator']['diachi']; ?>	

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="inputTitle">Email</label>
                                        <div>
                                            <input name="email" type="text" id="inputTitle" class="form-control" value="<?php echo $data[0]['email']; ?>">
											<?php if(isset($_SESSION['validator']['email'])) echo $_SESSION['validator']['email']; ?>

                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="news.edit"/>
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
                'nhasanxuat': {
                    validators: {
                        notEmpty: {
                            message: "Nhà sản xuất không được bỏ trống"
                        }
                    }
                },
                'dienthoai': {
                    validators: {
                        notEmpty: {
                            message: 'Số điện thoại không được để trống'
                        },
						stringLength: {
                            min: 10,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số",
							max: 11,
                            message: "Số điện thoại chỉ được 10 hoặc 11 số"
                        }
                    }
                },
				'diachi': {
                    validators: {
                        notEmpty: {
                            message: "Địa chỉ không được để trống"
                        }
                    }
                },
				'email': {
                    validators: {
                        notEmpty: {
                            message: "Email không được để trống"
                        }
                    }
                },
            }
        });
    });

</script>

<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
