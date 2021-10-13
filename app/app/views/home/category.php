<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Category</div>
                            <div class="bigtitle"><?= $category[0]->category_name ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
                <div class="title">Category - <?= $category[0]->category_name ?></div>

            </div>

            <ul class="gridlist">
                <?php foreach ($news as $newsitem) : ?>
                <li class="gridlist-inner">
                    <div class="white">
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <div class="pr-img">
                                    <div class="hot"></div>
                                    <a href="/news/<?= $newsitem->news_title ?>"><img src="<?= ASSETS ?>uploads/news/<?= $newsitem->news_photo ?>" alt="" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="gridlisttitle"><?= $newsitem->news_title ?></div>
                                <p class="gridlist-desc">
                                    <?= mb_substr($newsitem->news_content, 0, 200) ?>...
                                </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </div>
                    <div class="gridlist-act">
                        <a href="/news/<?= $newsitem->news_title ?>"><i class="fa fa-plus"></i>Read More</a>
                        <div class="clearfix"></div>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>

            <ul class="pagination shop-pag"><!--pagination-->
                <li><a href="#"><i class="fa fa-caret-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul><!--pagination-->

        </div>
            <!--sidebar-->
            <?= require_once "sidebar.php" ?>
            <!--sidebar-->
    </div>
    <div class="spacer"></div>
</div>