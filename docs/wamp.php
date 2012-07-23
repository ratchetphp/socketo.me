<?php
    $metaTitle = 'The WAMP sub-protocol';
    $metaDesc  = 'WAMP (WebSocket Application Messaging Protocol) is an official WebSocket sub-protocol giving developers access Pub/Sub and RPC patterns over WebSockets';

    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2><abbr title="WebSocket Application Messaging Protocol">Wamp</abbr>Server <small>(Pub/Sub & RPC)</small></h2>

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
                    <a rel="external" href="http://autobahn.ws/js">AutobahnJS</a> is a client to interact with <?php wamp(); ?> servers and is highly recommended to use with Ratchet. 
                    Using AutobahnJS has a requirement of a deferred library.  They recommend using <a rel="external" href="https://github.com/cujojs/when">when</a> or <a rel="external" href="http://api.jquery.com/category/deferred-object/">jQuery's deferred library</a>.
                    The programming reference for AutobahnJS can be found on <a rel="external" href="http://autobahn.ws/js/reference">Autobahn website</a>.
                </p>

                <p><strong>Note:</strong> Although the documentation specified to use URI's as Topic context, there is no enforcement on client or server; you can use any string to identify these topics.</p>
            </section>

            <section>
                <h3>Topics</h3>

                <p>
                    The WampServer componenet provides a new class that is passed to your application: the <a href="/api/class-Ratchet.Wamp.Topic.html">Topic</a> class. 
                    This is a container that stores all of the <em>Connection</em>s who have subscribed to that topic. 
                    It also features some useful methods such as <em>broadcast</em> to send a message to every one of its subscribers. 
                </p>

                <p>When calling <em>Connection</em> methods that require "string $topic" you can pass the <em>Topic</em> class or it's id. </p>

                <p>If you are familiar with other forms of messaging, <em>topics</em> are equivalent to channels.</p>
            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <p>As found in the API Docs: Triggered events are propagated through a <a href="/api/class-Ratchet.Wamp.WampServerInterface.html">WampServerInterface</a> object passed to the __construct.

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection has been closed</li>
                    <li><span class="label label-info">onCall</span> (ConnectionInterface <em>$conn</em>, string <em>$id</em>, Topic <em>$topic</em>, array <em>$params</em>) - The client has made an <abbr title="Remote Procedure Call">RPC</abbr> to the server. You should send a <em>callResult</em> or <em>callError</em> in return</li>
                    <li><span class="label label-info">onSubscribe</span> (ConnectionInterface <em>$conn</em>, Topic <em>$topic</em>) - The client has subscribed to a channel, expecting to receive events published to the given <em>$topic</em></li>
                    <li><span class="label label-info">onUnsubscribe</span> (ConnectionInterface <em>$conn</em>, Topic <em>$topic</em>) - The client unsubscribed from a channel, opting out of receiving events from the <em>$topic</em></li>
                    <li><span class="label label-info">onPublish</span> (ConnectionInterface <em>$conn</em>, Topic <em>$topic</em>, string <em>$event</em>) - The user publishes data to a <em>$topic</em>. You should in return an <em>Event Command</em> to <em>Connections</em> who have <em>Subscribed</em> to the <em>$topic</em></li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$conn</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
                </ul>
            </section>

            <section>
                <h3>Configuration <small>methods</small></h3>

                <p>None</p>
            </section>

            <section>
                <h3>Functions <small>callable on <em>Connections</em></small></h3>

                <ul>
                    <li><span class="label label-info">event</span> (string <em>$topic</em>, string <em>$msg</em>) - Publish/Send data to a client that has subscribed to a topic</li>
                    <li><span class="label label-info">callResult</span> (string <em>$id</em>, array <em>$data</em>) - A response to a client <em>Call</em>. Make sure to pass the corresponding <em>$id</em> from the <em>onCall</em> event</li>
                    <li><span class="label label-info">callError</span> (string <em>$id</em>, string <em>$topic</em>, string <em>$desc</em> = '', string <em>$details</em> = null) - A response to the client after making a <em>Call</em> informing of an error processing the <em>Call</em>. Make sure to pass the corresponding <em>$id</em> from the <em>onCall</em> event</li>
                    <li><span class="label label-warning">close</span> - Gracefully close the connection to the client</span>
<?php /*
                    <li><span class="label label-info">prefix</span> (string <em>$curie</em>, string <em>$uri</em>) - Agree with the client to shorten a URI into a CURIE (ex. "http://socketo.me" -> "sock") (<em>Note:</em> This feature is marked for deprecated, it is not recommended to use)</li>
*/ ?>
                </ul>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <dl>
                    <dt>WAMP</dt>
                    <dd>(string <em>$sessionId</em>) - A unique ID given to the client</dd>
                    <dd>(array <em>$subscriptions</em>) - A collection of Topics the client has subscribed to</dd>
<?php /*                    <dd>(array <em>$prefixes</em>) - An associative array of CURIE/URI prefixes (aliases) agreed upon by client/server. You can not add entries to this directly, it has to be done on the client or through a Connection object</dd>
*/ ?>
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
                    <li><a href="/docs/websocket">WsServer</a></li>
                    <li><a href="/docs/sessions">SessionProvider</a></li>
                </ul>
            </section>

            <section>
                <h3>Usage</h3>

                <pre class="prettyprint">&lt;?php
// Your shell script
use Ratchet\Wamp\WampServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

    $server = IoServer::factory(
        new WsServer(
            new WampServer(
                new BasicPubSub
            );
        );
    );
    $server->run();
</pre>

                <pre class="prettyprint">&lt;?php
use Ratchet\ConnectionInterface as Conn;

/**
 * When a user publishes to a topic all clients who have subscribed
 * to that topic will receive the message/event from the publisher
 */
class BasicPubSub implements Ratchet\Wamp\WampServerInterface {
    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible) {
        $topic->broadcast($event);
    }

    public function onCall(Conn $conn, $id, $topic, array $params) {
        $conn->callError($id, $topic, 'RPC not supported on this demo');
    }

    // No need to anything, since WampServer adds and removes subscribers to Topics automatically
    public function onSubscribe(Conn $conn, $topic) {}
    public function onUnSubscribe(Conn $conn, $topic) {}

    public function onOpen(Conn $conn) {}
    public function onClose(Conn $conn) {}
    public function onError(Conn $conn, \Exception $e) {}
}
</pre>

            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';