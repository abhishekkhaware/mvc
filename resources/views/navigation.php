<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="<?=URL ?>">WOW Bank- <small>Aapka Apna Bank</small></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="<?=isActive('branchdetail') ?>">
                <a href="<?=URL.'branchdetail/' ?> ">Branch Details</a>
            </li>
            <li class="<?=isActive('branchissue') ?>">
                <a href="<?=URL.'branchissue/' ?> ">Branch Issues</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Branch<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?=URL."branchdetail/add" ?>" >Add New Branch</a>
                    </li>
                    <li>
                        <a href="<?=URL."branchdetail" ?>">Display Branches</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li class="disabled">
                        <a href="#">Add New Issue</a>
                    </li>
                    <li>
                        <a href="<?=URL."branchissue" ?>">Display Issues</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <?php if(\Libs\Session::get('loggedIn')===TRUE): ?>
                    <a href="<?=URL.'user/logout' ?>">Logout</a>
                <?php else: ?>
                    <a href="<?=URL.'login' ?>">Login</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>

</nav>