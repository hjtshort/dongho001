<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );
	$myprocess = new process();
	$result = $myprocess->get_user_list( $url[3] );
	if ($data = $result->fetch()){
?>
<form class="form-horizontal" id="validateSubmitForm" name="myForm" method="post">
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
                    
                        <h4 class="heading glyphicons user_add"><i></i>Thay đổi thông tin tài khoản</h4>
                        
                        <div class="heading-buttons">
                            <div class="buttons pull-right">
                                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Lưu lại</button>
                                <a href="admin/users/view.html" class="btn btn-primary btn-icon glyphicons unshare"><i></i>Quay lại</a>                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                                                
                    </div>                   
                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="span2">
                                <label class="control-label" for="username">Tên đăng nhập <span class="required">*</span></label>
                            </div>
                            <div class="span9">
                                <div class="controls">
                                	<input type="text" id="username" name="username" class="span4" value="<?= $data["uid"]; ?>" disabled="disabled">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Tên tài khoản đăng nhập được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <label class="control-label" for="firstname">Họ đệm <span class="required">*</span></label>
                            </div>
                            <div class="span9">
                                <div class="controls">
                                    <input type="text" id="firstname" name="firstname" class="span4" value="<?= $data["ho"]; ?>">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Họ và chữ lót tên người được cấp phát tài khoản">
                                       
                                    </span>
                                </div>                                
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                            	<label class="control-label" for="lastname">Tên <span class="required">*</span></label>
                            </div>
                            <div class="span9">
                            	<div class="controls">
                                    <input type="text" id="lastname" name="lastname" class="span4" value="<?= $data["ten"]; ?>">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <label class="control-label" for="email">Địa chỉ Email <span class="required">*</span></label>
                            </div>
                            <div class="span9">
                            	<div class="controls">
                                    <input type="email" id="email" name="email" class="span4" value="<?= $data["email"]; ?>">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">	
                                <label class="control-label" for="gender">Giới tính <span class="required">*</span></label>
                            </div>
                            <div class="span5">                                
                                <div class="controls">
                                    <select id="gender" name="gender" class="span5">
                                        <option <?php if($data["gender"] == "NAM") { echo "selectes"; } ?> value="NAM">Nam</option>
                                        <option <?php if($data["gender"] == "NU") { echo "selectes"; } ?> value="NU">Nữ</option>
                                    </select>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">	
                                <label class="control-label" for="address">Địa chỉ </label>
                            </div>
                            <div class="span9">                                
                                <div class="controls">
                                    <textarea name="address" id="address" class="span6" rows="2"><?= $data["diachi"]; ?></textarea>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <label class="control-label" for="phone">Số điện thoại <span class="required">*</span></label>
                            </div>
                            <div class="span9">                                
                                <div class="controls">
                                    <input type="text" id="phone" name="phone" class="span4" value="<?= $data["dienthoai"]; ?>">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Số điện thoại của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                 <label class="control-label">Tài khoản </label>
                            </div>
                            <div class="span5">
                            	<div class="controls">
                                    <table>
                                        <tbody class="muted">
                                            <tr>
                                                <td style="width: 50px;">Yahoo</td>
                                                <td>
                                                    <input name="yahoo" type="text" maxlength="30" id="txtYahoo" class="TextInput" style="width: 218px;" value="<?= $data["yahoo"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50px;">MSN</td>
                                                <td>
                                                    <input name="msn" type="text" maxlength="30" id="txtMSN" class="TextInput" style="width: 218px;" value="<?= $data["msn"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50px;">Skype</td>
                                                <td>
                                                    <input name="skype" type="text" maxlength="30" id="txtSkype" class="TextInput" style="width:218px;" value="<?= $data["skype"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50px;">AOL</td>
                                                <td>
                                                    <input name="aol" type="text" maxlength="30" id="txtAOL" class="TextInput" style="width:218px;" value="<?= $data["aol"]; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 50px;">GTalk</td>
                                                <td>
                                                    <input name="gtalk" type="text" maxlength="30" id="txtGTalk" class="TextInput" style="width:218px;" value="<?= $data["gtalk"]; ?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="separator"></div>                                                                
                           </div>
                        </div>
                       <div class="row-fluid">
                           <div class="span2">
                                <label class="control-label" for="password">Mật khẩu <span class="required">*</span></label>
                            </div>
                            <div class="span9">                                
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="span4">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Địa chỉ Email của tài khoản được cấp phát">
                                     
                                    </span>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">
                                <label class="control-label" for="confirm_password">Xác nhận mật khẩu <span class="required">*</span></label>
                            </div>
                            <div class="span9">
                            	<div class="controls">
                                    <input type="password" id="confirm_password" name="confirm_password" class="span4">
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Phân quyền người sử dụng, cho phép bạn giới hạn những chức năng mà người dùng có thể truy cập đến.">
                                    
                                    </span>
                                </div>                                
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span9">
                                <p class="muted"><h5></h5></p>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2">	
                                <label class="control-label" for="ddlRoleTypes">Nhóm quyền <span class="required">*</span></label>
                            </div>
                            <div class="span5">                                
                                <div class="controls">
                                    <select name="ddlRoleTypes" id="ddlRoleTypes" class="TextInput" onchange="javascript:OnChangeRoleType();" style="width:285px;">
                                        <?php
                                            $result = $myprocess->get_group_function_list();
                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <option <?php if( $data["nhomchucnang_id"] == $row["Id"]){ echo "selected"; }?> value="<?= $row["Id"]; ?>"><?= $row["tennhom"]; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="icon-question-sign" data-toggle="tooltip" data-placement="right" title="Nhóm quyền của tài khoản được cấp phát">
                                       
                                    </span>
                                </div>                                
                                <div class="separator"></div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span9">
                                <table style="width: 100%;" class="admintable fixedTable">
                                    <tbody class="muted">
                                        <tr>
                                            <td class="key keyRole">
                                                <h5>Quản trị hệ thống</h5>
                                            </td>
                                            <td class="key keyRole">
                                                <h5>Quản lý bán hàng</h5>
                                            </td>
                                            <td class="key keyRole">
                                                <h5>Quản lý nội dung</h5>
                                            </td>
                                            <td class="key keyRole">
                                               <h5>Nhân viên bán hàng</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="BorderListbox">
                                                    <?php
                                                        $result = $myprocess->get_function_list(1);
                                                        while ($row = $result->fetch()){
                                                    ?>
                                                    <p class="innerListbox">
                                                        <label>                                                
                                                            <input <?php if($func->_checkIdinArray($row["Id"], $data["chucnang"])) { echo "checked"; } ?> id="chkItem_<?= $row["Id"]; ?>" type="checkbox" name="administratorRole" onclick="javascript:OnClickRole(<?= $row["Id"]; ?>);"> <?= $row["chucnang"]; ?>
                                                        </label>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="BorderListbox">
                                                    <?php
                                                        $result = $myprocess->get_function_list(2);
                                                        while ($row = $result->fetch()){
                                                    ?>                                         
                                                    <p class="innerListbox">
                                                        <label>
                                                            <input <?php if($func->_checkIdinArray($row["Id"], $data["chucnang"])) { echo "checked"; } ?> id="chkItem_<?= $row["Id"]; ?>" type="checkbox" name="managerRole" onclick="javascript:OnClickRole(<?= $row["Id"]; ?>);"> <?= $row["chucnang"]; ?>
                                                        </label>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="BorderListbox">
                                                    <?php
                                                        $result = $myprocess->get_function_list(3);
                                                        while ($row = $result->fetch()){
                                                    ?>
                                                    <p class="innerListbox">
                                                        <label>
                                                            <input <?php if($func->_checkIdinArray($row["Id"], $data["chucnang"])) { echo "checked"; } ?> id="chkItem_<?= $row["Id"]; ?>" type="checkbox" name="contentRole" onclick="javascript:OnClickRole(<?= $row["Id"]; ?>);"> <?= $row["chucnang"]; ?>
                                                        </label>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="BorderListbox">
                                                    <?php
                                                        $result = $myprocess->get_function_list(4);
                                                        while ($row = $result->fetch()){
                                                    ?>
                                                    <p class="innerListbox">
                                                        <label>
                                                            <input <?php if($func->_checkIdinArray($row["Id"], $data["chucnang"])) { echo "checked"; } ?> id="chkItem_<?= $row["Id"]; ?>" type="checkbox" name="saleRole" onclick="javascript:OnClickRole(<?= $row["Id"]; ?>);"> <?= $row["chucnang"]; ?>
                                                        </label>
                                                    </p>
                                                    <?php } ?>
                                               </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                                <div class="separator"></div>
                            </div>
                        </div>
                     </div>
                     
                        <style type="text/css">
                            .keyRole
                            {
                                width: 25%;
                                text-transform: uppercase;
                            }
                        </style>
                        <script type="text/javascript">
							<?php if(!empty($_SESSION["message"]["notyfy"])){ ?>
								$(function () {
									func_notyfy("top", "information", "<?= $_SESSION["message"]["notyfy"]; ?>");
								});
							<?php unset($_SESSION["message"]["notyfy"]);} ?>
							
							$.validator.setDefaults(
							{
								submitHandler: function(form) {
									//alert("submitted!");
									//var val = $("input[type=submit][clicked=true]").val();
									//alert(val);
									
									//var btn = $( ":input[type=submit]:focus" );
									//alert(btn.val());
									//$("#validateSubmitForm").submit();
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
										firstname: "required",
										lastname: "required",
										username: {
											required: true,
											minlength: 2
										},
										password: {
											minlength: 5
										},
										confirm_password: {
											equalTo: "#password"
										},
										email: {
											required: true,
											email: true
										},
										phone: {
											required: true,
											number: true
										},
										permission: {
											required: function(element) {
												return $("#ddlRoleTypes").val() == "0";
											}
										}
									},
									messages: {
										firstname: "Họ đệm không được bỏ trống",
										lastname: "Tên không được bỏ trống",
										username: {
											required: "Tên đăng nhập không được bỏ trống",
											minlength: "Tên đăng nhập phải lớn hơn 2 ký tự"
										},
										password: {
											minlength: "Mật khẩu phải lớn hơn 5 ký tự"
										},
										confirm_password: {
											minlength: "Xác nhận mật khẩu phải lớn hơn 5 ký tự",
											equalTo: "Xác nhận mật khẩu không khớp với mật khẩu"
										},
										email: "Email không được bỏ trống",	
										phone: {
											required: "Số điện thoại không được bỏ trống"
										},
										permission: {
											required: "Chọn nhóm quyền cho tài khoản được cấp phát"
										}
									}
								});
							
								// propose username by combining first- and lastname
								$("#username").focus(function() {
									var firstname = $("#firstname").val();
									var lastname = $("#lastname").val();
									if(firstname && lastname && !this.value) {
										this.value = firstname + "." + lastname;
									}
								});
							
								//code to hide topic selection, disable for demo
								var newsletter = $("#newsletter");
								// newsletter topics are optional, hide at first
								var inital = newsletter.is(":checked");
								var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
								var topicInputs = topics.find("input").attr("disabled", !inital);
								// show when newsletter is checked
								newsletter.click(function() {
									topics[this.checked ? "removeClass" : "addClass"]("gray");
									topicInputs.attr("disabled", !this.checked);
								});
							});
							
                            function OnChangeRoleType() {
                                var selected = document.getElementById('ddlRoleTypes').value;
                                switch (selected) {
                                    case "4": UnCheckAll(); CheckByRole("saleRole"); break;
                                    case "3": UnCheckAll(); CheckByRole("contentRole"); break;
                                    case "2": UnCheckAll(); CheckByRole("saleRole"); CheckByRole("managerRole"); break;
                                    case "1": UnCheckAll(); CheckByRole("saleRole"); CheckByRole("contentRole"); CheckByRole("managerRole"); CheckByRole("administratorRole"); break;
                                    default: UnCheckAll(); break;
                                }
                            }
                            function OnClickRole(roleid) {
                                var id = "chkItem_" + roleid;
                                var chk = document.getElementById(id);
                                var currentChecked =jQuery("[id$='hdRoles']").val();
                                if (chk.checked == true) { currentChecked = currentChecked + roleid + ","; }
                                else { currentChecked = currentChecked.replace("," + roleid + ",", ","); }jQuery("[id$='hdRoles']").val(currentChecked);
                            }
                            function CheckByRole(roleName) {
                                var arr = document.getElementsByName(roleName);
                                var roleChecked = '';
                                for (var i = 0; i < arr.length; i++) {
                                    var chk = arr[i]; chk.checked = true;
                                    var id = chk.id.replace("chkItem_", "");
                                    roleChecked = roleChecked + Number(id) + ","
                                }
                                var currentChecked =jQuery("[id$='hdRoles']").val();jQuery("[id$='hdRoles']").val(currentChecked + roleChecked);
                            }
                            function UnCheckByRole(roleName) {
                                var arr = document.getElementsByName(roleName);
                                for (var i = 0; i < arr.length; i++) { var chk = arr[i]; chk.checked = false; }
                            }
                            function UnCheckAll() {
                                UnCheckByRole("saleRole");
                                UnCheckByRole("managerRole");
                                UnCheckByRole("contentRole");
                                UnCheckByRole("administratorRole");jQuery("[id$='hdRoles']").val("");
                            }							
                        </script>                                  
                </div>
                    
                </div>
            </div>
            <!-- End Content -->        
        </div>
   	<!-- End Wrapper -->
</div>
<input type="hidden" name="hidden" value="user.edit" />
<input type="hidden" name="act" value="save"/>
<input type="hidden" name="hdRoles" id="hdRoles" value="<?= $data["chucnang"]; ?>" />
<input type="hidden" name="user_id" id="user_id" value="<?= $data["Id"]; ?>" />
</form>
<?php } ?>