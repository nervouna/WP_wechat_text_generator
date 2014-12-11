<div class="wrap">
    <h2>请在这里选择需要转换的文章。</h2>
    <hr>
    <div  style="width: 40%;float:left;min-width: 300px;">
    <form action="" method="post">
    <ul>
<?php

query_posts('posts_per_page=10');
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>
            <li><input name=<?php the_ID() ?> value=<?php the_ID(); ?> type="checkbox"><?php the_title(); ?></input></li>
    <?php }
}
wp_reset_query();
?>
    </ul>
    <p class="submit">
        <input type=submit class="button button-primary" value="提交" />
    </p>
    </form>
</div>
