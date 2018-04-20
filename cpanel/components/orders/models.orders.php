<?php 
       class orders extends core_class
       {
           public $dbObj;
       
           function __construct()
           {
                $this->dbObj = new classDb();
           }

        }
?>