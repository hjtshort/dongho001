<?php defined( '_VALID_MOS' ) or die( include("404.php") );
	
	class process
	{
	
		public $dbObj;
		
		function __construct()
		{
			$this->dbObj = new classDb();
		}

		function txt_htmlspecialchars($t="")
		{
			// Use forward look up to only convert & not &#123;
			// $t = str_replace( "<", "&lt;"  , $t );
			// $t = str_replace( ">", "&gt;"  , $t );
			$t = str_replace( "\\", ""  , $t );
			//$t = str_replace( '"', "", $t );
			
			return $t; // A nice cup of?
		}

		/* Them san pham */
		function process_addnews(	$SPID, 
									$product_name,
									$alias,
									$product_image, 
									$mylar, 
									$latex, 
									$price, 									
									$giftsize_name, 
									$giftsize_value, 
									$chocolate_name, 
									$chocolate_value, 
									$bear_name, 
									$bear_value, 
									$description,
									$content,
									$hot_product,
									$num_view,
									$status,
									$status_product,
									$date_add,
									$order_num,
									$book_category_id,						
									$account_id,
                                    $keyword,
                                    $show_comment)
		{
			$sql = " INSERT INTO book_product(	`SPID`, 
												`product_name`,
												`alias`,
												`product_image`, 
												`mylar`,
												`latex`,
												`price`, 												
												`giftsize_name`, 
												`giftsize_value`,												
												`chocolate_name`, 
												`chocolate_value`,
												`bear_name`, 
												`bear_value`,												
												`description`, 
												`content`,
												`hot_product`, 
												`num_view`,
												`status`, 
												`status_product`,
												`date_add`, 
												`order_num`,
												`book_category_id`,									
												`account_id`,
                                                `keyword`,
                                                `show_comment`)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$result = $this->dbObj->SqlQueryInputResult($sql, array(	$SPID, 
																		$this->dbObj->fix_quotes_dquotes($product_name), 
																		$alias,
																		$product_image, 
																		$mylar, 
																		$latex, 
																		$price, 																		
																		$giftsize_name, 
																		$giftsize_value, 
																		$chocolate_name, 
																		$chocolate_value, 
																		$bear_name, 
																		$bear_value,  
																		$this->txt_htmlspecialchars($description),
																		$this->txt_htmlspecialchars($content),
																		$hot_product,
																		$num_view,
																		$status,
																		$status_product,
																		$date_add,
																		$this->process_getmaxid("book_product", "order_num"),
																		$book_category_id,
																		$account_id,
                                                                        $keyword,
                                                                        $show_comment), $lang);
				
			if ($result != false)
			{
				return true;
			}
			else
			{
				return false;
			}		
		}
        
        function process_addtabs($product_id, $tabs_title, $tabs_content, $tabs_active)
        {
            $tabs_count = count($tabs_title);
            
            $sql = "
                    INSERT INTO `book_product_tabs` (
                        `title`,
                        `content`,
                        `product_id`,
                        `status`
                    )
                    VALUES (
                        ?, ?, ?, ?
                    )
            ";
            
            for ($i = 0; $i < $tabs_count; $i++)
            {
                $this->dbObj->SqlQueryInputResult($sql, array(
                                        $this->dbObj->fix_quotes_dquotes($tabs_title[$i]),
                                        $this->txt_htmlspecialchars($tabs_content[$i]),
                                        $product_id,
                                        $tabs_active[$i])
                );
            }
        }
		
		/* Lay gia tri lon nhat cua cot trong bang */
		function process_getmaxid($table, $column)
		{
			$sql = "select MAX(`$column`) + 1 As `maxID` from `$table`";		
			
			$result = $this->dbObj->SqlQueryOutputResult($sql, array(0), $lang);
			
			if ($row = $result->fetch())
			{
				if ($row["maxID"] == 0)
				{
					return 1;
				}
				else 
				{
					return $row["maxID"];
				}
			}
		}
        
        public function category_multi_level($parentid, $lang_code)
        {
            $sql = "SELECT `cat_id`, `title`, `date_add`, `enabled`, `num_view`, `ordering`, `parent_id` FROM `product_category` WHERE parent_id = ? AND `lang_code` = ? order by `ordering`";
            $result = $this->dbObj->SqlQueryOutputResult($sql, array($parentid, $lang_code));
            return $result;
        }
	}
    
    /*  ___________________________
       |                           |
       |          HANDLER          |
       |___________________________|
    */
    
    switch ($_POST["hidden"])
    {
        case "":
            break;
        
        case "submit_com_product_add":
            
            $myProcess = new process;
            
            /* Neu chon save hoac apply */
            
            if ($_POST["task"] == "save" || $_POST["task"] == "apply")
            {
                // Thuộc tính sản phẩm
				// gift size
                $properties_name_array = $_POST["properties_name"]; $properties_value_array = $_POST["properties_value"];
				// chocolate
				$chocolate_properties_name_array = $_POST["chocolate_properties_name"]; $chocolate_properties_value_array = $_POST["chocolate_properties_value"];
				// bear
				$bear_properties_name_array = $_POST["bear_properties_name"]; $bear_properties_value_array = $_POST["bear_properties_value"];
                
				// gift size
                $giftsize_name = "";
                $giftsize_value = "";

                for ($i=0; $i < count($properties_name_array); $i++)
                {
                    if (!empty($properties_name_array[$i]) && !empty($properties_value_array[$i]))
                    {
                        $giftsize_name .= (($i > 0) ? "|" : "") . $properties_name_array[$i];
                        $giftsize_value .= (($i > 0) ? "|" : "") . $properties_value_array[$i];
                    }
                }
				
				// chocolate
                $chocolate_name = "";
                $chocolate_value = "";

                for ($i=0; $i < count($chocolate_properties_name_array); $i++)
                {
                    if (!empty($chocolate_properties_name_array[$i]) && !empty($chocolate_properties_value_array[$i]))
                    {
                        $chocolate_name .= (($i > 0) ? "|" : "") . $chocolate_properties_name_array[$i];
                        $chocolate_value .= (($i > 0) ? "|" : "") . $chocolate_properties_value_array[$i];
                    }
                }
				
				
				// bear
                $bear_name = "";
                $bear_value = "";

                for ($i=0; $i < count($bear_properties_name_array); $i++)
                {
                    if (!empty($bear_properties_name_array[$i]) && !empty($bear_properties_value_array[$i]))
                    {
                        $bear_name .= (($i > 0) ? "|" : "") . $bear_properties_name_array[$i];
                        $bear_value .= (($i > 0) ? "|" : "") . $bear_properties_value_array[$i];
                    }
                }
                
                // Hình ảnh sản phẩm
                $image_array = $_POST["image_file"];
                $image_source = "";

                for ($i=0; $i < count($image_array); $i++)
                {
                    if (!empty($image_array[$i]))
                    {
                        $image_source .= (($i > 0) ? "|" : "") . $image_array[$i];
                    }
                }
				
				$mylar = $_POST["Mylar"];
				$latex = $_POST["Latex"];  
				
                if ($myProcess->process_addnews(    $_POST["product_code"],//$SPID
                                                    $_POST["product_name"],//$product_name
                                                    $func->_removesigns($_POST["alias"]),    //$alias
                                                    $image_source,//$product_image
                                                    $mylar,//$attach_info
													$latex,
                                                    $_POST["product_price"] ,//$price
                                                    $giftsize_name, 
													$giftsize_value, 
													$chocolate_name, 
													$chocolate_value, 
													$bear_name, 
													$bear_value, 
                                                    $_POST["html_description"],//$description
                                                    $_POST["html_content"],//$content
                                                    $_POST["hot_product"],//$hot_product
                                                    1,//$num_view
                                                    $_POST["published"],//$status
                                                    $_POST["cheked_product"] ,//$status_product
                                                    $func->_formatdate($_POST["date_add"]),//$date_add
                                                    $myProcess->process_getmaxid("book_product", "order_num"),//$order_num
                                                    $_POST["catid"],//$book_category_id                                                    
                                                    $_SESSION['session']['id'],//$account_id
                                                    $_POST["keyword"],//$keyword
                                                    $_POST["show_comment"]//$show_comment
                                                ) != false)
                {
                    $new_product = $myProcess->process_getmaxid('book_product', 'Id') - 1;
                    $myProcess->process_addtabs($new_product, $_POST['html_tab_title'], $_POST['html_tabs'], $_POST['html_tab_active']);
                    
                    if ($_POST["task"] == "save")
                    {
                        $func->_redirect(".?com=com_product&view=product&task=view&catid=".$_POST["catid"]);
                    }
                    else
                    {
                        $func->_redirect(".?com=com_product&view=product&task=add");
                    }
                    
                    $_SESSION['msg'] = "Sản phẩm mới đã được thêm thành công!";
                    
                    exit();
                }
                else 
                {
                    $_SESSION['msg'] = "Đã có lỗi trong lúc thêm Sản phẩm, vui lòng làm lại!";
                }
            } 
            /* Neu chon huy bo */
            else if ($_POST["task"] == "cancel")
            {
                $func->_redirect(".?com=com_product&view=product&task=view&catid=" . intval($_POST["catid"]));
                exit;
            }
            
            break;
        
        default:
            $func->_redirect(".");
            exit();
            break;
    }