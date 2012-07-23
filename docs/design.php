<?php
    $metaTitle = 'A New Architecture';
    $metaDesc  = 'Utilizing proven design patterns, learn how to architect your WebSocket application on Ratchet';

    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>

        <div class="span9">
            <h2>Design Philosophy</h2>

            <h3>Components: <small>Architecting your Application</small></h3>

            <p>
                The core of Ratchet is made up of <em>Components</em>. 
                Each component implements a version of the <em><a href="/api/class-Ratchet.MessageComponentInterface.html">ComponentInterface</a></em>. 
                If you follow that link you can see each of the classes that implement <em>ComponentInterface</em>. 
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
                        <th colspan="8">Event triggered by Client (JavaScript)</th>
                    </tr>
                </thead>
        
                <tbody>
                    <tr>
                        <th>I/O (socket transport)</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td colspan="5">data</td>
                        <td>error</td>
                    </tr>

                    <tr>
                        <th>WebSocket Protocol Handler</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td colspan="5">data</td>
                        <td>error</td>
                    </tr>

                    <tr>
                        <th>Session Provider</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td colspan="5">data</td>
                        <td>error</td>
                    </tr>

                    <tr>
                        <th><abbr title="WebSocket Application Messaging Protocol">WAMP</abbr> Protocol Handler</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>publish</td>
                        <td>subscribe</td>
                        <td>unsubscribe</td>
                        <td>call</td>
                        <td>prefix</td>
                        <td>error</td>
                    </tr>

                    <tr>
                        <th>(your) Application</th>
        
                        <td>open</td>
                        <td>close</td>
                        <td>publish</td>
                        <td>subscribe</td>
                        <td>unsubscribe</td>
                        <td>call</td>
                        <td>prefix</td>
                        <td>error</td>
                    </tr>
                </tbody>
            </table>

            <section>
                <h3>Connections: <small>Objects Passed through your Application Components</small></h3>

                <p>
                    With your application architecture set up and instantiated <em>Resources</em> are then passed through your application.
                    When events are triggered by the base (<em>IoServer</em>) and propagated up to your application a <a href="/docs/connections">Connection</a> object is sent representing the client on the other end of the wire. 
                    These <em>Connection</em> objects are used to interact with the client and are passed through your application.
                </p>
            </section>
        </div><!--/span-->
      </div><!--/row-->

<?php
    require dirname(__DIR__) . '/footer.php';