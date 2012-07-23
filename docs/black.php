<?php
    $metaTitle = 'Component: IpBlackList';
    $metaDesc  = 'IpBlackList will help you prevent malicious visitors from connection to your application';

    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>IpBlackList</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>Is someone doing something malicious to your server?  Keep them out!</p>
                <p>
                    The IpBlackList component let's you configured IP addresses to block. 
                    It should be placed as close to the IoServer as possible as it will kick bad connections immediately. 
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
                    <li>IpBlackList <strong>blockAddress</strong> (string $address) - Specify an address to be blocked.  This can be an IP4, IP6, or named address</li>
                    <li>IpBlackList <strong>unblockAddress</strong> (string $address) - Unblock and address that was previously blocked</li>
                    <li>boolean <strong>isBlocked</strong> (string $address) - Check to see if an address is being blocked</li>
                    <li>array <strong>getBlockedAddresses</strong> () - Return an indexed array of all the addresses being blocked</li>
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

                <p>None.</p>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                    <li>Your application (for testing, or making a telnet application)</li>
                    <li><a href="/docs/flash">FlashPolicy</a></li>
                    <li><a href="/docs/websocket">WsServer</a></li>
            </section>

            <section>
                <h3>Wrapped <small>by other components nicely</small></h3>

                <ul>
                    <li><a href="/docs/server">IoServer</a></li>
                </ul>
            </section>

            <section>
                <h3>Usage</h3>

                <pre class="prettyprint">&lt;?php
// Your shell script
use Ratchet\Server\IpBlackList;
use Ratchet\Server\IoServer;

    $blackList = new IpBlackList(new MyChat);
    $blackList->blockAddress('74.125.226.46'); // Stop Google from connecting to our server

    $server = IoServer::factory($blackList, 8000);
    $server->run();</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';