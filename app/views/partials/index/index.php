        <?php
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div class=" py-5">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4 comp-grid">
                        <?php $this::display_page_errors(); ?>

                        <div class="bg-light p-3 animated fadeIn page-content">
                            <div>
                                <div class="d-flex justify-content-center mb-2">
                                    <img src="<?php print_link("assets/images/logo-1.png"); ?>" width="175" height="75" />
                                </div>
                                <div class="d-flex justify-content-center mb-4">
                                    <h5 style="color:black;">User Login</h5>
                                </div>
                                <hr />
                                <?php
                                $this::display_page_errors();
                                ?>
                                <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                    <div class="input-group form-group">
                                        <input placeholder="Username" name="username" required="required" class="form-control" type="text" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <input placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                                        </div>
                                    </div>
                                    <div class="row clearfix mt-3 mb-3">
                                        <div class="col-6">
                                            <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block btn-md" type="submit">
                                            <i class="load-indicator">
                                                <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
                                            </i>
                                            Login <i class="fa fa-key"></i>
                                        </button>
                                    </div>
                                    <hr />
                                    <div class="text-center">
                                        Don't Have an Account? <a href="<?php print_link("index/register") ?>" class="btn btn-success">Register
                                            <i class="fa fa-user"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>