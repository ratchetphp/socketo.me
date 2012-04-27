<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>WebSocketComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>This component allows your server to communicate with web browsers that use the <a rel="external" href="http://dev.w3.org/html5/websockets/">W3C WebSocket API</a>.</p>
            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <p>As found in the API Docs: Triggered events are propagated through a <a href="http://ratchet.cb/api/class-Ratchet.Component.MessageComponentInterface.html">MessageComponentInterface</a> object passed to the <em>__construct</em>.</p>

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection is about to, or has closed</li>
                    <li><span class="label label-info">onMessage</span> (ConnectionInterface <em>$from</em>, string <em>$message</em>) - A data message has been received</li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$from</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
<?php /*
                    <li><span class="label label-inverse">onFile</span> (ConnectionInterface <em>$from</em>, object <em>$file</em>) - NOT IMPLEMENTED YET.  When coded, will be when a binary file is transferred to the server</li>
*/ ?>
                </ul>
            </section>

            <section>
                <h3>Methods <small>for configuration</small></h3>

                <ul>
                    <li>void <strong>disableVersion</strong> (string $name) - Disable a specific version of the WebSocket protocol. Sometimes you'll want to disable "Hixie76"</li>
                    <li>void <strong>setMaskPayload</strong> (bool $opt) - Enable or disable the server response being framed with the WebSocket framing protocol. Off by default, as per the spec.</li>
                </ul>
            </section>

            <section>
                <h3>Commands <small>added to its Factory</small></h3>

                <p>None.</p>
<?php /*
                <ul>
                    <li><span class="label label-warning">Disconnect</span> - Notify the client of an intent to close the connection. All data currently being transferred will finish before the connection closes</li>
                    <li><span class="label">Pong</span> - Part of the WebSocket protocol, typically not needed by your application
                    <li><span class="label">Ping</span> - Part of the WebSocket protocol, typically not needed by your application
                </ul>
*/ ?>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <dl>
                    <dt>WebSocket</dt>
                    <dd>(Guzzle\Http\Message\RequestInterface <em>$headers</em>) - A Guzzle Request object containing all the information from the initial HTTP connection</dd>
                    <dd>(Ratchet\Component\WebSocket\Version\VersionInterface <em>$version</em>) - Not used by your application, but stores information/data about the WebSocket version the client is connected with. The object is a re-entrant, re-used on other connections, so don't mess with it  :)</dd>
                </ul>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/wamp">WAMPServerComponent</a></li>
                    <li><a href="/docs/sessions">SessionComponent</a></li>
                    <li>Your application</li>
                    <li><a rel="external" href="https://github.com/cboden/Ratchet-examples/blob/master/src/Ratchet/Examples/Cookbook/MessageLogger.php">MessageLogger</a> (found in example repo)</li>
                </ul>
            </section>

            <section>
                <h3>Wrapped <small>by other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/server">IOServerComponent</a></li>
                </ul>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';