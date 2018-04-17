<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user"></i> User Requests
            </div>
            <div class="card-body bg-secondary">
                <div class="row">
                    <?php
                    print_r(RequestService::getSerivce()->getAllRequests());
                    foreach (RequestService::getSerivce()->getAllRequests() as $user) { ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-5 ">
                                <div class="card-header">
                                    <div class="clearfix">
                                        <span class="float-left"><?php echo  $user->getFirstname() . " " . $user->getLastname(); ?></span>
                                        <a href="#" class="btn text-right bg-danger text-white a-btn-slide-text float-right">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            <span><strong>Decline</strong></span>
                                        </a>
                                        <a href="#" class="btn text-right bg-success text-white a-btn-slide-text float-right mr-2">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            <span><strong>Accept</strong></span>
                                        </a>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-6">Firstname:</div>
                                        <div class="col-xs-6"><?php echo $user->getFirstname(); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">Lastname:</div>
                                        <div class="col-xs-6"><?php echo $user->getLastname(); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">E-Mail:</div>
                                        <div class="col-xs-6"><?php echo $user->getEmail(); ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">Permission:</div>
                                        <div class="col-xs-6"><?php echo $user->getPermission(); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>