<style>
    .top {
        width: 100%;
        height: 40px;
        position: absolute;
        z-index: 1000;
        top: 0;
        left: 0;
        background-color: auto;
    }
</style>
<html>

<body>
    <script>
        window.addEventListener('scroll', function() {
            //...
            if (wScrollCurrent <= 0) // scrolled to the very top; element sticks to the top
                element.style.top = '0px';

            else if (wScrollDiff > 0) // scrolled up; element slides in
                element.style.top = (elTop > 0 ? 0 : elTop) + 'px';

            else if (wScrollDiff < 0) { // scrolled down
                if (wScrollCurrent + wHeight >= dHeight - elHeight) // scrolled to the very bottom; element slides in
                    element.style.top = ((elTop = wScrollCurrent + wHeight - dHeight) < 0 ? elTop : 0) + 'px';

                else // scrolled down; element slides out
                    element.style.top = (Math.abs(elTop) > elHeight ? -elHeight : elTop) + 'px';
            }
            //...
        });
    </script>
</body>

</html>

<div id="topbar" class="navbar navbar-expand-md top navbar-dark" role="banner">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php print_link(HOME_PAGE) ?>">
            <img class="img-responsive" src="<?php print_link("assets/images/logo-1.png"); ?>" />
        </a>
        <?php
        if (user_login_status() == true) {
        ?>
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            </button>
            <button type="button" id="sidebarCollapse" class="btn btn-warning btn-sm">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <!-- <?php
                                    if (!empty(USER_PHOTO)) {
                                    ?>
                                <img class="img-fluid" style="height:30px;" src="<?php print_link(set_img_src(USER_PHOTO, 30, 30)); ?>" />
                            <?php
                                    } else {
                            ?>
                                <span class="avatar-icon"><i class="fa fa-user"></i></span>
                            <?php
                                    }
                            ?> -->
                            <span style="color:navy;">Hi <?php echo ucwords(USER_NAME); ?> !</span>
                        </a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="fa fa-user"></i> My Account</a>
                            <a class="dropdown-item" href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
if (user_login_status() == true) {
?>
    <nav id="sidebar" class="navbar-dark bg-dark">
        <button id="btn-dismiss-sidebar" class="btn btn-sm btn-dark">
            <i class="fa fa-times-circle"></i>
        </button>
        <ul class="nav navbar-nav w-100 flex-column align-self-start">
            <li class="menu-profile text-center nav-item">
                <a class="avatar" href="<?php print_link('account') ?>">
                    <?php
                    if (!empty(USER_PHOTO)) {
                    ?>
                        <img class="img-fluid" src="<?php print_link(set_img_src(USER_PHOTO, 260, 200)); ?>" />
                    <?php
                    } else {
                    ?>
                        <span class="avatar-icon"><i class="fa fa-user"></i></span>
                    <?php
                    }
                    ?>
                </a>
                <h5 class="user-name">Hi
                    <?php echo ucwords(USER_NAME); ?>
                </h5>
                <div class="dropdown menu-dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="fa fa-user"></i> My Account</a>
                        <a class="dropdown-item" href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>"><i class="fa fa-sign-out"></i> Logout</a>
                    </ul>
                </div>
            </li>
        </ul>
        <?php Html::render_menu(Menu::$navbarsideleft, "nav navbar-nav w-100 flex-column align-self-start", "accordion"); ?>
    </nav>
    <div class="overlay"></div>
<?php
}
?>