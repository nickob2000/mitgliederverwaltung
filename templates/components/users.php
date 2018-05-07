<?php
if(isset($_POST['declinerequest'])){
    echo "test";
    if($_POST["userid"] != ""){
        RequestService::getSerivce()->declineRequestById($_POST["userid"]);
    }
}
if(isset($_POST['acceptrequest'])){
    if($_POST["userid"] != ""){
        RequestService::getSerivce()->acceptRequestById($_POST["userid"]);
    }
}
echo "<pre>";
print_r(RequestService::getSerivce()->getAllRequests()) ;
echo "</pre>";
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user"></i> User Requests
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    foreach (RequestService::getSerivce()->getAllRequests() as $user) { ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="card mb-5 ">
                                <div class="card-header">
                                    <div class="clearfix">
                                        <span class="float-left"><?php echo  $user->getFirstname() . " " . $user->getLastname(); ?></span>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=useradministration';?>" name="declinerequestform">
                                            <input type="hidden" name="userid" value="<?php echo $user->getId(); ?>">
                                            <input type="submit" name="declinerequest" id="declinerequest" value="Decline" class="btn text-right bg-danger text-white a-btn-slide-text float-right"
                                        </form>
                                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]. "?page=useradministration";?>" name="acceptrequestform">
                                            <input type="hidden" name="userid" value="<?php echo $user->getId(); ?>">
                                            <input type="submit" name="acceptrequest" id="acceptrequest" value="Accept" class="btn text-right bg-success text-white a-btn-slide-text float-right mr-2"
                                        </form>

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
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>