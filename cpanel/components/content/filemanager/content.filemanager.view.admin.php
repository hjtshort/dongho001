<?php
?>



<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs breadcrumbs-fixed">
        <div class="buttons-task col-xs-12 col-md-4">
            <ul class="breadcrumb breadcrumbs-fixed">
                <li><i class="fa fa-table"></i></li>
                <li class="toast-title">Quản lý hình ảnh</li>
            </ul>
        </div>
        <div class="text-align-right text-align-left-xs col-xs-12 col-md-8">
            <a href="javascript:BrowseServer" id="ckfinder-popup-1" class="btn btn-sky shiny"> Thêm hình ảnh</a>
        </div>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                    <?php
                    // we are inclunding it only for using FileUploader::mime_content_type method
                    include_once('../libraries/phpupload/class.fileuploader.php');

                    // create an empty array
                    // we will add to this array the files from directory below
                    // here you can also add files from MySQL database
                    $appendedFiles = array();
                    $uploadDir = '../'.$conf['data_user'].'/file_upload/images/';
                    // scan uploads directory
                    $uploadsFiles = array_diff(scandir($uploadDir), array('.', '..'));

                    // add files to our array with
                    // made to use the correct structure of a file
                    foreach($uploadsFiles as $file) {
                        // skip if directory
                        if(is_dir($file))
                            continue;

                        // add file to our array
                        // !important please follow the structure below
                        $appendedFiles[] = array(
                            "name" => $file,
                            "type" => FileUploader::mime_content_type($uploadDir . $file),
                            "size" => filesize($uploadDir . $file),
                            "file" => $uploadDir . $file,
                            "data" => array(
                                "url" => $file
                            )
                        );
                    }

                 
                    $appendedFiles = json_encode($appendedFiles);
                    ?>

                    <div id="ckfinder-widget"></div>
                    <script type="text/javascript" src="javascript/ckeditor/ckeditor.js"></script>
                    <script type="text/javascript" src="javascript/ckfinder/ckfinder.js"></script>
                        <script type="text/javascript">
                        CKFinder.widget( 'ckfinder-widget', {
                            width: '100%',
                            height: 500,
                            plugins: [
                            
                                '../samples/plugins/StatusBarInfo/StatusBarInfo'
                            ]
                        } );
                           
                        </script>
                 
                 
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
<!-- styles -->


<!-- js -->

    

