<?php

class index_process
{
    public $dbObj;


     const ORDER_WAIT = 0;
     const ORDER_SHIPPING = 1;
     const ORDER_PAYMENT = 2;
     const ORDER_CANCEL = 3;
    function __construct()
    {
        $this->dbObj = new classDb();
    }

    function count_visit($date='%',$year="%",$month="%")
    {
        return $this->dbObj->SqlQueryOutputResult("
                SELECT FROM_UNIXTIME(tm) AS `ngay`,CURRENT_DATE
                FROM visitcounter
                WHERE DATE_FORMAT(FROM_UNIXTIME(tm),'%Y-%m-%d') LIKE ? 
                AND DATE_FORMAT(FROM_UNIXTIME(tm),'%Y') LIKE ? 
                AND DATE_FORMAT(FROM_UNIXTIME(tm),'%Y-%m') LIKE ?
                ORDER BY tm DESC
            ", array($date,$year,$month))->rowCount();
    }

    function count_visit_present($minute)
    {
        return $this->dbObj->SqlQueryOutputResult("
                SELECT NOW()
                FROM visitcounter
                WHERE (DATE_SUB(NOW(),INTERVAL ? MINUTE) < FROM_UNIXTIME(tm)) AND (FROM_UNIXTIME(tm)  < NOW())
                ORDER BY tm DESC
            ", array($minute))->rowCount();
    }

    function get_list_order(){
        $sql = "SELECT 
                      id,
                      bill_name,
                      bill_email,
                      bill_phone,
                      bill_address,
                      note,
                      total,
                      order_status,
                      date_create,
                      date_update
                FROM donhang
                ORDER BY date_create DESC ";
        return $this->dbObj->SqlQueryOutputResult($sql,array(0))->fetchAll();
    }

    function sum_total_order_by_date($date='%'){
        $sql = "SELECT round(sum(total),0) as sum_total
                FROM donhang
                WHERE DATE_FORMAT(FROM_UNIXTIME(date_create),'%Y-%m-%d') LIKE ?";
        return $this->dbObj->SqlQueryOutputResult($sql,array($date))->fetch()['sum_total'];
    }
    function sum_total_order_by_month($date='%'){
        $sql = "SELECT round(sum(total),0) as sum_total
                FROM donhang
                WHERE DATE_FORMAT(FROM_UNIXTIME(date_create),'%Y-%m') LIKE ?";
        return $this->dbObj->SqlQueryOutputResult($sql,array($date))->fetch()['sum_total'];
    }
}
?>