<div class="content-grid">
    <?php if($articles_cat): ?>
        <?php foreach (array_reverse($articles_cat) as $art_cat) : ?>
            <div class="content-grid-info">
                <img src="images/<?=$art_cat->image;?>" alt=""/>
                <div class="post-info">
                    <h4><a href="article/<?=$art_cat->alias;?>"><?=$art_cat->title;?></a></h4>
                    <h4><?=$art_cat->pubdate;?> / <?=$art_cat->views;?> Views</h4><br>
                    <p><?=$art_cat->text;?></p>
                    <a href="article/<?=$art_cat->alias;?>"><span></span>READ MORE</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="content-grid-info">
            <div class="post-info">
                <h2>No posts</h2>
            </div>
        </div>
    <?php endif; ?>
</div>