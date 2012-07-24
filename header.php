<?php
    $metaTitle = (isset($metaTitle) ? $metaTitle : 'WebSockets for PHP');
    $metaDesc  = (isset($metaDesc) ? $metaDesc : 'PHP WebSocket development');

    $addHtml = $addDesc = $addAuth = '';
    if (isset($isIndex)) {
        $addHtml = ' itemscope itemtype="http://schema.org/WebApplication"';
        $addDesc = ' itemprop="description"';
        $addAuth = ' itemprop="author" itemscope itemtype="http://schema.org/Person" itemprop="name"';
    } else {
        $isIndex = false;
    }

    require_once __DIR__ . '/bootstrap.php';
?><!DOCTYPE html>
<html lang="en"<?php echo $addHtml; ?>>
  <head>
    <meta charset="utf-8">
    <title>Ratchet - <?php echo $metaTitle; ?></title>
    <meta name="description"<?php echo $addDesc; ?> content="<?php echo $metaDesc; ?>">
    <meta name="author"<?php echo $addAuth; ?> content="Chris Boden">

    <?php if ($isIndex): ?>
    <meta itemprop="version" content="0.2">
    <?php endif; ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/site.css" rel="stylesheet">
    <link href="/chat/chat.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <script>
        if (typeof MozWebSocket == 'function') {
            window.WebSocket = MozWebSocket;
        }
    </script>

    <?php if ('127.0.0.1' != $_SERVER['SERVER_ADDR']): ?>
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-16850356-4']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    <?php endif; ?>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">Ratchet</a>
          <div class="nav-collapse">
            <ul class="nav">
                <?php $renderMenu('main'); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>