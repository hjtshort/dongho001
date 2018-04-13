<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$product_process = new product_process();	
?>

<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="" class="glyphicons home"><i></i>AdminPlus</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
            </ul>
            <div class="separator bottom"></div>
            <div class="innerLR">
                <div class="widget widget-2">
                    <div class="widget-head">
                    
                        <h4 class="heading glyphicons qrcode"><i></i>Thêm mới thuộc tính sản phẩm</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu lại</button>
                                <a href="product/properties/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div>
                    
                    <!-- Modal inline -->
                    <!-- Modal -->
                    <div class="modal hide fade" id="modal-simple">
                        
                        <!-- Modal heading -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
                    <?php 
						$result = $product_process->get_properties_edit( $conf['geturl']['id'] );
						if ($data = $result->fetch()){
					?>
                    <div class="widget-body">
                        
                        <div class="row-fluid">
                            <div class="span2">
                                <p class="muted">Tên nhóm<span class="required">*</span></p> 
                            </div>
                            <div class="span9">
                            	<div class="controls">
                                	<input value="<?= $data["tennhom"]; ?>" name="product_properties_title" type="text" id="product_properties_title" class="span5">
                                	<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập tên nhóm thuộc tính sản phẩm (VD: Điện thoại)"></span>
                                    <?php 
                                        if(!empty($_SESSION["validator"]["product_properties_title"])){
                                            echo $_SESSION["validator"]["product_properties_title"];
                                        }
                                    ?>
                            	</div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">	
                                <p class="muted">Mô tả</p>
                            </div>
                            <div class="span9">
                                <textarea name="product_properties_desc" class="span6" rows="5"><?= $data["motanhom"]; ?></textarea>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">	
                                <p class="muted">Thuộc tính sản phẩm</p>
                            </div>
                            <div class="span5">                            	
                                <table id="tbl_product_properties" class="table js-table-sortable ui-sortable">                                   
                                    <tbody>
                                    	<?php 
											$tenthuoctinh = unserialize($data["tenthuoctinh"]);
											for($i = 0; $i <count($tenthuoctinh); $i++){
												if(!empty($tenthuoctinh[$i])){
										?>
                                        <tr>
                                            <td style="border:none;padding:0px;">
                                            	<div class="group_row_properties">
                                                    <input value="<?= $tenthuoctinh[$i]; ?>" name="product_properties_name[]" type="text" class="span12" />
                                                </div>
                                            </td>
                                            <td class="js-sortable-handle" style="border:none;padding:0px;">
                                            	&nbsp;&nbsp;<span title="kéo để thay đổi vị trí" class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span>
                                                &nbsp;<a title="thêm thuộc tính" href="javascript:void(0)" onclick="javascript:addproperties()"><img src="templates/adminplus/html/images/icons/addicon.png" /></a>
                                                <?php if($i > 0) { ?><a title="Xóa thuộc tính" href="javascript:void(0)" onclick="removeRowFromTable('tbl_product_properties', <?= @$intRowActive; ?>);return false;"><img src="templates/adminplus/html/images/icons/delicon.png" /></a> <?php } ?>
                                                &nbsp;&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <?php @$intRowActive++; }
										}
										?>
                                    </tbody>
                                </table>
                                                                                                                            
                            </div>
                        </div> 
                    	
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Content -->        
        </div>
        <!-- End Wrapper -->
    </div>
    
    <script type="text/javascript">
		<?php if(!empty($_SESSION["message"]["notyfy"])){ ?>
			$(function () {
				func_notyfy("top", "information", "<?= $_SESSION["message"]["notyfy"]; ?>");
			});
		<?php unset($_SESSION["message"]["notyfy"]);} ?>
		
		$.validator.setDefaults(
		{
			submitHandler: function(form) {				
				form.submit();
			},
			showErrors: function(map, list) 
			{
				this.currentElements.parents('label:first, .controls:first').find('.error').remove();
				this.currentElements.parents('.row-fluid:first').removeClass('error');
				
				$.each(list, function(index, error) 
				{
					var ee = $(error.element);
					var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
					
					ee.parents('.row-fluid:first').addClass('error');
					eep.find('.error').remove();
					eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
				});
				//refreshScrollers();
			}
		});
		
		$(function()
		{
			// validate signup form on keyup and submit
			$("#validateSubmitForm").validate({
				rules: {					
					product_properties_name: {
						required: true,
						minlength: 5

					},
				},
				messages: {					
					news_title: {
						required: "Tên nhóm thuộc tính không được bỏ trống",
						minlength: "Tên nhóm thuộc tính phải lớn hơn 5 ký tự"
					}
				}
			});
		
		});
		
		/* add image row */
		var intRowActive = <?= @$intRowActive; ?>;
		function addproperties(){
			
			var row_length = $('.group_row_properties').length;
			if( row_length >= 10 ){
				return false;
			}
			
			var str = srtjoin('<tr>')
				('<td style="border:none;padding:0px;">')
					('<div class="group_row_properties">')
					('<input name="product_properties_name[]" type="text" class="span12" />')
					('</div>')
				('</td>')
				('<td class="js-sortable-handle" style="border:none;padding:0px;">')
					('&nbsp;&nbsp;<a title="kéo để thay đổi vị trí" class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></a>')
					('&nbsp;&nbsp;<a title="Thêm thuộc tính" href="javascript:void(0)" onclick="javascript:addproperties()"><img src="templates/adminplus/html/images/icons/addicon.png" /></a>')
					('&nbsp;<a title="Xóa thuộc tính" href="javascript:void(0)" onclick="removeRowFromTable(\'tbl_product_properties\', ' + intRowActive + ');return false;"><img src="templates/adminplus/html/images/icons/delicon.png" /></a>')
				('</td>')
			('</tr>')();
										
			var tblBody = document.getElementById('tbl_product_properties').tBodies[0];
			var newRow = tblBody.insertRow(-1);
        	var newCell0 = newRow.insertCell(0);
			newRow.innerHTML = str;
			intRowActive++;	
		}
		
		function removeRowFromTable(tblId, intDelRow)
		{
			if (navigator.appName == "Microsoft Internet Explorer"){
				intVersion = 0;
			} else {
				intVersion = 1;
			}
			var tblBody = document.getElementById(tblId).tBodies[0];
			if(intVersion == 0)
				{
				tblBody.rows[intDelRow].innerText = "";
			}
			else
				{
				tblBody.rows[intDelRow].innerHTML = "";
			}
			tblBody.rows[intDelRow].style.display = "none";
		}
		
		srtjoin = function(str) {
		  var store = [str];
		  return function extend(other) {
			if (other != null && 'string' == typeof other ) {
			  store.push(other);
			  return extend;
			}
			return store.join('');
		  }
		};
									
	</script>
    
    <?php if(!empty($_SESSION["validator"])){ unset($_SESSION["validator"]); } ?> 

    <input type="hidden" name="hidden" value="properties.edit" />
    <input type="hidden" name="act" value="save"/>
    
</form>