<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21/01/2018
 * Time: 1:06 CH
 */

class interface_model  extends core_class
{
    public $dbObj;

    function __construct()
    {
        $this->dbObj = new classDb();
    }
    function category($table_row, &$category, $danhmuccha = 0, $level = "")
    {
        foreach($table_row as $key => $row){
            if($row['danhmuccha'] == $danhmuccha){
                $category[] = array(
                    'danhmuc_id'	=>	$row['danhmuc_id'],
                    'tieude'		=>	$row["tieude"],
                    'alias'		    =>	$row["alias"],
                    'danhmuccha'	=>	$row["danhmuccha"],
                    'tomtat'		=>	$row["tomtat"],
                    'hienthi'		=>	$row["hienthi"],
                    'thutu'			=>	$row["thutu"],
                    'level'			=>	$level
                );
                unset($table_row[$key]);
                $this->category($table_row, $category, $row['danhmuc_id'], $level . '&nbsp;&nbsp;&nbsp|__ ');
                //$synbold = "└";
            }
        }
    }
}