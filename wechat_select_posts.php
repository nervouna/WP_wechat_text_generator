<div class="wrap">
    <h2>微信公众号文章格式转换器</h2>
    <hr>
    <div  style="width: 40%;float:left;min-width: 300px;">
        <h3>文章列表</h3>
    <form action="" method="post">
        <table>
<?php

query_posts('posts_per_page=10');
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>
            <tr>
                <td><input name=<?php the_ID() ?> value=<?php the_ID(); ?> type="checkbox"></input></td>
                <td style="text-align:right;"><span style="font-weight:bold;">#<?php the_ID(); ?></span></td>
                <td><?php the_title(); ?></td>
            </tr>

    <?php }
}
wp_reset_query();
?>
</table>
    <p class="submit">
        <input type=submit class="button button-primary" value="提交" />
    </p>
    </form>
</div>
