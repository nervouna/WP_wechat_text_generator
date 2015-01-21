<?php if ( count( $_POST ) ): ?>
    <?php include WTG_INCPATH . '/wechat_item_template.php' ?>
    <div style="background-color: transparent; width: 50%; margin: 0 auto; float: left;">
        <h3>文章预览</h3>
        <div id="wechat-post" class="wechat-post" style="background-color: transparent; max-width: 100%; margin: 0 auto; float: left;">
            <img src="https://mmbiz.qlogo.cn/mmbiz/kEuN69VnaeJuXx1WLXALrjyLHd72oZhsw6riaJSCeyXrGW7Uk0ibqlPdL9Tnnn7qpdXqqvzXqNMSVbArAgvic7iaOw/0" style="width: 100%; height: auto !important; box-sizing: border-box;"/>
            <br/>
            <p>Hello!</p>
            <p>在这里开始说话。</p>
            <br/>
            <div class="item" id="item-list">
                <fieldset style="border: 0px; margin: 0.8em 0px 0.5em; box-sizing: border-box; padding: 0px;" class="tn-Powered-by-XIUMI">
                    <section style="display: inline-block; padding: 0px 2px 2px; box-sizing: border-box; border-bottom-width: 2px; border-bottom-style: solid; border-color: rgb(95, 156, 239); line-height: 1; font-size: 16px; font-family: inherit; font-weight: inherit; text-align: center; text-decoration: inherit; color: rgb(255, 255, 255);" class="tn-Powered-by-XIUMI">
                        <section style="display: inline-block; margin: 0px; padding: 0.3em 0.4em; min-width: 1.8em; min-height: 1.6em; border-radius: 80% 100% 90% 20%; line-height: 1; font-size: 16px; font-family: inherit; box-sizing: border-box; word-wrap: break-word !important; background-color: rgb(95, 156, 239);" class="tn-Powered-by-XIUMI">
                            <section class="tn-Powered-by-XIUMI" style="box-sizing: border-box;">0</section>
                        </section>
                        <span style="display: inline-block; margin-left: 0.4em; max-width: 100%; color: rgb(0, 112, 192); line-height: 1.4; font-size: 16px; word-wrap: break-word !important; box-sizing: border-box;" class="tn-Powered-by-XIUMI">
                            <span style="max-width: 100%; font-size: 16px; font-family: inherit; font-weight: bolder; text-align: inherit; text-decoration: inherit; color: rgb(95, 156, 239); box-sizing: border-box; word-wrap: break-word !important;" class="tn-Powered-by-XIUMI">
                                <section class="tn-Powered-by-XIUMI" style="box-sizing: border-box;">清单</section>
                            </span>
                        </span>
                    </section>
                </fieldset>
                <p>
                <?php
                $order = 1;
                foreach ( $_POST as $wechat_item_id ) {
                    echo generate_item_list( $wechat_item_id, $order );
                    $order++;
                }
                ?>
                </p>
            </div>
            <?php
            $order = 1;
            foreach ( $_POST as $wechat_item_id ) {
                echo generate_item_html( $wechat_item_id, $order );
                $order++;
            }
            ?>
            <br/>
            <br/>
            <br/>
            <fieldset style="white-space: normal; border: 0px; margin: 16px; padding: 0px; box-sizing: border-box;">
                 <section style="margin-left: 16px; line-height: 1.4; box-sizing: border-box;">
                    <span style="padding: 3px 8px; border-radius: 4px; color: rgb(255, 255, 255); font-size: 16px; text-align: center; font-family: inherit; font-weight: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; border-color: rgb(95, 156, 239); box-sizing: border-box; background-color: rgb(95, 156, 239);">联系好棒</span>
                </section>
                <section style="margin-top: -11px; padding: 22px 16px 16px; border: 1px solid rgb(192, 200, 209); color: rgb(51, 51, 51); font-size: 16px; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; box-sizing: border-box; background-color: rgb(239, 239, 239);">
                    <p>如果你发现了好玩的新产品，欢迎以各种方式发给好棒君。可以发链接或截图，直接发一个搜索的关键词也没问题。</p>
                </section>
            </fieldset>
        </div>
        <script>
        function RefineStyle () {
            // Headings
            var headings = document.getElementById('wechat-post').getElementsByTagName('h2');
            for (var i=headings.length-1; i>=0; i--) {
                headings[i].style.background = "transparent";
                headings[i].style.fontSize = "22px";
                headings[i].style.fontWeight = "bold";
                headings[i].removeAttribute('class');
            }

            // Images
            var images = document.getElementsByClassName('attachment-post-thumbnail wp-post-image');
            for (var i=images.length-1; i>=0; i--) {

                // Styles
                images[i].style.background = "transparent";
                images[i].style.border = "1px solid rgba(0, 0, 0, 0.1)";
                images[i].removeAttribute('width');
                images[i].removeAttribute('height');
                images[i].style.maxWidth = "100%";
                images[i].style.height = "auto";

                // Qiniu CDN
                var fastImg = images[i].src.replace('<?php bloginfo('wpurl') ?>', 'http://nervouna.qiniudn.com');
                images[i].setAttribute('src', fastImg);
            }
            for (var i=images.length-1; i>=0; i--) {
                images[i].removeAttribute('class');
            }

            // Text
            var paras = document.getElementById('wechat-post').getElementsByTagName('p');
            for (var i=paras.length-1; i>=0; i--) {
                paras[i].style.background = "transparent";
                paras[i].style.fontSize = "16px";
                paras[i].style.color = "#272727";
                paras[i].removeAttribute('class');
            }
        };
        function SelectText(element) {
            var doc = document,
                text = doc.getElementById(element),
                range, selection;
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

<?php endif ?>
