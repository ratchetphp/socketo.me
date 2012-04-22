<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>WAMPServerComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p></p>
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
                </ul>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';