<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Commands and Actions</h2>

            <section>
                <h3>What?</h3>

                <p>
                    Simply put: <em>Commands</em> are how <em>you</em> <strong>push</strong> data to clients. 
                    <br>The namespace <em>Command</em> is called so because it's an implementation of the <em>Design Pattern:</em> <a rel="external" href="http://en.wikipedia.org/wiki/Command_pattern">Command pattern</a>. 
                    <br>Actions, in Ratchet, are just a subset of specific Commands that inherit the <a href="http://ratchet.cb/api/class-Ratchet.Resource.Command.CommandInterface.html">CommandInterface</a>
                </p>
            </section>

            <section>
                <h3>Usage</h3>

                <p>
                    Any interaction that is in the direction of server -> client has to be done through a <em>Command</em>. 
                    In your application class, each of your methods triggered by an event must either <em>return</em> a <em>Command</em> or null (do nothing). 
                    Each <em>Command/Action</em> will do different things, but each shares two common traits: They each <em>execute</em> functionality in the context of a <em>Connection</em>.
                </p>

                <p>
                    All <em>Actions</em> that are available are documented under the <em>Components</em> section of this documentation. 
                    You will need to use different <em>Actions</em> depending on which components your application uses. 
                </p>

                <p>
                    Let's have some fun.  Below we have a snippet of code from an application.  We'll put this into our <a href="/docs/hello-world">Chat application</a> from the "Hello World!" tutorial. 
                    We'll call this feature "Chat roulette"...ok, we'll also pick a better name later:
                <p>

                <pre class="prettyprint">&lt;?php
namespace MyApp;
use Ratchet\Component\MessageComponentInterface;
use Ratchet\Resource\ConnectionInterface;
use Ratchet\Resource\Command\Action\CloseConnection;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        if (13 === rand(0, 20)) {
            return new CloseConnection($conn);
        }
    }
}</pre>

                <p>
                    Above, when a new client connects to our server we roll the die. 
                    If the user is unfortunate enough to get unlucky 13, we close the connection with the <a href="http://ratchet.cb/api/class-Ratchet.Resource.Command.Action.CloseConnection.html">CloseConnection class</a>.
                    Now, as fun as this is, it's a little rude, wouldn't you say?  The user has just connected and then just disconnected!  We should at least let them know they were unlucky. But how?  Introducing...
                </p>
            </section>

            <section>
                <h3><small>the</small> Composite Command</h3>

                <p>
                    The <a href="http://ratchet.cb/api/class-Ratchet.Resource.Command.Composite.html">Composite class</a> is another type of Ratchet <em>Command</em>.  This class uses the <em>Design Pattern:</em> <a href="http://en.wikipedia.org/wiki/Composite_pattern">Composite pattern</a>...With one small difference: all leafs are flattened, there is no hierarchy. 
                    The <em>Composite Command</em> allows you to return multiple <em>Commands/Actions</em> back down the application stack. 
                    Continuing with our "Chat roulette enhancements" let's send the user a message of their miss-fortune before we disconnect them:
                </p>

                <pre class="prettyprint">&lt;?php
namespace MyApp;
use Ratchet\Component\MessageComponentInterface;
use Ratchet\Resource\ConnectionInterface;
use Ratchet\Resource\Command\Composite;
use Ratchet\Resource\Command\Action\SendMessage;
use Ratchet\Resource\Command\Action\CloseConnection;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        if (13 === rand(0, 20)) {
            $commands = new Composite;

            $message = new SendMessage($conn);
            $message->setMessage("Sorry, you drew #13, bad luck!  Connect again later");

            $close = new CloseConnection($conn);

            $commands->enqueue($message);
            $commands->enqueue($close);

            return $commands;
        }
    }
}</pre>
            </section>

            <section>
                <h3><small>the</small> Factory</h3>

                <p>
                    ...Another <em>Design pattern</em> thingy?  You bet! 
                    This class' only purpose is to shorten your coding. 
                    The <a href="http://ratchet.cb/api/class-Ratchet.Resource.Command.Factory.html">Factory class</a> has two (primary) methods: <em>newComposite()</em> and <em>newCommand(string $name)</em>. 
                    Let's refactor our last block of code using the factory:
                </p>

                <pre class="prettyprint">&lt;?php
namespace MyApp;
use Ratchet\Component\MessageComponentInterface;
use Ratchet\Resource\ConnectionInterface;
use Ratchet\Resource\Command\Factory;

class Chat implements MessageComponentInterface {
    protected $f;

    public function __construct() {
        $this->f = new Factory;
    }

    public function onOpen(ConnectionInterface $conn) {
        if (13 === rand(0, 20)) {
            $commands = $this->f->newComposite();

            $commands->enqueue($this->f->newCommand('SendMessage')->setMessage('Sorry, you drew #13, bad luck! Connect again later'));
            $commands->enqueue($this->f->newCommand('CloseConnection'));

            return $commands;
        }
    }
}</pre>

                <p>Did we mention everything is chained for a fluent interface?</p>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';