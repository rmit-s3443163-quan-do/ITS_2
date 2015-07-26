<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
                <div class="container">
                <div class="row">
                    <div class="col-xs-offset-0 col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                        <div id="logo"></div>
                        <form action="<?= base_url() . 'home/login'?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" name="uname" class="form-control" placeholder="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input type="password" name="upass" class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div>
                            <button style="width: 100%;" type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-chevron-right"></span> let me in
                            </button>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <a href="#"><em><input name="rmb" type="checkbox"> remember me</em></a>
                                </label>
                                <div class="pull-right">
                                    <a href="#"><em>forget password</em></a>
                                </div>
                            </div>
                            <div class="hidden-space">
                                <?php if ($errors!=''): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Warning!</strong>
                                    <ul>
                                        <li>Username is required.</li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
