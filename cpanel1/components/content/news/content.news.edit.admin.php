<?php defined( '_VALID_MOS' ) or die( include("404.php") ); 
	$news_process = new news_process();	
?>

<script language="javascript" type="text/javascript">
	function BrowseServer( inputId )
	{
		var finder = new CKFinder() ;
		finder.StartupPath  = "Image:/image/";
		finder.selectActionFunction = SetFileField ;
		finder.selectActionData = inputId ;
        finder.skin = 'bootstrap';
		finder.popup();
	}
	
	// This is a sample function which is called when a file is selected in CKFinder.
	function SetFileField( fileUrl, data )
	{
		document.getElementById( "image_src" ).value = fileUrl;
		document.getElementById( "image_file" ).src = fileUrl;
	}
	
	// This is a sample function which is called when a file is selected in CKFinder.
	function ResetImage( )
	{
		document.getElementById( "image_file" ).src = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==";
	}
</script>

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
                    
                        <h4 class="heading glyphicons qrcode"><i></i>Chỉnh sữa tin tức</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <a href="#modal-simple" data-toggle="modal" class="btn btn-primary btn-icon glyphicons circle_question_mark"><i></i> Trợ giúp</a>   
                                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu lại</button>
                                <a href="content/news/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i> Quay lại</a>
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
						$result = $news_process->get_news_edit( $conf['geturl']['id'] );
						if ($data = $result->fetch()){					
					?>
                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Tiêu đề <span class="required">*</span></p>
                            </div>
                            <div class="span9">
                            	<div class="controls">
                                    <input value="<?= $data["tieude"]; ?>" name="news_title" type="text" id="inputTitle" class="span6" placeholder="">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhập tiêu đề của tin tức"></span>
                                    <?php 
										if(!empty($_SESSION["validator"]["news_title"])){
											echo $_SESSION["validator"]["news_title"];
										}
									?>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span3">	
                                <p class="muted">Danh mục tin <span class="required">*</span></p>
                            </div>
                            <div class="span5">
                            	<div class="controls">
                                    <select name="parent_category" id="parent_category" class="span7">                                
                                        <option value="">ROOT</option>                                            
                                        <?php                 
                                            $result = $news_process->get_category_view();
                                            $table_row = $result->fetchAll();			
                                            
                                            $category = array();
                                            $news_process->category($table_row, $category);
											
											global $selected_option;
											$selected_option = $data["danhmuc_id"];
                                            
                                            foreach($category as $key => $row){												
												echo '<option value="', $row["danhmuc_id"], '"', (($row['danhmuc_id'] == $selected_option) ? 'selected="selected"' : ''), '>', $row["level"],  $row["tieude"], '</option>';
                                            }
                                        ?>
                                    </select>                                
                                    &nbsp;
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Lựa chọn danh mục chứa tin tức"></span>
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
                              <p class="muted">Ảnh chính</p>
                            </div>
                            <div class="span9">
                            	<?php if(empty($data["filehinhanh"])) { ?>
									<img id="image_file" style="height:180px;" data-src="holder.js/150x150" class="img-thumbnail" alt="150x150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
								<?php } else { ?>
                                	<img id="image_file" style="height:180px;" class="img-thumbnail" alt="150x150" src="<?= $data["filehinhanh"]; ?>">
                                <?php } ?>
                                <div class="separator"></div>
                            	<div class="fileupload fileupload-new" data-provides="fileupload">
                                	<input type="text" value="<?= $data["filehinhanh"]; ?>" class="span4" name="image_src" id="image_src">
                                    <div class="input-append">
                                        <span class="btn btn-file" onClick="javascript:BrowseServer('image_src');">Chọn hình ảnh</span>
                                    </div>
                                    <div class="input-append">
                                        <span class="btn btn-file" onClick="javascript:ResetImage('image_src');">Bỏ chọn</span>
                                    </div>
                                </div>                            	
                            </div>
                        </div>
                        
                      	<div class="row-fluid">
                            <div class="span3">	
                              <p class="muted">Chú thích cho ảnh</p>
                            </div>
                            <div class="span9">
                                <input value="<?= $data["chuthichanh"]; ?>" name="image_note" type="text" id="inputTitle" class="span6" placeholder="">
                                &nbsp;
                                <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Ghi nội dung chú thích cho ảnh tại đây"></span>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <p class="muted">Tùy chọn</p>
                            </div>
                            <div class="span5">
                                <div class="groupcheckbox">
                                    <input name="news_focus" type="checkbox" class="checkbox" <?php if($data['tinnoibat']) echo "checked"; ?> >
                                    Tin nổi bật&nbsp;
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tích vào tùy chọn để lựa chọn làm tin nổi bật"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <p class="muted">Hiển thị</p>
                            </div>
                            <div class="span9">
                                <label class="groupcheckbox">
                                	<input name="news_display" type="checkbox" class="checkbox" <?php if($data['hienthi']) echo "checked"; ?> > &nbsp; (Chọn mục này nếu bạn muốn ẩn / hiện thư mục tin)
                                </label>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">	
                                <p class="muted">Nội dung tóm tắt</p>
                            </div>
                            <div class="span9">                                
                                <textarea name="news_desc"><?= $data["motangan"]; ?></textarea>
								<script type="text/javascript">
                                    CKEDITOR.replace( 'news_desc' , {width : '95%', height : '150px', toolbar : 'Basic'});
                                </script>
                                <div class="separator"></div>
                            	<div class="separator"></div>
                            </div>
                        </div>
                        
                        <div class="row-fluid">
                            <div class="span3">
                                <p class="muted">Nội dung chi tiết&nbsp;<span class="required">*</span></p>
                            </div>
                            <div class="span9">
                                <textarea name="news_detail"><?= $data["motachitiet"]; ?></textarea>
								<script type="text/javascript">
                                    CKEDITOR.replace( 'news_detail' , {width : '95%', height : '400px', toolbar : 'Full'});
                                </script>
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
					news_title: {
						required: true,
						minlength: 5
					},
					parent_category: {
						required: true
					}
				},
				messages: {					
					news_title: {
						required: "Tiêu đề bản tin không được bỏ trống",
						minlength: "Tiêu đề bản tin phải lớn hơn 5 ký tự"
					},
					parent_category: {
						required: "Vui lòng chọn danh mục cha",
					}
				}
			});
		
		});
									
	</script>
    
    <?php if(!empty($_SESSION["validator"])){ unset($_SESSION["validator"]); } ?> 

    <input type="hidden" name="hidden" value="news.edit" />
    <input type="hidden" name="act" value="save"/>    
</form>