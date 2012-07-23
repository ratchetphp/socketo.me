<?php
    $metaTitle = 'Tutorial: Installation';
    $metaDesc  = 'Learn how to easily install Ratchet with Composer';

    require dirname(__DIR__) . '/header.php';
    require __DIR__ . '/menu.php';
?>
        <div class="span9">
            <h2>Installation</h2>

            <section>
                <h3>Composer</h3>

                <p>
                    The best (and currently only) way to install Ratchet is using <a rel="external" href="http://getcomposer.org">composer</a>.
                    Simply add Ratchet as a require in your <em>composer.json</em> file:
                </p>

                <pre class="prettprint">{
    "minimum-stability": "dev",
    "require": {
        "cboden/Ratchet": "dev-master"
    }
}</pre>
            </section>

            <hr>

            <h3>Wait, What?</h3>

            <section>
                <p>
                    Unfamiliar with composer?  Composer for PHP is the greatest thing since sliced bread.
                </p>

                <p>
                    Composer is an application written in PHP that will manage external PHP libraries within your project. 
                    Ratchet requires React, Guzzle, and Symfony2's HttpFoundation in order to work. 
                    It would be a pain in the butt to have to download Ratchet, then download those three libraries in order to make Ratchet work. 
                    Oh, and make sure you download the right versions or else there could be problems.
                    But, you don't have to worry about that, thanks to Composer!
                </p>

                <p>
                    Find out how to <a rel="external" href="http://getcomposer.org/download/">install Composer</a> in 1 easy step
                </p>

                <p>
                    Once you have composer.phar on your system
                    (for this documentation, we're going to assume it's in your home directory)
                    create a file called <code>composer.json</code> in your project folder. 
                    Inside that file copy and paste the JSON from the top of this page.
                </p>

                <p>
                    Next, type the following command to install Ratchet into your project.  It will take about a minute to download all the files.
                </p>

                <pre>php ~/composer.phar install</pre>

                <p>You're now ready to start using Ratchet!  Simply add the following line in the top of any PHP files to get Ratchet into your application:</p>

                <pre class="prettyprint">&lt;?php
    require __DIR__ . '/vendor/autoload.php';</pre>
            </section>
        </div>
    </div>
<?php
    require dirname(__DIR__) . '/footer.php';