<?php defined( '_VALID_MOS' ) or die( include("404.php") );
    $category_process = new category_process();	
    $url=$func->_extract_url($_GET['params'],'/');
?>
    <script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
    <script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/ckeditor.js"></script>
    <script type="text/javascript" src="javascript/table-dragger.min.js"></script>
    <script language="javascript" type="text/javascript">
        function BrowseServer(inputId) {
            var finder = new CKFinder();
            finder.StartupPath = "Image:/image/";
            finder.selectActionFunction = SetFileField;
            finder.selectActionData = inputId;
            finder.popup();
        }

        // This is a sample function which is called when a file is selected in CKFinder.
        function SetFileField(fileUrl, data) {
            document.getElementById("image_src").value = fileUrl;
            document.getElementById("image_file").src = fileUrl;
        }

        // This is a sample function which is called when a file is selected in CKFinder.
        function ResetImage() {
            document.getElementById("image_file").src = "data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==";
        }
    </script>

    <div class="page-content">
        <form id="validateSubmitForm" name="myForm" method="post" enctype="multipart/form-data">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs breadcrumbs-fixed">
                <div class="buttons-task col-xs-12 col-md-6">
                    <ul class="breadcrumb breadcrumbs-fixed">
                        <li><i class="fa fa-table"></i></li>
                        <li><a href="product/category/view.html">Quản lý Danh mục</a></li>
                        <li class="toast-title">Thêm Danh mục</li>
                    </ul>
                </div>
                <div class="text-align-right text-align-left-xs col-xs-12 col-md-6">
                    <a href="product/category/view.html" class="btn btn-sky shiny">Hủy</a>
                    <button type="submit" class="btn btn-sky shiny">Lưu</button>
                </div>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <?php
                $result = $category_process->get_category_edit($conf['geturl']['id']);
                if ($data = $result->fetch()):
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 col-xs-12">
                                    <div class="widget flat">
                                        <div class="widget-header bordered-bottom bordered-themeprimary">
                                            <span class="widget-caption">Nội Dung</span>
                                            <div class="widget-buttons">
                                                <a href="#" data-toggle="maximize">
                                                    <i class="fa fa-expand blue"></i>
                                                </a>
                                                <a href="#" data-toggle="collapse">
                                                    <i class="fa fa-minus blue"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="widget-body widget-body-white">
                                            <div class="form-group">
                                                <label for="category_title">Tên danh mục <span class="text-danger">*</span>
                                                    <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            data-original-title="Tên danh mục sản phẩm (VD: Thời trang nữ)"></i></label>
                                                <div>
                                                    <input value="<?= $data["tieude"]; ?>" name="category_title" type="text"
                                                           id="category_title" class="form-control">
                                                    <?php
                                                    if (!empty($_SESSION["validator"]["category_title"])) {
                                                        echo $_SESSION["validator"]["category_title"];
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label for="parent_category"> Danh mục cha <span
                                                                    class="text-danger">*</span> <i
                                                                    class="fa fa-question-circle tooltip-info sky"
                                                                    data-toggle="tooltip"
                                                                    data-placement="right"
                                                                    data-original-title="Danh mục cấp trên của danh mục đang cập nhật"></i></label>
                                                        <div>
                                                            <?php
                                                            $result = $category_process->get_category_view();
                                                            $table_row = $result->fetchAll();

                                                            $category = array();
                                                            $category_process->category($table_row, $category);

                                                            $selected_option = $data["danhmuccha"];
                                                            ?>
                                                            <select size="10" name="parent_category" id="parent_category"
                                                                    class="form-control">
                                                                <option <?= $selected_option==0?'selected':''?> value="0">ROOT</option>
                                                                <?php foreach ($category as $key => $row): ?>

                                                                    <option value="<?= $row["danhmuc_id"] ?>"
                                                                        <?= $row['danhmuc_id'] == $selected_option ? 'selected' : '' ?>
                                                                        <?=$row['danhmuc_id']==$data["danhmuc_id"]?'disabled':''?> >
                                                                        <?= $row["level"], $row["tieude"] ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php
                                                            if (!empty($_SESSION["validator"]["parent_category"])) {
                                                                echo $_SESSION["validator"]["parent_category"];
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="image_src">Ảnh chính <i class="fa fa-question-circle tooltip-info sky" data-toggle="tooltip" data-placement="top" data-original-title=""></i></label>
                                                        <div>
                                                            <?php if(empty($data["hinhanh"])) { ?>
                                                                <img id="image_file" style="height:180px;" data-src="holder.js/150x150" class="img-thumbnail" alt="150x150" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                                                            <?php } else { ?>
                                                                <img id="image_file" style="height:180px;" class="img-thumbnail" alt="150x150" src="<?= '/'.$conf['data_user'].'/file_upload/'.$data["hinhanh"]; ?>">
                                                            <?php } ?>

                                                            <input value="<?= '/'.$conf['data_user'].'/file_upload/'.$data["hinhanh"]; ?>" type="hidden" name="image_src" id="image_src">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div>
                                                            <button type="button" class="btn btn-default" onClick="javascript:BrowseServer('image_src');">Chọn hình ảnh</button>
                                                            <button type="button" class="btn btn-default" onClick="javascript:ResetImage('image_src');">Bỏ chọn</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="category_desc">Mô tả <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            data-original-title=""></i></label>
                                                <div>
                                                    <textarea name="category_desc"> <?= $data["tomtat"]; ?></textarea>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace('category_desc', {
                                                            width: '100%',
                                                            height: '150px',
                                                            toolbar: 'Basic'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget flat">
                                        <div class="widget-body widget-body-white">  
                                            <h4>Sản phẩm</h4>
                                            <div class="row" style="margin-bottom: 15px">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-3" style="padding: 7px 0 0 0">
                                                            <label for="">Sắp xếp:</label>
                                                        </div>
                                                        <div class="col-sm-9" style="padding: 0">
                                                            <select class="form-control" name="style" id="select">
                                                                <option value="" <?php if($data['danhmucsapxep']==$category_process::MANUAL) echo "selected" ?>>Thủ công</option>
                                                                <option value="<?= $category_process::ALPHA_ASC ?>" <?php if($data['danhmucsapxep']==$category_process::ALPHA_ASC) echo "selected" ?>>Theo tên: A-Z</option>
                                                                <option value="<?= $category_process::ALPHA_DESC ?>"
                                                                <?php if($data['danhmucsapxep']==$category_process::ALPHA_DESC) echo "selected" ?>>Theo tên: Z-A</option>
                                                                <option value="<?= $category_process::PRICE_ASC ?>">Theo giá: Từ cao đến thấp</option>
                                                                <option value="<?= $category_process::PRICE_DESC ?>">Theo giá: Từ thấp đến cao</option>
                                                                <option value="<?= $category_process::CREATE_ASC ?>">Theo ngày: Từ mới đến cũ</option>
                                                                <option value="<?= $category_process::CREATE_DESC ?>">Theo ngày: Từ cũ đến mới</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input id="danhmuc" value="<?php echo $url[3]; ?>" hidden>
                                                <div id="main_table">
                                                    <table id="idcuatable" class="table table-hover table-bordered table-striped table-condensed flip-content">
                                                        <thead class="flip-content bordered-palegreen">
                                                            <!-- <tr>
                                                               
                                                               <select bind-event-change="sortProducts.updateSortOrder()" class="ui-select js-no-dirty" id="sort-order-selector" name="SortOrder"><option 
                                                                <th style="width: 1%;" class="center">#</th>
                                                                <th style="width: 1%;" class="uniformjs">
                                                                    <label>
                                                                        <input type="checkbox">
                                                                        <span class="text"></span>
                                                                    </label>
                                                                </th>
                                                                <th>Khách hàng</th>
                                                                <th class="center" style="width: 10%;">Drag</th>
                                                                <th class="center" style="width: 10%;">Thời gian đặt hàng</th>
                                                                <th style="width: 10%;" class="center">Trạng thái</th>
                                                                <th style="width: 7%;" class="center">Tin nhắn</th>
                                                                <th style="width: 7%;" class="center">Tổng</th>
                                                                <th style="width: 7%;" class="center">Thao tác</th>
                                                            </tr> -->

                                                        </thead>
                                                    <tbody class='simple_with_animation'>
                                                    <?php   
                                                         $result1 = $category_process->get_product($url[3]);  
                                                        foreach($result1 as $value){
                                                            $hinhanh=json_decode($value['hinhanh'])
                                                             ?>
                                                            <tr id="rowtable" class="selectable" data-id="<?php echo $value['sanpham_id'];?>">
                                                                <td class="center">Kéo <i class="table-dragger-handle"></i></td>
                                                                <td>
                                                                    <img style="height:40px;border:1px solid #ddd" src="../data_setting/dongho001/file_upload/product/<?php echo $hinhanh[0]; ?>" onerror="this.src='resource/images/no_image.jpg'">
                                                                </td>
                                                                <td>
                                                                    <?php echo $value['tensanpham']; ?>
                                                                </td>
                                                            </tr> 
                                                        <?php } ?>                                                
                                                        </tbody>
                                                    </table>
                                                    <script>
                                                        $('#select').on('change', function () {
                                                            $('#act').val('change')
                                                            $('#hidden').val('changesx')
                                                            $("#validateSubmitForm").submit()
                                                        });
                                                        $(function(){
                                                            var t=''
                                                            var el = document.getElementById('idcuatable');
                                                            var dragger = tableDragger(el, {
                                                            mode: 'row',
                                                            onlyBody: true,
                                                            animation: 300
                                                            });
                                                            dragger.on('drop',function(from, to){  
                                                                $.ajax({
                                                                    type: "post",
                                                                    url: "sort.ajax",
                                                                    data: {
                                                                        "action":"sort",
                                                                        "data":t.substr(0,t.length-1),
                                                                    },
                                                                    success: function (response) {
                                                                        console.log(response)
                                                                    }
                                                                });
                                                            });
                                                             dragger.on('shadowMove', function(from, to, el, mode) {
                                                              
                                                                var from=$('#idcuatable tbody tr:eq('+from+')').attr("data-id")
                                                                var to=$('#idcuatable tbody tr:eq('+to+')').attr("data-id")
                                                                t+=from+","+to+"|"                                                      
                                                             })
                                                            
                                                        })
                                                
                                                    </script>
                                                </div>
                                            </div>                                                       
                                        </div>   
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-xs-12">

                                    <div class="widget flat">
                                        <div class="widget-header bordered-bottom bordered-themeprimary">
                                            <span class="widget-caption">Hiển Thị</span>
                                            <div class="widget-buttons">
                                                <a href="#" data-toggle="collapse">
                                                    <i class="fa fa-minus blue"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="widget-body widget-body-white">
                                            <div class="form-group">
                                                <label for="category_display">Hiển thị <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip" data-placement="top"
                                                            data-original-title="Lựa chọn để danh mục sản phẩm hiển thị trên website"></i></label>
                                                <div>
                                                    <label>
                                                        <input <?= $data["hienthi"] ? "checked" : '' ?>
                                                                name="category_display" value="1"
                                                                class="checkbox-slider colored-blue" type="checkbox">
                                                        <span class="text"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget flat">
                                        <div class="widget-header bordered-bottom bordered-themeprimary">
                                            <span class="widget-caption">Thông Tin SEO</span>
                                            <div class="widget-buttons">
                                                <a href="#" data-toggle="collapse">
                                                    <i class="fa fa-minus blue"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="widget-body widget-body-white">
                                            <div class="form-group">
                                                <label for="category_seo_title">Tiêu đề trang <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            data-original-title="Nội dung được hiển thị dưới dạng tiêu đề trong kết quả tìm kiếm và trên trình duyệt của người dùng."></i></label>
                                                <div>
                                                    <input name="category_seo_title" type="text" id="category_seo_title"
                                                           class="form-control" value="<?= $data["seo_tieudetrang"]; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="category_seo_keyword">Thẻ từ khóa <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            data-original-title="Mô tả các từ khóa chính của website"></i></label>
                                                <div>
                                                    <input name="category_seo_keyword" type="text" id="category_seo_keyword"
                                                           class="form-control" value="<?= $data["seo_thetukhoa"]; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="category_seo_desc">Thẻ mô tả <i
                                                            class="fa fa-question-circle tooltip-info sky"
                                                            data-toggle="tooltip"
                                                            data-placement="right"
                                                            data-original-title="Cung cấp một mô tả ngắn của trang. Trong vài trường hợp, mô tả này được sử dụng như một phần của đoạn trích được hiển thị trong kết quả tìm kiếm."></i></label>
                                                <div>
                                                <textarea id="category_seo_desc" name="category_seo_desc"
                                                          class="form-control" rows="5"><?= $data["seo_themota"]; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <input  id="act" type="hidden" name="hidden" value="category.edit"/>
            <input  id="hidden" type="hidden" name="act" value="save"/>
            <input type="hidden" name="date_add" id="date_add" value="<?= date("d/m/Y"); ?>"/>

        </form>
        <!-- /Page Body -->
    </div>
    <script type="text/javascript">
        $(function () {
            // validate signup form on keyup and submit
            // $("#validateSubmitForm").bootstrapValidator({
            //     fields: {
            //         category_title: {
            //             validators: {
            //                 notEmpty: {
            //                     message: "Tên danh mục không được bỏ trống"
            //                 },
            //                 stringLength: {
            //                     min: 5,
            //                     message: "Tên danh mục phải lớn hơn 5 ký tự"
            //                 }

            //             }
            //         },
            //         'parent_category': {
            //             validators: {
            //                 notEmpty: {
            //                     message: 'Vui lòng chọn danh mục cha'
            //                 }
            //             }
            //         }
            //     }
            // });
        });
    </script>
<?php if (!empty($_SESSION["validator"])) {
    unset($_SESSION["validator"]);
} ?>





                                            