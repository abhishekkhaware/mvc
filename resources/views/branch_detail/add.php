<div class="container">
    <h1>Add New Branch</h1>
    <form action="<?=URL.'branchdetail/store' ?>" method="POST" role="form">
        <div class="form-group">
            <label for="branch_name">Branch Name</label><input type="text" required class="form-control" id="branch_name" name="branch_name" value="<?=oldInput('branch_name'); ?>">
            <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors']['branch_name'])): ?>
                <p class="error">
                    <?php echo $_SESSION['errors']['branch_name'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="branch_manager">Branch Manager</label><input type="text" required class="form-control" id="branch_manager" name="branch_manager" value="<?=oldInput('branch_manager'); ?>">
            <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors']['branch_manager'])): ?>
                <p class="error">
                    <?php echo $_SESSION['errors']['branch_manager'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="location">Location</label><textarea required class="form-control" id="location" name="location" ><?=oldInput('location'); ?></textarea>
            <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors']['location'])): ?>
                <p class="error">
                    <?php echo $_SESSION['errors']['location'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Email ID</label><input type="email" required class="form-control" id="email" name="email" value="<?=oldInput('email'); ?>">
            <?php if(isset($_SESSION['errors']) && !empty($_SESSION['errors']['email'])): ?>
                <p class="error">
                    <?php echo $_SESSION['errors']['email'] ?>
                </p>
            <?php endif; ?>
        </div>
        <input type="submit" name="add-issue" value="Add New Branch" class="btn btn-primary" />
    </form>
    <?php if(isset($_SESSION['errors'])){ Session::remove('errors'); Session::remove('old'); } ?>
</div>