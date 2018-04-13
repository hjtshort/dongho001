<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<base href="<?= $conf['rooturl_backend'] . "1/"; ?>">
	<title>Bảng điều khiển ++</title>
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Bootstrap -->
	<link href="<?= $conf['template_admin1']; ?>/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= $conf['template_admin1']; ?>/common/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

	<!-- Bootstrap Extended -->
	<link href="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/forms/select2/select2.css"/>

	<!-- Notyfy -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css"/>
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/notifications/notyfy/themes/default.css"/>

	<!-- Gritter Notifications Plugin -->
	<link href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

	<!-- JQueryUI v1.9.2 -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

	<!-- Glyphicons -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/css/glyphicons.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" />

	<!-- google-code-prettify -->
	<link href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/other/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />

	<!-- JQuery v1.8.2 -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/jquery-1.8.2.min.js"></script>

	<!-- Modernizr -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/modernizr.custom.76094.js"></script>

	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" />

	<!-- Theme -->
	<link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/css/style.css?1370451130" />
    <link rel="stylesheet" href="<?= $conf['template_admin1']; ?>/common/theme/css/wti-custom.css" />

	<!-- LESS 2 CSS -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/less-1.3.3.min.js"></script>

    <!-- jQuery Validate -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/forms/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>

    <!-- WTI CUSTOM SCRIPT -->
	<script src="<?= $conf['rooturl_backend']; ?>/javascript/wti_custom.js"></script>
    <!-- Query formatCurrency plugin -->
    <script type="text/javascript" src="<?= $conf['rooturl_backend']; ?>/javascript/jquery.formatCurrency-1.4.0.js"></script>
	<script language="javascript">var hashcode = '<?= session_id(); ?>';</script>

    <script type="text/javascript" src="<?= $conf['rooturl']; ?>/myeditor/myfinder/ckfinder.js"></script>
    <script type="text/javascript" src="<?= $conf['rooturl']; ?>//myeditor/ckeditor.js"></script>

</head>
<body>

	<?php
		
		if( !isset($_SESSION["wti"]) || empty($_SESSION["wti"]) ){
			include_once( $conf['components_path'] . "/login/login.html.php" );						
		} else {

			@$com = trim( $conf['geturl']["page"] );

			switch ( $com ) {
				case "":
					include_once( $conf['components_path'] . "/admin/admin.html.php" );
				break;

				default:
					$file_path = $conf['components_path'] . "/$com/$com.html.php";

					if ( $func->_routers( $file_path ) ) {
						include_once( $file_path );
					} else{
						include_once("404.php");
					}
				break;
			}
		}

	?>

	<!-- JQueryUI v1.9.2 -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- MiniColors -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>

	<!-- Select2 -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/forms/select2/select2.js"></script>

	<!-- jQuery Slim Scroll Plugin -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>

	<!-- Common Demo Script -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/demo/common.js?1370451130"></script>

	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/demo/themer.js"></script>

	<!-- Resize Script -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>

	<!-- Uniform -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Script -->
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/js/bootstrap.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootbox.js" type="text/javascript"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
	<script src="<?= $conf['template_admin1']; ?>/common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>

	<!-- Layout Options DEMO Script -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/demo/layout.js"></script>

	<!-- google-code-prettify -->

	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>

	<!-- Gritter Notifications Plugin -->
	<script src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>

	<!-- Notyfy -->
	<script type="text/javascript" src="<?= $conf['template_admin1']; ?>/common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>

</body>
</html>
