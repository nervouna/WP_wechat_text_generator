<?php
/**
 * @param $wechat_item_id
 * @param int $order
 * @return string
 */
function generate_item_list( $wechat_item_id, $order=1 ) {
    $wechat_item = get_post( $wechat_item_id );
    $list_item = "$order\. $wechat_item->post_title<br />";
    return $list_item;
}
/**
 * @param $wechat_item_id
 * @param $order
 * @return $wechat_full_item
 */
function generate_item_html( $wechat_item_id, $order=1 ) {
    // Variables
    $wechat_item = get_post( $wechat_item_id );
    $wechat_item_title = $wechat_item->post_title;
    $wechat_item_video = get_post_meta( $wechat_item_id )["wpcf-qq_video"][0];
    $wechat_item_thumbnail = get_the_post_thumbnail( $wechat_item_id );
    $wechat_item_content = explode( "\n", $wechat_item->post_content );

    // Templates
    $wechat_item_header = <<<EOD
<div class="item" id="item-$wechat_item_id">
<fieldset style="white-space: normal; border: 0px; margin: 1em 0px 2em; clear: both; box-sizing: border-box; padding: 0px;">
  <section style="text-align: center; font-size: 1em; font-family: inherit; font-weight: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; color: rgb(255, 255, 255); border-color: rgb(95, 156, 239); box-sizing: border-box;">
    <section style="width: 2em; height: 2em; margin: 0px auto; border-radius: 50%; box-sizing: border-box; background-color: rgb(95, 156, 239);">
      <section style="display: inline-block; padding: 0px 0.5em; font-size: 1em; line-height: 2; font-family: inherit; box-sizing: border-box;">
        $order
      </section>
    </section>
    <section style="margin-top: -1em; margin-bottom: 1em; box-sizing: border-box;" class="tn-Powered-by-XIUMI">
      <section style="border-top-width: 1px; border-top-style: solid; border-color: rgb(95, 156, 239); width: 35%; float: left; box-sizing: border-box;" class="tn-Powered-by-XIUMI"></section>
      <section style="border-top-width: 1px; border-top-style: solid; border-color: rgb(95, 156, 239); width: 35%; float: right; box-sizing: border-box;" class="tn-Powered-by-XIUMI"></section>
    </section>
  </section>
</fieldset>
<blockquote style="margin: 0.5em 0px 0.3em; padding: 0px; border: none; font-family: inherit; white-space: normal; box-sizing: border-box; font-size: 1.5em; line-height: 1.5em;">
  <h2 style="font-size: 1em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; color: inherit; box-sizing: border-box;">$wechat_item_title</h2>
</blockquote>
EOD;
    $wechat_item_featured_image = <<<EOD
<fieldset style="white-space: normal; border: 0px; box-sizing: border-box; width: 100%; clear: both; padding: 0px; text-align: center;">
  $wechat_item_thumbnail
</fieldset>
EOD;
    $wechat_item_text = '';
    foreach ( $wechat_item_content as $line ) {
        // Holy shit
        if ( !empty( trim( $line ) ) ) {
            $wechat_item_text .= '<p>' . $line . '</p>';
        }
    }
    $wechat_item_footer = <<<EOD
<p style="margin-top: 0px; margin-bottom: 0px; clear: both; color: inherit; font-family: inherit; font-size: 1em; font-weight: inherit; white-space: normal; text-decoration-style: inherit; text-decoration-color: inherit; text-align: justify; text-decoration-line: inherit; box-sizing: border-box;">
  回复&nbsp;<span style="background-color: rgb(255, 255, 0);"><strong>$wechat_item_id</strong></span>&nbsp;可以获取直达链接
</p>
</div>
EOD;
    if ( !empty( $wechat_item_video ) ) {
        $wechat_item_footer .= "<p>" . $wechat_item_video . "</p>";
    }
    $wechat_full_item = $wechat_item_header .
        $wechat_item_featured_image .
        $wechat_item_text .
        $wechat_item_footer;
    return $wechat_full_item;
}
?>