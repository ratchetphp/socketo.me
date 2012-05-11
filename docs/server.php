<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>IoServer</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>
                    The <em>IoServer</em> should be the base of your application.  
                    This is the core of the events driven from client actions.  
                    It handles receiving new connections, reading/writing to those connections, closing the connections, and handles all errors from your application. 
                </p>
            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection is about to, or has closed</li>
                    <li><span class="label label-info">onMessage</span> (ConnectionInterface <em>$from</em>, string <em>$message</em>) - A data message has been received</li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$from</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
                </ul>
            </section>

            <section>
                <h3>Configuration <small>methods</small></h3>

                <ul>
                    <li>void <strong>run</strong>() - Enter the event loop of your application and listen for incoming connections and data</li>
<!--
                    <li>self <strong>setBufferSize</strong> (int <em>$bytes</em>) - Set the number of bytes for the socket read buffer</li>
-->
                </ul>
            </section>

            <section>
                <h3>Functions <small>callable on <em>Connections</em></small></h3>

                <ul>
                    <li><span class="label label-info">send</span> (string <em>$message</em>) - Send a message (string) to the client</li>
                    <li><span class="label label-warning">close</span> - Gracefully close the connection to the client</span>
                </ul>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <dl>
                    <dd>(string <em>$remoteAddress</em>) - The address (IP Address) the user connected with</dd>
                    <dd>(int <em>$resourceId</em>) - An incremental number assigned when the connection is made</dd>
                </dl>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                <ul>
                    <li>Your application (for testing, or making a telnet application)</li>
                    <li><a href="/docs/black">IpBlackList</a></li>
                    <li><a href="/docs/flash">FlashPolicy</a></li>
                    <li><a href="/docs/websocket">WsServer</a></li>
                </ul>
            </section>

            <section>
                <h3>Wrapped <small>by other components nicely</small></h3>

                <p>Typically, none.  This should be the base of your application as it handles the direct communication and transport with clients.</p>
            </section>

            <section>
                <h3>Usage</h3>

                <pre class="prettyprint">&lt;?php
// Your shell script
use Ratchet\Server\IoServer;

    $server = IoServer::factory(new MyApp);
    $server->run();</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';