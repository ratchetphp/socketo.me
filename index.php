<?php
    require __DIR__ . '/header.php';
?>
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Ratchet</h1>
        <h2>WebSockets for PHP</h2>
        <p>Ratchet is a component library for PHP that provides developers with the tools to create real time, <span class="nobr">bi-directional</span> applications between clients and servers. This is not your Grandfather's Internet. </p>
        <p><a class="btn btn-primary btn-large" href="/docs">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Fast & Easy</h2>
          <p>Write your own chat (aka "Hello World!" for sockets) application in a matter of minutes. </p>
          <p>After understanding "the new flow" - event driven programming, compared to traditional HTTP request/response - writing any application on top of Ratchet becomes fast and easy.</p>
          <p><a class="btn" href="/docs/hello-world">View details &raquo;</a></p>
        </div>

        <div class="span4">
          <h2>Components</h2>
            <p>Ratchet provides many components for you to pick and choose from to easily add functionality.</p>
            <p>The component architecture allows you to focus on functionality with the ability to reuse and add or remove other component functionality.</p>
          <p><a class="btn" href="/docs/design">View details &raquo;</a></p>
       </div>

        <div class="span4">
          <h2>Integrated</h2>
          <p>Ratchet is fully PSR-0 compliant, so it naturally plays well with others. Ratchet leverages components of Symfony2, making development familiar to many.</p>
          <p>Unit tests ensure each part of Ratchet behaves as intended.</p>
          <p>Ratchet provides a Session component to allow persistence between your website and your WebSocket application.</p>
          <p><a class="btn" href="/docs/sessions">View details &raquo;</a></p>
        </div>
      </div>

    </div> <!-- /container -->

<?php
    require __DIR__ . '/footer.php';