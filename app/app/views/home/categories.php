
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Category</div>
                            <div class="bigtitle">All Categories</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row prdct"><!--Products-->
        <?php foreach ($categories as $category) : ?>
        <div class="col-md-3">
            <div class="productwrap">
                <div class="pr-img">
                    <a href="/category/<?= $category->category_name ?>"><img style="width: 200px;height: 125px" src="<?= ASSETS ?>uploads/category/<?= $category->category_name ?>.jpg" alt="" class="img-responsive"></a>
                </div>
                <span class="smalltitle"><a href="/category/<?= $category->category_name ?>"><?= $category->category_name ?></a></span>
            </div>
        </div>
        <?php endforeach; ?>

    </div><!--Categories-->

    <div class="spacer"></div>
</div>