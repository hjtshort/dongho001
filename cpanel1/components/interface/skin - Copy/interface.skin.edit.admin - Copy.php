<?php defined( '_VALID_MOS' ) or die( include("../../content/news/404.php") );

   include 'interface.skin.edit.admin.process.php';
   $myprocess = new process();

   // Xử lý
   if(isset($_GET['pages_id'])) @$pages_id = $_GET['pages_id'];
?>
<style>
   @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css);

   .module-layout .module-item, .ui-state-highlight {
      background: #fff;
      border-radius: 4px;
      border: 1px solid #ddd;
      margin-bottom: 6px;
      padding: 10px 8px;
   }

   .ui-state-highlight { background: yellow }

   .module-layout .module-icon, .module-layout .module-name {
      display: inline-block;
   }

   .module-item .fa-trash {
      float:right;
      padding: 3px 0
   }

   .demo-layout .section.disabled {
      background: #ddd
   }

   .demo-layout .section {
      border-bottom: 0;
      border: 1px solid #ddd;
      min-height: 100px;
      padding-bottom: 15px;
   }

   .demo-layout #left, .demo-layout #right, .demo-layout #center {
      border-top: 0;
   }

   #layout-main .section.disabled ~ .section#center { margin-left: 0; }

   .demo-layout .section#slider {
      border-bottom: 1px solid #ddd;
   }

   .demo-layout .section:not(#right):last-child {
      border-bottom: 1px solid #ddd;
   }

   .demo-layout .section.hover {
      background: #efefef;
   }

   .demo-layout .section::before {

   }

   .demo-layout .section#top::before {
       content: "Top - Header";
   }

   .demo-layout .section#slider::before {
       content: "Slider";
   }

   .demo-layout .section#left::before {
       content: "Left";
   }

   .demo-layout .section#center::before {
       content: "Center";
   }

   .demo-layout .section#right::before {
       content: "Right";
   }

   .demo-layout .section#bottom::before {
       content: "Bottom";
   }

   .demo-layout .section > .module-item {
      background: #fff;
      border-radius: 4px;
      border: 1px solid #ddd;
      margin: 15px 15px 0;
      padding: 12px 10px;
      width: 290px;
   }

   .demo-layout .section > .module-item input {
     width: 95%;
   }
</style>
<div id="wrapper">
   <div id="content">
      <ul class="breadcrumb">
         <li><a href="../../content/news/index.html?lang=en" class="glyphicons home"><i></i>AdminPlus</a></li>
         <li class="divider"></li>
         <li>Online Shop</li>
         <li class="divider"></li>
         <li>Products</li>
      </ul>
      <div class="separator bottom"></div>
      <div class="innerLR">
         <div class="widget widget-2">
            <div class="widget-head">
               <h4 class="heading glyphicons picture"><i></i>Thiết lập giao diện</h4>
               <div class="heading-buttons">
                  <div class="buttons pull-right">
                     <a href="#modal-simple" class="btn btn-primary btn-icon glyphicons circle_question_mark" data-toggle="modal"><i></i> Trợ giúp</a>
                     <a href="" class="btn btn-primary btn-icon glyphicons edit" id="btnEditLayout"><i></i> Cập nhật</a>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="modal hide fade" id="modal-simple" aria-hidden="true" style="display: none;">
               <!-- Modal heading -->
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3>Modal header</h3>
               </div>
               <!-- // Modal heading END -->
               <!-- Modal body -->
               <div class="modal-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
               </div>
               <!-- // Modal body END -->
               <!-- Modal footer -->
               <div class="modal-footer">
                  <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
               </div>
               <!-- // Modal footer END -->
            </div>
            <div class="widget-body">
               <!--<div class="row-fluid">
                  <div class="span2">
                    <p class="muted">Giao diện đang sử dụng &nbsp;</p>
                  </div>
                  <div class="span9">
                                    <p class="muted" style="font-weight:bold;">Ecom84</p>
                    <img id="imgCurentSkin" src="<?php echo $template_admin; ?>/html/images/skin/Ecom84.master.mini.gif" style="width:160px;">
                    <div class="separator"></div>
                  </div>
                  </div> -->
               <div class="row-fluid">
                  <div class="span2">
                     <p class="muted">Chọn trang</p>
                  </div>
                  <div class="span8">
                     <select class="span4" id="pageSelect">
                        <option value="-1">Vui lòng chọn trang cần chỉnh sửa</option>
                        <?php $result = $myprocess->get_pages_list();
                              while ($row = $result->fetch()){ ?>
                                  <option value="<?= $row['pages_id'] ?>" <?= ($pages_id == $row['pages_id']) ? 'selected' : ''?>><?= $row['pages_title'] ?></option>
                        <?php } ?>
                     </select>
                     <div class="separator"></div>
                  </div>
               </div>
               <div class="row-fluid">
                  <div class="span2">
                     <p class="muted">Chọn giao diện</p>
                  </div>
                  <div class="span10">
                     <div class="TemplateListContainer">
                        <table id="dlPublicSkins" cellspacing="0" cellpadding="1" style="border-width:0px;width:1000px;border-collapse:collapse;">
                           <tbody>
                              <tr>
                              <?php $result = $myprocess->get_layout_list();
                                 while ($row = $result->fetch()){ ?>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">Giao diện <?= $row['layout_id'] ?></span>
                                       </div>
                                       <a href="#" class="activeskin skin" data-layout="<?= $row['layout_file'] ?>">
                                          <img src="<?php echo $template_admin . $row['layout_img'] ?>" style="border: none;" alt="">
                                          <p>(<?= $myprocess->get_layout_name($row['layout_file']) ?>)</p>
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#" class="activeskin" data-layout="<?= $row['layout_file'] ?>">Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>

                              <?php } ?>
                                 <!-- <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 1</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/fullWidth.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="center">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 2</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/fullBanner.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="top.center">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 3</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/leftSidebar.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="left.center">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 4</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/leftSidebarBanner.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="top.left.center">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 5</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/rightSidebar.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="center.right">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td>
                                 <td align="center" valign="top">
                                    <div class="skinitem">
                                       <div class="TemplateHeading">
                                          <span class="TemplateName">
                                          Giao diện 6</span>
                                       </div>
                                       <a href="#skin" class="skin">
                                       <img src="<?php echo $template_admin; ?>/images/layout/rightSidebarBanner.png" style="border: none;" alt="">
                                       </a>
                                       <div class="TemplateBottom">
                                          <a href="#activeskin" class="activeskin" data-layout="top.center.right">
                                          Sử dụng giao diện này</a>
                                       </div>
                                    </div>
                                 </td> -->
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="separator"></div>
                  </div>
               </div>
               <!-- Demo layout -->
               <div class="row-fluid">
                  <div class="span2">
                     <h5>Chọn module</h5>
                     <div class="module-layout">
                        <?php $modules = $myprocess->get_module_list();
                              foreach ($modules as $module_name => $module_path) {
                        ?>
                        <div class="module-item" data-module-name="<?= $module_path ?>">
                           <div class="module-name">
                              <?= $module_name ?>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="span10">
                     <div class="demo-layout" data-layout="<?= $myprocess->get_layout_file($pages_id)?>">
                        <div id="top" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'top')?></div>
                        <!-- <div id="slider" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'slider')?></div> -->
                        <div class="row-fluid" id="layout-main">
                           <div id="left" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'left')?></div>
                           <div id="center" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'center')?></div>
                           <div id="right" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'right')?></div>
                        </div>
                        <div id="bottom" class="section"><?= $myprocess->get_module_by_layout($pages_id, 'bottom')?></div>
                     </div>
                  </div>
               </div>
               <!-- Demo layout -->
            </div>
         </div>
         <form id="savelayout" method="POST">
            <input type="hidden" name="hidden" id="hidden">
            <input type="hidden" name="layout_file" id="layout_file">
            <input type="hidden" name="pages_id" id="pages_id">
            <input type="hidden" name="pages_html" id="pages_html">
         </form>
      </div>
      <!-- End Content -->
   </div>
   <!-- End Wrapper -->
</div>
<div id="customizeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
<script>

var Layout = ['top', 'left', 'center', 'right', 'bottom'];

function getSpanColumn(number){
   return "span" + number;
}

function divLayout(top, left, right, bottom){
   $(".demo-layout .section").attr("class", "section").show();

   if(top == 0) $(".demo-layout #top").addClass("disabled");

   $center = 12;

   if(left == 1){
      $center = $center - 4;
      $(".demo-layout #left").addClass(getSpanColumn(4));
      $(".demo-layout #left").removeClass("disabled").show();
   }else {
      $(".demo-layout #left").addClass("disabled").hide();
   }

   if(right == 1){
      $center = $center - 4;
      $(".demo-layout #right").addClass(getSpanColumn(4));
   }else {
      $(".demo-layout #right").addClass("disabled").hide();
   }

   $(".demo-layout #center").addClass(getSpanColumn($center));

   if(bottom == 0)
      $(".demo-layout #bottom").addClass("disabled");
}

function randomModID(){
   var num = Math.floor(100000 + Math.random() * 900000);

   // Check module tồn tại
   if($('div[type="' + num + '"]').length > 0)
      return randomModID();
   return num;
}

function get_module_template_name(id, name, classname = ''){
   return '<div type="module" class="' + classname + '" id="' + id + '" name="' + name + '"></div>';
}

function get_module_layout_name(name){
   return 'pages_' + name;
}

$(document).ready(function(){

   ////////////////////////////

   ////////////////////////////
   // Xử lý layout nếu có sẵn
   var top = ($(".demo-layout").data("layout").indexOf("top") !== -1) ? 1 : 0;
   var bottom = ($(".demo-layout").data("layout").indexOf("bottom") !== -1) ? 1 : 0;
   var left = ($(".demo-layout").data("layout").indexOf("left") !== -1) ? 1 : 0;
   var right = ($(".demo-layout").data("layout").indexOf("right") !== -1) ? 1 : 0;
   divLayout(top, left, right, bottom);
   $("input#layout_file").val($(".demo-layout").data("layout"));

   $(".demo-layout .section .module-item").each( function(){
      var $module = $(this);
      if($(this).find('a.delete-btn').length <= 0){
         jQuery('<a/>', {
            id: $(this).attr('id'),
            class: 'delete-btn',
            href: '#'
         }).html('<i class="fa fa-trash"></i>').prependTo($module);
      }
   });

   $(".module-layout > .module-item").draggable({
      cursor: 'move',
      revert: 'invalid',
      helper: 'clone'
   });

   // $(".demo-layout .section > div").draggable({
   //    connectToSortable: $(".demo-layout .section"),
   //    cursor: 'move',
   //    revert: 'invalid',
   //    helper: 'original'
   // });//.removeClass("ui-draggable");

   $(".demo-layout .section").sortable({
      connectWith: $(".demo-layout .section")
   });

   // $(".demo-layout .section .module-item").disableSelection();

   $("input#pages_id").val($("#pageSelect").val());

   //
   $("#pageSelect").on("change", function(){
      window.location.href = "interface/skin/edit.html?pages_id=" + $(this).val();
   });

   $("#btnEditLayout").on("click", function(e){
      if($("input#pages_id").val() == "-1"){
         alert("Vui long chon trang can chinh sua truoc");
         e.preventDefault();
         $("#pageSelect").focus();
         return;
      }
      var $layout = {};
      $(".demo-layout .section:not(.disabled)").each(function(i, tr){
         var $value = '';
         $(this).find("div[type=module]").each(function(i, tr){
            $value += get_module_template_name($(this).attr("id"), $(this).attr("name"), $(this).find('.custom-class').val());
         });
         $layout[get_module_layout_name($(this).attr("id"))] = $value;
      });
      $("input#pages_html").val(JSON.stringify($layout));
      $("input#hidden").val('SaveLayout');
      $("form#savelayout").submit();
      e.preventDefault();
   });

   $("a.activeskin").on("click", function(e){
      var top = ($(this).data("layout").indexOf("top") !== -1) ? 1 : 0;
      var bottom = ($(this).data("layout").indexOf("bottom") !== -1) ? 1 : 0;
      var left = ($(this).data("layout").indexOf("left") !== -1) ? 1 : 0;
      var right = ($(this).data("layout").indexOf("right") !== -1) ? 1 : 0;
      divLayout(top, left, right, bottom);
      $("input#layout_file").val($(this).data("layout"));
      e.preventDefault();
   });

   $(".demo-layout").on("click", ".module-item .delete-btn", function(e){
      $(".module-item#" + $(this).attr('id')).remove();
      e.preventDefault();
   });

   $(".demo-layout .section").droppable({
      hoverClass: 'hover',
      drop: function(event, ui){
         if(ui.draggable.attr('type') != 'module') {
            // Tạo elem mới
            $new_elem = jQuery('<div/>', {
                         id: randomModID(),
                         name: ui.draggable.data('module-name'),
                         type: 'module',
                         class: 'module-item'
                     }).html('<h5>' + ui.draggable.text() + '</h5>').appendTo($(this));
                     jQuery('<a/>', {
                         id: $new_elem.attr('id'),
                         class: 'delete-btn',
                         href: '#'
                     }).html('<i class="fa fa-trash"></i>').prependTo($new_elem);
            // Tạo group cho class
            $class_elem = jQuery('<div/>', {
                         id: $new_elem.attr('id'),
                         class: 'form-group'
                     }).appendTo($new_elem);
            jQuery('<input/>', {
               id: $new_elem.attr('id'),
               class: 'custom-class form-control',
               type: 'text',
               placeholder: 'Class'
            }).appendTo($class_elem);
         }else {
            // Gắn elem vào section mới, reset vị trí
            if(ui.draggable.attr('id')){
            }else {
               ui.draggable.attr('id', randomModID());
            }
            ui.draggable.css({'left': 0, 'top': 0});//.appendTo($(this));
            ui.draggable.removeClass('ui-draggable-dragging');
         }


         // $(".demo-layout .section .module-item").draggable({
         //    connectToSortable: $(".demo-layout .section"),
         //    cursor: 'move',
         //    revert: 'invalid'
         // });

         // $(".demo-layout .section").sortable({
         //    containment: "parent",
         //    connectWith: ".demo-layout .section .module-item",
         //    // revert: 'true',
         //    //placeholder: 'ui-state-highlight'
         // });
      }
   });
});
</script>
