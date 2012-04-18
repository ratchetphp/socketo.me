<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Hello Universe! Go Deeper with Ratchet</h2>

            <section class="intro">
                <h3>Goal</h3>

                <p>
                    In the tutorial <a href="/docs/hello-world">Hello World!</a> we covered an introduction to Ratchet by creating a basic chat application. 
                    In this tutorial we're going to build a more advanced chat application that has the functionality found in IRC. 
                    These features include (from the perspective of the client/user):
                    <ul>
                        <li>Giving yourself a unique display name</li>
                        <li>The ability create and/or join chat rooms</li>
                        <li>The ability to send messages to rooms you've joined</li>
                        <li>Receive event notifications for the rooms you're in upon someone:
                            <ul>
                                <li>sending a message</li>
                                <li>changing their name</li>
                                <li>joining</li>
                                <li>leaving</li>
                            </ul>
                        </li>
                    </ul>
                </p>
            </section>

            <section>
                <h2>The ChatRoom Class Structure</h2>

                <p><strong>Note:</strong> 
                    The <a href="http://wamp.ws/spec">WAMP Specification</a> makes developing WebSocket applications <em>much</em> easier by describing commonly used events triggered either by the server or clients. 
                    Please familiarize yourself with the 9 events before continuing.
                </p>

                <p>
                    We will accomplish this by using the <a href="/docs/wamp">WAMPServerComponent</a> as well as an accompanying Javascript library called <a href="http://autobahn.ws/developers/autobahnjs">AutobahnJS</a> (<a href="https://github.com/tavendo/AutobahnJS">GitHub Repo</a>). 
                    Knowing we will be using the <em>WAMPComponent</em>, it requires an object that implements the <a href="http://ratchet.cb/api/class-Ratchet.Component.WAMP.WAMPServerComponentInterface.html">WAMPServerComponentInterface</a>, so our class will implement that:
                </p>

                <pre>&lt;php
namespace MyApp;
use Ratchet\Component\WAMP\WAMPComponentInterface;
use Ratchet\Resource\ConnectionInterface;

class ChatRoom implements WAMPComponentInterface {
    }

    public function onClose(ConnectionInterface $conn) {
    }

    public function onCall(ConnectionInterface $conn, $id, $procUri, array $params) {
    }

    public function onSubscribe(ConnectionInterface $conn, $uri) {
    }

    public function onUnSubscribe(ConnectionInterface $conn, $uri) {
    }

    public function onPublish(ConnectionInterface, $conn, $uri, $event) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';