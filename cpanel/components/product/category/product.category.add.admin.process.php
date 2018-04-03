<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class category_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }		
        
	    function process_add_category($danhmuc_id, $danhmuccha, $tieude, $alias, $tomtat ,$hinhanh , $ngaythem, $ngaysua, $thutu, $hienthi, $luotxem, $seo_tieudetrang, $seo_thetukhoa, $seo_themota)
        {			
		    $sql = "INSERT INTO danhmucsanpham(
						danhmucsanpham.danhmuc_id,
						danhmucsanpham.danhmuccha,
						danhmucsanpham.tieude,
						danhmucsanpham.alias,
						danhmucsanpham.tomtat,
						danhmucsanpham.hinhanh,
						danhmucsanpham.ngaythem,
						danhmucsanpham.ngaysua,
						danhmucsanpham.thutu,
						danhmucsanpham.hienthi,
						danhmucsanpham.luotxem,
						danhmucsanpham.seo_tieudetrang,
						danhmucsanpham.seo_thetukhoa,
						danhmucsanpham.seo_themota)
				    VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?)";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuc_id, $danhmuccha, $tieude, $alias, $tomtat ,$hinhanh , $ngaythem, $ngaysua, $thutu, $hienthi, $luotxem, $seo_tieudetrang, $seo_thetukhoa, $seo_themota)) <> FALSE) {
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
        
        case "category.add";
		
			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();						
			
			//category_title
			$validator->addValidation("category_title","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("category_title","minlen=2","Tên danh mục phải lớn hơn 2 ký tự");
			
			$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$category_process = new category_process;
					$check = true;
					
					$category_id 			= rand();
			
					$parent_category 		= $_POST["parent_category"];
					$category_title 		= $_POST["category_title"];
					$alias 					= $func->_removesigns($_POST["category_title"]);
                    $image_src_temp         = array_slice(explode('/',$_POST['image_src']),4);
                    $category_img 			= implode('/',$image_src_temp);
					$category_desc 			= $_POST["category_desc"];
					$date_add				= $func->_formatdate($_POST["date_add"]);
					$date_edit				= $func->_formatdate($_POST["date_add"]);
					$sort					= $func->process_getmaxid("danhmucsanpham", "thutu");

                    $category_display		= isset($_POST["category_display"])?1:0;
					
					$num_view				= 1;
					
					$category_seo_title		= $_POST["category_seo_title"];
					$category_seo_keyword	= $_POST["category_seo_keyword"];
					$category_seo_desc 		= $_POST['category_seo_desc'];
					
					if($category_process->process_add_category($category_id, $parent_category, $category_title, $alias, $category_desc, $category_img,$date_add, $date_edit, $sort, $category_display, $num_view, $category_seo_title, $category_seo_keyword, $category_seo_desc) <> FALSE){
						
						// UPDATE lai toan bo danhmuc_id_assoc de quy
						$result = $category_process->get_category_view();
						$table_row = $result->fetchAll();
						$category_process->update_child_listId( $table_row, $query );
						$category_process->update_child_listId_process($query);
						// END UPDATE lai toan bo danhmuc_id_assoc de quy
						
						$_SESSION["message"]["notyfy"] = "Đã thêm danh mục <strong>$category_title</strong> thành công !";
						$func->_redirect($index_backend . "product/category/add.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thêm danh mục $category_title không thực hiện được !";
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