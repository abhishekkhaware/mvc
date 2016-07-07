<div class="container">
    <h1>Add New Issue</h1>
    <form role="form">
            <input type="hidden" name="baranch_id" value="1" >
        <div class="form-group">
            <label for="issue_ticket">Issue Ticket</label><input type="text" required class="form-control" name="issue_ticket" value="TK-ICICI-212" readonly id="issue_ticket">
        </div>
        <div class="form-group">
            <label for="issue">Issue</label><textarea required class="form-control" id="issue"></textarea>
            <p class="help-block">
                Example block-level help text here.
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>