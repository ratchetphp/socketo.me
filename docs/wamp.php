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
                    Using AutobahnJS has a requirement of a deferred library.  They recommend using <a rel="external" href="https://github.com/cujojs/when">when</a> but jQuery's deferred library should work (not officially supported though).
                    The programming reference for AutobahnJS can be found on <a rel="external" href="http://autobahn.ws/developers/autobahnjs/reference">Autobahn website</a>.
                </p>

            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <p>As found in the API Docs: Triggered events are propagated through a <a href="http://ratchet.cb/api/class-Ratchet.Component.WAMP.WAMPServerComponentInterface.html">WAMPServerComponentInterface</a> object passed to the __construct.

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection is about to, or has closed</li>
                    <li><span class="label label-info">onCall</span> (ConnectionInterface <em>$conn</em>, string <em>$id</em>, string <em>$procUri</em>, array <em>$params</em>) - The client has made an <abbr title="Remote Procedure Call">RPC</abbr> to the server. You should send a <em>CallResult</em> or <em>CallError</em> in return</li>
                    <li><span class="label label-info">onSubscribe</span> (ConnectionInterface <em>$conn</em>, string <em>$uri</em>) - The client has subscribed to a channel, expecting to receive events published to the given <em>$uri</em></li>
                    <li><span class="label label-info">onUnsubscribe</span> (ConnectionInterface <em>$conn</em>, string <em>$uri</em>) - The client unsubscribed from a channel, opting out of receiving events from the <em>$uri</em></li>
                    <li><span class="label label-info">onPublish</span> (ConnectionInterface <em>$conn</em>, string <em>$uri</em>, string <em>$event</em>) - The user publishes data to a <em>$uri</em>. You should in return an <em>Event Command</em> to <em>Connections</em> who have <em>Subscribed</em> to the <em>$uri</em></li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$from</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
                </ul>
            </section>

            <section>
                <h3>Methods <small>for configuration</small></h3>

                <p>None</p>
            </section>

            <section>
                <h3>Commands <small>added to its Factory</small></h3>

                <ul>
                    <li><span class="label">Welcome</span> - Upon connection Ratchet will send a "welcome message" identifying its version to the client.</li>
                    <li><span class="label label-info">Event</span> - Publish/Send data to a specific connection that has subscribed to a specific URI</li>
                    <li><span class="label label-info">CallResult</span> - A response to a client <em>Call</em>. Make sure to pass the corresponding <em>$id</em> from the <em>onCall</em> event</li>
                    <li><span class="label label-info">CallError</span> - A response to the client after making a <em>Call</em> informing of an error processing the <em>Call</em>. Make sure to pass the corresponding <em>$id</em> from the <em>onCall</em> event</li>
                    <li><span class="label label-info">Prefix</span> - Agree with the client to shorten a URI into a CURIE (ex. "http://socketo.me" -> "sock")</li>
                </ul>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <dl>
                    <dt>WAMP</dt>
                    <dl>(Closure <em>$addPrefix(string $curie, string $uri)</em>) - Alias a URI into a CURIE on this one <em>Connection</em></dl>
                </dl>
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