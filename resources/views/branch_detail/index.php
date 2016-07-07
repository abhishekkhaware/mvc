<hr/>
<form class="form-inline" method="get" action="<?=URL.'branchdetail'; ?>" role="search">
    <div class="form-group">
        <input type="search" name="search_query" class="form-control" id="search-query" placeholder="Search..">
    </div>
    <div class="form-group">
        <select name="searchBy" class="form-control">
            <option value="branch_name">Branch Name</option>
            <option value="branch_manager">Branch Manager</option>
            <option value="location">Location</option>
            <option value="email">Email ID</option>
        </select>
    </div> <button type="submit" class="btn btn-primary">Search</button>
</form>
<?php if(isset($_GET['search_query'])): ?>
    <a href="<?=URL.'branchdetail'?>" class="badge badge-primary pull-right">Display All</a>
<?php endif; ?>
<hr/>
<?php if(isset($this->details) && !empty($this->details)): ?>
<table class="table table-bordered table-responsive">
    <caption><h1>List of Available Branches</h1>
        <hr/></caption>
    <thead>
    <tr class="success">
        <th>
            <?php echo sort_by('id','Branch ID','class="'.isSort('id').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('branch_name','Branch Name','class="'.isSort('branch_name').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('branch_manager','Branch Manager','class="'.isSort('branch_manager').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('location','Location','class="'.isSort('location').'"' ); ?>
        </th>
        <th>
            <?php echo sort_by('email','Email Id','class="'.isSort('email').'"' ); ?>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($this->details as $detail): ?>
        <tr>
            <td><?= $detail->id ?> </td>
            <td><?= $detail->branch_name ?> <?= (array_filter($detail->issues,function($dt){return !$dt->status;}))? "<a href=".URL.'branchdetail/show/'.$detail->id." <sup class='label label-danger'>".count(array_filter($detail->issues,function($dt){return !$dt->status;}))."</sup>" : ''; ?> </td>
            <td><?= $detail->branch_manager ?> </td>
            <td><?= $detail->location ?> </td>
            <td><a href="#model-<?=$detail->id; ?>"  role="link" class="btn" data-toggle="modal"><?= $detail->email ?></a>
            <div class="modal fade" id="model-<?=$detail->id; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header btn-success">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                                Send Message To Branch Manager (<?= $detail->branch_manager ?>)
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="<?=URL."branchdetail/sendmessage/".$detail->id; ?>" method="post" id="sendmessage" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <input type="hidden" required name="branch_manager" id="branch_manager" value="<?=$detail->branch_manager; ?>">
                                    <label for="client-full-name">Your Full Name</label><input type="text" class="form-control" required placeholder="Your Full Name Here.." name="client-full-name" id="client-full-name">
                                </div>
                                <div class="form-group">
                                    <label for="client-email">Your Email address</label><input type="email" required class="form-control" name="client-email" placeholder="Your Email Id here.." id="client-email">
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label><input type="text" required class="form-control" name="subject" placeholder="Your Subject here.." id="subject">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label><textarea class="form-control" required name="message" id="message" placeholder="Your Message Here.."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="client-file">Your File Attachment</label><input type="file" id="client-file" name="client-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="20480" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary pull-right">Send Your Message</button></form>
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
