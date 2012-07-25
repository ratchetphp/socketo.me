<?php
    $metaTitle = 'PHP WebSockets';
    $metaDesc  = 'Ratchet is a PHP WebSocket library for serving real-time bi-directional messages between clients and server';
    $isIndex   = true;

    require __DIR__ . '/header.php';
?>
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1 itemprop="name">Ratchet</h1>
        <h2 itemprop="description">WebSockets for PHP</h2>
        <p itemprop="about">Ratchet is a loosely coupled PHP library providing developers with tools to create real time, <span class="nobr">bi-directional</span> applications between clients and servers over WebSockets. This is not your Grandfather's&nbsp;Internet. </p>
        <p><a class="btn btn-primary btn-large" href="/docs">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Fast & Easy</h2>
          <p>Write your own chat (aka "Hello World!" for sockets) application in a matter of minutes. </p>
          <p>After understanding "the new flow" - event driven programming, compared to traditional HTTP request/response - writing any application on top of Ratchet becomes fast and easy.</p>
          <p><a class="btn" href="/docs/hello-world">Begin tutorial &raquo;</a></p>
        </div>

        <div class="span4">
          <h2>Components</h2>
            <p>Ratchet provides many components for you to pick and choose from to easily add functionality.</p>
            <p>The component architecture allows you to focus on functionality with the ability to reuse and add or remove other component functionality.</p>
          <p><a class="btn" href="/docs/design">Understand the design &raquo;</a></p>
       </div>

        <div class="span4">
          <h2>Compatible</h2>
          <p>Ratchet is fully PSR-0 compliant, so it naturally plays well with others. Leveraging components from Symfony2, development should feel similar to many.</p>
          <p>Ratchet passes all (non-binary) WebSocket tests to ensure it works on all supported browsers.</p>
          <p><a class="btn" href="/reports/ab" target="_blank">View report &raquo;</a></p>
        </div>
      </div>

    </div> <!-- /container -->

<?php
    require __DIR__ . '/footer.php';