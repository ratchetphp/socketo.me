<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>

        <div class="span9">
            <h2>Design Philosophy</h2>

            <h3>Components: <small>Architecting your Application</small></h3>

            <p>
                The core of Ratchet is made up of <em>Components</em>.  Each component implements a version of the <em>ComponentInterface</em>. 
            </p>

            <p>Each class is instantiated when the script is launched, then enters an event loop, where I/O listens and calls the class on top of it. (it does not trigger a global event, it passes the event on to one class attached to [below] it).</p>

            <p>An event is triggered at the top of the table (seen below) from a client on the other side of the socket. 
            The client connection associated with the event then propagates up the structure along with any information sent.</p>

            <p>Each class defines which interface it accepts, then propagating its own events.  This structure allows developers to add or subtract class components to create different functionality.
            For example, one may want to add a logging component between WebSocket and <abbr title="WebSocket Application Messaging Protocol">WAMP</abbr> to log raw <abbr title="JavaScript Object Notation">JSON</abbr> messages received by the client.</p>

            <p>
                Below is an example of an <em>Application</em> put together using various components. 
                You can see how by adding more layers, <em>Components</em> are able to extend and further define raw data into more specific events.
                As seen below <abbr title="WebSocket Application Messaging Protocol">WAMP</abbr> accepts a <em>data</em> event, it the parses that data (<abbr title="JavaScript Object Notation">JSON</abbr>) and propagates its own events based on the data received.
            </p>

            <table class="table table-bordered new-chart">
                <thead>
                    <tr>
                        <th>Component Class</th>
                        <th colspan="9">Event triggered by Client (JavaScript)</th>
                    </tr>
                </thead>
        
                <tbody>
                    <tr>
                        <th>I/O (socket transport)</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>error</td>
                        <td colspan="6">data</td>
                    </tr>

                    <tr>
                        <th>WebSocket Protocol Handler</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>error</td>
                        <td colspan="5">data</td>
                        <td>file</td>
                    </tr>

                    <tr>
                        <th><abbr title="WebSocket Application Messaging Protocol">WAMP</abbr> Protocol Handler</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>error</td>
                        <td>publish</td>
                        <td>subscribe</td>
                        <td>unsubscribe</td>
                        <td>call</td>
                        <td>prefix</td>
                        <td>file</td>
                    </tr>

                    <tr>
                        <th>(your) Application</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>error</td>
                        <td>publish</td>
                        <td>subscribe</td>
                        <td>unsubscribe</td>
                        <td>call</td>
                        <td>prefix</td>
                        <td>file</td>
                    </tr>
                </tbody>
            </table>

            <section>
                <h3>Resources: <small>Objects Passed through your Application Components</small></h3>

                <p>
                    With your application architecture set up and instantiated <em>Resources</em> are then passed through your application.
                    <em>Resources</em> are broken up into two categories: <a href="/docs/connections">Connections</a> and <a href="/docs/commands">Commands</a>.
                    When events are triggered by the base (<em>IOServerComponent</em>) and propagated up to your application a <em>Connection</em> object is sent representing the client on the other end of the wire. 
                    These <em>Connection</em> objects are used to interact with the client and are passed both up and down your application.
                </p>

                <p>
                    <em>Commands</em> are classes you instantiate in your application within the context of a <em>Connection</em> to have executed by the <em>IOServerComponent</em>. 
                    Two base commands are <em>SendMessage</em> and <em>CloseConnection</em>. 
                    In your application class you will create a command, bound to a <em>Connection</em> and <em>return</em> the command from your event method to have it handled other <em>Components</em>, such as any required WebSocket encoding, then finally handled by the <em>IOServerComponent</em>.
                </p>
            </section>
        </div><!--/span-->
      </div><!--/row-->

<?php
    require dirname(__DIR__) . '/footer.php';