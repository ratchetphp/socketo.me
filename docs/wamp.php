<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2><abbr title="WebSocket Application Messaging Protocol">WAMP</abbr>ServerComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>
                    The <a rel="external" href="http://wamp.ws/spec"><?php wamp(); ?></a> (WebSocket Application Messaging Protocol) specification
                    gives developers (that's you!) a more structured and easy way for your client (JavaScript) and server (Ratchet-PHP) to interact. 
                    <?php wamp(); ?> provides the <abbr title="Remote Procedure Call">RPC</abbr> and <abbr title="Publish and Subscribe">PubSub</abbr> patterns. 
                    <?php wamp(); ?> specifies <abbr="Uniform Resource Identifier">URI</abbr>s for endpoint handles and <abbr title="JavaScript Object Notation">JSON</abbr> for payload transmissions. 
                    It is recommended taking a quick read over the <a rel="external" href="http://wamp.ws/spec"><?php wamp(); ?> Specification</a> to get an understanding of how and why to use it. 
                </p>

                <p>
                    If you choose to build your application on the <?php wamp(); ?> spec (highly recommended) you will need a JavaScript library to implement the client side. 
                    <a rel="external" href="https://github.com/tavendo/AutobahnJS">AutobahnJS</a> is a client to interact with <?php wamp(); ?> servers and is highly recommended to use with Ratchet. 
                    Using AutobahnJS has a requirement of a deferred library.  They recommend using <a rel="external" href="https://github.com/cujojs/when">when</a> but jQuery's deferred library should work (not supported though).
                    The programming reference for AutobahnJS can be found on <a rel="external" href="http://autobahn.ws/developers/autobahnjs/reference">Autobahn website</a>.
                </p>

            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection is about to, or has closed</li>
                    <li><span class="label label-info">onCall</span> (ConnectionInterface <em>$conn</em>) - </li>
                    <li><span class="label label-info">onSubscribe</span> (ConnectionInterface <em>$conn</em>) - </li>
                    <li><span class="label label-info">onUnsubscribe</span> (ConnectionInterface <em>$conn</em>) - </li>
                    <li><span class="label label-info">onPublish</span> (ConnectionInterface <em>$conn</em>) - </li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$from</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
                </ul>
            </section>

            <section>
                <h3>Methods <small>for configuration</small></h3>

                <p></p>
            </section>

            <section>
                <h3>Commands <small>added to its Factory</small></h3>

                <ul>
                    <li><span class="label label-info">Welcome</span> - </li>
                    <li><span class="label label-info">Event</span> - </li>
                    <li><span class="label label-info">CallResult</span> - </li>
                    <li><span class="label label-info">CallError</span> - </li>
                    <li><span class="label label-info">Prefix</span> - </li>
                </ul>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <p></p>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                <ul>
                    <li>Your application</li>
                </ul>
            </section>

            <section>
                <h3>Wrapped <small>by other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/websocket">WebSocketComponent</a></li>
                    <li><a href="/docs/sessions">SessionComponent</a></li>
                </ul>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';