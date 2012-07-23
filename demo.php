<?php
    $metaTitle = 'Chatroom WebSocket demonstration';
    $metaDesc  = 'The "Hello World!" of socket examples. Try out this IRC-like chatroom';

    require __DIR__ . '/header.php';
?>
    <div class="container">

    <?php require __DIR__ . '/chat/index.php'; ?> 

    </div> <!-- /container -->

<?php
    require __DIR__ . '/footer.php';