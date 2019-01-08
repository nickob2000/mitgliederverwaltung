
<?php
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header('X-Content-Type-Options: nosniff');

ini_set( 'session.cookie_httponly', 1 );



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
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />

    <title>Member-Management 1.0</title>
    <link rel="stylesheet" href="../plugins/cdn/bootstrap.min.css">
    <!--[if lt IE 10]>
    <script src="../plugins/cdn/html5shiv.min.js"></script>
    <script src="../plugins/cdn/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS-->
    <link href="../plugins/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../plugins/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../plugins/vendor/theme/css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="../styles/styles.css">


    <link rel="stylesheet" type="text/css"
          href="../plugins/cdn/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/cdn/datatables/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/editor.dataTables.min.css">

    <style type="text/css" class="init">

    </style>
    <script type="text/javascript" language="javascript" src="../plugins/cdn/jquery-1.12.4.js"></script>
    <script type="text/javascript" language="javascript"
            src="../plugins/cdn/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="../plugins/cdn/datatables/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="../plugins/cdn/datatables/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="../scripts/dataTables.editor.min.js"></script>



</head>
<body class="fixed-nav sticky-footer" id="page-top">

<?php
ini_set('display_errors', 1);
error_reporting(~0);
$contentmanager->showNavigation();

if (isset($_GET['page'])) {
    $contentmanager->showContent($_GET['page']);
} else {
    $contentmanager->showContent("");
}

if ($contentmanager->isLoggedIn()) {
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

<script src="../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="../plugins/vendor/chart.js/Chart.min.js"></script>
<script src="../plugins/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="../plugins/vendor/theme/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="../plugins/vendor/theme/js/sb-admin-datatables.min.js"></script>
<script src="../plugins/vendor/theme/js/sb-admin-charts.min.js"></script>

<script src="../scripts/main.js"></script>

<script type="text/javascript" language="javascript" class="init">


    var editor; // use a global for the submit and return data rendering in the examples

    $(document).ready(function () {
        editor = new $.fn.dataTable.Editor({
            ajax: "../plugins/members.php",
            table: "#editorTable",
            fields: [{
                label: "Firstname:",
                name: "person.firstname"
            }, {
                label: "Lastname",
                name: "person.lastname"
            }, {
                label: "E-Mail",
                name: "person.email"
            }, {
                label: "Phone",
                name: "member.phone"
            }, {
                label: "Birthdate",
                name: "member.birthdate",
                type: "datetime"
            }, {
                label: "MemberNr",
                name: "member.memberNr"
            }
            ]
        });

        // Activate an inline edit on click of a table cell
        $('#editorTable').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this);
        });

        $('#editorTable').DataTable({
            dom: "Bfrtip",
            ajax: "../plugins/members.php",
            order: [[1, 'asc']],
            columns: [
                {
                    data: null,
                    defaultContent: '',
                    className: 'select-checkbox',
                    orderable: false
                },
                {data: "person.firstname"},
                {data: "person.lastname"},
                {data: "person.email"},
                {data: "member.phone"},
                {data: "member.birthdate"},
                {data: "member.memberNr"}
            ],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            buttons: [
                {extend: "create", editor: editor},
                {extend: "edit", editor: editor},
                {extend: "remove", editor: editor}
            ]
        });
    });


</script>

</body>
</html>