<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; News Detail</div>
                            <div class="bigtitle"><?= $news->news_title ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?= $news->news_title ?></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="dt-img">
                        <a href="/news/<?= $news->news_title ?>" data-fancybox-group="gallery"
                           title="Cras neque mi, semper leon"><img
                                    src="<?= ASSETS ?>uploads/news/<?= $news->news_photo ?>" alt=""
                                    class="img-responsive"></a>
                    </div>
                </div>

            </div>

            <div class="tab-review">
                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li class="active"><a href="#desc" data-toggle="tab">Details</a></li>
                    <li class=""><a href="#rev" data-toggle="tab">Comments (<?= count($comments) ?>)</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade active in" id="desc">
                        <p><?= $news->news_content ?></p>
                    </div>
                    <div class="tab-pane fade" id="rev">
                        <?php foreach ($comments as $comment) : ?>
                            <p class="dash">

                                <br>
                            <h4><?= $comment->comment_title ?></h4>
                            <br>
                            <?= $comment->comment_content ?>
                            <br><br><br>
                            <div style="float: right">
                                <span><b><?= ($comment->comment_isanonymous == 0) ? $comment->user_name : "Anonymous"; ?> </b></span>

                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                <span> <?= $comment->comment_date ?></span>
                            </div>
                            </p>
                        <?php endforeach; ?>
                        <h4>Write Comment</h4>
                        <?php if (isset($_SESSION["user_name"])) {
                            ?>
                            <form role="form" action="/news/comment" method="post">
                                <input type="hidden" class="form-control" name="news_id" value="<?= $news->news_id ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="comment_title" id="comment_title"
                                           placeholder="Comment Title">
                                    <input type="checkbox" id="anonymous" name="anonymous" value="anonymous">
                                    <label for="vehicle1"> Send anonymously</label><br>
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" name="comment_content" id="comment_content"
                                          placeholder="Comment"></textarea>
                                </div>
                                <button type="submit" name="new_comment" class="btn btn-default btn-red btn-sm">Submit
                                </button>
                            </form>
                            <?php
                        } else {
                            echo "Please register to leave a comment.";
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div id="title-bg">
                <div class="title">Other News</div>
            </div>
            <div class="row prdct">
                <!--Other News-->
                <?php foreach ($otherNews as $otherNew) : ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <a href="/news/<?= $otherNew->news_title ?>"><img style="width: 200px;height: 125px"
                                                                                  src="<?= ASSETS ?>uploads/news/<?= $otherNew->news_photo ?>"
                                                                                  alt=""
                                                                                  class="img-responsive"></a>

                            </div>
                            <span class="smalltitle"><a
                                        href="/news/<?= $otherNew->news_title ?>"><?= $otherNew->news_title ?></a></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!--Other News-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <!--sidebar-->
        <?= require_once "sidebar.php" ?>
        <!--sidebar-->
    </div>
</div>
