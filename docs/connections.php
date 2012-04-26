<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Connections</h2>

            <p>
                A <em>Connection</em> is a PHP object that represents a client connected to your server. 
                The object has properties that contain information about the client. 
                The more Component classes the <em>Connection</em> is passed through, the more properties will be attached to it. 
                For example, you may or may not use the <a href="/docs/sessions">SessionComponent</a> in your application stack. 
                If you choose to use it, each connection will have a <a rel="external" href="http://symfony.com/doc/master/components/http_foundation/sessions.html">Symfony2 Session</a> class attached to it you can access like this:
            </p>

            <pre class="prettyprint">$hello = $conn->Session->get('hello');</pre>

            <p>If you do not include the SessionComponent in your application stack, there will be no Session variable accessible in a connection.</p>

            <h3>Containers</h3>

            <p>
                Even though <em>Connection</em> objects are passed to your application on every event trigger, it's usually a good idea to store your connections in a container, to reference later. 
                The purpose of this is to interact, or push, to a <em>Connection</em> even though that <em>Connection</em> may not have triggered an event. 
                We suggest using a <a rel="external" href="http://ca2.php.net/manual/en/class.splobjectstorage.php">SplObjectStorage</a> to keep your connections; however, a standard array will do. 
                SplObjectStorage classes are often easier to work with when dealing with objects, as there is no lookup required:
            </p>

            <pre class="prettyprint">&lt;?php
use Ratchet\Resource\ConnectionInterface;

class MyApp {
    protected $connections;

    public function __construct() {
        $this->connections = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->connections->attach($conn);
    }

    public function onClose(ConnectionInterface $conn) {
        $this->connections->detach($conn);
    }
}</pre>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';