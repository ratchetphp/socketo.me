<?php
    require __DIR__ . '/header.php';
?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Ratchet</h1>
        <h2>WebSockets for PHP</h2>
        <p>Ratchet is a component library for PHP that provides developers with the tools to create real time, bi-directional applications between clients and servers. This is not your Grandfather's Internet. </p>
        <p><a class="btn primary large" href="/docs">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span-one-third">
          <h2>Fast & Easy</h2>
          <p>Write your own chat (aka "Hello World!" for sockets) application in a matter of minutes. </p>
          <p>After understanding "the new flow" - event driven programming, compared to traditional HTTP request/response - writing any application on top of Ratchet becomes fast and easy.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>

        <div class="span-one-third">
          <h2>Decoupled</h2>
           <p>Ratchet provides many components for you to pick and choose from.</p>
           <p>For example, Ratchet comes with a Server component; a CLI based I/O server written in PHP...you really don't want to use that for a live site - but it makes development/testing easy. </p>
           <p>When it comes time to go live, take out the five lines of code that implement Server, and hitch your application on to something more robust, like Nginx.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>

        <div class="span-one-third">
          <h2>Integrated</h2>
          <p>Ratchet is fully PSR-0 compliant, so it naturally plays well with others. Ratchet leverages components of Symfony2, making development familiar to many.</p>
          <p>Unit tests ensure each part of Ratchet behaves as intended.</p>
          <p>Ratchet provides a Session component to allow persistence between your website and your WebSocket application.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <footer>
        <p><a href="http://www.w3.org/html/logo/"><img src="http://www.w3.org/html/logo/badge/html5-badge-h-connectivity.png" width="133" height="64" alt="HTML5 Powered with Connectivity / Realtime" title="HTML5 Powered with Connectivity / Realtime"></a></p>
      </footer>

    </div> <!-- /container -->

<?php
    require __DIR__ . '/footer.php';