<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class category_process extends content_model
    {
		public function get_category_edit( $danhmuc_id )
	    {
		    $sql = "SELECT 
						danhmuctintuc.danhmuc_id,
						danhmuctintuc.danhmuccha,
						danhmuctintuc.tieude,
						danhmuctintuc.alias,
						danhmuctintuc.tomtat,
						danhmuctintuc.hinhanh,
						danhmuctintuc.ngaythem,
						danhmuctintuc.ngaysua,
						danhmuctintuc.thutu,
						danhmuctintuc.hienthi,
						danhmuctintuc.luotxem,
						danhmuctintuc.seo_tieudetrang,
						danhmuctintuc.seo_thetukhoa,
						danhmuctintuc.seo_themota
					FROM danhmuctintuc
					WHERE danhmuctintuc.danhmuc_id = ?";
		    $result = $this->dbObj->SqlQueryOutputResult($sql, array( $danhmuc_id ));
		    return $result;
	    }		
        
	    function process_edit_category($danhmuccha, $tieude,$alias, $tomtat, $ngaysua, $hienthi, $seo_tieudetrang, $seo_thetukhoa, $seo_themota,$hinhanh, $danhmuc_id)
        {			
		    $sql = "UPDATE danhmuctintuc SET 
						danhmuctintuc.danhmuccha = ?,
						danhmuctintuc.tieude = ?,
						danhmuctintuc.alias = ?,
						danhmuctintuc.tomtat = ?,
						danhmuctintuc.ngaysua = ?,
						danhmuctintuc.hienthi = ?,
						danhmuctintuc.seo_tieudetrang = ?,
						danhmuctintuc.seo_thetukhoa= ?,
						danhmuctintuc.seo_themota = ?,
						danhmuctintuc.hinhanh = ?
					WHERE danhmuctintuc.danhmuc_id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuccha, $tieude,$alias, $tomtat, $ngaysua, $hienthi, $seo_tieudetrang, $seo_thetukhoa, $seo_themota,$hinhanh, $danhmuc_id)) <> FALSE) {
                return true;
            } else {
                return false;
            }
	    }
    }
    
    /*  ___________________________
       |                           |
       |          HANDLER          |
       |___________________________|
    */
    
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;                       
        
        case "category.edit";
		
			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();						
			
			//category_title
			$validator->addValidation("category_title","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("category_title","minlen=5","Tên danh mục phải lớn hơn 5 ký tự");
			
			$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){



					$category_process = new category_process;
					$check = true;
					
					$category_id 			= intval( $conf['geturl']['id'] );
			
					$parent_category 		= $_POST["parent_category"];
					$category_title 		= $_POST["category_title"];
					$category_alias 		= $category_process->_removesigns($category_title);

					$category_desc 			= $_POST["category_desc"];

                    $image_src_temp         = array_slice(explode('/',$_POST['image_src']),4);
                    $category_img 			= implode('/',$image_src_temp);
					$date_edit				= $func->_formatdate(date("d/m/Y"));
					
					if(isset($_POST["category_display"])){
						$category_display		= 1;
					} else {
						$category_display		= 0;
					}								
					
					$category_seo_title		= $_POST["category_seo_title"];
					$category_seo_keyword	= $_POST["category_seo_keyword"];
					$category_seo_desc 		= $_POST['category_seo_desc'];
					
					if($category_process->process_edit_category($parent_category, $category_title,$category_alias, $category_desc, $date_edit, $category_display, $category_seo_title, $category_seo_keyword, $category_seo_desc,$category_img, $category_id) <> FALSE){

						// START UPDATE lai toan bo danhmuc_id_assoc de quy
						$result = $category_process->get_category_view();
						$table_row = $result->fetchAll();						
						$category_process->update_child_listId( $table_row, $query );						
						$category_process->update_child_listId_process($query);
						// END UPDATE lai toan bo danhmuc_id_assoc de quy
						
						$_SESSION["message"]["notyfy"] = "Đã chỉnh sữa danh mục <strong>$category_title</strong> thành công !";

						$func->_redirect($index_backend . "content/category/edit/$category_id.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Chỉnh sữa danh mục $category_title không thực hiện được !";
						$func->_redirect($index_backend);
						exit;
					}
				}
				
			} else {
				
				$check = false;
				$error_hash = $validator->GetErrors();
				foreach($error_hash as $inpname => $inp_err)
				{
					@$_SESSION["validator"][$inpname] = '<p class="error help-block"><span class="label label-important">' . $inp_err . '</span></p>';
				}
			}		           
			
        break;

        
        default:
            $func->_redirect(".");
        break;
    }