<?php 
class category_process 
{
    public $dbObj;
    function __construct()
    {
        $this->dbObj = new classDb();
    }
    public function sort($sanpham_id,$order_num)
    {
        $sql="update sanpham_sapxep set order_num=? where sanpham_id=?";
        $result=$this->dbObj->SqlQueryInputResult($sql,array($order_num,$sanpham_id));
        if($result)
            return true;
        else 
            return false;
    }
    public function get_order_num($id)
    {
        $sql="SELECT order_num from sanpham_sapxep where sanpham_id=?";
        $result = $this->dbObj->SqlQueryOutputResult($sql,array($id))->fetch();
        return  $result['order_num'];
    }

}
if($_POST['action']=="sort")
{
    if($_POST['data']!='')
    {
        $myprocess=new category_process;
        $data=explode('|',$_POST['data']);
        $checked=true;
        foreach($data as $value)
        {  
            $num=explode(',',$value);
            $numfrom=$myprocess->get_order_num($num[0]);
            $numto=$myprocess->get_order_num($num[1]);
            $data=$myprocess->sort($num[0],$numto);
            $data1=$myprocess->sort($num[1],$numfrom);
            if($data!=true && $data1!=true)
                $checked=false;
        }
        if($checked)
            echo "ok";
        else 
            echo "error";   
    }
}
            
?>
