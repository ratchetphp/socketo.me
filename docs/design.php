<?php
    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>

        <div class="span9">
            <h2>Design Philosophy</h2>

            <p>
                The core of Ratchet is made up of <em>Components</em>.  Each component implements a version of the <em>ComponentInterface</em>. 
            </p>

            <p>Each class is instantiated when the script is launched, then enters an event loop, where I/O listens and calls the class on top of it. (it does not trigger a global event, it passes the event on to one class attached to [below] it).</p>

            <p>An event is triggered at the top of the table (seen below) from a client on the other side of the socket. 
            The client connection associated with the event then propagates up the structure along with any information sent.</p>

            <p>Each class defines which interface it accepts, then propagating its own events.  This structure allows developers to add or subtract class components to create different functionality.
            For example, one may want to add a logging component between WebSocket and WAMP to log raw JSON messages received by the client.</p>

            <table class="chart">
                <thead>
                    <tr>
                        <th>Component Class</th>
                        <th colspan="9">Event triggered by Client (JavaScript)</th>
                    </tr>
        
                    <tr>
                        <td colspan="10">&nbsp;</td>
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
                        <th>WAMP Protocol Handler</th>
        
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

            <p>You can see, when WAMP accepts a <em>data</em> event it parses that data (JSON) and propagates its own events based on the data received.</p>
        
        </div><!--/span-->
      </div><!--/row-->

<?php
    require dirname(__DIR__) . '/footer.php';