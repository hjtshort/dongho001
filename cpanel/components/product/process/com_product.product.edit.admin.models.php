<?php defined( '_VALID_MOS' ) or die( include("404.php") );

	class process 
	{
		public $dbObj;
		
		function __construct()
		{
			$this->dbObj = new classDb();
		}
		
		// ham su ly chinh sua san pham ( product )
		function process_editproduct($SPID, $product_name, $alias, $product_image, $mylar, $latex, $price, 
									$giftsize_name, 
									$giftsize_value, 
									$chocolate_name, 
									$chocolate_value, 
									$bear_name, 
									$bear_value, 
									$description, $content, $hot_product, $status, $status_product, $date_add, $book_category_id, $keyword, $show_comment, $Id)
		{		
			$sql = "UPDATE `book_product` SET
					`book_product`.`SPID` = ?,
					`book_product`.`product_name` = ?, 
					`book_product`.`alias` = ?,
					`book_product`.`product_image` = ?, 
					`book_product`.`mylar` = ?, 
					`book_product`.`latex` = ?,
					`book_product`.`price` = ?,
					`book_product`.`giftsize_name` = ?, 
					`book_product`.`giftsize_value` = ?, 
					`book_product`.`chocolate_name` = ?,					
					`book_product`.`chocolate_value` = ?,
					`book_product`.`bear_name` = ?,					
					`book_product`.`bear_value` = ?,
					`book_product`.`description` = ?, 
					`book_product`.`content` = ?,
					`book_product`.`hot_product` = ?, 
					`book_product`.`status` = ?, 
					`book_product`.`status_product` = ?,
					`book_product`.`date_add` =? , 
					`book_product`.`book_category_id` = ?,					
                    `book_product`.`keyword` = ?,
                    `book_product`.`show_comment` = ?
					WHERE `book_product`.`Id` = ? ";
			
			$result = $this->dbObj->SqlQueryInputResult($sql, array( 
									$SPID, 
									$this->dbObj->fix_quotes_dquotes($product_name), 
									$alias, $product_image, $mylar, $latex, $price, 
									$giftsize_name, 
									$giftsize_value, 
									$chocolate_name, 
									$chocolate_value, 
									$bear_name, 
									$bear_value, 
									$this->txt_htmlspecialchars($description), 
									$this->txt_htmlspecialchars($content), $hot_product, $status, $status_product, $date_add, $book_category_id, $keyword, $show_comment, $Id), $lang);
			
			if ($result != false) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
        
        function process_addtab($product_id, $tab_title, $tab_content, $tab_active)
        {
            echo $product_id;
            
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
            
            $this->dbObj->SqlQueryInputResult($sql, array($this->dbObj->fix_quotes_dquotes($tab_title), $this->txt_htmlspecialchars($tab_content), $product_id, $tab_active));
        }
        
        function process_updatetab($tab_title, $tab_content, $tab_active, $tab_id)
        {
            $sql = "
                    UPDATE `book_product_tabs`
                    SET `title` = ?,
                        `content` = ?,
                        `status` = ?
                    WHERE `id` = ?";
            
            $this->dbObj->SqlQueryInputResult($sql, array($this->dbObj->fix_quotes_dquotes($tab_title), $this->txt_htmlspecialchars($tab_content), $tab_active, $tab_id));
        }
        
        function process_edittabs($tabs_title, $tabs_content, $tabs_active, $tabs_id, $product_id)
        {
            $count = count($tabs_title);

            if ($count > 0)
            {
                $sql = "
                        DELETE FROM `book_product_tabs`
                        WHERE `id` NOT IN (" . implode(',', $tabs_id) . ")
                                AND `product_id` = ?
                ";
                
                $this->dbObj->SqlQueryInputResult($sql, array($product_id));
                
                $keys = array_keys($tabs_title);
                
                for ($i = 0; $i < $count; $i++)
                {
                    if ($tabs_id[$keys[$i]] > -1)
                    {
                        $this->process_updatetab(
                                        $this->dbObj->fix_quotes_dquotes($tabs_title[$keys[$i]]),
                                        $this->txt_htmlspecialchars($tabs_content[$keys[$i]]),
                                        $tabs_active[$keys[$i]],
                                        $tabs_id[$keys[$i]]
                        );
                    }
                    else
                    {
                        $this->process_addtab(
                                        $product_id,
                                        $this->dbObj->fix_quotes_dquotes($tabs_title[$keys[$i]]),
                                        $this->txt_htmlspecialchars($tabs_content[$keys[$i]]),
                                        $tabs_active[$keys[$i]]
                        );
                    }
                }
            }
            else
            {
                $sql = "
                        DELETE FROM `book_product_tabs`
                        WHERE `product_id` = ?
                ";
                
                $this->dbObj->SqlQueryInputResult($sql, array($product_id));
            }
        }
		
		function txt_htmlspecialchars($t="")
		{
			// Use forward look up to only convert & not &#123;
			//$t = str_replace( "<", "&lt;"  , $t );
			//$t = str_replace( ">", "&gt;"  , $t );
			$t = str_replace( "\\", ""  , $t );
			//$t = str_replace( '"', "", $t );
			
			return $t; // A nice cup of?
		}
		
		function getProduct($id)
		{
			$sql = "SELECT
                      `book_product`.`book_category_id`,
                      `book_product`.`Id` AS `book_product_id`,
					  `book_product`.`SPID`,
                      `book_product`.`product_name`,
                      `book_product`.`alias`,
					  `book_product`.`product_image`,
					  `book_product`.`mylar`,
					  `book_product`.`latex`,
					  `book_product`.`price`,
                      `book_product`.`giftsize_name`,
                      `book_product`.`giftsize_value`,					  
					  `book_product`.`chocolate_name`,
					  `book_product`.`chocolate_value`,
					  `book_product`.`bear_name`,
					  `book_product`.`bear_value`,					  
					  `book_product`.`description`,
                      `book_product`.`content`,
					  `book_product`.`hot_product`,
                      `book_product`.`num_view`,
					  `book_product`.`status`,
                      `book_product`.`status_product`,
					  `book_product`.`date_add`,
                      `book_product`.`order_num`,
					  `book_product`.`account_id`,                      
                      `book_product`.`keyword`,
                      `book_product`.`show_comment`,
                      `book_product`.`lang_code`
					FROM
					  `book_product`
					WHERE `book_product`.`Id`= ?";
			return $this->dbObj->SqlQueryOutputResult($sql, array($id));
		}
        
        public function get_tabs($product_id)
        {
            $sql = "
                    SELECT `id`,`title`,`content`,`product_id`,`status`
                    FROM `book_product_tabs`
                    WHERE `product_id` = ?";
            
            return $this->dbObj->SqlQueryOutputResult($sql, array($product_id));
        }
        
        public function category_multi_level($parentid, $lang_code)
        {
            $sql = "SELECT
                        `product_category`.`cat_id`,
                        `product_category`.`title`,
                        `product_category`.`date_add`,
                        `product_category`.`enabled`,
                        `product_category`.`ordering`,
                        `product_category`.`num_view`
                    FROM
                        `product_category`
                    WHERE
                        `parent_id` = ?
                        AND `lang_code` = ?
                    ORDER BY
                    	`ordering`";
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
        
        case "submit_com_product_edit":
            
            $myProcess = new process();
            
            if($_POST["task"] == "save" || $_POST["task"] == "apply")
            {
				
				// Thuộc tính sản phẩm
				// gift size
                $properties_name_array = $_POST["size_properties_name"]; $properties_value_array = $_POST["size_properties_value"];
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
				                
                $image_array = $_POST["image_file"];
                for ($i=0; $i < count($image_array); $i++)
                {
                    if($i == 0)
                    {
                        $image_source .= $image_array[$i];
                    }
                    else
                    {
                        $image_source .= "|" . $image_array[$i];
                    }
                }
				
				$mylar = $_POST["Mylar"];
				$latex = $_POST["Latex"];  
				
                if ($myProcess->process_editproduct(    $_POST["product_code"],//$SPID
                                                        $myProcess->txt_htmlspecialchars($_POST["product_name"]),//$product_name
                                                        $func->_removesigns($_POST["alias"]),//$alias
                                                        $image_source,//$product_image
                                                        $mylar,//$attach_info
                                                        $latex,//$price
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
                                                        $_POST["published"],//$status
                                                        $_POST["cheked_product"],//$status_product
                                                        $func->_formatdate($_POST["date_add"]),//$date_add
                                                        $_POST["catid"],//$book_category_id                                                                                                               
                                                        $_POST["keyword"],//$keyword
                                                        $_POST["show_comment"],//$show_comment
														$_POST["product_id"]//$Id
                                                        ) <> FALSE)
                {
                    $myProcess->process_edittabs($_POST['html_tab_title'], $_POST['html_tabs'], $_POST['html_tab_active'], $_POST['html_tab_id'], $_POST["product_id"]);
                    
                    $_SESSION['msg'] = "Chỉnh sửa sản phẩm thành công!";
                    
                    if ($_POST["task"] == "apply")
                    {
                        $func->_redirect(".?com=com_product&view=product&task=edit&id=" . intval($_POST["product_id"]));
                    }
                    else
                    {
                        $func->_redirect(".?com=com_product&view=product&task=view&catid=" . intval($_POST["catid"]));
                    }
                    
                    exit();
                }
                else
                {
                    $_SESSION['msg'] = "Đã xảy ra lỗi trong quá trình chỉnh sửa sản phẩm!";
                }
            }
            else if ($_POST["task"] == "cancel")
            {
                $func->_redirect(".?com=com_product&view=product&task=view&catid=" . intval($_POST["catid"]));
            }

            break;
        
        default:
            $func->_redirect(".");
            exit();
            break;
    }