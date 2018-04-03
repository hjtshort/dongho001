<?php 
       class orders extends core_class
       {
           public $dbObj;
       
           function __construct()
           {
                $this->dbObj = new classDb();
           }
           public function get_orders_view($sql,$a)
           {
            
         
                $result = $this->dbObj->SqlQueryOutputResult($sql, array($a))->fetchAll();
                return $result;
            
           }

        }
?>