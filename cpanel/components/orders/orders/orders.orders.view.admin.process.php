<?php defined( '_VALID_MOS' ) or die( include("404.php") );

    class orders_process extends orders
    {
        public $dbObj;
        
        function __construct()
        {
            $this->dbObj = new classDb();
        }
        public function get_orders_view($search,$offset,$limit)
        {
            if($offset!=''|| $limit!=''){
                $lim="limit ".$offset.",".$limit;
            }
            else 
                $lim="";
            $a="%".$search."%";
            $sql= " SELECT `id`, `bill_name`, `bill_email`, `bill_address`, `bill_phone`, `note`, `total`, `order_status`,
            `date_create`, `date_update`
            FROM `donhang`
            where bill_name like ?".$lim;
            
             $result = $this->dbObj->SqlQueryOutputResult($sql, array($a));
             return $result;
         
        }
        public function count_orders(){
            $sql= " SELECT `id`, `bill_name`, `bill_email`, `bill_address`, `bill_phone`, `note`, `total`, `order_status`,
            `date_create`, `date_update`
            FROM `donhang`";
            $result = $this->dbObj->SqlQueryOutputResult($sql, array(0))->rowCount();
        }
        public function change_orders($query,$value,$check){     
            
            if ($this->dbObj->SqlQueryInputResult($query, array($value, $check)) <> FALSE) {
                return true;
            } else {
                return false;
            }
        }
        public function delete_orders($query,$check){
            if ($this->dbObj->SqlQueryInputResult($query, array($check)) <> FALSE) {
                return true;
            } else {
                return false;
            }
        }
        
    }
    $orders_process= new orders_process();
    switch ($_POST['act']){
        case "":

        break;
        case "choose":
            if(isset($_POST['chkItem'])){
                $query="UPDATE `donhang` SET `order_status`= ? where `id` in (?)";
                foreach ($_POST['chkItem'] as $key=>$value){
                    $orders_process->change_orders($query,intval($_POST['hidden']),$_POST['chkItem'][$key]);                   
                }              
            }
            break;
        case "delete-all":
            $sql="DELETE FROM `donhang` WHERE id=?";
            foreach ($_POST['chkItem'] as $key=>$value){
                $orders_process->delete_orders($sql,$_POST['chkItem'][$key]);                   
            }  
            break;
        case "delete":
            $sql="DELETE FROM `donhang` WHERE id=?";
            $orders_process->delete_orders($sql,$_POST['chkItem'][0]);                    
            break;
        default:
            
    }
?>