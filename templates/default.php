<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member-Management 1.0</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS-->
    <link href="../plugins/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../plugins/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../plugins/vendor/theme/css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?
$hidenavigation = true;
if (!$hidenavigation) {
    ?>
    <?php include_once "navigation/navigation.html" ?>
<? } ?>
<!-- <?php //$this->showContent()?>-->
<?php include_once "components/login.php";
include_once "../util/Classes.php";
$service = LoginService::getSerivce();
$user = $service->checkUserCredentials("nathan.scharnagl@gmail.com", "test");
echo $user->getFirstname();

?>

<!-- Bootstrap core JavaScript-->
<script src="../plugins/vendor/jquery/jquery.min.js"></script>
<script src="../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="../plugins/vendor/chart.js/Chart.min.js"></script>
<script src="../plugins/vendor/datatables/jquery.dataTables.js"></script>
<script src="../plugins/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="../plugins/vendor/theme/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="../plugins/vendor/theme/js/sb-admin-datatables.min.js"></script>
<script src="../plugins/vendor/theme/js/sb-admin-charts.min.js"></script>

<script src="../scripts/main.js"></script>

</body>
</html>