<div style="background-color: transparent; width: 50%; margin: 0 auto; float: left;">
    <?php if ( count( $_POST ) ): ?>
    <h3>文章预览</h3>
    <?php endif ?>
<div id="wechat-post" class="wechat-post" style="background-color: transparent; width: 100%; margin: 0 auto; float: left;">

<?php

if ( count( $_POST ) > 0 ) {

    foreach ( $_POST as $wechat_post_id ) {

        // Title
        $wechat_post = get_post( $wechat_post_id );
        echo "<h2 style=\"background:transparent;font-size:24px;font-weight:600;text-align:center;line-height:28px;\">".$wechat_post->post_title."</h2>";

        // If have video, prints video url
        $wechat_post_meta = get_post_meta( $wechat_post_id );
        if ( array_key_exists( "wpcf-qq_video", $wechat_post_meta ) ) {
            echo "<p><code style=\"background:transparent;\">".$wechat_post_meta["wpcf-qq_video"][0]."</code></p>";
        }

        // Featured Image
        $wechat_post_thumbnails = get_the_post_thumbnail( $wechat_post_id );
        echo "<p style=\"background: transparent; text-align:center\">".get_the_post_thumbnail( $wechat_post_id )."</p>";

        // Split post content into lines and wrap each with <p>
        $wechat_post_content = explode( "\n", $wechat_post->post_content );
        foreach ( $wechat_post_content as $line ) {
            if ( !ctype_space( $line ) and !empty($line) ) {
                echo "<p style=\"background: transparent; color: #333; font-size: 16px;\">" . $line . "</p>";
            }
        }

        // Reply ID to get link
        echo "<p style=\"background: transparent; color: #333; font-size: 16px;\">回复 <span style=\"font-weight:bold;background-color:yellow;\">".$wechat_post->ID."</span> 可以获得直达链接</p>";
        echo "<hr>";
    }

}

?>

</div>

<script>
    function RefineStyle () {
        var images = document.getElementsByClassName('attachment-post-thumbnail wp-post-image');
        for (var i=0; i<images.length; i++) {
            images[i].style.background = "transparent";
            images[i].style.border = "1px solid rgba(0, 0, 0, 0.3)";
            images[i].removeAttribute('width');
            images[i].removeAttribute('height');
            images[i].style.width = "100%";
        }
        for (var i=images.length-1; i>=0; i--) {
            images[i].removeAttribute('class');
        }
    };
    function SelectText(element) {
        var doc = document
            , text = doc.getElementById(element)
            , range, selection
            ;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }

    document.onload = function() {
        SelectText('wechat-post');
        RefineStyle();
    } ();
</script>
</div>

</div>
