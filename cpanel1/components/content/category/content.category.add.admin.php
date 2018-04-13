<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$category_process = new category_process();		
	/*
	$result = $category_process->get_category_view();
	$table_row = $result->fetchAll();											
	
	function category($table_row, $danhmuccha = 0, $level = "", $synbold = ""){
		
		$newArray = array_filter($table_row, function ($row1) use ($danhmuccha) {
			if ( $row1["danhmuccha"] == $danhmuccha ) {
				return true;
			}
		});
		
		foreach($newArray as $row){
						
			echo $row["danhmuc_id"] . " | " .  $level , $synbold,  $row["tieude"] . "<br><br>";
							
			category($table_row, $row['danhmuc_id'], $level . '&nbsp;&nbsp;&nbsp;&nbsp;', $synbold = " └ "); 
			//unset($row);
			$synbold = "";
			
		}

	}
	
	category($table_row);
	
	
	$hackers = array ('Alan Kay', 'Peter Norvig', 'Linus Trovalds', 'Larry Page');

	print_r($hackers);
	
	// Search
	$pos = array_search('Linus Trovalds', $hackers);
	
	echo 'Linus Trovalds found at: ' . $pos;
	
	// Remove from array
	unset($hackers[$pos]);
	
	//print_r($hackers);
	
	
	function filterid ($row) {
		if ( $row["danhmuccha"] == 13323 ) {
			return true;
		}
	}
	
	$my_value = 0;
	*/
	
	//var_dump($table_row);
	
?>
<form id="validateSubmitForm" name="myForm" method="post">
    <div id="wrapper">	
        <div id="content">
            <ul class="breadcrumb">
                <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
                <li class="divider"></li>
                <li>Online Shop</li>
                <li class="divider"></li>
                <li>Products</li>
            </ul>
            <div class="separator bottom"></div>
        
            <div class="heading-buttons">
                <h3 class="glyphicons list"><i></i> Thêm mới danh mục tin tức</h3>
                <div class="buttons pull-right">
                    <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu lại</button>
                    <a href="content/category/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="separator bottom"></div>
        
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
            
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
                    <ul>
                        <li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Thông tin chung</a></li>
                        <li><a href="#productSeoTab" data-toggle="tab" class="glyphicons pie_chart"><i></i>Thiết lập SEO</a></li>
                        <li><a href="#productInfoTab" data-toggle="tab" class="glyphicons table"><i></i>Danh mục tin liên quan</a></li>
                    </ul>
                </div>
            
                <div class="widget-body" style="padding: 20px;">
                    <div class="tab-content">
                    
                        <!-- Thông tin chung -->
                        <div class="tab-pane active" id="productDescriptionTab">
                                                    
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Tên danh mục <span class="required">*</span></p>
                                </div>
                                <div class="span9">
                                	<div class="controls">
                                    	<input name="category_title" type="text" id="category_title" class="span6">
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tên danh mục sản phẩm (VD: Thời trang nữ)">
                                           
                                        </span>
                                        <?php 
											if(!empty($_SESSION["validator"]["category_title"])){
												echo $_SESSION["validator"]["category_title"];
											}
										?>
                                    </div>                                    
                                </div>
                            </div>                           
                            
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Danh mục cha <span class="required">*</span></p>
                                </div>
                                <div class="span9">
                                	<div class="controls">
                                        <select size="10" name="parent_category" id="parent_category" class="span6">
                                        	<option value="0">ROOT</option>                                            
                                            <?php
												$result = $category_process->get_category_view();
												$table_row = $result->fetchAll();			
												
												$category = array();
												$category_process->category($table_row, $category);
												
												foreach($category as $key => $row){
													echo '<option value="', $row["danhmuc_id"], '">', $row["level"],  $row["tieude"], '</option>';
												}
											?>
                                        </select>
                                        <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Danh mục cấp trên của danh mục đang cập nhật">
                                           
                                        </span>
                                        <?php 
											if(!empty($_SESSION["validator"]["parent_category"])){
												echo $_SESSION["validator"]["parent_category"];
											}
										?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Mô tả</p>
                                </div>
                                <div class="span9">
                                    <textarea name="category_desc"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'category_desc' , {width : '95%', height : '150px', toolbar : 'Basic'});
                                    </script>                        
                                </div>
                            </div>
                            
                            <div class="separator"></div>
                            <div class="separator"></div>                                                        
                            
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Hiển thị</p>
                                </div>
                                <div class="span9">
                                    <input name="category_display" type="checkbox" class="checkbox" checked="checked" />
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn để danh mục sản phẩm hiển thị trên website">
                                        
                                    </span>
                                </div>
                            </div>	
                            
                        </div>
                        <!-- Thông tin chung END -->
                        
                        <!-- SEO -->
                        <div class="tab-pane" id="productSeoTab">
                        
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Tiêu đề trang &nbsp;</p>                        
                                </div>
                                
                                <div class="span9">
                                    <input name="category_seo_title" type="text" id="inputTitle" class="span6" value="">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></span>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                  <p class="muted">Thẻ từ khóa</p>
                                </div>
                                <div class="span9">
                                    <input name="category_seo_keyword" type="text" id="inputTitle" class="span6" value="">&nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Mô tả các từ khóa chính của website "></span>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                    <p class="muted">Thẻ mô tả</p>
                                </div>
                                <div class="span9">
                                    <textarea name="category_seo_desc" class="span6" rows="5"></textarea>
                                    &nbsp;<span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></span>
                                    <div class="separator"></div>
                                </div>
                            </div>
                        
                        </div>
                        <!-- SEO END -->
                    
                        <!-- Danh mục tin liên quan -->
                        <div class="tab-pane" id="productInfoTab">
                            
                            <div class="row-fluid">
                                <div class="span3">
                                    <p class="muted">Danh mục tin tức &nbsp;</p>
                                </div>
                                <div class="span9">
                                <select size="10" name="NewsCategories" id="NewsCategories" ondblclick="javascript:NewsCategoriesDblClick();" class="span6">
                                    <option value="105627#/">Danh mục tin tức 1</option>
                                </select>
                                    <div class="separator"><font style="color:#999;">* Click đúp chuột để loại bỏ khỏi danh sách liên quan.</font></div>
                                    <div class="separator"></div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span3">	
                                  <p class="muted">Danh mục tin đã chọn</p>
                                </div>
                                <div class="span9">
                                    <select size="10" name="SelectedNewsCategories" id="SelectedNewsCategories" ondblclick="javascript:SelectedNewsCategoriesDblClick();" class="span6"></select>
                                    <div class="separator"><font style="color:#999;">* Click đúp chuột để loại bỏ khỏi danh sách liên quan.</font></div>
                                   <input type="hidden" name="RelatedNewsCates" id="RelatedNewsCates" />
                                   <div class="separator"></div>
                                </div>
                            </div> 
                            <!-- Code xu li danh mục tin tuc -->
                            <script type="text/javascript">
                                var m_blank = '';
                                function NewsCategoriesDblClick() {
                                    var obj = document.getElementById('NewsCategories');
                                    var obj_2 = document.getElementById('SelectedNewsCategories');
                                    var hd = document.getElementById('RelatedNewsCates');
                                    if (hd.value == m_blank) hd.value = '/';
                                    // Thêm vào danh sách category cha
                                    var categoryId = obj.options[obj.selectedIndex].value.split('#')[0];
                                    if (hd.value.indexOf('/' + categoryId.toString() + '/') > -1) return; // Có trong danh sách đã chọn rồi thì thôi, không add vào nữa
                                    var categoryName = obj.options[obj.selectedIndex].text;
                                    categoryName = categoryName.replace('└', m_blank).replace(/-/g, m_blank);
                                    var newOption = document.createElement('option');
                                    obj_2.options.add(newOption);
                                    newOption.text = categoryName.trim(); newOption.value = categoryId;
                                    hd.value = hd.value + categoryId.toString() + '/';
                                    // Thêm vào danh sách các thằng con
                                    var parentId = categoryId;
                                    var length = obj.options.length;
                                    for (var i = 0; i < length; i++) {
                                        var lineAge_2 = obj.options[i].value.split('#')[1];
                                        if (lineAge_2.indexOf('/' + parentId.toString() + '/') > -1) {
                                            categoryId = obj.options[i].value.split('#')[0];
                                            if (hd.value.indexOf('/' + categoryId.toString() + '/') > -1) continue;
                                            categoryName = obj.options[i].text;
                                            categoryName = categoryName.replace('└', m_blank).replace(/-/g, m_blank);
                                            newOption = document.createElement('option');
                                            obj_2.options.add(newOption);
                                            newOption.text = categoryName.trim(); newOption.value = categoryId;
                                            hd.value = hd.value + categoryId.toString() + '/';
                                        }
                                    }
                                }
                                function SelectedNewsCategoriesDblClick() {
                                    var obj = document.getElementById('SelectedNewsCategories');
                                    var hd = document.getElementById('RelatedNewsCates');
                                    var categoryId = obj.options[obj.selectedIndex].value;
                                    obj.remove(obj.selectedIndex);
                                    hd.value = hd.value.replace('/' + categoryId + '/', '/');
                                }
                                </script>
                        </div>
                        <!-- Danh mục tin liên quan END -->
                    </div>
                </div>
            </div>                
        </div>                    
        <!-- End Content -->
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
					category_title: {
						required: true,
						minlength: 3
					},
					parent_category: {
						required: true
					}
				},
				messages: {					
					category_title: {
						required: "Tên danh mục không được bỏ trống",
						minlength: "Tên danh mục phải lớn hơn 5 ký tự"
					},
					parent_category: {
						required: "Vui lòng chọn danh mục cha",
					}
				}
			});
		
		});
									
	</script>
    
    <?php if(!empty($_SESSION["validator"])){ unset($_SESSION["validator"]); } ?> 

    <input type="hidden" name="hidden" value="category.add" />
    <input type="hidden" name="act" value="save"/>
    <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y");?>" />
</form>