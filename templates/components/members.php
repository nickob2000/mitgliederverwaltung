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
                        <?php foreach ($this->members as $member){?>
                            <tr>
                                <td><?php echo $member['id'];?></td>
                                <td><?php echo $member['firstname'];?></td>
                                <td><?php echo $member['lastname'];?></td>
                                <td><?php echo $member['email'];?></td>
                                <td><?php echo $member['phone'];?></td>
                                <td><?php echo $member['birthdate'];?></td>
                                <td><?php echo $member['memberNr'];?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>