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
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';