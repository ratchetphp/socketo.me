<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9 component-doc">
            <h2>IpBlackListComponent</h2>

            <section>
                <h3>Purpose <small>of this <em>Component</em></small></h3>

                <p>Is someone doing something malicious to your server?  Keep them out!</p>
                <p>
                    The IpBlackListComponent let's you configured IP addresses to block. 
                    It should be placed as close to the IOServerComponent as possible as it will kick bad connections immediately. 
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
                <h3>Methods <small>for configuration</small></h3>

                <ul>
                    <li>IpBlackListComponent <strong>blockAddress</strong> (string $address) - Specify an address to be blocked.  This can be an IP4, IP6, or named address</li>
                    <li>IpBlackListComponent <strong>unblockAddress</strong> (string $address) - Unblock and address that was previously blocked</li>
                    <li>boolean <strong>isBlocked</strong> (string $address) - Check to see if an address is being blocked</li>
                    <li>array <strong>getBlockedAddresses</strong> () - Return an indexed array of all the addresses being blocked</li>
                </ul>
            </section>

            <section>
                <h3>Commands <small>added to its Factory</small></h3>

                <p>None.</p>
            </section>

            <section>
                <h3>Parameters <small>added to each <em>Connection</em></small></h3>

                <p>None.</p>
            </section>

            <section>
                <h3>Wraps <small>other components nicely</small></h3>

                    <li>Your application (for testing, or making a telnet application)</li>
<?php /*
                    <li><a href="/docs/flash">FlashPolicyComponent</a></li>
*/ ?>
                    <li><a href="/docs/websocket">WebSocketComponent</a></li>
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