<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mainNav" id="mainNav">
    <a class="navbar-brand" href="../default.php">Member Membership</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php if ($this->isLoggedIn()) { ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?page=memberlist">
                        <i class="fa fa-fw fa-table"></i>Member Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=useradministration">
                        <i class="fa fa-fw fa-user"></i>User administration</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>

        <?php } ?>

    </div>
</nav>