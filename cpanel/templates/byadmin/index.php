<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <base href="<?= $conf['rooturl_backend'] . "/"; ?>">
    <meta charset="utf-8"/>
    <title>Dashboard</title>

    <meta name="description" content="Dashboard"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="<?= $conf['template_admin']; ?>/assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?= $conf['template_admin']; ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link id="bootstrap-rtl-link" href="" rel="stylesheet"/>
    <link href="<?= $conf['template_admin']; ?>/assets/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?= $conf['template_admin']; ?>/assets/css/weather-icons.min.css" rel="stylesheet"/>

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!--Beyond styles-->
    <link id="beyond-link" href="<?= $conf['template_admin']; ?>/assets/css/beyond.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?= $conf['template_admin']; ?>/assets/css/demo.min.css" rel="stylesheet"/>
    <link href="<?= $conf['template_admin']; ?>/assets/css/typicons.min.css" rel="stylesheet"/>
    <link href="<?= $conf['template_admin']; ?>/assets/css/animate.min.css" rel="stylesheet"/>
    <link id="skin-link" href="" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= $conf['template_admin']; ?>/assets/css/superweb-custom.css">
    <script src="<?= $conf['template_admin']; ?>/assets/js/jquery.min.js"></script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <!--<script src="<?= $conf['template_admin']; ?>/assets/js/skins.min.js"></script>-->

    <!-- jQuery Validate -->
    <script src="<?= $conf['template_admin']; ?>/assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <!--SuperWeb Scripts-->
    <script src="/cpanel/javascript/superweb.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
<!-- Loading Container -->

<?php if (isset($_SESSION["wti"]) || !empty($_SESSION["wti"])) {
    include_once("modules/top-side-bar.php");
} ?>
<div class="main-container container-fluid">
    <div class="page-container">
        <?php include_once($conf['components_path']."/router/router.php"); ?>
    </div>
</div>



<!--Basic Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= $conf['template_admin']; ?>/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

<!--Beyond Scripts-->
<script src="<?= $conf['template_admin']; ?>/assets/js/beyond.js"></script>
<!-- Toastr Notifications -->
<script src="<?= $conf['template_admin']; ?>/assets/js/toastr/toastr.js"></script>
<!-- Bootstrap Validator -->
<script src="<?= $conf['template_admin']; ?>/assets/js/validation/bootstrapValidator.js"></script>
<!-- BootBox -->
<script src="<?= $conf['template_admin']; ?>/assets/js/bootbox/bootbox.js"></script>
<script>
    <?php if(!empty($_SESSION["message"]["notyfy"])): ?>
    $(function () {
        Notify(
            "<?= $_SESSION["message"]["notyfy"]; ?>",
            'top-right', '5000',
            '<?= !empty($_SESSION["message"]["type"]) ? $_SESSION["message"]["type"] : 'info' ?>',
            'fa-exclamation-triangle',
            true
        );
    });
    <?php unset($_SESSION["message"]); endif; ?>
</script>

</body>
<!--  /Body -->
</html>
