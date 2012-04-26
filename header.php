<?php
    require_once __DIR__ . '/bootstrap.php';
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ratchet - WebSockets for PHP</title>
    <meta name="description" content="WebSocket development in PHP">
    <meta name="author" content="Chris Boden">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/site.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
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