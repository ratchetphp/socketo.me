<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>

        <div class="span9">
            <h2>Creating an Application</h2>

            <section>
                <h3>Goal</h3>

                <p>
                    The goal of this application is to write a simple Chat application. 
                    Chats in event-driven programming are the "Hello World!" of applications. 
                    The chat will accept all incoming messages and deliver that message to all other connections.
                </p>
            </section>

            <section>
                <h3>The Chat class</h3>

                <p><strong>Note:</strong> This document assumes you have a PSR-0 autoloader present and have registered <em>Ratchet</em> as well as <em>MyApp</em> which is the namespace where we will put our demo class.</p>

                <p>
                    We'll start off by creating the class.  
                    This basic application will listen for 4 events:

                    <ul>
                        <li><em>onOpen</em> - Called when a new client has Connected</li>
                        <li><em>onMessage</em> - Called when a message is received by a <em>Connection</em></li>
                        <li><em>onClose</em> - Called when a <em>Connection</em> is closed</li>
                        <li><em>onError</em> - Called when an error occurs on a <em>Connection</em>
                    </ul>

                    <p>Given those triggers, our class will implement the <a href="/api/class-Ratchet.Component.MessageComponentInterface.html">MessageComponentInterface</a>:</p>

                    <pre>&lt;?php
namespace MyApp;
use Ratchet\Component\MessageComponentInterface;
use Ratchet\Resource\ConnectionInterface;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
    }

    public function onMessage(ConnectionInterface $from, $msg) {
    }

    public function onClose(ConnectionInterface $conn) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}</pre>

            <p>
                You'll notice, in addition from just implementing methods from the <em>MessageComponentInterface</em>, we've given our application a namespace and are accepting the <a href="http://ratchet.cb/api/class-Ratchet.Resource.ConnectionInterface.html">ConnectionInterface</a> classes.
                This class, usually implemented by a <a href="http://ratchet.cb/api/class-Ratchet.Resource.Connection.html">Connection</a> instance, is a representation of a client's connection on the other side of the socket.
                On each of the four triggered events, the client <em>Connection</em> representation is passed. 
                These objects are re-used, you will receive the same <em>Connection</em> sometimes.
            </p>

            <p>We'll come back to our Chat class soon.</p>
        </section>

        <section>
            <h3>Instantiation</h3>

            <p>
                Our <em>Chat</em> class will be our application logic. 
                Next, we're going to piece together our binary script. 
                This is the script/file we will call from the command line to launch our application. 
            </p>

        <pre>&lt;?php
use Ratchet\Component\Server\IOServerComponent;
use MyApp\Chat;

    $server = new IOServerComponent(
        new Chat()
    );

    $server->run(8000);</pre>

            <p>
                Above, you'll see we create an I/O (Input/Output) server. 
                This will handle direct communication with the client. 
                It does things such as store all the connections, mediate data sent between each client and our <em>Chat</em> application, and catch errors.
                We then take that I/O Server and wrap it around our a new instance of our <em>Chat</em> class. 
                Finally, we tell the server to enter an event loop, listening for any incoming requests on port 8000.
            </p>

            <p>
                Save this script as <em>chat-server.php</em>. 
                Now, we can run it with the following command in your terminal:
            </p>

            <pre>$ php chat-server.php</pre>

            <p>The script should now execute, taking possession of your terminal. You can cancel the script, as we're not quite finished yet.</p>
        </section>

        <section>
            <h3>Logic</h3>

            <p>So far, we've just set up structure, both in our executable script and our <em>Chat</em> class. Now, to add code to our <em>Chat</em> to complete our application.</p>

            <p>
                <strong>Important:</strong> An important convention of building Ratchet applications is how data is returned to clients. 
                This is done with classes following what's called the <em>Command Pattern</em>.
                Ratchet provides several <em>Command</em> classes, that delay code execution until the <em>IOServerComponent</em> is ready to deliver your messages.
                See the <a href="/docs/design#command">Design Philosophy</a> section on <em>Commands</em> for more information.
            </p>

            <p>
                Let's add some logic to our <em>Chat</em> class.  We'll incorporate the logic in our methods and use some <em>Command</em> classes to do this:
                What we're going to do, is track all incoming <em>Connections</em>, in order to send them messages. 
                Typically, you would store a collection of items in an array, but we're going to use something called <a href="http://ca2.php.net/manual/en/class.splobjectstorage.php">SplObjectStorage</a>. 
                These storage containers are built to store objects, which is what the incoming <em>Connections</em> are. 
            </p>

            <pre>&lt;?php
namespace MyApp;
use Ratchet\Component\MessageComponentInterface;
use Ratchet\Resource\ConnectionInterface;
use Ratchet\Resource\Command\Action\SendMessage;
use Ratchet\Resource\Command\Action\CloseConnection;
use Ratchet\Resource\Command\Composite as CommandComposite;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // This is a collection of commands to send back to the caller
        $commands = new CommandComposite;

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, enqueue a message to send to each client connected
                $messageCommand = new SendMessage($client);
                $messageCommand->setMessage($msg);

                $commands->enqueue($messageCommand);
            }
        }

        // Return our collection of SendMessage commands to execute
        return $commands;
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        return new CloseConnection($conn);
    }
}</pre>
        </section>

        <section>
            <h3>Running It</h3>

            <p>Complete, let's run it and test it. Open up three terminal windows, typing:</p>

            <pre>$ php chat-server.php</pre>
            <pre>$ telnet localhost 1000</pre>
            <pre>$ telnet localhost 1000</pre>

            <p>In each of the telnet windows, type a message ("Hello World!") and see it appear in the other!</p>
        </section>

        <section>
            <h3>Next Steps</h3>

            <p>
                Now that we have a basic working Chat application, let's make that work in a web browser (Chrome, FireFox, or Safari [for now]).
                First, let's go back to our <em>chat-server.php</em> script. 
                We're going to utilize another component of <em>Ratchet</em>; the WebSocketComponent:
            </p>

            <pre>&lt;?php
use Ratchet\Component\Server\IOServerComponent;
use Ratchet\Component\WebSocket\WebSocketComponent;
use MyApp\Chat;

    $server = new IOServerComponent(
        new WebSocketComponent(
            new Chat()
        )
    );

    $server->run(8000);
</pre>

            <p>Now, open a couple web browser windows and open the a javascript console or a page with the following javascript:</p>

            <pre>&lt;script&gt;
    var conn = new WebSocket('http://localhost:8000');
    conn.onmessage = function(data) {
        console.log(data);
    };

    // Later, at your leisure:
    conn.send('Hello World!');
&lt;/script&gt;
        </section>

        </div><!--/span-->
      </div><!--/row-->

<?php
    require dirname(__DIR__) . '/footer.php';