<?php
    $metaTitle = 'Tutorial: Push on the Web';
    $metaDesc  = 'Bake WebSockets in without breaking your existing website';

    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Push to an Existing Site<br /><small>Enhance your existing work without wide-spread changes.</small></h2>

            <section class="intro">
                <h3>The Problem</h3>

                <p>
                    The previous tutorials were cool and all, but their focus was creating a long lived application where users intereacted with eachother. 
                    That's a lot of work to incorporate into an already existing site.  
                    Code would need to be ported out of your repository and into a new Ratchet application. 
                    A whole new testing phase would need to happen to make sure previously functional pages still work.
                </p>

                <h3>Goal</h3>

                <p>
                    When a user, be it yourself in your admin or a user posting a comment on your blog, does a POST through a form submission or AJAX we want that change to immedietly be pushed to all other visitors on that page. 
                    We'll add real time updates to your existing site without disrupting your code base or affecting its current stability.
                </p>

                <p>For this tutorial we're going to pretend you're publishing a blog article on your website and the visitors will see the story pop up as soon as you publish it.</p>
            </section>

            <section class="diagram">
                <h3>Network Architecure</h3>

                <ol>
                    <li>
                        <img src="/assets/img/push-1.png" alt="Step 1">
                        <p>
                            A client makes a request and receives a response from the web server and renders the page.
                            It then establishes an open WebSocket connection (client 2 and 3 do the same thing).
                        </p>
                    </li>

                    <li>
                        <img src="/assets/img/push-2.png" alt="Step 2">
                        <p>
                            Client 1 does a POST back, through form submission or AJAX, to the web server.
                            (Notice the still open WebSocket connection)
                        </p>
                    </li>

                    <li>
                        <img src="/assets/img/push-3.png" alt="Step 3">
                        <p>While the server is handling the POST request (saving to database, etc) it sends a message directly to the WebSocket stack with a ZeroMQ transport.</p>
                    </li>

                    <li>
                        <img src="/assets/img/push-4.png" alt="Step 4">
                        <p>
                            The WebSocket stack handles the ZMQ message and sends it to the appropriate clients through open WebSocket connections.
                            The web browsers handle the incoming message and update the webpage with Javascript accordingly.
                        </p>
                    </li>
                </ol>

                <p>
                    This workflow is un-obtrusive; it is easy to introduce into existing websites.  
                    The only changes to the site are adding a 1 liner of ZeroMQ to the server and a Javascript file on the client to handle incoming message from the WebSocket server.
                </p>
            </section>

            <section>
                <h3>What is ZMQ/ZeroMQ/ØMQ?</h3>

                <p>
                    To communicate with a running script it needs to be listening on an open socket. 
                    Our application will be listening to port 80 for incoming WebSocket connections...but how will it also get updates from another PHP script?
                    Enter <a href="http://http://www.zeromq.org" rel="external">ZeroMQ</a>. 
                    We could use raw sockets, like the ones Ratchet is built on, but ZeroMQ is a library that just makes socket easier. 
                </p>

                <p>
                    ZeroMQ is a library (libzmq) you will need to install, as well as a PECL extension for PHP bindings. 
                    Installation is easy and is provided for many operating systems on <a href="http://www.zeromq.org" rel="external">their website</a>.
                </p>
            </section>

            <section>
                <h3>Start your coding</h3>

                <p>
                    Let's get to some code!  We'll start by stubbing out our class application. 
                    We're going to use <?php wamp(); ?> for it's ease of use with the Pub/Sub pattern. 
                    This will allow clients to subscribe to updates on a specific page and we'll only push updates to those who have subscribed.
                </p>

                <pre class="prettyprint">&lt;?php
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\WampServer;

class Pusher implements WampServer {
    public function onSubscribe(ConnectionInterface $conn, $topic) {
    }
    public function onUnSubscribe(ConnectionInterface $conn, $topic) {
    }
    public function onOpen(ConnectionInterface $conn) {
    }
    public function onClose(ConnectionInterface $conn) {
    }
    public function onCall(ConnectionInterface $conn, $id, $topic, array $params) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
    }
    public function onPublish(ConnectionInterface, $conn, $topic, $event) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->close();
    }
    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}</pre>

                <p>
                    Simple enough? We just made the methods required for <?php wamp(); ?> and made sure no one tries to send data, closing the connection if they do.
                    We're making a push application and not accepting any incoming messages, those will all be coming from AJAX.
                </p>
            </section>

            <section>
                <h3>Editing your blog submission</h3>

                <p>
                    Next we're going to add a little ZeroMQ magic into your existing website's code where you handle a new blog post. 
                    The code here may be a little basic and archaic compared to the advanced architecture your actual blog is, sitting on Drupal or WordPress, but we're focusing on the fundamentals. 
                </p>

                <pre class="prettyprint">&lt;?php
    $title   = $_POST['title'];
    $article = $_POST['article'];
    $when    = time();

    $pdo->prepare("INSERT INTO `blogs` (`title`, `article`, `published`) VALUES (?, ?, ?)")
        ->execute($title, $article, $when);

    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_REQ, 'my pusher');
    $socket->connect("tcp://localhost:5555");

    $socket->send(json_encode(array($title, $article, $when)));
</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';