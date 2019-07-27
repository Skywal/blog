<div class="content-grid">
    <?php if($articles): ?>
    <?php foreach (array_reverse($articles) as $art) : ?>
    <div class="content-grid-info">
        <img src="images/<?=$art->image;?>" alt=""/>
        <div class="post-info">
            <h4><a href="single.html"><?=$art->title;?></a></h4>
            <h4><?=$art->pubdate;?> / <?=$art->views;?> Views</h4><br>
            <p><?=$art->text;?></p>
            <a href="single.html"><span></span>READ MORE</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>