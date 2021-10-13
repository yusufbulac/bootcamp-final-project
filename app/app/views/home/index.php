
<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>
    <div class="main-slide">
        <div id="sync1" class="owl-carousel">
            <?php foreach ($news as $newsitem) : ?>
                <div class="item">
                    <div class="slide-desc">
                        <div class="inner">
                            <h1><?= $newsitem->news_title ?></h1>
                            <p>
                                <?= mb_substr($newsitem->news_content, 0, 100) ?>..
                            </p>
                            <a href="/news/<?= $newsitem->news_title ?>"><button class="btn btn-default btn-red btn-lg">Read News</button></a>
                        </div>
                    </div>
                    <div class="slide-type-1">
                        <img style="width:500px;height: 300px"
                             src="<?= ASSETS ?>uploads/news/<?= $newsitem->news_photo ?>" alt=""
                             class="img-responsive">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="bar"></div>
    <div id="sync2" class="owl-carousel">
        <?php foreach ($news as $newsitem) : ?>
            <div class="item">
                <div class="slide-type-1-sync">
                    <h3><?= $newsitem->news_title ?></h3>
                    <p><?= mb_substr($newsitem->news_content, 0, 20) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="f-widget featpro">
    <div class="container">
        <div class="title-widget-bg">
            <div class="title-widget">Last news</div>
            <div class="carousel-nav">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </div>
        <div id="product-carousel" class="owl-carousel owl-theme">
            <?php foreach ($lastNews as $newsitem) : ?>
                <div class="item">
                    <div class="productwrap">
                        <div class="pr-img">
                            <div class="hot"></div>
                            <a href="/news/<?= $newsitem->news_title ?>"><img style="width: 200px;height: 100px"
                                                       src="<?= ASSETS ?>uploads/news/<?= $newsitem->news_photo ?>"
                                                       alt=""
                                                       class="img-responsive"></a>

                        </div>
                        <span class="smalltitle"><a href="/news/<?= $newsitem->news_title ?>"><?= $newsitem->news_title ?></a></span>
                        <span class="smalldesc"><?= mb_substr($newsitem->news_content, 0, 20) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">About Us</div>
            </div>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
            <a href="/about" class="btn btn-default btn-red btn-sm">Read More</a>

            <div class="title-bg">
                <div class="title">Other News</div>
            </div>
            <div class="row prdct">
                <?php foreach ($news as $newsitem) : ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <a href="/news/<?= $newsitem->news_title ?>"><img style="width: 300px;height: 150px"
                                            src="<?= ASSETS ?>uploads/news/<?= $newsitem->news_photo ?>" alt=""
                                            class="img-responsive"></a>
                            </div>
                            <span class="smalltitle"><a href="product.htm"><?= $newsitem->news_title ?></a></span>
                            <span class="smalldesc"><?= mb_substr($newsitem->news_content, 0, 20) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
    </div>
</div>
