<?php

    class template extends core_class
    {
        public $dbObj;
    
        function __construct()
        {
             $this->dbObj = new classDb();
        }
        
        /* 
         * Hàm cập nhật lại toàn bộ giá trị danhmucid_array của các chuyên mục
         * 
         * - Author: love2t
         * - Time: 12:00 05/01/2015
         * 
         */
		 
		 function update_child_listId($table_row, &$query, $danhmuccha = 0, $danhmuc_id_assoc = 0){	 
			foreach($table_row as $key => $row){
				if($row['danhmuccha'] == $danhmuccha){					
					$danhmuc_id_assoc .= "," . $row["danhmuc_id"];
					$query .= "UPDATE danhmucgiaodien SET danhmuc_id_assoc = '" . $danhmuc_id_assoc . "' WHERE danhmuc_id = " . $row["danhmuc_id"] . ";";
					unset($table_row[$key]);
					$this->update_child_listId($table_row, $query, $row['danhmuc_id'], $danhmuc_id_assoc);
					$danhmuc_id_assoc = $danhmuccha;
				}
			}				
		}

        function update_child_listId_process($query)
        {
            if ($this->dbObj->SqlQueryInputResult($query, array(0)) <> FALSE) {
                return true;
            } else {
                return false;
            }
        }        
        
		public function get_category_view()
	    {
		    $sql = "SELECT danhmuc_id, tieude, danhmuccha, hienthi, tomtat, thutu
					FROM danhmucgiaodien
				    ORDER BY `thutu` ASC, `ngaythem` DESC";
		    $result = $this->dbObj->SqlQueryOutputResult($sql, array(0));
		    return $result;
	    }
		
		function category($table_row, &$category, $danhmuccha = 0, $level = "")
		{
			foreach($table_row as $key => $row){
				if($row['danhmuccha'] == $danhmuccha){
					$category[] = array(
						'danhmuc_id'	=>	$row['danhmuc_id'],
						'tieude'		=>	$row["tieude"],
						'danhmuccha'	=>	$row["danhmuccha"],
						'tomtat'		=>	$row["tomtat"],
						'hienthi'		=>	$row["hienthi"],
						'thutu'			=>	$row["thutu"],
						'level'			=>	$level
					);
					unset($table_row[$key]);
					$this->category($table_row, $category, $row['danhmuc_id'], $level . '&nbsp;&nbsp;&nbsp └ ');
					//$synbold = "└";
				}
			}
		}
    }