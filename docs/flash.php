<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>FlashPolicy</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>Allow browsers that don't natively support WebSockets to connect to your Ratchet app with Flash Sockets.</p>

                <p>In your HTML include the JavaScript library <a href="https://github.com/gimite/web-socket-js">web-socket-js</a>, which is a client-side polyfill for the WebSocket API.</p>

                <p>
                    In order for Flash to communicate with a server through sockets, it must first gain permission via an XML response on the 843 port. 
                    Flash will make this request automatically before it connects to your WebSocket application server.
                </p>

                <p>This means you need to run two shell scripts; one on port 843 wit FlashPolicy and one on port 80 for your application.</p>
            </section>

            <section>
                <h3>Configuration <small>methods</small></h3>

                <ul>
                    <li>FlashPolicy <strong>addAllowedAccess</strong> (string <em>$domain</em>, string <em>$ports</em>, bool <em>$secure</em>) - Whitelist a client based on their domain, port and if the connection must be secured or not</li>
                    <li>FlashPolicy <strong>setSiteControl</strong> (string <em>$permittedCrossDomainPolicies</em>) - Set to one of "all", "master-only", or "none" (if you know what you're doing) - default is "all"</li>
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