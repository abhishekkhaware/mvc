<form class="form-inline" method="get" action="<?=URL.'branchissue/search_by_ticket'; ?>" role="search">
    <div class="form-group">
        <input type="search" name="q-tkt" class="form-control" id="search-tkt" placeholder="Search By Ticket ID..">
    </div> <button type="submit" class="btn btn-primary">Search</button>
</form>
<?php if(isset($this->issues) && !empty($this->issues)): ?>
<table class="table table-bordered table-responsive">
    <caption><h1>List All Issues</h1>
        <hr/></caption>
    <thead>
    <tr class="success">
        <th>
            <?php echo sort_by('id','Issue ID','class="'.isSort('id').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('branchdetail_id','Branch ID','class="'.isSort('branchdetail_id').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('issue_ticket_created_at','Created At','class="'.isSort('issue_ticket_created_at').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('issue_ticket','Issue Ticket','class="'.isSort('issue_ticket').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('status','Status','class="'.isSort('status').'"' ); ?>
        </th>
<!--        <th>-->
<!--            --><?php //echo sort_by('result','Result','class="'.isSort('result').'"' ); ?>
<!--        </th>-->
        <th>
            <a href="#">Action</a>
        </th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($this->issues as $issue): ?>
            <tr>
                <td><?= $issue->id ?> </td>
                <td><?= $issue->branchdetail_id ?> </td>
                <td><?= $issue->issue_ticket_created_at ?> </td>
                <td><i class="label label-info"><?= $issue->issue_ticket ?></i> </td>
                <td><?= ($issue->status)? "<i class='label label-success' >SOLVED</i>":
                    "<i class='label label-danger' >UNSOLVED</i>" ?> </td>
<!--                <td>-->
<!--                    <?//= ($issue->result=='unresolved')? "<i class='label label-danger' >UNRESOLVED</i>": $issue->result.
//                            " <sup class='label label-success' >(RESOLVED)</sup>"; ?>
                </td>-->
                <td><a href="#model-<?=$issue->id; ?>"  role="link" class="btn btn-success" data-toggle="modal">Response </a>
                    <div class="modal fade" id="model-<?=$issue->id; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header btn-success">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Response To The Issue Id: <strong><?= $issue->id ?></strong> of Branch Id: <strong><?= $issue->branchdetail_id ?></strong>.
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?=URL."branchissue/response/".$issue->id; ?>" method="post" id="response">
                                        <div class="form-group">
                                            <input type="hidden" name="issue_id" value="<?=$issue->id; ?>" >
                                            <label for="">Branch Id</label><input type="text" readonly class="form-control" value="<?=$issue->branchdetail_id; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Issue Ticket</label><input type="text" readonly class="form-control" value="<?=$issue->issue_ticket; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Issue</label><textarea readonly rows="3" class="form-control"><?=$issue->issue; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Issue Created On</label><input type="text" readonly class="form-control" value="<?=$issue->issue_ticket_created_at; ?>" >
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status" <?=($issue->status)? 'checked': ''; ?> > Change Status</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="remark">Remark</label><textarea class="form-control" required name="remark" rows="3" id="remark" placeholder="Remark For The Issue(As Result).."></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary pull-right">Submit Response</button></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr/>
<?php echo $this->createLinks; ?>
<?php else: ?>
     <h1 class="alert alert-danger">NO RECORD FOUND!!</h1>
<?php endif; ?>
