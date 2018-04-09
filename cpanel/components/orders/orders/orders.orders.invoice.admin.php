<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); ?>

<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Chi tiết hóa đơn</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="orders/orders/view.html" class="btn btn-sky shiny">Trở về</a>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
        <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="well invoice-container">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3 class="">
                                            <i class="fa fa-list"></i>
                                            Thông tin chi tiết hóa đơn
                                        </h3>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6>Hóa đơn: <?php echo $data[0]['bill_name']; ?></h6>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <!-- <li>Ngày lập: <?php //echo $func-> _formatdate($data[0]['date_create']); ?></li> -->
                                                    <li>Email: <?php echo $data[0]['bill_email']; ?></li>
                                                    <li>Địa chỉ: <?php echo $data[0]['bill_address']; ?></li>
                                                    <li>Điện thoại liên hệ: <?php echo $data[0]['bill_phone']; ?> </li>
                                                    <li>Tổng tiền: <?php echo number_format($data[0]['total'])." VNĐ"; ?></li>
                                                    <li>Ghi chú: <?php echo $data[0]['note']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / end client details section -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><h5 class="no-margin-bottom">Stt</h5></th>
                                            <th><h5 class="no-margin-bottom">Tên sản phẩm</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Số lượng</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Đơn giá</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Thành tiền</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stt=0; 
                                        foreach($data as $key=>$value){
                                            $stt++;
                                            $thanhtien=intval($value['quantity'])*intval($value['giaban']);
                                          ?>
                                        <tr>
                                            <td><?php echo $stt ?></td>
                                            <td><a><?php echo $value['tensanpham'] ?></a></td>
                                            <td class="text-center"><?php echo $value['quantity'] ?></td> 
                                            <td class="text-center"><?php echo number_format($value['giaban']). " VNĐ";  ?></td> 
                                            <td class="text-center"><?php echo number_format($thanhtien)." VNĐ";  ?></td>                                       
                                        </tr>  
                                        <?php }?>                                     
                                    </tbody>
                                </table>
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
