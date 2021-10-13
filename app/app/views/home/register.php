<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Register</div>
                            <div class="bigtitle">Register</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION["messageRegister"])) {
        ?>

        <div class="sharing">
            <div class="share-bt">
                <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript"
                        src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
                <div class="clearfix"></div>
            </div>
            <div class="avatock"><span style="color: red"><?php echo $_SESSION["messageRegister"] ?></span></div>
        </div>
        <?php
    } ?>
    <form class="form-horizontal checkout" role="form" method="post" action="/register">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">User Details</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_firstname" id="user_firstname" maxlength="255"
                               placeholder="*First Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_lastname" id="user_lastname" maxlength="255"
                               placeholder="*Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_name" id="user_name" maxlength="50" placeholder="*User Name"
                               required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="user_age" id="user_age" min="0" max="150"
                               placeholder="*Age" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="*Email" maxlength="100"
                               required>
                    </div>
                </div>
                <div class="form-group dob">

                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="user_password" id="user_password" maxlength="50"
                               placeholder="*Password" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="user_password2" id="user_password2" maxlength="50"
                               placeholder="*Confirm Password" required>
                    </div>
                </div>
                <div>*Required fields</div>
                <button type="submit" name="new_user" class="btn btn-default btn-red">Register</button>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">User address</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="user_address" id="user_address" maxlength="250" placeholder="*Address"
                                  required></textarea>
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_city" id="user_city" maxlength="100" placeholder="*City"
                               required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_country" id="user_country" maxlength="100"
                               placeholder="*Country" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
