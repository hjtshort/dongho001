<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class news_process extends content_model
    {

		public function get_news_edit( $news_id = 0 )
	    {			
		    $query = "SELECT
						tintuc.Id,
						tintuc.danhmuc_id,
						tintuc.tieude,
						tintuc.alias,
						tintuc.motangan,
						tintuc.motachitiet,
						tintuc.ngaythem,
						tintuc.filehinhanh,
						tintuc.chuthichanh,
						tintuc.hienthi,
						tintuc.thutu,
						tintuc.tinnoibat,
						tintuc.solanxem,
						tintuc.ngaysua,
						danhmuctintuc.tieude as `danhmuc`
					FROM tintuc
					INNER JOIN danhmuctintuc ON danhmuctintuc.danhmuc_id = tintuc.danhmuc_id
					WHERE tintuc.Id = ?
					LIMIT 1";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $news_id ));
		    return $result;
	    }	
        
	    function process_edit_news($danhmuc_id, $tieude,$alias, $motangan, $motachitiet,
					$ngaysua, $filehinhanh, $chuthichanh, $hienthi, $tinnoibat, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $news_id)
        {			
		    $sql = "UPDATE tintuc SET 
						tintuc.danhmuc_id = ?,
						tintuc.tieude = ?,
						tintuc.alias = ?,
						tintuc.motangan = ?,
						tintuc.motachitiet = ?,
						tintuc.ngaysua = ?,
						tintuc.filehinhanh = ?,
						tintuc.chuthichanh = ?,
						tintuc.hienthi = ?,
						tintuc.tinnoibat = ?,
						tintuc.seo_tieudetrang = ?,
						tintuc.seo_thetukhoa = ?,
						tintuc.seo_themota = ?
					WHERE tintuc.Id = ? ";

            if ($this->dbObj->SqlQueryInputResult($sql, array($danhmuc_id, $tieude,$alias, $motangan, $motachitiet,
					$ngaysua, $filehinhanh, $chuthichanh, $hienthi, $tinnoibat, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $news_id)) <> FALSE) {
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
        
        case "news.edit";
		
			include_once("../libraries/validation/validation.php");

			$check = false;
		
			$validator = new FormValidator();						
			
			//news_title
			$validator->addValidation("news_title","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("news_title","minlen=5","Tên danh mục phải lớn hơn 5 ký tự");
			
			//$validator->addValidation("parent_category","req","Vui lòng chọn danh mục cha");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){
					
					$news_process = new news_process;
					$check = true;
					
					$news_id 			= intval( $conf['geturl']['id'] );

					$danhmuc_id 		= implode(',',$_POST["parent_category"]);
					$tieude 			= $_POST["news_title"];
                    $alias 			    = $func->_removesigns($tieude);

					$motangan 			= $_POST["news_desc"];
					$motachitiet 		= $_POST["news_detail"];
					$ngaysua			= strtotime($_POST["date_update"].' '.$_POST["time_update"]);
                    $image_src_temp     = array_slice(explode('/',$_POST['image_src']),4);
                    $filehinhanh 	    = implode('/',$image_src_temp);

					$chuthichanh 		= $_POST["image_note"];
					
					if(isset($_POST["news_display"])){ $hienthi = 1;} else { $hienthi = 0; }					
					
					if(isset($_POST["news_focus"])){ $tinnoibat	= 1; } else { $tinnoibat= 0; }
					
					$seo_tieudetrang	= "";
					$seo_thetukhoa		= "";
					$seo_themota 		= "";
					
					if($news_process->process_edit_news($danhmuc_id, $tieude,$alias, $motangan, $motachitiet,
					$ngaysua, $filehinhanh, $chuthichanh, $hienthi, $tinnoibat, $seo_tieudetrang, $seo_thetukhoa, $seo_themota, $news_id) <> FALSE){
						
						$_SESSION["message"]["notyfy"] = "Đã sửa bản tin <strong>$tieude</strong> thành công !";
						$func->_redirect($index_backend . "content/news/edit/$news_id.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Sửa bản tin $news_title không thực hiện được !";
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