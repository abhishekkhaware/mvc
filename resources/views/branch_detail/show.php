<div class="container col-lg-10 col-md-8 col-sm-12" ng-controller="BranchDetailController">
    <?php if(isset($this->details) && !empty($this->details)): ?>
        <hr/>
        <input type="text" class="form-control input-lg" placeholder="Filter Details" ng-model="filterDetails" />
        <hr/>
        <input type="hidden" id="branchid" value="<?=$this->details->id ?>"/>
        <table class="table table-bordered table-responsive">
            <caption><h3 class="alert alert-danger">List Of Issues At Branch Code: <i class="alert-link"> <?= $this->details->id ?></i> And
                    Branch Manager is: <i class="alert-link"><?= $this->details->branch_manager ?></i>
                </h3>
                <hr/></caption>
            <thead>
            <tr class="success text-info">
                <th>
                    Issue ID
                </th>
                <th>
                    Issue Ticket
                </th>
                <th>
                    Created At
                </th>
                <th>
                    Issue
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                <tr ng-repeat="detail in details.issues | filter:filterDetails" ng-if="!detail.status">
                    <td>{{ detail.id }} </td>
                    <td><i class="label label-info">{{ detail.issue_ticket}}</i></td>
                    <td>{{ detail.issue_ticket_created_at }} </td>
                    <td>{{ detail.issue }} </td>
                    <td><a href="#" class="btn btn-success">Response</a> </td>
                </tr>
                <tr ng-if="!details.issues.length">
                    <td colspan="5"><h3 class="alert alert-danger">No Record Found </h3></td>
                </tr>
            </tbody>
        </table>
        <hr/>
    <?php else: ?>
        <h1 class="alert alert-danger">NO RECORD FOUND!!</h1>
    <?php endif; ?>
</div>