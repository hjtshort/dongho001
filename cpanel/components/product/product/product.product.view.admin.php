<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );
	$product_process = new product_process();	
	
	/* xu ly link cho tim kiem va phan trang */
   
	/* xu ly gia tri dau vao cho chuc nang tim kiem */	
    @$search_value =$_GET['search'];
    $danhmuc=$_GET['danhmuc'];
    $hienthi=$_GET['hienthi'];
    $nhacungcap=$_GET['nhacungcap'];
    $query_string="";
    if($hienthi!='')
    {
        $query_string.='hienthi='.$hienthi."&";
    }
    if($danhmuc!='')
    {
        $query_string.='danhmuc='.$danhmuc."&";
    }
    if($nhacungcap!='')
    {
        $query_string.='nhacungcap='.$nhacungcap."&";
    }
    if($search_value!='')
    {
        $query_string.='search='.$search_value."&";
    }
    if($query_string!='')
    {
        $self_link = $_GET["params"] . ".html?".$query_string;      
    }
    else 
    {
        $self_link = $_GET["params"] . ".html?";
    }
	
	/* nhung file xu ly phan trang */
	include_once('../include/paging.php');
	/* lay tong so mau tin trong bang */
	//$tongsodong = $product_process->get_product_count( @$search_value );
	/* so mau tin mac dinh tren trang */		
	$tongsodong = $product_process->get_product_view( $search_value,'','',$danhmuc,$hienthi,$nhacungcap)->rowCount();
	/* phan trang */
	if(!isset($_GET["page"])) $tranghientai = 1; else $tranghientai = intval($_GET["page"]);
    if(!isset($_GET["record"])) $somautin = 10; else $somautin = intval($_GET["record"]);
	@$pager = Pager::getPagerData( $tongsodong, $somautin, $tranghientai, $self_link );		
	
	$chucnang_id_ql = 2; // Quản lý thông tin người dùng
	$chucnang_id_them = 3; // thêm thông tin người dùng
	$chucnang_id_sua = 4; // sữa thông tin người dùng
	$chucnang_id_xoa = 5; // xoá thông tin người dùng
	$chucnang_list = $_SESSION["wti"]["chucnang"];
?>
	<link href="<?= $conf['template_admin']; ?>/assets/css/dataTables.bootstrap.css" rel="stylesheet" />

    <div class="page-content">
        <!-- Page Breadcrumb -->
        <div class="page-breadcrumbs breadcrumbs-fixed">
        	<div class="buttons-task col-xs-12 col-md-4">
                <ul class="breadcrumb breadcrumbs-fixed">
                    <li>
                        <i class="fa fa-table"></i>
                        <li class="toast-title">Quản lý sản phẩm</li>
                    </li>                
                </ul>
            </div>
            <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
                <a href="product/product/add.html" class="btn btn-sky shiny">Thêm sản phẩm</a>
            </div>
        </div>
        <!-- /Page Breadcrumb -->
        <!-- Page Body -->
     
        <div class="page-body">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="widget">
                        <div class="widget-header with-footer">
                            <span class="widget-caption">Danh sách sản phẩm</span>
                            <div class="widget-buttons">
                                <a href="#" data-toggle="maximize">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="#" data-toggle="collapse">
                                    <i class="fa fa-minus"></i>
                                </a>
                                <a href="#" data-toggle="dispose">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                        ?>
                        <div class="widget-body">                           
                            <div class="flip-scroll">                             
                                    <div id="simpledatatable_wrapper"> 
                                    	<div class="row">
                                            <div class="col-xs-12 col-md-2" style="padding-right: 0">
                                                <button type="button" class="btn btn-default" style="width:100%" data-toggle="popover" data-placement="bottom" 
                                                data-content="<form id='formsearch'>
                                                                <div class='form-group'>
                                                                    <label>Hiển thị sản phẩm theo:</label>
                                                                    <select class='form-control betat'>
                                                                    <option selected>Chọn điều kiện chọn lọc</option>
                                                                    <option value='1'>Hiển thị</option>
                                                                    <option value='2'>Loại sản phẩm</option>
                                                                    <option value='3'>Nhà cung cấp</option>
                                                                    </select>
                                                                </div>
                                                                <div class='form-group chon hienthi' hidden>
                                                                    <select name='hienthi' class='form-control slhienthi'>
                                                                    <option <?php if($_GET['hienthi']==null) echo "selected"; ?> value=''>Chọn điều kiện chọn lọc</option>
                                                                    <option <?php if($_GET['hienthi']=="1") echo "selected"; ?> value='1'>Hiển thị</option>
                                                                    <option <?php if($_GET['hienthi']=="0") echo "selected"; ?> value='0'>Ẩn</option>
                                                                    </select>
                                                                </div>
                                                                <div class='form-group chon danhmuc' hidden>
                                                                    <select name='danhmuc' class='form-control sldanhmuc'>
                                                                        <option <?php if($_GET['danhmuc']=='') echo "selected"; ?>  value='' selected>Chọn điều kiện chọn lọc</option>
                                                                    <?php $data=$product_process->sanpham_danhmuc()->fetchAll();
                                                                    foreach($data as $key=>$value){ ?>
                                                                        <option <?php if($_GET['danhmuc']==$value['danhmuc_id']) echo "selected"; ?> value='<?php echo $value['danhmuc_id']; ?>'><?php echo $value['tieude']; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class='form-group chon nhacungcap' hidden>
                                                                    <select name='nhacungcap' name='hienthi' class='form-control slnhacungcap'>
                                                                    <option  <?php if($_GET['nhacungcap']=='') echo "selected"; ?>  value='' selected>Chọn điều kiện chọn lọc</option>
                                                                    <?php $data2=$product_process->sanpham_nhasanxuat()->fetchAll();
                                                                    foreach($data2 as $value){ ?>
                                                                        <option <?php if($_GET['nhacungcap']==$value['nhasanxuat_id']) echo "selected"; ?> value='<?php echo $value['nhasanxuat_id']; ?>'><?php echo $value['nhasanxuat']; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class='form-group'>
                                                                        <button type='button' class='btn btn-default loc'
                                                                        data-kai='aaa'>Lọc</button>
                                                                </div>
                                                            </form>">Lọc sản phẩm <span class="caret"></span></button>
                                            </div>
                                            <div class="col-xs-12 col-md-5 text-align-right">
                                                <div id="simpledatatable_filter" class="dataTables_filter">
                                                    <div class="input-group">
                                                        <input id="inpsearch" class="form-control" style="width: 100% important" placeholder="" aria-controls="simpledatatable">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" id='search' type="button"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                <form id="validateSubmitForm" name="myForm" method="post">
                                            <div class="col-xs-12 col-md-5 text-align-right">
                                                <div class="btn-group">
                                                    <a class="btn btn-default" href="javascript:void(0);">Chọn thao tác</a>
                                                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-pos-right">
                                                        <li>
                                                            <a class="btn_submit" data-action="delete-all">Xóa tất cả tin
                                                                tức đã chọn</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn_submit" data-action="lock-all">Ẩn tất cả tin tức
                                                                đã chọn</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn_submit" data-action="unlock-all">Hiện tất cả tin
                                                                tức đã chọn</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn_submit" data-action="sort">Cập nhật thứ tự</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-bordered table-striped table-condensed flip-content" style="margin-top: 10px">
                                            <thead class="flip-content bordered-palegreen">
                                                <tr>
                                                    <th>#</th>
                                                    <th>
                                                        <label>
                                                            <input type="checkbox">
                                                            <span class="text"></span>
                                                        </label>
                                                    </th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Kho hàng</th>
                                                    <th>Danh mục sản phẩm</th>
                                                    <th>Nhà sản xuất</th>  
                                                    <th>Thao tác</th>                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 							
                                                    /* goi ham truy van du lieu dua tren cac gia tri tim kiem */
                                                    $result = $product_process->get_product_view( $search_value,$pager->offset,$pager->limit,$danhmuc,$hienthi,$nhacungcap); 								
                                                    if($result->rowCount() > 0){
                                                    while($data = $result->fetch()){ @$i++; 
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td>
                                                        <label>
                                                            <input name="chkItem[]" class="chkItem" type="checkbox" value="<?= $data["sanpham_id"]; ?>">
                                                            <span class="text"></span>
                                                        </label>
                                                    </td>                                            
                                                    <td>
                                                        <?php $hinhanh = json_decode($data["hinhanh"]); ?>
                                                        <img style="height:40px;border:1px solid #ddd" src="../uploads/<?= $hinhanh[0]; ?>" onerror="this.src='resource/images/no_image.jpg'">
                                                    </td>                                                                                         
                                                    <td>
                                                        <a href="product/product/edit/<?= $data["sanpham_id"]; ?>.html"><?= $data["tensanpham"]; ?></a>
                                                    </td> 
                                                    <td>10 sản phẩm của 1 loại</td>
                                                    <td><?= $data["tieude"]; ?></td>
                                                    <td><?= $data["nhasanxuat"]; ?></td>
                                                    <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle  btn-circle btn-xs " data-toggle="dropdown" aria-expanded="true">
                                                            <i class="glyphicon glyphicon-list"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="btn_submit" title="sao chép tin tức" data-action="copy" data-id="" data-link="content/news/copy/.html">Sao
                                                                    Chép</a>
                                                            </li>
                                                           
                                                                <li>
                                                                    <a class="btn_submit" title="Sữa tin tức" data-action="edit" data-id="" data-link="product/product/edit/<?php echo $data['sanpham_id']; ?>.html">Sửa</a>
                                                                </li>
                                                        

                                                            
                                                                <li>
                                                                    <a class="btn_submit" title="Xoá tin tức" data-action="delete" data-id="">Xoá</a>
                                                                </li>
                                                         

                                                     
                                                                <li>
                                                                
                                                                        <a class="btn_submit" title="Ẩn" data-action="lock" data-id="">Ẩn</a>
                                                                  
                                                                        <a class="btn_submit" title="Hiện" data-action="unlock" data-id="">Hiện</a>
                                                                  
                                                                </li>
                                                          
                                                        </ul>
                                                    </div>

                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    
                                        <div class="row DTTTFooter">
                                            <div class="col-sm-4">
                                                <div class="dataTables_info" id="simpledatatable_info" role="status" aria-live="polite">Hiển thị <?php echo $pager->somautin; ?> của <?php echo  $pager->tongsodong; ?> sản phẩm</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div id="simpledatatable_paginate">
                                                    <ul class="pagination">
                                                    <?php echo $pager->paging; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="text-align-right" id="simpledatatable_length">
                                                    <select onchange="javascript:location.href = 'product/product/view.html?record='+this.value;" name="simpledatatable_length" aria-controls="simpledatatable" class="form-control input-sm">
                                                    <?php
                                                    $record_option = array(
                                                        array("10", "10 Bản ghi / trang"),
                                                        array("20", "20 Bản ghi / trang"),
                                                        array("30", "30 Bản ghi / trang"),
                                                        array("50", "50 Bản ghi / trang"),
                                                        array("100", "100 Bản ghi / trang"),
                                                        array("99999999999", "Tất cả Bản ghi / trang")
                                                    );
                                                    for ($i = 0; $i < count($record_option); $i++): ?>
                                                        <option <?php if ($record_option[$i][0] == $somautin) {
                                                            echo "selected";
                                                        } ?> value="<?= $record_option[$i][0]; ?>"><?= $record_option[$i][1]; ?></option>
                                                    <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                                                       
                                        
                                    </div>
                                    
                                    <input type="hidden" name="hidden" value="product.view" />
                                    <input type="hidden" name="act" id="act" />
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!-- /Page Body -->
    </div>
    
    <script language="javascript">		
        $(function () {
            $('#search').click(function (e) {
                var search=$('#inpsearch').val()
                var url =document.URL;
                if(url.indexOf("search")>-1)
                {
                    location.href=url.substring(0,url.indexOf("search"))+"search="+search   
                }
                else 
                {   
                    if(url.indexOf("?")>-1)
                        location.href=url+"&search="+search  
                    else 
                    location.href=url+"?search="+search  
                }
                      
            });
            $(document.body).on('change',".betat",function (e) {
                if(e.target.value==1)
                {
                    $('.chon').hide()
                    $('.hienthi').show()
                }
                else if(e.target.value==2)
                {
                    $('.chon').hide()
                    $('.danhmuc').show()
                }
                else if(e.target.value==3)
                {                   
                    $('.chon').hide()
                    $('.nhacungcap').show()
                }
            });
            $(document.body).on('click',".loc",function (e) {
                var hienthi=$('.slhienthi').val()
                var danhmuc=$('.sldanhmuc').val()
                var nhacungcap=$('.slnhacungcap').val()
                var search= $('#inpsearch').val()
                var url = window.location.pathname
                var query_string=''
                if(hienthi!='')
                {
                    query_string+='hienthi='+hienthi+'&'
                }
                if(danhmuc!='')
                {
                    query_string+='danhmuc='+danhmuc+'&'
                }
                if(nhacungcap!='')
                {
                    query_string+='nhacungcap='+nhacungcap+'&'
                }
                if(search!='')
                {
                    query_string+='search='+search+'&'
                }
                if(query_string!='')
                {
                    url=url+"?"+query_string.substring(0,query_string.length-1)
                }
                location.href=url
                   
            });
          
            $('.btn_submit').click(function(e) {
                
                var self = $(this);			
    
                if(self.data("action") == "lock-all"){
                
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "unlock-all"){
                
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần mở khóa !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete-all"){
                    
                    if($(".chkItem:checked").length <= 0){
                        bootbox.alert("Vui lòng check chọn sản phẩm cần xoá !", function(result) {  });
                    } else {
                        $("#act").val(self.data("action"));
                        $("#validateSubmitForm").submit();				
                    }
                    
                } else if(self.data("action") == "delete"){
                    
                    $(this).closest("tr").find("input:checkbox").prop('checked',true)
                    
                    bootbox.confirm("Bạn có chắc chắn xoá các sản phẩm được chọn hay không !", function(result)
                    {
                        if(result){						
                            $("#act").val(self.data("action"));
                            $("#validateSubmitForm").submit();
                        }
                    });
                                
                } else if(self.data("action") == "lock") {
                    
                    $(this).closest("tr").find("input:checkbox").prop('checked',true)
                    
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                    
                } else if(self.data("action") == "unlock") {
                    
                    $(this).closest("tr").find("input:checkbox").prop('checked',true)
                 
                    
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                    
                } else if(self.data("action") == "add") {
                    location.href = self.data("link");
                } else if(self.data("action") == "edit") {
                    location.href = self.data("link");
                } else if(self.data("action") == "search") {				
                    var priceRangeFrom 	= $("#priceRangeFrom").val();
                    var priceRangeTo 	= $("#priceRangeTo").val();
                    var searchinput 	= $("#searchinput").val();
                    var parent_category	= $("#parent_category").val();
                    location.href = self.data("link") + "search=" + priceRangeFrom + "|" + priceRangeTo + "|" + searchinput + "|" + parent_category ;				
                } else if(self.data("action") == "un-filter") {				
                    location.href = self.data("link");
                } else if(self.data("action") == "sort") {
                    $("#act").val(self.data("action"));
                    $("#validateSubmitForm").submit();
                }				
            });
			
			$('.moneyformat').keyup(function() {
				$(this).formatCurrency({ symbol: '', colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 0 });
			}).keypress(function(e) {
				if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
			});
			
			$('.intformat').keypress(function(e) {
				if (String.fromCharCode(e.charCode).match(/[^0-9]/g)) return false;
			});
            
        });		
        
    </script>