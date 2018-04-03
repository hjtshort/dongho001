<?php

class menu_process extends interface_model
{
    public $target = ['_self', '_black', '_parent', '_top'];

    public function get_list_menu($group_menu_id)
    {
        $query = "SELECT 
						menu.Id,
						menu.title,
						target,
						root,
						type,
						parent_Id,
						alias,
						link_id,
						link,
						isroot,
						nhommenu,
						menu.activated
					FROM menu
					INNER JOIN nhommenu ON nhommenu.Id = menu.nhommenu
					WHERE nhommenu = ?
					ORDER BY order_num ASC ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array($group_menu_id));
        return $result;
    }

    public function get_list_group_menu()
    {
        $query = "SELECT 
						Id,
						activated,
						title,
						isroot,
						title
					FROM nhommenu ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
        return $result;
    }

    public function get_list_category_article()
    {
        $query = "SELECT *
				  FROM danhmuctintuc ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
        return $result;
    }

    public function get_list_article()
    {
        $query = "SELECT *
				  FROM tintuc ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
        return $result;
    }

    public function get_list_category_product()
    {
        $query = "SELECT *
				  FROM danhmucsanpham ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
        return $result;
    }

    public function get_list_product()
    {
        $query = "SELECT *
				  FROM sanpham ";
        $result = $this->dbObj->SqlQueryOutputResult($query, array(0));
        return $result;
    }

    public function inser_group_menu($title, $alias, $isroot, $activated)
    {
        $query = "INSERT INTO nhommenu (title, alias, isroot, activated) 
                                        VALUE (?,?,?,?)";
        $result = $this->dbObj->SqlQueryInputResult($query, array($title, $alias, $isroot, $activated));
        return $result;
    }

    public function delete_group_menu($Id)
    {
        $query = "DELETE FROM nhommenu WHERE Id = ?";
        $result = $this->dbObj->SqlQueryInputResult($query, array($Id));
        return $result;
    }

    public function update_title_group_menu($Id, $title)
    {
        $query = "UPDATE nhommenu SET title = ? WHERE Id = ?";
        $result = $this->dbObj->SqlQueryInputResult($query, array($title, $Id));
        return $result;
    }

    function buildTree(array $elements, $parentId = 0)
    {

        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_Id'] == $parentId) {
                $children = $this->buildTree($elements, $element['Id']);

                if ($children) {
                    $element['children'] = $children;
                }

                $branch[] = $element;
            }
        }

        return $branch;
    }

    function recursiveMenu($menu_tree, $level = 1)
    {


        foreach ($menu_tree as $menu): ?>
            <li class="dd-item bordered-blue"
                data-action=""
                data-group="<?= $menu['nhommenu'] ?>"
                data-title="<?= $menu['title'] ?>"
                data-id="<?= $menu['Id'] ?>"
                data-activated="<?= $menu['activated'] ?>"
                data-target="<?= $menu['target'] ?>"
                data-link="<?= $menu['link'] ?>">
                <div class="widget collapsed">
                    <div class="dd-handle widget-header">
                        <span class="widget-caption"> <?= $menu['title'] ?></span>
                        <div class="widget-buttons dd-nodrag">
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-pencil blue "></i>
                            </a>
                            <a href="#" data-remove="<?= $menu['Id'] ?>">
                                <i class="fa fa-trash-o  danger "></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body" style="margin-top: -5px">
                        <div class="form-group">
                            <label for="">Tiêu đề trang <i
                                        class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                        data-placement="right"
                                        data-original-title="Tiêu đề menu"></i></label>
                            <div>
                                <input name="" type="text" id=""
                                       class="form-control menu_title" value="<?= $menu['title'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Liên Kết <i
                                        class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                        data-placement="right"
                                        data-original-title="liên kết của menu"></i></label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-10 col-md-10">
                                    <input readonly name="" type="text" id=""
                                           class="form-control menu_link" value="<?= $menu['link'] ?>">
                                </div>
                                <div class="col-xs-4 col-sm-1 col-md-1">
                                    <button onclick="current_menu_edit=this" type="button" class="btn btn-default"
                                            data-toggle="modal" data-target="#modal-edit-link">Sửa
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">Kiểu Menu <i
                                                class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                data-placement="right"
                                                data-original-title="Tiêu đề menu"></i></label>
                                    <div>
                                        <select name="" id="" class="form-control menu_target">
                                            <?php foreach ($this->target as $_target): ?>
                                                <option <?= $menu['target'] == $_target ? 'selected' : '' ?>
                                                        value="<?= $_target ?>"><?= $_target ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="">Hiển thị <i
                                                class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Lựa chọn để menu hiển thị trên website"></i></label>
                                    <div class="margin-top-5">
                                        <label>
                                            <input <?= $menu['activated'] ? 'checked' : '' ?> name="" value="1"
                                                                                              class="checkbox-slider colored-blue menu_activated"
                                                                                              type="checkbox">
                                            <span class="text"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <?php if (count($menu['children']) > 0): ?>
                    <ol class="dd-list">
                        <?php $this->recursiveMenu($menu['children'], $level++); ?>
                    </ol>
                <?php endif; ?>
            </li>
        <?php endforeach;
    }

    /*TODO cần tối ưu câu lệnh sql, đưa vào PDO prepare*/
    function update_child_listId($list_menu_tree, &$query, $danhmuccha = 0, &$order_number = 0)
    {

        foreach ($list_menu_tree as $row) {
            $id = $row['id'];
            $title = $row['title'];
            $group = $row['group'];
            $activated = $row['activated'];
            $target = $row['target'];
            $link = $row['link'];
            $order_number++;
            if ($row['action'] == '') {
                $query .= "UPDATE menu SET 
                                            parent_Id = '$danhmuccha',
                                            Id = '$id',
                                            title='$title',
                                            target = '$target',
                                            order_num='$order_number',
                                            nhommenu = '$group',
                                            activated = '$activated',
                                            link = '$link'
                          WHERE Id = '$id' ;";
            } elseif ($row['action'] == 'add') {
                $queryInser = "INSERT INTO menu (nhommenu, parent_Id, title,link,target,activated,order_num)
                                      VALUE ('$group','$danhmuccha','$title','$link','$target','$activated','$order_number');";
                $id = $this->dbObj->last_insert_id($queryInser, array(0));
            } elseif ($row['action'] == 'delete') {
                $query .= "DELETE FROM menu WHERE Id = '$id';";
            }

            if (count($row['children']) > 0) {
                if ($row['action'] == 'delete') {
                    foreach ($row['children'] as $key => $value) {
                        $row['children'][$key]['action'] = 'delete';
                    }
                }
                $this->update_child_listId($row['children'], $query, $id, $order_number);
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
}



switch (@$_POST["hidden"]) {

    case "";
        // khoi dau trang khong co gia tri submit. khong lam zi ca
        break;

    case "menu.view";
        $menu_process = new menu_process;
        $q = '';
        $menu_process->update_child_listId(json_decode($_POST['serialize_menu'], true), $q);
        if (!empty($q)) {
            if ($menu_process->update_child_listId_process($q)) {
                $_SESSION["message"]["notyfy"] = "Đã cập nhật menu thành công !";
                $func->_redirect($index_backend . "interface/menu/view.html");
                exit;
            } else {
                $_SESSION["message"]["notyfy"] = "Đã cập nhật menu thất bại !";
                $_SESSION["message"]["type"] = "danger";
                $func->_redirect($index_backend . "interface/menu/view.html");
                exit;
            }
        } else {
            $func->_redirect($index_backend . "interface/menu/view.html");
            exit;
        }
        break;
    case "groupmenu.add";
        include_once("../libraries/validation/validation.php");
        $check = false;

        $validator = new FormValidator();
        $menu_process = new menu_process;
        $validator->addValidation("group_menu_title", "req", "Tên menu không được bỏ trống");

        if ($validator->ValidateForm()) {
            if ($_POST["act"] == "save") {
                $title = $_POST['group_menu_title'];
                $alias = $menu_process->_removesigns($title);
                if ($menu_process->inser_group_menu($title, $alias, 0, 1)) {
                    $_SESSION["message"]["notyfy"] = "Đã thêm menu thành công !";
                    $func->_redirect($index_backend . "interface/menu/view.html");
                    exit;
                } else {
                    $_SESSION["message"]["notyfy"] = "Đã thêm menu thất bại !";
                    $_SESSION["message"]["type"] = "danger";
                    $func->_redirect($index_backend . "interface/menu/view.html");
                    exit;
                }
            }
        } else {
            $check = false;
            $error_hash = $validator->GetErrors();
            foreach ($error_hash as $inpname => $inp_err) {
                @$_SESSION["validator"][$inpname] = '<p class="error help-block"><span class="text-danger">' . $inp_err . '</span></p>';
            }
            //$func->_redirect($index_backend . "interface/menu/view.html");
        }
        break;
    default:
        $func->_redirect(".");
        break;
}