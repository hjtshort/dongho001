<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class news_process extends content_model
    {
        
	    function process_add_news($news_id, $danhmuc_id, $taikhoan_id, $tieude, $alias, $motangan, $motachitiet, $ngaythem, 
					$ngaysua, $filehinhanh, $tuychonanh, $chuthichanh, $hienthi, $thutu, $tinnoibat, $solanxem, $seo_tieudetrang, $seo_thetukhoa, $seo_themota)
        {			
		    $sql = "INSERT INTO tintuc(
						tintuc.Id,
						tintuc.danhmuc_id,
						tintuc.taikhoan_id,
						tintuc.tieude,
						tintuc.alias,
						tintuc.motangan,
						tintuc.motachitiet,
						tintuc.ngaythem,
						tintuc.ngaysua,
						tintuc.filehinhanh,
						tintuc.tuychonanh,
						tintuc.chuthichanh,
						tintuc.hienthi,
						tintuc.thutu,
						tintuc.tinnoibat,
						tintuc.solanxem,
						tintuc.seo_tieudetrang,
						tintuc.seo_thetukhoa,
						tintuc.seo_themota)
				    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ? ,?, ?)";

            if ($this->dbObj->SqlQueryInputResult($sql, array($news_id, $danhmuc_id, $taikhoan_id, $tieude, $alias, $motangan, $motachitiet, $ngaythem, 
					$ngaysua, $filehinhanh, $tuychonanh, $chuthichanh, $hienthi, $thutu, $tinnoibat, $solanxem, $seo_tieudetrang, $seo_thetukhoa, $seo_themota)) <> FALSE) {
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
        
        case "news.add";
		
			include_once("../libraries/validation/validation.php");
			$check = false;
		
			$validator = new FormValidator();						
			
			//news_title
			$validator->addValidation("news_title","req","Tên danh mục không được bỏ trống");
			$validator->addValidation("news_title","minlen=5","Tên danh mục phải lớn hơn 5 ký tự");
			
			//$validator->addValidation("parent_category","req","Vui lòng chọn danh mục");
			
			if($validator->ValidateForm())
			{
				if($_POST["act"] == "save"){

					$news_process = new news_process;
					$check = true;
					
					$news_id 			= rand();
			
					$danhmuc_id 		= implode(',',$_POST["parent_category"]);
					$taikhoan_id 		= $_SESSION["wti"]["Id"];
					$tieude 			= $_POST["news_title"];
					$alias 				= $func->_removesigns($tieude);
					
					$motangan 			= $_POST["news_desc"];
					$motachitiet 		= $_POST["news_detail"];
					$ngaythem			= strtotime($_POST["date_add"].' '.$_POST["time_add"]);
					$ngaysua			= strtotime($_POST["date_add"].' '.$_POST["time_add"]);
                    $image_src_temp     = array_slice(explode('/',$_POST['image_src']),4);
                    $filehinhanh 	    = implode('/',$image_src_temp);
					$tuychonanh 		= 0;
					$chuthichanh 		= $_POST["image_note"];

					if(isset($_POST["news_display"])){ $hienthi = 1;} else { $hienthi = 0; }
					
					$sort				= $func->process_getmaxid("tintuc", "thutu");
					
					if(isset($_POST["news_focus"])){ $tinnoibat	= 1; } else { $tinnoibat= 0; }
					
					$num_view			= 1;
					
					$seo_tieudetrang	= "";
					$seo_thetukhoa		= "";
					$seo_themota 		= "";
					
					if($news_process->process_add_news($news_id, $danhmuc_id, $taikhoan_id, $tieude, $alias, $motangan, $motachitiet, $ngaythem, 
					$ngaysua, $filehinhanh, $tuychonanh, $chuthichanh, $hienthi, $sort, $tinnoibat, $num_view, $seo_tieudetrang, $seo_thetukhoa, $seo_themota) <> FALSE){

						
						$_SESSION["message"]["notyfy"] = "Đã thêm bản tin <strong>$tieude</strong> thành công !";
						$func->_redirect($index_backend . "content/news/view.html");
						exit;
					} else {
						$_SESSION["message"]["notyfy"] = "Thêm bản tin $news_title không thực hiện được !";
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