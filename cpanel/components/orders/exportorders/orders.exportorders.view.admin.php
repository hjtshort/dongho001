<?php defined( '_VALID_MOS' ) or die( include("../news/404.php") ); 
  // $myprocess=new orders();
?>
<div class="page-content">
    <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data" >
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
            <div class="buttons-task col-xs-12 col-md-6">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li><i class="fa fa-table"></i></li>
                    <li>Xuất danh sách đơn hàng</li>
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                <a href="content/news/view.html" class="btn btn-sky shiny">Hủy</a>
                <button type="button" id="ajaxne" class="btn btn-sky shiny">Lưu</button>
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
                                    <span class="widget-caption">Xuất danh sách đơn hàng</span>
                                    <div class="widget-buttons">
                                        <a href="#" data-toggle="maximize">
                                            <i class="fa fa-expand blue"></i>
                                        </a>
                                        <a href="#" data-toggle="collapse">
                                            <i class="fa fa-minus blue"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php 
                                ?>
                                <div class="widget-body widget-body-white">

                                    <div class="form-group">

                                        <label for="inputTitle">Kiểu xuất dữ liệu</label>
                                        <div class="radio">
                                            <label>
                                                <input name="kind" value="orders" type="radio" class="colored-success">
                                                <span class="text"> Theo đơn hàng</span>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="kind" value="product" type="radio" class="colored-success">
                                                <span class="text"> Theo sản phẩm</span>
                                            </label>
                                        </div>
                                    </div>   
                                    <div class="form-group">  
                                        <label for="product_name">Thời gian đặt hàng</label>   
                                    </div>                              
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:-10px;">Từ ngày</div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                  <input name="ngay1" class="form-control date-picker ngay1" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                                <label for="product_price_promo"></label>
                                                <div style="margin-top:-10px;">Đến ngày</div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <input name="ngay2" class="form-control date-picker ngay2" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy">    
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group">  
                                        <label for="product_name">Trạng thái đơn hàng</label>   
                                        <div>
                                        <select name="choose" id="orderstatus" class="TextInput OrderStatus" style="width: 140px;top: 4px;position:relative;" orderid="108080" orderstatus="5">
                                            <option value="1">Chờ xử lý</option>                                   
                                            <option value="2">Chờ thanh toán</option>
                                            <option value="3">Chờ hoàn thành</option>
                                            <option value="4">Chờ xuất hàng</option>
                                            <option value="5">Chờ nhận hàng</option>
                                            <option value="6">Chuyển một phần</option>
                                            <option value="7">Hoàn thành</option>
                                            <option value="9">Đã chuyển hết</option>
                                            <option value="10">Hủy đơn hàng</option>
                                            <option value="11">Từ chối đơn hàng</option>
                                            <option value="12">Hoàn trả đơn hàng</option>
                                            <option value="13">Đã tiếp nhận</option>
                                            <option value="14">Đề nghị hủy</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="hidden" value="news.report"/>
        <input type="hidden" name="act" value="report"/>

    </form>
    <!-- /Page Body -->
</div>

<script type="text/javascript">
$('#ajaxne').click(function (e) { 
    var ngay1= $('.ngay1').val()
    var ngay2=$('.ngay2').val()
    var choose =$('#orderstatus').val()
    var kind= $("input[name='kind']:checked").val()
    location.href= "report.ajax?action=report&ngay1="+ngay1+"&ngay2="+ngay2+"&status="+choose+"&kind="+kind

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
                news_title: {
                    validators: {
                        notEmpty: {
                            message: "Tiêu đề bản tin không được bỏ trống"
                        },
                        stringLength: {
                            min: 5,
                            message: "Tiêu đề bản tin phải lớn hơn 5 ký tự"
                        }

                    }
                },
                'parent_category[]': {
                    validators: {
                        notEmpty: {
                            message: 'Vui lòng chọn danh mục'
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
<style>
    .fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
        display: inline-block;
        width: 100% !important;
        height: 221px !important;
        line-height: 195px;
        padding: 10px;
        vertical-align: top;
        border-radius: 10px !important;
    }
    a.fileuploader-action.fileuploader-action-change i{
        color: #fff;
        position: absolute;
        top: 4px;
        left: 7px;
        height: 8px;
        width: 2px;
    }
</style>

<script>

    //--Bootstrap Date Picker--
    $('.date-picker').datepicker();

    //--Bootstrap Time Picker--
    $('#timepicker1').timepicker();

</script>
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>
