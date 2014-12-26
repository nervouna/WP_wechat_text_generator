<?php if ( count( $_POST ) ): ?>
    <?php include WTG_INCPATH . '/wechat_item_template.php' ?>
    <div style="background-color: transparent; width: 50%; max-width: 360px; margin: 0 auto; float: left;">
        <h3>文章预览</h3>
        <div id="wechat-post" class="wechat-post" style="background-color: transparent; width: 100%; margin: 0 auto; float: left;">
            <img src="https://mmbiz.qlogo.cn/mmbiz/kEuN69VnaeJuXx1WLXALrjyLHd72oZhsw6riaJSCeyXrGW7Uk0ibqlPdL9Tnnn7qpdXqqvzXqNMSVbArAgvic7iaOw/0" style="width: 100%; height: auto !important; box-sizing: border-box;"/>
            <br/>
            <p>Hello!</p>
            <p>在这里开始说话。</p>
            <br/>
            <div class="item" id="item-list">
                <fieldset style="white-space: normal; border: 0px; margin: 1em 0px 2em; clear: both; box-sizing: border-box; padding: 0px;">
                    <section style="text-align: center; font-size: 1em; font-family: inherit; font-weight: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; color: rgb(255, 255, 255); border-color: rgb(95, 156, 239); box-sizing: border-box;">
                        <section style="width: 2em; height: 2em; margin: 0px auto; border-radius: 50%; box-sizing: border-box; background-color: rgb(95, 156, 239);">
                            <section style="display: inline-block; padding: 0px 0.5em; font-size: 1em; line-height: 2; font-family: inherit; box-sizing: border-box;">
                                0
                            </section>
                        </section>
                        <section style="margin-top: -1em; margin-bottom: 1em; box-sizing: border-box;" class="tn-Powered-by-XIUMI">
                            <section style="border-top-width: 1px; border-top-style: solid; border-color: rgb(95, 156, 239); width: 35%; float: left; box-sizing: border-box;" class="tn-Powered-by-XIUMI"></section>
                            <section style="border-top-width: 1px; border-top-style: solid; border-color: rgb(95, 156, 239); width: 35%; float: right; box-sizing: border-box;" class="tn-Powered-by-XIUMI"></section>
                        </section>
                    </section>
                </fieldset>
                <blockquote style="margin: 0.5em 0px 0.3em; padding: 0px; border: none; font-family: inherit; white-space: normal; box-sizing: border-box; font-size: 1.5em; line-height: 1.5em;">
                    <h2 style="font-size: 1em; font-family: inherit; font-weight: inherit; text-align: center; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; color: inherit; box-sizing: border-box;">清单</h2>
                </blockquote>
                <br />
                <p>
                <?php
                $order = 1;
                foreach ( $_POST as $wechat_item_id ) {
                    echo generate_item_list( $wechat_item_id, $order );
                    $order++;
                }
                ?>
                </p>
                <br />
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
            <fieldset style="white-space: normal; border: 0px; margin: 1em; padding: 0px; box-sizing: border-box;">
                 <section style="margin-left: 1em; line-height: 1.4; box-sizing: border-box;">
                    <span style="padding: 3px 8px; border-radius: 4px; color: rgb(255, 255, 255); font-size: 1em; text-align: center; font-family: inherit; font-weight: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; border-color: rgb(95, 156, 239); box-sizing: border-box; background-color: rgb(95, 156, 239);">联系好棒</span>
                </section>
                <section style="margin-top: -11px; padding: 22px 16px 16px; border: 1px solid rgb(192, 200, 209); color: rgb(51, 51, 51); font-size: 1em; font-family: inherit; font-weight: inherit; text-align: inherit; text-decoration-line: inherit; text-decoration-style: inherit; text-decoration-color: inherit; box-sizing: border-box; background-color: rgb(239, 239, 239);">
                    <p>如果你发现了好玩的新产品，欢迎以各种方式发给好棒君。可以发链接或截图，直接发一个搜索的关键词也没问题。</p>
                    <p>如果想和真人聊天，请回复<span style="font-weight: bold; background-color: yellow;">调戏好棒君</span>……</p>
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
                images[i].style.width = "100%";
                images[i].style.height = "auto";

                // Qiniu CDN
                <?php if ( !WP_DEBUG ): ?>
                var fastImg = images[i].src.replace('<?php bloginfo('wpurl') ?>', 'http://nervouna.qiniudn.com');
                images[i].setAttribute('src', fastImg);
                <?php else: ?>
                var debugImg = 'http://nervouna.qiniudn.com/wp-content/uploads/2014/11/Screen-Shot-2014-11-17-at-17.27.55.png'
                images[i].setAttribute('src', debugImg);
                <?php endif ?>
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
</div>

<?php endif ?>
