<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Member List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <?php foreach ($this->membersattr as $attr){?>
                                <th><?php echo $attr;?></th>
                            <?php }?>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <?php foreach ($this->membersattr as $attr){?>
                                <th><?php echo $attr;?></th>
                            <?php }?>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach (MemberlistService::getSerivce()->getAllMembers() as $member){?>
                            <tr>
                                <td><?php echo $member->getId();?></td>
                                <td><?php echo $member->getFirstname();?></td>
                                <td><?php echo $member->getLastname();?></td>
                                <td><?php echo $member->getEmail();?></td>
                                <td><?php echo $member->getPhone();?></td>
                                <td><?php echo $member->getBirthdate();?></td>
                                <td><?php echo $member->getMemberNr();?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>