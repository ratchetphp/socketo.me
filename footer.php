    <a href="https://github.com/cboden/Ratchet"><img style="position: absolute; top: 0; left: 0; border: 0; z-index: 10000" src="https://a248.e.akamai.net/camo.github.com/6429057dfef9e98189338d22e7f6646c6694f032/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f6f72616e67655f6666373630302e706e67" alt="Fork me on GitHub"></a>

    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery.cookie.js"></script>
    <script src="/assets/js/bootstrap-transition.js"></script>
    <script src="/assets/js/bootstrap-alert.js"></script>
    <script src="/assets/js/bootstrap-modal.js"></script>
    <script src="/assets/js/bootstrap-dropdown.js"></script>
    <script src="/assets/js/bootstrap-scrollspy.js"></script>
    <script src="/assets/js/bootstrap-tab.js"></script>
    <script src="/assets/js/bootstrap-tooltip.js"></script>
    <script src="/assets/js/bootstrap-popover.js"></script>
    <script src="/assets/js/bootstrap-button.js"></script>
    <script src="/assets/js/bootstrap-collapse.js"></script>
    <script src="/assets/js/bootstrap-carousel.js"></script>
    <script src="/assets/js/bootstrap-typeahead.js"></script>
    <script src="/assets/js/google-code-prettify/prettify.js"></script>
    
    <script>
        $(function() {
            prettyPrint();
        });
    </script>

    <?php if (strstr($sr->getPathInfo(), '/demo')): ?>
        <script src="/assets/js/jquery.timeago.js"></script>
        <script src="/vendor/gimite/web-socket-js/swfobject.js"></script>
        <script src="/vendor/gimite/web-socket-js/web_socket.js"></script>

        <script>
            // Set URL of your WebSocketMain.swf here:
            WEB_SOCKET_SWF_LOCATION = "/vendor/gimite/web-socket-js/WebSocketMain.swf";
        </script>

        <script src="/vendor/cujojs/when/when.js"></script>
        <script src="/vendor/tavendo/AutobahnJS/autobahn/autobahn.js"></script>
        <script src="/chat/transport.js"></script>
        <script src="/chat/chat.js"></script>
    <?php endif; ?>

    <footer id="banner" class="well">
        <div id="banner-logos">
            <a class="pull-left" href="http://dev.w3.org/html5/websockets/"><img src="http://www.w3.org/html/logo/badge/html5-badge-h-connectivity.png" width="133" height="64" alt="HTML5 Powered with Connectivity / Realtime" title="HTML5 Powered with Connectivity / Realtime"></a>

            <div id="wamp-tm" class="pull-left">
                <a class="pull-left" href="http://wamp.ws/"><img src="/assets/img/wamp_logo.png"></a>
                <br /><span class="pull-left legal">&quot;<?php wamp(); ?>&quot; and the WAMP logo are trademarks of Tavendo GmbH.</span>
            </div>
        </div>

        <div class="pull-right">
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="tall" data-annotation="none"></div>

            <!-- Place this tag after the last +1 button tag. -->
            <script type="text/javascript">
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>

            <a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterapi" data-hashtags="ratchetphp">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

        <div style="clear: both;"></div>
    </footer>
  </body>
</html>