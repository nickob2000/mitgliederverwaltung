<?php
session_start();

include_once "../util/Classes.php";
$contentmanager = ContentService::getSerivce();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member-Management 1.0</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

    <link rel="stylesheet" href="../styles/styles.css">

</head>
<body class="fixed-nav sticky-footer" id="page-top">

<?php
ini_set('display_errors', 1);
error_reporting(~0);
$contentmanager->showNavigation();
$contentmanager->showContent($_GET['page']);

if($contentmanager->isLoggedIn()){
    include "components/logout.php";
}
?>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Member Management 2018</small>
        </div>
    </div>
</footer>

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