<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>FlashPolicyComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>Allow browsers that don't natively support WebSockets to connect to your Ratchet app with Flash Sockets.</p>

                <p>(This page is a work in progress, it should be finished soon)</p>
            </section>

            <section>
                <h3>Configuration <small>methods</small></h3>

                <ul>
                </ul>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                <p>None</p>
            </section>

            <section>
                <h3>Wrapped <small>by other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/server">IoServer</a></li>
                    <li><a href="/docs/black">IpBlackList</a></li>
                </ul>
            </section>

            <section>
                <h3>Usage</h3>

                <pre class="prettyprint">&lt;?php
// Your shell script
use Ratchet\Server\FlashPolicy;
use Ratchet\Server\IoServer;

    $flash = new FlashPolicy;
    $flash->addAllowedAccess('*', 8000); // Allow all Flash Sockets from any domain to connect on port 8000

    $server = IoServer::factory($flash, 843);
    $server->run();</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';