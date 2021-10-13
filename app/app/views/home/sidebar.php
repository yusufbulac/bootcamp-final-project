<!--sidebar-->
<div class="col-md-3">
    <div class="title-bg">
        <div class="title">Categories</div>
    </div>

    <div class="categorybox">
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href="/category/<?= $category->category_name ?>"><?= $category->category_name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<!--sidebar-->