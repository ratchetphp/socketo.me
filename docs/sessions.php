<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>SessionComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>
                    The <em>SessionComponent</em> will attach a <a rel="external" href="http://symfony.com/doc/master/components/http_foundation/sessions.html">Symfony2 HttpFoundation Session</a> object to each incoming <em>Connection</em> object that will give you read-only access to the session data from your website.
                    The <em>SessionComponent</em> <strong>will not work</strong> with any of the Native* session handlers. It is suggested you use choose one of the following <em>Symfony Custom Save Handlers</em>:
                </p>

                <ul>
                    <li>MemcacheSessionHandler</li>
                    <li>MemcachedSessionHandler</li>
                    <li>PdoSessionHandler</li>
                    <li>(in development) RedisSessionHandler</li>
                </ul>

                <p>
                    In order to access your session data in Ratchet, you must also use the same Symfony Session Handler on you website. 
                    Below is a network diagram of how the various connections interact to access data:
                </p>

                <p><img src="/assets/img/RatchetSessions.png"></p>
            </section>

            <section>
                <h3>Events <small>triggered by this <em>Component</em></h3>

                <p>As found in the API Docs: Triggered events are propagated through a <a href="http://socketo.me/api/class-Ratchet.Component.MessageComponentInterface.html">MessageComponentInterface</a> object passed to the <em>__construct</em>.</p>

                <ul>
                    <li><span class="label label-success">onOpen</span> (ConnectionInterface <em>$conn</em>) - A new client connection has been opened</li>
                    <li><span class="label label-warning">onClose</span> (ConnectionInterface <em>$conn</em>) - A client connection is about to, or has closed</li>
                    <li><span class="label label-info">onMessage</span> (ConnectionInterface <em>$from</em>, string <em>$message</em>) - A data message has been received</li>
                    <li><span class="label label-important">onError</span> (ConnectionInterface <em>$from</em>, Exception <em>$error</em>) - An error has occurred with a <em>Connection</em></li>
                </li>
            </section>

            <section>
                <h3>Methods <small>for configuration</small></h3>

                <p>None.</p>
            </section>

            <section>
                <h3>Commands <small>added to its Factory</small></h3>

                <p>None.</p>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <dl>
                    <dd>(Symfony\Component\HttpFoundation\Session <em>$Session</em>) - A Symfony2 Session object. See the <a href="#">API docs</a> or <a rel="external" href="http://symfony.com/doc/master/components/http_foundation/sessions.html">Symfony Documentation</a> on working with the Session object.  Also, <em>please</em> do not try and write to the session</dd>
                </dl>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/WAMPServerComponent">WAMPServerComponent</a></li>
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