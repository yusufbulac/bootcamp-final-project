<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; My Account</div>
                            <div class="bigtitle">My Account</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="title-bg">
        <div class="title">My Comments</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
            <tr>
                <th>News ID</th>
                <th>News Title</th>
                <th>Comment Title</th>
                <th>Comment Content</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($userComment as $comment) : ?>
                <tr>
                    <td><?= $comment->news_id ?></td>
                    <td><a href="/news/<?= $comment->news_title ?>"><?= $comment->news_title ?></a></td>
                    <td><?= $comment->comment_title ?></td>
                    <td><?= $comment->comment_content ?></td>
                    <form action="/account" method="post">
                        <td>
                            <input type="hidden" name="comment_id" id="comment_id" value="<?= $comment->comment_id ?>">
                            <button type="submit" name="delete_comment" class="btn btn-default btn-red">X</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <form class="form-horizontal checkout" role="form" method="post" action="/account">
        <input type="hidden" name="user_id" id="user_id" value="<?= $userInfo->user_id ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bg">
                    <div class="title">My News</div>
                </div>
                <div>You can choose your own news feed here.</div>
                <br>
                <div class="form-group dob">
                    <?php foreach ($allCategory as $category) : ?>

                        <div class="col-sm-3">

                            <input type="checkbox" <?php foreach ($myCategory as $mCategory) : ?>

                                <?= ($mCategory->category_id == $category->category_id) ? 'checked' : null ?>

                            <?php endforeach; ?>
                                   id="<?= $category->category_name ?>" name="category[]"
                                   value="<?= $category->category_id ?>">

                            <label for="<?= $category->category_name ?>"> <?= $category->category_name ?></label><br>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
            <br><br>
            <div class="col-md-12">
                <button type="submit" name="myNews" class="btn btn-default btn-red">CHOOSE</button>
            </div>


        </div>
    </form>

    <?php if (isset($_SESSION["messageUserUpdate"])) {
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
            <div class="avatock"><span style="color: red"><?php echo $_SESSION["messageUserUpdate"] ?></span></div>
        </div>
        <?php
    } ?>


    <form class="form-horizontal checkout" role="form" method="post" action="/account">
        <input type="hidden" name="user_id" id="user_firstname" value="<?= $userInfo->user_id ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">User Details</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_firstname" id="user_firstname"
                               placeholder="First Name" value="<?= $userInfo->user_firstname ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_lastname" id="user_lastname"
                               placeholder="Last Name" value="<?= $userInfo->user_lastname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name"
                               value="<?= $userInfo->user_name ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="user_age" id="user_age" placeholder="Age"
                               value="<?= $userInfo->user_age ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email"
                               value="<?= $userInfo->user_email ?>">
                    </div>
                </div>
                <button type="submit" name="update_user" class="btn btn-default btn-red">Update</button>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">User address</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="user_address" id="user_address"
                                  placeholder="Address"><?= $userInfo->user_address ?></textarea>
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_city" id="user_city" placeholder="City"
                               value="<?= $userInfo->user_city ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="user_country" id="user_country"
                               placeholder="Country" value="<?= $userInfo->user_country ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="form-horizontal checkout" role="form" method="post" action="/account">
        <input type="hidden" name="user_id" id="user_id" value="<?= $userInfo->user_id ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bg">
                    <div class="title">Change Password</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="user_password" id="user_password"
                               placeholder="Current Password">
                    </div>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="user_newpassword" id="user_newpassword"
                               placeholder="New Password">
                    </div>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="user_newpassword2" id="user_newpassword2"
                               placeholder="Confirm Password">
                    </div>
                </div>
                <button type="submit" name="change_password" class="btn btn-default btn-red">Change Password</button>
            </div>
        </div>
    </form>


    <form class="form-horizontal checkout" role="form" method="post" action="/account">
        <input type="hidden" name="user_id" id="user_id" value="<?= $userInfo->user_id ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bg">
                    <div class="title">Delete Account</div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="user_password" id="user_password"
                               placeholder="Confirm Password">
                    </div>
                    <div class="col-sm-4">
                        <input type="checkbox" id="delete_acc" name="delete_acc" value="delete_acc" required>
                        <label for="delete_acc"> Are you sure?</label><br>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="col-md-12">
                <button type="submit" name="delete_me" class="btn btn-default btn-red">DELETE</button>
            </div>


        </div>
    </form>


    <div class="spacer"></div>
</div>