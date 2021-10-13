<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Login</div>
                            <div class="bigtitle">Login</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal checkout" role="form" method="post" action="/login">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="title-bg">
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_name" id="user_name" maxlength="50"
                               placeholder="*User Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="user_password" id="user_password" maxlength="50"
                               placeholder="*Password" required>
                    </div>
                </div>
                <div>*Required fields</div>
                <br>
                <?=(isset($_SESSION["messageLogin"]))?"<div style='color: red'><b>{$_SESSION['messageLogin']}</b></div>":null;?>
                <button type="submit" name="login" class="btn btn-default btn-red">Login</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
    <div class="spacer"></div>
</div>
