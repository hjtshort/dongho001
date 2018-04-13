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
            <a href="javascript:BrowseServer" id="ckfinder" class="btn btn-sky shiny"> Thêm hình ảnh</a>
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

                    <div id="ckfinder1"></div>
                    <script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
                    <!-- <script type="text/javascript" src="javascript/ckeditor/ckeditor.js"></script> -->
                     <!-- <script type="text/javascript" src="javascript/ckfinder/ckfinder.js"></script> -->
                            <script type="text/javascript">

                            // This is a sample function which is called when a file is selected in CKFinder.
                            // function showFileInfo( fileUrl, data, allFiles )
                            // {
                            //     var msg = 'The last selected file is: <a href="' + fileUrl + '">' + fileUrl + '</a><br /><br />';
                            //     // Display additional information available in the "data" object.
                            //     // For example, the size of a file (in KB) is available in the data["fileSize"] variable.
                            //     if ( fileUrl != data['fileUrl'] )
                            //         msg += '<b>File url:</b> ' + data['fileUrl'] + '<br />';
                            //     msg += '<b>File size:</b> ' + data['fileSize'] + 'KB<br />';
                            //     msg += '<b>Last modified:</b> ' + data['fileDate'];

                            //     if ( allFiles.length > 1 )
                            //     {
                            //         msg += '<br /><br /><b>Selected files:</b><br /><br />';
                            //         msg += '<ul style="padding-left:20px">';
                            //         for ( var i = 0 ; i < allFiles.length ; i++ )
                            //         {
                            //             // See also allFiles[i].url
                            //             msg += '<li>' + allFiles[i].data['fileUrl'] + ' (' + allFiles[i].data['fileSize'] + 'KB)</li>';
                            //         }
                            //         msg += '</ul>';
                            //     }
                            //     // this = CKFinderAPI object
                            //     this.openMsgDialog( "Selected file", msg );
                            // }

                            // You can use the "CKFinder" class to render CKFinder in a page:
                            var finder = new CKFinder();
                            // The path for the installation of CKFinder (default = "/ckfinder/").
                            finder.basePath = '../';
                            // The default height is 400.
                            finder.height = 500;
                            // This is a sample function which is called when a file is selected in CKFinder.
                           // finder.selectActionFunction = showFileInfo;
                            finder.create();

                            // It can also be done in a single line, calling the "static"
                            // create( basePath, width, height, selectActionFunction ) function:
                            // CKFinder.create( '../', null, null, showFileInfo );

                            // The "create" function can also accept an object as the only argument.
                            // CKFinder.create( { basePath : '../', selectActionFunction : showFileInfo } );

                        </script>
                    </p>
        
                 
                 
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
<!-- styles -->


<!-- js -->

    

