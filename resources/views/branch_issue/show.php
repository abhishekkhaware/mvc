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
                <?php echo sort_by('branch_manager','Branch Manager','class="'.isSort('branch_manager').'"' ); ?>
            </th>
            <th>
                <?php echo sort_by('issue_ticket','Issue Ticket','class="'.isSort('issue_ticket').'"' ); ?>
            </th>
            <th>
                <?php echo sort_by('issue_ticket_created_at','Created At','class="'.isSort('issue_ticket_created_at').'"' ); ?>
            </th>
            <th>
                <?php echo sort_by('issue','Issue','class="'.isSort('issue').'"' ); ?>
            </th>
            <th>
                <a href="#">Action</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->issues as $issue): ?>
            <tr>
                <td><?= $issue->id ?> </td>
                <td><?= $issue->issue_ticket_created_at ?> </td>
                <td><i class="label label-info"><?= $issue->issue_ticket ?></i> </td>
                <td><?= $issue->issue ?> </td>
                <td><?= ($issue->status)? "<i class='label label-success' >SOLVED</i>":
                        "<i class='label label-danger' >UNSOLVED</i>" ?> </td>
                <td>
                    <?= ($issue->result=='unresolved')? "<i class='label label-danger' >UNRESOLVED</i>": $issue->result.
                        " <sup class='label label-success' >(RESOLVED)</sup>"; ?>
                </td>
                <td><a href="#" class="btn btn-success">Response</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr/>
    <?php echo $this->createLinks; ?>
<?php else: ?>
    <h1 class="alert alert-danger">NO RECORD FOUND!!</h1>
<?php endif; ?>
