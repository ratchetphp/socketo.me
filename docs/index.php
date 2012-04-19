<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>

        <div class="span9">
            <h2>Introduction to WebSockets</h2>

            <h3>Everything You Know (about the web) is Wrong</h3>

            <p>
                Stateless. You make a request to http://socketo.me/hello-world, what happens? 
                Your browser opens up a socket port 80 on socketo.me, sends an HTTP header request to the server (Apache/Nginx/Rack/IIS), it buffers that message and sends it to the server application. 
                The server decides what to do with the request, fetches data, generates HTML and sends it back to the server (Apache/Nginx/Rack/IIS). 
                It then adds the appropriate HTTP headers to the body, sends it back to the browser and closes the connection.
            </p>

            <p>
                Websites maintain a knowledge of who you are by cookies. 
                Cookies are passed back and fourth for every request made to keep reminding the server "hey, I'm me, the same guy as last time". 
                This, among other things, carries overhead and is open to security vulnerabilities (if not properly secured).
            </p>

            <p>All communication is client initiated and each stateless request/response is isolated.</p>

            <h3>Introducing WebSockets</h3>

            <p>
                WebSockets are a bi-directional, full-duplex, persistent connection from a web browser to a server. 
                Once a WebSocket connection is established the connection stays open until the client or server decides to close this connection. 
                With this open connection, the client or server can send a message at any given time to the other. 
                This makes web programming entirely event driven, not (just) user initiated. 
                It is stateful. As well, at this time, a single running server application is aware of all connections, allowing you to communicate with any number of open connections at any given time.
            </p>

            <h3>Status</h3>

            <p>
                On the client end they're already natively in Chrome, Firefox, Opera and Safari* (including mobile Safari)*. 
                On the Internet Explorer front they're available in IE10 as a plugin, while it's still considered a prototype. 
                In addition, any browser that does not support WebSockets can use a Flash polyfill.
            </p>

            <p>
                However, server technology hasn't been as quick to the show as the browser developers. 
                That's where Ratchet comes in. 
                Ratchet components can make up a full stack server. 
                You build a stack of Ratchet <em>I/O Server Component</em>, <em>Ratchet WebSocket</em> protocol interpreter, and your business logic application together to support WebSockets on the server side of things. 
            </p>
        </div><!--/span-->
      </div><!--/row-->


<?php
    require dirname(__DIR__) . '/footer.php';