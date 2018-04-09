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
                            <div class="well invoice-container">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3 class="">
                                            <i class="fa fa-check"></i>
                                            Customer Invoice
                                        </h3>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6>From: Beyond Admin</h6>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        Romulan Empire
                                                    </li>
                                                    <li>admiral.valdore@theempire.uni</li>
                                                    <li>5151 Pardek Memorial Way</li>
                                                    <li>Paris France</li>
                                                    <li>888-555-2311</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-xs-offset-2 text-right">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6>To : John Doe</h6>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        Romulan Empire
                                                    </li>
                                                    <li>United Federation of Planets</li>
                                                    <li>president.roth@ufop.uni</li>
                                                    <li>2269 Elba Lane</li>
                                                    <li>000-555-9988</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- / end client details section -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><h5 class="no-margin-bottom">Service</h5></th>
                                            <th><h5 class="no-margin-bottom">Description</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Hrs/Qty</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Rate/Price</h5></th>
                                            <th><h5 class="no-margin-bottom text-center">Sub Total</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Article</td>
                                            <td><a href="#">Title of your article here</a></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">$200.00</td>
                                            <td class="text-center">$200.00</td>
                                        </tr>
                                        <tr>
                                            <td>Template Design</td>
                                            <td><a href="#">Details of project here</a></td>
                                            <td class="text-center">10</td>
                                            <td class="text-center">75.00</td>
                                            <td class="text-center">$750.00</td>
                                        </tr>
                                        <tr>
                                            <td>Development</td>
                                            <td><a href="#">WordPress Blogging theme</a></td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">50.00</td>
                                            <td class="text-center">$250.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="invisible bg-snow"></td>
                                            <td class="text-center">Sub Total</td>
                                            <td class="text-center">$1200.00 </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="invisible bg-snow"></td>
                                            <td class="text-center">TAX</td>
                                            <td class="text-center">N/A</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="invisible bg-snow"></td>
                                            <td class="text-center"><strong>Total</strong></td>
                                            <td class="text-center "><strong>$1200.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="wide" />
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6>Bank details</h6>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        Your Name: John Doe
                                                    </li>
                                                    <li>Bank Name: Example Bank</li>
                                                    <li>SWIFT : 000-111-234</li>
                                                    <li>Account Number : 22-33-44-009</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="span7">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h6>Contact Details</h6>
                                                </div>
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>
                                                            Email : you@example.com
                                                        </li>
                                                        <li>Mobile : 888-555-2311</li>
                                                        <li>Email  : <a href="">yourname@mail.com</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <hr class="wide" />
                                <div class="invoice-notes">
                                    <h5>Notes &amp; Information:</h5>
                                    <p>This invoice contains a incomplete list of items destroyed by the Federation ship Enterprise on Startdate 5401.6 in an unprovked attacked on a peaceful &amp; wholly scientific mission to Outpost 775.</p>
                                    <p>The Romulan people demand immediate compensation for the loss of their Warbird, Shuttle, Cloaking Device, and to a lesser extent thier troops.</p>
                                    <p>Failure to provide adequate compensation for the above losses will result in an immediate increase in Neutral Zone patrols &amp; a formal complaint will be filed in the form of increased aggresion on human populated worlds within the neutral zone.</p>
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
