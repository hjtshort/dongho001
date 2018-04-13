<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class category_process extends product
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
		
		public function get_category_edit( $danhmuc_id )
	    {
		    $sql = "SELECT 
						danhmucsanpham.danhmuc_id,
						danhmucsanpham.danhmuccha,
						danhmucsanpham.tieude,
						danhmucsanpham.alias,
						danhmucsanpham.tomtat,
						danhmucsanpham.ngaythem,
						danhmucsanpham.ngaysua,
						danhmucsanpham.thutu,
						danhmucsanpham.hienthi,
						danhmucsanpham.luotxem,
						danhmucsanpham.seo_tieudetrang,
						danhmucsanpham.seo_thetukhoa,
						danhmucsanpham.seo_themota
					FROM danhmucsanpham
					WHERE danhmucsanpham.danhmuc_id = ?";
		    $result = $this->dbObj->SqlQueryOutputResult($sql, array( $danhmuc_id ));
		    return $result;
	    }		
        
	    function process_edit_category($danhmuccha, $tieude, $tomtat, $ngaysua, $hienthi, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $danhmuc_id)
        {			
		    $sql = "UPDATE danhmucsanpham SET 
						danhmucsanpham.danhmuccha = ?,
						danhmucsanpham.tieude = ?,
						danhmucsanpham.tomtat = ?,
						danhmucsanpham.ngaysua = ?,
						danhmucsanpham.hienthi = ?,
						danhmucsanpham.seo_tieudetrang = ?,
						danhmucsanpham.seo_thetukhoa= ?,
						danhmucsanpham.seo_themota = ?
					WHERE danhmucsanpham.danhmuc_id = ?";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuccha, $tieude, $tomtat, $ngaysua, $hienthi, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $danhmuc_id)) <> FALSE) {
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
			$validator->addValidation("category_title","minlen=2","Tên danh mục phải lớn hơn 2 ký tự");
			
			$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
				
					$category_process = new category_process;
					$check = true;
					
					$category_id 			= intval( $conf['geturl']['id'] );
			
					$parent_category 		= $_POST["parent_category"];
					$category_title 		= $_POST["category_title"];
					
					$category_desc 			= $_POST["category_desc"];
					$date_edit				= $func->_formatdate(date("d/m/Y"));
					
					if(isset($_POST["category_display"])){
						$category_display		= 1;
					} else {
						$category_display		= 0;
					}								
					
					$category_seo_title		= $_POST["category_seo_title"];
					$category_seo_keyword	= $_POST["category_seo_keyword"];
					$category_seo_desc 		= $_POST['category_seo_desc'];
					
					if($category_process->process_edit_category($parent_category, $category_title, $category_desc, $date_edit, $category_display, $category_seo_title, $category_seo_keyword, $category_seo_desc, $category_id) <> FALSE){

						// START UPDATE lai toan bo danhmuc_id_assoc de quy
						$result = $category_process->get_category_view();
						$table_row = $result->fetchAll();
						$category_process->update_child_listId( $table_row, $query );
						$category_process->update_child_listId_process($query);
						// END UPDATE lai toan bo danhmuc_id_assoc de quy
						
						$_SESSION["message"]["notyfy"] = "Đã chỉnh sữa danh mục <strong>$category_title</strong> thành công !";
						$func->_redirect($index_backend . "product/category/edit/$category_id.html");
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