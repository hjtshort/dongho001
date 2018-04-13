<?php defined( '_VALID_MOS' ) or die( include("404.php") ); ?>
<div id="wrapper">	
    <div id="content">
        <ul class="breadcrumb">
            <li><a href="index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
            <li class="divider"></li>
            <li>Online Shop</li>
            <li class="divider"></li>
            <li>Products</li>
        </ul>
		<div class="separator bottom"></div>
        <div class="innerLR">
            <div class="widget widget-2">
                <div class="widget-head">
                
                    <h4 class="heading glyphicons check"><i></i>Chỉnh sửa đánh giá, phản hồi về sản phẩm</h4>
                    
                    <div class="heading-buttons">
                        <div class="buttons pull-right">
                               
                            <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Lưu</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons edit"><i></i> Cập nhật</a>
                            <a href="" class="btn btn-primary btn-icon glyphicons delete"><i></i> Xóa </a>
                            <a href="product/productreviews/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
<!-- Modal inline -->

<!-- Modal -->
<div class="modal hide fade" id="modal-simple">
	
	<!-- Modal heading -->
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>Modal header</h3>
	</div>
	<!-- // Modal heading END -->
	
	<!-- Modal body -->
	<div class="modal-body">
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	</div>
	<!-- // Modal body END -->
	
	<!-- Modal footer -->
	<div class="modal-footer">
		<a href="#" class="btn btn-default" data-dismiss="modal">Close</a> 
	</div>
	<!-- // Modal footer END -->
</div>
            <div class="widget-body">
				<div class="row-fluid">
					<div class="span2">
						<br>
						<p class="muted">Tiêu đề &nbsp;<span class="required">*</span></p>
					</div>
					<div class="span9"><br>
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">

						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Nội dung&nbsp;<span class="required">*</span></p>
					</div>
					<div class="span9">
						<textarea name="message" class="span5" rows="5"></textarea>
                        &nbsp;
						<div class="separator"></div>
					</div>
				</div>
              <div class="row-fluid">
					<div class="span2">	
					  <p class="muted">Người gửi&nbsp;<span class="required">*</span></p>
					</div>
					<div class="span9">
						<input type="text" id="inputTitle" class="span5" value="" placeholder="">&nbsp;
						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Trạng thái<span class="required">*</span></p>
					</div>
					<div class="span5">
						 <select name="ctl00$cph_Main$ctl00$ctl00$ddlStatus" id="cph_Main_ctl00_ctl00_ddlStatus" class="TextInput" style="width:200px;">
                            <option value="0">Chờ duyệt</option>
                            <option selected="selected" value="1">Đ&#227; duyệt</option>
                            <option value="-1">Kh&#244;ng duyệt</option>
                        </select>

						<div class="separator"></div>
					</div>
				</div>
                <div class="row-fluid">
					<div class="span2">	
						<p class="muted">Đánh giá<span class="required">*</span></p>
					</div>
					<div class="span5">
						 <select name="Main$ctl00$ctl00$ddlRate" id="ddlRate" class="TextInput" style="width: 200px;" onchange="javascript:OnChangeRate();">
                            <option value="1">Kh&#244;ng tốt (1 sao)</option>
                            <option value="2">Dưới trung b&#236;nh (2 sao)</option>
                            <option value="3">Trung b&#236;nh (3 sao)</option>
                            <option value="4">Tr&#234;n trung b&#236;nh (4 sao)</option>
                            <option selected="selected" value="5">Xuất sắc (5 sao)</option>
                        </select>
                        <div id="cph_Main_ctl00_ctl00_pStarRating"><div id='star-1' class='rating-on' onmouseover='javascript:OverStarRating(1, 5);'></div><div id='star-2' class='rating-on' onmouseover='javascript:OverStarRating(2, 5);'></div><div id='star-3' class='rating-on' onmouseover='javascript:OverStarRating(3, 5);'></div><div id='star-4' class='rating-on' onmouseover='javascript:OverStarRating(4, 5);'></div><div id='star-5' class='rating-on' onmouseover='javascript:OverStarRating(5, 5);'></div><div id='star-6' class='rating-zero' onmouseover='javascript:OverStarRating(6, 5);'></div></div>
						<div class="separator"></div>
					</div>
				</div>
               <div class="row-fluid" style="padding-top: 10px;">
					<div class="span2">
					  <p class="muted">Ngày gửi&nbsp;</p>
					</div>
					<div class="span9">
						<input name="Main$ctl00$ctl00$txtReviewDate" type="text" value="08:24, 16/06/2014" id="txtReviewDate" disabled="disabled" class="aspNetDisabled TextInput" style="width:115px;" />
						<div class="separator"></div>
                        <input name="Main$ctl00$ctl00$hdRating" type="hidden" id="hdRating" value="5" />
					</div>
				</div>
            </div>
                
            </div>
        </div>
        <!-- End Content -->        
    </div>
   	<!-- End Wrapper -->
</div>
<style type="text/css">
div.rating-zero{ float: left; width: 10px; height: 15px; }
div.rating-on{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left bottom; }
div.rating-off{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left top; }
div.rating-hover{ float: left; width: 15px; height: 15px; background: url('<?php echo $template_admin; ?>/html/images/rating.png'); background-repeat: no-repeat; background-position: left center; }
</style>
<script type="text/javascript">
	// code script rating
    function OverStarRating(p, rating) {
        var i = 0;
        for (i = 1; i <= rating; i++) { // Star On
            document.getElementById("star-" + i).setAttribute("class", "rating-on");
        }
        for (i = rating + 1; i <= 5; i++) { // Star Off
            document.getElementById("star-" + i).setAttribute("class", "rating-off");
        }
        for (i = 1; i <= p; i++) { // Star Hover
            if(i <= 5 && i > 0) document.getElementById("star-" + i).setAttribute("class", "rating-hover");
        }
        document.getElementById('ddlRate').value = p;
    }
    function OnChangeRate() {
        var _val = document.getElementById('ddlRate').value;
        var p = _val, rating = 4; 
        var i = 0;
        for (i = 1; i <= rating; i++) { // Star On
            document.getElementById("star-" + i).setAttribute("class", "rating-on");
        }
        for (i = rating + 1; i <= 5; i++) { // Star Off
            document.getElementById("star-" + i).setAttribute("class", "rating-off");
        }
        for (i = 1; i <= p; i++) { // Star Hover
            if (i <= 5 && i > 0) document.getElementById("star-" + i).setAttribute("class", "rating-hover");
        }
    }
</script>