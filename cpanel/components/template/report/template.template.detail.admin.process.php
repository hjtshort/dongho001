<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class template_process extends template
    {
        public $template_id;
        function __construct()
        {
            global $conf;
            parent::__construct();
            $this->template_id = $conf['geturl']['id'];
        }
        public function get_template_count( $search_value, $danhmuc_id = 0, $title = "%%", $condition= "" )
	    {
			@$condition = ""; @$danhmuc_id = intval( @$search_value[3] );

			if( @$search_value[0] != "" || @$search_value[1] != "" ){
				$condition .= " AND giaodien.gia >= " . intval(str_replace(",", "", $search_value[0])) . " AND giaodien.gia <= ". intval(str_replace(",", "", $search_value[1]));
			}

			if(!empty($search_value[2])){
				$title = "%" . $search_value[2] . "%";
			}

			if($danhmuc_id > 0){
				$condition .= "AND giaodien.danhmuc_id IN (SELECT danhmuc_id FROM danhmucgiaodien WHERE FIND_IN_SET($danhmuc_id, danhmuc_id_assoc))";
			}

		    $query = "SELECT COUNT(giaodien.Id) as totalrow
					FROM giaodien
					INNER JOIN danhmucgiaodien ON danhmucgiaodien.danhmuc_id = giaodien.danhmuc_id
					WHERE giaodien.tengiaodien LIKE ? $condition";

		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $title ));
			if ($row = $result->fetch()) {
				return $row['totalrow'];
			}
	    }

		public function template_detail()
	    {
			
		    $query = "SELECT
						giaodien.Id,
						giaodien.magiaodien,
						giaodien.danhmuc_id,
						giaodien.taikhoan_id,
						giaodien.tengiaodien,
						giaodien.tacgia_id,
						giaodien.hinhanh,
						giaodien.hienthi,
						giaodien.chophepdathang,
						giaodien.solanxem,
						taikhoanquantri.ten as ten_tacgia,
						taikhoanquantri.ho as ho_tacgia,
						danhmucgiaodien.tieude AS danhmuc,
						(SELECT count(donhang_chitiet.id) FROM donhang_chitiet WHERE product_id = giaodien.Id) as luottai
					FROM giaodien
					LEFT JOIN danhmucgiaodien ON danhmucgiaodien.danhmuc_id = giaodien.danhmuc_id
					LEFT JOIN taikhoanquantri ON tacgia_id = taikhoanquantri.Id
					WHERE giaodien.Id  = ?";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array( $this->template_id));
		    return $result;
	    }
	    public function history_download()
	    {

		    $query = "SELECT product_id,customer_uid,d.date_create, d.customer_id,
                                (SELECT count(d2.id)
                                FROM donhang_chitiet
                                LEFT JOIN donhang d2 ON donhang_chitiet.order_id = d2.id
                                WHERE donhang_chitiet.product_id  = product_id AND d2.customer_id = d.customer_id) as luottai
					FROM donhang_chitiet
					LEFT JOIN donhang d ON donhang_chitiet.order_id = d.id
					LEFT JOIN khachhang k ON d.customer_id = k.customer_id
					WHERE donhang_chitiet.product_id  = ?
					GROUP BY customer_uid
					ORDER BY d.date_create DESC ";
		    $result = $this->dbObj->SqlQueryOutputResult($query, array($this->template_id));
		    return $result;
	    }
    }
    
    /*  ___________________________
       |                           |
       |          HANDLER          |
       |___________________________|
    */
    
	$template_process = new template_process;
	
    switch(@$_POST["hidden"]){

        case "";
        	// khoi dau trang khong co gia tri submit. khong lam zi ca
        break;
        
        default:
            $func->_redirect(".");
        break;
    }