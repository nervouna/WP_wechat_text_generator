<?php
/**
 * @param $wechat_item_id
 * @param int $order
 * @return string
 */
function generate_item_list( $wechat_item_id, $order=1 ) {
    $wechat_item_title = get_post( $wechat_item_id )->post_title;
    $list_item = "$order. $wechat_item_title <br />";
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
    $wechat_item_product_id = get_post_meta( $wechat_item_id )["wpcf-wechat_id"][0];
    $wechat_item_content = explode( "\n", $wechat_item->post_content );

    // Templates
    $wechat_item_header = <<<EOD
<div class="item" id="item-$wechat_item_id">
  <fieldset style="border: 0px; margin: 0.8em 0px 0.5em; box-sizing: border-box; padding: 0px;">
    <section style="display: inline-block; padding: 0px 2px 2px; box-sizing: border-box; border-bottom-width: 2px; border-bottom-style: solid; border-color: rgb(95, 156, 239); line-height: 1; font-size: 16px; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: rgb(255, 255, 255);">
      <section style="display: inline-block; margin: 0px; padding: 0.3em 0.4em; min-width: 1.8em; min-height: 1.6em; border-radius: 80% 100% 90% 20%; line-height: 1; font-size: 16px; font-family: inherit; box-sizing: border-box; word-wrap: break-word !important; background-color: rgb(95, 156, 239);">
        <section style="box-sizing: border-box;">
          $order
        </section>
      </section>
      <span style="display: inline-block; margin-left: 0.4em; max-width: 100%; color: rgb(0, 112, 192); line-height: 1.4; font-size: 16px; word-wrap: break-word !important; box-sizing: border-box;">
      <span style="max-width: 100%; font-size: 16px; font-family: inherit; font-weight: bolder; text-align: inherit; text-decoration: inherit; color: rgb(95, 156, 239); box-sizing: border-box; word-wrap: break-word !important;">
      <section style="box-sizing: border-box;">
        $wechat_item_title
      </section>
      </span>
      </span>
    </section>
  </fieldset>
EOD;
    $wechat_item_text = '';
    foreach ( $wechat_item_content as $line ) {
        // Holy shit
        if ( trim( $line ) ) {
            $wechat_item_text .= '<p>' . $line . '</p>';
        }
    }
    $wechat_item_footer = <<<EOD
  <p style="margin-top: 0px; margin-bottom: 0px; clear: both; color: inherit; font-family: inherit; font-size: 16px; font-weight: inherit; white-space: normal; text-decoration-style: inherit; text-decoration-color: inherit; text-align: justify; text-decoration-line: inherit; box-sizing: border-box;">
    回复&nbsp;<span style="background-color: rgb(255, 255, 0);"><strong>$wechat_item_product_id</strong></span>&nbsp;可以获取直达链接
  </p>
</div>
EOD;
    if ( !empty( $wechat_item_video ) ) {
        $wechat_item_footer .= "<p>" . $wechat_item_video . "</p>";
    }
    $wechat_item_html = $wechat_item_header . $wechat_item_thumbnail . $wechat_item_text . $wechat_item_footer;
    return $wechat_item_html;
}
?>
